<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name      = strip_tags(trim($_POST["name"]));
    $email     = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message   = strip_tags(trim($_POST["message"]));
    $form_type = $_POST["form_type"] ?? 'contact';
    $lang      = strip_tags(trim($_POST["lang"] ?? 'ro')); 

    $db_success = false;

    try {
        if ($form_type === 'review') {
            $stmt = $pdo->prepare("INSERT INTO reviews (name, email, message, is_approved) VALUES (?, ?, ?, 1)");
            $db_success = $stmt->execute([$name, $email, $message]);
            $anchor = "#reviews"; 
        } else {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
            $db_success = $stmt->execute([$name, $email, $message]);
            $anchor = "#contact";
        }
    } catch (PDOException $e) {
        $db_success = false;
    }

    // Отправка на почту
    $to = EMAIL_TO;
    $subject = ($form_type === 'review') ? "Новый отзыв на сайте от $name" : "Новое сообщение (контакты) от $name";
    $body = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";
    $headers = "From: $email\r\nReply-To: $email";
    
    @mail($to, $subject, $body, $headers);

    if ($db_success) {
        $_SESSION['mail_flash'] = 'success';
        $_SESSION['mail_form_type'] = $_POST['form_type'] ?? 'contact';
    } else {
        $_SESSION['mail_flash'] = 'error';
    }

    header("Location: ../index.php?lang=" . $lang . $anchor);
    exit;
}
?>