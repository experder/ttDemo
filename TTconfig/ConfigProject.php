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

	}

	/**
	 * Pt.3: Executed after Server-specific config.
	 */
	public static function ConfigPt3() {

		Config::set(Config::HTTP_TTROOT, Config::get(Config::HTTP_ROOT) . '/TToolbox');

		Config::set(Config::HTTP_SKIN, Config::get(Config::HTTP_TTROOT) . '/demo_project/TTconfig/skins/skin1');
		#Config::set(Config::HTTP_SKIN, Config::get(Config::HTTP_ROOT) . '/' . basename(Config::get(Config::CFG_DIR)) . '/skins/skin1');

		Config::set(Config::HTTP_3RDPARTY, Config::get(Config::HTTP_ROOT) . '/thirdparty');

		Config::set(Config::SKIN_NAVI_HEIGHT, '31'/*px*/);

		#Config::set(Config::RUN_ALIAS_API, Config::get(Config::HTTP_TTROOT) . '/run_api/');
		Config::set(Config::RUN_ALIAS_API, Config::get(Config::HTTP_TTROOT) . '/run/');

		#Please put this setting in your ConfigServer.php:
		#Config::set(Config::RUN_ALIAS, Config::get(Config::HTTP_TTROOT) . '/run/?c=');

	}

	public static function registerModules(Modules $modules) {
		$modules->register2(new \myproject\new_module\ExampleModule());
		$modules->register2(new \myproject\demo_module\DemoModule());
		$modules->register2(new \ttdemo\demo\MyModule());
		$modules->register2(new \tttools1\Tools1Module());
	}

	public static function registerNamespaceRoots() {
		return array(
			"myproject" => Config::get(Config::DIR_TT) . '/demo_project',
			"tttools1" => Config::get(Config::DIR_PROJECT_ROOT) . '/ttTools1',
		);
	}

}
