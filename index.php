<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo;

use tt\alias\PG;
use tt\config\Init_project;
use tt\coremodule\pages\Start;
use tt\install\Installer;

require_once __DIR__ . '/TToolbox/run/Runner.php';
require_once __DIR__ . '/TToolbox/coremodule/pages/Start.php';

require_once __DIR__ . '/TToolbox/install/Installer.php';
Installer::requireInitPointer();

Init_project::initWeb(Start::PAGEID);

$class = new Start();
PG::add($class->runWeb())->deliver();
