<?php
$currentSlug = 'g2';
$base_path = '../';

require_once __DIR__ . '/../includes/data.php';

$currentTest = $tests[$currentSlug];
$pageTitle = $currentTest['name'];

require_once __DIR__ . '/../includes/header.php';
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
              <h2 class="h6 fw-bold mb-0 text-danger">Failure Demonstration</h2>
            </div>
            <span class="badge bg-danger text-white">Triggers <?= htmlspecialchars($currentTest['rule']) ?></span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              <?= htmlspecialchars($currentTest['trigger_summary']) ?>
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-x-octagon text-danger me-1"></i> Live Sandbox (Inaccessible Pattern)</span>
                <span class="badge bg-danger-subtle text-danger">COGA Failure Trigger</span>
              </div>

              <!-- Live Interactive Failing Sandbox Trigger -->
              <div class="p-3 bg-white rounded border border-danger-subtle">
                <?= $currentTest['failing_snippet'] ?>
              </div>
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
            <span class="badge bg-success text-white">W3C COGA Compliant</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              Complies with <?= htmlspecialchars($currentTest['citation']) ?>
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-check2-circle text-success me-1"></i> Live Sandbox (Accessible Remediation)</span>
                <span class="badge bg-success-subtle text-success">COGA Remediated</span>
              </div>

              <!-- Live Interactive Remediated Sandbox -->
              <div class="p-3 bg-white rounded border border-success-subtle">
                <?= $currentTest['remediated_snippet'] ?>
              </div>
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