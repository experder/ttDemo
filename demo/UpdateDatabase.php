<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\core\Config;
use tt\coremodule\dbmodell\core_pages;
use ttdemo\demo\demoajax\DemoAjax;
use ttdemo\demo\democss\DemoCss;

class UpdateDatabase extends \tt\moduleapi\UpdateDatabase {

	protected function doUpdate() {

		$this->q(1, core_pages::toSql_insert(DemoAjax::PAGEID, core_pages::TYPE_web, "Ajax demo", DemoAjax::getClass()));
		$this->q(2, core_pages::toSql_insert(DemoCss::PAGEID, core_pages::TYPE_web, "CSS demo", DemoCss::getClass()));
		$this->q(3, core_pages::toSql_insert("ttdemo_index", core_pages::TYPE_int, "Start", Config::get(Config::HTTP_ROOT) . '/index.php'));

//		$this->q(1, core_pages::toSql_insert(DemoAjax::PAGEID, core_pages::TYPE_web, "Ajax demo", DemoAjax::getClass()));
//		$this->q(2, core_pages::toSql_insert("temp1", core_pages::TYPE_sup, "temp1"));
//		$this->q(3, core_pages::toSql_insert(DemoCss::PAGEID, core_pages::TYPE_web, "CSS demo", DemoCss::getClass(), "temp1"));
//		$this->q(4, core_pages::toSql_insert("temp4", core_pages::TYPE_sup, "temp4", null, "temp1"));
//		$this->q(5, core_pages::toSql_insert("ttdemo_index", core_pages::TYPE_int, "Start", Config::get(Config::HTTP_ROOT) . '/index.php', DemoCss::PAGEID));
//		$this->q(6, core_pages::toSql_insert("temp3", core_pages::TYPE_sup, "temp3"));

	}
}