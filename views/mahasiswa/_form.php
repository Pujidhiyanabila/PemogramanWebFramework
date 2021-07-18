<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Prodi;
use app\models\Jurusan;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use kartik\date\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form -> field($model,'jekel')->radioList(array(
        'L'=>'Laki-Laki','P'=>'Perempuan')) ?>

    <?= $form->field($model, 'tgllahir')->widget(DatePicker::classname(),
        [
            'options' => ['placeholder' => 'Pilih Tanggal...'],
            'pluginOptions' => 
            [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]

        ]) ?>

    <?= $form->field($model, 'id_jurusan') -> dropDownList(Jurusan::getJurusan(),
        ['id' => 'cat-id', 'prompt' => 'Pilih Jurusan...']) ?>

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
        ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
