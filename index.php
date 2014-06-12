<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

session_start();
$auths = isset($_SESSION['auths']) ? $_SESSION['auths'] : null;
if(!$auths){
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : null;
	if('f12304aad89d8ff9eaa9dcdff8217526'==md5(md5($pwd).'Katie.Nie')){
		$_SESSION['auths'] = 1;
	}else{
		include_once 'auth.html';
		exit;
	}
}


define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
