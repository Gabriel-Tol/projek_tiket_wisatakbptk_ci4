// Landing Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.getElementById('navbarNav');

    const updateNavbar = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };

    window.addEventListener('scroll', updateNavbar);
    updateNavbar();

    // Close mobile menu on link click
    if (navbarCollapse) {
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const collapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (collapse) collapse.hide();
            });
        });
    }

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-in-out'
        });
    }

    // Counter Animation for Statistics
    const stats = document.querySelectorAll('.counter');
    const speed = 200;

    const animateStats = () => {
        stats.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    // Trigger stats animation when in view
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                animateStats();
                observer.unobserve(statsSection);
            }
        }, { threshold: 0.5 });
        observer.observe(statsSection);
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Dark Mode Toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const html = document.documentElement;

    const setDarkMode = (isDark) => {
        if (isDark) {
            html.setAttribute('data-theme', 'dark');
            darkModeIcon.className = 'bi bi-sun-fill';
            localStorage.setItem('theme', 'dark');
        } else {
            html.removeAttribute('data-theme');
            darkModeIcon.className = 'bi bi-moon-fill';
            localStorage.setItem('theme', 'light');
        }
    };

    // Load saved preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        setDarkMode(true);
    }

    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', () => {
            const isDark = html.getAttribute('data-theme') === 'dark';
            setDarkMode(!isDark);
        });
    }

    // Expanding Cards - Destinasi Wisata Unggulan
    const expandingCardsEl = document.getElementById('expandingCards');
    if (expandingCardsEl) {
        const cards = expandingCardsEl.querySelectorAll('.expanding-card');
        let activeIndex = 0;

        const isDesktop = () => window.innerWidth >= 768;

        const updateGrid = () => {
            if (cards.length === 0) return;

            if (isDesktop()) {
                const cols = Array.from(cards).map((_, i) => i === activeIndex ? '5fr' : '1fr').join(' ');
                expandingCardsEl.style.gridTemplateColumns = cols;
                expandingCardsEl.style.gridTemplateRows = '1fr';
            } else {
                const rows = Array.from(cards).map((_, i) => i === activeIndex ? '5fr' : '1fr').join(' ');
                expandingCardsEl.style.gridTemplateRows = rows;
                expandingCardsEl.style.gridTemplateColumns = '1fr';
            }
        };

        const setActive = (index) => {
            activeIndex = index;
            cards.forEach((card, i) => {
                card.setAttribute('data-active', i === index ? 'true' : 'false');
            });
            updateGrid();
        };

        cards.forEach((card, i) => {
            card.addEventListener('mouseenter', () => setActive(i));
            card.addEventListener('focus', () => setActive(i));
            card.addEventListener('click', () => setActive(i));
        });

        updateGrid();

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(updateGrid, 100);
        });
    }

    // Gallery Infinite Auto Slider - Pause on hover
    const galleryInfiniteScroll = document.getElementById('galleryInfiniteScroll');
    if (galleryInfiniteScroll) {
        galleryInfiniteScroll.addEventListener('mouseenter', () => {
            galleryInfiniteScroll.style.animationPlayState = 'paused';
        });
        galleryInfiniteScroll.addEventListener('mouseleave', () => {
            galleryInfiniteScroll.style.animationPlayState = 'running';
        });
    }

    // Testimonials Vertical Scrolling - Pause on hover
    const testimonialColumns = document.querySelectorAll('.testimonials-scroll');
    testimonialColumns.forEach(column => {
        column.addEventListener('mouseenter', () => {
            column.style.animationPlayState = 'paused';
        });
        column.addEventListener('mouseleave', () => {
            column.style.animationPlayState = 'running';
        });
    });
});
