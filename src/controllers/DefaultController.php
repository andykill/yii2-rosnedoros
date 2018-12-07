<?php

namespace andykill\rosnedoros\controllers;

use Yii;
use yii\web\Controller;
use andykill\rosnedoros\models\Parsing;
use andykill\rosnedoros\models\search\ParsingSearch;

class DefaultController extends Controller {

	public function actionIndex() {
		$model = new ParsingSearch();
		$dataProvider = $model->search(\Yii::$app->request->queryParams);
		return $this->render('index', [
					'model' => $model,
					'dataProvider' => $dataProvider,
		]);
	}

}
