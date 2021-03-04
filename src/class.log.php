<?php
namespace DanielRiera\LOG;

if(!class_exists('LOG')) {

    class LOG {
        /**
         * add message to file
         *
         * @param string $msg String to register
         * @param int|string $element Any ID or String
         * @param string $type Default: user
         * @return int|boolean
         */
        static function add($msg, $element = false, $type = false ) {

            if(!$type) {
                $type = defined('LOG_DEFAULT_FILE') ? LOG_DEFAULT_FILE : 'user';
            }

            $root = defined('LOG_FOLDER') ? LOG_FOLDER : '/';

            //If an element is defined and provided, it will be separated into files by element
            $divide = defined('LOG_DIVIDE_ELEMENT');
            
            $y = date('Y');
            $m = date('m');

            //Create htaccess file if no exist
            if(!file_exists($root . "logs/.htaccess")) {
                file_put_contents($root . "logs/.htaccess", 'Deny from all');
            }

            $fileDest = $root . "logs/{$y}/{$m}/";

            if(!file_exists($fileDest)) {
                $dir = mkdir($fileDest, 0775, true);
            }

            if($element && $divide) {
                return file_put_contents($fileDest.$type."_{$element}.log", self::data($msg, $element, $type),FILE_APPEND);
            }
            return file_put_contents($fileDest.$type.".log", self::data($msg, $element, $type),FILE_APPEND);
        }

        /**
         * Structure data
         *
         * @param string $msg
         * @param int|string $element
         * @param string $type
         * @return string
         */
        private static function data($msg, $element = '0', $type) {
            if(is_array($msg) || is_object($msg)) {
                return "[".date('Y-m-d H:i:s') . "] LOG {$type} ({$element}) ". var_export($msg, true) . " \r\n";    
            }
            return "[".date('Y-m-d H:i:s') . "] LOG {$type} ({$element}) $msg \r\n";
        }

    }
}