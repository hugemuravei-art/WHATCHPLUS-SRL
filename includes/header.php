<?php 
include_once 'config.php'; 

// Определение языка
$lang = $_GET['lang'] ?? null;
if (!$lang) {
    $acceptLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'ro';
    if (str_contains($acceptLang, 'ru')) $lang = 'ru';
    elseif (str_contains($acceptLang, 'en')) $lang = 'en';
    else $lang = 'ro';
}

$lang_file = "lang/{$lang}.php";
$translations = file_exists($lang_file) ? include $lang_file : include 'lang/ro.php';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_FULL_NAME ?> — Telecom & Security Solutions</title>
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="WATCHPLUS">
            </div>
            <nav>
                <ul>
                    <li><a href="#about"><?= $translations['about_title'] ?></a></li>
                    <li><a href="#services"><?= $translations['services_title'] ?></a></li>
                    <li><a href="#contact"><?= $translations['contact_title'] ?></a></li>
                </ul>
            </nav>
            
            <!-- Переключатель языков -->
            <div class="lang-switch">
                <a href="?lang=en" <?= $lang === 'en' ? 'class="active"' : '' ?>>EN</a>
                <a href="?lang=ru" <?= $lang === 'ru' ? 'class="active"' : '' ?>>RU</a>
                <a href="?lang=ro" <?= $lang === 'ro' ? 'class="active"' : '' ?>>RO</a>
            </div>
        </div>
    </header>