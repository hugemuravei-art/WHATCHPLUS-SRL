<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/config.php';
    
    $name    = strip_tags(trim($_POST["name"] ?? ''));
    $email   = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"] ?? ''));
    
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: ../index.php?status=error&lang=" . ($_GET['lang'] ?? 'ro'));
        exit;
    }
    
    $to = EMAIL_TO;
    $subject = "Новое сообщение с сайта от " . $name;
    
    $body = "Имя: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Сообщение:\n$message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    
    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../index.php?status=success&lang=" . ($_GET['lang'] ?? 'ro'));
    } else {
        header("Location: ../index.php?status=error&lang=" . ($_GET['lang'] ?? 'ro'));
    }
    exit;
}
?>