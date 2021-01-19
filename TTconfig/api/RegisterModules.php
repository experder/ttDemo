<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace tt\api;

use tt\core\Modules;
use ttdemo\demo\DemoModule;

class RegisterModules extends \tt\core\api_default\RegisterModules {

	public static function registerModules(Modules $modules){

		$modules->register(new DemoModule());

	}

}