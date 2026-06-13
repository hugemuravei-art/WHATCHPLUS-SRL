<?php include 'includes/header.php'; ?>

<!-- Hero -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?= $translations['welcome'] ?> <span class="orange">WATCHPLUS</span></h1>
        <p><?= $translations['hero_subtitle'] ?></p>
        <a href="#contact" class="btn"><?= $translations['btn_contact'] ?></a>
    </div>
</section>

<!-- About -->
<section id="about" class="about">
    <div class="container">
        <h2><?= $translations['about_title'] ?></h2>
        <div class="about-text">
            <p><?= $translations['about_text_1'] ?></p>
            <p><?= $translations['about_text_2'] ?></p>
            <p><?= $translations['about_text_3'] ?></p>
        </div>
    </div>
</section>

<!-- Services -->
<section id="services" class="services">
    <div class="container">
        <h2><?= $translations['services_title'] ?></h2>
        <div class="services-grid">
            
            <div class="service-card">
                <img src="assets/images/service1.png" alt="">
                <h3>Строительство телекоммуникационных сетей</h3>
                <p>Проектирование и прокладка оптоволоконных линий связи любой сложности.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service2.png" alt="">
                <h3>Обслуживание телекоммуникационных сетей</h3>
                <p>Регулярное техническое обслуживание и оперативное устранение неисправностей.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service3.png" alt="">
                <h3>Подключение абонентов</h3>
                <p>Подключение частных и корпоративных клиентов к интернету и ТВ.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service4.png" alt="">
                <h3>Системы видеонаблюдения</h3>
                <p>Проектирование и установка систем видеонаблюдения для объектов любой сложности.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service5.png" alt="">
                <h3>Системы контроля доступа и учета персонала</h3>
                <p>Разработка и внедрение решений для безопасного управления доступом.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service6.png" alt="">
                <h3>Системы домофонии</h3>
                <p>Монтаж и настройка аудио- и видеодомофонов для жилых и коммерческих зданий.</p>
            </div>

            <div class="service-card">
                <img src="assets/images/service7.png" alt="">
                <h3>Системы безопасности</h3>
                <p>Комплексные решения по охране объектов и предотвращению угроз.</p>
            </div>

        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="contact">
    <div class="container">
        <h2><?= $translations['contact_title'] ?></h2>
        <div class="contact-grid">
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> sales@watchplus.md</p>
                <p><i class="fas fa-phone"></i> <?= PHONE ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?= ADDRESS ?></p>
            </div>
            
            <form action="mail/send.php" method="POST" class="contact-form">
                <input type="text" name="name" placeholder="<?= $translations['name_placeholder'] ?>" required>
                <input type="email" name="email" placeholder="<?= $translations['email_placeholder'] ?>" required>
                <textarea name="message" placeholder="<?= $translations['message_placeholder'] ?>" required></textarea>
                <button type="submit" class="btn"><?= $translations['send_button'] ?></button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>