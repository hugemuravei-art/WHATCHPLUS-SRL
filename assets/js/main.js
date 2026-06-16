document.addEventListener('DOMContentLoaded', function() {
    
    // Плавный скролл
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
                
                // Закрываем мобильное меню
                if (window.innerWidth <= 768) {
                    document.getElementById('nav-menu').classList.remove('active');
                    document.getElementById('mobile-menu-btn').innerHTML = '<i class="fas fa-bars"></i>';
                }
            }
        });
    });

    // Мобильное меню
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.getElementById('nav-menu');

    if (mobileBtn && navMenu) {
        mobileBtn.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            
            if (navMenu.classList.contains('active')) {
                mobileBtn.innerHTML = '<i class="fas fa-times"></i>';
            } else {
                mobileBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });
    } else {
        console.error('Элементы меню не найдены!');
    }

// Анимация линии при скролле
const aboutH2 = document.querySelector('.about h2');

function checkLine() {
    const rect = aboutH2.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
        aboutH2.classList.add('animate');
        window.removeEventListener('scroll', checkLine);
    }
}

window.addEventListener('scroll', checkLine);
checkLine(); 

// Анимация линии - contact
const contactH2 = document.querySelector('.contact h2');

function checkContactLine() {
    const rect = contactH2.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
        contactH2.classList.add('animate');
        window.removeEventListener('scroll', checkContactLine);
    }
}

window.addEventListener('scroll', checkContactLine);
checkContactLine();
});