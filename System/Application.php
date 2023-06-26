<?php

namespace Pavenest\Stock_Tracker\System;


class Application
{
    private $plugin_root;
    private $plugin_url;

    public function __construct($file)
    {

        // todo - include common files
        // todo - bootstrap bindings

        $this->plugin_root = plugin_dir_path($file);
        $this->plugin_url = plugin_dir_url($file);
        $this->includeCommonFiles($this);
    }

    public function includeCommonFiles($app) {

        require_once $this->plugin_root . 'App/Hooks/actions.php';
        require_once $this->plugin_root . 'app/Hooks/enqueue.php';
    }

}
