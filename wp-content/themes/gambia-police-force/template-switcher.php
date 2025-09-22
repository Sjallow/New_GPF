<?php
/**
 * Template Switcher for Rwanda Police Design
 * Switch between original and Rwanda Police templates
 */

// Add admin menu for template switching
add_action('admin_menu', 'gpf_template_switcher_menu');

function gpf_template_switcher_menu() {
    add_submenu_page(
        'themes.php',
        'Template Switcher',
        'Template Switcher',
        'manage_options',
        'gpf-template-switcher',
        'gpf_template_switcher_page'
    );
}

function gpf_template_switcher_page() {
    if (isset($_POST['switch_template'])) {
        $template = sanitize_text_field($_POST['template']);
        update_option('gpf_active_template', $template);
        echo '<div class="notice notice-success"><p>Template switched successfully!</p></div>';
    }
    
    $current_template = get_option('gpf_active_template', 'original');
    ?>
    <div class="wrap">
        <h1>Template Switcher</h1>
        <p>Switch between the original Gambia Police Force design and the Rwanda Police replica design.</p>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Current Template</th>
                    <td>
                        <fieldset>
                            <label>
                                <input type="radio" name="template" value="original" <?php checked($current_template, 'original'); ?>>
                                Original Gambia Police Force Design
                            </label><br>
                            <label>
                                <input type="radio" name="template" value="rwanda" <?php checked($current_template, 'rwanda'); ?>>
                                Rwanda Police Replica Design
                            </label>
                        </fieldset>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Switch Template', 'primary', 'switch_template'); ?>
        </form>
        
        <div style="margin-top: 30px; padding: 20px; background: #f1f1f1; border-radius: 5px;">
            <h3>Template Features</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 15px;">
                <div>
                    <h4>Original Design</h4>
                    <ul>
                        <li>Custom Gambia Police branding</li>
                        <li>Basic layout and styling</li>
                        <li>Standard WordPress functionality</li>
                        <li>Mobile responsive</li>
                    </ul>
                </div>
                <div>
                    <h4>Rwanda Police Replica</h4>
                    <ul>
                        <li>Exact Rwanda Police color scheme</li>
                        <li>Advanced animations and effects</li>
                        <li>Interactive elements</li>
                        <li>Professional typography</li>
                        <li>Enhanced mobile experience</li>
                        <li>News ticker with latest posts</li>
                        <li>Emergency call functionality</li>
                        <li>Social media integration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Template loader
add_filter('template_include', 'gpf_template_loader');

function gpf_template_loader($template) {
    $active_template = get_option('gpf_active_template', 'rwanda');
    
    if ($active_template === 'rwanda') {
        // Use Rwanda Police templates
        if (is_home() || is_front_page()) {
            $rwanda_template = get_template_directory() . '/index-rwanda.php';
            if (file_exists($rwanda_template)) {
                return $rwanda_template;
            }
        }
    }
    
    return $template;
}

// Header template switcher
add_filter('get_header', 'gpf_header_switcher');

function gpf_header_switcher($name) {
    $active_template = get_option('gpf_active_template', 'rwanda');
    
    if ($active_template === 'rwanda') {
        $rwanda_header = get_template_directory() . '/header-rwanda.php';
        if (file_exists($rwanda_header)) {
            include $rwanda_header;
            return;
        }
    }
    
    // Default header
    get_header($name);
}

// Add template indicator to admin bar
add_action('admin_bar_menu', 'gpf_template_indicator', 999);

function gpf_template_indicator($wp_admin_bar) {
    $active_template = get_option('gpf_active_template', 'rwanda');
    $template_name = $active_template === 'rwanda' ? 'Rwanda Police' : 'Original';
    
    $wp_admin_bar->add_node(array(
        'id' => 'gpf-template-indicator',
        'title' => 'Template: ' . $template_name,
        'href' => admin_url('themes.php?page=gpf-template-switcher'),
        'meta' => array(
            'title' => 'Click to switch template'
        )
    ));
}

// Add template switcher to customizer
add_action('customize_register', 'gpf_template_customizer');

function gpf_template_customizer($wp_customize) {
    $wp_customize->add_section('gpf_template_section', array(
        'title' => __('Template Settings', 'gpf'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('gpf_active_template', array(
        'default' => 'original',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gpf_active_template', array(
        'label' => __('Active Template', 'gpf'),
        'section' => 'gpf_template_section',
        'type' => 'radio',
        'choices' => array(
            'original' => __('Original Gambia Police Force Design', 'gpf'),
            'rwanda' => __('Rwanda Police Replica Design', 'gpf'),
        ),
    ));
}

// Save template setting
add_action('customize_save_after', 'gpf_save_template_setting');

function gpf_save_template_setting() {
    if (isset($_POST['customized'])) {
        $customized = json_decode(wp_unslash($_POST['customized']), true);
        if (isset($customized['gpf_active_template'])) {
            update_option('gpf_active_template', $customized['gpf_active_template']);
        }
    }
}
?>
