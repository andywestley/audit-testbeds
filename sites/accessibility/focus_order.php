<?php
$pageTitle = 'Focus Order & Visible Focus Indicator';
$extraStyles = '<style>
    .no-focus-ring:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.4.3 / 2.4.7 (Level A/AA)',
    'name' => 'Focus Order & Focus Visible',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.4.3 Focus Order: If content can be navigated sequentially, focusable components receive focus in an order that preserves meaning. SC 2.4.7: Any keyboard operable user interface has a mode of operation where the keyboard focus indicator is visible.',
    'trigger_summary' => 'Positive tabindex disrupting natural reading order, CSS outline:none stripping visible focus indicators, and reverse tab trapping.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Focus Order &amp; Indicator Violations</h5>
        <p class="small mb-0 text-secondary">
            Use your <kbd>Tab</kbd> key to navigate through the test sandboxes below to observe chaotic tab jumps and invisible focus rings.
        </p>
    </div>
</div>

<!-- Test 1: Positive Tabindex Disrupting Natural Flow -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Positive tabindex Attributes (Disrupted Tab Order)</h2>
            <small class="text-muted"><code>tabindex="3"</code> &rarr; <code>tabindex="1"</code> &rarr; <code>tabindex="2"</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 2.4.3 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Press <kbd>Tab</kbd> inside this box. Focus will jump erratically across fields out of visual order:
        </p>
        <div class="test-sandbox-zone">
            <div class="row g-3" style="max-width: 500px;">
                <div class="col-12">
                    <label class="form-label small fw-bold">Visual First (tabindex="3"):</label>
                    <input type="text" tabindex="3" class="form-control" placeholder="Focuses Third">
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold">Visual Second (tabindex="1"):</label>
                    <input type="text" tabindex="1" class="form-control" placeholder="Focuses First">
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold">Visual Third (tabindex="2"):</label>
                    <input type="text" tabindex="2" class="form-control" placeholder="Focuses Second">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Test 2: Removed Visible Focus Indicator -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Invisible Focus Indicators (outline: none)</h2>
            <small class="text-muted">CSS strips browser focus rings without providing custom indicators</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 2.4.7 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Tab through these buttons. There is no visible outline or highlight to indicate which button is active:
        </p>
        <div class="test-sandbox-zone d-flex gap-2">
            <button type="button" class="btn btn-secondary no-focus-ring">No Focus Ring 1</button>
            <button type="button" class="btn btn-secondary no-focus-ring">No Focus Ring 2</button>
            <button type="button" class="btn btn-secondary no-focus-ring">No Focus Ring 3</button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>