<?php
	/*** error reporting on ***/
	error_reporting(E_ALL);
	ini_set("display_errors",0);  
	/*** define the site path ***/
	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);
	session_start();
	/*** include the init.php file ***/
	include 'includes/init.php';
	include 'config/config.php';
	/*** default load page ***/
	$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
	$parts = explode('/', $route);
	$controller = $parts[0];
	if($controller != 'product')
	{
		session_destroy();
		header("Location: index.php?rt=product/productlist");
		exit();
	}
	$site_path = realpath(dirname(__FILE__));
	define('__SITE_PATH', $site_path);
	$registry->db = db::getInstance();
	/*** load the router ***/
	$registry->router = new router($registry);
	/*** set the controller path ***/
	$registry->router->setPath (__SITE_PATH . '/controller');

	/*** load up the template ***/
	$registry->template = new template($registry);

	/*** load the controller ***/
	$registry->router->loader();
	/*** default load page ***/
	// session_destroy();
	// header("Location: index.php?rt=product/productlist");
?>
