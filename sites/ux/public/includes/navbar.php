<?php
if (!isset($basePath)) {
    $basePath = '';
}
if (!isset($currentSlug)) {
    $currentSlug = '';
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary-subtle sticky-top">
  <div class="container-fluid px-lg-4">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $basePath ?>index.php">
      <span class="badge bg-primary px-2 py-1 fs-6"><i class="bi bi-speedometer2"></i></span>
      <span class="fw-bold tracking-tight">UxScanner <span class="text-primary">Testbed</span></span>
      <span class="badge bg-secondary-subtle text-secondary navbar-brand-badge ms-1">v1.0 Heuristics</span>
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="topNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= empty($currentSlug) ? 'active' : '' ?>" href="<?= $basePath ?>index.php" <?= empty($currentSlug) ? 'aria-current="page"' : '' ?>>
            <i class="bi bi-grid-3x3-gap-fill me-1"></i> Catalog Matrix
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= !empty($currentSlug) ? 'active' : '' ?>" href="#" id="testsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-collection-play-fill me-1"></i> Test Suite (11 Rules)
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="testsDropdown">
            <li class="dropdown-header text-uppercase text-primary small fw-bold">Pillar 1: Form Usability</li>
            <li><a class="dropdown-item <?= $currentSlug === 'inputmode-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/inputmode-missing.php">1. Inputmode Missing</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'autocomplete-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/autocomplete-missing.php">2. Autocomplete Missing</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'password-toggle-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/password-toggle-missing.php">3. Password Toggle Missing</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-header text-uppercase text-info small fw-bold">Pillar 2: Navigation & IA</li>
            <li><a class="dropdown-item <?= $currentSlug === 'active-nav-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/active-nav-missing.php">4. Active Nav Missing</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'scroll-escape-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/scroll-escape-missing.php">5. Scroll Escape Missing</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'false-affordance' ? 'active' : '' ?>" href="<?= $basePath ?>tests/false-affordance.php">6. False Affordance</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'external-link-cue' ? 'active' : '' ?>" href="<?= $basePath ?>tests/external-link-cue.php">7. External Link Cue</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-header text-uppercase text-danger small fw-bold">Pillar 3: User Freedom & Safety</li>
            <li><a class="dropdown-item <?= $currentSlug === 'modal-escape-missing' ? 'active' : '' ?>" href="<?= $basePath ?>tests/modal-escape-missing.php">8. Modal Escape Missing</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'destructive-unconfirmed' ? 'active' : '' ?>" href="<?= $basePath ?>tests/destructive-unconfirmed.php">9. Destructive Action Unconfirmed</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-header text-uppercase text-warning small fw-bold">Pillar 4: Ethical UX</li>
            <li><a class="dropdown-item <?= $currentSlug === 'prechecked-consent' ? 'active' : '' ?>" href="<?= $basePath ?>tests/prechecked-consent.php">10. Prechecked Consent</a></li>
            <li><a class="dropdown-item <?= $currentSlug === 'confirmshaming' ? 'active' : '' ?>" href="<?= $basePath ?>tests/confirmshaming.php">11. Confirmshaming</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-info" href="#" id="suiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-collection-fill me-1"></i> Testbed Suite
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="suiteDropdown">
            <li class="dropdown-header text-uppercase small fw-bold text-white-50">Testbed Family Ecosystem</li>
            <li><a class="dropdown-item" href="https://inaccessible.andrewwestley.co.uk/" target="_blank" rel="noopener"><i class="bi bi-universal-access text-primary me-2"></i>Accessibility Testbed (WCAG 2.2)</a></li>
            <li><a class="dropdown-item" href="https://coga-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-person-fill-check text-info me-2"></i>COGA Cognitive Testbed</a></li>
            <li><a class="dropdown-item" href="https://content-testbed.andrewwestley.co.uk" target="_blank" rel="noopener"><i class="bi bi-file-earmark-text-fill text-warning me-2"></i>Content &amp; Readability Testbed</a></li>
            <li><a class="dropdown-item active" href="<?= $basePath ?>index.php"><i class="bi bi-speedometer2 text-danger me-2"></i>UX &amp; Heuristics Testbed</a></li>
          </ul>
        </li>
      </ul>
      
      <div class="d-flex align-items-center gap-2">
        <a href="<?= $basePath ?>tests/inputmode-missing.php" class="btn btn-sm btn-outline-info">
          <i class="bi bi-play-circle-fill me-1"></i> Start Crawler Route
        </a>
      </div>
    </div>
  </div>
</nav>
