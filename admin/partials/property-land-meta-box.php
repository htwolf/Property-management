<?php
global $post;

// Retrieve the saved land meta box values
$land_area = get_post_meta($post->ID, '_land_area', true);
$land_unit = get_post_meta($post->ID, '_land_unit', true);
$has_structures = get_post_meta($post->ID, '_has_structures', true);
$num_structures = get_post_meta($post->ID, '_num_structures', true);
$zoning = get_post_meta($post->ID, '_zoning', true);

// Define the available land units
$land_units = array(
    'sqft' => 'Square Feet (sqft)',
    'acres' => 'Acres',
    'hectares' => 'Hectares',
);

// Define the available zoning options
$zoning_options = array(
    'residential' => 'Residential',
    'commercial' => 'Commercial',
    'industrial' => 'Industrial',
    'agricultural' => 'Agricultural',
    'mixed-use' => 'Mixed Use',
    'special-purpose' => 'Special Purpose',
    'overlay' => 'Overlay',
    'planned-unit-development' => 'Planned Unit Development',
    'other' => 'Other',
);
?>

<table class="form-table">
    <tbody>
        <tr>
            <th><label for="land_area">Land Area</label></th>
            <td>
                <input type="number" name="_land_area" id="land_area" value="<?php echo esc_attr($land_area); ?>" class="regular-text" step="0.01">
                <select name="_land_unit" id="land_unit" class="regular-text">
                    <?php foreach ($land_units as $value => $label) : ?>
                        <option value="<?php echo esc_attr($value); ?>" <?php selected($land_unit, $value); ?>><?php echo esc_html($label); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="has_structures">Has Structures?</label></th>
            <td>
                <input type="checkbox" name="_has_structures" id="has_structures" value="1" <?php checked($has_structures, 1); ?>>
                <span id="num_structures_container" style="display: none; margin-left: 10px;">
                    <label for="num_structures">Number of Structures:</label>
                    <input type="number" name="_num_structures" id="num_structures" value="<?php echo esc_attr($num_structures); ?>" class="regular-text" min="0" max="10000" size="6" style="width: 80px;">
                </span>
            </td>
        </tr>
        <tr>
            <th><label for="zoning">Zoning</label></th>
            <td>
                <select name="_zoning" id="zoning" class="regular-text">
                    <option value="">Select Zoning</option>
                    <?php foreach ($zoning_options as $value => $label) : ?>
                        <option value="<?php echo esc_attr($value); ?>" <?php selected($zoning, $value); ?>><?php echo esc_html($label); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </tbody>
</table>

<script>
    (function($) {
        var hasStructuresCheckbox = $('#has_structures');
        var numStructuresContainer = $('#num_structures_container');

        // Show/hide the "Number of Structures" container based on the "Has Structures?" checkbox
        function toggleNumStructuresContainer() {
            if (hasStructuresCheckbox.is(':checked')) {
                numStructuresContainer.show();
            } else {
                numStructuresContainer.hide();
            }
        }

        // Toggle the "Number of Structures" container on checkbox change
        hasStructuresCheckbox.on('change', toggleNumStructuresContainer);

        // Toggle the "Number of Structures" container on page load
        toggleNumStructuresContainer();
    })(jQuery);
</script>

<!-- ... -->
<script>
    (function($) {
        var hasStructuresCheckbox = $('#has_structures');
        var numStructuresContainer = $('#num_structures_container');
        var numStructuresField = $('#num_structures');

        // Show/hide the "Number of Structures" container based on the "Has Structures?" checkbox
        function toggleNumStructuresContainer() {
            if (hasStructuresCheckbox.is(':checked')) {
                numStructuresContainer.show();
            } else {
                numStructuresContainer.hide();
                numStructuresField.val('');
            }
            toggleStructuresMetaBox();
        }

        // Show/hide the "Structures" meta box based on the "Has Structures?" checkbox and "Number of Structures" field value
        function toggleStructuresMetaBox() {
            var hasStructures = hasStructuresCheckbox.is(':checked');
            var numStructures = parseInt(numStructuresField.val(), 10);

            if (hasStructures && numStructures > 0) {
                $('#property_structures').show();
            } else {
                $('#property_structures').hide();
            }
        }

        // Toggle the "Number of Structures" container on checkbox change
        hasStructuresCheckbox.on('change', toggleNumStructuresContainer);

        // Toggle the "Structures" meta box on "Number of Structures" field change
        numStructuresField.on('input', toggleStructuresMetaBox);

        // Toggle the "Number of Structures" container and "Structures" meta box on page load
        toggleNumStructuresContainer();
    })(jQuery);
</script>
