<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo;

use tt\core\page\PG;
use tt\install\Installer;
use tt\run\Controller;
use tt\service\form\Form;
use tt\service\form\FormfieldHidden;

#require_once __DIR__.'/TTconfig/init_web.php';
require_once __DIR__ . '/TToolbox/install/Installer.php';
Installer::requireWebPointer();


echo "Hello world! " . time();

echo " [" . Controller::getWebLink('ttdemo\demo\DemoCss', 'CSS demo') . "]";

$form = new Form("test1", "TToolbox/run_api/", "Ajax demo");
$form->addField(new FormfieldHidden("class", "tt\\run_api\\Ajax"));
$form->addField(new FormfieldHidden("a", "b"));
echo $form;

PG::deliver();
