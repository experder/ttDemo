<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

/*
 * Server specific settings
 *
 * Server: SERVERNAME
 *
 */

\tt\database\Database::init('localhost', 'mytt', 'root', 'veryverysafe');

define('HTTP_SKIN', '/TTconfig/skins/skin1');

/*
\tt\config\Config::$DEVMODE = false;
/**/
