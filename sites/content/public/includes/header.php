<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Content Quality & Readability Testbed';
}
if (file_exists(__DIR__ . '/config.php')) {
    include __DIR__ . '/config.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | Content Testbed</title>
    <!-- Silktide Consent -->
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('consent', 'default', {
      'analytics_storage':     (localStorage.getItem('stcm.consent.analytics') === 'true' || localStorage.getItem('silktideCookieChoice_analytics') === 'true') ? 'granted' : 'denied',
      'ad_storage':            (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'ad_user_data':          (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'ad_personalization':    (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'functionality_storage': (localStorage.getItem('stcm.consent.essential') === 'true' || localStorage.getItem('silktideCookieChoice_necessary') === 'true') ? 'granted' : 'denied',
      'security_storage':      'granted',
      'wait_for_update':       500
    });
    </script>
    <!-- Google Tag Manager -->
    <?php if (!empty($gtmId) && $gtmId !== 'GTM-XXXXXXX'): ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= htmlspecialchars($gtmId) ?>');</script>
    <?php endif; ?>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Shared Unified Testbed Theme -->
    <link href="assets/shared/css/testbed-theme.min.css" rel="stylesheet">
    <!-- Custom Style Sheet -->
    <link href="assets/css/style.min.css" rel="stylesheet">
</head>
<body>
    <?php if (!empty($gtmId) && $gtmId !== 'GTM-XXXXXXX'): ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= htmlspecialchars($gtmId) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>
    
    <header>
        <?php require_once __DIR__ . '/navbar.php'; ?>
    </header>
