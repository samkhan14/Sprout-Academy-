/**
 * The Sprout Academy - Main JavaScript
 * Handles mobile menu, top bar, and other interactive elements
 */

(function() {
  'use strict';

  // ========================================
  // Top Bar Close Functionality
  // ========================================
  const topBar = document.querySelector('.top-bar');
  const topBarClose = document.querySelector('.top-bar-close');

  if (topBarClose && topBar) {
    topBarClose.addEventListener('click', function() {
      topBar.style.display = 'none';
      // Store in session storage so it stays closed
      sessionStorage.setItem('topBarClosed', 'true');
    });

    // Check if top bar was previously closed
    if (sessionStorage.getItem('topBarClosed') === 'true') {
      topBar.style.display = 'none';
    }
  }

  // ========================================
  // Mobile Menu Accessibility Enhancement
  // ========================================
  const navbarToggler = document.querySelector('.navbar-toggler');
  const navbarCollapse = document.querySelector('.navbar-collapse');

  if (navbarToggler && navbarCollapse) {
    // Close menu on Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && navbarCollapse.classList.contains('show')) {
        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
        if (bsCollapse) {
          bsCollapse.hide();
        }
        navbarToggler.focus();
      }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
      if (navbarCollapse.classList.contains('show')) {
        if (!navbarCollapse.contains(e.target) && !navbarToggler.contains(e.target)) {
          const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
          if (bsCollapse) {
            bsCollapse.hide();
          }
        }
      }
    });
  }

  // ========================================
  // Smooth Scroll for Anchor Links
  // ========================================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href !== '#!') {
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
          // Update URL without jumping
          history.pushState(null, null, href);
          // Focus the target for accessibility
          target.setAttribute('tabindex', '-1');
          target.focus();
        }
      }
    });
  });

  // ========================================
  // Floating Chat Button
  // ========================================
  const chatBtn = document.querySelector('.floating-chat-btn');
  if (chatBtn) {
    chatBtn.addEventListener('click', function() {
      // Add your chat integration here
      alert('Chat functionality will be integrated here.');
      // Example: window.open('https://your-chat-service.com', '_blank');
    });
  }

  // ========================================
  // Lazy Loading Images Enhancement
  // ========================================
  if ('loading' in HTMLImageElement.prototype) {
    // Browser supports native lazy loading
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
      img.src = img.dataset.src || img.src;
    });
  } else {
    // Fallback for browsers that don't support lazy loading
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
    document.body.appendChild(script);
  }

  // ========================================
  // Form Validation Enhancement
  // ========================================
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', function(e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });

  // ========================================
  // Newsletter Form Handler
  // ========================================
  const newsletterForm = document.querySelector('.newsletter-form');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const nameInput = this.querySelector('input[name="name"]');
      const emailInput = this.querySelector('input[name="email"]');
      
      if (nameInput && emailInput && emailInput.value && nameInput.value) {
        // Add your newsletter subscription logic here
        alert('Thank you for subscribing! (This is a demo)');
        this.reset();
      }
    });
  }

  // ========================================
  // Video Play Button Handler
  // ========================================
  const videoPlayBtns = document.querySelectorAll('.video-play-btn');
  videoPlayBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const videoContainer = this.closest('.video-showcase');
      // Add your video player logic here
      console.log('Video play clicked');
      // Example: Replace with iframe or video element
    });
  });

  // ========================================
  // Scroll to Top on Page Load (if hash present)
  // ========================================
  window.addEventListener('load', function() {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        setTimeout(() => {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }, 100);
      }
    }
  });

  // ========================================
  // Add Active State to Current Nav Item
  // ========================================
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');
  
  navLinks.forEach(link => {
    const linkPath = new URL(link.href).pathname;
    if (linkPath === currentPath) {
      link.classList.add('active');
      link.setAttribute('aria-current', 'page');
    }
  });

  // ========================================
  // Testimonial Carousel Auto-scroll
  // ========================================
  const testimonialCarousel = document.querySelector('.testimonial-carousel');
  if (testimonialCarousel) {
    let isScrolling;
    let scrollAmount = 0;
    
    // Auto-scroll functionality (optional)
    // Uncomment if you want auto-scrolling testimonials
    /*
    setInterval(() => {
      if (!isScrolling) {
        scrollAmount += 320; // width of one image + gap
        if (scrollAmount >= testimonialCarousel.scrollWidth - testimonialCarousel.clientWidth) {
          scrollAmount = 0;
        }
        testimonialCarousel.scrollTo({
          left: scrollAmount,
          behavior: 'smooth'
        });
      }
    }, 5000);
    */

    // Pause auto-scroll when user is manually scrolling
    testimonialCarousel.addEventListener('scroll', () => {
      clearTimeout(isScrolling);
      isScrolling = setTimeout(() => {
        isScrolling = null;
      }, 150);
    });
  }

  // ========================================
  // Console Welcome Message
  // ========================================
  console.log('%c🌱 Welcome to The Sprout Academy! 🌱', 'color: #4CAF50; font-size: 20px; font-weight: bold;');
  console.log('%cDeveloped with care for children\'s education', 'color: #FF6B35; font-size: 14px;');

})();

