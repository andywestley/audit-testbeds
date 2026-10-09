<?php
$pageTitle = 'Inaccessible - WCAG 2.2 Benchmark Testbed';
$basePath = '';
$fluidContainer = true;

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';

$totalCriteria = count($testPages);
?>

<div class="py-2">
  <div class="container-fluid px-0">
    <!-- Hero Banner -->
    <div class="p-4 p-md-5 mb-4 rounded-3 bg-dark text-white border border-secondary border-opacity-25 shadow-sm">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge bg-primary px-3 py-1">W3C WCAG 2.2 Suite</span>
            <span class="badge bg-secondary">Benchmark Harness v2.0</span>
          </div>
          <h1 class="display-6 fw-bold">Inaccessible Web Accessibility Testbed</h1>
          <p class="lead text-light text-opacity-75 mb-4">
            A comprehensive reference environment engineered with intentional WCAG 2.2 violations (Level A, AA, and AAA) designed to benchmark automated accessibility scanners, browser extensions, and manual audit heuristics.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="images.php" class="btn btn-primary btn-lg shadow-sm">
              <i class="bi bi-play-circle-fill me-2"></i> Start WCAG Crawler Route
            </a>
            <a href="#matrixTableContainer" class="btn btn-outline-light btn-lg">
              <i class="bi bi-table me-2"></i> Jump to Criteria Matrix
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row g-3">
            <div class="col-6">
              <div class="p-3 bg-secondary bg-opacity-25 rounded-3 border border-secondary border-opacity-50 text-center">
                <div class="display-6 fw-bold text-white">88</div>
                <div class="text-white-50 small text-uppercase">Total Criteria</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-danger bg-opacity-25 rounded-3 border border-danger border-opacity-50 text-center">
                <div class="display-6 fw-bold text-danger">32</div>
                <div class="text-white-50 small text-uppercase">Level A (Critical)</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-warning bg-opacity-25 rounded-3 border border-warning border-opacity-50 text-center">
                <div class="display-6 fw-bold text-warning">33</div>
                <div class="text-white-50 small text-uppercase">Level AA (Standard)</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-info bg-opacity-25 rounded-3 border border-info border-opacity-50 text-center">
                <div class="display-6 fw-bold text-info">23</div>
                <div class="text-white-50 small text-uppercase">Level AAA (Enhanced)</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 4 POUR Principles Grid -->
    <div class="row g-3 mb-4">
      <?php foreach ($pillars as $pKey => $pData): 
        $matching = array_filter($testPages, fn($t) => $t['pillar'] === $pKey);
      ?>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="badge bg-<?= $pData['color'] ?>-subtle text-<?= $pData['color'] ?> fs-6 p-2 rounded-2">
                  <i class="<?= $pData['icon'] ?>"></i>
                </div>
                <span class="badge bg-light text-dark border"><?= count($matching) ?> Test Suites</span>
              </div>
              <h5 class="card-title fw-bold mb-1"><?= htmlspecialchars($pData['name']) ?></h5>
              <div class="text-muted small mb-2 fw-medium"><?= htmlspecialchars($pData['standard']) ?></div>
              <p class="card-text text-secondary small"><?= htmlspecialchars($pData['description']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Interactive WCAG Matrix Controls -->
    <div id="matrixTableContainer" class="card border-0 shadow-sm mb-4">
      <div class="card-header bg-white py-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
          <h2 class="h5 fw-bold mb-0"><i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>WCAG 2.2 Criteria &amp; Violation Pages</h2>
          <small class="text-muted">Interactive directory mapping WCAG success criteria to dedicated test pages.</small>
        </div>

        <div class="d-flex flex-wrap gap-2">
          <div class="input-group input-group-sm" style="width: 260px;">
            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
            <input type="text" id="searchCriteria" class="form-control" placeholder="Filter by criterion or keyword...">
          </div>

          <select id="filterLevel" class="form-select form-select-sm" style="width: 170px;">
            <option value="all">All Levels (A, AA, AAA)</option>
            <option value="A">Level A (Critical)</option>
            <option value="AA">Level AA (Standard)</option>
            <option value="AAA">Level AAA (Enhanced)</option>
          </select>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover table-matrix mb-0" id="matrixTable">
          <thead>
            <tr>
              <th scope="col" style="width: 70px;">#</th>
              <th scope="col">Test Suite &amp; Primary File</th>
              <th scope="col">Target WCAG Criterion</th>
              <th scope="col">Principle (POUR)</th>
              <th scope="col" style="width: 110px;">Level</th>
              <th scope="col" style="width: 140px;">Benchmark Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($testPages as $tp): 
              $pData = $pillars[$tp['pillar']];
              $sevClass = ($tp['level'] === 'A') ? 'danger' : (($tp['level'] === 'AA') ? 'warning' : 'info');
            ?>
              <tr data-level="<?= $tp['level'] ?>">
                <td class="text-center fw-bold text-muted"><?= $i++ ?></td>
                <td>
                  <a href="<?= $tp['file'] ?>" class="fw-bold text-decoration-none text-dark hover-primary fs-6">
                    <?= htmlspecialchars($tp['name']) ?>
                  </a>
                  <div class="small text-muted font-monospace"><?= htmlspecialchars($tp['file']) ?></div>
                </td>
                <td>
                  <code class="text-primary fw-bold"><?= htmlspecialchars($tp['rule']) ?></code>
                </td>
                <td>
                  <span class="badge bg-<?= $pData['color'] ?>-subtle text-<?= $pData['color'] ?>">
                    <i class="<?= $pData['icon'] ?> me-1"></i> <?= htmlspecialchars($pData['name']) ?>
                  </span>
                </td>
                <td>
                  <span class="badge bg-<?= $sevClass ?>-subtle text-<?= $sevClass ?> border border-<?= $sevClass ?>-subtle px-2 py-1 fw-bold">
                    Level <?= htmlspecialchars($tp['level']) ?>
                  </span>
                </td>
                <td>
                  <a href="<?= $tp['file'] ?>" class="btn btn-sm btn-outline-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Open Test
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>