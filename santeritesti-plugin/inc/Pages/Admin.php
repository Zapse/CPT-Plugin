<?php
/**
 * @package SanteritestiPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;


/**
* Tämä on Admin pagelle "Santeri" asetukset
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();


	}

	public function setPages() {

		$this->pages = array(
			array(
				'page_title' => 'Santerin Plugin', 
				'menu_title' => 'Santeri', 
				'capability' => 'manage_options', 
				'menu_slug' => 'Santerin_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSettings() {
		$args = array(
			array(
				'option_group' => 'santeri_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'santeriOptionsGroup' )
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections() {
		$args = array(
			array(
				'id' => 'santeri_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'santerinAdminSection' ),
				'page' => 'Santerin_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields() {
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text testi',
				'callback' => array( $this->callbacks, 'santerinTextExample' ),
				'page' => 'Santerin_plugin',
				'section' => 'santeri_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'second_box',
				'title' => 'Second Box',
				'callback' => array( $this->callbacks, 'santerinSecondBox' ),
				'page' => 'Santerin_plugin',
				'section' => 'santeri_admin_index',
				'args' => array(
					'label_for' => 'second_box',
					'class' => 'example-class'
				)
			)

		);

		$this->settings->setFields( $args );
	}
}