<?php

use Pavenest\Swatch_Suite\System\Application;
use Pavenest\Swatch_Suite\System\Installer;

return function($file) {

    register_activation_hook($file, function() {
        Installer::activate();
    });

    register_deactivation_hook($file, function() {
        Installer::deactivate();
    });

    add_action('plugins_loaded', function() use ($file) {
        do_action('pvs/wpss/before_loaded');
        do_action('pvs/wpss/loaded', new Application($file));
        do_action('pvs/wpss/after_loaded');
    });
};

