<?php
/**
 * Plugin Name: Property Management
 * Description: A plugin for managing properties with detailed information.
 * Version: 1.0
 * Author: Your Name
 */

// Include the main plugin class
require_once plugin_dir_path(__FILE__) . 'includes/class-property-management.php';

// Instantiate the main plugin class
$property_management = new Property_Management();
$property_management->run();