<?php
$currentSlug = 'target-touch-size';
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
              These interactive links and buttons have bounding dimensions of only 18×18px with just 1px of spacing. On touchscreen devices, the human finger pad covers approximately 44×44px, causing frustrating mis-taps, accidental deletions, or dead clicks.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-hand-index-thumb me-1"></i> Sub-Standard Touch Targets (&lt;24px)</span>
                <span class="badge bg-danger-subtle text-danger">18×18px Hit Zone</span>
              </div>

              <div class="p-3 bg-light rounded border border-danger-subtle mb-3">
                <div class="small fw-bold text-muted mb-2">Customer Order #49201 Actions:</div>
                <div class="d-flex align-items-center gap-1">
                  <a href="#" class="tiny-touch-target" title="Page 1" onclick="event.preventDefault(); showToast('Tapped page 1 (Small target)', 'warning');">1</a>
                  <a href="#" class="tiny-touch-target" title="Page 2" onclick="event.preventDefault(); showToast('Tapped page 2 (Small target)', 'warning');">2</a>
                  <a href="#" class="tiny-touch-target" title="Page 3" onclick="event.preventDefault(); showToast('Tapped page 3 (Small target)', 'warning');">3</a>
                  <a href="#" class="tiny-touch-target" title="Edit" onclick="event.preventDefault(); showToast('Tapped Edit', 'info');">✎</a>
                  <a href="#" class="tiny-touch-target text-danger" title="Delete" onclick="event.preventDefault(); showToast('ACCIDENTAL TAP: Deleted record!', 'danger');">✕</a>
                </div>
                <div class="text-danger small mt-2">
                  <i class="bi bi-exclamation-triangle me-1"></i> Targets are under 24×24px and clustered &lt;8px apart
                </div>
              </div>

              <p class="small text-muted mb-0">
                Notice how easily a finger on a mobile touchscreen hits the red <strong>Delete</strong> button when trying to tap <strong>Page 3</strong> or <strong>Edit</strong>.
              </p>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_touch">Copy</button>
                <pre id="code_fail_touch" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Complies with Apple HIG &amp; WCAG 2.5.8</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Interactive controls are designed with generous minimum 44×44px bounding hit areas and comfortable 8px+ spacing. Even on small screens, every finger tap lands accurately on its intended target.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-hand-index-thumb-fill me-1"></i> Touch-Friendly Ergonomics (&ge;44px)</span>
                <span class="badge bg-success-subtle text-success">&ge;44×44px Hit Zone</span>
              </div>

              <div class="p-3 bg-light rounded border border-success-subtle mb-3">
                <div class="small fw-bold text-muted mb-2">Customer Order #49201 Actions:</div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                  <nav aria-label="Order pagination">
                    <ul class="pagination mb-0">
                      <li class="page-item active"><a class="page-link min-touch-target" href="#" onclick="event.preventDefault(); showToast('Selected Page 1', 'success');">1</a></li>
                      <li class="page-item"><a class="page-link min-touch-target" href="#" onclick="event.preventDefault(); showToast('Selected Page 2', 'success');">2</a></li>
                      <li class="page-item"><a class="page-link min-touch-target" href="#" onclick="event.preventDefault(); showToast('Selected Page 3', 'success');">3</a></li>
                    </ul>
                  </nav>

                  <button class="btn btn-outline-secondary min-touch-target px-3" onclick="showToast('Edit mode opened', 'info');">
                    <i class="bi bi-pencil me-1"></i> Edit
                  </button>
                  <button class="btn btn-outline-danger min-touch-target px-3" onclick="showToast('Delete dialog prompted', 'warning');">
                    <i class="bi bi-trash me-1"></i> Delete
                  </button>
                </div>
                <div class="text-success small mt-2">
                  <i class="bi bi-check-circle me-1"></i> Ample touch clearance eliminates accidental mis-taps
                </div>
              </div>

              <p class="small text-muted mb-0">
                Each button meets the 44×44px touch target guideline with dedicated visual margin.
              </p>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Compliant DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fixed_touch">Copy</button>
                <pre id="code_fixed_touch" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
