<?php
/**
 * Standardized Rule Diagnostic Header Bar for COGA Testbed
 */
if (!isset($currentTest) || empty($currentTest)) {
    return;
}

$navInfo = getAdjacentCogaTests($currentTest['slug'], $tests);
$pillarData = $pillars[$currentTest['pillar']] ?? null;
$sev = strtolower($currentTest['severity']);
$sevBadgeClass = ($sev === 'error') ? 'severity-pill-error' : (($sev === 'warning') ? 'severity-pill-warning' : 'severity-pill-info');
$sevIcon = ($sev === 'error') ? 'bi-x-octagon-fill' : (($sev === 'warning') ? 'bi-exclamation-triangle-fill' : 'bi-info-circle-fill');
?>

<div class="diagnostic-header p-4 mb-4">
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 pb-3 border-bottom border-secondary border-opacity-50">
    <div class="d-flex flex-wrap align-items-center gap-2">
      <span class="badge bg-secondary-subtle text-secondary px-2 py-1">
        <i class="bi bi-list-check me-1"></i> Guideline <?= $navInfo['index'] ?> of <?= $navInfo['total'] ?>
      </span>
      <span class="badge bg-<?= $pillarData['color'] ?? 'primary' ?>-subtle text-<?= $pillarData['color'] ?? 'primary' ?> px-2 py-1">
        <i class="<?= $pillarData['icon'] ?? 'bi-folder' ?> me-1"></i> <?= htmlspecialchars($pillarData['name'] ?? 'Pillar') ?>
      </span>
      <span class="badge <?= $sevBadgeClass ?> px-3 py-1 fw-bold">
        <i class="<?= $sevIcon ?> me-1"></i> <?= htmlspecialchars($currentTest['severity']) ?>
      </span>
    </div>

    <!-- Quick Prev / Next Navigation -->
    <div class="btn-group btn-group-sm">
      <?php if ($navInfo['prev']): ?>
        <a href="<?= $base_path ?>guidelines/<?= $navInfo['prev']['file'] ?>" class="btn btn-outline-light" title="Previous: <?= htmlspecialchars($navInfo['prev']['name']) ?>">
          <i class="bi bi-chevron-left"></i> Prev
        </a>
      <?php else: ?>
        <button class="btn btn-outline-secondary" disabled><i class="bi bi-chevron-left"></i> Prev</button>
      <?php endif; ?>

      <a href="<?= $base_path ?>index.php" class="btn btn-outline-light" title="All COGA Guidelines">
        <i class="bi bi-grid-fill"></i> Index
      </a>

      <?php if ($navInfo['next']): ?>
        <a href="<?= $base_path ?>guidelines/<?= $navInfo['next']['file'] ?>" class="btn btn-outline-info fw-bold" title="Next: <?= htmlspecialchars($navInfo['next']['name']) ?>">
          Next <i class="bi bi-chevron-right"></i>
        </a>
      <?php else: ?>
        <a href="<?= $base_path ?>index.php" class="btn btn-success fw-bold">
          <i class="bi bi-check2-circle me-1"></i> Complete
        </a>
      <?php endif; ?>
    </div>
  </div>

  <div class="row align-items-start g-3">
    <div class="col-lg-8">
      <div class="d-flex align-items-center gap-2 mb-2">
        <span class="text-white-50 small text-uppercase tracking-wider">Target Rule:</span>
        <code class="rule-code-tag text-info"><?= htmlspecialchars($currentTest['rule']) ?></code>
      </div>
      <h1 class="h3 text-white fw-bold mb-2"><?= htmlspecialchars($currentTest['name']) ?></h1>
      
      <div class="trigger-box mt-3 text-light small">
        <strong class="text-warning"><i class="bi bi-bug-fill me-1"></i> Failure Indicator Trigger:</strong>
        <p class="mb-0 text-white-50 mt-1"><?= $currentTest['trigger_summary'] ?></p>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="citation-box h-100">
        <div class="d-flex align-items-center gap-1 text-info small fw-bold mb-1">
          <i class="bi bi-bookmark-star-fill"></i> W3C COGA Objective
        </div>
        <p class="small text-light mb-0 fst-italic">
          <?= htmlspecialchars($currentTest['citation']) ?>
        </p>
      </div>
    </div>
  </div>
</div>