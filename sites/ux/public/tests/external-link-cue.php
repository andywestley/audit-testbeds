<?php
$currentSlug = 'external-link-cue';
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

    <div class="row g-4">
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
              These external links open in a new tab via <code>target="_blank"</code>, but have <strong>no visual outbound cue icon</strong> and no screen reader notification. Users clicking them are suddenly disoriented by unexpected browser tab creation.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-link-45deg me-1"></i> Silent External Links</span>
                <span class="badge bg-danger-subtle text-danger">No Outbound Cue</span>
              </div>

              <!-- FAILING EXTERNAL LINKS -->
              <div class="p-3 bg-white rounded border mb-3">
                <p class="mb-2">
                  For full API guidelines, please visit the 
                  <a href="https://example.com/developer/docs" target="_blank" class="text-danger fw-medium">Developer Portal Documentation</a>.
                </p>
                <p class="mb-2">
                  Review our partner terms at 
                  <a href="https://example.org/legal/partner-terms" target="_blank" class="text-danger fw-medium">Global Cloud Services</a>.
                </p>
                <p class="mb-0 text-muted small">
                  <i class="bi bi-exclamation-circle me-1"></i> Both links spawn new tabs silently without warning icons or aria cues.
                </p>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_7">Copy</button>
                <pre id="code_fail_7" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">WCAG G201 Compliant</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Features standard outbound icons (<code>bi-box-arrow-up-right</code>), <code>rel="noopener noreferrer"</code> for security, and accessible screen reader text <code>(opens in a new tab)</code>.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-box-arrow-up-right text-success me-1"></i> Explicit Outbound Links</span>
                <span class="badge bg-success-subtle text-success">Visual &amp; ARIA Cues</span>
              </div>

              <!-- REMEDIATED EXTERNAL LINKS -->
              <div class="p-3 bg-white rounded border mb-3">
                <p class="mb-2">
                  For full API guidelines, please visit the 
                  <a href="https://example.com/developer/docs" target="_blank" rel="noopener noreferrer" class="link-primary fw-medium d-inline-flex align-items-center gap-1" aria-label="Developer Portal Documentation (opens in a new tab)">
                    Developer Portal Documentation
                    <i class="bi bi-box-arrow-up-right small text-muted" aria-hidden="true"></i>
                    <span class="visually-hidden">(opens in a new tab)</span>
                  </a>.
                </p>
                <p class="mb-2">
                  Review our partner terms at 
                  <a href="https://example.org/legal/partner-terms" target="_blank" rel="noopener noreferrer" class="link-primary fw-medium d-inline-flex align-items-center gap-1" aria-label="Global Cloud Services (opens in a new tab)">
                    Global Cloud Services
                    <i class="bi bi-box-arrow-up-right small text-muted" aria-hidden="true"></i>
                    <span class="visually-hidden">(opens in a new tab)</span>
                  </a>.
                </p>
                <p class="mb-0 text-success small">
                  <i class="bi bi-check2-circle me-1"></i> Clear visual signifier icon informs sighted users, and screen readers announce new tab launch.
                </p>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_7">Copy</button>
                <pre id="code_remed_7" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
