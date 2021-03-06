<?php
/*
 * This file is part of the TT toolbox demo;
 * Copyright (C) 2014-2021 Fabian Perder (t2@qnote.de) and contributors
 * TT comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under
 * certain conditions. See the GNU General Public License (file 'LICENSE' in the root directory) for more details.
 */

namespace ttdemo\demo\democss;

use tt\core\Config;
use tt\core\page\Message;
use tt\core\page\Page;
use tt\run\Runner;
use tt\service\form\Fieldset;
use tt\service\form\Form;
use tt\service\form\FormfieldCheckbox;
use tt\service\form\FormfieldHeader;
use tt\service\form\FormfieldHidden;
use tt\service\form\FormfieldPassword;
use tt\service\form\FormfieldRadio;
use tt\service\form\FormfieldRadioOption;
use tt\service\form\FormfieldText;
use tt\service\form\FormfieldTextarea;
use tt\service\Html;
use tt\service\table\Table;

class DemoCss extends Runner {

	const PAGEID = "ttdemo/css";

	public static function getClass() {
		return \tt\service\polyfill\Php5::get_class();
	}

	public function runWeb() {
		$html[] = array();

		self::demoAlerts();
		$html[] = self::demoText();
		$html[] = self::demoForm();
		$html[] = self::demoTable();

		Page::getInstance()->setFocus(false);
		Page::getInstance()->addCss(Config::getChecked(Config::HTTP_ROOT) . "/demo/democss/democss.css");

		return $html;
	}

	private function demoAlerts() {
		Page::addMessageText(Message::TYPE_INFO, "Page::addMessageText(Message::TYPE_INFO, \$message);");
		Page::addMessageText(Message::TYPE_QUESTION, "Page::addMessageText(Message::TYPE_QUESTION, \$message);");
		Page::addMessageText(Message::TYPE_ERROR, "Page::addMessageText(Message::TYPE_ERROR, \$message);");
		Page::addMessageText(Message::TYPE_CONFIRM, "Page::addMessageText(Message::TYPE_CONFIRM, \$message);");
	}

	private function demoText() {
		$html = array();

		$html[] = Html::H1("Header 1");
		$html[] = Html::H2("Header 2");
		$html[] = Html::H3("Header 3");
		$html[] = Html::H4("Header 4");

		$html[] = Html::A("link", "") . " " . Html::A_external("external link", "");

		return $html;
	}

	private function demoForm() {

		$form = new Form();

		$form->addField(new FormfieldHidden("hidden", "value"));

		$form->addField($ff = new FormfieldText("text", "Text"));
		$ff->setTooltip("Hint1");

		$form->addField($fieldset = new Fieldset("Fieldset"));
		$fieldset->addField(new FormfieldPassword("password", "Password"));

		$form->addField(new FormfieldHeader("Header", "header"));

		$form->addField($ff = new FormfieldCheckbox("checkbox1", "Checkbox1"));
		$ff->setTooltip("Hint2");
		$form->addField(new FormfieldCheckbox("checkbox2", "Checkbox2", "foo"));

		$form->addField(new FormfieldRadio("radio", array(
			new FormfieldRadioOption("value1", "Option1", "Hint3"),
			new FormfieldRadioOption("value2", "Option2"),
		), "value2"));

		$form->addField(new FormfieldTextarea("textarea", "Textarea", null, true,
			array("placeholder" => "Placeholder")
		));

		$form->addButton(Html::BUTTON("Option 2"));

		return $form;
	}

	private function demoTable() {

		$table = new Table(array(
			array("one" => "Foo", "two" => "Bar"),
			array("one" => "Foobar", "two" => "Foofoo"),
		));

		return $table;
	}

}