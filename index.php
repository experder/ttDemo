<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo;

use tt\core\Config;
use tt\core\page\PG;
use tt\install\Installer;
use tt\run\Controller;

#require_once __DIR__.'/TTconfig/Init.php';

require_once __DIR__ . '/TToolbox/install/Installer.php';
Installer::requireInitPointer();

Config::startWeb2('ttdemo_index');


PG::add(" [" . Controller::getWebLink('ttdemo\demo\DemoCss', 'CSS demo') . "]");

PG::add(" [" . Controller::getWebLink('ttdemo\demo\DemoAjax', 'Ajax demo') . "]");


PG::deliver();
