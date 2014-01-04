<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
?>

<div class="form">
<?php if ($model_aux != NULL){?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=> 'aluno.id'
    'dataProvider' => $model_aux->search(),
    'filter'=>$model,
    
    'columns'=>array(
        'agencia',          // display the 'title' attribute
        'cc',
        'curso',// display the 'name' attribute of the 'category' relation
        
        array(            // display 'create_time' using an expression
            'name'=>'create_time',
            'value'=>'date("M j, Y", $data->create_time)',
        ),
        array(            // display 'author.username' using an expression
            'name'=>'authorName',
            'value'=>'$data->author->username',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),

)); ?>
<?php } ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); 
         //  $model_aux = new Pessoa(); 
        ?>

	<div class="row">
		<?php echo $form->labelEx($model_aux,'nome'); ?>
		<?php echo $form->textField($model_aux,'nome'); ?>
		<?php echo $form->error($model_aux,'nome'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->