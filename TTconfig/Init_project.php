<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace tt\config;

use tt\core\Config;

require_once dirname(__DIR__) . '/TToolbox' . '/core/Config.php';

Init_project::loadConfig();

class Init_project {

	public static function loadConfig() {

		Config::set(Config::PROJ_NAMESPACE_ROOT, 'ttdemo');

		Config::set(Config::CFG_DIR, __DIR__);

		#Config::set(Config::CFG_PROJECT_DIR, '#CFG_PROJECT_DIR');
		Config::set(Config::CFG_PROJECT_DIR, dirname(__DIR__));

		Config::set(Config::CFG_SERVER_INIT_FILE, __DIR__ . '/init_server.php');

		Config::set(Config::DIR_3RDPARTY, dirname(__DIR__) . '/thirdparty');

		Config::set(Config::CFG_API_DIR, Config::get(Config::CFG_DIR) . '/api');

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

}
