<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $satuan
 * @property int $id_jenis
 * @property int $id_supplier
 * @property float $harga
 * @property int $stok
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang', 'satuan', 'id_jenis', 'id_supplier', 'harga', 'stok'], 'required'],
            [['id_jenis', 'id_supplier', 'stok'], 'integer'],
            [['harga'], 'number'],
            [['kode_barang'], 'string', 'max' => 10],
            [['nama_barang'], 'string', 'max' => 50],
            [['satuan'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'satuan' => 'Satuan',
            'id_jenis' => 'Id Jenis',
            'id_supplier' => 'Id Supplier',
            'harga' => 'Harga',
            'stok' => 'Stok',
        ];
    }
}
