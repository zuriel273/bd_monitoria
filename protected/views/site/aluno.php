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

	<?php echo $form->errorSummary($model); 
         //  $model_aux = new Pessoa(); 
        ?>

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
     
        <!--
               formulario de pessoa imbutido no form de Aluno
                     'cpf' => 'Cpf',
			'id' => 'ID',
			'nome' => 'Nome',
			'email' => 'Email',
			'senha' => 'Senha',
			'rg' => 'Rg',
			'orgao_emissor' => 'Orgao Emissor',
			'endereco' => 'Endereco',
			'telefone' => 'Telefone',
			'tipo' => 'Tipo',
			'matricula' => 'Matricula',
			'professor_id_professor' => 'Professor Id Professor',
			'aluno_id_aluno' => 'Aluno Id Aluno',
        -->
        
        <!--formulario de pessoa -->
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'cpf'); ?>
		<?php echo $form->textField($model_aux,'cpf'); ?>
		<?php echo $form->error($model_aux,'cpf'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'nome'); ?>
		<?php echo $form->textField($model_aux,'nome'); ?>
		<?php echo $form->error($model_aux,'nome'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'email'); ?>
		<?php echo $form->textField($model_aux,'email'); ?>
		<?php echo $form->error($model_aux,'email'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'rg'); ?>
		<?php echo $form->textField($model_aux,'rg'); ?>
		<?php echo $form->error($model_aux,'rg'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'orgao_emissor'); ?>
		<?php echo $form->textField($model_aux,'orgao_emissor'); ?>
		<?php echo $form->error($model_aux,'orgao_emissor'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'endereco'); ?>
		<?php echo $form->textField($model_aux,'endereco'); ?>
		<?php echo $form->error($model_aux,'endereco'); ?>
	</div>
        
         <div class="row">
		<?php echo $form->labelEx($model_aux,'telefone'); ?>
		<?php echo $form->textField($model_aux,'telefone'); ?>
		<?php echo $form->error($model_aux,'telefone'); ?>
	</div>
        
         <div class="row">
		<?php echo $form->labelEx($model_aux,'tipo'); ?>
		<?php echo $form->textField($model_aux,'tipo'); ?>
		<?php echo $form->error($model_aux,'tipo'); ?>
	</div>
        
         <div class="row">
		<?php echo $form->labelEx($model_aux,'matricula'); ?>
		<?php echo $form->textField($model_aux,'matricula'); ?>
		<?php echo $form->error($model_aux,'matricula'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_aux,'senha'); ?>
		<?php echo $form->textField($model_aux,'senha'); ?>
		<?php echo $form->error($model_aux,'senha'); ?>
	</div>
                 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->