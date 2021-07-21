<?php 

/**
 * Trigger this file on Plugin uninstall
 * @package SanteritestiPlugin
 */

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

//clear database data
$summerprojects = get_post( array( 'post_type' => 'summerproject', 'numberposts' => -1 ) );

foreach( $summerprojects as $summerproject) {
    wp_delete_post( $summerproject->ID, true );
}