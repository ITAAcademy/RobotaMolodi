<?php
/* @var $this FieldController */
/* @var $model Field */

$this->breadcrumbs=array(
	'Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Field', 'url'=>array('index')),
	array('label'=>'Create Field', 'url'=>array('create')),
	array('label'=>'Update Field', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Field', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Field', 'url'=>array('admin')),
);
?>

<h1>View Field #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
