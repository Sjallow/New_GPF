<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Page Header -->
    <section class="page-header" style="background: var(--primary-blue); color: var(--white); padding: 60px 0; text-align: center;">
        <div class="container">
            <h1>Media</h1>
            <p>Latest news, press releases, and media resources</p>
        </div>
    </section>

    <!-- Media Content -->
    <section class="page-content" style="padding: 60px 0;">
        <div class="container">
            <div class="media-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px; margin-top: 40px;">
                <div class="main-content">
                    <h2>Latest News</h2>
                    <div class="news-list">
                        <article class="news-item" style="border-bottom: 1px solid var(--gray-200); padding: 20px 0;">
                            <h3><a href="#" style="color: var(--primary-blue); text-decoration: none;">IGP Mamour Jobe officiates the pass-out of SWAT course</a></h3>
                            <p class="date" style="color: var(--gray-600); font-size: 14px;">September 13, 2025</p>
                            <p>The Inspector General of Police, Mamour Jobe, presided over the graduation ceremony of the Special Weapons and Tactics (SWAT) course...</p>
                        </article>
                        
                        <article class="news-item" style="border-bottom: 1px solid var(--gray-200); padding: 20px 0;">
                            <h3><a href="#" style="color: var(--primary-blue); text-decoration: none;">Gambia Police Force launches new road safety campaign</a></h3>
                            <p class="date" style="color: var(--gray-600); font-size: 14px;">September 10, 2025</p>
                            <p>The GPF has launched a comprehensive road safety campaign to reduce traffic accidents and improve road safety...</p>
                        </article>
                    </div>
                    
                    <h2>Press Releases</h2>
                    <div class="press-list">
                        <article class="press-item" style="border-bottom: 1px solid var(--gray-200); padding: 20px 0;">
                            <h3><a href="#" style="color: var(--primary-blue); text-decoration: none;">Community Policing Initiative Strengthens Neighborhood Security</a></h3>
                            <p class="date" style="color: var(--gray-600); font-size: 14px;">September 8, 2025</p>
                        </article>
                    </div>
                </div>
                
                <div class="sidebar">
                    <div class="widget" style="background: var(--gray-100); padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                        <h3>Media Categories</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><a href="/news" style="color: var(--primary-blue); text-decoration: none;">News</a></li>
                            <li style="margin-bottom: 10px;"><a href="/press-release" style="color: var(--primary-blue); text-decoration: none;">Press Release</a></li>
                            <li style="margin-bottom: 10px;"><a href="/police-magazine" style="color: var(--primary-blue); text-decoration: none;">Police Magazine</a></li>
                            <li style="margin-bottom: 10px;"><a href="/tenders" style="color: var(--primary-blue); text-decoration: none;">Tenders</a></li>
                            <li style="margin-bottom: 10px;"><a href="/cartoons" style="color: var(--primary-blue); text-decoration: none;">Cartoons</a></li>
                        </ul>
                    </div>
                    
                    <div class="widget" style="background: var(--primary-blue); color: var(--white); padding: 30px; border-radius: 10px;">
                        <h3 style="color: var(--white);">Media Contact</h3>
                        <p><i class="fas fa-phone"></i> +220 422 2000</p>
                        <p><i class="fas fa-envelope"></i> media@gambiapolice.gov.gm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
