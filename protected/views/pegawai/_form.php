<?php
$this->avoidDoubleLoadJS(); 
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pegawai-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pegawai'); ?>
		<?php echo $form->textField($model,'nama_pegawai',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nama_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_pegawai'); ?>
		<?php echo $form->textArea($model,'alamat_pegawai',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'alamat_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_provinsi'); ?>
		<?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData(Provinsi::model()->findAll(),'id_provinsi','nama_provinsi'),array('empty'=>'--Pilih Provinsi--','class'=>'form-control')); ?>
		<?php echo $form->error($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kabupaten'); ?>
		<?php echo $form->dropDownList($model,'id_kabupaten',array(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'id_kabupaten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kecamatan'); ?>
		<?php echo $form->dropDownList($model,'id_kecamatan',array(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'id_kecamatan'); ?>
	</div>

	<div class="row buttons"> 
		<?php echo CHtml::Button($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','id'=>'save')); ?> 
		<?php echo CHtml::Button("Cancel",array('class'=>'btn btn-danger cancel-button')); ?> 
	</div> 

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	$(function(){
		//untuk cancel button, jika diklik form akan menghilang
		$(".cancel-button").click(function(){
			$(".form-x").fadeOut('slow',function(){
				$(".form-x").empty();
				$(".button-add").show();
			});
		});
		//jika tombol save klik
		$("#save").click(function(){ 
			$("#save").attr( 
				{'disabled':true,'value':'<?php echo $model->isNewRecord ? 'Creating...' : 'Saving...';?>'} 
			); 
			$.post($('#<?php echo $modelName;?>-form').attr('action'),$('#<?php echo $modelName;?>-form').serialize(),function(response){ 
				if(response.success==true){ 
					$('#<?php echo $modelName;?>-form')[0].reset();	
					$('#<?php echo $modelName;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{ 
					if(response.Pegawai_nama_pegawai){ 
						$("#Pegawai_nama_pegawai").addClass('error'); 
						$('#Pegawai_nama_pegawai_em_').html(response.Pegawai_nama_pegawai).show(); 
					}else{ 
						$("#Pegawai_nama_pegawai").removeClass('error'); 
						$('#Pegawai_nama_pegawai_em_').hide(); 
					} 
					if(response.Pegawai_alamat_pegawai){ 
						$("#Pegawai_alamat_pegawai").addClass('error'); 
						$('#Pegawai_alamat_pegawai_em_').html(response.Pegawai_alamat_pegawai).show(); 
					}else{ 
						$("#Pegawai_alamat_pegawai").removeClass('error'); 
						$('#Pegawai_alamat_pegawai_em_').hide(); 
					} 
					if(response.Pegawai_id_provinsi){ 
						$("#Pegawai_id_provinsi").addClass('error'); 
						$('#Pegawai_id_provinsi_em_').html(response.Pegawai_id_provinsi).show(); 
					}else{ 
						$("#Pegawai_id_provinsi").removeClass('error'); 
						$('#Pegawai_id_provinsi_em_').hide(); 
					} 
					if(response.Pegawai_id_kabupaten){ 
						$("#Pegawai_id_kabupaten").addClass('error'); 
						$('#Pegawai_id_kabupaten_em_').html(response.Pegawai_id_kabupaten).show(); 
					}else{ 
						$("#Pegawai_id_kabupaten").removeClass('error'); 
						$('#Pegawai_id_kabupaten_em_').hide(); 
					} 
					if(response.Pegawai_id_kecamatan){ 
						$("#Pegawai_id_kecamatan").addClass('error'); 
						$('#Pegawai_id_kecamatan_em_').html(response.Pegawai_id_kecamatan).show(); 
					}else{ 
						$("#Pegawai_id_kecamatan").removeClass('error'); 
							$('#Pegawai_id_kecamatan_em_').hide(); 
						} 
					} 
					$("#save").attr( 
						{'disabled':false,'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>'} 
					); 
			},'json'); 
		});

		//jika provinsi dipilih
		$("#Pegawai_id_provinsi").change(function(){
			//ambil attribute value
			var id_provinsi = $(this).val();
			//set menjadi ?id=id_provinsi
			var data = "id="+id_provinsi;
			//kirim dengan methode post
			//ini proses menampilkan data kabupaten dengan ajax berdasarkan provinsi
			//yang dipilih
			$.post('<?php echo $this->baseUrl();?>/pegawai/kabupaten',data,function(response){
				var option = "<option>--Pilih Kabupaten--</option>";
				$.each(response, function() {
					option += "<option value="+this.id_kabupaten+">"+this.nama_kabupaten+"</option>"
				});
				$("#Pegawai_id_kabupaten").html(option);
			},'json');
			$("#Pegawai_id_kecamatan").empty();
		});
		//jika kabupaten dipilih
		$("#Pegawai_id_kabupaten").change(function(){
			//ambil attribute value
			var id_kabupaten = $(this).val();
			//set menjadi ?id=id_provinsi
			var data = "id="+id_kabupaten;
			//kirim dengan methode post
			//ini proses menampilkan data kecamatan dengan ajax berdasarkan kabupaten
			//yang dipilih
			$.post('<?php echo $this->baseUrl();?>/pegawai/kecamatan',data,function(response){
				var option = "<option>--Pilih Kecamatan--</option>";
				$.each(response, function() {
					option += "<option value="+this.id_kecamatan+">"+this.nama_kecamatan+"</option>"
				});
				$("#Pegawai_id_kecamatan").html(option);
			},'json');
		});
	});
</script>
