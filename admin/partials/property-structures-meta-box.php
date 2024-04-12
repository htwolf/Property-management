<!-- ... -->
<table class="form-table">
    <tbody>
        <tr>
            <th><label>Structures</label></th>
            <td>
                <div id="structures_repeater"><?php
global $post;

// Retrieve the saved structures meta box values
$structures = get_post_meta($post->ID, '_structures', true);

// Define the available structure types
$structure_types = array(
    'House' => 'House',
    'Apartment' => 'Apartment',
    'Duplex' => 'Duplex',
    'Townhouse' => 'Townhouse',
    'Condominium' => 'Condominium',
    'Mobile Home' => 'Mobile Home',
    'Cabin' => 'Cabin',
    'Cottage' => 'Cottage',
    'Chalet' => 'Chalet',
    'Farmhouse' => 'Farmhouse',
    'Ranch' => 'Ranch',
    'Bungalow' => 'Bungalow',
    'Mansion' => 'Mansion',
    'Villa' => 'Villa',
    'Yurt' => 'Yurt',
    'Treehouse' => 'Treehouse',
    'Houseboat' => 'Houseboat',
    'Barn' => 'Barn',
    'Garage' => 'Garage',
    'Shed' => 'Shed',
    'Greenhouse' => 'Greenhouse',
    'Other' => 'Other'
);
?>

<table class="form-table">
    <tbody>
        <tr>
            <th><label></label></th>
            <td>
                <div id="structures_repeater">
                    <?php
                    if (!empty($structures)) {
                        foreach ($structures as $index => $structure) {
                            ?>
                            <div class="structure-row">
                                <input type="text" name="_structures[<?php echo $index; ?>][title]" value="<?php echo esc_attr($structure['title']); ?>" placeholder="Structure Title" class="regular-text">
                                <select name="_structures[<?php echo $index; ?>][type]" class="regular-text">
                                    <option value="">Select Structure Type</option>
                                    <?php foreach ($structure_types as $value => $label) : ?>
                                        <option value="<?php echo esc_attr($value); ?>" <?php selected($structure['type'], $value); ?>><?php echo esc_html($label); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="button" class="button remove-structure-btn">Remove</button>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button" id="add_structure_btn">Add Structure</button>
            </td>
        </tr>
    </tbody>
</table>

<script>
    (function($) {
        var structuresRepeater = $('#structures_repeater');
        var addStructureBtn = $('#add_structure_btn');
        var structureIndex = structuresRepeater.find('.structure-row').length;

        // Add a new structure row
        function addStructureRow() {
            var newRow = $('<div class="structure-row"><input type="text" name="_structures[' + structureIndex + '][title]" value="Structure ' + (structureIndex + 1) + '" placeholder="Structure Title" class="regular-text"><select name="_structures[' + structureIndex + '][type]" class="regular-text"><option value="">Select Structure Type</option><?php foreach ($structure_types as $value => $label) : ?><option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option><?php endforeach; ?></select><button type="button" class="button remove-structure-btn">Remove</button></div>');
            structuresRepeater.append(newRow);
            structureIndex++;
        }

        // Remove a structure row
        function removeStructureRow() {
            $(this).closest('.structure-row').remove();
        }

        // Add structure row on button click
        addStructureBtn.on('click', addStructureRow);

        // Remove structure row on button click
        structuresRepeater.on('click', '.remove-structure-btn', removeStructureRow);
    })(jQuery);
</script>
                    <?php
                    if (!empty($structures)) {
                        foreach ($structures as $index => $structure) {
                            ?>
                            <div class="structure-row">
                                <input type="text" name="_structures[<?php echo $index; ?>][title]" value="<?php echo esc_attr($structure['title']); ?>" placeholder="Structure Title" class="regular-text">
                                <select name="_structures[<?php echo $index; ?>][type]" class="regular-text">
                                    <option value="">Select Structure Type</option>
                                    <?php foreach ($structure_types as $value => $label) : ?>
                                        <option value="<?php echo esc_attr($value); ?>" <?php selected($structure['type'], $value); ?>><?php echo esc_html($label); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="button" class="button remove-structure-btn">Remove</button>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button" id="add_structure_btn" style="display: none;">Add Structure</button>
            </td>
        </tr>
    </tbody>
</table>

<!-- ... -->
<script>
    (function($) {
    var structuresRepeater = $('#structures_repeater');
    var addStructureBtn = $('#add_structure_btn');
    var hasStructuresCheckbox = $('#has_structures');
    var numStructuresField = $('#num_structures');
    var structuresMetaBox = $('#property_structures');

    // Add a new structure row
    function addStructureRow() {
        var numStructures = parseInt(numStructuresField.val(), 10);
        var currentStructures = structuresRepeater.find('.structure-row').length;

        if (currentStructures < numStructures) {
            var newRow = $('<div class="structure-row"><input type="text" name="_structures[' + currentStructures + '][title]" value="Structure ' + (currentStructures + 1) + '" placeholder="Structure Title" class="regular-text"><select name="_structures[' + currentStructures + '][type]" class="regular-text"><option value="">Select Structure Type</option><?php foreach ($structure_types as $value => $label) : ?><option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option><?php endforeach; ?></select><button type="button" class="button remove-structure-btn">Remove</button></div>');
            structuresRepeater.append(newRow);
            updateAddStructureButton();
        }
    }

    // Remove a structure row
    function removeStructureRow() {
        $(this).closest('.structure-row').remove();
        updateAddStructureButton();
    }

    // Update the visibility of the "Add Structure" button
    function updateAddStructureButton() {
        var numStructures = parseInt(numStructuresField.val(), 10);
        var currentStructures = structuresRepeater.find('.structure-row').length;

        if (numStructures > currentStructures) {
            addStructureBtn.show();
        } else {
            addStructureBtn.hide();
        }
    }

    // Update the visibility of the "Structures" meta box
    function updateStructuresMetaBox() {
        var hasStructures = hasStructuresCheckbox.is(':checked');
        var numStructures = parseInt(numStructuresField.val(), 10);

        if (hasStructures && numStructures > 0) {
            structuresMetaBox.show();
        } else {
            structuresMetaBox.hide();
        }
    }

    // Initialize structure rows and meta box visibility
    function initializeStructures() {
        var numStructures = parseInt(numStructuresField.val(), 10);
        var currentStructures = structuresRepeater.find('.structure-row').length;

        if (numStructures > currentStructures) {
            for (var i = currentStructures; i < numStructures; i++) {
                addStructureRow();
            }
        } else if (numStructures < currentStructures) {
            structuresRepeater.find('.structure-row').slice(numStructures).remove();
        }

        updateAddStructureButton();
        updateStructuresMetaBox();
    }

    // Add structure row on button click
    addStructureBtn.on('click', addStructureRow);

    // Remove structure row on button click
    structuresRepeater.on('click', '.remove-structure-btn', removeStructureRow);

    // Update structure rows and meta box visibility on "Number of Structures" field change
    numStructuresField.on('input', initializeStructures);

    // Update meta box visibility on "Has Structures?" checkbox change
    hasStructuresCheckbox.on('change', updateStructuresMetaBox);

    // Initialize structure rows and meta box visibility on page load
    initializeStructures();
    updateStructuresMetaBox();
})(jQuery);
</script>