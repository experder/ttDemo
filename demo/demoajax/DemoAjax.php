<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo\demoajax;

use tt\core\Config;
use tt\core\page\Message;
use tt\run\ApiResponseHtml;
use tt\run\Runner;
use tt\service\Error;
use tt\service\form\Form;
use tt\service\form\FormfieldHidden;
use tt\service\form\FormfieldRadio;
use tt\service\form\FormfieldRadioOption;
use tt\service\form\FormfieldText;
use tt\service\js\Js;
use tt\service\ServiceStrings;

class DemoAjax extends Runner {

	const PAGEID = "ttdemo/ajax";

	const CMD_test1 = "test1";

	public static function getClass() {
		return \tt\service\polyfill\Php5::get_class();
	}

	public function runWeb() {

		$html = array();

		$html[] = $this->form1();
		$html[] = $this->form2();

		return $html;
	}

	private function form2(){
		$form = new Form(null, "", "Ajax Test #2");
		$form->onSubmit .= Js::ajaxPostToMessages(null, null, "{
			class:'" . ServiceStrings::escape_value_js(self::PAGEID) . "',
			cmd:'" . self::CMD_test1 . "',
			foo:'" . ServiceStrings::escape_value_js("bar") . "',
			key1:$('#key1').val(),
			msg_type:$('input[name=type]:checked').val(),
		}")
			. "return false;";
		$form->addField(new FormfieldText("key1", null, null, true, array("id" => 'key1')));
		$form->addField(new FormfieldRadio("type", array(
			new FormfieldRadioOption("info"),
			new FormfieldRadioOption("error"),
			new FormfieldRadioOption("ok"),
		), "info"));
		return $form;
	}

	private function form1(){
		$form = Form::ajaxToMessages(self::CMD_test1, self::PAGEID, "Ajax Test #1");
		$form->addField(new FormfieldHidden("foo", "bar"));
		$form->addField(new FormfieldText("key1"));
		$form->addField(new FormfieldRadio("msg_type", array(
			new FormfieldRadioOption("info"),
			new FormfieldRadioOption("error"),
			new FormfieldRadioOption("ok"),
		), "info"));
		return $form;
	}

	public function runApi($cmd = null, array $data = array()) {
		switch ($cmd) {
			case self::CMD_test1:
				$this->requiredFieldsFromData($data, array('key1', 'foo'));
				$key1 = $data['key1'];
				unset($data['key1']);
				unset($data['tt_radios']);

				$response = "You have sent:<pre>"
					. "KEY1: " . htmlentities($key1) . "\n"
					. htmlentities(print_r($data, 1))
					. "</pre>";

				if(Config::get(Config::DEVMODE)){
					$response = $this->developmentCommands(mb_strtolower($key1))?:$response;
				}

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

	private function developmentCommands($cmd){

		//Test database initialisation
		if ($cmd == 'drop') {
			\tt\core\database\Database::getPrimary()->_query("DROP DATABASE `tt_dev`;");
			return "dropped!";
		}

		if ($cmd == 'init') {
			$file = "../../exclude/init.php";
			if (file_exists($file)){
				include $file;
				return "done.";
			}
			return "not done.";
		}

		return false;
	}

}