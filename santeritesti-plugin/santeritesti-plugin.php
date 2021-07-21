<?php
/**
 * @package SanteritestiPlugin
 */
/*
Plugin Name: Santerintesti Plugin
Plugin URI: https://dev.appitehdas.fi/santerikorvala
Description: This is my first custom Plugin.
Version: 1.0.0
Author: Santeri "Sako" Korvala
Author URI: http://santerikorvala.com
License: GPLv2 or later
Text Domain: santerintesti-plugin
*/

defined ( 'ABSPATH' ) or die( 'You have no power here' );

//this only require once the Composter autoload
if ( file_exists( dirname(__FILE__) .'/vendor/autoload.php' ) ) {
    require_once dirname(__FILE__) .'/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

//bellow code that runs during plugin activation & deactivation
function activate_santerintesti_plugin() {
    Activate::activate();
}

register_activation_hook( __FILE__, 'activate_santerintesti_plugin');

function deactivate_santerintesti_plugin() {
   Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_santerintesti_plugin');

//Initialize all the core classes of the pluginn

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}
