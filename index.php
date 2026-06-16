<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'includes/header.php'; 
?>

<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?= $translations['welcome'] ?> <span class="orange">WATCH</span><span>PLUS</span></h1>
        <p><?= $translations['hero_subtitle'] ?></p>
        <a href="#contact" class="btn"><?= $translations['btn_contact'] ?></a>
    </div>
</section>

<section id="about" class="about">
    <div class="container">
        <h2><?= $translations['about_title'] ?></h2>
        <div class="about-text">
            <?= $translations['about_text'] ?>
        </div>
    </div>
</section>

<section id="services" class="services">
    <div class="container">
        <h2><?= $translations['services_title'] ?></h2>
        
        <div class="services-grid">
            
            <div class="service-card">
                <img src="assets/images/service1.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service1_title'] ?></h3>
                    <p><?= $translations['service1_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service2.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service2_title'] ?></h3>
                    <p><?= $translations['service2_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service3.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service3_title'] ?></h3>
                    <p><?= $translations['service3_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service4.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service4_title'] ?></h3>
                    <p><?= $translations['service4_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service5.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service5_title'] ?></h3>
                    <p><?= $translations['service5_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service6.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service6_title'] ?></h3>
                    <p><?= $translations['service6_desc'] ?></p>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/images/service7.png" alt="">
                <div class="service-card-content">
                    <h3><?= $translations['service7_title'] ?></h3>
                    <p><?= $translations['service7_desc'] ?></p>
                </div>
            </div>

        </div> </div>
</section>

<section id="contact" class="contact">
    <div class="container">
        
        <?php 
        // Проверяем, есть ли сообщение в сессии
        if (isset($_SESSION['mail_flash'])): 
            $flash_status = $_SESSION['mail_flash'];
            unset($_SESSION['mail_flash']); 
            
            // ХИТРЫЙ ТРЮК: Очищаем сессионный флаг типа формы, если он есть
            $form_type = $_SESSION['mail_form_type'] ?? '';
            unset($_SESSION['mail_form_type']);

            // ОПРЕДЕЛЯЕМ ЯЗЫК
            $current_lang = 'ro'; 
            if (isset($translations['send_button']) && $translations['send_button'] === 'Отправить') {
                $current_lang = 'ru';
            } elseif (isset($_GET['lang']) && $_GET['lang'] === 'en') {
                $current_lang = 'en';
            }

            // ЖЕЛЕЗОБЕТОННАЯ ПРОВЕРКА: Если тип формы явно равен 'review', 
            // мы просто пропускаем весь этот JS-скрипт и никакой алерт не вылезет!
            if ($form_type !== 'review'):
           ?>
            <script>
                const lang = "<?= $current_lang ?>";
                const status = "<?= $flash_status ?>";
                let text = "";
                
                if (status === 'success') {
                    if (lang === 'ru') {
                        text = "✅ Спасибо! Ваше сообщение успешно отправлено.\nМы свяжемся с вами в ближайшее время.";
                    } else if (lang === 'en') {
                        text = "✅ Thank you! Your message has been sent successfully.\nWe will contact you soon.";
                    } else {
                        text = "✅ Mulțumim! Mesajul a fost trimis cu succes.\nVă vom contacta în curând.";
                    }
                } else {
                    if (lang === 'ru') {
                        text = "❌ Ошибка при сохранении сообщения. Пожалуйста, попробуйте позже.";
                    } else if (lang === 'en') {
                        text = "❌ Error sending message. Please try again later.";
                    } else {
                        text = "❌ Eroare la trimiterea mesajului. Vă rugăm să încercați mai târziu.";
                    }
                }
                
                alert(text);
                
                window.history.replaceState({}, '', window.location.pathname + "?lang=" + "<?= $_GET['lang'] ?? 'ro' ?>" + window.location.hash);
            </script>
           <?php 
            endif; // Конец проверки формы
        endif; 
        ?>
        <h2><?= $translations['contact_title'] ?></h2>
        <div class="contact-grid">
            <div class="contact-info">
                <h3><?= $translations['email_label'] ?></h3>
                <p><i class="fas fa-envelope"></i> sales@watchplus.md</p>
                <h3><?= $translations['phone_label'] ?></h3>
                <p><i class="fas fa-phone"></i> <?= PHONE ?></p>
                <h3><?= $translations['legal_address_label'] ?></h3>
                <p><i class="fas fa-map-marker-alt"></i> <?= LEGAL_ADDRESS ?></p>
                <h3><?= $translations['office_address_label'] ?></h3>
                <p><i class="fas fa-map-marker-alt"></i> <?= OFFICE_ADDRESS ?></p>
            </div>
            
            <form action="mail/send.php" method="POST" class="contact-form">
                <input type="hidden" name="form_type" value="contact">
                <input type="hidden" name="lang" value="<?= $lang ?? $_GET['lang'] ?? 'ro' ?>">

                <input type="text" name="name" placeholder="<?= $translations['name_placeholder'] ?>" required>
                <input type="email" name="email" placeholder="<?= $translations['email_placeholder'] ?>" required>
                <textarea name="message" placeholder="<?= $translations['message_placeholder'] ?>" required></textarea>
                <button type="submit" class="btn"><?= $translations['send_button'] ?></button>
            </form>
        </div>
    </div>
</section>

<!-- review section-->

<section id="reviews" class="reviews">
    <div class="container">
        <h2><?= $translations['reviews_title'] ?? 'Отзывы клиентов' ?></h2>
        
        <div class="review-form">
        <h3><?= $translations['leave_review_title'] ?? 'Оставьте свой отзыв' ?></h3>            <div class="review-form-container">
                <form action="mail/send.php" method="POST">
                    <input type="hidden" name="form_type" value="review">
                    <input type="hidden" name="lang" value="<?= $_GET['lang'] ?? 'ro' ?>">
                    
                    <input type="text" name="name" placeholder="<?= $translations['name_placeholder'] ?>" required>
                    <input type="email" name="email" placeholder="<?= $translations['email_placeholder'] ?>" required>
                    <textarea name="message" placeholder="<?= $translations['message_placeholder'] ?>" required></textarea>
                    
                    <div class="form-btn-wrapper">
                    <button type="submit" class="btn"><?= $translations['submit_review_btn'] ?? 'Опубликовать отзыв' ?></button>                    </div>
                </form>
            </div>
        </div>

        <div class="reviews-grid">
    <?php
    $stmt = $pdo->query("SELECT * FROM reviews WHERE is_approved = 1 ORDER BY created_at DESC LIMIT 6");
    
    if ($stmt->rowCount() > 0) {
        while ($review = $stmt->fetch()) {
            echo "<div class='review-card'>";
            echo "  <span class='review-quote-icon'>&ldquo;</span>";
            
            echo "  <div class='review-content-wrapper'>";
            
            echo "      <div class='review-body'>";
            echo "          <p class='review-text'>«" . htmlspecialchars($review['message']) . "»</p>";
            echo "      </div>";
            
            echo "      <div class='review-meta'>";
            echo "          <span class='review-author'>" . htmlspecialchars($review['name']) . "</span>";
            echo "          <span class='review-date'>" . date('d.m.Y', strtotime($review['created_at'])) . "</span>";
            echo "      </div>";
            
            echo "  </div>"; 
            echo "</div>";  
        }
    }  else {
        echo "<p class='no-reviews'>" . htmlspecialchars($translations['no_reviews']) . "</p>";
    }
    ?>
</div>
    
</section>

<?php include 'includes/footer.php'; ?>