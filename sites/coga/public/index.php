<?php
$pageTitle = 'COGA Cognitive Accessibility Testbed Matrix';
$base_path = '';
$currentSlug = '';

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';

$totalTests = count($tests);
$errorCount = count(array_filter($tests, fn($t) => strtolower($t['severity']) === 'error'));
$warningCount = count(array_filter($tests, fn($t) => strtolower($t['severity']) === 'warning'));
$infoCount = count(array_filter($tests, fn($t) => strtolower($t['severity']) === 'info'));
?>

<main class="py-4">
  <div class="container-fluid px-lg-4">
    <!-- Hero Banner -->
    <div class="p-4 p-md-5 mb-4 rounded-3 bg-dark text-white border border-secondary border-opacity-25 shadow-sm">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge bg-info text-dark px-3 py-1">W3C Cognitive Accessibility Taskforce</span>
            <span class="badge bg-secondary">Benchmark Suite v2.0</span>
          </div>
          <h1 class="display-6 fw-bold">COGA Cognitive Accessibility Benchmark Testbed</h1>
          <p class="lead text-light text-opacity-75 mb-4">
            A dedicated reference testbed engineered to benchmark cognitive accessibility heuristics across all 8 W3C COGA guidelines. Demonstrates failing cognitive load triggers alongside clear, human-centered accessible patterns.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="guidelines/g1.php" class="btn btn-info btn-lg shadow-sm text-dark fw-bold">
              <i class="bi bi-play-circle-fill me-2"></i> Start COGA Benchmark (Test All)
            </a>
            <a href="#matrixTableContainer" class="btn btn-outline-light btn-lg">
              <i class="bi bi-table me-2"></i> Jump to Matrix
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row g-3">
            <div class="col-6">
              <div class="p-3 bg-secondary bg-opacity-25 rounded-3 border border-secondary border-opacity-50 text-center">
                <div class="display-6 fw-bold text-white"><?= $totalTests ?></div>
                <div class="text-white-50 small text-uppercase">Guidelines</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-danger bg-opacity-25 rounded-3 border border-danger border-opacity-50 text-center">
                <div class="display-6 fw-bold text-danger"><?= $errorCount ?></div>
                <div class="text-white-50 small text-uppercase">Critical Traps</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-warning bg-opacity-25 rounded-3 border border-warning border-opacity-50 text-center">
                <div class="display-6 fw-bold text-warning"><?= $warningCount ?></div>
                <div class="text-white-50 small text-uppercase">Warnings</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-info bg-opacity-25 rounded-3 border border-info border-opacity-50 text-center">
                <div class="display-6 fw-bold text-info"><?= $infoCount ?></div>
                <div class="text-white-50 small text-uppercase">Informational</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 4 Pillars Grid -->
    <div class="row g-3 mb-4">
      <?php foreach ($pillars as $pKey => $pData): 
        $pillarTests = array_filter($tests, fn($t) => $t['pillar'] === $pKey);
      ?>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="badge bg-<?= $pData['color'] ?>-subtle text-<?= $pData['color'] ?> fs-6 p-2 rounded-2">
                  <i class="<?= $pData['icon'] ?>"></i>
                </div>
                <span class="badge bg-light text-dark border"><?= count($pillarTests) ?> Guidelines</span>
              </div>
              <h5 class="card-title fw-bold mb-1"><?= htmlspecialchars($pData['name']) ?></h5>
              <div class="text-muted small mb-2 fw-medium"><?= htmlspecialchars($pData['standard']) ?></div>
              <p class="card-text text-secondary small"><?= htmlspecialchars($pData['description']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Matrix Table Controls -->
    <div id="matrixTableContainer" class="card border-0 shadow-sm mb-4">
      <div class="card-header bg-white py-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
          <h2 class="h5 fw-bold mb-0"><i class="bi bi-grid-3x3-gap-fill text-info me-2"></i>COGA Guidelines Matrix</h2>
          <small class="text-muted">Interactive catalog mapping each COGA guideline to its dedicated benchmark test page.</small>
        </div>

        <div class="d-flex flex-wrap gap-2">
          <div class="input-group input-group-sm" style="width: 260px;">
            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
            <input type="text" id="searchRules" class="form-control" placeholder="Filter by guideline...">
          </div>

          <select id="filterPillar" class="form-select form-select-sm" style="width: 200px;">
            <option value="all">All Pillars (4)</option>
            <?php foreach ($pillars as $pKey => $pData): ?>
              <option value="<?= $pKey ?>"><?= htmlspecialchars($pData['name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover table-matrix mb-0" id="matrixTable">
          <thead>
            <tr>
              <th scope="col" style="width: 60px;">#</th>
              <th scope="col">Guideline &amp; Rule Code</th>
              <th scope="col">Pillar &amp; W3C Citation</th>
              <th scope="col" style="width: 120px;">Severity</th>
              <th scope="col" style="width: 140px;">Benchmark Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($tests as $slug => $test): 
              $pData = $pillars[$test['pillar']];
              $sevClass = strtolower($test['severity']) === 'error' ? 'danger' : (strtolower($test['severity']) === 'warning' ? 'warning' : 'info');
            ?>
              <tr data-pillar="<?= $test['pillar'] ?>">
                <td class="text-center fw-bold text-muted"><?= $i++ ?></td>
                <td>
                  <div class="d-flex flex-column">
                    <a href="guidelines/<?= $test['file'] ?>" class="fw-bold text-decoration-none text-dark hover-primary fs-6">
                      <?= htmlspecialchars($test['name']) ?>
                    </a>
                    <code class="text-info small mt-1"><?= htmlspecialchars($test['rule']) ?></code>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <span class="badge bg-<?= $pData['color'] ?>-subtle text-<?= $pData['color'] ?> align-self-start mb-1">
                      <i class="<?= $pData['icon'] ?> me-1"></i> <?= htmlspecialchars($pData['name']) ?>
                    </span>
                    <small class="text-muted text-truncate" style="max-width: 420px;" title="<?= htmlspecialchars($test['citation']) ?>">
                      <?= htmlspecialchars($test['citation']) ?>
                    </small>
                  </div>
                </td>
                <td>
                  <span class="badge bg-<?= $sevClass ?>-subtle text-<?= $sevClass ?> border border-<?= $sevClass ?>-subtle px-2 py-1 fw-bold">
                    <?= htmlspecialchars($test['severity']) ?>
                  </span>
                </td>
                <td>
                  <a href="guidelines/<?= $test['file'] ?>" class="btn btn-sm btn-outline-info w-100">
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
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>