<style> 
table tbody td:last-child{ 
width:15% !important; 
} 
</style> 
<?php echo CHtml::ajaxButton( 
	' Add New ', 
	array($this->id.'/create',), 
	array('update' => ".form-x", 
		'beforeSend' => 'function(){ 
			$(".btn-x").attr({"value":"Loading...","disabled":true,}); 
		}', 
		'complete' => 'function(){
			$(".button-add").hide(); 
			$(".form-x").fadeIn("slow");
			$(".btn-x").attr({"value":" Add New ","disabled":false,}); 
		}', 
	), 
	array('class'=>'btn btn-default button-add') 
);?>
<div class="form-x"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pegawai-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-bordered',
	'columns'=>array(
		'id_pegawai',
		'nama_pegawai',
		'alamat_pegawai',
		//untuk menampilkan data provinsi
		array(
			'name'=>'id_provinsi',
			'value'=>function($data) use ($model){
				return $model->getProvinsi($data->id_provinsi);
			},
			'type'=>'HTML',
		),
		//untuk menampilkan data kabupaten
		array(
			'name'=>'id_kabupaten',
			'value'=>function($data) use ($model){
				return $model->getKabupaten($data->id_kabupaten);
			},
			'type'=>'HTML',
		),
		//untuk menampilkan data kecamatan
		array(
			'name'=>'id_kecamatan',
			'value'=>function($data) use ($model){
				return $model->getKecamatan($data->id_kecamatan);
			},
			'type'=>'HTML',
		),
		/*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
