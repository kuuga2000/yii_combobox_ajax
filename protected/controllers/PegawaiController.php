<?php

class PegawaiController extends LessonController {

	//ini untuk ajax save, ini telah saya jelaskan pada tutorial menggunakan video sebelumnya.
	public function actionCreate() {
		$model = new Pegawai;

		if (isset($_POST['Pegawai'])) {
			$model -> attributes = $_POST['Pegawai'];
			if ($model -> validate()){
				if($model->save()){
					exit(json_encode(array(
						'success'=>true
					)));
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}
		$this -> renderPartial('_form', 
			array(
				'model' => $model,
				'modelName'=>strtolower(get_class($model))  
		),FALSE,TRUE);
	}

	public function actionUpdate($id) {
		$model = $this -> loadModel($id);

		if (isset($_POST['Pegawai'])) {
			$model -> attributes = $_POST['Pegawai'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id_pegawai));
		}

		$this -> render('update', 
			array(
					'model' => $model,
					'modelName'=>strtolower(get_class($model)) 
				)
			);
	}

	public function actionDelete($id) {
		$this -> loadModel($id) -> delete();
		if (!isset($_GET['ajax']))
			$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionAdmin() {
		$model = new Pegawai('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Pegawai']))
			$model -> attributes = $_GET['Pegawai'];

		$this -> render('admin', array('model' => $model, ));
	}

	public function loadModel($id) {
		$model = Pegawai::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
	
	public function actionKabupaten(){
		//untuk id provinsi
		$id = $_POST['id'];
		//get kabupaten by id_provinsi
		$KABUPATENS = Kabupaten::model()->findAll(array('condition'=>'id_provinsi=:id_provinsi','params'=>array(':id_provinsi'=>$id)));
		//variable kabupatens
		$kabupatens = array();
		//if kabupaten tidak kosong
		if(!empty($KABUPATENS)){
			//foreach
			foreach($KABUPATENS as $kabupaten){
				//set attribute value ke $kabupatens dalam bentuk array
				$kabupatens[] = $kabupaten->attributes;
			}
		}
		//exit dengan data kabupaten dalam bentuk json.
		exit(
			json_encode(!empty($kabupatens) ? ($kabupatens) : array())
		);
	}
	public function actionKecamatan(){
		//untuk id kabupaten
		$id = $_POST['id'];
		//get kecamatan by id_kabupaten
		$KECAMATANS = Kecamatan::model()->findAll(array('condition'=>'id_kabupaten=:id_kabupaten','params'=>array(':id_kabupaten'=>$id)));
		//variable kecamatans
		$kecamatans = array();
		//if kecamatan tidak kosong
		if(!empty($KECAMATANS)){
			//for each
			foreach($KECAMATANS as $kecamatan){
				//set attribute value ke $kecamatans dalam bentuk array
				$kecamatans[] = $kecamatan->attributes;
			}
		}
		//exit dengan data kecamatan dalam bentuk json.
		exit(
			json_encode(!empty($kecamatans) ? ($kecamatans) : array())
		);
	}
}
