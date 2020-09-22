<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_API;

class Jibber_Chat_SettingsAPI
{
    public $admin_pages = array();
    public $settings = array();
    public $sections = array();
    public $fields = array();

    public function jibber_chat_register() {
        if (!empty($this->admin_pages)) {
            add_action( 'admin_menu', array($this,'jibber_chat_addAdminMenu'));
        }

        if (!empty($this->settings)) {
            add_action( 'admin_init', array($this,'jibber_chat_registerCustomFields'));
        }
    }
    
    public function jibber_chat_addPages(array $pages) {
        $this->admin_pages = $pages;
        return $this;
    }

    public function jibber_chat_addAdminMenu() {
        foreach($this->admin_pages as $page) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }
    }

    /* 
        Create custom field generator 
    */

    //For filling the arrays
    public function jibber_chat_setSettings(array $settings) {
        $this->settings = $settings;
        return $this;
    }

    public function jibber_chat_setSections(array $sections) {
        $this->sections = $sections;
        return $this;
    }

    public function jibber_chat_setFields(array $fields) {
        $this->fields = $fields;
        return $this;
    }

    public function jibber_chat_registerCustomFields() {
        // register setting
        // check for callback or set as empty
        foreach($this->settings as $setting) {
            register_setting( $setting["option_group"], $setting["option_name"], (isset( $setting["callback"] ) ? $setting["callback"] : '') );
        }

        // add settings section
        foreach($this->sections as $section) {
            add_settings_section( $section["id"], $section["title"], (isset( $section["callback"] ) ? $section["callback"] : ''), $section["page"] );
        }
        
        // add settings field
        foreach($this->fields as $field) {
            add_settings_field( $field["id"], $field["title"], (isset( $field["callback"] ) ? $field["callback"] : ''), $field["page"], $field["section"], (isset( $field["args"] ) ? $field["args"] : '') );
        }
    }
}