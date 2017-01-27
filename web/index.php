<?php
$begin = date('i:s');

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();

$end = date('i:s');

if ($_GET['debug']) {
	echo $begin . '<br/>' . $end;
}