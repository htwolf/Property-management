<?php
global $post;

// Retrieve the saved address meta box values
$address = get_post_meta($post->ID, '_address', true);
$address_2 = get_post_meta($post->ID, '_address_2', true);
$city = get_post_meta($post->ID, '_city', true);
$state = get_post_meta($post->ID, '_state', true);
$zip = get_post_meta($post->ID, '_zip', true);

// Define the U.S. states and their abbreviations
$us_states = array(
    'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California',
    'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District of Columbia',
    'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois',
    'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana',
    'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota',
    'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
    'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
    'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon',
    'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota',
    'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia',
    'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming'
);
?>

<table class="form-table">
    <tbody>
        <tr>
            <th><label for="address">Address</label></th>
            <td><input type="text" name="_address" id="address" value="<?php echo esc_attr($address); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="address_2">Address 2</label></th>
            <td><input type="text" name="_address_2" id="address_2" value="<?php echo esc_attr($address_2); ?>" class="regular-text"></td>
        </tr>
        <tr>
        <th><label for="city">City, State, ZIP</label></th>
            <td>
                <input type="text" name="_city" id="city" value="<?php echo esc_attr($city); ?>" class="regular-text" style="width: 200px;">
                <select name="_state" id="state" class="regular-text" style="width: 120px; margin-left: 5px;">
                    <option value="">State</option>
                    <?php foreach ($us_states as $abbr => $state_name) : ?>
                        <option value="<?php echo esc_attr($abbr); ?>" <?php selected($state, $abbr); ?>><?php echo esc_html($abbr); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="_zip" id="zip" value="<?php echo esc_attr($zip); ?>" class="regular-text" style="width: 80px; margin-left: 5px;" min="10000" max="99999" step="1">
            </td>
        </tr>
        <!-- <tr>
            <th><label for="city">City</label></th>
            <td><input type="text" name="_city" id="city" value="<?php echo esc_attr($city); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="state">State</label></th>
            <td><input type="text" name="_state" id="state" value="<?php echo esc_attr($state); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="zip">ZIP</label></th>
            <td><input type="text" name="_zip" id="zip" value="<?php echo esc_attr($zip); ?>" class="regular-text"></td>
        </tr> -->
    </tbody>
</table>