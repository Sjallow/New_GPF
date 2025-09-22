<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Page Header -->
    <section class="page-header" style="background: var(--primary-blue); color: var(--white); padding: 60px 0; text-align: center;">
        <div class="container">
            <h1>Services</h1>
            <p>Professional police services for the community</p>
        </div>
    </section>

    <!-- Services Content -->
    <section class="page-content" style="padding: 60px 0;">
        <div class="container">
            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
                <div class="service-card" style="background: var(--white); border: 2px solid var(--primary-blue); border-radius: 15px; padding: 30px; text-align: center; transition: transform 0.3s;">
                    <div class="service-icon" style="font-size: 48px; color: var(--primary-blue); margin-bottom: 20px;">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>Traffic and Road Safety</h3>
                    <p>Ensuring safe roads and traffic management across The Gambia. Our traffic division works 24/7 to maintain road safety and enforce traffic regulations.</p>
                    <a href="/traffic-and-road-safety" class="btn" style="margin-top: 20px;">Learn More</a>
                </div>
                
                <div class="service-card" style="background: var(--white); border: 2px solid var(--primary-blue); border-radius: 15px; padding: 30px; text-align: center; transition: transform 0.3s;">
                    <div class="service-icon" style="font-size: 48px; color: var(--primary-blue); margin-bottom: 20px;">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h3>Testing and Licensing</h3>
                    <p>Driver testing and licensing services for all citizens. We provide comprehensive testing programs to ensure qualified and safe drivers on our roads.</p>
                    <a href="/testing-and-licensing" class="btn" style="margin-top: 20px;">Learn More</a>
                </div>
                
                <div class="service-card" style="background: var(--white); border: 2px solid var(--primary-blue); border-radius: 15px; padding: 30px; text-align: center; transition: transform 0.3s;">
                    <div class="service-icon" style="font-size: 48px; color: var(--primary-blue); margin-bottom: 20px;">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3>Automobile Inspections</h3>
                    <p>Comprehensive vehicle inspection and certification services. We ensure all vehicles meet safety standards before they are allowed on our roads.</p>
                    <a href="/automobile-inspections" class="btn" style="margin-top: 20px;">Learn More</a>
                </div>
                
                <div class="service-card" style="background: var(--white); border: 2px solid var(--primary-blue); border-radius: 15px; padding: 30px; text-align: center; transition: transform 0.3s;">
                    <div class="service-icon" style="font-size: 48px; color: var(--primary-blue); margin-bottom: 20px;">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Feedbacks</h3>
                    <p>We value your feedback and suggestions. Help us improve our services by sharing your experiences and recommendations with us.</p>
                    <a href="/feedbacks" class="btn" style="margin-top: 20px;">Submit Feedback</a>
                </div>
            </div>
            
            <!-- Emergency Services -->
            <div style="background: var(--gray-100); padding: 40px; border-radius: 15px; margin-top: 60px; text-align: center;">
                <h2 style="color: var(--primary-blue); margin-bottom: 20px;">Emergency Services</h2>
                <p style="margin-bottom: 30px;">In case of emergency, please contact us immediately:</p>
                <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                    <div style="background: var(--primary-blue); color: var(--white); padding: 20px; border-radius: 10px; min-width: 200px;">
                        <h4 style="color: var(--white); margin-bottom: 10px;">Emergency</h4>
                        <p style="font-size: 24px; font-weight: bold; margin: 0;">117</p>
                    </div>
                    <div style="background: var(--primary-blue); color: var(--white); padding: 20px; border-radius: 10px; min-width: 200px;">
                        <h4 style="color: var(--white); margin-bottom: 10px;">Traffic Accidents</h4>
                        <p style="font-size: 24px; font-weight: bold; margin: 0;">118</p>
                    </div>
                    <div style="background: var(--primary-blue); color: var(--white); padding: 20px; border-radius: 10px; min-width: 200px;">
                        <h4 style="color: var(--white); margin-bottom: 10px;">Police Complaints</h4>
                        <p style="font-size: 24px; font-weight: bold; margin: 0;">119</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>