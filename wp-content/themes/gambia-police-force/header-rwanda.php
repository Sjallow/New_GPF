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
    <!-- Top Bar - Exact Rwanda Police Style -->
    <div class="top-bar-rwanda" style="background: #1a365d; color: white; padding: 8px 0; font-size: 13px; border-bottom: 2px solid #2d5a87;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="top-bar-content" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div class="top-left" style="display: flex; align-items: center; gap: 25px;">
                    <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-envelope" style="color: #ffd700;"></i> <?php echo get_theme_mod('gpf_email', 'info@gambiapolice.gov.gm'); ?></span>
                    <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-phone" style="color: #ffd700;"></i> Emergency: <?php echo get_theme_mod('gpf_emergency', '117'); ?></span>
                    <span style="display: flex; align-items: center; gap: 5px;"><i class="fas fa-phone" style="color: #ffd700;"></i> <?php echo get_theme_mod('gpf_phone', '+220 422 2000'); ?></span>
                </div>
                <div class="top-right" style="display: flex; align-items: center; gap: 20px;">
                    <div class="language-selector" style="display: flex; gap: 10px;">
                        <a href="#" class="active" style="color: #ffd700; text-decoration: none; font-weight: bold; padding: 5px 10px; border-radius: 3px; background: rgba(255,215,0,0.1);">EN</a>
                        <a href="#" style="color: white; text-decoration: none; padding: 5px 10px;">FR</a>
                        <a href="#" style="color: white; text-decoration: none; padding: 5px 10px;">AR</a>
                    </div>
                    <div class="social-links" style="display: flex; gap: 12px;">
                        <a href="<?php echo get_theme_mod('gpf_facebook', '#'); ?>" style="color: #ffd700; font-size: 16px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo get_theme_mod('gpf_twitter', '#'); ?>" style="color: #ffd700; font-size: 16px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo get_theme_mod('gpf_instagram', '#'); ?>" style="color: #ffd700; font-size: 16px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo get_theme_mod('gpf_youtube', '#'); ?>" style="color: #ffd700; font-size: 16px; transition: all 0.3s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header - Exact Rwanda Police Style -->
    <header class="main-header-rwanda" style="background: #2d5a87; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="header-content" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
                <!-- Logo Section -->
                <div class="logo-section" style="display: flex; align-items: center; gap: 20px;">
                    <div class="logo" style="width: 80px; height: 80px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gambia-police-logo.png" alt="Gambia Police Force Logo" style="width: 60px; height: 60px; object-fit: contain; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">GPF</div>
                    </div>
                    <div class="title-section">
                        <h1 style="color: white; font-size: 28px; margin: 0; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); letter-spacing: 1px;"><?php echo get_theme_mod('gpf_main_title', 'GAMBIA POLICE FORCE'); ?></h1>
                        <p style="color: #ffd700; font-size: 14px; margin: 5px 0 0 0; font-weight: 500; letter-spacing: 0.5px;"><?php echo get_theme_mod('gpf_slogan', 'Service - Protection - Integrity'); ?></p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="main-nav-rwanda" style="flex: 1; display: flex; justify-content: center;">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class' => 'nav-menu-rwanda',
                            'container' => false,
                        ));
                    } else {
                        gpf_rwanda_menu();
                    }
                    ?>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions" style="display: flex; align-items: center; gap: 15px;">
                    <div class="search-box" style="position: relative;">
                        <input type="search" placeholder="Search..." style="padding: 8px 35px 8px 12px; border: 1px solid #4a90a4; border-radius: 20px; background: rgba(255,255,255,0.1); color: white; width: 200px; transition: all 0.3s;" onfocus="this.style.background='white'; this.style.color='#333'; this.style.width='250px';" onblur="this.style.background='rgba(255,255,255,0.1)'; this.style.color='white'; this.style.width='200px';">
                        <i class="fas fa-search" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); color: #ffd700; cursor: pointer;"></i>
                    </div>
                    <button class="mobile-menu-toggle" style="display: none; background: none; border: none; color: white; font-size: 24px; cursor: pointer; padding: 10px;">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- News Ticker - Exact Rwanda Police Style -->
    <div class="news-ticker-rwanda" style="background: #1a365d; color: white; padding: 8px 0; border-bottom: 2px solid #ffd700; position: relative; overflow: hidden;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="ticker-content" style="display: flex; align-items: center; gap: 15px;">
                <div class="ticker-label" style="background: #ffd700; color: #1a365d; padding: 5px 15px; font-weight: bold; font-size: 12px; white-space: nowrap; border-radius: 3px; animation: pulse 2s infinite;">LATEST NEWS</div>
                <div class="ticker-wrapper" style="flex: 1; overflow: hidden; position: relative;">
                    <div class="ticker-scroll" style="display: flex; animation: scroll 30s linear infinite; white-space: nowrap;">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts) {
                            foreach ($recent_posts as $post) {
                                echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap; display: inline-block;">';
                                echo '<a href="' . get_permalink($post['ID']) . '" style="color: white; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ffd700'" onmouseout="this.style.color='white'">';
                                echo esc_html($post['post_title']);
                                echo '</a>';
                                echo '</div>';
                            }
                        } else {
                            $default_news = array(
                                'Gambia Police Force launches new community safety initiative',
                                'Traffic safety campaign reduces accidents by 25%',
                                'New police training program graduates 50 officers',
                                'Community policing strengthens neighborhood security',
                                'Emergency hotline 117 now available 24/7'
                            );
                            
                            foreach ($default_news as $news) {
                                echo '<div class="ticker-item" style="margin-right: 50px; white-space: nowrap; display: inline-block;">';
                                echo '<span style="color: white;">' . $news . '</span>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Default menu fallback - Rwanda Police Style -->
    <?php
    function gpf_rwanda_menu() {
        echo '<ul class="nav-menu-rwanda" style="display: flex; list-style: none; margin: 0; padding: 0; gap: 30px;">';
        echo '<li><a href="' . home_url() . '" class="active" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; position: relative;">Home</a></li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/about-us') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px; position: relative;">About Us <i class="fas fa-chevron-down" style="font-size: 12px; transition: transform 0.3s;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0; border-top: 3px solid #ffd700;">';
        echo '<li><a href="' . home_url('/our-mission-and-vision') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Our Mission and Vision</a></li>';
        echo '<li><a href="' . home_url('/the-police-command') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">The Police Command</a></li>';
        echo '<li><a href="' . home_url('/history') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">History</a></li>';
        echo '<li><a href="' . home_url('/gpf-partners') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">GPF Partners</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/media') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px; position: relative;">Media <i class="fas fa-chevron-down" style="font-size: 12px; transition: transform 0.3s;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0; border-top: 3px solid #ffd700;">';
        echo '<li><a href="' . home_url('/news') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">News</a></li>';
        echo '<li><a href="' . home_url('/press-release') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Press Release</a></li>';
        echo '<li><a href="' . home_url('/police-magazine') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Police Magazine</a></li>';
        echo '<li><a href="' . home_url('/tenders') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Tenders</a></li>';
        echo '<li><a href="' . home_url('/cartoons') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Cartoons</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/community') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px; position: relative;">Community <i class="fas fa-chevron-down" style="font-size: 12px; transition: transform 0.3s;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0; border-top: 3px solid #ffd700;">';
        echo '<li><a href="' . home_url('/community-programmes') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Community Programmes</a></li>';
        echo '<li><a href="' . home_url('/childrens-corner') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Children\'s Corner</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/services') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px; position: relative;">Services <i class="fas fa-chevron-down" style="font-size: 12px; transition: transform 0.3s;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0; border-top: 3px solid #ffd700;">';
        echo '<li><a href="' . home_url('/traffic-and-road-safety') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Traffic and Road Safety</a></li>';
        echo '<li><a href="' . home_url('/testing-and-licensing') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Testing and Licensing</a></li>';
        echo '<li><a href="' . home_url('/automobile-inspections') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Automobile Inspections</a></li>';
        echo '<li><a href="' . home_url('/feedbacks') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Feedbacks</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="menu-item-has-children">';
        echo '<a href="' . home_url('/resources') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 5px; position: relative;">Resources <i class="fas fa-chevron-down" style="font-size: 12px; transition: transform 0.3s;"></i></a>';
        echo '<ul class="sub-menu" style="position: absolute; top: 100%; left: 0; background: #1a365d; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; padding: 10px 0; border-top: 3px solid #ffd700;">';
        echo '<li><a href="' . home_url('/publications') . '" style="color: white; text-decoration: none; padding: 12px 20px; display: block; transition: all 0.3s; border-left: 3px solid transparent;">Publications</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li><a href="' . home_url('/contact-us') . '" style="color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: all 0.3s; font-weight: 500; position: relative;">Contact Us</a></li>';
        echo '</ul>';
    }
    ?>

    <style>
    /* Rwanda Police Style Animations */
    @keyframes scroll {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    
    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
    
    /* Navigation Hover Effects */
    .nav-menu-rwanda li:hover > a {
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
        border-left-color: #1a365d !important;
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .main-header-rwanda .container {
            flex-direction: column;
            gap: 15px;
        }
        
        .nav-menu-rwanda {
            flex-direction: column !important;
            width: 100%;
            gap: 0 !important;
        }
        
        .nav-menu-rwanda li {
            width: 100%;
        }
        
        .nav-menu-rwanda a {
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
        
        .top-bar-content {
            flex-direction: column;
            gap: 10px;
        }
    }
    </style>
</div>
