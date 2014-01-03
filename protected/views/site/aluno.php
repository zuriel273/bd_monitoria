<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aluno-aluno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'banco'); ?>
		<?php echo $form->textField($model,'banco'); ?>
		<?php echo $form->error($model,'banco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agencia'); ?>
		<?php echo $form->textField($model,'agencia'); ?>
		<?php echo $form->error($model,'agencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc'); ?>
		<?php echo $form->textField($model,'cc'); ?>
		<?php echo $form->error($model,'cc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curso'); ?>
		<?php echo $form->textField($model,'curso'); ?>
		<?php echo $form->error($model,'curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ano_ingresso'); ?>
		<?php echo $form->textField($model,'ano_ingresso'); ?>
		<?php echo $form->error($model,'ano_ingresso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'historico'); ?>
		<?php echo $form->textField($model,'historico'); ?>
		<?php echo $form->error($model,'historico'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->