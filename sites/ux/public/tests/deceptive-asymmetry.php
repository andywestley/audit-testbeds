<?php
$currentSlug = 'deceptive-asymmetry';
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

    <!-- Side by Side Comparison Layout -->
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
              This choice architecture uses extreme visual asymmetry to manipulate decisions. The commercial conversion option (e.g., auto-renew or upgrade) is rendered as a dominant, high-contrast button, while the decline option is disguised as faint, tiny, unstyled gray microcopy.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-ui-checks-grid me-1"></i> Deceptive Choice Architecture</span>
                <span class="badge bg-danger-subtle text-danger">Visual Interference</span>
              </div>

              <div class="card p-4 text-center border-danger-subtle shadow-sm mb-3">
                <div class="badge bg-danger-subtle text-danger align-self-center mb-2 px-3 py-1">Limited Time Special Offer</div>
                <h4 class="fw-bold">Upgrade to Premium Pro Cloud</h4>
                <p class="text-muted small mb-3">Get unlimited backup retention, enterprise encryption, and 24/7 dedicated telephone support.</p>
                
                <div class="d-grid gap-2 col-md-10 mx-auto">
                  <button class="btn btn-primary btn-lg py-3 shadow fw-bold" onclick="showToast('Upgrade accepted ($14.99/mo)', 'danger');">
                    <i class="bi bi-lightning-charge-fill me-1"></i> Upgrade &amp; Auto-Renew ($14.99/mo)
                  </button>
                  <div class="mt-2">
                    <a href="#" class="asymmetric-decline-link" onclick="event.preventDefault(); showToast('Decline clicked after hunting for faint link', 'warning');">
                      Maybe later, continue on basic free tier
                    </a>
                  </div>
                </div>
              </div>

              <div class="text-danger small">
                <i class="bi bi-exclamation-triangle me-1"></i> <strong>Dark Pattern:</strong> FTC Enforcement classifies disguised, low-contrast decline links as deceptive visual interference.
              </div>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_asymmetry">Copy</button>
                <pre id="code_fail_asymmetry" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Complies with EU DSA &amp; FTC Fair Choice</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Both affirmative and negative choices are presented with equal visual dignity and transparent hierarchy. Users can decline without navigating deceptive visual mazes or struggling to locate hidden text links.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-check2-circle me-1"></i> Balanced Choice Architecture</span>
                <span class="badge bg-success-subtle text-success">Equal Visual Weight</span>
              </div>

              <div class="card p-4 text-center border-success-subtle shadow-sm mb-3">
                <div class="badge bg-success-subtle text-success align-self-center mb-2 px-3 py-1">Transparent Options</div>
                <h4 class="fw-bold">Choose Your Cloud Storage Tier</h4>
                <p class="text-muted small mb-3">Select the plan that matches your current workflow needs.</p>
                
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center col-md-10 mx-auto">
                  <button class="btn btn-outline-secondary px-4 py-2" onclick="showToast('Continued with Basic Free Plan', 'info');">
                    Keep Basic Free Plan
                  </button>
                  <button class="btn btn-primary px-4 py-2 fw-semibold" onclick="showToast('Upgraded to Premium Pro Plan', 'success');">
                    <i class="bi bi-check2 me-1"></i> Upgrade Now ($14.99/mo)
                  </button>
                </div>
              </div>

              <div class="text-success small">
                <i class="bi bi-check-circle me-1"></i> <strong>Ethical Design:</strong> Both options use standard button styles with clear, symmetrical contrast and equal tap targets.
              </div>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Compliant DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fixed_asymmetry">Copy</button>
                <pre id="code_fixed_asymmetry" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
