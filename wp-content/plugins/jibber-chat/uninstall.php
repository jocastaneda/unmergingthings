<?php
/**
 * @package Jibber-Chat
 */

if (! defined('WP_UNINSTALL_PLUGIN')) { 
    die; 
} else {
    delete_option('jibber_chat_ID');
    delete_option('jibber_chat_hideFrontPage');
}
