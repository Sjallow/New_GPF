    <!-- Footer Banner -->
    <div style="background: var(--primary-blue); padding: 20px 0; border-top: 3px solid var(--accent-yellow);">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/gambia-police-logo.png" alt="Gambia Police Force Logo" style="width: 60px; height: 60px;">
                <span style="color: var(--white); font-size: 18px; font-weight: bold;">SERVICE - PROTECTION - INTEGRITY</span>
            </div>
            <div style="background: var(--white); padding: 15px; border-radius: 10px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-shield-alt" style="color: var(--primary-blue); font-size: 24px;"></i>
                <div>
                    <p style="color: var(--primary-blue); font-weight: bold; margin: 0; font-size: 14px;">Community Safety</p>
                    <p style="color: var(--gray-600); margin: 0; font-size: 12px;">Working together for a safer Gambia</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-section">
                <h3>GPF HEADQUARTERS</h3>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>P. O. Box 1234 BANJUL - THE GAMBIA</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span><?php echo get_theme_mod('gpf_phone', '+220 422 2000'); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span><?php echo get_theme_mod('gpf_email', 'info@gambiapolice.gov.gm'); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>Customer Care Desk: +220 422 2001</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>Motor Vehicle Inspection: +220 422 2002</span>
                </div>
                <div class="contact-item">
                    <a href="#" style="color: var(--white);">Webmail</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>RECOMMENDED PAGES</h3>
                <ul>
                    <li><a href="#">Police Magazine</a></li>
                    <li><a href="#">Publications</a></li>
                    <li><a href="#">Tenders</a></li>
                    <li><a href="#">Recruitment Form</a></li>
                    <li><a href="#">Notices</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>FOLLOW US</h3>
                <div class="social-links" style="display: flex; gap: 15px; margin-top: 15px;">
                    <a href="<?php echo get_theme_mod('gpf_facebook', 'https://facebook.com/gambiapolice'); ?>" target="_blank" style="color: var(--white); font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_twitter', 'https://twitter.com/gambiapolice'); ?>" target="_blank" style="color: var(--white); font-size: 24px;"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_instagram', 'https://instagram.com/gambiapolice'); ?>" target="_blank" style="color: var(--white); font-size: 24px;"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo get_theme_mod('gpf_youtube', 'https://youtube.com/gambiapolice'); ?>" target="_blank" style="color: var(--white); font-size: 24px;"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>All rights reserved © <?php echo date('Y'); ?> GPF - Gambia Police Force</p>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
