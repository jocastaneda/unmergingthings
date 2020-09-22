<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Pages;

// To get correct paths use basecontroller and extend it.
use \JC_Inc\JC_Base\Jibber_Chat_BaseController;
use \JC_Inc\JC_API\Jibber_Chat_SettingsAPI;
use \JC_Inc\JC_API\JC_Callbacks\Jibber_Chat_AdminCallbacks;

class Jibber_Chat_Admin extends Jibber_Chat_BaseController
{
    public $callbacks;

    public $settings;

    public $pages = array();

    public function jibber_chat_register() {

        $this->callbacks = new Jibber_Chat_AdminCallbacks();

        $this->settings = new Jibber_Chat_SettingsAPI();

        $this->jibber_chat_setSettings();

        $this->jibber_chat_setSections();

        $this->jibber_chat_setFields();

        $this->jibber_chat_setPages();

        $this->settings->jibber_chat_addPages($this->pages)->jibber_chat_register();
    }

    // Set page in menu
    public function jibber_chat_setPages() {

        $iconData = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.03 100.01"><title>JibberLogo</title><path d="M40.17,56.37a6.78,6.78,0,0,0,.74,3.14,9.48,9.48,0,0,0,17.49,0A9.24,9.24,0,0,0,59,55.79V32.37a3.54,3.54,0,0,1,3.5-3.58h.07a3.13,3.13,0,0,1,2.38,1,3.43,3.43,0,0,1,1,2.51V55.79A16.68,16.68,0,0,1,56,71a16.42,16.42,0,0,1-18.2-3.56,17.27,17.27,0,0,1-3.52-5.24A13.25,13.25,0,0,1,33,56.37a3.54,3.54,0,0,1,7.08,0" style="fill:#fff"/><path d="M50,100A49.83,49.83,0,0,1,24.9,93.18L5.49,99.79A4.15,4.15,0,0,1,.39,94.1L8.22,77.44A50,50,0,1,1,50,100ZM25.31,86a3.43,3.43,0,0,1,1.82.53A43,43,0,1,0,14.94,75.12a3.43,3.43,0,0,1,.32,3.46l-6,12.68,14.9-5.07a3.43,3.43,0,0,1,1.15-.2Z" style="fill:#fff"/></svg>';

        $this->pages = 
        array(
            array(
            'page_title'=> 'Jibber Chat',
            'menu_title'=> 'Jibber Chat',
            'capability'=> 'manage_options',
            'menu_slug'=> 'jibber-chat',
            'callback'=> array($this->callbacks, 'jibber_chat_AdminDashboard'),
            'icon_url'=> 'data:image/svg+xml;base64,' . base64_encode($iconData),
            'position'=> 110
            )
        );
    }

    // Create input fields on page and set options
    public function jibber_chat_setSettings() {
        $args = array(
            array(
                'option_group'=> 'jibberchat_options_group',
                'option_name'=> 'jibber_chat_ID',
                'callback'=> array($this->callbacks, 'jibber_chat_OptionsGroup')
            ),
            array(
                'option_group'=> 'jibberchat_options_group',
                'option_name'=> 'jibber_chat_hideFrontPage',
                'callback'=> array($this->callbacks, 'jibber_chat_OptionsGroup')
            )
        );

        $this->settings->jibber_chat_setSettings($args);
    }

    public function jibber_chat_setSections() {
        $args = array(
            array(
                'id'=> 'jibberchat_admin_index',
                'title'=> 'Link up your Jibber Chat',
                'callback'=> array($this->callbacks, 'jibber_chat_AdminSection'),
                'page'=> 'jibber_chat'
            )
        );

        $this->settings->jibber_chat_setSections($args);
    }

    public function jibber_chat_setFields() {
        $args = array(
            array(
                'id'=> 'jibber_chat_ID',
                'title'=> 'Enter your Company ID here:',
                'callback'=> array($this->callbacks, 'jibber_chat_InputField'),
                'page'=> 'jibber_chat',
                'section'=> 'jibberchat_admin_index',
                'args'=> array(
                    'label_for'=> 'jibber_chat_ID',
                    'class'=> 'jibber_chat_IDClass'
                )
            ),
            array(
                'id'=> 'jibber_chat_hideFrontPage',
                'title'=> 'Hide from front page:',
                'callback'=> array($this->callbacks, 'jibber_chat_CheckBox'),
                'page'=> 'jibber_chat',
                'section'=> 'jibberchat_admin_index',
                'args'=> array(
                    'label_for'=> 'jibber_chat_hideFrontPage',
                    'class'=> 'jibber_chat_HideFrontPageClass'
                )
            )
        );

        $this->settings->jibber_chat_setFields($args);
    }

}