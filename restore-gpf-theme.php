<?php
/**
 * Restore Gambia Police Force Theme
 * This script will restore the GPF theme and add manual editing capabilities
 */

// Include WordPress
require_once('wp-config.php');
require_once('wp-load.php');

// Check if user is admin
if (!current_user_can('switch_themes')) {
    die('You do not have permission to switch themes.');
}

// Switch back to Gambia Police Force theme
if (switch_theme('gambia-police-force')) {
    echo "<div style='color: green; background: #e8f5e8; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "✅ Successfully restored Gambia Police Force theme!";
    echo "</div>";
    
    // Enable Elementor support
    set_theme_mod('elementor_support', true);
    set_theme_mod('elementor_theme_builder', true);
    
    echo "<div style='color: blue; background: #e8f0ff; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "✅ Elementor support enabled for manual editing!";
    echo "</div>";
    
} else {
    echo "<div style='color: red; background: #ffe8e8; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
    echo "❌ Failed to restore theme. Please check if the theme exists.";
    echo "</div>";
}
?>
