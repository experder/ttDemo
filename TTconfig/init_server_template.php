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

/*
\tt\config\Config::$DEVMODE = false;
/**/
