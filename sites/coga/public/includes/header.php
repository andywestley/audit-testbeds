<?php
if (!isset($base_path)) {
    $base_path = '/';
}
if (!isset($pageTitle)) {
    $pageTitle = 'COGA Cognitive Accessibility Testbed';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    })(window,document,'script','dataLayer','GTM-NFSRSZ7C');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | COGA Testbed</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Shared Unified Testbed Theme -->
    <link href="<?= $base_path ?>shared/css/testbed-theme.min.css" rel="stylesheet">
    <!-- Custom Style Sheet -->
    <link href="<?= $base_path ?>css/style.min.css" rel="stylesheet">
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFSRSZ7C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary-subtle sticky-top">
            <div class="container-fluid px-lg-4">
                <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $base_path ?>index.php">
                    <span class="badge bg-info text-dark px-2 py-1 fs-6"><i class="bi bi-person-fill-check"></i></span>
                    <span class="fw-bold tracking-tight text-white">COGA <span class="text-info">Testbed</span></span>
                    <span class="badge bg-secondary-subtle text-secondary navbar-brand-badge ms-1">W3C Heuristics</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="topNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= empty($currentSlug) ? 'active' : '' ?>" href="<?= $base_path ?>index.php">
                                <i class="bi bi-grid-3x3-gap-fill me-1"></i> Guidelines Matrix
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= !empty($currentSlug) ? 'active' : '' ?>" href="#" id="cogaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-play-fill me-1"></i> Guidelines (1–8)
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="cogaDropdown">
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g1.php">G1: Understandable Controls</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g2.php">G2: Finding Content & Structure</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g3.php">G3: Clear Content & Density</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g4.php">G4: Avoiding Mistakes & Forms</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g5.php">G5: Focus & Distractions</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g6.php">G6: Eliminate Memory Reliance</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g7.php">G7: Help & Support</a></li>
                                <li><a class="dropdown-item" href="<?= $base_path ?>guidelines/g8.php">G8: Personalization & Zoom</a></li>
                            </ul>
                        </li>
                        <!-- Family Suite Switcher -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-info" href="#" id="suiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-fill me-1"></i> Testbed Suite
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="suiteDropdown">
                                <li class="dropdown-header text-uppercase small fw-bold text-white-50">Testbed Family Ecosystem</li>
                                <li><a class="dropdown-item" href="https://inaccessible.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-universal-access text-primary me-2"></i>Accessibility Testbed (WCAG 2.2)</a></li>
                                <li><a class="dropdown-item active" href="<?= $base_path ?>index.php"><i class="bi bi-person-fill-check text-info me-2"></i>COGA Cognitive Testbed</a></li>
                                <li><a class="dropdown-item" href="https://content-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-file-earmark-text-fill text-warning me-2"></i>Content &amp; Readability Testbed</a></li>
                                <li><a class="dropdown-item" href="https://ux-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-speedometer2 text-danger me-2"></i>UX &amp; Heuristics Testbed</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-2">
                        <a href="<?= $base_path ?>guidelines/g1.php" class="btn btn-sm btn-outline-info">
                            <i class="bi bi-play-circle-fill me-1"></i> Start Crawler Route
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
