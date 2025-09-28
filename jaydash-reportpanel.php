<?php
/**
 * Plugin Name: Jaydash Reportpanel
 * Plugin URI: https://jericojuegos.com/jaydash-reportpanel
 * Description: 
 * Version: 0.1.2
 * Author: Jerico Juegos
 * Author URI: https://jericojuegos.com
 * License: GPLv2 or later
 */

namespace JayDash\ReportPanel;

if ( ! defined( 'ABSPATH' ) ) exit; // Prevent direct access

use tangible\framework;
use tangible\updater;

require __DIR__ . '/vendor/tangible/framework/index.php';
require __DIR__ . '/vendor/tangible/updater/index.php';

class Plugin {
    public static $plugin;
    public $settings;

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init_framework' ] );
        add_action( 'plugins_loaded', [ $this, 'init_updater' ], 11 );
        add_action( 'plugins_loaded', [ $this, 'load_includes' ], 12 );
    }

    public function init_framework() {
        if ( defined( 'WP_SANDBOX_SCRAPING' ) ) return;

        self::$plugin = framework\register_plugin([
            'name'           => 'jaydash-reportpanel',
            'title'          => 'Jaydash Reportpanel',
            'setting_prefix' => 'jaydash_reportpanel',
            'version'        => '0.1.2',
            'file_path'      => __FILE__,
            'base_path'      => plugin_basename( __FILE__ ),
            'dir_path'       => plugin_dir_path( __FILE__ ),
            'url'            => plugins_url( '/', __FILE__ ),
            'assets_url'     => plugins_url( '/assets', __FILE__ ),
        ]);
    }

    public function init_updater() {
        updater\register_plugin([
            'name' => self::$plugin->name ?? 'jaydash-reportpanel',
            'file' => __FILE__,
        ]);
    }

    public function load_includes() {
        require_once __DIR__ . '/includes/admin/settings.php';

        // You can instantiate other classes here as needed
        $this->settings = new \JayDash\ReportPanel\Admin\Settings(self::$plugin);
    }

}

// Initialize the plugin
new Plugin();