<?php
/**
 * Standardized Rule Diagnostic Header Bar for Accessibility Testbed
 */
if (!isset($currentCriterion) || empty($currentCriterion)) {
    return;
}

$sevBadgeClass = ($currentCriterion['level'] === 'A') ? 'severity-pill-error' : (($currentCriterion['level'] === 'AA') ? 'severity-pill-warning' : 'severity-pill-info');
?>

<div class="diagnostic-header p-4 mb-4">
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 pb-3 border-bottom border-secondary border-opacity-50">
    <div class="d-flex flex-wrap align-items-center gap-2">
      <span class="badge bg-secondary-subtle text-secondary px-2 py-1">
        <i class="bi bi-universal-access me-1"></i> WCAG 2.2 Testbed
      </span>
      <span class="badge <?= $sevBadgeClass ?> px-3 py-1 fw-bold">
        Level <?= htmlspecialchars($currentCriterion['level']) ?>
      </span>
    </div>

    <!-- Quick Prev / Next Navigation -->
    <div class="btn-group btn-group-sm">
      <a href="<?= $basePath ?>index.php" class="btn btn-outline-light" title="All Criteria Matrix">
        <i class="bi bi-grid-fill me-1"></i> Criteria Matrix
      </a>
    </div>
  </div>

  <div class="row align-items-start g-3">
    <div class="col-lg-8">
      <div class="d-flex align-items-center gap-2 mb-2">
        <span class="text-white-50 small text-uppercase tracking-wider">Target Criterion:</span>
        <code class="rule-code-tag text-info"><?= htmlspecialchars($currentCriterion['rule']) ?></code>
      </div>
      <h1 class="h3 text-white fw-bold mb-2"><?= htmlspecialchars($currentCriterion['name']) ?></h1>
      
      <?php if (!empty($currentCriterion['trigger_summary'])): ?>
      <div class="trigger-box mt-3 text-light small">
        <strong class="text-warning"><i class="bi bi-bug-fill me-1"></i> Violation Indicators:</strong>
        <p class="mb-0 text-white-50 mt-1"><?= $currentCriterion['trigger_summary'] ?></p>
      </div>
      <?php endif; ?>
    </div>

    <div class="col-lg-4">
      <div class="citation-box h-100">
        <div class="d-flex align-items-center gap-1 text-info small fw-bold mb-1">
          <i class="bi bi-bookmark-star-fill"></i> W3C WCAG 2.2 Standard
        </div>
        <p class="small text-light mb-0 fst-italic">
          <?= htmlspecialchars($currentCriterion['citation'] ?? 'Official W3C Web Content Accessibility Guidelines Success Criterion.') ?>
        </p>
      </div>
    </div>
  </div>
</div>