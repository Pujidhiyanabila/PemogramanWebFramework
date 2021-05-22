<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\prodi
?>
<div class="mahasiswa-form">
	<div class="col-md-6">
	<?php $form = ActiveForm::begin(); ?>
	    <?= $form -> field($model,'nim')->textInput() ?>
	    <?= $form -> field($model,'nama')->textInput() ?>
	    <?php $model->isNewRecord==1? $model->jekel='L':$model->jekel; ?>
	    <?= $form -> field($model,'jekel')->radioList(array(
	        'L'=>'Laki-Laki','P'=>'Perempuan')) -> label('Jenis Kelamin') ?>
	    <?= $form -> field($model,'id_prodi')->dropDownList(
	        ArrayHelper::map(Prodi::find()->all(),'id','prodi'),
	        ['prompt'=>'Pilih']) ->label('Prodi'); ?>
	    <?= $form -> field($model,'email')->textInput() ?>
	    <?= $form -> field($model,'alamat')->textarea(array('rows'=>4)) ?>    
	    <div class="form-group">
	    <?= Html::submitButton('Submit',['class'=>'btn btn-primary']) ?>
	    </div>
	</div>
</div> 
<?php ActiveForm::end(); ?>