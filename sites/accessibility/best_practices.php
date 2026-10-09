<?php
$pageTitle = 'Axe & Engine Best Practices';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'Section 508 / Axe Best Practice',
    'name' => 'Axe-Core & Section 508 Best Practices',
    'level' => 'AAA',
    'citation' => 'Section 508 & Axe-Core Engine Best Practices: Ensuring robust, modern HTML standards, security rel attributes on outbound links, and avoiding deprecated markup.',
    'trigger_summary' => 'Outdated presentation tags (<font>, <center>, <marquee>), target="_blank" missing rel="noopener noreferrer", and missing autocomplete.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Best Practice &amp; Security Violations</h5>
        <p class="small mb-0 text-secondary">
            Demonstrates legacy HTML tags and missing security tokens flagged by automated audit engines like Axe-Core and Lighthouse.
        </p>
    </div>
</div>

<!-- Test 1: Deprecated Presentation Tags -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Deprecated HTML Tags (&lt;font&gt;, &lt;center&gt;, &lt;marquee&gt;)</h2>
            <small class="text-muted">Obsolete HTML4 presentational elements</small>
        </div>
        <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">
            <i class="bi bi-info-circle-fill me-1"></i> Deprecated Elements
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <!-- Deprecated tags -->
            <center class="text-secondary fw-bold mb-2">Centered using legacy &lt;center&gt; tag</center>
            <font color="red" size="4" class="d-block mb-2">Red text using legacy &lt;font&gt; tag</font>
        </div>
    </div>
</div>

<!-- Test 2: target="_blank" Missing rel="noopener" -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. target="_blank" Links Missing rel="noopener noreferrer"</h2>
            <small class="text-muted">Security and performance vulnerability flagged by Axe and Lighthouse</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Missing Rel Noopener
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <a href="https://www.w3.org/" target="_blank" class="btn btn-sm btn-outline-primary">
                Open W3C in New Window (Missing rel="noopener") <i class="bi bi-box-arrow-up-right ms-1"></i>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>