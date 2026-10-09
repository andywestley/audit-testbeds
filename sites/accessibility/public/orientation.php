<?php
$pageTitle = 'Orientation (Portrait/Landscape)';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.3.4 (Level AA)',
    'name' => 'Orientation (Portrait & Landscape Support)',
    'level' => 'AA',
    'citation' => 'WCAG 2.2 SC 1.3.4: Content does not restrict its view and operation to a single display orientation, such as portrait or landscape, unless a specific display orientation is essential.',
    'trigger_summary' => 'CSS media queries and transform rules that lock viewport orientation or block landscape/portrait rendering.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Display Orientation Violations (WCAG 1.3.4)</h5>
        <p class="small mb-0 text-secondary">
            Users who have devices mounted on wheelchairs or fixed stands cannot rotate their screens. Restricting view orientation creates severe accessibility barriers.
        </p>
    </div>
</div>

<!-- Test 1: Orientation Lock Banner -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Simulated Orientation Lock Overlay</h2>
            <small class="text-muted">Blocking app usage unless rotated to landscape</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> WCAG 1.3.4 Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div class="p-3 border border-warning rounded bg-warning bg-opacity-10">
                <h6 class="fw-bold text-warning mb-1"><i class="bi bi-phone-landscape me-1"></i> Simulated Lock: "Please Rotate Your Device to Landscape"</h6>
                <p class="small text-muted mb-0">Web applications must adapt to both portrait and landscape screen aspect ratios.</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>