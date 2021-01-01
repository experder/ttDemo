<?php

namespace tt\config;

class Init {

	private static function loadConfig() {

		require_once dirname(__DIR__) . '/TToolbox' . '/core/Config.php';
		\tt\core\Config::set(\tt\core\Config::PROJ_NAMESPACE_ROOT, 'ttdemo');
		\tt\core\Config::set(\tt\core\Config::CFG_DIR, __DIR__);
		/*
		\tt\core\Config::set(\tt\core\Config::CFG_PROJECT_DIR, dirname(__DIR__));
		\tt\core\Config::set(\tt\core\Config::CFG_SERVER_INIT_FILE, __DIR__.'/init_server.php');
		\tt\core\Config::set(\tt\core\Config::DIR_3RDPARTY, dirname(__DIR__).'/thirdparty');
		/**/

		//Enable multi Autoloader (Autoloader doesn't terminate on error):
		#require_once dirname(__DIR__) . '/TToolbox'.'/core/Autoloader.php';
		#\tt\core\Autoloader::multipleAutoloader();

	}

	public static function initWeb() {
		self::loadConfig();
		\tt\core\Config::startWeb();
	}

	public static function initAjax() {
		self::loadConfig();
		\tt\core\Config::startAjax();
	}

}
