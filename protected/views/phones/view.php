<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs=array(
	'Phones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Phones', 'url'=>array('index')),
	array('label'=>'Create Phones', 'url'=>array('create')),
	array('label'=>'Update Phones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Phones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1>View Phones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'phone',
	),
)); ?>
