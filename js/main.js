(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.navbar').addClass('position-fixed bg-dark shadow-sm');
        } else {
            $('.navbar').removeClass('position-fixed bg-dark shadow-sm');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $('.testimonial-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        dotsData: true,
    });

    /* smoothscroll
    * ---------------------------------------------------- */ 
    const ssSmoothScroll = function() {
        
        // Easing functions for smooth scroll animation
        const easeFunctions = {
            easeInQuad: function(t, b, c, d) {
                t /= d;
                return c * t * t + b;
            },
            easeOutQuad: function(t, b, c, d) {
                t /= d;
                return -c * t * (t - 2) + b;
            },
            easeInOutQuad: function(t, b, c, d) {
                t /= d/2;
                if (t < 1) return c/2*t*t + b;
                t--;
                return -c/2 * (t*(t-2) - 1) + b;
            },
            easeInOutCubic: function(t, b, c, d) {
                t /= d/2;
                if (t < 1) return c/2*t*t*t + b;
                t -= 2;
                return c/2*(t*t*t + 2) + b;
            },
            easeSmoothInOut: function(t, b, c, d) {
                t /= d/2;
                if (t < 1) return c/2*t*t*t*t*t + b;
                t -= 2;
                return c/2*(t*t*t*t*t + 2) + b;
            }
        };

        // Scroll configuration options
        const config = {            
            // onStart: function() { console.log('Scroll started'); },
            // onComplete: function() { console.log('Scroll completed'); },
            tolerance: 0,
            duration: 1800,
            easing: 'easeSmoothInOut',
            container: window
        };

        // Track animation state
        let animationFrameId = null;
        let isScrolling = false;

        // Smooth scroll to target element
        function smoothScrollTo(target, options) {

            // Cancel ongoing animation if active
            if (isScrolling && animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }
            isScrolling = true;

            // Destructure options and set initial values
            const { duration, easing, tolerance, container, onStart, onComplete } = options;
            const startY = container === window ? window.pageYOffset : container.scrollTop;
            const startTime = performance.now();

            // Trigger start callback
            if (typeof onStart === 'function') onStart();

            // Animation loop
            function animateScroll(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Calculate target position
                const targetRect = target.getBoundingClientRect();
                const targetY = (container === window ? targetRect.top + window.pageYOffset : targetRect.top) - tolerance;
                const change = targetY - startY;

                // Apply easing to scroll position
                const easedProgress = easeFunctions[easing](progress, startY, change, 1);

                // Update scroll position
                if (container === window) {
                    window.scrollTo(0, easedProgress);
                } else {
                    container.scrollTop = easedProgress;
                }

                // Continue or complete animation
                if (progress < 1) {
                    animationFrameId = requestAnimationFrame(animateScroll);
                } else {
                    isScrolling = false;
                    animationFrameId = null;

                    // Ensure target is focusable
                    if (target && target.focus && !target.hasAttribute('tabindex')) {
                        target.setAttribute('tabindex', '-1');
                    }
                    if (target && target.focus) {
                        target.focus({ preventScroll: true });
                    }

                    // Trigger complete callback
                    if (typeof onComplete === 'function') onComplete();
                }
            }

            // Start animation
            animationFrameId = requestAnimationFrame(animateScroll);
        }
        

        // Find smooth scroll triggers
        const triggers = document.querySelectorAll('.smoothscroll');        

        // Add click event listeners to triggers
        triggers.forEach(function(trigger) {

            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const href = trigger.getAttribute('href');
                const target = href === '#' ? { getBoundingClientRect: function() { return { top: 0 }; } } : document.querySelector(href);

                // Scroll to target or warn if not found
                if (target) {
                    smoothScrollTo(target, config);
                } else {
                    console.warn(`Target "${href}" not found`);
                }
            });

        });

    }; // end ssSmoothScroll

    (function ssInit() {

        ssSmoothScroll();

    })();
    
})(jQuery);

