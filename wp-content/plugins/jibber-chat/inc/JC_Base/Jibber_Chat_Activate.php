<?php
/**
 * @package Jibber-Chat
 */

namespace JC_Inc\JC_Base;

class Jibber_Chat_Activate 
{
    public static function jibber_chat_activate() {
        flush_rewrite_rules();
    }
}