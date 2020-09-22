<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Base;

use \JC_Inc\JC_Base\Jibber_Chat_BaseController;

class Jibber_Chat_SettingsLink extends Jibber_Chat_BaseController
{
    public function jibber_chat_register() {
        add_filter("plugin_action_links_$this->plugin", array($this, 'jibber_chat_settings_link'));
    }

    public function jibber_chat_settings_link($links) {
        $settings_link = '<a href="admin.php?page=jibber-chat">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}