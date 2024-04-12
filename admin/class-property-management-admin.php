<?php
class Property_Management_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->define_admin_hooks();
    }

    private function define_admin_hooks() {
        add_action('add_meta_boxes', array($this, 'add_property_meta_boxes'));
        add_action('save_post', array($this, 'save_property_meta_boxes'));
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            $this->plugin_name . '-admin-styles',
            plugin_dir_url(dirname(__FILE__)) . 'assets/css/admin-styles.css',
            array(),
            $this->version,
            'all'
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            $this->plugin_name . '-admin-scripts',
            plugin_dir_url(dirname(__FILE__)) . 'assets/js/admin-scripts.js',
            array('jquery'),
            $this->version,
            false
        );
    }

    public function add_property_meta_boxes() {
        add_meta_box(
            'property_address',
            'Property Address',
            array($this, 'render_property_address_meta_box'),
            'property',
            'normal',
            'high'
        );

        add_meta_box(
            'property_land',
            'Land Details',
            array($this, 'render_property_land_meta_box'),
            'property',
            'normal',
            'high'
        );

        add_meta_box(
            'property_structures',
            'Structures',
            array($this, 'render_property_structures_meta_box'),
            'property',
            'normal',
            'high'
        );

        add_meta_box(
            'property_details',
            'Property Details',
            array($this, 'render_property_details_meta_box'),
            'property',
            'normal',
            'high'
        );
    }

    /** Address Metadata */
    public function render_property_address_meta_box($post) {
        include plugin_dir_path(__FILE__) . 'partials/property-address-meta-box.php';
    }

    /** Land Metadata */
    public function render_property_land_meta_box($post) {
        include plugin_dir_path(__FILE__) . 'partials/property-land-meta-box.php';
    }

    /** Structures Metadata */
    public function render_property_structures_meta_box($post) {
        include plugin_dir_path(__FILE__) . 'partials/property-structures-meta-box.php';
    }

    /** Details Metadata */
    public function render_property_details_meta_box($post) {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/property-details-meta-box.php';
    }

    /** Save Metadata */
    public function save_property_meta_boxes($post_id) {
        /** Address Details */
        if (isset($_POST['_address'])) {
            update_post_meta($post_id, '_address', sanitize_text_field($_POST['_address']));
        }
        if (isset($_POST['_address_2'])) {
            update_post_meta($post_id, '_address_2', sanitize_text_field($_POST['_address_2']));
        }
        if (isset($_POST['_city'])) {
            update_post_meta($post_id, '_city', sanitize_text_field($_POST['_city']));
        }
        if (isset($_POST['_state'])) {
            update_post_meta($post_id, '_state', sanitize_text_field($_POST['_state']));
        }
        if (isset($_POST['_zip'])) {
            update_post_meta($post_id, '_zip', sanitize_text_field($_POST['_zip']));
        }

        /** Land Details */
        if (isset($_POST['_land_area'])) {
            update_post_meta($post_id, '_land_area', sanitize_text_field($_POST['_land_area']));
        }
        if (isset($_POST['_land_unit'])) {
            update_post_meta($post_id, '_land_unit', sanitize_text_field($_POST['_land_unit']));
        }
        if (isset($_POST['_has_structures'])) {
            update_post_meta($post_id, '_has_structures', 1);
        } else {
            update_post_meta($post_id, '_has_structures', 0);
        }
        if (isset($_POST['_num_structures'])) {
            update_post_meta($post_id, '_num_structures', sanitize_text_field($_POST['_num_structures']));
        }
        if (isset($_POST['_zoning'])) {
            update_post_meta($post_id, '_zoning', sanitize_text_field($_POST['_zoning']));
        }

        /** Structure Details */
        if (isset($_POST['_structures'])) {
            $structures = array();
            foreach ($_POST['_structures'] as $structure) {
                $structures[] = array(
                    'title' => sanitize_text_field($structure['title']),
                    'type' => sanitize_text_field($structure['type']),
                );
            }
            update_post_meta($post_id, '_structures', $structures);
        } else {
            delete_post_meta($post_id, '_structures');
        }
    }
}