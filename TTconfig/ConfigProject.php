<?php

namespace ttcfg;

require_once dirname(__DIR__) . '/TToolbox' . '/core/Config.php';

use tt\core\Config;
use tt\core\Modules;

/**
 * Project-specific configuration
 */
class ConfigProject {

	/**
	 * Pt.1: Executed first. Then: Server-specific config
	 */
	public static function ConfigPt1() {

		Config::set(Config::PROJECT_TITLE, "TT demo");

		Config::set(Config::NAMESPACE_PROJECT_ROOT, 'ttdemo');

		Config::set(Config::DIR_PROJECT_ROOT, dirname(__DIR__));
		Config::set(Config::DIR_CFG, __DIR__);
		Config::set(Config::DIR_TT, dirname(__DIR__) . '/TToolbox');
		Config::set(Config::DIR_3RDPARTY, dirname(__DIR__) . '/thirdparty');

		//Enable multi Autoloader (Autoloader doesn't terminate on error):
		#require_once dirname(__DIR__) . '/TToolbox'.'/core/Autoloader.php';
		#\tt\core\Autoloader::multipleAutoloader();

		//Pt.2: Server-specific config.
		Config::set(Config::CFG_SERVER_INIT_FILE, __DIR__ . '/ConfigServer.php');


		#Config::$project_initialized = true;

	}

	/**
	 * Pt.3: Executed after Server-specific config.
	 */
	public static function ConfigPt3() {

		Config::set(Config::SKIN_NAVI_HEIGHT, '31'/*px*/);

	}

	public static function registerModules(Modules $modules) {
		$modules->register2(new \ttdemo\demo\MyModule());
		$modules->register2(new \myproject\new_module\ExampleModule());
		$modules->register2(new \myproject\demo_module\DemoModule());
	}

	public static function registerNamespaceRoots() {
		return array(
			"myproject" => Config::get(Config::DIR_TT) . '/demo_project',
		);
	}

}
