<?php
$currentSlug = 'autocomplete-missing';
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
              This checkout form explicitly disables autofill via <code>autocomplete="off"</code> and omits standard WHATWG autocomplete tokens. Password managers and browser autofill engines cannot prefill address data, causing customer drop-off.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-keyboard me-1"></i> Live Form (No Autofill Support)</span>
                <span class="badge bg-danger-subtle text-danger">autocomplete="off"</span>
              </div>

              <form autocomplete="off" action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted with no autofill metadata', 'danger');">
                <div class="row g-2 mb-2">
                  <div class="col-6">
                    <label for="fail_fname" class="form-label small fw-medium">First Name</label>
                    <input type="text" id="fail_fname" name="first_name" class="form-control border-danger-subtle" placeholder="John">
                  </div>
                  <div class="col-6">
                    <label for="fail_lname" class="form-label small fw-medium">Last Name</label>
                    <input type="text" id="fail_lname" name="last_name" class="form-control border-danger-subtle" placeholder="Doe">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="fail_email" class="form-label small fw-medium">Email Address</label>
                  <input type="email" id="fail_email" name="email" class="form-control border-danger-subtle" placeholder="john.doe@example.com">
                </div>

                <div class="mb-2">
                  <label for="fail_addr" class="form-label small fw-medium">Street Address</label>
                  <input type="text" id="fail_addr" name="street_address" class="form-control border-danger-subtle" placeholder="123 Market St, Suite 400">
                </div>

                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label for="fail_city" class="form-label small fw-medium">City</label>
                    <input type="text" id="fail_city" name="city" class="form-control border-danger-subtle" placeholder="San Francisco">
                  </div>
                  <div class="col-6">
                    <label for="fail_zip" class="form-label small fw-medium">Postal Code</label>
                    <input type="text" id="fail_zip" name="postal_code" class="form-control border-danger-subtle" placeholder="94105">
                  </div>
                </div>

                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-send me-1"></i> Submit Manually
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_2">Copy</button>
                <pre id="code_fail_2" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">WCAG 1.3.5 &amp; Baymard Compliant</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Includes recognized HTML5 <code>autocomplete</code> tokens (<code>given-name</code>, <code>family-name</code>, <code>email</code>, <code>street-address</code>, <code>address-level2</code>, <code>postal-code</code>). 1-click browser autofill works seamlessly.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-magic text-success me-1"></i> Live Form (1-Click Autofill Ready)</span>
                <span class="badge bg-success-subtle text-success">autocomplete="on"</span>
              </div>

              <form autocomplete="on" action="#" method="post" onsubmit="event.preventDefault(); showToast('Form submitted with full autofill tokens!', 'success');">
                <div class="row g-2 mb-2">
                  <div class="col-6">
                    <label for="fixed_fname" class="form-label small fw-medium">First Name</label>
                    <input type="text" id="fixed_fname" name="first_name" autocomplete="given-name" class="form-control border-success-subtle" placeholder="John">
                  </div>
                  <div class="col-6">
                    <label for="fixed_lname" class="form-label small fw-medium">Last Name</label>
                    <input type="text" id="fixed_lname" name="last_name" autocomplete="family-name" class="form-control border-success-subtle" placeholder="Doe">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="fixed_email" class="form-label small fw-medium">Email Address</label>
                  <input type="email" id="fixed_email" name="email" autocomplete="email" class="form-control border-success-subtle" placeholder="john.doe@example.com">
                </div>

                <div class="mb-2">
                  <label for="fixed_addr" class="form-label small fw-medium">Street Address</label>
                  <input type="text" id="fixed_addr" name="street_address" autocomplete="street-address" class="form-control border-success-subtle" placeholder="123 Market St, Suite 400">
                </div>

                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <label for="fixed_city" class="form-label small fw-medium">City</label>
                    <input type="text" id="fixed_city" name="city" autocomplete="address-level2" class="form-control border-success-subtle" placeholder="San Francisco">
                  </div>
                  <div class="col-6">
                    <label for="fixed_zip" class="form-label small fw-medium">Postal Code</label>
                    <input type="text" id="fixed_zip" name="postal_code" autocomplete="postal-code" inputmode="numeric" class="form-control border-success-subtle" placeholder="94105">
                  </div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">
                  <i class="bi bi-check2-all me-1"></i> Submit with Autofill
                </button>
              </form>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_2">Copy</button>
                <pre id="code_remed_2" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
