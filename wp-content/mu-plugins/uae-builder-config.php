<?php
/**
 * UAE Builder Configuration
 * This file ensures the UAE builder is properly configured
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add UAE Builder integration
add_action('init', 'uae_builder_integration_init');

function uae_builder_integration_init() {
    // Ensure UAE builder is active
    if (is_plugin_active('elementor-uae-builder/elementor-uae-builder.php')) {
        // Add theme support for UAE builder
        add_theme_support('uae-builder');
        add_theme_support('elementor');
        
        // Enqueue UAE builder styles
        add_action('wp_enqueue_scripts', 'uae_builder_enqueue_styles');
        
        // Add UAE header and footer hooks
        add_action('wp_head', 'uae_builder_render_header');
        add_action('wp_footer', 'uae_builder_render_footer');
    }
}

function uae_builder_enqueue_styles() {
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Enqueue UAE builder styles
    wp_enqueue_style('uae-builder-styles', plugin_dir_url(__FILE__) . '../plugins/elementor-uae-builder/assets/css/uae-builder.css');
    wp_enqueue_script('uae-builder-scripts', plugin_dir_url(__FILE__) . '../plugins/elementor-uae-builder/assets/js/uae-builder.js', array('jquery'), '1.0.0', true);
}

function uae_builder_render_header() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'elementor_uae_templates';
    
    $header_template = $wpdb->get_row("SELECT * FROM $table_name WHERE type = 'header' AND status = 'active' ORDER BY updated_at DESC LIMIT 1");
    
    if ($header_template) {
        echo '<div class="uae-header-wrapper">';
        echo do_shortcode($header_template->content);
        echo '</div>';
    }
}

function uae_builder_render_footer() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'elementor_uae_templates';
    
    $footer_template = $wpdb->get_row("SELECT * FROM $table_name WHERE type = 'footer' AND status = 'active' ORDER BY updated_at DESC LIMIT 1");
    
    if ($footer_template) {
        echo '<div class="uae-footer-wrapper">';
        echo do_shortcode($footer_template->content);
        echo '</div>';
    }
}

// Add UAE builder admin menu
add_action('admin_menu', 'uae_builder_admin_menu');

function uae_builder_admin_menu() {
    add_menu_page(
        'UAE Builder',
        'UAE Builder',
        'manage_options',
        'uae-builder',
        'uae_builder_admin_page',
        'dashicons-admin-customizer',
        32
    );
}

function uae_builder_admin_page() {
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
    
    // Handle form submission
    if (isset($_POST['submit']) && wp_verify_nonce($_POST['uae_nonce'], 'uae_save_template')) {
        $name = sanitize_text_field($_POST['name']);
        $type = sanitize_text_field($_POST['type']);
        $content = wp_kses_post($_POST['content']);
        $settings = json_encode(array(
            'responsive' => isset($_POST['responsive']) ? 1 : 0,
            'sticky' => isset($_POST['sticky']) ? 1 : 0,
            'transparent' => isset($_POST['transparent']) ? 1 : 0
        ));
        
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'type' => $type,
                'content' => $content,
                'settings' => $settings,
                'status' => 'active'
            )
        );
        
        echo '<div class="notice notice-success"><p>Template created successfully!</p></div>';
    }
    
    // Get templates
    $templates = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
    
    ?>
    <div class="wrap">
        <h1>UAE Builder - Header & Footer Manager</h1>
        
        <div class="uae-builder-admin">
            <h2>Create New Template</h2>
            <form method="post">
                <?php wp_nonce_field('uae_save_template', 'uae_nonce'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Template Name</th>
                        <td><input type="text" name="name" class="regular-text" required /></td>
                    </tr>
                    <tr>
                        <th scope="row">Template Type</th>
                        <td>
                            <select name="type" required>
                                <option value="header">Header</option>
                                <option value="footer">Footer</option>
                                <option value="popup">Popup</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Template Content</th>
                        <td>
                            <textarea name="content" rows="10" cols="50" class="large-text" placeholder="Enter HTML/CSS content or use Elementor shortcode"></textarea>
                            <p class="description">You can use HTML, CSS, or Elementor shortcodes here.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Settings</th>
                        <td>
                            <label><input type="checkbox" name="responsive" value="1" checked /> Responsive</label><br>
                            <label><input type="checkbox" name="sticky" value="1" /> Sticky (for headers)</label><br>
                            <label><input type="checkbox" name="transparent" value="1" /> Transparent Background</label>
                        </td>
                    </tr>
                </table>
                <?php submit_button('Create Template'); ?>
            </form>
        </div>
        
        <h2>Existing Templates</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($templates)): ?>
                <tr>
                    <td colspan="5">No templates found. Create your first template above.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($templates as $template): ?>
                <tr>
                    <td><?php echo esc_html($template->name); ?></td>
                    <td><?php echo ucfirst($template->type); ?></td>
                    <td><?php echo ucfirst($template->status); ?></td>
                    <td><?php echo date('Y-m-d H:i', strtotime($template->created_at)); ?></td>
                    <td>
                        <a href="#" class="button set-active" data-id="<?php echo $template->id; ?>" data-type="<?php echo $template->type; ?>">Set Active</a>
                        <a href="#" class="button edit-template" data-id="<?php echo $template->id; ?>">Edit</a>
                        <a href="#" class="button delete-template" data-id="<?php echo $template->id; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="uae-builder-help">
            <h3>How to Use UAE Builder</h3>
            <ol>
                <li><strong>Create Templates:</strong> Use the form above to create header and footer templates</li>
                <li><strong>Use Elementor:</strong> You can use Elementor shortcodes in the content field</li>
                <li><strong>Set Active:</strong> Click "Set Active" to make a template live on your site</li>
                <li><strong>Edit Pages:</strong> Use Elementor to edit individual pages and content</li>
            </ol>
            
            <h3>Elementor Integration</h3>
            <p>To use Elementor with your templates:</p>
            <ol>
                <li>Create a page or post with Elementor</li>
                <li>Use the shortcode: <code>[elementor-template id="123"]</code></li>
                <li>Replace "123" with your Elementor template ID</li>
            </ol>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('.set-active').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var type = $(this).data('type');
            
            $.post(ajaxurl, {
                action: 'uae_set_active_template',
                id: id,
                type: type
            }, function(response) {
                if (response.success) {
                    alert('Template set as active ' + type);
                    location.reload();
                }
            });
        });
        
        $('.delete-template').click(function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this template?')) {
                var id = $(this).data('id');
                $.post(ajaxurl, {
                    action: 'uae_delete_template',
                    id: id
                }, function(response) {
                    location.reload();
                });
            }
        });
    });
    </script>
    <?php
}

// AJAX handlers
add_action('wp_ajax_uae_set_active_template', 'uae_set_active_template');
add_action('wp_ajax_uae_delete_template', 'uae_delete_template');

function uae_set_active_template() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'elementor_uae_templates';
    
    $id = intval($_POST['id']);
    $type = sanitize_text_field($_POST['type']);
    
    // Deactivate all templates of this type
    $wpdb->update(
        $table_name,
        array('status' => 'inactive'),
        array('type' => $type)
    );
    
    // Activate selected template
    $wpdb->update(
        $table_name,
        array('status' => 'active'),
        array('id' => $id)
    );
    
    wp_send_json_success('Template activated');
}

function uae_delete_template() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'elementor_uae_templates';
    
    $id = intval($_POST['id']);
    $wpdb->delete($table_name, array('id' => $id));
    
    wp_send_json_success('Template deleted');
}
?>
