<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo;

use tt\install\Installer;
use tt\core\page\Page;
use tt\run\Controller;

#define('HTTP_SKIN', '/ttfabian/ttDemo/TTconfig/skins/skin1');
#require_once __DIR__.'/TToolbox/debug/Error.php';
#new Error("!");

#require_once __DIR__.'/TTconfig/init_web.php';
require_once __DIR__.'/TToolbox/install/Installer.php';
Installer::requireWebPointer();


echo "Hello world! ".time();

echo " [".Controller::getWebLink('ttdemo\demo\DemoCss','CSS demo')."]";
echo " [<a href='demo/demo.php'>demo.php</a>]";

Page::getInstance()->deliver();
