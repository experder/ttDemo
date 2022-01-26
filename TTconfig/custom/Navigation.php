<?php
/*
 * This file is part of the TT toolbox;
 * Copyright (C) 2014-2022 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttcfg\custom;

use tt\core\navigation\NaviStatic;
use ttdemo\demo\MyModule;

class Navigation extends \tt\core\navigation\Navigation {

	protected function load_static() {
		$naviStatic = new NaviStatic();
		$navi = $naviStatic->getStaticNavi2();

		foreach (MyModule::getRoutes() as $route){
			$navi[] = $route;
		}

		$this->setEntries($navi);
	}

}