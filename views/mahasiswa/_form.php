<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Prodi;
use app\models\Jurusan;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;



/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form -> field($model,'jekel')->radioList(array('L'=>'Laki-Laki','P'=>'Perempuan')) -> label('Jenis Kelamin') ?>

    <?= $form->field($model, 'tgllahir')->textInput() -> label('Tanggal Lahir') ?>

    <?= $form->field($model, 'id_jurusan') -> dropDownList(Jurusan::getJurusan(),
        ['id' => 'cat-id', 'prompt' => 'Pilih Jurusan...']) -> label('ID Jurusan') ?>

    <?= $form->field($model, 'id_prodi') -> widget(DepDrop::classname(),
        [
            'data' => Prodi::getProdiList($model->id_jurusan),
            'options' => ['id' => 'prodi', 'prompt' => 'Pilih Prodi...'],
            'pluginOptions' => 
            [
                'depends' => ['cat-id'],
                'placeholder' => 'Pilih Prodi...',
                'url' => Url::to(['mahasiswa/subcat'])
            ]
        ]) -> label('ID Prodi') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
