<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2022 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttcfg;

require_once dirname(__DIR__) . '/TToolbox' . '/core/Config.php';
require_once dirname(__DIR__) . '/TToolbox' . '/core/Config_project_interface.php';

use tt\core\Config;
use tt\core\Config_project_interface;
use tt\core\Modules;

class Config_project implements Config_project_interface {

	public static function loadConfig() {

		Config::set(Config::PROJ_TITLE, "TT demo");

		Config::set(Config::PROJ_NAMESPACE_ROOT, 'ttdemo');

		Config::set(Config::CFG_DIR, __DIR__);

		Config::set(Config::CFG_DIR_TT, dirname(__DIR__) . '/' . 'TToolbox');

		Config::set(Config::CFG_PROJECT_DIR, dirname(__DIR__));

		Config::set(Config::CFG_SERVER_INIT_FILE, __DIR__ . '/Config_server.php');

		Config::set(Config::DIR_3RDPARTY, dirname(__DIR__) . '/thirdparty');

		Config::set(Config::USE_NEW_NAVIGATION, true);

		//Enable multi Autoloader (Autoloader doesn't terminate on error):
		#require_once dirname(__DIR__) . '/TToolbox'.'/core/Autoloader.php';
		#\tt\core\Autoloader::multipleAutoloader();

		Config::$project_initialized = true;

	}

	/**
	 * @param string $pid unique page id
	 * @return \tt\core\page\Page
	 */
	public static function initWeb($pid) {
		return Config::init_web($pid);
	}

	public static function initApi() {
		Config::init_api();
	}

	public static function initCli() {
		Config::init_cli();
	}

	public static function registerModules(Modules $modules) {
		#$modules->register(new \ttdemo\demo\Module());
		$modules->register2(new \myproject\new_module\MyModule());
	}

	public static function registerNamespaceRoots(){
		return array(
			"myproject" => Config::get(Config::CFG_DIR_TT) . '/demo_project',
		);
	}

//	public static function registerModules(Modules $modules) {
//		$modules->register(new \myproject\new_module\MyModule());
//	}
//
//	public static function registerNamespaceRoots(){
//		return array(
//			"myproject"=>dirname(__DIR__).'/TToolbox/demo_project',
//		);
//	}

}

Config_project::loadConfig();
