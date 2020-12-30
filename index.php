<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo;

use tt\core\Config;
use tt\core\page\Page;
use tt\core\page\PG;
use tt\install\Installer;
use tt\run\Controller;
use tt\service\form\Form;
use tt\service\form\FormfieldText;
use tt\service\js\Js;

#require_once __DIR__.'/TTconfig/init_web.php';
require_once __DIR__ . '/TToolbox/install/Installer.php';
Installer::requireWebPointer();


PG::add(" [" . Controller::getWebLink('ttdemo\demo\DemoCss', 'CSS demo') . "]");

$form = new Form(null, "", "Ajax Test #1", "get", array(
	"onsubmit"=>(Js::ajaxPostToMessages("html",null,null,"{cmd:'test1',foo:'bar',key1:$('#key1').val()}"))."return false;",
));
$form->addField(new FormfieldText("key1",null,null,true,array("id"=>"key1")));
PG::add($form);

#Page::getInstance()->addJs("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js");

PG::deliver();
