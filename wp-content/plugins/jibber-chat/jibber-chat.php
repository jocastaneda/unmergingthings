<?php
/**
 * @package Jibber-Chat
 */

/*
Plugin Name: Jibber Chat
Description: Plugin for Jibber Chat
Version:     1.0.6
Author:      Jibber AB
Author URI:  https://jibber.social/
Text Domain: Jibber-Chat
Domain Path: /languages
License:     GPL2
 
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

// Check for absolute path or die
defined('ABSPATH') or die('Protected');

// Check for autoload and then inlcude it
if (file_exists(dirname( __FILE__ ) . '/vendor/autoload.php')) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Run on activation and deactivation of plugin
function activate_jibber_chat() {
    JC_Inc\JC_Base\Jibber_Chat_Activate::jibber_chat_activate();
}
register_activation_hook( __FILE__, 'activate_jibber_chat' );

function deactivate_jibber_chat() {
    JC_Inc\JC_Base\Jibber_Chat_Deactivate::jibber_chat_deactivate();
}
register_activation_hook( __FILE__, 'deactivate_jibber_chat' );

// Initialize plugin
if (class_exists('JC_Inc\\Jibber_Chat_Init')) {
    JC_Inc\Jibber_Chat_Init::jibber_chat_register_services();
}
