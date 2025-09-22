<?php
/**
 * Theme Switcher for UAE Builder
 * Run this file in your browser to switch themes
 */

// Include WordPress
require_once('wp-config.php');
require_once('wp-load.php');

// Check if user is admin
if (!current_user_can('switch_themes')) {
    die('You do not have permission to switch themes. Please log in as an administrator.');
}

// Available themes
$available_themes = array(
    'twentytwentyfive' => 'Twenty Twenty-Five',
    'twentytwentyfour' => 'Twenty Twenty-Four', 
    'twentytwentythree' => 'Twenty Twenty-Three'
);

// Get current theme
$current_theme = get_option('stylesheet');
$current_theme_name = wp_get_theme($current_theme)->get('Name');

echo "<!DOCTYPE html>";
echo "<html><head><title>Theme Switcher</title>";
echo "<style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;}";
echo ".success{color:green;background:#e8f5e8;padding:10px;border-radius:5px;margin:10px 0;}";
echo ".error{color:red;background:#ffe8e8;padding:10px;border-radius:5px;margin:10px 0;}";
echo ".info{color:blue;background:#e8f0ff;padding:10px;border-radius:5px;margin:10px 0;}";
echo "button{background:#1e3a8a;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;margin:5px;}";
echo "button:hover{background:#1e40af;}";
echo "a{color:#1e3a8a;text-decoration:none;}";
echo "</style></head><body>";

echo "<h1>🎯 Theme Switcher for UAE Builder</h1>";

echo "<div class='info'>";
echo "<strong>Current Theme:</strong> " . $current_theme_name;
echo "</div>";

// Handle theme switching
if (isset($_GET['switch_to'])) {
    $new_theme = sanitize_text_field($_GET['switch_to']);
    
    if (array_key_exists($new_theme, $available_themes)) {
        if (switch_theme($new_theme)) {
            echo "<div class='success'>";
            echo "✅ Successfully switched to " . $available_themes[$new_theme];
            echo "</div>";
            
            // Set up UAE builder integration
            set_theme_mod('uae_header_active', true);
            set_theme_mod('uae_footer_active', true);
            set_theme_mod('uae_elementor_integration', true);
            
            echo "<div class='success'>";
            echo "✅ UAE Builder integration enabled";
            echo "</div>";
            
            // Create default templates
            global $wpdb;
            $table_name = $wpdb->prefix . 'elementor_uae_templates';
            
            // Create table if it doesn't exist
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
            
            // Create default header template
            $header_content = '
            <header class="uae-header-template sticky" style="background: #1e3a8a; color: white; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                    <div class="uae-header-content" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
                        <div class="uae-logo">
                            <img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="Gambia Police Force" style="height: 60px;" onerror="this.style.display=\'none\'">
                            <span style="font-size: 24px; font-weight: bold; color: white;">GAMBIA POLICE FORCE</span>
                        </div>
                        <nav class="uae-navigation">
                            <ul style="display: flex; list-style: none; margin: 0; padding: 0; gap: 20px;">
                                <li><a href="' . home_url() . '" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: background 0.3s;">Home</a></li>
                                <li><a href="' . home_url('/about-us') . '" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: background 0.3s;">About Us</a></li>
                                <li><a href="' . home_url('/media') . '" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: background 0.3s;">Media</a></li>
                                <li><a href="' . home_url('/services') . '" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: background 0.3s;">Services</a></li>
                                <li><a href="' . home_url('/contact') . '" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: background 0.3s;">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="uae-header-actions" style="display: flex; align-items: center; gap: 15px;">
                            <div class="uae-language-selector">
                                <a href="#" class="active" style="color: white; text-decoration: none; padding: 5px 10px; border-radius: 3px; background: #fbbf24; color: #1e3a8a;">EN</a>
                                <a href="#" style="color: white; text-decoration: none; padding: 5px 10px;">AR</a>
                            </div>
                            <div class="uae-search">
                                <form style="display: flex; align-items: center;">
                                    <input type="search" placeholder="Search..." style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 20px; width: 200px;">
                                    <button type="submit" style="background: #fbbf24; border: none; color: #1e3a8a; padding: 8px 12px; border-radius: 0 20px 20px 0; margin-left: -5px;"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>';
            
            // Check if header template already exists
            $existing_header = $wpdb->get_row("SELECT * FROM $table_name WHERE type = 'header' AND name = 'Gambia Police Force Header'");
            
            if (!$existing_header) {
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
            }
            
            // Create default footer template
            $footer_content = '
            <footer class="uae-footer-template" style="background: #1e3a8a; color: white; padding: 40px 0 20px;">
                <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
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
            
            // Check if footer template already exists
            $existing_footer = $wpdb->get_row("SELECT * FROM $table_name WHERE type = 'footer' AND name = 'Gambia Police Force Footer'");
            
            if (!$existing_footer) {
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
            }
            
            echo "<div class='success'>";
            echo "✅ Default header and footer templates created";
            echo "</div>";
            
        } else {
            echo "<div class='error'>";
            echo "❌ Failed to switch theme. Please try manually in WordPress admin.";
            echo "</div>";
        }
    } else {
        echo "<div class='error'>";
        echo "❌ Invalid theme selected.";
        echo "</div>";
    }
}

echo "<h2>Available Themes:</h2>";
echo "<div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0;'>";

foreach ($available_themes as $theme_slug => $theme_name) {
    $is_current = ($current_theme === $theme_slug);
    $button_text = $is_current ? "✅ Current: " . $theme_name : "Switch to " . $theme_name;
    $button_style = $is_current ? "background: #10b981;" : "background: #1e3a8a;";
    
    echo "<div style='border: 1px solid #ddd; padding: 20px; border-radius: 10px; text-align: center;'>";
    echo "<h3>" . $theme_name . "</h3>";
    if ($is_current) {
        echo "<p style='color: green; font-weight: bold;'>Currently Active</p>";
    } else {
        echo "<a href='?switch_to=" . $theme_slug . "' style='" . $button_style . " color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;'>" . $button_text . "</a>";
    }
    echo "</div>";
}

echo "</div>";

echo "<div class='info'>";
echo "<h3>🎯 Next Steps After Switching:</h3>";
echo "<ol>";
echo "<li><strong>Go to WordPress Admin:</strong> <a href='" . admin_url() . "' target='_blank'>" . admin_url() . "</a></li>";
echo "<li><strong>UAE Builder:</strong> Navigate to 'UAE Builder' in the admin menu</li>";
echo "<li><strong>Edit Templates:</strong> Modify header and footer templates as needed</li>";
echo "<li><strong>Use Elementor:</strong> Edit pages with Elementor for full customization</li>";
echo "<li><strong>Configure Plugins:</strong> Set up Ditty News Ticker and Smart Slider 3</li>";
echo "</ol>";
echo "</div>";

echo "<div style='text-align: center; margin: 30px 0;'>";
echo "<a href='" . home_url() . "' target='_blank' style='background: #1e3a8a; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-size: 16px;'>View Your Website</a> ";
echo "<a href='" . admin_url() . "' target='_blank' style='background: #10b981; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-size: 16px;'>Go to WordPress Admin</a>";
echo "</div>";

echo "</body></html>";
?>
