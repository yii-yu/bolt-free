<?php
session_start();

if (isset($_POST['lang']) || !empty($_POST['lang'])) {
    $lang = strip_tags($_POST['lang']);

    if ($lang == 'ru' || $lang == 'en') {
        $_SESSION['lang'] = $lang;
    }

    header("Location: https://iqeon.com");
    die();
}
?>

