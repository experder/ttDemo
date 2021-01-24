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
use tt\moduleapi\UpdateDatabase;

class DemoDatabase extends UpdateDatabase {

	protected function doUpdate() {

		$this->q(1, core_navigation::toSql(DemoAjax::getClass(), "Ajax demo"));
		$this->q(2, core_navigation::toSql(DemoCss::getClass(), "CSS demo"));
		$this->q(3, core_navigation::toSql("ttdemo_index", "Start", Config::get(Config::HTTP_ROOT).'/index.php'));

	}
}