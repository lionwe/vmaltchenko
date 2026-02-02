export default function mobileMenu() {
    const burger = document.querySelector('.header__burger');
    const header = document.querySelector('.header');
    const backdrop = document.querySelector('.backdrop');
    const mobilePopup = document.querySelector('.mobile-popup');
    const closeButton = document.querySelector('.mobile-popup__close');
    const body = document.body;
    const html = document.documentElement;
    const iconOpen = document.querySelector('.header__burger-icon-open');
    const iconClose = document.querySelector('.header__burger-icon-close');

    if (!burger || !backdrop || !mobilePopup) return;

    let scrollPosition = 0;

    // Відкриття меню
    const openMenu = () => {
        // Зберігаємо поточну позицію скролу
        scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        
        backdrop.setAttribute('open', '');
        backdrop.removeAttribute('close');
        header.classList.add('menu-open');
        burger.classList.add('active');
        burger.setAttribute('aria-expanded', 'true');
        
        // Блокуємо скрол на body і html
        body.style.overflow = 'hidden';
        body.style.position = 'fixed';
        body.style.top = `-${scrollPosition}px`;
        body.style.width = '100%';
        html.style.overflow = 'hidden';

        if (iconOpen) iconOpen.style.display = 'none';
        if (iconClose) iconClose.style.display = 'block';
    };

    // Закриття меню
    const closeMenu = () => {
        backdrop.setAttribute('close', '');
        backdrop.removeAttribute('open');
        header.classList.remove('menu-open');
        burger.classList.remove('active');
        burger.setAttribute('aria-expanded', 'false');
        
        // Відновлюємо скрол
        body.style.overflow = '';
        body.style.position = '';
        body.style.top = '';
        body.style.width = '';
        html.style.overflow = '';
        
        // Повертаємо позицію скролу
        window.scrollTo(0, scrollPosition);

        if (iconOpen) iconOpen.style.display = 'block';
        if (iconClose) iconClose.style.display = 'none';
    };

    // Клік на бургер
    burger.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = backdrop.hasAttribute('open');
        isOpen ? closeMenu() : openMenu();
    });

    // Клік на кнопку закриття
    if (closeButton) {
        closeButton.addEventListener('click', closeMenu);
    }

    // Клік на бекдроп (поза попапом)
    backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) {
            closeMenu();
        }
    });

    // Клік всередині попапу не закриває меню
    mobilePopup.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // Закриття по Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && backdrop.hasAttribute('open')) {
            closeMenu();
        }
    });

    // Закриття меню при кліку на посилання
    const menuLinks = backdrop.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeMenu();
        });
    });
}
