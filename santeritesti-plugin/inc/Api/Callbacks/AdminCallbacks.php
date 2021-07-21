<?php
/**
 * @package SanteritestiPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;   


/**
 * Määrittelemme admin sivun rakenteen. Data määritellään Pages/admin.php:n sisällä.
 */
class AdminCallbacks extends BaseController {

    public function adminDashboard() {

        return require_once( "$this->plugin_path/templates/admin.php");
    }

    public function adminCpt() {

        return require_once( "$this->plugin_path/templates/cpt.php");
    }

    public function santeriOptionsGroup( $input )
	{
		return $input;
	}

    public function santerinAdminSection()
	{
		echo 'tulee admincallbacks/santeriAdminSectionista';
	}

    public function santerinTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Tähän voi kirjottaa juttuja ja asioita">';
	}

    public function santerinSecondBox()
	{
		$value = esc_attr( get_option( 'second_box' ) );
		echo '<input type="text" class="regular-text" name="second_box" value="' . $value . '" placeholder="Tännekkin voi kirjottaa">';
	}

    
}