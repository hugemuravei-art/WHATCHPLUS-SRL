document.addEventListener('DOMContentLoaded', function() {
    
    // 1. ПЛАВНЫЙ СКРОЛЛ ПО ССЫЛКАМ МЕНЮ
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

 // 2. ЖЕЛЕЗНАЯ АНИМАЦИЯ СТРОК УСЛУГ (БЕЗ ОБСЕРВЕРА)
 const serviceCards = document.querySelectorAll('.service-card');
    
 serviceCards.forEach((card) => {
     card.style.opacity = '0';
     card.style.transform = 'translateX(-150px) scale(0.95)';
 });

 function checkServices() {
     serviceCards.forEach((card, index) => {
         const rect = card.getBoundingClientRect();
         if (rect.top < window.innerHeight - 30) {
             setTimeout(() => {
                 card.style.opacity = '1';
                 card.style.transform = 'translateX(0) scale(1)';
                 card.classList.add('animated');
             }, index * 90); 
         }
     });
 }

 if (serviceCards.length > 0) {
     window.addEventListener('scroll', checkServices);
     setTimeout(checkServices, 100); 
 }

    // 3. АНИМАЦИЯ ЛИНИИ ПРИ СКРОЛЛЕ — ABOUT
    const aboutH2 = document.querySelector('.about h2');
    if (aboutH2) {
        function checkLine() {
            const rect = aboutH2.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                aboutH2.classList.add('animate');
                window.removeEventListener('scroll', checkLine);
            }
        }
        window.addEventListener('scroll', checkLine);
        checkLine(); 
    }

    // 4. АНИМАЦИЯ ЛИНИИ ПРИ СКРОЛЛЕ — CONTACT
    const contactH2 = document.querySelector('.contact h2');
    if (contactH2) {
        function checkContactLine() {
            const rect = contactH2.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                contactH2.classList.add('animate');
                window.removeEventListener('scroll', checkContactLine);
            }
        }
        window.addEventListener('scroll', checkContactLine);
        checkContactLine();
    }

    // 5. АНИМАЦИЯ ПОЯВЛЕНИЯ ОТЗЫВОВ (КАСКАДНЫЙ ВЫЛЕТ СЛЕВА)
    const reviewCards = document.querySelectorAll('.review-card');
    const reviewsGrid = document.querySelector('.reviews-grid');

    if (reviewsGrid && reviewCards.length > 0) {
        const reviewsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    reviewCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('animated');
                        }, index * 90); 
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { root: null, rootMargin: '0px', threshold: 0.1 });

        reviewsObserver.observe(reviewsGrid);
    }
});