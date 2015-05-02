<?php
/* @var $this FieldController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fields',
);

$this->menu=array(
	array('label'=>'Create Field', 'url'=>array('create')),
	array('label'=>'Manage Field', 'url'=>array('admin')),
);
?>

<h1>Fields</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
