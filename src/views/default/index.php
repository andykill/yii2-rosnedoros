<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
?>
<div class="row">
	<div class="col-12">
		<?php $form = ActiveForm::begin(['method' => 'get']); ?>
		<?= $form->field($model, 'cadastral_number')->textInput(['maxlength' => true]) ?>
		<div class="form-group">
			<?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
		</div>
		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-12">

		<?=
		GridView::widget([
			'dataProvider' => $dataProvider,
//			'filterModel' => $model,
			'columns' => [
				'cadastral_number',
				'address',
				'price',
				'area',
			]
		]);
		?>
	</div>
</div>