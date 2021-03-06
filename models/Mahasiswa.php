<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string $nim
 * @property string $nama
 * @property string $jekel
 * @property int $id_prodi
 * @property string $email
 * @property string $alamat
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    public $gambar;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama', 'jekel', 'tgllahir', 'id_jurusan', 'id_prodi', 'email', 'alamat'], 'required'],
            [['tgllahir'], 'safe'],
            [['id_jurusan', 'id_prodi'], 'integer'],
            [['nim'], 'string', 'max' => 18],
            [['nama', 'email'], 'string', 'max' => 50],
            [['jekel'], 'string', 'max' => 1],
            [['alamat'], 'string', 'max' => 100],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['id_jurusan' => 'id']],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id_prodi' => 'id']],
            ['foto', 'string', 'max' => 100],
            ['gambar', 'file', 'extensions' => 'jpg. jpeg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'nama' => 'Nama',
            'jekel' => 'Jenis Kelamin',
            'tgllahir' => 'Tanggal Lahir',
            'id_jurusan' => 'ID Jurusan',
            'id_prodi' => 'ID Prodi',
            'email' => 'Email',
            'alamat' => 'Alamat',
        ];
    }

    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id' => 'id_jurusan']);
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'id_prodi']);
    }
    public function upload()
    {
        if($this->validate()) {
            $this->foto->saveAs('uploads/' . $this->foto->baseName .
                '.' . $this->foto->extension);
            return true;
        } else {
            return false;
        }
    }
}
