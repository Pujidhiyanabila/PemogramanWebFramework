<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="jenis-form">
	<div class="col-md-6">
	<?php $form = ActiveForm::begin(); ?>
	    <?= $form -> field($model,'nama_jenis')->textInput() ?>
	    <?= $form -> field($model,'keterangan')->textarea(array('rows'=>4)) ?>  
	    
	    <div class="form-group">
	    <?= Html::submitButton('Submit',['class'=>'btn btn-primary']) ?>
	    </div>
	</div>
</div> 
<?php ActiveForm::end(); ?>