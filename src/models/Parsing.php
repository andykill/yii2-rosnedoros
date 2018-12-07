<?php

namespace andykill\rosnedoros\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "parsing".
 *
 * @property string $cadastral_number
 * @property string $address
 * @property int $price
 * @property int $area
 */
class Parsing extends ActiveRecord {

	static public function tableName() {
		return '{{%parsing}}';
	}

	public function rules() {
		return [
			[['cadastral_number', 'address'], 'string'],
			[['price', 'area'], 'number'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'cadastral_number' => 'Кадастр номер',
			'address' => 'Адрес',
			'price' => 'Стоимость',
			'area' => 'Площадь',
		];
	}

}
