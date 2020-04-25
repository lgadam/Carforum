<?php 

if(!array_key_exists('G', $_GET) || empty($_GET['G']))
	$_GET['G'] = 'global';

if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

if($_GET['G'] == 'user') {
	switch ($_GET['P']) {
		case 'login': require_once PROTECTED_DIR.'user/login.php'; break;
		case 'register': require_once PROTECTED_DIR.'user/register.php'; break;
		default: require_once PROTECTED_DIR.'global/404.php'; break;
	}
} else {
	switch ($_GET['P']) {
		case 'home': require_once PROTECTED_DIR.'global/home.php'; break;
		default: require_once PROTECTED_DIR.'global/404.php'; break;
	}
}

?>