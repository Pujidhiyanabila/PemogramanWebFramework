<?php 
namespace app\models;

use yii\db\ActiveRecord;

class supplier extends ActiveRecord
{
	public static function tableName()
	{
		return 'supplier';
	}
	public function rules()
	{
		return [
			[['nama_supplier','notelp','email','alamat'], 'required'],
			[['nama_supplier','notelp','email','alamat'], 'string'],
		];
	}
}
?>