<?php
/* @var $this ResumeController */
/* @var $model Resume */

$this->breadcrumbs=array(
	'Resumes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Resume', 'url'=>array('index')),
	array('label'=>'Manage Resume', 'url'=>array('admin')),
);
?>

<h1>Create Resume</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>