<?php 
namespace app\models;

use yii\db\ActiveRecord;

class jenis extends ActiveRecord
{
	public static function tableName()
	{
		return 'jenis';
	}
	public function rules()
	{
		return [
			[['nama_jenis','keterangan'], 'required'],
			[['nama_jenis','keterangan'], 'string'],
		];
	}
}
?>