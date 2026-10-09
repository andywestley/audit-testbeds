<?php
$currentSlug = 'modal-escape-missing';
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
              This modal dialog is rendered open in the DOM without <strong>any close button (no <code>.btn-close</code>, no <code>.close</code>)</strong>, without <code>data-bs-dismiss="modal"</code>, and without <code>aria-label="close"</code>, violating NN/g Heuristic #3 (User Control &amp; Freedom).
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-shield-slash text-danger me-1"></i> Trapped Modal (Initial DOM Load)</span>
                <span class="badge bg-danger-subtle text-danger">No Close Mechanism</span>
              </div>

              <!-- FAILING OPEN MODAL DIRECTLY IN DOM -->
              <div class="modal show" style="display: block; position: relative; z-index: 1;">
                <div class="modal-dialog m-0">
                  <div class="modal-content border-danger shadow-sm">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title h6 mb-0"><i class="bi bi-lock-fill me-2"></i>Trapped Modal (No Close Button)</h5>
                      <!-- Intentional omission of button.btn-close, button.close, data-bs-dismiss="modal", aria-label="close" -->
                    </div>
                    <div class="modal-body p-3">
                      <p class="text-danger fw-bold small mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> User Escape Blocked:</p>
                      <p class="text-muted small mb-0">
                        This modal renders in the DOM without any close button (<code>.btn-close</code>), ignores Escape key dismiss, and has no dismiss attributes.
                      </p>
                    </div>
                    <div class="modal-footer p-2 bg-light">
                      <button type="button" class="btn btn-sm btn-secondary disabled" disabled>Confirm Action</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_8">Copy</button>
                <pre id="code_fail_8" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">NN/g User Freedom Compliant</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Complies with NN/g Heuristic #3 (User Control &amp; Freedom) and W3C WAI-ARIA Modal pattern: provides a clear <code>.btn-close</code>, responds to <kbd>Escape</kbd>, and closes on backdrop click.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-shield-check text-success me-1"></i> Accessible Modal Demo</span>
                <span class="badge bg-success-subtle text-success">Multiple Escape Vectors</span>
              </div>

              <div class="p-3 bg-white rounded border mb-3">
                <p class="small text-muted mb-2">Click to open the accessible modal with standard close button, backdrop click, and Escape key:</p>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#accessibleModalDemo">
                  <i class="bi bi-box-arrow-up-right me-1"></i> Launch Accessible Modal
                </button>
              </div>

              <!-- Static Representation within Sandbox -->
              <div class="border border-success rounded p-3 bg-light">
                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom border-success-subtle">
                  <span class="fw-bold small text-success"><i class="bi bi-check-circle-fill me-1"></i> Accessible Modal Header</span>
                  <button type="button" class="btn-close" disabled aria-label="Close"></button>
                </div>
                <div class="py-2 small text-muted">
                  Includes top close button, footer cancel button, and keyboard escape.
                </div>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_8">Copy</button>
                <pre id="code_remed_8" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- REMEDIATED ACCESSIBLE MODAL -->
<div class="modal fade" id="accessibleModalDemo" tabindex="-1" role="dialog" aria-labelledby="accLabel" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accLabel"><i class="bi bi-check-circle-fill text-success me-2"></i>Accessible Modal Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">This modal is fully compliant with usability and accessibility guidelines.</p>
        <ul class="small text-muted mb-0">
          <li>Press <kbd>Escape</kbd> to close anytime.</li>
          <li>Click outside in the backdrop to close.</li>
          <li>Click the top-right <kbd>&times;</kbd> close icon.</li>
          <li>Click the footer "Cancel" button.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Acknowledge</button>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
