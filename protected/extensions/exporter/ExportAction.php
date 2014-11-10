<?php

class ExportAction extends CAction {
	/**
	 * @var array CGridView columns definition
	 */
	public $columns;
	/**
	 * @var string if the $widget property doesn't contain a dataProvider,
	 * a model of this class will be instantiated to call the search() method witch should return a dataProvider.
	 */
	public $modelClass;

	/**
	 * @var mixed string with widget class name or array with widget options, defaults to CsvView
	 */
	public $widget;

	public function run() {
		// set some defaults
		$widgetDefaults = array(
			'class'=>'ext.exporter.CsvView',
			'dataColumnClass' => 'ext.exporter.EDataColumn',
			'columns'=>$this->columns,
		);
		if ($this->widget === null)
			$this->widget = array();
		elseif (is_string($this->widget))
			$this->widget = array('class'=>$this->widget);
		$this->widget = array_merge($widgetDefaults, $this->widget);

		// as this could be expensive, create a dataProvider only if one wasn't provided
		if (!isset($this->widget['dataProvider'])) {
			$model = new $this->modelClass('search');
			$this->widget['dataProvider'] = $model->search($this->columns);
		}

		// set timer to 5 minutes
		set_time_limit(3600);

		$widget = $this->widget['class'];
		unset($this->widget['class']);
		$this->controller->widget($widget, $this->widget);
	}
}

