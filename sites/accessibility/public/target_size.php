<?php
$pageTitle = 'Target Size (Minimum 24x24px)';
$extraStyles = '<style>
    .tiny-target {
        width: 14px;
        height: 14px;
        display: inline-block;
        padding: 0;
        margin-right: 4px;
        font-size: 10px;
        line-height: 14px;
        text-align: center;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.5.8 (Level AA)',
    'name' => 'Target Size (Minimum 24x24px)',
    'level' => 'AA',
    'citation' => 'WCAG 2.2 SC 2.5.8: The size of the target for pointer inputs is at least 24 by 24 CSS pixels, except where spacing or inline text context exempts it.',
    'trigger_summary' => 'Tiny pointer targets (e.g. 14x14px icons or links) positioned tightly together without sufficient spacing offset.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Pointer Target Size Violations (WCAG 2.2 SC 2.5.8)</h5>
        <p class="small mb-0 text-secondary">
            Targets smaller than 24x24px create severe motor and touch barriers on mobile devices and touchscreens.
        </p>
    </div>
</div>

<!-- Test 1: Tiny Undersized Targets -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Undersized 14x14px Action Buttons Without Spacing</h2>
            <small class="text-muted">Fails WCAG 2.5.8 (requires 24x24px target bounding box or spacing)</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> WCAG 2.5.8 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Try clicking individual action icons below on a mobile touch screen:
        </p>
        <div class="test-sandbox-zone">
            <div class="d-flex align-items-center gap-1">
                <span>Row Action:</span>
                <button type="button" class="btn btn-sm btn-outline-danger tiny-target" title="Delete">x</button>
                <button type="button" class="btn btn-sm btn-outline-secondary tiny-target" title="Edit">e</button>
                <button type="button" class="btn btn-sm btn-outline-info tiny-target" title="View">v</button>
            </div>
            <small class="text-danger d-block mt-2">Buttons are 14x14px with 4px margin, failing the 24px target bounding box.</small>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>