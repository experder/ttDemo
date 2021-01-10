<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\run\Runner;
use tt\service\form\Form;
use tt\service\form\FormfieldRadio;
use tt\service\form\FormfieldRadioOption;
use tt\service\form\FormfieldText;
use tt\service\js\Js;
use tt\service\ServiceStrings;

class DemoAjax extends Runner {

	public static function getClass() {
		return \tt\service\polyfill\Php5::get_class();
	}

	public function runWeb() {

		$form = new Form(null, "", "Ajax Test #1");
		$form->onSubmit .= (Js::ajaxPostToMessages(null, null, "{
			class:'".ServiceStrings::escape_value_js(DemoAjaxApi::getClass())."',
			cmd:'test1',
			foo:'bar',
			key1:$('#key1').val(),
			msg_type:$('input[name=type]:checked').val(),
		}"))
			. "return false;";
		$form->addField(new FormfieldText("key1", null, null, true, array("id" => "key1")));
		$form->addField(new FormfieldRadio("type", array(
			new FormfieldRadioOption("info"),
			new FormfieldRadioOption("error"),
			new FormfieldRadioOption("ok"),
		), "info"));

		return $form;
	}

}