<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Data Supplier</h1>
<p>
	<?= Html::a('Create Supplier',['create'],['class' => 'btn btn-success']) ?>
</p>
<table class="table table-hover">
	<tr>
		<td>ID</td>
		<td>Nama Supplier</td>
		<td>No Telp</td>
		<td>Email</td>
		<td>Alamat</td>
		<td>Aksi</td>
	</tr>
	<?php foreach ($data_supplier as $supplier): ?>
		<tr>
			<td><?= Html::encode($supplier->id) ?></td>
			<td><?= Html::encode($supplier->nama_supplier) ?></td>
			<td><?= Html::encode($supplier->notelp) ?></td>
			<td><?= Html::encode($supplier->email) ?></td>
			<td><?= Html::encode($supplier->alamat) ?></td>
			<td>
				<?=Html::a('Edit',['supplier/update','id'=>$supplier->id])?> 
				|
				<?=Html::a('Hapus',['supplier/delete','id'=>$supplier->id],
				['onclick'=>'return(confirm("Yakin Menghapus Data?"))'])?>
			</td>
		</tr>
	<?php endforeach; ?>	
</table>
<?=LinkPager::widget(['pagination' => $pagination]) ?>