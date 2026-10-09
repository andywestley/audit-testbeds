<?php
$pageTitle = 'Link Purpose & Ambiguous Text';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.4.4 / 2.4.9 (Level A/AAA)',
    'name' => 'Link Purpose (In Context & Link Only)',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.4.4 Link Purpose (In Context): The purpose of each link can be determined from the link text alone or from the link text together with programmatic context. SC 2.4.9: Link purpose determinable from link text alone.',
    'trigger_summary' => 'Generic ambiguous links ("Click Here", "Read More", "Download", "Details") pointing to different destinations without distinguishing context or aria-label.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Link Purpose &amp; Context Violations</h5>
        <p class="small mb-0 text-secondary">
            Screen reader users frequently navigate by generating a rotor list of all links on a page. When links simply say "Click Here" or "Read More", users cannot know where each link leads.
        </p>
    </div>
</div>

<!-- Test 1: Ambiguous Link Text -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Repetitive Ambiguous Link Text ("Click Here", "Read More")</h2>
            <small class="text-muted">Fails WCAG 2.4.4 by lacking descriptive anchor text or accessible labels</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Ambiguous Links
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            In a screen reader link list, all of these will simply read as <em>"Click Here"</em>:
        </p>
        <div class="test-sandbox-zone">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent">Annual Financial Report: <a href="#financials" class="fw-bold">Click Here</a></li>
                <li class="list-group-item bg-transparent">Sustainability Audit 2026: <a href="#sustainability" class="fw-bold">Click Here</a></li>
                <li class="list-group-item bg-transparent">Executive Leadership Team: <a href="#team" class="fw-bold">Click Here</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Test 2: Generic "Read More" Cards -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Generic "Read More" and "Download" Anchors</h2>
            <small class="text-muted">Links without context-enriching <code>aria-label</code></small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Repetitive Action Labels
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-white">
                        <h6 class="fw-bold">Latest Security Advisory</h6>
                        <p class="small text-muted mb-2">New patch release addresses critical vulnerability.</p>
                        <a href="#article1" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-white">
                        <h6 class="fw-bold">Product Catalog Q3</h6>
                        <p class="small text-muted mb-2">Updated pricing and enterprise licensing terms.</p>
                        <a href="#article2" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>