<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\run_api\Ajax;

class DemoAjaxApi extends Ajax {

	protected function runCmd() {
		switch ($this->cmd) {
			case "test1":
				return array(
					"ok" => true,
					"html" => "You have sent:<pre>" . print_r($this->data, 1) . "</pre>",
					"msg_type" => isset($this->data["msg_type"]) ? $this->data["msg_type"] : "info",
				);
				break;
			default:
				return null;
				break;
		}
	}

}