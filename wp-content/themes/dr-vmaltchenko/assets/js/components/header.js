document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('.header__menu-link');
    const sections = document.querySelectorAll('section');
    const header = document.querySelector('.header');

    let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollThreshold = 100;

    // Hide/Show Header on Scroll
    const handleHeaderVisibility = () => {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (header.classList.contains('menu-open')) return;

        if (currentScroll > lastScrollTop && currentScroll > scrollThreshold) {
            header.classList.add('header--hidden');
        } else if (currentScroll < lastScrollTop) {
            header.classList.remove('header--hidden');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    };

    // Scroll Background Trigger
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }

        handleHeaderVisibility();
    };

    window.addEventListener('scroll', handleScroll, { passive: true });

    // Initial check in case page is reloaded while scrolled
    // Disable transition to prevent "jumping" effect
    header.style.transition = 'none';
    handleScroll();
    // Force reflow to flush styles
    void header.offsetHeight;
    header.style.transition = '';

    // Intersection Observer для активних пунктів меню
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                menuLinks.forEach(link => link.classList.remove('active'));

                const activeLink = document.querySelector(`.header__menu-link[href="#${entry.target.id}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});
