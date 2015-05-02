<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Organizations',
);

$this->menu=array(
	array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h1>Organizations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
