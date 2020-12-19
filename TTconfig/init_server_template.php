<?php
/*
 * Server specific settings
 *
 * Server: SERVERNAME
 *
 */

\tt\database\Database::init('localhost', 'mytt', 'root', 'veryverysafe');

define('HTTP_RUN', '/TToolbox/run');
define('HTTP_SKIN', '/TTconfig/skins/skin1');

define('DIR_3RDPARTY', dirname(__DIR__).'/thirdparty');
define('HTTP_3RDPARTY', '/thirdparty');

\tt\config\Config::setPlatform(\tt\config\Config::PLATFORM_UNKNOWN);

/*
\tt\config\Config::$DEVMODE = false;
/**/
