<?php

require_once dirname(__DIR__).'/TToolbox/core/Config.php';
$config = \tt\core\Config::getInstance();
/*
$config->setServerDir(__DIR__);
$config->setServerFile(__DIR__."/init_server.php");
$config->setProjectFile(__DIR__.'/init_project.php');
$config->setProjectDir(dirname(__DIR__));
/**/
$config->startWeb();
