<?php
$currentSlug = 'inputmode-missing';
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
              These numeric, telephone, and payment fields omit <code>inputmode="numeric"</code> or <code>inputmode="tel"</code>. On mobile touch screens (iOS/Android), browsers default to the full standard alphanumeric QWERTY keyboard instead of a convenient 10-key numeric pad.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-phone me-1"></i> Live Form (Unoptimized Touch Input)</span>
                <span class="badge bg-danger-subtle text-danger">QWERTY Keyboard Mode</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted (Unoptimized mobile inputmode)', 'danger');">
                <div class="mb-3">
                  <label for="failing_phone" class="form-label fw-medium small">Customer Phone Number</label>
                  <input type="text" id="failing_phone" name="phone" class="form-control border-danger-subtle" placeholder="e.g. 555-0199">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Lacks <code>inputmode="tel"</code></div>
                </div>

                <div class="mb-3">
                  <label for="failing_card" class="form-label fw-medium small">Credit Card Number</label>
                  <input type="text" id="failing_card" name="card_number" class="form-control border-danger-subtle" placeholder="4532 0000 0000 0000">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Lacks <code>inputmode="numeric"</code></div>
                </div>

                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label for="failing_zip" class="form-label fw-medium small">ZIP / Postal Code</label>
                    <input type="text" id="failing_zip" name="zipcode" class="form-control border-danger-subtle" placeholder="90210">
                  </div>
                  <div class="col-6">
                    <label for="failing_cvv" class="form-label fw-medium small">CVV Security Code</label>
                    <input type="text" id="failing_cvv" name="security_code" class="form-control border-danger-subtle" placeholder="123">
                  </div>
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
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_1">Copy</button>
                <pre id="code_fail_1" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Complies with Baymard Standard</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Equipped with explicit <code>inputmode="numeric"</code>, <code>inputmode="tel"</code>, and <code>pattern="[0-9]*"</code>. Touch devices instantly launch the specialized telephone or numeric dialpad with large, tap-friendly digits.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-phone-fill text-success me-1"></i> Live Form (Optimized Touch Keypads)</span>
                <span class="badge bg-success-subtle text-success">10-Key Dialpad Mode</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted with compliant inputmode ergonomics!', 'success');">
                <div class="mb-3">
                  <label for="fixed_phone" class="form-label fw-medium small">
                    Customer Phone Number <span class="badge bg-success-subtle text-success ms-1">inputmode="tel"</span>
                  </label>
                  <input type="tel" id="fixed_phone" name="phone" inputmode="tel" autocomplete="tel" class="form-control border-success-subtle" placeholder="e.g. 555-0199">
                  <div class="form-text text-success small"><i class="bi bi-check2-circle me-1"></i> Automatically triggers telephone keypad</div>
                </div>

                <div class="mb-3">
                  <label for="fixed_card" class="form-label fw-medium small">
                    Credit Card Number <span class="badge bg-success-subtle text-success ms-1">inputmode="numeric"</span>
                  </label>
                  <input type="text" id="fixed_card" name="card_number" inputmode="numeric" pattern="[0-9]*" autocomplete="cc-number" class="form-control border-success-subtle" placeholder="4532 0000 0000 0000">
                  <div class="form-text text-success small"><i class="bi bi-check2-circle me-1"></i> Triggers 10-key numeric pad</div>
                </div>

                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label for="fixed_zip" class="form-label fw-medium small">ZIP / Postal Code</label>
                    <input type="text" id="fixed_zip" name="zipcode" inputmode="numeric" autocomplete="postal-code" class="form-control border-success-subtle" placeholder="90210">
                  </div>
                  <div class="col-6">
                    <label for="fixed_cvv" class="form-label fw-medium small">CVV Security Code</label>
                    <input type="password" id="fixed_cvv" name="security_code" inputmode="numeric" pattern="[0-9]*" maxlength="4" autocomplete="cc-csc" class="form-control border-success-subtle" placeholder="123">
                  </div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-check2-all me-1"></i> Test Submit
                </button>
              </form>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_1">Copy</button>
                <pre id="code_remed_1" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
