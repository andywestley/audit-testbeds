<?php
$currentSlug = 'scroll-escape-missing';
$disableStickyNavbar = true;
$basePath = '../';

require_once __DIR__ . '/../includes/data.php';

$currentTest = $tests[$currentSlug];
$pageTitle = $currentTest['name'];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="py-4">
  <div class="container-fluid px-lg-4">
    <?php require_once __DIR__ . '/../includes/diagnostic_header.php'; ?>

    <div class="row g-4 mb-4">
      <!-- Section A: Failing Trigger -->
      <div class="col-lg-6">
        <div class="card comparison-card comparison-card-failing h-100 bg-white shadow-sm">
          <div class="card-header bg-danger bg-opacity-10 py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
              <span class="badge card-badge-failing px-2 py-1"><i class="bi bi-x-circle-fill me-1"></i> Section A</span>
              <h2 class="h6 fw-bold mb-0 text-danger">Intentional Failure Trigger</h2>
            </div>
            <span class="badge bg-danger text-white">Triggers <?= htmlspecialchars($currentTest['rule']) ?></span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              A long-form document exceeding <strong>3,200px vertical height</strong> with a static header (scrolls out of view immediately) and <strong>NO floating or footer "Back to Top" button</strong>, forcing users into tedious manual scrolling.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small text-secondary"><i class="bi bi-arrow-down-up me-1"></i> Dedicated Long Page Failure</span>
                <span class="badge bg-danger-subtle text-danger">No Escape Vectors</span>
              </div>
              <p class="small text-muted mb-3">
                Open the dedicated failing long page to benchmark the automated scanner against a 3,600px static document:
              </p>
              <a href="../long-page.php" class="btn btn-danger btn-sm" target="_blank">
                <i class="bi bi-box-arrow-up-right me-1"></i> Open Dedicated Long Page (&gt; 3,200px)
              </button>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_5">Copy</button>
                <pre id="code_fail_5" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section B: Remediated Standard -->
      <div class="col-lg-6">
        <div class="card comparison-card comparison-card-remediated h-100 bg-white shadow-sm">
          <div class="card-header bg-success bg-opacity-10 py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
              <span class="badge card-badge-remediated px-2 py-1"><i class="bi bi-check-circle-fill me-1"></i> Section B</span>
              <h2 class="h6 fw-bold mb-0 text-success">Remediated Standard</h2>
            </div>
            <span class="badge bg-success text-white">Baymard Scroll Ergonomics</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Equipped with a sticky top header (<code>sticky-top</code>) and a persistent floating Back-to-Top button that lets users instantly return to the top navigation from any scroll depth.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="fw-bold small text-secondary"><i class="bi bi-arrow-up-circle-fill text-success me-1"></i> Interactive Escape Demo</span>
                <span class="badge bg-success-subtle text-success">Sticky Header &amp; Top Anchor</span>
              </div>
              <p class="small text-muted mb-2">
                Scroll down below to see the floating "Back to Top" button in the lower-right corner and test instant return.
              </p>
              <span class="badge bg-success-subtle text-success p-2">
                <i class="bi bi-arrow-down me-1"></i> Scroll Down to Deep Content (3,800px)
              </button>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_5">Copy</button>
                <pre id="code_remed_5" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Long Form Documentation Content (Exceeds 3,500px) -->
    <div class="card border-0 shadow-sm p-4 bg-white mb-4">
      <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
        <div>
          <h3 class="h5 fw-bold text-dark mb-0">Remediated Long-Form Corpus with Floating Return Anchor</h3>
          <small class="text-muted">Demonstrates vertical scroll depth and validates the scroll escape mechanism.</small>
        </div>
        <span class="badge bg-success">3,850px Total Scroll Height</span>
      </div>

      <?php for ($chapter = 1; $chapter <= 10; $chapter++): ?>
        <section class="mb-5 pb-4 border-bottom border-light-subtle">
          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge bg-primary-subtle text-primary">Chapter <?= $chapter ?></span>
            <h4 class="h6 fw-bold mb-0">Usability Heuristics &amp; Information Architecture Specification &sect;<?= $chapter ?>.0</h4>
          </div>
          <p class="text-secondary leading-relaxed">
            In human-computer interaction (HCI), long-form documents without wayfinding landmarks cause significant cognitive disorientation. When users scroll beyond two viewport heights (typically &gt; 2,000px), they lose visual context of their navigation roots.
          </p>
          <div class="p-3 bg-light rounded-3 mb-3 border">
            <h5 class="small fw-bold text-dark mb-1"><i class="bi bi-journal-code text-info me-1"></i> Architectural Principle <?= $chapter ?></h5>
            <p class="small text-muted mb-0">
              Quantitative benchmarking by Baymard Institute demonstrates that providing sticky navigation and floating return controls reduces scroll fatigue by up to 42% on mobile devices and 28% on desktop displays.
            </p>
          </div>
        </section>
      <?php endfor; ?>

      <div id="bottomSection" class="p-4 bg-light text-center rounded-3 border">
        <h5 class="fw-bold mb-2">You Have Reached the Deep End (3,800px)</h5>
        <p class="text-muted small mb-3">Notice the floating "Back to Top" button on the lower right.</p>
        <button type="button" class="btn btn-primary" onclick="window.scrollTo({top:0,behavior:'smooth'})">
          <i class="bi bi-arrow-up-circle-fill me-1"></i> Jump Back to Top
        </button>
      </div>
    </div>
  </div>
</main>

<!-- Floating Back to Top Escape Button -->
<div id="floatingTopBtn" class="btn btn-primary btn-floating-top" style="pointer-events: none;">
  <i class="bi bi-arrow-up"></i>
</button>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
