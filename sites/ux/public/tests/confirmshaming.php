<?php
$currentSlug = 'confirmshaming';
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
              This modal and banner dialogue employs <strong>confirmshaming</strong>: the dismiss button uses emotionally coercive, guilt-tripping language (<em>"No thanks, I hate saving money and prefer overpaying"</em>) to manipulate users.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-emoji-frown text-danger me-1"></i> Confirmshaming Dark Pattern</span>
                <span class="badge bg-danger-subtle text-danger">Manipulative Copy</span>
              </div>

              <!-- FAILING CONFIRMSHAMING CARD -->
              <div class="card p-4 text-center border-danger-subtle bg-white shadow-sm mb-3">
                <div class="badge bg-danger align-self-center px-3 py-1 mb-2">Exclusive 30% Flash Offer!</div>
                <h5 class="fw-bold text-dark mb-1">Unlock 30% Off Your Entire Cart</h5>
                <p class="small text-muted mb-3">Enter your email to receive our VIP seasonal discount code instantly.</p>
                
                <div class="d-grid gap-2 col-10 mx-auto">
                  <button type="button" class="btn btn-danger fw-bold" onclick="showToast('Discount claimed!', 'danger')">
                    <i class="bi bi-gift-fill me-1"></i> Claim 30% Discount
                  </button>
                  <button type="button" class="confirmshaming-failing-link py-2" onclick="showToast('Confirmshaming link clicked: &quot;I don\'t like saving money&quot;', 'danger')">
                    No thanks, I don't like saving money and prefer paying full price
                  </button>
                  <button type="button" class="confirmshaming-failing-link py-1" onclick="showToast('Confirmshaming link clicked: &quot;I don\'t care about security&quot;', 'danger')">
                    No, I don't care about the security of my personal account
                  </button>
                </div>
              </div>

              <div class="alert alert-danger py-2 small mb-0">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> <strong>Ethical Risk:</strong> Dark pattern designed to induce shame or guilt when exercising user choice.
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_11">Copy</button>
                <pre id="code_fail_11" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">FTC Ethical UX Compliant</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Features neutral, dignified dismiss actions (<em>"No thanks"</em>, <em>"Maybe later"</em>, <em>"Dismiss"</em>) that treat users respectfully without emotional extortion.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-emoji-smile text-success me-1"></i> Respectful Neutral Choice</span>
                <span class="badge bg-success-subtle text-success">Neutral Decline Copy</span>
              </div>

              <!-- REMEDIATED RESPECTFUL CARD -->
              <div class="card p-4 text-center border-success-subtle bg-white shadow-sm mb-3">
                <div class="badge bg-success align-self-center px-3 py-1 mb-2">Exclusive 30% Flash Offer!</div>
                <h5 class="fw-bold text-dark mb-1">Unlock 30% Off Your Entire Cart</h5>
                <p class="small text-muted mb-3">Enter your email to receive our VIP seasonal discount code instantly.</p>
                
                <div class="d-grid gap-2 col-10 mx-auto">
                  <button type="button" class="btn btn-success fw-bold" onclick="showToast('Discount claimed respectfully!', 'success')">
                    <i class="bi bi-gift-fill me-1"></i> Claim 30% Discount
                  </button>
                  <button type="button" class="btn btn-outline-secondary" onclick="showToast('Offer declined neutrally without judgment.', 'primary')">
                    No thanks, continue to checkout
                  </button>
                </div>
              </div>

              <div class="alert alert-success py-2 small mb-0">
                <i class="bi bi-check-circle-fill me-1"></i> <strong>Respectful Architecture:</strong> Users are free to accept or decline offers with equal dignity.
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_11">Copy</button>
                <pre id="code_remed_11" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
