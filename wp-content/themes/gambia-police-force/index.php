<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section with Latest Posts - Rwanda Police Style -->
    <section class="hero-section" style="background: linear-gradient(135deg, #1a365d 0%, #2d5a87 100%); color: white; padding: 80px 0; position: relative; overflow: hidden;">
        <div class="hero-background" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg') center/cover; opacity: 0.3; z-index: 1;"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="hero-content" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                <!-- Hero Text -->
                <div class="hero-text" style="animation: fadeInLeft 1s ease-out;">
                    <h1 style="font-size: 3.5rem; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); line-height: 1.2;">
                        <?php echo get_theme_mod('gpf_hero_title', 'Welcome to Gambia Police Force'); ?>
                    </h1>
                    <p style="font-size: 1.3rem; margin-bottom: 30px; opacity: 0.9; line-height: 1.6;">
                        <?php echo get_theme_mod('gpf_hero_description', 'Serving and protecting the people of The Gambia with integrity, professionalism, and dedication.'); ?>
                    </p>
                    <div class="hero-buttons" style="display: flex; gap: 20px; flex-wrap: wrap;">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary" style="background: #ffd700; color: #1a365d; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                            Contact Us <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
                        </a>
                        <a href="<?php echo home_url('/services'); ?>" class="btn btn-outline" style="border: 2px solid #ffd700; color: #ffd700; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s;">
                            Our Services <i class="fas fa-shield-alt" style="margin-left: 10px;"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Latest Posts Carousel -->
                <div class="hero-posts" style="animation: fadeInRight 1s ease-out;">
                    <h3 style="color: #ffd700; font-size: 1.5rem; margin-bottom: 30px; text-align: center;">Latest News & Updates</h3>
                    <div class="posts-carousel" style="background: rgba(255,255,255,0.1); border-radius: 15px; padding: 30px; backdrop-filter: blur(10px);">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 3,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts) {
                            foreach ($recent_posts as $index => $post) {
                                $active_class = $index === 0 ? 'active' : '';
                                echo '<div class="post-item ' . $active_class . '" style="margin-bottom: 20px; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 10px; transition: all 0.3s; cursor: pointer;">';
                                echo '<div class="post-meta" style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">';
                                echo '<span style="background: #ffd700; color: #1a365d; padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold;">NEWS</span>';
                                echo '<span style="font-size: 14px; opacity: 0.8;">' . date('M d, Y', strtotime($post['post_date'])) . '</span>';
                                echo '</div>';
                                echo '<h4 style="font-size: 1.1rem; margin-bottom: 10px; line-height: 1.4;">';
                                echo '<a href="' . get_permalink($post['ID']) . '" style="color: white; text-decoration: none;">';
                                echo esc_html($post['post_title']);
                                echo '</a>';
                                echo '</h4>';
                                echo '<p style="font-size: 14px; opacity: 0.8; line-height: 1.5;">';
                                echo wp_trim_words($post['post_content'], 20);
                                echo '</p>';
                                echo '</div>';
                            }
                        } else {
                            // Default posts if no posts exist
                            $default_posts = array(
                                array(
                                    'title' => 'Gambia Police Force launches new community safety initiative',
                                    'content' => 'The Gambia Police Force has launched a comprehensive community safety program aimed at strengthening relationships between law enforcement and local communities.',
                                    'date' => date('M d, Y')
                                ),
                                array(
                                    'title' => 'Traffic safety campaign reduces accidents by 25%',
                                    'content' => 'Recent traffic safety initiatives have resulted in a significant reduction in road accidents across The Gambia, improving overall road safety.',
                                    'date' => date('M d, Y', strtotime('-1 day'))
                                ),
                                array(
                                    'title' => 'New police training program graduates 50 officers',
                                    'content' => 'A specialized training program has successfully graduated 50 new police officers, enhancing the force\'s capacity to serve and protect.',
                                    'date' => date('M d, Y', strtotime('-2 days'))
                                )
                            );
                            
                            foreach ($default_posts as $index => $post) {
                                $active_class = $index === 0 ? 'active' : '';
                                echo '<div class="post-item ' . $active_class . '" style="margin-bottom: 20px; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 10px; transition: all 0.3s; cursor: pointer;">';
                                echo '<div class="post-meta" style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">';
                                echo '<span style="background: #ffd700; color: #1a365d; padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold;">NEWS</span>';
                                echo '<span style="font-size: 14px; opacity: 0.8;">' . $post['date'] . '</span>';
                                echo '</div>';
                                echo '<h4 style="font-size: 1.1rem; margin-bottom: 10px; line-height: 1.4; color: white;">' . $post['title'] . '</h4>';
                                echo '<p style="font-size: 14px; opacity: 0.8; line-height: 1.5;">' . $post['content'] . '</p>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Numbers Section - Rwanda Police Style -->
    <section class="emergency-section" style="background: #f8f9fa; padding: 60px 0;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; font-size: 2.5rem; color: #1a365d; margin-bottom: 50px; position: relative;">
                Emergency Toll-Free Numbers
                <div style="width: 80px; height: 4px; background: #ffd700; margin: 15px auto 0;"></div>
            </h2>
            <div class="emergency-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #e74c3c;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite;">
                        <i class="fas fa-ambulance" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Emergency</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #e74c3c; margin-bottom: 10px;">Call: 117</div>
                    <p style="color: #666; font-size: 14px;">24/7 Emergency Response</p>
                </div>
                
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #f39c12;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #f39c12; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite 0.5s;">
                        <i class="fas fa-car-crash" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Traffic Accidents</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #f39c12; margin-bottom: 10px;">Call: 118</div>
                    <p style="color: #666; font-size: 14px;">Road Traffic Incidents</p>
                </div>
                
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #9b59b6;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #9b59b6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite 1s;">
                        <i class="fas fa-user-shield" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Police Complaints</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #9b59b6; margin-bottom: 10px;">Call: 119</div>
                    <p style="color: #666; font-size: 14px;">Report Police Misconduct</p>
                </div>
                
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #27ae60;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #27ae60; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite 1.5s;">
                        <i class="fas fa-handshake" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Anti Corruption</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #27ae60; margin-bottom: 10px;">Call: 120</div>
                    <p style="color: #666; font-size: 14px;">Report Corruption</p>
                </div>
                
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #3498db;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #3498db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite 2s;">
                        <i class="fas fa-ship" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Maritime Problems</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #3498db; margin-bottom: 10px;">Call: 121</div>
                    <p style="color: #666; font-size: 14px;">Waterway Incidents</p>
                </div>
                
                <div class="emergency-card" style="background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.3s; border-top: 4px solid #e67e22;">
                    <div class="phone-icon" style="width: 80px; height: 80px; background: #e67e22; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: pulse 2s infinite 2.5s;">
                        <i class="fas fa-id-card" style="font-size: 30px; color: white;"></i>
                    </div>
                    <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.3rem;">Driving License</h3>
                    <div class="phone-number" style="font-size: 1.8rem; font-weight: bold; color: #e67e22; margin-bottom: 10px;">Call: 122</div>
                    <p style="color: #666; font-size: 14px;">License Inquiries</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Rwanda Police Style -->
    <section class="services-section" style="background: white; padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; font-size: 2.5rem; color: #1a365d; margin-bottom: 20px;">
                <?php echo get_theme_mod('gpf_services_title', 'Our Services'); ?>
            </h2>
            <p style="text-align: center; font-size: 1.2rem; color: #666; margin-bottom: 60px; max-width: 600px; margin-left: auto; margin-right: auto;">
                We provide comprehensive police services to ensure the safety and security of all citizens in The Gambia.
            </p>
            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="service-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/traffic-safety.jpg" alt="Traffic and Road Safety" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-car"></i></div>
                    </div>
                    <div class="service-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Traffic and Road Safety</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Ensuring safe roads and traffic management across The Gambia through comprehensive traffic control and road safety initiatives.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
                
                <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="service-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/testing-licensing.jpg" alt="Testing and Licensing" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-id-card"></i></div>
                    </div>
                    <div class="service-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Testing and Licensing</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Professional testing and licensing services for drivers, ensuring competent and qualified drivers on our roads.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
                
                <div class="service-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="service-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/automobile-inspections.jpg" alt="Automobile Inspections" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-tools"></i></div>
                    </div>
                    <div class="service-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Automobile Inspections</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Comprehensive vehicle inspection services to ensure roadworthiness and safety standards for all vehicles.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News and Media Section - Rwanda Police Style -->
    <section class="news-section" style="background: #f8f9fa; padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; font-size: 2.5rem; color: #1a365d; margin-bottom: 50px;">
                <?php echo get_theme_mod('gpf_news_title', 'Latest News & Updates'); ?>
            </h2>
            <div class="news-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
                <!-- Main News -->
                <div class="news-main">
                    <div class="featured-news" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="news-image" style="height: 300px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/news-main.jpg" alt="GPF News" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-newspaper"></i></div>
                            <div class="news-badge" style="position: absolute; top: 20px; left: 20px; background: #ffd700; color: #1a365d; padding: 8px 15px; border-radius: 20px; font-weight: bold; font-size: 12px;">BREAKING NEWS</div>
                        </div>
                        <div class="news-content" style="padding: 30px;">
                            <h3 style="color: #1a365d; font-size: 1.6rem; margin-bottom: 15px; line-height: 1.4;">IGP Mamour Jobe officiates the pass-out of SWAT course</h3>
                            <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">The Inspector General of Police, Mamour Jobe, presided over the graduation ceremony of the Special Weapons and Tactics (SWAT) course, marking a significant milestone in the force's capacity building efforts.</p>
                            <div class="news-meta" style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
                                <span style="color: #999; font-size: 14px;"><i class="fas fa-calendar" style="margin-right: 5px;"></i> <?php echo date('M d, Y'); ?></span>
                                <span style="color: #999; font-size: 14px;"><i class="fas fa-user" style="margin-right: 5px;"></i> GPF Media</span>
                                <span style="color: #999; font-size: 14px;"><i class="fas fa-eye" style="margin-right: 5px;"></i> 1,234 views</span>
                            </div>
                            <a href="#" class="btn btn-primary" style="background: #1a365d; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                                Read More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="news-sidebar">
                    <!-- Recent News -->
                    <div class="recent-news" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h4 style="color: #1a365d; margin-bottom: 20px; font-size: 1.3rem; border-bottom: 2px solid #ffd700; padding-bottom: 10px;">Recent News</h4>
                        <?php
                        $recent_news = wp_get_recent_posts(array(
                            'numberposts' => 4,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_news) {
                            foreach ($recent_news as $news) {
                                echo '<div class="news-item" style="padding: 15px 0; border-bottom: 1px solid #eee;">';
                                echo '<h5 style="margin-bottom: 8px; line-height: 1.4;">';
                                echo '<a href="' . get_permalink($news['ID']) . '" style="color: #1a365d; text-decoration: none; font-size: 14px;">';
                                echo esc_html($news['post_title']);
                                echo '</a>';
                                echo '</h5>';
                                echo '<span style="color: #999; font-size: 12px;">' . date('M d, Y', strtotime($news['post_date'])) . '</span>';
                                echo '</div>';
                            }
                        } else {
                            $default_news = array(
                                array('title' => 'Community Policing Initiative Launched', 'date' => date('M d, Y')),
                                array('title' => 'Traffic Safety Campaign Results', 'date' => date('M d, Y', strtotime('-1 day'))),
                                array('title' => 'New Police Station Opens', 'date' => date('M d, Y', strtotime('-2 days'))),
                                array('title' => 'Emergency Response Training', 'date' => date('M d, Y', strtotime('-3 days')))
                            );
                            
                            foreach ($default_news as $news) {
                                echo '<div class="news-item" style="padding: 15px 0; border-bottom: 1px solid #eee;">';
                                echo '<h5 style="margin-bottom: 8px; line-height: 1.4;">';
                                echo '<a href="#" style="color: #1a365d; text-decoration: none; font-size: 14px;">' . $news['title'] . '</a>';
                                echo '</h5>';
                                echo '<span style="color: #999; font-size: 12px;">' . $news['date'] . '</span>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                    <!-- Newsletter -->
                    <div class="newsletter" style="background: linear-gradient(135deg, #1a365d, #2d5a87); color: white; padding: 30px; border-radius: 15px; text-align: center;">
                        <h4 style="margin-bottom: 15px; font-size: 1.3rem;">Stay Updated</h4>
                        <p style="margin-bottom: 20px; opacity: 0.9; font-size: 14px;">Subscribe to our newsletter for the latest news and updates.</p>
                        <form style="display: flex; gap: 10px;">
                            <input type="email" placeholder="Your email address" style="flex: 1; padding: 12px; border: none; border-radius: 5px; font-size: 14px;">
                            <button type="submit" style="background: #ffd700; color: #1a365d; border: none; padding: 12px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; transition: all 0.3s;">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Units Section - Rwanda Police Style -->
    <section class="units-section" style="background: white; padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; font-size: 2.5rem; color: #1a365d; margin-bottom: 50px;">
                Other Units
            </h2>
            <div class="units-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <div class="unit-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="unit-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/criminal-investigation.jpg" alt="Criminal Investigation Department" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-search"></i></div>
                    </div>
                    <div class="unit-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Criminal Investigation Department</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Specialized unit responsible for investigating serious crimes and maintaining law and order through professional investigative techniques.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
                
                <div class="unit-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="unit-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/anti-crime-unit.jpg" alt="Anti-Crime Unit" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-shield-alt"></i></div>
                    </div>
                    <div class="unit-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Anti-Crime Unit</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Dedicated to preventing and combating criminal activities through proactive policing and community engagement initiatives.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
                
                <div class="unit-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s; border: 1px solid #e9ecef;">
                    <div class="unit-image" style="height: 200px; background: linear-gradient(45deg, #1a365d, #2d5a87); position: relative; overflow: hidden;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/rapid-intervention.jpg" alt="Rapid Intervention Unit" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, #1a365d, #2d5a87); align-items: center; justify-content: center; color: white; font-size: 48px;"><i class="fas fa-bolt"></i></div>
                    </div>
                    <div class="unit-content" style="padding: 30px;">
                        <h3 style="color: #1a365d; margin-bottom: 15px; font-size: 1.4rem;">Rapid Intervention Unit</h3>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Specialized rapid response team equipped to handle emergency situations and provide immediate assistance when needed.</p>
                        <a href="#" class="btn btn-outline" style="border: 2px solid #1a365d; color: #1a365d; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: all 0.3s; display: inline-block;">
                            Learn More <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Animations */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
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

/* Hover Effects */
.emergency-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.service-card:hover .service-image img {
    transform: scale(1.1);
}

.unit-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.unit-card:hover .unit-image img {
    transform: scale(1.1);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Post Item Hover */
.post-item:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: translateX(10px);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }
    
    .hero-text h1 {
        font-size: 2.5rem !important;
    }
    
    .emergency-grid {
        grid-template-columns: 1fr !important;
    }
    
    .services-grid {
        grid-template-columns: 1fr !important;
    }
    
    .news-grid {
        grid-template-columns: 1fr !important;
    }
    
    .units-grid {
        grid-template-columns: 1fr !important;
    }
    
    .hero-buttons {
        justify-content: center;
    }
    
    .news-meta {
        flex-direction: column !important;
        gap: 10px !important;
    }
}
</style>

<?php get_footer(); ?>