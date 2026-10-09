<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Content Quality & Readability Testbed';
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
      'analytics_storage': localStorage.getItem('stcm.consent.analytics') === 'true' ? 'granted' : 'denied',
      'ad_storage': localStorage.getItem('stcm.consent.marketing') === 'true' ? 'granted' : 'denied',
      'ad_user_data': localStorage.getItem('stcm.consent.marketing') === 'true' ? 'granted' : 'denied',
      'ad_personalization': localStorage.getItem('stcm.consent.marketing') === 'true' ? 'granted' : 'denied',
      'wait_for_update': 500
    });
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MZMJC7FR');</script>

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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZMJC7FR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary-subtle sticky-top">
            <div class="container-fluid px-lg-4">
                <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
                    <span class="badge bg-warning text-dark px-2 py-1 fs-6"><i class="bi bi-file-earmark-text-fill"></i></span>
                    <span class="fw-bold tracking-tight text-white">Content <span class="text-warning">Testbed</span></span>
                    <span class="badge bg-secondary-subtle text-secondary navbar-brand-badge ms-1">NLP &amp; Flesch</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="topNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>" href="index.php">
                                <i class="bi bi-grid-3x3-gap-fill me-1"></i> Rules Matrix
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="contentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-play-fill me-1"></i> Content Articles
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="contentDropdown">
                                <li><a class="dropdown-item" href="blog-bad-1.php">Blog 1: High Reading Level</a></li>
                                <li><a class="dropdown-item" href="blog-bad-2.php">Blog 2: Run-on Clauses</a></li>
                                <li><a class="dropdown-item" href="news-bad-1.php">News 1: Passive Voice</a></li>
                                <li><a class="dropdown-item" href="news-bad-2.php">News 2: Inclusive Terms</a></li>
                                <li><a class="dropdown-item" href="product-bad-1.php">Product 1: Profanity Filter</a></li>
                                <li><a class="dropdown-item" href="product-bad-2.php">Product 2: Brand Values</a></li>
                            </ul>
                        </li>
                        <!-- Family Suite Switcher -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning" href="#" id="suiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-fill me-1"></i> Testbed Suite
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="suiteDropdown">
                                <li class="dropdown-header text-uppercase small fw-bold text-white-50">Testbed Family Ecosystem</li>
                                <li><a class="dropdown-item" href="https://inaccessible.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-universal-access text-primary me-2"></i>Accessibility Testbed (WCAG 2.2)</a></li>
                                <li><a class="dropdown-item" href="https://coga-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-person-fill-check text-info me-2"></i>COGA Cognitive Testbed</a></li>
                                <li><a class="dropdown-item active" href="index.php"><i class="bi bi-file-earmark-text-fill text-warning me-2"></i>Content &amp; Readability Testbed</a></li>
                                <li><a class="dropdown-item" href="https://ux-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-speedometer2 text-danger me-2"></i>UX &amp; Heuristics Testbed</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-2">
                        <a href="blog-bad-1.php" class="btn btn-sm btn-outline-warning text-white">
                            <i class="bi bi-play-circle-fill me-1"></i> Start Crawler Route
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
