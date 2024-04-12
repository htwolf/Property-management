<?php
class Property_Management_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->define_public_hooks();
    }
    private function define_public_hooks() {
        add_action('template_include', array($this, 'load_property_templates'));
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            $this->plugin_name . '-public-styles',
            plugin_dir_url(dirname(__FILE__)) . 'assets/css/public-styles.css',
            array(),
            $this->version,
            'all'
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            $this->plugin_name . '-public-scripts',
            plugin_dir_url(dirname(__FILE__)) . 'assets/js/public-scripts.js',
            array('jquery'),
            $this->version,
            false
        );
    }

    public function load_property_templates($template) {
        if (is_singular('property')) {
            return plugin_dir_path(dirname(__FILE__)) . 'public/partials/property-single-display.php';
        } elseif (is_post_type_archive('property')) {
            return plugin_dir_path(dirname(__FILE__)) . 'public/partials/property-archive-display.php';
        }
        return $template;
    }
}