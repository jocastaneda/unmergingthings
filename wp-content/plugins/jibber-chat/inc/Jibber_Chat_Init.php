<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc;

// "final" to not let it extend thus protect the class
final class Jibber_Chat_Init 
{   
    // Store all the classes inside an array and return array of classes
    public static function jibber_chat_get_services() {

        $array_classes = array( 
            "JC_Inc\JC_Pages\Jibber_Chat_Admin",
            "JC_Inc\JC_Base\Jibber_Chat_Enqueue", 
            "JC_Inc\JC_Base\Jibber_Chat_SettingsLink",
            "JC_Inc\JC_Base\Jibber_Chat_PluginScript"
        );        

        return $array_classes;

    }

    // Loop through the classes, initalize them and call the register method if it exists
    public static function jibber_chat_register_services() {
        foreach(self::jibber_chat_get_services() as $class) {
            $service = self::jibber_chat_instantiate($class);
            if( method_exists($service, 'jibber_chat_register')) {
                $service->jibber_chat_register();
            }
        }
    }

    private static function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    // Initialize the class and return new instance of the class
    private static function jibber_chat_instantiate($class) {
        $service = new $class();
        return $service;
    }
}