<?php
/**
 * @package Jibber-Chat
 */

// Used for handling pathing without using PLUGIN_PATH or other standards that can cause conflicts

namespace JC_Inc\JC_Base;

class Jibber_Chat_BaseController 
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __construct() {
        // Distance to parent (root folder)
        $this->plugin_path = plugin_dir_path( dirname(dirname(__FILE__)) );
        $this->plugin_url = plugin_dir_url( dirname(dirname(__FILE__)) );
        // Small hack with the to get the correct path
        $this->plugin = plugin_basename( dirname(dirname(dirname(__FILE__))) ) . '/jibber-chat.php';
    }
}

