<?php

namespace andykill\rosnedoros\components;

use yii\base\BaseObject;
use andykill\rosnedoros\models\Parsing as ParsingModel;
use andykill\rosnedoros\models\RosConfig;

class Parsing extends BaseObject {

//	private $url = 'https://pkk5.rosreestr.ru/api/features/1/';
	public $model;
	public $config;

	public function __construct(ParsingModel $model, RosConfig $cfg, $config = []) {
		$this->model = $model;
		$this->config = $cfg;
		parent::__construct($config);
	}

	/**
	 * 	Получает данные из Росреестра и записывает в таблицу
	 * @param array $cadastral_number
	 */
	public function parse(array $cadastral_number): bool {
		foreach ($cadastral_number as $value) {
			$cadastral_number = $this->trimCadastralNumber($value);
			$response = file_get_contents($this->config->getUrl($cadastral_number));
			$json = json_decode($response);
			if ($json) {
				$this->model->cadastral_number = $value;
				$this->model->address = $json->feature->attrs->address;
				$this->model->area = $json->feature->attrs->area_value;
				$this->model->price = $json->feature->attrs->cad_cost;
				return $this->model->save() == null ? FALSE : TRUE;
			}
		}
		return FALSE;
	}

	private function trimCadastralNumber(string $number): string {
		$exc = explode(':', $number);
		$pieces = array_map(function ($item) {
			return ltrim($item, '0');
		}, $exc);
		$result = implode(':', $pieces);
		return $result;
	}

}
