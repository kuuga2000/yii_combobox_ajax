<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id_pegawai
 * @property string $nama_pegawai
 * @property string $alamat_pegawai
 * @property integer $id_provinsi
 * @property integer $id_kabupaten
 * @property integer $id_kecamatan
 */
class Pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_pegawai, alamat_pegawai, id_provinsi, id_kabupaten, id_kecamatan', 'required'),
			array('id_provinsi, id_kabupaten, id_kecamatan', 'numerical', 'integerOnly'=>true),
			array('nama_pegawai', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pegawai, nama_pegawai, alamat_pegawai, id_provinsi, id_kabupaten, id_kecamatan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pegawai' => 'Id Pegawai',
			'nama_pegawai' => 'Nama Pegawai',
			'alamat_pegawai' => 'Alamat Pegawai',
			'id_provinsi' => 'Provinsi',
			'id_kabupaten' => 'Kabupaten',
			'id_kecamatan' => 'Kecamatan',
		);
	}

	//untuk mendapatkan provinsi
	public function getProvinsi($id){
		$data = Provinsi::model()->findByPk($id);
		return empty($data) ? null : $data->nama_provinsi;
	}

	//untuk mendapatkan kabupaten
	public function getKabupaten($id){
		$data = Kabupaten::model()->findByPk($id);
		return empty($data) ? null : $data->nama_kabupaten;
	}

	//untuk mendapatkan kecamatan
	public function getKecamatan($id){
		$data = Kecamatan::model()->findByPk($id);
		return empty($data) ? null : $data->nama_kecamatan;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pegawai',$this->id_pegawai);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('alamat_pegawai',$this->alamat_pegawai,true);
		$criteria->compare('id_provinsi',$this->id_provinsi);
		$criteria->compare('id_kabupaten',$this->id_kabupaten);
		$criteria->compare('id_kecamatan',$this->id_kecamatan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}