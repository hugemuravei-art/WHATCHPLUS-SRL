<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lang = $_GET['lang'] ?? 'ro';
    header("Location: ../index.php?success=1&lang=" . $lang);
    exit;
}
?>