<?php
$currentSlug = 'paste-disabled';
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
              These form inputs explicitly intercept and block clipboard paste operations using <code>onpaste="return false;"</code>. This hostile pattern breaks password managers (e.g. 1Password, Bitwarden), prevents pasting complex random passwords, and increases input errors.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-clipboard-x me-1"></i> Live Form (Paste Blocked)</span>
                <span class="badge bg-danger-subtle text-danger">Paste Denied</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted (Paste was blocked)', 'danger');">
                <div class="mb-3">
                  <label for="fail_pwd" class="form-label fw-medium small">Create Secure Password</label>
                  <input type="password" id="fail_pwd" name="pwd" onpaste="return false;" class="form-control border-danger-subtle" placeholder="Try pasting here (Ctrl+V / Cmd+V)">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> <code>onpaste="return false;"</code> is active on this input</div>
                </div>

                <div class="mb-3">
                  <label for="fail_confirm_email" class="form-label fw-medium small">Confirm Email Address</label>
                  <input type="email" id="fail_confirm_email" name="confirm_email" onpaste="return false;" class="form-control border-danger-subtle" placeholder="Paste blocked — forced retyping">
                  <div class="form-text text-danger small"><i class="bi bi-exclamation-circle me-1"></i> Forcing manual re-entry increases typos</div>
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
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_paste">Copy</button>
                <pre id="code_fail_paste" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">Complies with Baymard #881</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Standard clipboard paste operations are completely unhindered. Users can freely paste auto-generated passwords, and browser extensions and password managers can seamlessly autofill credentials without friction.
            </p>

            <!-- Live Sandbox Canvas -->
            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-clipboard-check me-1"></i> Live Form (Paste Enabled)</span>
                <span class="badge bg-success-subtle text-success">Paste Supported</span>
              </div>

              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted (Paste allowed)', 'success');">
                <div class="mb-3">
                  <label for="fixed_pwd" class="form-label fw-medium small">Create Secure Password <span class="badge bg-success-subtle text-success">Optimized</span></label>
                  <input type="password" id="fixed_pwd" name="pwd" class="form-control border-success-subtle" placeholder="Paste generated password freely">
                  <div class="form-text text-success small"><i class="bi bi-check-circle me-1"></i> Native clipboard paste fully allowed</div>
                </div>

                <div class="mb-3">
                  <label for="fixed_email" class="form-label fw-medium small">Email Address <span class="badge bg-success-subtle text-success">Optimized</span></label>
                  <input type="email" id="fixed_email" name="email" autocomplete="email" class="form-control border-success-subtle" placeholder="alex@example.com">
                  <div class="form-text text-success small"><i class="bi bi-check-circle me-1"></i> Supports autofill &amp; paste without redundant confirmation field</div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-check2 me-1"></i> Save Credentials
                </button>
              </form>
            </div>

            <!-- Code Snippet -->
            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Compliant DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fixed_paste">Copy</button>
                <pre id="code_fixed_paste" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
