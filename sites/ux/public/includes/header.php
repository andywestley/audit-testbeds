<?php
if (!isset($pageTitle)) {
    $pageTitle = 'UX & Usability Heuristics Testbed';
}
if (!isset($basePath)) {
    $basePath = '';
}

// Include configuration for GTM ID & GA4 ID if present
if (file_exists(__DIR__ . '/config.php')) {
    include __DIR__ . '/config.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> | UxScanner Benchmark Testbed</title>
  <meta name="description" content="Dedicated benchmark testbed application for validating the UX & Usability Heuristics Scanner rules across form usability, navigation, user freedom, and ethical design.">

  <!-- Silktide Cookie Consent Pre-Configuration -->
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    
    // Set consent defaults (compatible with Silktide Consent Manager & STCM)
    gtag('consent', 'default', {
      'analytics_storage': (localStorage.getItem('stcm.consent.analytics') === 'true' || localStorage.getItem('silktideCookieChoice_analytics') === 'true') ? 'granted' : 'denied',
      'ad_storage': (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'ad_user_data': (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'ad_personalization': (localStorage.getItem('stcm.consent.marketing') === 'true' || localStorage.getItem('silktideCookieChoice_marketing') === 'true') ? 'granted' : 'denied',
      'functionality_storage': (localStorage.getItem('stcm.consent.necessary') === 'true' || localStorage.getItem('silktideCookieChoice_necessary') === 'true') ? 'granted' : 'denied',
      'security_storage': 'granted',
      'wait_for_update': 500
    });
  </script>

  <!-- Google Tag Manager / GA4 -->
  <?php if (!empty($gtmId) && $gtmId !== 'GTM-XXXXXXX'): ?>
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= htmlspecialchars($gtmId) ?>');
  </script>
  <?php endif; ?>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <!-- Google Fonts Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Silktide Consent Manager CSS -->
  <?php if (file_exists(__DIR__ . '/../assets/shared/css/silktide-consent-manager.min.css') || file_exists(__DIR__ . '/../../assets/shared/css/silktide-consent-manager.min.css')): ?>
  <link rel="stylesheet" href="<?= $basePath ?>assets/shared/css/silktide-consent-manager.min.css">
  <?php endif; ?>

  <!-- Shared Unified Testbed Theme -->
  <link rel="stylesheet" href="<?= $basePath ?>assets/shared/css/testbed-theme.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= $basePath ?>assets/css/custom.min.css">
</head>
<body>
  <?php if (!empty($gtmId) && $gtmId !== 'GTM-XXXXXXX'): ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= htmlspecialchars($gtmId) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <?php endif; ?>
