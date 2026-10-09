<?php
$pageTitle = 'Iframe Titles & Embedding';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 4.1.2 (Level A)',
    'name' => 'Iframe Titles & Accessible Embedding',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 4.1.2: Inline frames (iframes) must provide an accessible name via the title attribute so screen reader users know the purpose of the frame before navigating into it.',
    'trigger_summary' => '<iframe> elements missing the title attribute, and iframes with generic non-descriptive titles ("frame", "untitled").'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Iframe Accessibility Violations</h5>
        <p class="small mb-0 text-secondary">
            Screen reader users navigating frame-by-frame hear only "frame" or the source URL when the <code>title</code> attribute is missing.
        </p>
    </div>
</div>

<!-- Test 1: Iframe Missing title Attribute -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Iframe Missing title Attribute Entirely</h2>
            <small class="text-muted"><code>&lt;iframe src="..."&gt;</code> without <code>title</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Iframe Missing Title
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <!-- Missing title -->
            <iframe src="about:blank" width="100%" height="80" class="border rounded bg-light"></iframe>
            <small class="text-danger d-block mt-2">Screen readers cannot identify the purpose of this frame.</small>
        </div>
    </div>
</div>

<!-- Test 2: Generic Placeholder Title -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Non-Descriptive Generic Iframe Title</h2>
            <small class="text-muted"><code>title="iframe"</code> or <code>title="untitled"</code></small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Generic Title
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <iframe src="about:blank" title="iframe" width="100%" height="80" class="border rounded bg-light"></iframe>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>