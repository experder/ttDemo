<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2022 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\core\Config;
use tt\coremodule\dbmodell\core_routes;
use tt\coremodule\pages\Start;
use ttdemo\demo\demoajax\DemoAjax;
use ttdemo\demo\democss\DemoCss;

class MyModule extends \tt\core\modules\Module {

	const moduleId = "demo2";

	/**
	 * @inheritdoc
	 */
	function getModuleId() {
		return self::moduleId;
	}

	public function doUpdateDatabase() {

//		$route = new core_routes(array(
//			"route_id" => DemoAjax::PAGEID,
//			"title" => "Ajax demo",
//			"parent" => null,
//			"visible" => 1,
//			"target" => DemoAjax::getClass(),
//			"orderby" => 101,
//		));
//		$this->q(1, $route->sql_insert());
//		$route = new core_routes(array(
//			"route_id" => DemoCss::PAGEID,
//			"title" => "CSS demo",
//			"parent" => null,
//			"visible" => 1,
//			"target" => DemoCss::getClass(),
//			"orderby" => 102,
//		));
//		$this->q(2, $route->sql_insert());
		$route = new core_routes(array(
			"route_id" => 'demostart',
			"title" => "Start",
			"parent" => null,
			"visible" => 1,
			"target" => Config::get(Config::HTTP_ROOT) . '/index.php',
			"orderby" => -1,
		));
		$this->q(1, $route->sql_insert());

	}

}