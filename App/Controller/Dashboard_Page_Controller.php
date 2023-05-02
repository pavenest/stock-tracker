<?php

namespace Pavenest\Swatch_Suite\App\Controller;

class Dashboard_Page_Controller
{
    const PARENT_SLUG = 'pvs_wpss_main_menu';

    public function __construct()
    {

    }

    public function init() {

        add_action('admin_menu', [$this, 'add_admin_page']);

    }

    public function add_admin_page()
    {

        global $submenu;

        $cap = 'manage_options';

        add_menu_page(
            esc_html__('Swatch Suite', 'swatch-suite'),
            esc_html__('Swatch Suite', 'swatch-suite'),
            $cap,
            self::PARENT_SLUG,
            [$this, 'landing'],
            'dashicons-feedback',
            5
        );

        $submenu[self::PARENT_SLUG]['dashboard'] = array(
            __('Dashboard', 'swatch-suite'),
            $cap,
            'admin.php?page=' . self::PARENT_SLUG . '#/',
            '',
            'wpss_dashboard'
        );

        $submenu[self::PARENT_SLUG]['balance'] = array(
            __('Settings', 'swatch-suite'),
            $cap,
            'admin.php?page=' . self::PARENT_SLUG . '#/settings',
            '',
            'wpss_settings'
        );
    }

    public function landing()
    {

        //wp_enqueue_style('stm-main-css');
        //wp_enqueue_script('stm-main-appjs');

        echo '<h1 class="stm">Hello world...</h1>';
    }

}