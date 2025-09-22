/**
 * Rwanda Police Website JavaScript
 * Exact replica of Rwanda Police website functionality
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        initRwandaPolice();
    });

    function initRwandaPolice() {
        // Initialize all components
        initMobileMenu();
        initNewsTicker();
        initSmoothScrolling();
        initEmergencyCalls();
        initNewsletter();
        initLazyLoading();
        initHoverEffects();
        initStickyHeader();
        initSocialSharing();
        initEmergencyForms();
        initSearch();
        initClickTracking();
        initTooltips();
        initAnimations();
    }

    // Mobile Menu Toggle
    function initMobileMenu() {
        $('.mobile-menu-toggle').on('click', function(e) {
            e.preventDefault();
            $('.nav-menu-rwanda').toggleClass('active');
            $(this).find('i').toggleClass('fa-bars fa-times');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-nav-rwanda').length) {
                $('.nav-menu-rwanda').removeClass('active');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });
    }

    // News Ticker Functionality
    function initNewsTicker() {
        const ticker = $('.ticker-scroll');
        if (ticker.length) {
            // Pause on hover
            ticker.hover(
                function() {
                    $(this).css('animation-play-state', 'paused');
                },
                function() {
                    $(this).css('animation-play-state', 'running');
                }
            );

            // Click to pause/play
            ticker.on('click', function() {
                const isPaused = $(this).css('animation-play-state') === 'paused';
                $(this).css('animation-play-state', isPaused ? 'running' : 'paused');
            });
        }
    }

    // Smooth Scrolling for Anchor Links
    function initSmoothScrolling() {
        $('a[href*="#"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000, 'easeInOutCubic');
                }
            }
        });
    }

    // Emergency Call Functionality
    function initEmergencyCalls() {
        $('.emergency-card a[href^="tel:"]').on('click', function(e) {
            const phoneNumber = $(this).attr('href').replace('tel:', '');
            const serviceName = $(this).closest('.emergency-card').find('h3').text();
            
            // Track emergency call
            trackEvent('Emergency Call', serviceName, phoneNumber);
            
            // Show confirmation
            showNotification(`Calling ${serviceName} at ${phoneNumber}`, 'info');
        });
    }

    // Newsletter Subscription
    function initNewsletter() {
        $('.newsletter form').on('submit', function(e) {
            e.preventDefault();
            const email = $(this).find('input[type="email"]').val();
            
            if (isValidEmail(email)) {
                // Simulate subscription
                const button = $(this).find('button');
                const originalText = button.text();
                
                button.html('<i class="fas fa-spinner fa-spin"></i> Subscribing...');
                button.prop('disabled', true);
                
                setTimeout(() => {
                    button.html('<i class="fas fa-check"></i> Subscribed!');
                    button.removeClass('btn-primary-rwanda').addClass('btn-success');
                    $(this).find('input[type="email"]').val('');
                    
                    showNotification('Successfully subscribed to newsletter!', 'success');
                    
                    // Reset after 3 seconds
                    setTimeout(() => {
                        button.text(originalText);
                        button.prop('disabled', false);
                        button.removeClass('btn-success').addClass('btn-primary-rwanda');
                    }, 3000);
                }, 2000);
                
                trackEvent('Newsletter Subscription', 'Email', email);
            } else {
                showNotification('Please enter a valid email address', 'error');
            }
        });
    }

    // Lazy Loading for Images
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    // Hover Effects
    function initHoverEffects() {
        // Card hover effects
        $('.emergency-card, .service-card, .unit-card').hover(
            function() {
                $(this).addClass('hovered');
            },
            function() {
                $(this).removeClass('hovered');
            }
        );

        // Button hover effects
        $('.btn').hover(
            function() {
                $(this).addClass('hovered');
            },
            function() {
                $(this).removeClass('hovered');
            }
        );
    }

    // Sticky Header
    function initStickyHeader() {
        const header = $('.main-header-rwanda');
        const headerHeight = header.outerHeight();
        
        $(window).on('scroll', function() {
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 100) {
                header.addClass('sticky');
                $('body').css('padding-top', headerHeight + 'px');
            } else {
                header.removeClass('sticky');
                $('body').css('padding-top', '0');
            }
        });
    }

    // Social Media Sharing
    function initSocialSharing() {
        $('.social-links a').on('click', function(e) {
            e.preventDefault();
            const platform = $(this).find('i').attr('class').split(' ')[1];
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            
            let shareUrl = '';
            switch(platform) {
                case 'fa-facebook-f':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                    break;
                case 'fa-twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                    break;
                case 'fa-instagram':
                    shareUrl = `https://www.instagram.com/`;
                    break;
                case 'fa-youtube':
                    shareUrl = `https://www.youtube.com/`;
                    break;
            }
            
            if (shareUrl) {
                window.open(shareUrl, 'share', 'width=600,height=400');
                trackEvent('Social Share', platform, url);
            }
        });
    }

    // Emergency Forms
    function initEmergencyForms() {
        $('.emergency-form').on('submit', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            
            // Show loading
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.text();
            submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
            submitBtn.prop('disabled', true);
            
            // Simulate form submission
            setTimeout(() => {
                submitBtn.html('<i class="fas fa-check"></i> Submitted!');
                showNotification('Emergency report submitted successfully', 'success');
                
                // Reset form
                setTimeout(() => {
                    $(this)[0].reset();
                    submitBtn.text(originalText);
                    submitBtn.prop('disabled', false);
                }, 3000);
            }, 2000);
            
            trackEvent('Emergency Form', 'Submission', 'Emergency Report');
        });
    }

    // Search Functionality
    function initSearch() {
        $('.search-box input').on('keypress', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                const searchTerm = $(this).val();
                if (searchTerm.trim()) {
                    window.location.href = `<?php echo home_url(); ?>/?s=${encodeURIComponent(searchTerm)}`;
                }
            }
        });
    }

    // Click Tracking
    function initClickTracking() {
        $('a, button').on('click', function() {
            const element = $(this);
            const text = element.text().trim();
            const href = element.attr('href');
            
            trackEvent('Click', text, href);
        });
    }

    // Tooltips
    function initTooltips() {
        $('[data-tooltip]').hover(
            function() {
                const tooltip = $(this).attr('data-tooltip');
                $(this).append(`<div class="tooltip">${tooltip}</div>`);
            },
            function() {
                $(this).find('.tooltip').remove();
            }
        );
    }

    // Animations on Scroll
    function initAnimations() {
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.emergency-card, .service-card, .unit-card').forEach(card => {
                animationObserver.observe(card);
            });
        }
    }

    // Utility Functions
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showNotification(message, type = 'info') {
        const notification = $(`
            <div class="notification notification-${type}">
                <i class="fas fa-${getNotificationIcon(type)}"></i>
                <span>${message}</span>
                <button class="notification-close">&times;</button>
            </div>
        `);
        
        $('body').append(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.fadeOut(() => notification.remove());
        }, 5000);
        
        // Manual close
        notification.find('.notification-close').on('click', function() {
            notification.fadeOut(() => notification.remove());
        });
    }

    function getNotificationIcon(type) {
        const icons = {
            'success': 'check-circle',
            'error': 'exclamation-circle',
            'warning': 'exclamation-triangle',
            'info': 'info-circle'
        };
        return icons[type] || 'info-circle';
    }

    function trackEvent(category, action, label) {
        // Google Analytics tracking
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                event_category: category,
                event_label: label
            });
        }
        
        // Console log for debugging
        console.log('Event tracked:', { category, action, label });
    }

    // Add CSS for notifications
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: white;
                padding: 15px 20px;
                border-radius: 5px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                display: flex;
                align-items: center;
                gap: 10px;
                min-width: 300px;
                animation: slideInRight 0.3s ease;
            }
            
            .notification-success {
                border-left: 4px solid #27ae60;
            }
            
            .notification-error {
                border-left: 4px solid #e74c3c;
            }
            
            .notification-warning {
                border-left: 4px solid #f39c12;
            }
            
            .notification-info {
                border-left: 4px solid #3498db;
            }
            
            .notification-close {
                background: none;
                border: none;
                font-size: 18px;
                cursor: pointer;
                color: #999;
                margin-left: auto;
            }
            
            .notification-close:hover {
                color: #333;
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            .tooltip {
                position: absolute;
                background: #333;
                color: white;
                padding: 5px 10px;
                border-radius: 3px;
                font-size: 12px;
                z-index: 1000;
                white-space: nowrap;
                top: -30px;
                left: 50%;
                transform: translateX(-50%);
            }
            
            .tooltip::after {
                content: '';
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                border: 5px solid transparent;
                border-top-color: #333;
            }
        `)
        .appendTo('head');

})(jQuery);

// Additional utility functions
window.RwandaPolice = {
    // Public API for external use
    showNotification: function(message, type) {
        if (typeof $ !== 'undefined') {
            // Use jQuery if available
            $('<div class="notification notification-' + type + '">' +
                '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'info-circle') + '"></i>' +
                '<span>' + message + '</span>' +
                '<button class="notification-close">&times;</button>' +
                '</div>').appendTo('body');
        }
    },
    
    trackEvent: function(category, action, label) {
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                event_category: category,
                event_label: label
            });
        }
    }
};
