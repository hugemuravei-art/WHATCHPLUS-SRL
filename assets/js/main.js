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
});