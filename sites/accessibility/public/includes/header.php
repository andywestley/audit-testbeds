<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $basePath = isset($basePath) ? $basePath : '';
    if (file_exists(__DIR__ . '/config.php')) {
        include __DIR__ . '/config.php';
    }
    if (file_exists(__DIR__ . '/data.php')) {
        include_once __DIR__ . '/data.php';
    }
    ?>
    
    <?php if (!empty($gtmId)): ?>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('consent', 'default', {
            analytics_storage: localStorage.getItem('silktideCookieChoice_analytics') === 'true' ? 'granted' : 'denied',
            ad_storage: localStorage.getItem('silktideCookieChoice_marketing') === 'true' ? 'granted' : 'denied',
            ad_user_data: localStorage.getItem('silktideCookieChoice_marketing') === 'true' ? 'granted' : 'denied',
            ad_personalization: localStorage.getItem('silktideCookieChoice_marketing') === 'true' ? 'granted' : 'denied',
            functionality_storage: localStorage.getItem('silktideCookieChoice_necessary') === 'true' ? 'granted' : 'denied',
            security_storage: localStorage.getItem('silktideCookieChoice_necessary') === 'true' ? 'granted' : 'denied'
        });
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo $gtmId; ?>');</script>
    <!-- End Google Tag Manager -->
    <?php endif; ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | Accessibility Testbed' : 'Accessibility Testbed (WCAG 2.2 Suite)'; ?></title>
    
    <!-- Google Fonts: Inter & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Shared Unified Testbed Theme -->
    <link href="<?= $basePath ?>assets/shared/css/testbed-theme.min.css" rel="stylesheet">
    
    <!-- Custom Design Tokens & Testbed Styles -->
    <link href="<?= $basePath ?>assets/css/custom.min.css" rel="stylesheet">
    
    <?php if (isset($extraStyles)) echo $extraStyles; ?>
</head>
<body>
    <?php if (!empty($gtmId)): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtmId; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>

    <!-- Skip Link for Accessibility -->
    <a class="visually-hidden-focusable btn btn-primary position-absolute m-2" href="#main-content" style="z-index: 9999;">Skip to main content</a>

    <!-- Unified Header & Testbed Suite Navigation -->
    <header class="border-bottom bg-dark shadow-sm">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark py-2" aria-label="Main Navigation">
            <div class="container-fluid px-3 px-lg-4">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?= $basePath ?>index.php">
                    <span class="badge bg-primary fs-6 p-2"><i class="bi bi-universal-access"></i></span>
                    <span class="fs-5">Accessibility <span class="text-info fw-normal">Testbed</span></span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#testbedNavbar" aria-controls="testbedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="testbedNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-xl-0 align-items-xl-center">
                        <li class="nav-item">
                            <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'index.php' && empty($basePath)) ? 'active fw-semibold' : '' ?>" href="<?= $basePath ?>index.php">
                                <i class="bi bi-grid-3x3-gap-fill me-1"></i> WCAG Matrix
                            </a>
                        </li>
                        
                        <!-- Principle 1: Perceivable -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="p1Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                1. Perceivable
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="p1Dropdown">
                                <li><a class="dropdown-item" href="<?= $basePath ?>images.php">Images &amp; Non-Text (1.1.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>media.php">Media &amp; Captions (1.2.x)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>structure.php">Structure &amp; Landmarks (1.3.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>tables.php">Data Tables (1.3.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>orientation.php">Orientation (1.3.4)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>contrast.php">Color Contrast (1.4.3/1.4.11)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>zoom_responsive.php">Zoom &amp; Reflow (1.4.4/1.4.10)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>typography.php">Typography &amp; Spacing (1.4.5/1.4.12)</a></li>
                            </ul>
                        </li>

                        <!-- Principle 2: Operable -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="p2Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                2. Operable
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="p2Dropdown">
                                <li><a class="dropdown-item" href="<?= $basePath ?>interactive.php">Keyboard Access (2.1.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>keyboard_traps.php">Keyboard Traps (2.1.2)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>flashing.php">Flashing &amp; Seizures (2.3.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>navigation.php"><i class="bi bi-layout-text-window-reverse text-warning me-1"></i> Bypass Blocks &amp; Nav (2.4.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>focus_order.php">Focus Order &amp; Visible (2.4.3/2.4.7)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>links.php">Link Purpose (2.4.4/2.4.9)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>target_size.php">Target Size (2.5.8)</a></li>
                            </ul>
                        </li>

                        <!-- Principle 3 & 4: Understandable & Robust -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="p34Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                3 &amp; 4. Understandable &amp; Robust
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="p34Dropdown">
                                <li class="dropdown-header text-uppercase small text-info">Principle 3: Understandable</li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>language.php">Language of Page (3.1.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>forms_basic.php">Form Labels (3.3.2)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>forms_advanced.php">Error Identification (3.3.1)</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-header text-uppercase small text-warning">Principle 4: Robust</li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>parsing.php">Parsing &amp; IDs (4.1.1)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>aria_bad.php">Bad ARIA Roles (4.1.2)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>iframes.php">Iframe Titles (4.1.2)</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>best_practices.php">Axe Best Practices</a></li>
                            </ul>
                        </li>

                        <!-- Audits & Journeys -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="journeysDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Journeys &amp; Audits
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="journeysDropdown">
                                <li><a class="dropdown-item" href="<?= $basePath ?>journeys/index.php"><i class="bi bi-signpost-split text-success me-2"></i>User Journeys</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>cognitive/index.php"><i class="bi bi-brain text-info me-2"></i>Cognitive Audits</a></li>
                                <li><a class="dropdown-item" href="<?= $basePath ?>heuristics/index.php"><i class="bi bi-diagram-3 text-warning me-2"></i>Heuristics Suite</a></li>
                            </ul>
                        </li>

                        <!-- Family Suite Switcher -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-info" href="#" id="suiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-fill me-1"></i> Testbed Suite
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="suiteDropdown">
                                <li class="dropdown-header text-uppercase small fw-bold text-white-50">Testbed Family Ecosystem</li>
                                <li><a class="dropdown-item active" href="https://inaccessible.andrewwestley.co.uk/"><i class="bi bi-universal-access text-primary me-2"></i>Accessibility Testbed (WCAG 2.2)</a></li>
                                <li><a class="dropdown-item" href="https://coga-testbed.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-person-fill-check text-info me-2"></i>COGA Cognitive Testbed</a></li>
                                <li><a class="dropdown-item" href="https://content-testbed.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-file-earmark-text-fill text-warning me-2"></i>Content &amp; Readability Testbed</a></li>
                                <li><a class="dropdown-item" href="https://uxusability-testbed.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-speedometer2 text-danger me-2"></i>UX &amp; Heuristics Testbed</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-2">
                        <a href="<?= $basePath ?>images.php" class="btn btn-sm btn-outline-info">
                            <i class="bi bi-play-circle-fill me-1"></i> Start WCAG Crawler
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-content" class="<?= (isset($fluidContainer) && $fluidContainer) ? 'container-fluid px-lg-4 my-4' : 'container my-4' ?>">