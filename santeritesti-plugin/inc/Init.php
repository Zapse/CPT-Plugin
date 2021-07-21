<?php
/**
 * @package SanteritestiPlugin
 */
namespace Inc;
//make this class final so this is not possible to extend
 final class Init {

    /**
     * Store all the classes inside array
     * @return array Full list of classes
     */
    public static function get_services() {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class
        ];
    }

    /**
     * Loop trought classes, initialize them, and call register() method if it exist
    */
    public static function register_services() {
        foreach (self::get_services() as $class ) {
            $service = self::instantiate ( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     */
    private static function instantiate ( $class ) {
        $service = new $class();

        return $service;
    }
   
 }