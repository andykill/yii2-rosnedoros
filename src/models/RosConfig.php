<?php

namespace andykill\rosnedoros\models;

use yii\base\Model;

/**
 *
 * @property string $url
 *
 */
class RosConfig extends Model {

	public $url = 'https://pkk5.rosreestr.ru/api/features/1/';

	public function getUrl($number) {
		return $this->url . $number;
	}

}
