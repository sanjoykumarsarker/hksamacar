<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Monthly Hare Krishna Samacar</title>
    <meta name="description" content="Hare krishna Samacar, a Monthly news published under International Society for Krishna Consciousness (ISKCON) Bangladesh">
    <meta name="keywords" content="hksamacar, hare krishna samacar, iskcon, sankirtan, kirtan, gouranga mahaprabhu, mayapur dham, vrindavan dham" />
    <meta name='copyright' content='Hare Krishna Samacar'>
    <meta name='robots' content='index,follow'>
    <meta name='coverage' content='Worldwide'>
    <meta name='distribution' content='Global'>
    <meta name='medium' content='blog'>
    <meta name='og:email' content='hksamacar@gmail.com'>
    <meta name="news_keywords" content="hare krishna samacar, iskcon, sankirtan, kirtan, gouranga mahaprabhu, mayapur dham, vrindavan dham">
    <meta name="facebook-domain-verification" content="l268upuhe8iiq78ogmwnc5brci780e" />

    <?= csrf_meta() ?>

    <link rel="stylesheet" href="<?= assets_url('css/style.min.css', 5) ?>" />
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?= assets_url('vendors/aos/dist/aos.css/aos.css') ?>" />
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?= assets_url('vendors/iziToast/iziToast.min.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;600&display=swap">

    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= assets_url('icons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= assets_url('icons/favicon-16x16.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= assets_url('icons/apple-touch-icon.png') ?>">

    <link rel="mask-icon" href="<?= assets_url('icons/safari-pinned-tab.svg') ?>" color="#5bbad5">
    <!-- <link rel="shortcut icon" href="<?= assets_url('icons/favicon.ico') ?>"> -->
    <meta name="theme-color" content="#032a63">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="application-name" content="মাসিক হরেকৃষ্ণ সমাচার">
    <meta name="apple-mobile-web-app-title" content="মাসিক হরেকৃষ্ণ সমাচার">
    <meta name="msapplication-config" content="<?= assets_url('icons/browserconfig.xml') ?>">
    <link rel="manifest" href="<?= assets_url('manifest.json') ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- <link rel="apple-touch-startup-image" href="/launch.png"> -->
    <?php if (!service('auth')->id()) : ?>
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    <?php endif; ?>
    <?= $this->renderSection('head'); ?>
</head>

<body>
    <div class="container-scroller">
        <div class="main-panel">