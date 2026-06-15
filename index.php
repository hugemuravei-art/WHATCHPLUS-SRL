<?php include 'includes/header.php'; ?>

<!-- Hero -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?= $translations['welcome'] ?> <span style="color: #F38D36;">WATCH</span>
        <span style="color: #69728D;">PLUS</span></h1>
        <p><?= $translations['hero_subtitle'] ?></p>
        <a href="#contact" class="btn"><?= $translations['btn_contact'] ?></a>
    </div>
</section>

<!-- About -->
<section id="about" class="about">
    <div class="container">
        <h2><?= $translations['about_title'] ?></h2>
        <div class="about-text">
            <?= $translations['about_text'] ?>
        </div>
    </div>
</section>

<!-- Services -->
<section id="services" class="services">
    <div class="container">
        <h2><?= $translations['services_title'] ?></h2>
        <div class="services-grid">
            <!-- Need to change the layout to match the porototype -->
            <div class="service-card">
                <img src="assets/images/service1.png" alt="">
                <h3><?= $translations['service1_title'] ?></h3>
                <p><?= $translations['service1_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service2.png" alt="">
                <h3><?= $translations['service2_title'] ?></h3>
                <p><?= $translations['service2_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service3.png" alt="">
                <h3><?= $translations['service3_title'] ?></h3>
                <p><?= $translations['service3_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service4.png" alt="">
                <h3><?= $translations['service4_title'] ?></h3>
                <p><?= $translations['service4_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service5.png" alt="">
                <h3><?= $translations['service5_title'] ?></h3>
                <p><?= $translations['service5_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service6.png" alt="">
                <h3><?= $translations['service6_title'] ?></h3>
                <p><?= $translations['service6_desc'] ?></p>
            </div>

            <div class="service-card">
                <img src="assets/images/service7.png" alt="">
                <h3><?= $translations['service7_title'] ?></h3>
                <p><?= $translations['service7_desc'] ?></p>
            </div>

        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="contact">
    <div class="container">
        
        <?php if (isset($_GET['success'])): ?>
            <script>
                const lang = "<?= $_GET['lang'] ?? 'ro' ?>";
                let text = "Thank you! Your message has been sent successfully. We will contact you soon.";
                
                if (lang === 'ru') {
                    text = "✅ Спасибо! Ваше сообщение успешно отправлено.\nМы свяжемся с вами в ближайшее время.";
                } else if (lang === 'ro') {
                    text = "✅ Mulțumim! Mesajul a fost trimis cu succes.\nVă vom contacta în curând.";
                }
                
                alert(text);
                
                // Убираем параметр из URL
                window.history.replaceState({}, '', window.location.pathname + "?lang=" + lang);
            </script>
        <?php endif; ?>

        <h2><?= $translations['contact_title'] ?></h2>
        <div class="contact-grid">
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> sales@watchplus.md</p>
                <p><i class="fas fa-phone"></i> <?= PHONE ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?= LEGAL_ADDRESS ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?= OFFICE_ADDRESS ?></p>
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