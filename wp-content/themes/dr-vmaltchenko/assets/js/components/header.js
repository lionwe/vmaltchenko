document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('.header__menu-link');
    const sections = document.querySelectorAll('section');
    const header = document.querySelector('.header');

    // Scroll Background Trigger
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5 
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Remove active class from all links
                menuLinks.forEach(link => link.classList.remove('active'));

                // Find the link that corresponds to the visible section
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
