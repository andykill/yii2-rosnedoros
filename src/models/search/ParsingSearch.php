<?php

namespace andykill\rosnedoros\models\search;

use Yii;
use andykill\rosnedoros\models\Parsing as ParsingModel;
use andykill\rosnedoros\components\Parsing as ParsingComponents;
use yii\data\ActiveDataProvider;
use yii\di\Container;

class ParsingSearch extends ParsingModel {

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = ParsingModel::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);
		if (!$this->validate()) {
			return $dataProvider;
		}
		if ($this->cadastral_number) {
			$cadastral_number[] = $this->cadastral_number;
			if (strpos($this->cadastral_number, ',')) {
				$cadastral_number = explode(',', $this->cadastral_number);
			}
			$query->andWhere(['cadastral_number' => $cadastral_number]);
			$queryParse = clone $query;
			$all = $queryParse->createCommand()->queryAll();
			$array_isset = array_map(function ($item) {
//				print_r($item);
//				exit();
				return $item['cadastral_number'];
			}, $all);
			$result = array_diff($cadastral_number, $array_isset);
			if ($result) {
				\Yii::$container->set('andykill\rosnedoros\models\Parsing', 'andykill\rosnedoros\models\Parsing');
				\Yii::$container->set('andykill\rosnedoros\models\RosConfig', 'andykill\rosnedoros\models\RosConfig');
				$parsingComponents = \Yii::$container->get('andykill\rosnedoros\components\Parsing');
				$parsingComponents->parse($result);
			}
		}
//		print_r($query->createCommand()->getRawSql());
//		exit();
		return $dataProvider;
	}

}
