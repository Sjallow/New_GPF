jQuery(document).ready(function($) {
    // Mobile menu toggle
    $('.mobile-menu-toggle').click(function() {
        $('.main-nav ul').toggleClass('mobile-menu-open');
    });

    // Animated News Ticker
    function initNewsTicker() {
        const newsItems = $('.news-item');
        const tickerContainer = $('.trending-news');
        let currentIndex = 0;
        let isAnimating = false;
        let tickerInterval;
        
        if (newsItems.length === 0) return;
        
        function showNextNews() {
            if (isAnimating) return;
            isAnimating = true;
            
            const currentItem = newsItems.eq(currentIndex);
            const nextIndex = (currentIndex + 1) % newsItems.length;
            const nextItem = newsItems.eq(nextIndex);
            
            // Fade out current item
            currentItem.addClass('fade-out');
            
            setTimeout(() => {
                // Remove all classes from current item
                currentItem.removeClass('active fade-out');
                
                // Move to next item
                currentIndex = nextIndex;
                
                // Fade in next item
                nextItem.addClass('active');
                
                // Reset animation flag
                isAnimating = false;
            }, 600);
        }
        
        function startTicker() {
            tickerInterval = setInterval(showNextNews, 5000); // Change every 5 seconds
        }
        
        function stopTicker() {
            clearInterval(tickerInterval);
        }
        
        // Start the ticker after a delay
        setTimeout(startTicker, 2000); // Initial delay of 2 seconds
        
        // Pause on hover
        tickerContainer.hover(
            function() {
                stopTicker();
            },
            function() {
                startTicker();
            }
        );
    }
    
    // Initialize news ticker
    initNewsTicker();

    // Close trending news
    $('.close-btn').click(function() {
        $('.top-header').slideUp();
    });

    // Smooth scrolling for anchor links
    $('a[href*="#"]').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });

    // Emergency number click to call
    $('.phone-number').click(function() {
        var phoneNumber = $(this).text().replace('Call: ', '');
        if (confirm('Call ' + phoneNumber + '?')) {
            window.location.href = 'tel:' + phoneNumber;
        }
    });

    // Newsletter subscription
    $('.newsletter-form').submit(function(e) {
        e.preventDefault();
        var email = $(this).find('input[type="email"]').val();
        if (email) {
            alert('Thank you for subscribing to our newsletter!');
            $(this).find('input[type="email"]').val('');
        }
    });

    // Image lazy loading
    $('img').each(function() {
        $(this).attr('loading', 'lazy');
    });

    // Add hover effects to cards
    $('.emergency-card, .service-card').hover(
        function() {
            $(this).addClass('hover-effect');
        },
        function() {
            $(this).removeClass('hover-effect');
        }
    );

    // Sticky header on scroll
    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            $('.main-header').addClass('sticky');
        } else {
            $('.main-header').removeClass('sticky');
        }
    });

    // Add loading animation
    $(window).on('load', function() {
        $('.loading-overlay').fadeOut();
    });

    // Social media share buttons
    $('.social-share').click(function(e) {
        e.preventDefault();
        var url = encodeURIComponent(window.location.href);
        var title = encodeURIComponent(document.title);
        var platform = $(this).data('platform');
        
        var shareUrl = '';
        switch(platform) {
            case 'facebook':
                shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
                break;
            case 'twitter':
                shareUrl = 'https://twitter.com/intent/tweet?url=' + url + '&text=' + title;
                break;
            case 'linkedin':
                shareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + url;
                break;
        }
        
        if (shareUrl) {
            window.open(shareUrl, 'share', 'width=600,height=400');
        }
    });

    // Emergency contact form
    $('.emergency-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: formData + '&action=submit_emergency_report',
            success: function(response) {
                if (response.success) {
                    alert('Your emergency report has been submitted. We will respond immediately.');
                    $('.emergency-form')[0].reset();
                } else {
                    alert('There was an error submitting your report. Please try again.');
                }
            },
            error: function() {
                alert('There was an error submitting your report. Please try again.');
            }
        });
    });

    // Search functionality
    $('.search-form').submit(function(e) {
        e.preventDefault();
        var searchTerm = $(this).find('input[type="search"]').val();
        if (searchTerm) {
            window.location.href = '<?php echo home_url(); ?>/?s=' + encodeURIComponent(searchTerm);
        }
    });

    // Add click tracking for analytics
    $('.btn, .emergency-card, .service-card').click(function() {
        var element = $(this);
        var elementText = element.text().trim();
        
        // Send analytics data (you can integrate with Google Analytics here)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'click', {
                'event_category': 'engagement',
                'event_label': elementText
            });
        }
    });

    // Initialize tooltips
    $('[data-tooltip]').hover(
        function() {
            var tooltip = $('<div class="tooltip">' + $(this).data('tooltip') + '</div>');
            $('body').append(tooltip);
            tooltip.fadeIn();
        },
        function() {
            $('.tooltip').remove();
        }
    );

    // Add CSS for sticky header
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .main-header.sticky {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .main-header.sticky + .main-nav {
                position: fixed;
                top: 100px;
                left: 0;
                right: 0;
                z-index: 999;
            }
            .hover-effect {
                transform: translateY(-5px) !important;
                box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
            }
            .tooltip {
                position: absolute;
                background: #333;
                color: white;
                padding: 5px 10px;
                border-radius: 3px;
                font-size: 12px;
                z-index: 1000;
                pointer-events: none;
            }
            .mobile-menu-open {
                display: block !important;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--primary-blue);
                flex-direction: column;
                z-index: 1000;
            }
        `)
        .appendTo('head');
});
