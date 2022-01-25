<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2022 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo\democli;

use tt\run\Runner;

/**
 * @deprecated 
 */
class DemoCliRun extends Runner {

	public function runCli(array $data = array()) {
		return "You said: " . print_r($data, 1);
	}

}