<?php
class Property_Taxonomies {
    public function __construct() {
        add_action('init', array($this, 'create_property_taxonomies'));
    }

    public function create_property_taxonomies() {
        $this->create_property_type_taxonomy();
        $this->create_property_feature_taxonomy();
        $this->create_property_location_taxonomy();
    }

    private function create_property_type_taxonomy() {
        $labels = array(
            'name'              => 'Property Types',
            'singular_name'     => 'Property Type',
            'search_items'      => 'Search Property Types',
            'all_items'         => 'All Property Types',
            'parent_item'       => 'Parent Property Type',
            'parent_item_colon' => 'Parent Property Type:',
            'edit_item'         => 'Edit Property Type',
            'update_item'       => 'Update Property Type',
            'add_new_item'      => 'Add New Property Type',
            'new_item_name'     => 'New Property Type Name',
            'menu_name'         => 'Property Types',
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'property-type'),
        );

        register_taxonomy('property_type', 'property', $args);
    }

    private function create_property_feature_taxonomy() {
        $labels = array(
            'name'              => 'Property Features',
            'singular_name'     => 'Property Feature',
            'search_items'      => 'Search Property Features',
            'all_items'         => 'All Property Features',
            'parent_item'       => 'Parent Property Feature',
            'parent_item_colon' => 'Parent Property Feature:',
            'edit_item'         => 'Edit Property Feature',
            'update_item'       => 'Update Property Feature',
            'add_new_item'      => 'Add New Property Feature',
            'new_item_name'     => 'New Property Feature Name',
            'menu_name'         => 'Property Features',
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'property-feature'),
        );

        register_taxonomy('property_feature', 'property', $args);
    }

    private function create_property_location_taxonomy() {
        $labels = array(
            'name'              => 'Property Locations',
            'singular_name'     => 'Property Location',
            'search_items'      => 'Search Property Locations',
            'all_items'         => 'All Property Locations',
            'parent_item'       => 'Parent Property Location',
            'parent_item_colon' => 'Parent Property Location:',
            'edit_item'         => 'Edit Property Location',
            'update_item'       => 'Update Property Location',
            'add_new_item'      => 'Add New Property Location',
            'new_item_name'     => 'New Property Location Name',
            'menu_name'         => 'Property Locations',
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'property-location'),
        );

        register_taxonomy('property_location', 'property', $args);
    }
}

new Property_Taxonomies();