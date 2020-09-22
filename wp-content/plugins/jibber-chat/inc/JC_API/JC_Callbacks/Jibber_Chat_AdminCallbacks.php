<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_API\JC_Callbacks;

// To get correct paths use basecontroller and extend it.
use \JC_Inc\JC_Base\Jibber_Chat_BaseController;

class Jibber_Chat_AdminCallbacks extends Jibber_Chat_BaseController
{
    public function jibber_chat_AdminDashboard() {
        return require_once( "$this->plugin_path/templates/jibber_chat_admin.php");
    }

    //Sanitize input here
    public function jibber_chat_OptionsGroup ($input) {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function jibber_chat_AdminSection() {
        
    }

    public function jibber_chat_InputField() {

        // Get value from set Option and place in field for user assurance
        $value = esc_attr( get_option( 'jibber_chat_ID') );
        
        echo '<input type="text" class="regular-text" name="jibber_chat_ID" value="' . $value . '" placeholder="29">';
    }

    public function jibber_chat_CheckBox() {
        $checkbox = get_option( 'jibber_chat_hideFrontPage');

        echo '<input type="checkbox" name="jibber_chat_hideFrontPage" value="1" ' . ($checkbox ? "checked" : "") . '>';
    }
}