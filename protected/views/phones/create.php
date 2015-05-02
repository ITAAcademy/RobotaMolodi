<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs=array(
	'Phones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Phones', 'url'=>array('index')),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1>Create Phones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>