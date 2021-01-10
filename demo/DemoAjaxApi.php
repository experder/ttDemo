<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\run\Runner;
use tt\service\Error;

class DemoAjaxApi extends Runner {

	public static function getClass() {
		return \tt\service\polyfill\Php5::get_class();
	}

	public function runApi($cmd = null, array $data = array()) {
		switch ($cmd) {
			case "test1":
				return array(
					"ok" => true,
					"html" => "You have sent:<pre>" . htmlentities(print_r($data, 1)) . "</pre>",
					"msg_type" => isset($data["msg_type"]) ? $data["msg_type"] : "info",
				);
				break;
			default:
				new Error(get_class($this) . ": Unknown command" . ($cmd === null ? " (null)" : " '$cmd'") . "!");
				return null;
				break;
		}
	}

}