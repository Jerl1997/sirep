<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Administrar'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Registrar') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mzgtproyvincsoci-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none;">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'mzgtproyvincsoci-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'PK_MZGTPROYVINCSOCI',
		'FK1_MZGTPROYVINCSOCI_INV_MZGTINSTITUCIONES_PK',
		'FK2_MZGTPROYVINCSOCI_INV_MZGTCINEAMPL_PK',
		'FK3_MZGTPROYVINCSOCI_INV_MZGTCINEESPC_PK',
		'FK4_MZGTPROYVINCSOCI_INV_MZGTALCANCES_PK',
		'MZGTPROYVINCSOCI_NOMBRE',
		/*
		'MZGTPROYVINCSOCI_MONTO',
		'MZGTPROYVINCSOCI_FECHAINICIO',
		'MZGTPROYVINCSOCI_FECHAFIN',
		'MZGTPROYVINCSOCI_NUMDOC',
		'MZGTPROYVINCSOCI_NUMEST',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>