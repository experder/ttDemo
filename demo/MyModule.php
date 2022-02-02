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

class MyModule extends \tt\core\modules\Module {

	const moduleId = "demo2";

	/**
	 * @inheritdoc
	 */
	function getModuleId() {
		return self::moduleId;
	}

	/**
	 * @return core_routes[]
	 */
	public static function getRoutes(){
		return array(
			"1" => new core_routes(array(
				"route_id" => 'demostart',
				"title" => "Start",
				"parent" => null,
				"visible" => 1,
				"target" => Config::get(Config::HTTP_ROOT) . '/index.php',
				"orderby" => -1,
			)),
		);
	}

	public function doUpdateDatabase() {

		$routes = self::getRoutes();

		$this->q(1, $routes["1"]->getSqlInsert());

	}

}