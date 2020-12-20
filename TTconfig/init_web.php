<?php

require_once dirname(__DIR__).'/TToolbox/core/Config.php';
\tt\core\Config::set(\tt\core\Config::PROJ_NAMESPACE_ROOT, 'ttdemo');
/*
\tt\core\Config::set(\tt\core\Config::CFG_PROJECT_DIR, dirname(__DIR__));
\tt\core\Config::set(\tt\core\Config::CFG_DIR, __DIR__);
\tt\core\Config::set(\tt\core\Config::CFG_SERVER_INIT_FILE, __DIR__.'/init_server.php');
\tt\core\Config::set(\tt\core\Config::DIR_3RDPARTY, dirname(__DIR__).'/thirdparty');
/**/
\tt\core\Config::startWeb();
