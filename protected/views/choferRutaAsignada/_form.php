<?php
/* @var $this ChoferRutaAsignadaController */
/* @var $model ChoferRutaAsignada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chofer-ruta-asignada-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_chofer'); ?>
		<?php echo $form->textField($model,'id_chofer'); ?>
		<?php echo $form->error($model,'id_chofer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_ruta_asignada'); ?>
		<?php echo $form->textField($model,'id_ruta_asignada'); ?>
		<?php echo $form->error($model,'id_ruta_asignada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->