<?php
/* @var $this ResumeController */
/* @var $model Resume */

$this->breadcrumbs=array(
	'Resumes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Resume', 'url'=>array('index')),
	array('label'=>'Create Resume', 'url'=>array('create')),
	array('label'=>'View Resume', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Resume', 'url'=>array('admin')),
);
?>

<h1>Update Resume <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>