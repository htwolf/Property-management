<?php
/**
 * Helper functions for the Property Management plugin.
 */

function get_property_address($property_id) {
    $address = get_post_meta($property_id, '_address', true);
    $address_2 = get_post_meta($property_id, '_address_2', true);
    $city = get_post_meta($property_id, '_city', true);
    $state = get_post_meta($property_id, '_state', true);
    $zip = get_post_meta($property_id, '_zip', true);

    $full_address = $address;
    if (!empty($address_2)) {
        $full_address .= ', ' . $address_2;
    }
    if (!empty($city)) {
        $full_address .= ', ' . $city;
    }
    if (!empty($state)) {
        $full_address .= ', ' . $state;
    }
    if (!empty($zip)) {
        $full_address .= ' ' . $zip;
    }

    return $full_address;
}

function get_property_lot_sqft($property_id) {
    return get_post_meta($property_id, '_lot_sqft', true);
}

function get_property_type($property_id) {
    return get_post_meta($property_id, '_property_type', true);
}

function get_property_structures($property_id) {
    return get_post_meta($property_id, '_structures', true);
}

function get_property_bathrooms($property_id) {
    return get_post_meta($property_id, '_bathrooms', true);
}

function get_property_rooms($property_id) {
    return get_post_meta($property_id, '_rooms', true);
}

function get_property_room_sqft($property_id) {
    return get_post_meta($property_id, '_room_sqft', true);
}

function get_property_purchase_price($property_id) {
    return get_post_meta($property_id, '_purchase_price', true);
}

function get_property_purchase_date($property_id) {
    return get_post_meta($property_id, '_purchase_date', true);
}

function is_property_rented($property_id) {
    return (bool) get_post_meta($property_id, '_is_rented', true);
}

function get_property_num_apartments($property_id) {
    return get_post_meta($property_id, '_num_apartments', true);
}