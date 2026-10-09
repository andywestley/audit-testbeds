<?php
$currentSlug = 'prechecked-consent';
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
              This checkout screen utilizes <strong>pre-ticked checkboxes (<code>checked="checked"</code>)</strong> for promotional marketing and paid warranties. This deceptive dark pattern violates EU GDPR Article 4(11) and FTC deceptive advertising guidelines.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-check-square-fill text-danger me-1"></i> Pre-Ticked Dark Pattern</span>
                <span class="badge bg-danger-subtle text-danger">Non-Compliant Default Opt-in</span>
              </div>

              <!-- FAILING PRECHECKED CONSENT -->
              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Order processed with pre-ticked add-ons and newsletter consent!', 'danger');" class="p-3 bg-white rounded border border-danger-subtle mb-3">
                <h6 class="fw-bold mb-3">Order Add-ons &amp; Preferences</h6>

                <div class="form-check mb-3">
                  <input class="form-check-input border-danger" type="checkbox" id="fail_optin_news" name="newsletter_optin" checked="checked">
                  <label class="form-check-label small fw-medium" for="fail_optin_news">
                    Send me daily promotional newsletters and share email with marketing sponsors. <span class="badge bg-danger-subtle text-danger">Pre-checked</span>
                  </label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input border-danger" type="checkbox" id="fail_optin_sms" name="sms_deals" checked>
                  <label class="form-check-label small fw-medium" for="fail_optin_sms">
                    Enroll phone number in auto-dialed promotional SMS blasts. <span class="badge bg-danger-subtle text-danger">Pre-checked</span>
                  </label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input border-danger" type="checkbox" id="fail_optin_ins" name="insurance_addon" checked>
                  <label class="form-check-label small fw-medium" for="fail_optin_ins">
                    Add $4.99/mo premium hardware warranty to my order. <span class="badge bg-danger-subtle text-danger">Pre-checked Paid Add-on</span>
                  </label>
                </div>

                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-credit-card me-1"></i> Complete Checkout ($4.99 added)
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_10">Copy</button>
                <pre id="code_fail_10" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">GDPR &amp; FTC Ethical Standard</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Checkboxes start in an un-selected state (<code>checked</code> omitted). Consent and paid add-ons require a clear, affirmative, informed action by the user.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-shield-check text-success me-1"></i> Explicit Opt-in Architecture</span>
                <span class="badge bg-success-subtle text-success">Affirmative User Choice</span>
              </div>

              <!-- REMEDIATED ETHICAL CONSENT -->
              <form action="#" method="post" onsubmit="event.preventDefault(); showToast('Order processed with genuine explicit consent!', 'success');" class="p-3 bg-white rounded border border-success-subtle mb-3">
                <h6 class="fw-bold mb-3">Order Add-ons &amp; Preferences</h6>

                <div class="form-check mb-3">
                  <input class="form-check-input border-success" type="checkbox" id="fixed_optin_news" name="newsletter_optin">
                  <label class="form-check-label small fw-medium text-dark" for="fixed_optin_news">
                    I would like to receive product updates and release notes via email. <span class="badge bg-light text-muted border">Optional</span>
                  </label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input border-success" type="checkbox" id="fixed_optin_sms" name="sms_deals">
                  <label class="form-check-label small fw-medium text-dark" for="fixed_optin_sms">
                    Send order delivery tracking updates via SMS. <span class="badge bg-light text-muted border">Optional</span>
                  </label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input border-success" type="checkbox" id="fixed_optin_ins" name="insurance_addon">
                  <label class="form-check-label small fw-medium text-dark" for="fixed_optin_ins">
                    Add optional $4.99/mo premium hardware warranty. <span class="badge bg-light text-muted border">Optional Add-on</span>
                  </label>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-credit-card me-1"></i> Complete Order ($0.00 extra)
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_10">Copy</button>
                <pre id="code_remed_10" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
