/**
 * FAQ Accordion
 */

const initFaq = () => {
    const faqItems = document.querySelectorAll('.faq__item');

    faqItems.forEach(item => {
        const trigger = item.querySelector('[data-accordion-trigger]');
        const content = item.querySelector('[data-accordion-content]');

        if (!trigger || !content) return;

        trigger.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item && item.parentNode === otherItem.parentNode) { // Ensure within same list
                     otherItem.classList.remove('active');
                     const otherContent = otherItem.querySelector('[data-accordion-content]');
                     if (otherContent) otherContent.style.height = '0';
                }
            });

            // Toggle current item
            if (isActive) {
                item.classList.remove('active');
                content.style.height = '0';
            } else {
                item.classList.add('active');
                content.style.height = content.scrollHeight + 'px';
            }
        });
    });
};

document.addEventListener('DOMContentLoaded', initFaq);

export default initFaq;
