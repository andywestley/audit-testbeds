<?php
$currentSlug = 'password-toggle-missing';
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
              This password input is permanently masked with bullet dots. Users typing long or complex passwords on mobile touch screens cannot inspect their entry, increasing login errors and password reset friction.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-lock me-1"></i> Masked Password (No Toggle)</span>
                <span class="badge bg-danger-subtle text-danger">No Reveal Button</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Password submitted (Masked without review)', 'danger');">
                <div class="mb-3">
                  <label for="fail_user" class="form-label small fw-medium">Username / Email</label>
                  <input type="text" id="fail_user" class="form-control" value="sarah.connor@example.com">
                </div>

                <div class="mb-3">
                  <label for="fail_pwd" class="form-label small fw-medium">Account Password</label>
                  <input type="password" id="fail_pwd" name="password" class="form-control border-danger-subtle" value="CyberdyneSystems!2029#">
                  <div class="form-text text-danger small"><i class="bi bi-eye-slash-fill me-1"></i> Missing show/hide visibility toggle</div>
                </div>

                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_3">Copy</button>
                <pre id="code_fail_3" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">NN/g Usability Recommendation</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Equipped with an accessible visibility toggle button containing <code>aria-label</code> and <code>aria-controls</code>. Users can quickly unmask the password to catch typographical mistakes before submitting.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-shield-lock-fill text-success me-1"></i> Accessible Toggle Sandbox</span>
                <span class="badge bg-success-subtle text-success">Interactive Show/Hide</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Password submitted with verified entry!', 'success');">
                <div class="mb-3">
                  <label for="fixed_user" class="form-label small fw-medium">Username / Email</label>
                  <input type="text" id="fixed_user" class="form-control" value="sarah.connor@example.com">
                </div>

                <div class="mb-3">
                  <label for="fixed_pwd" class="form-label small fw-medium">Account Password</label>
                  <div class="input-group">
                    <input type="password" id="fixed_pwd" name="password" class="form-control border-success-subtle" value="CyberdyneSystems!2029#">
                    <button class="btn btn-outline-secondary" type="button" id="pwdToggleBtn" aria-label="Show password" aria-controls="fixed_pwd" onclick="togglePasswordVisibility('fixed_pwd', this)">
                      <i class="bi bi-eye" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div class="form-text text-success small"><i class="bi bi-check2-circle me-1"></i> Click the eye icon to toggle masking</div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-box-arrow-in-right me-1"></i> Sign In Confidently
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_3">Copy</button>
                <pre id="code_remed_3" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
