<?php
//class LessonController yg extends ke Controller
Class LessonController extends Controller {
	//gunakan layout bootstrap;
	public $layout = 'bootstrap';
	//set baseUrl supaya nanti bisa panggil dengan nama fungsinya saja.
	//inti nya biar gak repot2 ketik Yii:app lagi.
	public function baseUrl() {
		return Yii::app() -> getBaseUrl(TRUE);
	}

	//bikin function untuk filter request by ajax
	public function isAjax() {
		return Yii::app() -> request -> isAjaxRequest;
	}

	//bikin function supaya tidak load jquery lagi
	public function avoidDoubleLoadJS() {
		$cs = Yii::app() -> clientScript;
		return $cs -> scriptMap = array('jquery.js' => false, 'jquery.ui.js' => false, );
	}

}
?>
