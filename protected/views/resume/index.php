<?php
/* @var $this ResumeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Resumes',
);

$this->menu=array(
	array('label'=>'Create Resume', 'url'=>array('create')),
	array('label'=>'Manage Resume', 'url'=>array('admin')),
);
?>

<h1>Resumes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
