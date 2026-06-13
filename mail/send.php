<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/config.php';
    
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));
    
    $to = EMAIL_TO;
    $subject = "Новое сообщение с сайта от $name";
    
    $body = "Имя: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Сообщение:\n$message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../index.php?status=success");
    } else {
        header("Location: ../index.php?status=error");
    }
    exit;
}
?>