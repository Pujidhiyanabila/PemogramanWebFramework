<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Data Jenis</h1>
<p>
	<?= Html::a('Create Jenis',['create'],['class' => 'btn btn-success']) ?>
</p>
<table class="table table-hover">
	<tr>
		<td>ID</td>
		<td>Nama Jenis</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php foreach ($data_jenis as $jenis): ?>
		<tr>
			<td><?= Html::encode($jenis->id) ?></td>
			<td><?= Html::encode($jenis->nama_jenis) ?></td>
			<td><?= Html::encode($jenis->keterangan) ?></td>
			<td>
				<?=Html::a('Edit',['jenis/update','id'=>$jenis->id])?> 
				|
				<?=Html::a('Hapus',['jenis/delete','id'=>$jenis->id],
				['onclick'=>'return(confirm("Yakin Menghapus Data?"))'])?>
			</td>
		</tr>
	<?php endforeach; ?>	
</table>
<?=LinkPager::widget(['pagination' => $pagination]) ?>