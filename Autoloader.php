<?php

namespace Pavenest\Stock_Tracker;

defined('ABSPATH') || exit;

/**
 * php class autoloader
 *
 * @since 1.0.0
 */
class Autoloader {

    /**
     * Autoloading all php class according to our rule/convention.
     *
     * PSR4 implementation will be added later
     *
     * @since 1.0.0
     * @access public
     */
    public static function run($psr4 = false) {
        spl_autoload_register([__CLASS__, 'autoload']);
    }


    /**
     * Autoload.
     *
     * @since 1.0.0
     * @access private
     *
     */
    private static function autoload($cls) {

        if(0 !== strpos($cls, __NAMESPACE__)) {
            return;
        }

        $fl_nm = preg_replace( '/\b'.preg_quote(__NAMESPACE__).'\\\/', '', $cls);
        $fl_nm = preg_replace( '/\\\/', DIRECTORY_SEPARATOR, $fl_nm);
        $fl_nm = preg_replace( '/([a-z])([A-Z])/', '$1_$2', $fl_nm);
        $fl_nm = plugin_dir_path(__FILE__) . $fl_nm . '.php';


        if(file_exists($fl_nm)) {
            require_once($fl_nm);
        }
    }
}

Autoloader::run();
