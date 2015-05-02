<?php
/* @var $this FieldController */
/* @var $model Field */

$this->breadcrumbs=array(
	'Fields'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Field', 'url'=>array('index')),
	array('label'=>'Create Field', 'url'=>array('create')),
	array('label'=>'View Field', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Field', 'url'=>array('admin')),
);
?>

<h1>Update Field <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>