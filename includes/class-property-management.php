<?php
class Property_Management {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'property-management';
        $this->version = '1.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-property-management-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-property-management-public.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-property-post-type.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-property-taxonomies.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/functions.php';
    }

    private function define_admin_hooks() {
        $plugin_admin = new Property_Management_Admin($this->get_plugin_name(), $this->get_version());
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_scripts'));
    }

    private function define_public_hooks() {
        $plugin_public = new Property_Management_Public($this->get_plugin_name(), $this->get_version());
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts'));
    }

    public function run() {
        // Additional plugin initialization code, if needed
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }
}