<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Top Bar - Rwanda Police Style -->
    <div class="top-bar" style="background: #1a365d; color: white; padding: 8px 0; font-size: 13px; border-bottom: 2px solid #2d5a87;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div class="top-bar-left" style="display: flex; align-items: center; gap: 25px;">
                <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-envelope" style="color: #ffd700;"></i> <?php echo get_theme_mod('gpf_email', 'info@gambiapolice.gov.gm'); ?></span>
                <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-phone" style="color: #ffd700;"></i> Emergency: <?php echo get_theme_mod('gpf_emergency', '117'); ?></span>
                <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-phone" style="color: #ffd700;"></i> <?php echo get_theme_mod('gpf_phone', '+220 422 2000'); ?></span>
            </div>
            <div class="top-bar-right" style="display: flex; align-items: center; gap: 20px;">
                <div class="language-selector" style="display: flex; gap: 10px;">
                    <a href="#" class="active" style="color: #ffd700; text-decoration: none; font-weight: bold;">EN</a>
                    <a href="#" style="color: white; text-decoration: none;">FR</a>
                    <a href="#" style="color: white; text-decoration: none;">AR</a>
                </div>
                <div class="social-links" style="display: flex; gap: 12px;">
                    <a href="<?php echo get_theme_mod('gpf_facebook', '#'); ?>" style="color: #ffd700; font-size: 16px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_twitter', '#'); ?>" style="color: #ffd700; font-size: 16px;"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_instagram', '#'); ?>" style="color: #ffd700; font-size: 16px;"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_youtube', '#'); ?>" style="color: #ffd700; font-size: 16px;"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header - Rwanda Police Style -->
    <header class="main-header" style="background: #2d5a87; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000;">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
            <!-- Logo Section -->
            <div class="logo-section" style="display: flex; align-items: center; gap: 20px;">
                <div class="logo" style="width: 80px; height: 80px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/gambia-police-logo.png" alt="Gambia Police Force Logo" style="width: 60px; height: 60px; object-fit: contain;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <div style="display: none; font-size: 24px; color: #2d5a87; font-weight: bold;">GPF</div>
                </div>
                <div class="title-section">
                    <h1 style="color: white; font-size: 28px; margin: 0; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);"><?php echo get_theme_mod('gpf_main_title', 'GAMBIA POLICE FORCE'); ?></h1>
                    <p style="color: #ffd700; font-size: 14px; margin: 5px 0 0 0; font-weight: 500;"><?php echo get_theme_mod('gpf_slogan', 'Service - Protection - Integrity'); ?></p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="main-nav" style="flex: 1; display: flex; justify-content: center;">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                    ));
                } else {
                    gpf_default_menu();
                }
                ?>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions" style="display: flex; align-items: center; gap: 15px;">
                <div class="search-box" style="position: relative;">
                    <input type="search" placeholder="Search..." style="padding: 8px 35px 8px 12px; border: 1px solid #4a90a4; border-radius: 20px; background: rgba(255,255,255,0.1); color: white; width: 200px;" onfocus="this.style.background='white'; this.style.color='#333';" onblur="this.style.background='rgba(255,255,255,0.1)'; this.style.color='white';">
                    <i class="fas fa-search" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); color: #ffd700;"></i>
                </div>
                <button class="mobile-menu-toggle" style="display: none; background: none; border: none; color: white; font-size: 24px; cursor: pointer;">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- News Ticker - Rwanda Police Style -->
    <div class="news-ticker" style="background: #1a365d; color: white; padding: 8px 0; border-bottom: 2px solid #ffd700;">
        <div class="container" style="display: flex; align-items: center; gap: 15px;">
            <div class="ticker-label" style="background: #ffd700; color: #1a365d; padding: 5px 15px; font-weight: bold; font-size: 12px; white-space: nowrap;">LATEST NEWS</div>
            <div class="ticker-content" style="flex: 1; overflow: hidden;">
                <div class="ticker-wrapper" style="display: flex; animation: scroll 30s linear infinite;">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5,
                        'post_status' => 'publish'
                    ));
                    
                    if ($recent_posts) {
                        foreach ($recent_posts as $post) {
                            echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap;">';
                            echo '<a href="' . get_permalink($post['ID']) . '" style="color: white; text-decoration: none;">';
                            echo esc_html($post['post_title']);
                            echo '</a>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap;">';
                        echo '<span>Gambia Police Force launches new community safety initiative</span>';
                        echo '</div>';
                        echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap;">';
                        echo '<span>Traffic safety campaign reduces accidents by 25%</span>';
                        echo '</div>';
                        echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap;">';
                        echo '<span>New police training program graduates 50 officers</span>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Default menu fallback -->
    <?php
    function gpf_default_menu() {
        echo '<ul class="nav-menu" style="display: flex; list-style: none; margin: 0; padding: 0; gap: 30px;">';
        echo '<li><a href="' . home_url() . '" class="active" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500;">Home</a></li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/about-us') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px;">About Us <i class="fas fa-chevron-down" style="font-size: 12px;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0;">';
        echo '<li><a href="' . home_url('/our-mission-and-vision') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Our Mission and Vision</a></li>';
        echo '<li><a href="' . home_url('/the-police-command') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">The Police Command</a></li>';
        echo '<li><a href="' . home_url('/history') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">History</a></li>';
        echo '<li><a href="' . home_url('/gpf-partners') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">GPF Partners</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/media') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px;">Media <i class="fas fa-chevron-down" style="font-size: 12px;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0;">';
        echo '<li><a href="' . home_url('/news') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">News</a></li>';
        echo '<li><a href="' . home_url('/press-release') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Press Release</a></li>';
        echo '<li><a href="' . home_url('/police-magazine') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Police Magazine</a></li>';
        echo '<li><a href="' . home_url('/tenders') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Tenders</a></li>';
        echo '<li><a href="' . home_url('/cartoons') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Cartoons</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/community') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px;">Community <i class="fas fa-chevron-down" style="font-size: 12px;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0;">';
        echo '<li><a href="' . home_url('/community-programmes') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Community Programmes</a></li>';
        echo '<li><a href="' . home_url('/childrens-corner') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Children\'s Corner</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/services') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px;">Services <i class="fas fa-chevron-down" style="font-size: 12px;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0;">';
        echo '<li><a href="' . home_url('/traffic-and-road-safety') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Traffic and Road Safety</a></li>';
        echo '<li><a href="' . home_url('/testing-and-licensing') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Testing and Licensing</a></li>';
        echo '<li><a href="' . home_url('/automobile-inspections') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Automobile Inspections</a></li>';
        echo '<li><a href="' . home_url('/feedbacks') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Feedbacks</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/resources') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px;">Resources <i class="fas fa-chevron-down" style="font-size: 12px;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0;">';
        echo '<li><a href="' . home_url('/publications') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s;">Publications</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li><a href="' . home_url('/contact-us') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500;">Contact Us</a></li>';
        echo '</ul>';
    }
    ?>

    <style>
    /* News Ticker Animation */
    @keyframes scroll {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    
    .ticker-wrapper:hover {
        animation-play-state: paused;
    }
    
    /* Navigation Hover Effects */
    .nav-menu li:hover > a {
        background: #ffd700 !important;
        color: #1a365d !important;
    }
    
    .menu-item-has-children:hover .sub-menu {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
    }
    
    .menu-item-has-children:hover > a i {
        transform: rotate(180deg);
    }
    
    .sub-menu li:hover a {
        background: #ffd700 !important;
        color: #1a365d !important;
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .main-header .container {
            flex-direction: column;
            gap: 15px;
        }
        
        .nav-menu {
            flex-direction: column !important;
            width: 100%;
            gap: 0 !important;
        }
        
        .nav-menu li {
            width: 100%;
        }
        
        .nav-menu a {
            display: block !important;
            padding: 15px !important;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sub-menu {
            position: static !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: none !important;
            box-shadow: none !important;
            background: rgba(0,0,0,0.2) !important;
        }
        
        .mobile-menu-toggle {
            display: block !important;
        }
        
        .header-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .search-box input {
            width: 150px !important;
        }
    }
    </style>
</div>