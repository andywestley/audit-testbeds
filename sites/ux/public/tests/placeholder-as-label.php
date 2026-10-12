<?php
$currentSlug = 'placeholder-as-label';
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
              These inputs lack an associated <code>&lt;label&gt;</code> element and rely solely on the <code>placeholder</code> attribute. As soon as the user enters text, the placeholder disappears, leaving the user with no visual cue to verify what was requested.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-eye-slash me-1"></i> Live Form (No Visible Labels)</span>
                <span class="badge bg-danger-subtle text-danger">Vanishing Label Context</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted (Disappearing placeholders)', 'danger');">
                <div class="mb-3">
                  <input type="text" id="fail_account" name="account_number" class="form-control border-danger-subtle" placeholder="Account Number (8 digits)">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Missing persistent <code>&lt;label&gt;</code></div>
                </div>

                <div class="mb-3">
                  <input type="text" id="fail_sort" name="sort_code" class="form-control border-danger-subtle" placeholder="Sort Code (XX-XX-XX)">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Missing persistent <code>&lt;label&gt;</code></div>
                </div>

                <div class="mb-3">
                  <input type="text" id="fail_ref" name="reference" class="form-control border-danger-subtle" placeholder="Payment Reference (Max 18 chars)">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Context vanishes on keystroke</div>
                </div>

                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-send me-1"></i> Test Submit
                </button>
              </form>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_placeholder">Copy</button>
                <pre id="code_fail_placeholder" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Complies with NN/g Guideline</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Equipped with persistent Bootstrap floating labels. The field description remains permanently visible above or inside the control even after the user enters characters, ensuring effortless scanning and verification.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-eye me-1"></i> Live Form (Persistent Floating Labels)</span>
                <span class="badge bg-success-subtle text-success">Permanent Context</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted (Persistent labels)', 'success');">
                <div class="form-floating mb-3">
                  <input type="text" id="fixed_account" name="account_number" class="form-control border-success-subtle" placeholder="12345678">
                  <label for="fixed_account">Account Number (8 digits) <span class="badge bg-success-subtle text-success">Persistent</span></label>
                  <div class="form-text text-success small"><i class="bi bi-check-circle me-1"></i> Label transitions to top on focus</div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" id="fixed_sort" name="sort_code" class="form-control border-success-subtle" placeholder="12-34-56">
                  <label for="fixed_sort">Sort Code (XX-XX-XX) <span class="badge bg-success-subtle text-success">Persistent</span></label>
                  <div class="form-text text-success small"><i class="bi bi-check-circle me-1"></i> Label remains readable when populated</div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" id="fixed_ref" name="reference" class="form-control border-success-subtle" placeholder="Invoice #4021">
                  <label for="fixed_ref">Payment Reference (Max 18 chars)</label>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-check2 me-1"></i> Submit Payment
                </button>
              </form>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Compliant DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fixed_placeholder">Copy</button>
                <pre id="code_fixed_placeholder" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
