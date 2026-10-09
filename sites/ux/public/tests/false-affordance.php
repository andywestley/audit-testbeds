<?php
$currentSlug = 'false-affordance';
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
              These elements are styled with <code>cursor: pointer</code>, hover shadows, and text underlines, but they are static <code>&lt;div&gt;</code> / <code>&lt;span&gt;</code> tags without <code>href</code>, <code>onclick</code>, or button semantics. They fail keyboard focus and create frustrating "dead clicks".
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-hand-index-thumb text-danger me-1"></i> Dead Clicks Sandbox</span>
                <span class="badge bg-danger text-white">Dead Clicks: <span id="deadClickCount">0</span></span>
              </div>

              <!-- FAILING FALSE AFFORDANCES -->
              <div class="d-flex flex-column gap-3">
                <div class="p-3 bg-white rounded fake-button-affordance" data-element-name="Fake Upgrade Card" style="cursor: pointer; text-decoration: underline;">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h6 class="fw-bold text-primary mb-0"><i class="bi bi-lightning-charge me-1"></i> Upgrade to Pro Plan (False Affordance)</h6>
                      <small class="text-muted">Styled with pointer cursor &amp; underline, but has no href or button role.</small>
                    </div>
                    <span class="badge bg-danger-subtle text-danger">Dead Div</span>
                  </div>
                </div>

                <div class="p-3 bg-white rounded fake-button-affordance" data-element-name="Fake Export Data" style="cursor: pointer; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <span class="fw-bold text-dark"><i class="bi bi-download me-1"></i> Export Quarterly PDF Report</span>
                      <p class="small text-muted mb-0">Hover shows shadow &amp; pointer cursor, but keyboard cannot focus it.</p>
                    </div>
                    <span class="badge bg-danger-subtle text-danger">Dead Span</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_6">Copy</button>
                <pre id="code_fail_6" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Don Norman Affordance Compliance</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              True semantic <code>&lt;button&gt;</code> and <code>&lt;a href="..."&gt;</code> elements with native keyboard focus ring (Tab navigation), <kbd>Enter</kbd> / <kbd>Space</kbd> activation, and real event handlers.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-check2-square text-success me-1"></i> Semantic Focusable Controls</span>
                <span class="badge bg-success-subtle text-success">Keyboard Accessible</span>
              </div>

              <!-- REMEDIATED SEMANTIC CONTROLS -->
              <div class="d-flex flex-column gap-3">
                <button type="button" class="btn btn-primary text-start p-3 d-flex justify-content-between align-items-center shadow-sm" onclick="showToast('Upgrade action successfully triggered!', 'success')">
                  <div>
                    <div class="fw-bold"><i class="bi bi-lightning-charge me-1"></i> Upgrade to Pro Plan (Real Button)</div>
                    <small class="text-white-50">Native button with keyboard focus and active click handler.</small>
                  </div>
                  <span class="badge bg-white text-primary">Live Button</span>
                </button>

                <a href="#export" class="btn btn-outline-dark text-start p-3 d-flex justify-content-between align-items-center" onclick="event.preventDefault(); showToast('Export PDF initiated!', 'success')">
                  <div>
                    <div class="fw-bold"><i class="bi bi-download me-1"></i> Export Quarterly PDF Report (Real Link)</div>
                    <small class="text-muted">Semantic anchor with href and valid ARIA attributes.</small>
                  </div>
                  <span class="badge bg-dark">Live Link</span>
                </a>
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_6">Copy</button>
                <pre id="code_remed_6" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
