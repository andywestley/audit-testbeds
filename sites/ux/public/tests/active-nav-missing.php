<?php
$currentSlug = 'active-nav-missing';
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
              This primary navigation bar contains 5 navigation links, but <strong>NONE of the links have <code>class="active"</code>, <code>class="current"</code>, or <code>aria-current="page"</code></strong>. Users and screen readers receive zero wayfinding feedback indicating which page is currently open.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-compass me-1"></i> Simulated Current Route: <code>/reports</code></span>
                <span class="badge bg-danger-subtle text-danger">No Active State</span>
              </div>

              <!-- FAILING NAVBAR TRIGGER (4+ links, none with active/current/aria-current) -->
              <div class="border rounded p-3 bg-white mb-3">
                <div class="small text-muted mb-2 fw-bold text-uppercase">Failing Primary Navigation:</div>
                <nav class="navbar navbar-expand-md bg-light rounded border px-3">
                  <div class="container-fluid">
                    <span class="navbar-brand text-muted fs-6">Enterprise Portal</span>
                    <div class="navbar-nav flex-row gap-2">
                      <a class="nav-link text-secondary px-2" href="/dashboard">Dashboard</a>
                      <a class="nav-link text-secondary px-2" href="/reports">Reports</a>
                      <a class="nav-link text-secondary px-2" href="/analytics">Analytics</a>
                      <a class="nav-link text-secondary px-2" href="/settings">Settings</a>
                      <a class="nav-link text-secondary px-2" href="/billing">Billing</a>
                    </div>
                  </div>
                </nav>
              </div>

              <div class="alert alert-danger py-2 small mb-0">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> <strong>Wayfinding Defect:</strong> All 5 navigation links look identical. The user cannot discern their current location in the application hierarchy.
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Triggering DOM Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_fail_4">Copy</button>
                <pre id="code_fail_4" class="mb-0"><code><?= htmlspecialchars($currentTest['failing_snippet']) ?></code></pre>
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
            <span class="badge bg-success text-white">NN/g Wayfinding Standard</span>
          </div>

          <div class="card-body d-flex flex-column">
            <p class="text-muted small mb-3">
              The active item is explicitly distinguished with <code>aria-current="page"</code>, high-contrast visual highlighting (<code>class="active"</code>), and clear visual hierarchy.
            </p>

            <div class="sandbox-canvas mb-4 flex-grow-0">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold small text-secondary"><i class="bi bi-geo-alt-fill text-success me-1"></i> Simulated Current Route: <code>/reports</code></span>
                <span class="badge bg-success-subtle text-success">aria-current="page" Active</span>
              </div>

              <!-- REMEDIATED NAVBAR -->
              <div class="border rounded p-3 bg-white mb-3">
                <div class="small text-muted mb-2 fw-bold text-uppercase">Remediated Primary Navigation:</div>
                <nav class="navbar navbar-expand-md bg-dark navbar-dark rounded border px-3">
                  <div class="container-fluid">
                    <span class="navbar-brand fs-6">Enterprise Portal</span>
                    <div class="navbar-nav flex-row gap-2">
                      <a class="nav-link px-2" href="/dashboard">Dashboard</a>
                      <a class="nav-link active px-2 bg-primary rounded text-white" aria-current="page" href="/reports">Reports</a>
                      <a class="nav-link px-2" href="/analytics">Analytics</a>
                      <a class="nav-link px-2" href="/settings">Settings</a>
                      <a class="nav-link px-2" href="/billing">Billing</a>
                    </div>
                  </div>
                </nav>
              </div>

              <div class="alert alert-success py-2 small mb-0">
                <i class="bi bi-check-circle-fill me-1"></i> <strong>Accessible Wayfinding:</strong> Current location is announced to screen readers via <code>aria-current="page"</code> and clearly highlighted to sighted users.
              </div>
            </div>

            <div class="mt-auto">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-muted"><i class="bi bi-code-slash me-1"></i> Remediated Markup</span>
              </div>
              <div class="code-preview">
                <button class="btn btn-sm btn-outline-light code-copy-btn" data-target="code_remed_4">Copy</button>
                <pre id="code_remed_4" class="mb-0"><code><?= htmlspecialchars($currentTest['remediated_snippet']) ?></code></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
