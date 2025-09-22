<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 60px 20px; text-align: center;">
        <div style="background: var(--gray-100); padding: 60px 40px; border-radius: 15px; margin-bottom: 40px;">
            <h1 style="font-size: 120px; color: var(--primary-blue); margin-bottom: 20px; font-weight: bold;">404</h1>
            <h2 style="font-size: 36px; color: var(--primary-blue); margin-bottom: 20px;">Page Not Found</h2>
            <p style="font-size: 18px; color: var(--gray-600); margin-bottom: 30px;">
                Sorry, the page you are looking for could not be found. It may have been moved, deleted, or the URL may be incorrect.
            </p>
            <a href="<?php echo home_url(); ?>" class="btn" style="display: inline-block; margin-right: 15px;">Go Home</a>
            <a href="javascript:history.back()" class="btn btn-yellow">Go Back</a>
        </div>

        <div style="background: var(--white); padding: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h3 style="color: var(--primary-blue); margin-bottom: 20px;">What can you do?</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; text-align: left;">
                <div>
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">🔍 Search our site</h4>
                    <form class="search-form" style="display: flex; gap: 10px;">
                        <input type="search" placeholder="Search..." style="flex: 1; padding: 10px; border: 1px solid var(--gray-200); border-radius: 5px;">
                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
                <div>
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">📞 Contact us</h4>
                    <p style="color: var(--gray-600); margin-bottom: 10px;">Need help finding something?</p>
                    <p style="color: var(--primary-blue); font-weight: bold;">Emergency: 117</p>
                    <p style="color: var(--primary-blue); font-weight: bold;">General: +220 422 2000</p>
                </div>
                <div>
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">🔗 Popular pages</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 5px;"><a href="<?php echo home_url('/about-us'); ?>" style="color: var(--primary-blue);">About Us</a></li>
                        <li style="margin-bottom: 5px;"><a href="<?php echo home_url('/services'); ?>" style="color: var(--primary-blue);">Services</a></li>
                        <li style="margin-bottom: 5px;"><a href="<?php echo home_url('/contact-us'); ?>" style="color: var(--primary-blue);">Contact Us</a></li>
                        <li style="margin-bottom: 5px;"><a href="<?php echo home_url('/news'); ?>" style="color: var(--primary-blue);">News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
