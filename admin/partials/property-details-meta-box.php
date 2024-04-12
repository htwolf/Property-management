<?php
global $post;

// Retrieve the saved details meta box values
$property_type = get_post_meta($post->ID, '_property_type', true);

// Define the available property types
$property_types = array(
    'Residential' => array(
        'single-family' => 'Single Family',
        'condo' => 'Condo',
        'townhouse' => 'Townhouse',
        'multi-family' => 'Multi-Family',
    ),
    'Commercial' => array(
        'office' => 'Office',
        'retail' => 'Retail',
        'warehouse' => 'Warehouse',
        'industrial' => 'Industrial',
    ),
    'Land' => array(
        'vacant-land' => 'Vacant Land',
        'farm' => 'Farm',
        'ranch' => 'Ranch',
    ),
    'Special Purpose' => array(
        'hotel' => 'Hotel',
        'motel' => 'Motel',
        'resort' => 'Resort',
        'other' => 'Other',
    ),
);
?>

<table class="form-table">
    <tbody>
        <tr>
            <th><label for="property_type">Property Type</label></th>
            <td>
                "test"
            </td>
        </tr>
    </tbody>
</table>