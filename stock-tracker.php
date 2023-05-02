<?php

/**
 * Plugin Name: Stock tracker
 * Description: For tracking the performance of my DSE stocks
 * Version: 1.0.0
 * Plugin URI: https://pavenest.com/products/stock-tracker
 * Author: Pavenest solutions
 * Author URI: https://pavenest.com
 * License:  GPL-3.0
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: stock-tracker
 * Domain Path: /language
 *
 */


define('PVST_VERSION', '1.0.0');
define('PVST_PLUGIN_PATH', plugin_dir_path(__FILE__));

require __DIR__.'/Autoloader.php';

call_user_func(function($engine) {
    $engine(__FILE__);
}, require(__DIR__.'/System/Engine.php'));
