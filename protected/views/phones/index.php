<?php
/* @var $this PhonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Phones',
);

$this->menu=array(
	array('label'=>'Create Phones', 'url'=>array('create')),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1>Phones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
