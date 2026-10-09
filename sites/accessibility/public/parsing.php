<?php
$pageTitle = 'HTML Parsing & Duplicate IDs';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 4.1.1 (Historical / HTML Spec)',
    'name' => 'HTML Parsing & Well-Formed Markup',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 4.1.1 Parsing: In content implemented using markup languages, elements have complete start and end tags, elements are nested according to specification, and IDs are unique.',
    'trigger_summary' => 'Duplicate DOM IDs in document body, unclosed tags, and invalid nesting (e.g. <div> inside <p>).'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional HTML Parsing &amp; Specification Violations</h5>
        <p class="small mb-0 text-secondary">
            Duplicate IDs and invalid markup nesting break accessibility tree construction and assistive technology DOM queries.
        </p>
    </div>
</div>

<!-- Test 1: Duplicate IDs in Content -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Duplicate DOM IDs (id="duplicate-card")</h2>
            <small class="text-muted">Violates unique ID rule required for <code>aria-labelledby</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Duplicate ID Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div id="duplicate-card" class="p-2 border rounded bg-light mb-2">Card Instance A (id="duplicate-card")</div>
            <div id="duplicate-card" class="p-2 border rounded bg-light">Card Instance B (id="duplicate-card")</div>
        </div>
    </div>
</div>

<!-- Test 2: Invalid HTML Nesting -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Invalid Tag Nesting (&lt;div&gt; inside &lt;p&gt;)</h2>
            <small class="text-muted">Block elements nested inside phrasing/inline parent tags</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Invalid Nesting
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <p>Paragraph start
                <div class="p-2 bg-light border">Nested block div inside paragraph</div>
            Paragraph end</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>