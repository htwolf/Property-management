<?php
class Property_Post_Type {
    public function __construct() {
        add_action('init', array($this, 'create_property_post_type'));
    }

    public function create_property_post_type() {
        $labels = array(
            'name'               => 'Properties',
            'singular_name'      => 'Property',
            'menu_name'          => 'Properties',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Property',
            'edit_item'          => 'Edit Property',
            'new_item'           => 'New Property',
            'view_item'          => 'View Property',
            'search_items'       => 'Search Properties',
            'not_found'          => 'No properties found',
            'not_found_in_trash' => 'No properties found in Trash',
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'rewrite'            => array('slug' => 'properties'),
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies'         => array('property_type', 'property_feature', 'property_location'),
        );

        register_post_type('property', $args);
    }
}

new Property_Post_Type();