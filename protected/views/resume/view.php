<?php
/* @var $this ResumeController */
/* @var $model Resume */

$this->breadcrumbs=array(
	'Resumes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Resume', 'url'=>array('index')),
	array('label'=>'Create Resume', 'url'=>array('create')),
	array('label'=>'Update Resume', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Resume', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Resume', 'url'=>array('admin')),
);
?>

<h1>View Resume #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'id_city',
		'id_field',
		'name',
		'create_date',
		'salary',
		'description',
		'id_email',
		'id_phone',
		'id_file',
		'id_photo',
	),
)); ?>
