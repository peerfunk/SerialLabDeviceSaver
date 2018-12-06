<?php

if (isset($_REQUEST['view']) && file_exists(__DIR__ . '/views/' . $_REQUEST['view'] . '.php')) {
	$view = __DIR__ . '/views/' . $_REQUEST['view'] . '.php';
}else{
	$view = __DIR__ . '/views/index.php';
}
	include ("views/partials/header.php");
	include($view);
