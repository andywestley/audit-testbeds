<?php
$pageTitle = 'Content Quality & Readability Testbed Matrix';
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
            <span class="badge bg-warning text-dark px-3 py-1">Content Insights &amp; NLP Engine</span>
            <span class="badge bg-secondary">Benchmark Suite v2.0</span>
          </div>
          <h1 class="display-6 fw-bold">Content Quality &amp; Readability Testbed</h1>
          <p class="lead text-light text-opacity-75 mb-4">
            A dedicated benchmark testbed engineered to test and validate readability heuristics, Flesch-Kincaid complexity levels, inclusive language, passive voice, sentiment tone, and brand lexicon resonance.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="blog-bad-1.php" class="btn btn-warning btn-lg shadow-sm text-dark fw-bold">
              <i class="bi bi-play-circle-fill me-2"></i> Start Content Benchmark (Test All)
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
                <div class="text-white-50 small text-uppercase">Rules Tested</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-danger bg-opacity-25 rounded-3 border border-danger border-opacity-50 text-center">
                <div class="display-6 fw-bold text-danger"><?= $errorCount ?></div>
                <div class="text-white-50 small text-uppercase">High Severity</div>
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
                <div class="text-white-50 small text-uppercase">Style &amp; Brand</div>
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
                <span class="badge bg-light text-dark border"><?= count($pillarTests) ?> Rules</span>
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
          <h2 class="h5 fw-bold mb-0"><i class="bi bi-grid-3x3-gap-fill text-warning me-2"></i>Content Heuristics Matrix</h2>
          <small class="text-muted">Interactive catalog mapping each content rule to its dedicated benchmark test articles.</small>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover table-matrix mb-0" id="matrixTable">
          <thead>
            <tr>
              <th scope="col" style="width: 60px;">#</th>
              <th scope="col">Rule &amp; Test Target</th>
              <th scope="col">Pillar &amp; Citation</th>
              <th scope="col" style="width: 120px;">Severity</th>
              <th scope="col" style="width: 220px;">Benchmark Actions</th>
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
                    <a href="<?= $test['file'] ?>" class="fw-bold text-decoration-none text-dark hover-primary fs-6">
                      <?= htmlspecialchars($test['name']) ?>
                    </a>
                    <code class="text-warning text-dark small mt-1"><?= htmlspecialchars($test['rule']) ?></code>
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
                  <div class="d-flex gap-1">
                    <a href="<?= $test['file'] ?>" class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-x-circle me-1"></i> Failing
                    </a>
                    <a href="<?= $test['compare_file'] ?>" class="btn btn-sm btn-outline-success">
                      <i class="bi bi-check-circle me-1"></i> Passing
                    </a>
                  </div>
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