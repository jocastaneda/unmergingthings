<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Base;

class Jibber_Chat_PluginScript 
{
    public $companyID;

    public function jibber_chat_register() {
        add_action('template_redirect', array($this, 'jibber_chat_hide_chat'));
    }

    function jibber_chat_hide_chat() {
        if ( get_option('jibber_chat_hideFrontPage') && is_front_page() ) {
            return null;
        } else {
            add_action('wp_footer', array($this, 'jibber_chat_add_script'));
        }
    }

    function jibber_chat_add_script() {

        // Get companyID from option field
        $companyID = get_option('jibber_chat_ID');

        ?>

        <!-- Start of Jibber Chat Code -->
        <script
            id="Jibber"
            type="text/javascript"
            src="https://client.jibber.social/client-api/js/app.js?id=<?php echo $companyID ?>">
        </script>
        <!--- End of Jibber Code -->
        <?php
    }
}

