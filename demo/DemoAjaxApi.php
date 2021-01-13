<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\core\page\Message;
use tt\run\ApiResponseHtml;
use tt\run\Runner;
use tt\service\Error;

class DemoAjaxApi extends Runner {

	const CMD_test1 = "test1";

	public static function getClass() {
		return \tt\service\polyfill\Php5::get_class();
	}

	public function runApi($cmd = null, array $data = array()) {
		switch ($cmd) {
			case self::CMD_test1:
				$this->requiredFieldsFromData($data, array(DemoAjax::AJAXKEY_key1, 'foo'));
				$key1 = $data[DemoAjax::AJAXKEY_key1];
				unset($data[DemoAjax::AJAXKEY_key1]);

				$response = "You have sent:<pre>"
					. "KEY1: " . htmlentities($key1) . "\n"
					. htmlentities(print_r($data, 1))
					. "</pre>";

//				if(mb_strtolower($key1)=='drop'){
//					\tt\core\database\Database::getPrimary()->_query("DROP DATABASE `tt_dev`;");
//					$response="dropped!";
//				}

				return new ApiResponseHtml(
					true,
					$response,
					array(),
					isset($data["msg_type"]) ? $data["msg_type"] : Message::TYPE_INFO
				);
				break;
			default:
				new Error(get_class($this) . ": Unknown command" . ($cmd === null ? " (null)" : " '$cmd'") . "!");
				return null;
				break;
		}
	}

}