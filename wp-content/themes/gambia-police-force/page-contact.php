<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        <header class="entry-header" style="text-align: center; margin-bottom: 40px;">
            <h1 class="entry-title" style="color: var(--primary-blue); font-size: 36px; margin-bottom: 20px;">
                Contact Us
            </h1>
            <p style="font-size: 18px; color: var(--gray-600);">
                Get in touch with the Gambia Police Force
            </p>
        </header>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px;">
            <!-- Contact Information -->
            <div style="background: var(--gray-100); padding: 40px; border-radius: 15px;">
                <h3 style="color: var(--primary-blue); margin-bottom: 30px; font-size: 24px;">Contact Information</h3>
                
                <div style="margin-bottom: 25px;">
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">📍 Headquarters Address</h4>
                    <p style="color: var(--gray-600);">P. O. Box 1234<br>Banjul, The Gambia</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">📞 Emergency Numbers</h4>
                    <p style="color: var(--primary-blue); font-weight: bold; font-size: 18px;">117 - Emergency</p>
                    <p style="color: var(--primary-blue); font-weight: bold;">118 - Traffic Accidents</p>
                    <p style="color: var(--primary-blue); font-weight: bold;">119 - Police Complaints</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">📧 Email</h4>
                    <p style="color: var(--gray-600);">info@gambiapolice.gov.gm</p>
                    <p style="color: var(--gray-600);">emergency@gambiapolice.gov.gm</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">📞 Phone</h4>
                    <p style="color: var(--gray-600);">+220 422 2000</p>
                    <p style="color: var(--gray-600);">+220 422 2001 (Customer Care)</p>
                </div>

                <div>
                    <h4 style="color: var(--primary-blue); margin-bottom: 10px;">🕒 Office Hours</h4>
                    <p style="color: var(--gray-600);">Monday - Friday: 8:00 AM - 5:00 PM</p>
                    <p style="color: var(--gray-600);">Emergency Services: 24/7</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div style="background: var(--white); padding: 40px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h3 style="color: var(--primary-blue); margin-bottom: 30px; font-size: 24px;">Send us a Message</h3>
                
                <form class="contact-form" style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <label for="name" style="display: block; margin-bottom: 5px; color: var(--primary-blue); font-weight: bold;">Full Name *</label>
                        <input type="text" id="name" name="name" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-200); border-radius: 5px; font-size: 16px;">
                    </div>

                    <div>
                        <label for="email" style="display: block; margin-bottom: 5px; color: var(--primary-blue); font-weight: bold;">Email Address *</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-200); border-radius: 5px; font-size: 16px;">
                    </div>

                    <div>
                        <label for="phone" style="display: block; margin-bottom: 5px; color: var(--primary-blue); font-weight: bold;">Phone Number</label>
                        <input type="tel" id="phone" name="phone" style="width: 100%; padding: 12px; border: 1px solid var(--gray-200); border-radius: 5px; font-size: 16px;">
                    </div>

                    <div>
                        <label for="subject" style="display: block; margin-bottom: 5px; color: var(--primary-blue); font-weight: bold;">Subject *</label>
                        <select id="subject" name="subject" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-200); border-radius: 5px; font-size: 16px;">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="complaint">Complaint</option>
                            <option value="compliment">Compliment</option>
                            <option value="emergency">Emergency Report</option>
                            <option value="recruitment">Recruitment</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" style="display: block; margin-bottom: 5px; color: var(--primary-blue); font-weight: bold;">Message *</label>
                        <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-200); border-radius: 5px; font-size: 16px; resize: vertical;"></textarea>
                    </div>

                    <button type="submit" class="btn" style="width: 100%; padding: 15px; font-size: 18px;">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Emergency Contact Section -->
        <div style="background: var(--primary-blue); color: var(--white); padding: 40px; border-radius: 15px; text-align: center;">
            <h3 style="font-size: 28px; margin-bottom: 20px;">🚨 Emergency Contact</h3>
            <p style="font-size: 18px; margin-bottom: 30px;">In case of emergency, please call immediately:</p>
            <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
                <div>
                    <h4 style="font-size: 24px; margin-bottom: 10px;">117</h4>
                    <p>Emergency Services</p>
                </div>
                <div>
                    <h4 style="font-size: 24px; margin-bottom: 10px;">118</h4>
                    <p>Traffic Accidents</p>
                </div>
                <div>
                    <h4 style="font-size: 24px; margin-bottom: 10px;">119</h4>
                    <p>Police Complaints</p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
jQuery(document).ready(function($) {
    $('.contact-form').submit(function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: formData + '&action=submit_contact_form',
            success: function(response) {
                if (response.success) {
                    alert('Thank you for your message. We will get back to you soon.');
                    $('.contact-form')[0].reset();
                } else {
                    alert('There was an error sending your message. Please try again.');
                }
            },
            error: function() {
                alert('There was an error sending your message. Please try again.');
            }
        });
    });
});
</script>

<?php get_footer(); ?>
