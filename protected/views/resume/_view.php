<?php
/* @var $this ResumeController */
/* @var $data Resume */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::encode($data->id_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_field')); ?>:</b>
	<?php echo CHtml::encode($data->id_field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary')); ?>:</b>
	<?php echo CHtml::encode($data->salary); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_email')); ?>:</b>
	<?php echo CHtml::encode($data->id_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_phone')); ?>:</b>
	<?php echo CHtml::encode($data->id_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_file')); ?>:</b>
	<?php echo CHtml::encode($data->id_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_photo')); ?>:</b>
	<?php echo CHtml::encode($data->id_photo); ?>
	<br />

	*/ ?>

</div>