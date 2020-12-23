<?php
/*
 * This file is part of the TT toolbox;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo;

use tt\core\page\PG;
use tt\html\form\Fieldset;
use tt\html\form\Form;
use tt\html\form\FormfieldCheckbox;
use tt\html\form\FormfieldHeader;
use tt\html\form\FormfieldHidden;
use tt\html\form\FormfieldPassword;
use tt\html\form\FormfieldRadio;
use tt\html\form\FormfieldRadioOption;
use tt\html\form\FormfieldText;
use tt\html\form\FormfieldTextarea;
use tt\core\page\Message;
use tt\html\Html;
use tt\run\Controller;

class DemoCss extends Controller {

	public function runWeb() {
		$html[]=array();

		self::demoAlerts();
		$html[] = self::demoText();
		$html[] = self::demoForm();

		return $html;
	}

	private function demoAlerts() {

		PG::addMessageText(Message::TYPE_INFO, "Page::addMessageText(Message::TYPE_INFO, \$message);");
		PG::addMessageText(Message::TYPE_QUESTION, "Page::addMessageText(Message::TYPE_QUESTION, \$message);");
		PG::addMessageText(Message::TYPE_ERROR, "Page::addMessageText(Message::TYPE_ERROR, \$message);");
		PG::addMessageText(Message::TYPE_CONFIRM, "Page::addMessageText(Message::TYPE_CONFIRM, \$message);");

	}

	private function demoText() {
		$html = array();

		$html[] = Html::H1("Header 1");
		$html[] = Html::H2("Header 2");
		$html[] = Html::H3("Header 3");
		$html[] = Html::H4("Header 4");

		return $html;
	}
	
	private function demoForm() {

		$form = new Form();

		$form->addField(new FormfieldHidden("hidden", "value"));

		$form->addField($ff=new FormfieldText("text1", "Text1", null, true, array("placeholder"=>"Text1")));
		$ff->setTooltip("Hint1");

		$form->addField($fieldset=new Fieldset("Fieldset"));
		$fieldset->addField(new FormfieldText("text2", "Text2"));
		$fieldset->addField(new FormfieldPassword("password", "Password"));

		$form->addField(new FormfieldHeader("Header", "header"));

		$form->addField($ff=new FormfieldCheckbox("checkbox", "Checkbox"));
		$ff->setTooltip("Hint2");

		$form->addField(new FormfieldRadio("radio", array(
			new FormfieldRadioOption("value1", "Option1", "Hint3"),
			new FormfieldRadioOption("value2", "Option2"),
		), "value2"));

		$form->addField(new FormfieldTextarea("textarea", "Textarea"));

		return $form;
	}

}