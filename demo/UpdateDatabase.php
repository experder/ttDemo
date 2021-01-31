<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\core\Config;
use tt\coremodule\dbmodell\core_navigation;
use ttdemo\demo\demoajax\DemoAjax;
use ttdemo\demo\democss\DemoCss;

class UpdateDatabase extends \tt\moduleapi\UpdateDatabase {

	protected function doUpdate() {

		$this->q(1, core_navigation::toSql_insert(DemoAjax::PAGEID, "Ajax demo", DemoAjax::getClass()));
		$this->q(2, core_navigation::toSql_insert(DemoCss::PAGEID, "CSS demo", DemoCss::getClass()));
		$this->q(3, core_navigation::toSql_insert("ttdemo_index", "Start", Config::get(Config::HTTP_ROOT) . '/index.php', true));

	}
}