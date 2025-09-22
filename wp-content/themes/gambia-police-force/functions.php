<?php
/**
 * Gambia Police Force Theme Functions
 */

// Theme setup
function gpf_theme_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add Elementor support
    add_theme_support('elementor');
    add_theme_support('elementor-pro');
    add_theme_support('elementor-theme-builder');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gpf'),
        'footer' => __('Footer Menu', 'gpf'),
    ));
}
add_action('after_setup_theme', 'gpf_theme_setup');

// Enqueue styles and scripts
function gpf_scripts() {
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Theme styles
    wp_enqueue_style('gpf-style', get_stylesheet_uri(), array('font-awesome'), '1.0.0');
    
    // Rwanda Police styles
    wp_enqueue_style('gpf-rwanda-style', get_template_directory_uri() . '/style-rwanda.css', array('font-awesome'), '1.0.0');
    
    // Theme scripts
    wp_enqueue_script('gpf-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Rwanda Police scripts
    wp_enqueue_script('gpf-rwanda-script', get_template_directory_uri() . '/js/rwanda-police.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('gpf-script', 'gpf_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('gpf_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'gpf_scripts');

// Register widget areas
function gpf_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'gpf'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'gpf'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'gpf_widgets_init');

// Custom post types
function gpf_custom_post_types() {
    // News post type
    register_post_type('news', array(
        'labels' => array(
            'name' => 'News',
            'singular_name' => 'News Item',
            'add_new' => 'Add New News',
            'add_new_item' => 'Add New News Item',
            'edit_item' => 'Edit News Item',
            'new_item' => 'New News Item',
            'view_item' => 'View News Item',
            'search_items' => 'Search News',
            'not_found' => 'No news found',
            'not_found_in_trash' => 'No news found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-megaphone',
    ));

    // Videos post type
    register_post_type('videos', array(
        'labels' => array(
            'name' => 'Videos',
            'singular_name' => 'Video',
            'add_new' => 'Add New Video',
            'add_new_item' => 'Add New Video',
            'edit_item' => 'Edit Video',
            'new_item' => 'New Video',
            'view_item' => 'View Video',
            'search_items' => 'Search Videos',
            'not_found' => 'No videos found',
            'not_found_in_trash' => 'No videos found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-video-alt3',
    ));

    // Photos post type
    register_post_type('photos', array(
        'labels' => array(
            'name' => 'Photos',
            'singular_name' => 'Photo',
            'add_new' => 'Add New Photo',
            'add_new_item' => 'Add New Photo',
            'edit_item' => 'Edit Photo',
            'new_item' => 'New Photo',
            'view_item' => 'View Photo',
            'search_items' => 'Search Photos',
            'not_found' => 'No photos found',
            'not_found_in_trash' => 'No photos found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-camera',
    ));

    // Services post type
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
            'add_new' => 'Add New Service',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Services',
            'not_found' => 'No services found',
            'not_found_in_trash' => 'No services found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-admin-tools',
    ));
}
add_action('init', 'gpf_custom_post_types');

// Customizer settings
function gpf_customize_register($wp_customize) {
    // Header Section
    $wp_customize->add_section('gpf_header', array(
        'title' => __('Header Settings', 'gpf'),
        'priority' => 30,
    ));

    // Main Title
    $wp_customize->add_setting('gpf_main_title', array(
        'default' => 'GAMBIA POLICE FORCE',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gpf_main_title', array(
        'label' => __('Main Title', 'gpf'),
        'section' => 'gpf_header',
        'type' => 'text',
    ));

    // Slogan
    $wp_customize->add_setting('gpf_slogan', array(
        'default' => 'Service - Protection - Integrity',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gpf_slogan', array(
        'label' => __('Slogan', 'gpf'),
        'section' => 'gpf_header',
        'type' => 'text',
    ));

    // Contact Information Section
    $wp_customize->add_section('gpf_contact', array(
        'title' => __('Contact Information', 'gpf'),
        'priority' => 35,
    ));

    // Email
    $wp_customize->add_setting('gpf_email', array(
        'default' => 'info@gambiapolice.gov.gm',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('gpf_email', array(
        'label' => __('Email Address', 'gpf'),
        'section' => 'gpf_contact',
        'type' => 'email',
    ));

    // Emergency Number
    $wp_customize->add_setting('gpf_emergency', array(
        'default' => '117',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gpf_emergency', array(
        'label' => __('Emergency Number', 'gpf'),
        'section' => 'gpf_contact',
        'type' => 'text',
    ));

    // Phone Number
    $wp_customize->add_setting('gpf_phone', array(
        'default' => '+220 422 2000',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('gpf_phone', array(
        'label' => __('Phone Number', 'gpf'),
        'section' => 'gpf_contact',
        'type' => 'text',
    ));
    
    // Add Homepage Content Section
    $wp_customize->add_section('gpf_homepage', array(
        'title' => __('Homepage Content', 'gpf'),
        'priority' => 40,
    ));
    
    // Hero Section Title
    $wp_customize->add_setting('gpf_hero_title', array(
        'default' => 'Welcome to Gambia Police Force',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gpf_hero_title', array(
        'label' => __('Hero Section Title', 'gpf'),
        'section' => 'gpf_homepage',
        'type' => 'text',
    ));
    
    // Hero Section Description
    $wp_customize->add_setting('gpf_hero_description', array(
        'default' => 'Serving and protecting the people of The Gambia with integrity, professionalism, and dedication.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('gpf_hero_description', array(
        'label' => __('Hero Section Description', 'gpf'),
        'section' => 'gpf_homepage',
        'type' => 'textarea',
    ));
    
    // News Section Title
    $wp_customize->add_setting('gpf_news_title', array(
        'default' => 'Latest News & Updates',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gpf_news_title', array(
        'label' => __('News Section Title', 'gpf'),
        'section' => 'gpf_homepage',
        'type' => 'text',
    ));
    
    // Services Section Title
    $wp_customize->add_setting('gpf_services_title', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gpf_services_title', array(
        'label' => __('Services Section Title', 'gpf'),
        'section' => 'gpf_homepage',
        'type' => 'text',
    ));
    
    // Add Social Media Section
    $wp_customize->add_section('gpf_social', array(
        'title' => __('Social Media Links', 'gpf'),
        'priority' => 45,
    ));
    
    // Facebook
    $wp_customize->add_setting('gpf_facebook', array(
        'default' => 'https://facebook.com/gambiapolice',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gpf_facebook', array(
        'label' => __('Facebook URL', 'gpf'),
        'section' => 'gpf_social',
        'type' => 'url',
    ));
    
    // Twitter
    $wp_customize->add_setting('gpf_twitter', array(
        'default' => 'https://twitter.com/gambiapolice',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gpf_twitter', array(
        'label' => __('Twitter URL', 'gpf'),
        'section' => 'gpf_social',
        'type' => 'url',
    ));
    
    // Instagram
    $wp_customize->add_setting('gpf_instagram', array(
        'default' => 'https://instagram.com/gambiapolice',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gpf_instagram', array(
        'label' => __('Instagram URL', 'gpf'),
        'section' => 'gpf_social',
        'type' => 'url',
    ));
    
    // YouTube
    $wp_customize->add_setting('gpf_youtube', array(
        'default' => 'https://youtube.com/gambiapolice',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gpf_youtube', array(
        'label' => __('YouTube URL', 'gpf'),
        'section' => 'gpf_social',
        'type' => 'url',
    ));
}
add_action('customize_register', 'gpf_customize_register');

// Add custom CSS to admin
function gpf_admin_styles() {
    echo '<style>
        .gpf-admin-notice {
            background: #1e3a8a;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>';
}
add_action('admin_head', 'gpf_admin_styles');

// Add admin notice
function gpf_admin_notice() {
    echo '<div class="gpf-admin-notice">
        <h3>Gambia Police Force Theme</h3>
        <p>Welcome to your new police website! Customize your site using the <a href="' . admin_url('customize.php') . '" style="color: #fbbf24;">Customizer</a> or <a href="' . admin_url('admin.php?page=gpf-manual-editor') . '" style="color: #fbbf24;">Manual Editor</a>.</p>
    </div>';
}
add_action('admin_notices', 'gpf_admin_notice');

// Add manual editor admin page
function gpf_add_admin_menu() {
    add_menu_page(
        'GPF Manual Editor',
        'GPF Editor',
        'manage_options',
        'gpf-manual-editor',
        'gpf_manual_editor_page',
        'dashicons-edit-page',
        30
    );
}
add_action('admin_menu', 'gpf_add_admin_menu');

// Include template switcher
require get_template_directory() . '/template-switcher.php';

// Manual editor page
function gpf_manual_editor_page() {
    ?>
    <div class="wrap">
        <h1>🎯 Gambia Police Force - Manual Editor</h1>
        
        <div class="gpf-editor-tabs">
            <button class="tab-button active" onclick="openTab(event, 'homepage')">Homepage Content</button>
            <button class="tab-button" onclick="openTab(event, 'header')">Header Settings</button>
            <button class="tab-button" onclick="openTab(event, 'footer')">Footer Settings</button>
            <button class="tab-button" onclick="openTab(event, 'content')">Add Content</button>
        </div>
        
        <div id="homepage" class="tab-content active">
            <h2>Homepage Content Editor</h2>
            <form method="post" action="options.php">
                <?php settings_fields('gpf_homepage_settings'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Hero Section Title</th>
                        <td><input type="text" name="gpf_hero_title" value="<?php echo get_theme_mod('gpf_hero_title', 'Welcome to Gambia Police Force'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Hero Section Description</th>
                        <td><textarea name="gpf_hero_description" rows="3" class="large-text"><?php echo get_theme_mod('gpf_hero_description', 'Serving and protecting the people of The Gambia with integrity, professionalism, and dedication.'); ?></textarea></td>
                    </tr>
                    <tr>
                        <th scope="row">News Section Title</th>
                        <td><input type="text" name="gpf_news_title" value="<?php echo get_theme_mod('gpf_news_title', 'Latest News & Updates'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Services Section Title</th>
                        <td><input type="text" name="gpf_services_title" value="<?php echo get_theme_mod('gpf_services_title', 'Our Services'); ?>" class="regular-text" /></td>
                    </tr>
                </table>
                <?php submit_button('Save Homepage Settings'); ?>
            </form>
        </div>
        
        <div id="header" class="tab-content">
            <h2>Header Settings</h2>
            <form method="post" action="options.php">
                <?php settings_fields('gpf_header_settings'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Main Title</th>
                        <td><input type="text" name="gpf_main_title" value="<?php echo get_theme_mod('gpf_main_title', 'GAMBIA POLICE FORCE'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Slogan</th>
                        <td><input type="text" name="gpf_slogan" value="<?php echo get_theme_mod('gpf_slogan', 'Service - Protection - Integrity'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Email Address</th>
                        <td><input type="email" name="gpf_email" value="<?php echo get_theme_mod('gpf_email', 'info@gambiapolice.gov.gm'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Emergency Number</th>
                        <td><input type="text" name="gpf_emergency" value="<?php echo get_theme_mod('gpf_emergency', '117'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone Number</th>
                        <td><input type="text" name="gpf_phone" value="<?php echo get_theme_mod('gpf_phone', '+220 422 2000'); ?>" class="regular-text" /></td>
                    </tr>
                </table>
                <?php submit_button('Save Header Settings'); ?>
            </form>
        </div>
        
        <div id="footer" class="tab-content">
            <h2>Footer Settings</h2>
            <form method="post" action="options.php">
                <?php settings_fields('gpf_social_settings'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Facebook URL</th>
                        <td><input type="url" name="gpf_facebook" value="<?php echo get_theme_mod('gpf_facebook', 'https://facebook.com/gambiapolice'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Twitter URL</th>
                        <td><input type="url" name="gpf_twitter" value="<?php echo get_theme_mod('gpf_twitter', 'https://twitter.com/gambiapolice'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Instagram URL</th>
                        <td><input type="url" name="gpf_instagram" value="<?php echo get_theme_mod('gpf_instagram', 'https://instagram.com/gambiapolice'); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">YouTube URL</th>
                        <td><input type="url" name="gpf_youtube" value="<?php echo get_theme_mod('gpf_youtube', 'https://youtube.com/gambiapolice'); ?>" class="regular-text" /></td>
                    </tr>
                </table>
                <?php submit_button('Save Social Media Settings'); ?>
            </form>
        </div>
        
        <div id="content" class="tab-content">
            <h2>Add New Content</h2>
            <div class="gpf-content-actions">
                <a href="<?php echo admin_url('post-new.php?post_type=news'); ?>" class="button button-primary">Add News Article</a>
                <a href="<?php echo admin_url('post-new.php?post_type=services'); ?>" class="button button-primary">Add Service</a>
                <a href="<?php echo admin_url('post-new.php?post_type=videos'); ?>" class="button button-primary">Add Video</a>
                <a href="<?php echo admin_url('post-new.php?post_type=photos'); ?>" class="button button-primary">Add Photo</a>
                <a href="<?php echo admin_url('post-new.php'); ?>" class="button button-primary">Add Page</a>
            </div>
            
            <h3>Quick Links</h3>
            <div class="gpf-quick-links">
                <a href="<?php echo admin_url('customize.php'); ?>" class="button">Theme Customizer</a>
                <a href="<?php echo admin_url('edit.php?post_type=news'); ?>" class="button">Manage News</a>
                <a href="<?php echo admin_url('edit.php?post_type=services'); ?>" class="button">Manage Services</a>
                <a href="<?php echo admin_url('upload.php'); ?>" class="button">Media Library</a>
                <a href="<?php echo admin_url('nav-menus.php'); ?>" class="button">Menus</a>
            </div>
        </div>
    </div>
    
    <style>
    .gpf-editor-tabs {
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }
    
    .tab-button {
        background: none;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-bottom: 2px solid transparent;
    }
    
    .tab-button.active {
        border-bottom-color: #1e3a8a;
        color: #1e3a8a;
        font-weight: bold;
    }
    
    .tab-content {
        display: none;
        padding: 20px 0;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .gpf-content-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin: 20px 0;
    }
    
    .gpf-quick-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
        margin: 20px 0;
    }
    </style>
    
    <script>
    function openTab(evt, tabName) {
        var i, tabcontent, tabbuttons;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.remove("active");
        }
        tabbuttons = document.getElementsByClassName("tab-button");
        for (i = 0; i < tabbuttons.length; i++) {
            tabbuttons[i].classList.remove("active");
        }
        document.getElementById(tabName).classList.add("active");
        evt.currentTarget.classList.add("active");
    }
    </script>
    <?php
}

// Custom excerpt length
function gpf_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'gpf_excerpt_length');

// Custom excerpt more
function gpf_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'gpf_excerpt_more');

// Add theme support for custom background
add_theme_support('custom-background', array(
    'default-color' => 'ffffff',
));

// Add theme support for custom header
add_theme_support('custom-header', array(
    'default-image' => get_template_directory_uri() . '/images/header-bg.jpg',
    'width' => 1200,
    'height' => 300,
    'flex-height' => true,
    'flex-width' => true,
));

// AJAX handlers for contact forms
function gpf_handle_contact_form() {
    if (!wp_verify_nonce($_POST['_wpnonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Send email
    $to = get_option('admin_email');
    $email_subject = 'Contact Form: ' . $subject;
    $email_message = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    if ($sent) {
        wp_send_json_success('Message sent successfully');
    } else {
        wp_send_json_error('Failed to send message');
    }
}
add_action('wp_ajax_submit_contact_form', 'gpf_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'gpf_handle_contact_form');

// Emergency report handler
function gpf_handle_emergency_report() {
    if (!wp_verify_nonce($_POST['_wpnonce'], 'emergency_form_nonce')) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $location = sanitize_text_field($_POST['location']);
    $description = sanitize_textarea_field($_POST['description']);

    // Send emergency email
    $to = get_option('admin_email');
    $subject = 'EMERGENCY REPORT - ' . $name;
    $message = "EMERGENCY REPORT\n\nName: $name\nPhone: $phone\nLocation: $location\n\nDescription:\n$description";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success('Emergency report submitted');
    } else {
        wp_send_json_error('Failed to submit emergency report');
    }
}
add_action('wp_ajax_submit_emergency_report', 'gpf_handle_emergency_report');
add_action('wp_ajax_nopriv_submit_emergency_report', 'gpf_handle_emergency_report');

// Add AJAX URL to frontend
function gpf_add_ajax_url() {
    echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}
add_action('wp_head', 'gpf_add_ajax_url');
?>
