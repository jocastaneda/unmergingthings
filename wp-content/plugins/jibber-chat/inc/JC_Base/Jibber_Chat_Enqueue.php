<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Base;

use \JC_Inc\JC_Base\Jibber_Chat_BaseController;

// Add external assets
class Jibber_Chat_Enqueue extends Jibber_Chat_BaseController
{
    public function jibber_chat_register() {
        add_action( 'admin_enqueue_scripts', array($this, 'jibber_chat_enqueue'));
    }

    function jibber_chat_enqueue() {
        wp_enqueue_style( 'jibber-chat-style', $this->plugin_url . '/assets/jibber-chat.css');
        wp_enqueue_script( 'jibber-chat-script', $this->plugin_url . '/assets/jibber-chat.js');
    }
}