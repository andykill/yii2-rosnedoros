<?php

namespace andykill\rosnedoros;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

	public function bootstrap($app) {
//		$app->getUrlManager()->addRules([
//			'/' => '/rosnedoros/default/index',
//				], false);
		$app->setModule('rosnedoros', 'andykill\rosnedoros\Module');
	}

}
