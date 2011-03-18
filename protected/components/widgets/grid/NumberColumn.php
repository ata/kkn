<?php
Yii::import('zii.widgets.grid.CGridColumn');

class NumberColumn extends CGridColumn
{
	public $header = 'No.';
	
	public $htmlOptions=array('class'=>'number-column');
	
	protected function renderDataCellContent($row,$data)
	{
		echo $this->grid->dataProvider->pagination->currentPage 
			* $this->grid->dataProvider->pagination->pageSize + $row+1;
	}
}
