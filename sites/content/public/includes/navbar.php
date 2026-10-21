<?php
/**
 * Navigation Bar Component for Content Quality & Readability Testbed
 */
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
?>
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
                    <a class="nav-link <?= $currentPage === 'index.php' ? 'active' : '' ?>" href="index.php">
                        <i class="bi bi-grid-3x3-gap-fill me-1"></i> Rules Matrix
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage === 'ugc-governance.php' || $currentPage === 'user-generated-content.php') ? 'active' : '' ?>" href="ugc-governance.php">
                        <i class="bi bi-chat-square-quote-fill me-1 text-warning"></i> UGC Governance
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-collection-play-fill me-1"></i> Content Articles
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="contentDropdown">
                        <li><h6 class="dropdown-header text-uppercase small text-white-50">Heuristic Test Articles</h6></li>
                        <li><a class="dropdown-item <?= $currentPage === 'blog-bad-1.php' ? 'active' : '' ?>" href="blog-bad-1.php">Blog 1: High Reading Level</a></li>
                        <li><a class="dropdown-item <?= $currentPage === 'blog-bad-2.php' ? 'active' : '' ?>" href="blog-bad-2.php">Blog 2: Run-on Clauses</a></li>
                        <li><a class="dropdown-item <?= $currentPage === 'news-bad-1.php' ? 'active' : '' ?>" href="news-bad-1.php">News 1: Passive Voice</a></li>
                        <li><a class="dropdown-item <?= $currentPage === 'news-bad-2.php' ? 'active' : '' ?>" href="news-bad-2.php">News 2: Inclusive Terms</a></li>
                        <li><a class="dropdown-item <?= $currentPage === 'product-bad-1.php' ? 'active' : '' ?>" href="product-bad-1.php">Product 1: Profanity Filter</a></li>
                        <li><a class="dropdown-item <?= $currentPage === 'product-bad-2.php' ? 'active' : '' ?>" href="product-bad-2.php">Product 2: Brand Values</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header text-uppercase small text-white-50">Scope &amp; Governance</h6></li>
                        <li><a class="dropdown-item <?= ($currentPage === 'ugc-governance.php' || $currentPage === 'user-generated-content.php') ? 'active' : '' ?>" href="ugc-governance.php"><i class="bi bi-shield-check me-2 text-warning"></i>UGC Exclusion Test Cases</a></li>
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
                        <li><a class="dropdown-item" href="https://coga.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-person-fill-check text-info me-2"></i>COGA Cognitive Testbed</a></li>
                        <li><a class="dropdown-item active" href="index.php"><i class="bi bi-file-earmark-text-fill text-warning me-2"></i>Content &amp; Readability Testbed</a></li>
                        <li><a class="dropdown-item" href="https://uxusability-testbed.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-speedometer2 text-danger me-2"></i>UX &amp; Heuristics Testbed</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="d-flex align-items-center gap-2">
                <a href="ugc-governance.php" class="btn btn-sm btn-warning text-dark fw-bold me-1">
                    <i class="bi bi-chat-quote-fill me-1"></i> UGC Tests
                </a>
                <a href="blog-bad-1.php" class="btn btn-sm btn-outline-warning text-white">
                    <i class="bi bi-play-circle-fill me-1"></i> Start Crawler Route
                </a>
            </div>
        </div>
    </div>
</nav>
