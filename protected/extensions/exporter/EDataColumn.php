<?php
/**
 * EDataColumn class file.
 *
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.grid.CGridColumn');

/**
 *
 */
class EDataColumn extends CDataColumn {
	protected function renderDataCellContent($row,$data) {
		if (!$this->visible)
			return $this->grid->nullDisplay;
		else
			return parent::renderDataCellContent($row,$data);
	}

	public function getDataCellContent($row,$data) {
		ob_start();
		$this->renderDataCellContent($row,$data);
		return ob_get_clean();
	}
}
