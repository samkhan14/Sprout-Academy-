/**
 * The Sprout Academy - Main JavaScript
 * Handles mobile menu, top bar, and other interactive elements
 */

(function () {
    "use strict";

    // ========================================
    // Mobile Menu Accessibility Enhancement
    // ========================================
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector(".navbar-collapse");

    if (navbarToggler && navbarCollapse) {
        // Close menu on Escape key
        document.addEventListener("keydown", function (e) {
            if (
                e.key === "Escape" &&
                navbarCollapse.classList.contains("show")
            ) {
                const bsCollapse =
                    bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
                navbarToggler.focus();
            }
        });

        // Close menu when clicking outside
        document.addEventListener("click", function (e) {
            if (navbarCollapse.classList.contains("show")) {
                if (
                    !navbarCollapse.contains(e.target) &&
                    !navbarToggler.contains(e.target)
                ) {
                    const bsCollapse =
                        bootstrap.Collapse.getInstance(navbarCollapse);
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
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#" && href !== "#!") {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                    // Update URL without jumping
                    history.pushState(null, null, href);
                    // Focus the target for accessibility
                    target.setAttribute("tabindex", "-1");
                    target.focus();
                }
            }
        });
    });

    // ========================================
    // Floating Chat Button
    // ========================================
    const chatBtn = document.querySelector(".floating-chat-btn");
    if (chatBtn) {
        chatBtn.addEventListener("click", function () {
            // Add your chat integration here
            alert("Chat functionality will be integrated here.");
            // Example: window.open('https://your-chat-service.com', '_blank');
        });
    }

    // ========================================
    // Lazy Loading Images Enhancement
    // ========================================
    if ("loading" in HTMLImageElement.prototype) {
        // Browser supports native lazy loading
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach((img) => {
            img.src = img.dataset.src || img.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement("script");
        script.src =
            "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js";
        document.body.appendChild(script);
    }

    // ========================================
    // Form Validation Enhancement
    // ========================================
    const forms = document.querySelectorAll(".needs-validation");
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            function (e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });

    // ========================================
    // Newsletter Form Handler
    // ========================================
    const newsletterForm = document.querySelector(".newsletter-form");
    if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const nameInput = this.querySelector('input[name="name"]');
            const emailInput = this.querySelector('input[name="email"]');

            if (
                nameInput &&
                emailInput &&
                emailInput.value &&
                nameInput.value
            ) {
                // Add your newsletter subscription logic here
                alert("Thank you for subscribing! (This is a demo)");
                this.reset();
            }
        });
    }

    // ========================================
    // Video Play Button Handler
    // ========================================
    const videoPlayBtns = document.querySelectorAll(".video-play-btn");
    videoPlayBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const videoContainer = this.closest(".video-showcase");
            // Add your video player logic here
            console.log("Video play clicked");
            // Example: Replace with iframe or video element
        });
    });

    // ========================================
    // Scroll to Top on Page Load (if hash present)
    // ========================================
    window.addEventListener("load", function () {
        if (window.location.hash) {
            const target = document.querySelector(window.location.hash);
            if (target) {
                setTimeout(() => {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }, 100);
            }
        }
    });

    // ========================================
    // Add Active State to Current Nav Item
    // ========================================
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath) {
            link.classList.add("active");
            link.setAttribute("aria-current", "page");
        }
    });

    // ========================================
    // Testimonial Carousel Auto-scroll
    // ========================================
    const testimonialCarousel = document.querySelector(".testimonial-carousel");
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
        testimonialCarousel.addEventListener("scroll", () => {
            clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                isScrolling = null;
            }, 150);
        });
    }

    // ========================================
    // Accordion Toggle Icon Fix
    // ========================================
    const accordionButtons = document.querySelectorAll(".accordion-button");

    accordionButtons.forEach((button) => {
        const targetId = button.getAttribute("data-bs-target");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            // Update icon on collapse show/hide events
            targetElement.addEventListener("show.bs.collapse", function () {
                button.classList.add("active");
            });

            targetElement.addEventListener("hide.bs.collapse", function () {
                button.classList.remove("active");
            });

            // Set initial state based on whether collapse is shown
            if (targetElement.classList.contains("show")) {
                button.classList.add("active");
            }
        }
    });

    // ========================================
    // Directors Tab Functionality
    // ========================================
    const directorTabs = document.querySelectorAll(".director-tab");
    const directorCards = document.querySelectorAll(".director-card");

    if (directorTabs.length > 0 && directorCards.length > 0) {
        directorTabs.forEach((tab) => {
            tab.addEventListener("click", function () {
                const location = this.getAttribute("data-location");

                // Remove active class from all tabs
                directorTabs.forEach((t) => t.classList.remove("active"));

                // Add active class to clicked tab
                this.classList.add("active");

                // Hide all director cards
                directorCards.forEach((card) => {
                    card.classList.remove("active");
                });

                // Show the selected director card
                const targetCard = document.getElementById(location);
                if (targetCard) {
                    setTimeout(() => {
                        targetCard.classList.add("active");
                    }, 50);
                }
            });
        });
    }

    // ========================================
    // Video Play Button Handler (Main Video)
    // ========================================
    const mainVideoPlayBtn = document.querySelector(".video-play-btn-main");
    const mainVideoPlayer = document.querySelector(".main-video-player");

    if (mainVideoPlayBtn && mainVideoPlayer) {
        mainVideoPlayBtn.addEventListener("click", function () {
            mainVideoPlayer.play();
            const showcase = this.closest(".video-showcase-main");
            if (showcase) {
                showcase.classList.add("playing");
            }
            this.style.display = "none";
        });

        // Show play button when video is paused
        mainVideoPlayer.addEventListener("pause", function () {
            if (mainVideoPlayBtn) {
                mainVideoPlayBtn.style.display = "flex";
            }
            const showcase = mainVideoPlayBtn.closest(".video-showcase-main");
            if (showcase) {
                showcase.classList.remove("playing");
            }
        });

        // Hide play button when video is playing
        mainVideoPlayer.addEventListener("play", function () {
            if (mainVideoPlayBtn) {
                mainVideoPlayBtn.style.display = "none";
            }
            const showcase = mainVideoPlayBtn?.closest(".video-showcase-main");
            if (showcase) {
                showcase.classList.add("playing");
            }
        });
    }

    // ========================================
    // Curriculum Video Play Button Handler
    // ========================================
    const curriculumVideoPlayBtn = document.getElementById(
        "play-curriculum-video-btn"
    );
    const curriculumVideoPlayer = document.querySelector(
        ".curriculum-video-player"
    );

    if (curriculumVideoPlayBtn && curriculumVideoPlayer) {
        curriculumVideoPlayBtn.addEventListener("click", function () {
            curriculumVideoPlayer.play();
            const showcase = this.closest(".curriculum-video-showcase");
            if (showcase) {
                showcase.classList.add("playing");
            }
            this.style.display = "none";
        });

        // Show play button when video is paused
        curriculumVideoPlayer.addEventListener("pause", function () {
            if (curriculumVideoPlayBtn) {
                curriculumVideoPlayBtn.style.display = "flex";
            }
            const showcase = curriculumVideoPlayBtn?.closest(
                ".curriculum-video-showcase"
            );
            if (showcase) {
                showcase.classList.remove("playing");
            }
        });

        // Hide play button when video is playing
        curriculumVideoPlayer.addEventListener("play", function () {
            if (curriculumVideoPlayBtn) {
                curriculumVideoPlayBtn.style.display = "none";
            }
            const showcase = curriculumVideoPlayBtn?.closest(
                ".curriculum-video-showcase"
            );
            if (showcase) {
                showcase.classList.add("playing");
            }
        });
    }

    // ========================================
    // Masonry Gallery Lightbox
    // ========================================
    function initMasonryGallery() {
        const gallerySections = document.querySelectorAll(
            ".masonry-gallery-section"
        );

        gallerySections.forEach((section) => {
            const galleryId = section.id;
            const lightbox = document.getElementById(`lightbox-${galleryId}`);
            const galleryItems = section.querySelectorAll(
                ".masonry-gallery-item"
            );
            const lightboxImage = lightbox?.querySelector(
                ".masonry-lightbox-image"
            );
            const lightboxCaption = lightbox?.querySelector(
                ".masonry-lightbox-caption"
            );
            const closeBtn = lightbox?.querySelector(".masonry-lightbox-close");
            const prevBtn = lightbox?.querySelector(".masonry-lightbox-prev");
            const nextBtn = lightbox?.querySelector(".masonry-lightbox-next");
            const backdrop = lightbox?.querySelector(
                ".masonry-lightbox-backdrop"
            );

            if (!lightbox || !lightboxImage) return;

            let currentIndex = 0;
            const images = Array.from(galleryItems).map((item) => {
                const img = item.querySelector(".masonry-gallery-image");
                return {
                    src: img.getAttribute("data-lightbox-src") || img.src,
                    alt: img.alt,
                };
            });

            // Open lightbox
            function openLightbox(index) {
                currentIndex = index;
                updateLightboxImage();
                lightbox.classList.add("active");
                document.body.style.overflow = "hidden"; // Prevent body scroll
            }

            // Close lightbox
            function closeLightbox() {
                lightbox.classList.remove("active");
                document.body.style.overflow = ""; // Restore body scroll
            }

            // Update lightbox image
            function updateLightboxImage() {
                if (images[currentIndex]) {
                    lightboxImage.src = images[currentIndex].src;
                    lightboxImage.alt = images[currentIndex].alt;
                    if (lightboxCaption) {
                        lightboxCaption.textContent = images[currentIndex].alt;
                    }
                }

                // Update button states
                if (prevBtn) {
                    prevBtn.style.display =
                        currentIndex === 0 ? "none" : "flex";
                }
                if (nextBtn) {
                    nextBtn.style.display =
                        currentIndex === images.length - 1 ? "none" : "flex";
                }
            }

            // Navigate to previous image
            function showPrevious() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateLightboxImage();
                }
            }

            // Navigate to next image
            function showNext() {
                if (currentIndex < images.length - 1) {
                    currentIndex++;
                    updateLightboxImage();
                }
            }

            // Event listeners for gallery items
            galleryItems.forEach((item, index) => {
                item.addEventListener("click", () => {
                    openLightbox(index);
                });

                // Keyboard accessibility
                item.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        openLightbox(index);
                    }
                });
            });

            // Close button
            if (closeBtn) {
                closeBtn.addEventListener("click", closeLightbox);
            }

            // Backdrop click to close
            if (backdrop) {
                backdrop.addEventListener("click", closeLightbox);
            }

            // Previous button
            if (prevBtn) {
                prevBtn.addEventListener("click", (e) => {
                    e.stopPropagation();
                    showPrevious();
                });
            }

            // Next button
            if (nextBtn) {
                nextBtn.addEventListener("click", (e) => {
                    e.stopPropagation();
                    showNext();
                });
            }

            // Keyboard navigation
            document.addEventListener("keydown", function (e) {
                if (!lightbox.classList.contains("active")) return;

                switch (e.key) {
                    case "Escape":
                        closeLightbox();
                        break;
                    case "ArrowLeft":
                        showPrevious();
                        break;
                    case "ArrowRight":
                        showNext();
                        break;
                }
            });

            // Prevent lightbox content clicks from closing
            const lightboxContainer = lightbox.querySelector(
                ".masonry-lightbox-container"
            );
            if (lightboxContainer) {
                lightboxContainer.addEventListener("click", (e) => {
                    e.stopPropagation();
                });
            }
        });
    }

    // Initialize masonry gallery on DOM ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initMasonryGallery);
    } else {
        initMasonryGallery();
    }

    // Re-initialize if new galleries are added dynamically
    const masonryObserver = new MutationObserver(() => {
        initMasonryGallery();
    });

    masonryObserver.observe(document.body, {
        childList: true,
        subtree: true,
    });
})();
