<?php
/**
 * CsvView class file.
 *
 * @author Jan Was <janek.jan@gmail.com>
 * @copyright Copyright &copy; 2013-2013 Jan Was
 */

Yii::import('zii.widgets.grid.CGridView');

/**
 * CsvView allows output a large dataset in a CSV format by using CDbDataReader on a CDbCommand.
 * Because it inherits from the CGridView widget, same column configuration is allowed.
 *
 * Tips:
 * - to include a line number or id column, add it to the column definition
 *
 * @author Jan Was <jwas@nets.com.pl>
 */
class CsvView extends CGridView
{
	/**
	 * @var string default class for data columns
	 */
	public $dataColumnClass = 'CDataColumn';
	/**
	 * @var boolean should invisible columns be included anyway, useful to export all possible data without creating extra column configuration
	 */
	public $includeInvisible = true;
	/**
	 * @var boolean if true, all buffers are flushed and disabled before any output
	 */
	public $disableBuffering = true;
	/**
	 * @var boolean if true, no http headers will be sent, useful to capture output for further processing
	 */
	public $disableHttpHeaders = false;
	/**
	 * @var string filename sent in http headers
	 */
	public $filename;
	/**
	 * @var string mimetype sent in http headers
	 */
	public $mimetype = 'text/csv';
	/**
	 * @var output encoding, if null defaults to UTF-8
	 */
	public $encoding;
	/**
	 * @var boolean should html tags be stripped from output values, disable for really big exports to improve efficiency
	 */
	public $stripTags = true;
	/**
	 * @var string if not null, newline characters will be replaced with this, useful when output file will be processed by simple CSV parsers; try not to use same characters as in the $delimiter property
	 */
	public $replaceNewlines = ', ';
	/**
	 * @var string field delimiter (one character only)
	 */
	public $delimiter = ';';
	/**
	 * @var string field enclosure (one character only)
	 */
	public $enclosure = '"';

	/**
	 * @var CActiveRecord model used to fill with current row and pass to row renderer
	 */
	protected $_model;
	/**
	 * @var resource stdout or php://output, requried by fputcsv function
	 */
	protected $_fp;

	/**
	 * Renders the view.
	 * This is the main entry of the whole view rendering.
	 * Child classes should mainly override {@link renderContent} method.
	 */
	public function run()
	{
		$this->_fp = fopen('php://output', 'w');
		if (!$this->_fp) {
			return;
		}
		$this->renderContent();
		fclose($this->_fp);
	}

	/**
	 * Renders the main content of the view.
	 * The content is divided into sections, such as summary, items, pager.
	 * Each section is rendered by a method named as "renderXyz", where "Xyz" is the section name.
	 * The rendering results will replace the corresponding placeholders in {@link template}.
	 */
	public function renderContent()
	{
		if ($this->disableBuffering)
			while (ob_get_level()) ob_end_clean();
		if (!$this->disableHttpHeaders) {
			header('Content-Type: '.$this->mimetype);
			header('Content-Disposition: attachment; filename="'.$this->filename.'"');
			header('Pragma: no-cache');
			header('Expires: 0');
		}
		$this->renderItems();
		if (!$this->disableHttpHeaders) {
			Yii::app()->end();
		}
	}

	public function init()
	{
		parent::init();

		$this->initColumns();
	}

	/**
	 * Creates column objects and initializes them.
	 */
	protected function initColumns()
	{
		if($this->columns===array())
		{
			if($this->dataProvider instanceof CActiveDataProvider)
				$this->columns=$this->dataProvider->model->attributeNames();
			else if($this->dataProvider instanceof IDataProvider)
			{
				// use the keys of the first row of data as the default columns
				$data=$this->dataProvider->getData();
				if(isset($data[0]) && is_array($data[0]))
					$this->columns=array_keys($data[0]);
			}
		}
		$id=$this->getId();
		foreach($this->columns as $i=>$column)
		{
			if(is_string($column))
				$column=$this->createDataColumn($column);
			elseif(is_array($column))
			{
				if(!isset($column['class'])) {
					// note: EDataColumn instead of CDataColumn
					$column['class']=$this->dataColumnClass;
				}
				$column=Yii::createComponent($column, $this);
			}
			if(!$this->includeInvisible && !$column->visible)
			{
				unset($this->columns[$i]);
				continue;
			} else {
				$column->visible = true;
			}
			if($column->id===null)
				$column->id=$id.'_c'.$i;
			$this->columns[$i]=$column;
		}

		foreach($this->columns as $column)
			$column->init();
	}


	/**
	 * Creates a {@link CDataColumn} based on a shortcut column specification string.
	 * @param string $text the column specification string
	 * @return CDataColumn the column instance
	 */
	protected function createDataColumn($text)
	{
		if(!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/',$text,$matches))
			throw new CException(Yii::t('zii','The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
		$column=array(
			'class'=>$this->dataColumnClass,
			'name'=>$matches[1],
		);
		if(isset($matches[3]) && $matches[3]!=='')
			$column['type']=$matches[3];
		if(isset($matches[5]))
			$column['header']=$matches[5];
		return Yii::createComponent($column, $this);
	}

	public function getDataReader() {
		$this->dataProvider->setPagination(false);
		$model = $this->dataProvider->model;
		$baseCriteria = $this->dataProvider->getCriteria();
		if (empty($baseCriteria->with)) {
			$command = $model->getCommandBuilder()->createFindCommand($model->tableSchema, $baseCriteria);
		} else {
			$finder = new EActiveFinder($model, $baseCriteria->with);
			$command = $finder->createCommand($baseCriteria);
		}
		$command->prepare();
		$command->execute($command->params);
		return new CDbDataReader($command);
	}

	/**
	 * Renders the data items for the grid view.
	 */
	public function renderItems()
	{
		$this->renderHeader();
		$this->renderBody();
		$this->renderFooter();
	}

	public function renderHeaderCellContent($column) {
		if($column->name!==null && $column->header===null)
		{
			if($this->dataProvider instanceof CActiveDataProvider)
				return $this->dataProvider->model->getAttributeLabel($column->name);
			else
				return $column->name;
		}
		else
			return trim($column->header)!=='' ? $column->header : $this->blankDisplay;
	}

	public function renderHeader()
	{
		$headers = array();
		foreach($this->columns as $column) {
			if ($this->encoding === null) {
				$headers[] = $this->renderHeaderCellContent($column);
			} else {
				$headers[] = iconv('UTF-8', $this->encoding, $this->renderHeaderCellContent($column));
			}
		}
		fputcsv($this->_fp, $headers, $this->delimiter, $this->enclosure);
	}

	public function renderBody()
	{
		$dataReader = $this->getDataReader();

		$row = 0;
		while ($data = $dataReader->read()) {
			fputcsv($this->_fp, $this->renderRow($row++, $data), $this->delimiter, $this->enclosure);
		}
	}

	/**
	 * @param integer $row the row number (zero-based).
	 * @param array $data result of CDbDataReader.read()
	 * @return array processed values ready for output
	 */
	public function renderRow($row, $data)
	{
		$values = array();

		$this->_model = $this->dataProvider->model->populateRecord($data);
		foreach($this->columns as $column) {
			$value = $column->getDataCellContent($row,$this->_model);
			if ($this->stripTags)
				$value = strip_tags($value);
			if ($this->replaceNewlines!==null)
				$value = str_replace("\n", $this->replaceNewlines, $value);
			if ($this->encoding !== null)
				$value = iconv('UTF-8', $this->encoding, $value);
			$values[] = $value;
		}
		return $values;
	}

	public function renderFooter()
	{
	}
}
