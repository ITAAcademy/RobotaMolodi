<?php
/* @var $this ResumeController */
/* @var $model Resume */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resume-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_field'); ?>
		<?php echo $form->textField($model,'id_field',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_field'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary'); ?>
		<?php echo $form->textField($model,'salary'); ?>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_email'); ?>
		<?php echo $form->textField($model,'id_email',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_phone'); ?>
		<?php echo $form->textField($model,'id_phone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_file'); ?>
		<?php echo $form->textField($model,'id_file',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_photo'); ?>
		<?php echo $form->textField($model,'id_photo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->