<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pegawai'); ?>
		<?php echo $form->textField($model,'id_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pegawai'); ?>
		<?php echo $form->textField($model,'nama_pegawai',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_pegawai'); ?>
		<?php echo $form->textArea($model,'alamat_pegawai',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_provinsi'); ?>
		<?php echo $form->textField($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kabupaten'); ?>
		<?php echo $form->textField($model,'id_kabupaten'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kecamatan'); ?>
		<?php echo $form->textField($model,'id_kecamatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->