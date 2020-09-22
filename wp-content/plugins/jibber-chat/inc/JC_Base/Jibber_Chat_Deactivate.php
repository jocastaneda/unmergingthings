<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Base;

class Jibber_Chat_Deactivate 
{
    public static function jibber_chat_deactivate() {
        flush_rewrite_rules();
    }
}