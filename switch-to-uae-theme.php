<?php
/**
 * Theme Switching Script for UAE Builder
 * This script will help switch from Gambia Police Force theme to a default theme
 * and configure the UAE builder properly
 */

// Include WordPress
require_once('wp-config.php');
require_once('wp-load.php');

// Check if user is admin
if (!current_user_can('switch_themes')) {
    die('You do not have permission to switch themes.');
}

// Available themes
$available_themes = array(
    'twentytwentyfive' => 'Twenty Twenty-Five',
    'twentytwentyfour' => 'Twenty Twenty-Four', 
    'twentytwentythree' => 'Twenty Twenty-Three'
);

// Get current theme
$current_theme = get_option('stylesheet');

echo "<h2>Current Theme: " . wp_get_theme($current_theme)->get('Name') . "</h2>";

// Switch to Twenty Twenty-Five (most modern)
$new_theme = 'twentytwentyfive';

if (switch_theme($new_theme)) {
    echo "<p style='color: green;'>✅ Successfully switched to " . $available_themes[$new_theme] . "</p>";
    
    // Update theme mods for UAE builder
    set_theme_mod('uae_header_active', true);
    set_theme_mod('uae_footer_active', true);
    set_theme_mod('uae_elementor_integration', true);
    
    echo "<p style='color: green;'>✅ UAE Builder integration enabled</p>";
    
    // Create default UAE header template
    global $wpdb;
    $table_name = $wpdb->prefix . 'elementor_uae_templates';
    
    // Check if table exists, if not create it
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            type varchar(50) NOT NULL,
            content longtext,
            settings longtext,
            status varchar(20) DEFAULT 'active',
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    // Insert default header template
    $header_content = '
    <header class="uae-header-template sticky">
        <div class="container">
            <div class="uae-header-content" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
                <div class="uae-logo">
                    <img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="Gambia Police Force" style="height: 60px;">
                </div>
                <nav class="uae-navigation">
                    <ul style="display: flex; list-style: none; margin: 0; padding: 0; gap: 20px;">
                        <li><a href="' . home_url() . '" style="color: #1e3a8a; text-decoration: none; font-weight: 500;">Home</a></li>
                        <li><a href="' . home_url('/about-us') . '" style="color: #1e3a8a; text-decoration: none; font-weight: 500;">About Us</a></li>
                        <li><a href="' . home_url('/media') . '" style="color: #1e3a8a; text-decoration: none; font-weight: 500;">Media</a></li>
                        <li><a href="' . home_url('/services') . '" style="color: #1e3a8a; text-decoration: none; font-weight: 500;">Services</a></li>
                        <li><a href="' . home_url('/contact') . '" style="color: #1e3a8a; text-decoration: none; font-weight: 500;">Contact</a></li>
                    </ul>
                </nav>
                <div class="uae-header-actions" style="display: flex; align-items: center; gap: 15px;">
                    <div class="uae-language-selector">
                        <a href="#" class="active" style="color: #1e3a8a; text-decoration: none; padding: 5px 10px; border-radius: 3px; background: #fbbf24;">EN</a>
                        <a href="#" style="color: #1e3a8a; text-decoration: none; padding: 5px 10px;">AR</a>
                    </div>
                    <div class="uae-search">
                        <form style="display: flex; align-items: center;">
                            <input type="search" placeholder="Search..." style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 20px; width: 200px;">
                            <button type="submit" style="background: none; border: none; color: #1e3a8a; margin-left: -30px;"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>';
    
    $wpdb->insert(
        $table_name,
        array(
            'name' => 'Gambia Police Force Header',
            'type' => 'header',
            'content' => $header_content,
            'settings' => json_encode(array(
                'responsive' => 1,
                'sticky' => 1,
                'transparent' => 0
            )),
            'status' => 'active'
        )
    );
    
    // Insert default footer template
    $footer_content = '
    <footer class="uae-footer-template" style="background: #1e3a8a; color: white; padding: 40px 0 20px;">
        <div class="container">
            <div class="uae-footer-content" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
                <div class="uae-footer-section">
                    <h3 style="color: #fbbf24; margin-bottom: 15px;">Contact Information</h3>
                    <div class="uae-contact-info">
                        <div class="uae-contact-item" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <i class="fas fa-phone" style="color: #fbbf24;"></i>
                            <span>+220 422 2000</span>
                        </div>
                        <div class="uae-contact-item" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <i class="fas fa-envelope" style="color: #fbbf24;"></i>
                            <span>info@gambiapolice.gov.gm</span>
                        </div>
                        <div class="uae-contact-item" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <i class="fas fa-map-marker-alt" style="color: #fbbf24;"></i>
                            <span>Banjul, The Gambia</span>
                        </div>
                    </div>
                </div>
                <div class="uae-footer-section">
                    <h3 style="color: #fbbf24; margin-bottom: 15px;">Quick Links</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 8px;"><a href="' . home_url('/about-us') . '" style="color: white; text-decoration: none;">About Us</a></li>
                        <li style="margin-bottom: 8px;"><a href="' . home_url('/services') . '" style="color: white; text-decoration: none;">Services</a></li>
                        <li style="margin-bottom: 8px;"><a href="' . home_url('/media') . '" style="color: white; text-decoration: none;">Media</a></li>
                        <li style="margin-bottom: 8px;"><a href="' . home_url('/contact') . '" style="color: white; text-decoration: none;">Contact</a></li>
                    </ul>
                </div>
                <div class="uae-footer-section">
                    <h3 style="color: #fbbf24; margin-bottom: 15px;">Follow Us</h3>
                    <div class="uae-social-media" style="display: flex; gap: 10px;">
                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; text-decoration: none; border-radius: 50%;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; text-decoration: none; border-radius: 50%;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; text-decoration: none; border-radius: 50%;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; text-decoration: none; border-radius: 50%;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="uae-footer-bottom" style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px; text-align: center;">
                <p style="margin: 0;">&copy; ' . date('Y') . ' Gambia Police Force. All rights reserved.</p>
            </div>
        </div>
    </footer>';
    
    $wpdb->insert(
        $table_name,
        array(
            'name' => 'Gambia Police Force Footer',
            'type' => 'footer',
            'content' => $footer_content,
            'settings' => json_encode(array(
                'responsive' => 1,
                'sticky' => 0,
                'transparent' => 0
            )),
            'status' => 'active'
        )
    );
    
    echo "<p style='color: green;'>✅ Default header and footer templates created</p>";
    echo "<p style='color: blue;'>🎯 You can now edit the header and footer using the UAE Builder in your WordPress admin!</p>";
    
} else {
    echo "<p style='color: red;'>❌ Failed to switch theme. Please try manually in WordPress admin.</p>";
}

echo "<hr>";
echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li>Go to your WordPress admin dashboard</li>";
echo "<li>Navigate to <strong>UAE Builder</strong> in the admin menu</li>";
echo "<li>Edit the header and footer templates as needed</li>";
echo "<li>Use Elementor to edit pages and content</li>";
echo "<li>Configure the Ditty News Ticker and Smart Slider 3</li>";
echo "</ol>";

echo "<p><a href='" . admin_url() . "' style='background: #1e3a8a; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Go to WordPress Admin</a></p>";
?>
