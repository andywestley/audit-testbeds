<?php
$pageTitle = 'Info & Relationships (Headings & Landmarks)';
$extraStyles = '<style>
    .fake-heading {
        font-size: 1.5rem;
        font-weight: 700;
        display: block;
        margin-top: 0.75rem;
        margin-bottom: 0.5rem;
        color: #1e293b;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.3.1 (Level A)',
    'name' => 'Info & Relationships (Headings, Lists & Landmarks)',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 1.3.1: Information, structure, and relationships conveyed through presentation can be programmatically determined or are available in text. Headings must follow a logical hierarchy and visual styling must not substitute for semantic markup.',
    'trigger_summary' => 'Deliberately missing <h1>, skipped heading levels (H2 to H4/H5/H6), fake headings using styled <div> tags, misused blockquotes and definition lists, and missing landmark roles.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Structural &amp; Semantic Violations</h5>
        <p class="small mb-0 text-secondary">
            This test page deliberately omits a primary <code>&lt;h1&gt;</code> element, skips heading levels, uses styled <code>&lt;div&gt;</code> tags as visual headings, and contains malformed list elements.
        </p>
    </div>
</div>

<!-- Note: H1 is intentionally missing on this page to trigger WCAG 1.3.1 skipped heading rule -->

<!-- Test 1: Skipped Heading Levels & Fake Headings -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Skipped Headings (H2 &rarr; H4) &amp; Fake &lt;div&gt; Headings</h2>
            <small class="text-muted">Breaks logical heading hierarchy for screen reader document outlines</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Skipped Heading
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <!-- Starting with H2, then skipping to H4 -->
            <p class="text-muted small">The document outline below starts at H2, skips H3, and jumps straight to H4:</p>
            <h4>Subsection Heading (H4)</h4>
            <p class="small text-muted mb-3">Content under H4 heading.</p>

            <!-- Visual heading not semantic -->
            <div class="fake-heading">Visual Heading Styled as Div (Not &lt;h*&gt; Tag)</div>
            <p class="small text-muted mb-0">The text above is visually styled as a heading but is a plain <code>&lt;div&gt;</code> without heading semantics.</p>
        </div>
    </div>
</div>

<!-- Test 2: Misused Blockquote & Definition Lists -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Misused Blockquotes &amp; Broken Definition Lists</h2>
            <small class="text-muted">Blockquotes used solely for indentation and &lt;dl&gt; with orphan terms/definitions</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Semantics Misuse
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <h6 class="fw-bold text-secondary">Misused &lt;blockquote&gt;:</h6>
            <blockquote class="border-start ps-3 text-muted">
                This is not a quote, just indented text used for visual indentation styling.
            </blockquote>

            <h6 class="fw-bold text-secondary mt-3">Malformed &lt;dl&gt; Structure:</h6>
            <dl class="row mb-0">
                <dt class="col-sm-3">Term 1</dt>
                <dd class="col-sm-9">Definition 1</dd>
                <!-- Missing DD -->
                <dt class="col-sm-3 text-danger">Term 2 (Missing &lt;dd&gt;)</dt>
                <!-- Missing DT -->
                <dd class="col-sm-9 text-danger">Definition for nothing (Missing &lt;dt&gt;)</dd>
            </dl>
        </div>
    </div>
</div>

<!-- Test 3: Visual-Only Lists & Orphan <li> Elements -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Visual-Only Numbered Lists &amp; Orphan &lt;li&gt; Tags</h2>
            <small class="text-muted">Plain text with numbers instead of &lt;ol&gt; and &lt;li&gt; outside &lt;ul&gt;/&lt;ol&gt;</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Malformed List
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <h6 class="fw-bold text-secondary">Visual-only list via &lt;br&gt;:</h6>
            <p class="mb-3">
                1. Item one<br>
                2. Item two<br>
                3. Item three
            </p>

            <h6 class="fw-bold text-secondary">Orphan &lt;li&gt; tags outside list container:</h6>
            <!-- LI outside UL/OL -->
            <li>Orphan item 1</li>
            <li>Orphan item 2</li>
            <div>
                <li>Item in div container</li>
            </div>
        </div>
    </div>
</div>

<!-- Test 4: Deep Nesting Without Structural Landmarks -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">4. Deep Nesting Without Structural Landmarks</h2>
            <small class="text-muted">Excessive generic div containers lacking HTML5 sectioning landmarks</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Landmark Missing
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div id="wrapper">
                <div class="container-inner">
                    <div class="content-area">
                        <div class="main-body">
                            <div class="article-wrapper">
                                <div class="text-block text-muted">
                                    Deeply nested content inside 6 consecutive div wrappers without <code>&lt;section&gt;</code>, <code>&lt;article&gt;</code>, or <code>&lt;main&gt;</code> landmarks.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Test 5: Location, Multiple Ways & Consistency (AA/AAA) -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">5. Purpose Identification, Breadcrumbs &amp; Consistency (AA/AAA)</h2>
            <small class="text-muted">Ambiguous icons (1.3.6), fake breadcrumbs (2.4.8), broken search (2.4.5), and inconsistent menu order (3.2.3)</small>
        </div>
        <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">
            <i class="bi bi-info-circle-fill me-1"></i> Level AA/AAA Triggers
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <h6 class="fw-bold text-secondary">1.3.6 Identify Purpose (AAA) - Unlabeled Icons:</h6>
            <div class="p-2 border rounded bg-white mb-3">
                <span style="font-size:24px;">🏠</span>
                <span style="font-size:24px;">⚙️</span>
                <span style="font-size:24px;">❓</span>
                <small class="text-muted ms-2">(No text labels or ARIA attributes)</small>
            </div>

            <h6 class="fw-bold text-secondary">2.4.8 Location (AAA) - Non-Semantic Breadcrumbs:</h6>
            <div class="p-2 border rounded bg-light mb-3 text-muted small">
                Home &gt; Structure &gt; Violations <span class="text-danger">(Plain div without &lt;nav aria-label="breadcrumb"&gt;)</span>
            </div>

            <h6 class="fw-bold text-secondary">2.4.5 Multiple Ways (AA) - Disabled Search:</h6>
            <div class="input-group input-group-sm mb-3" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Search site..." disabled>
                <button class="btn btn-secondary" disabled>Search</button>
            </div>

            <h6 class="fw-bold text-secondary">3.2.3 Consistent Navigation (AA) - Inverted Order:</h6>
            <ul class="list-inline small mb-0">
                <li class="list-inline-item"><a href="contrast.php" class="btn btn-sm btn-outline-secondary">Contrast</a></li>
                <li class="list-inline-item"><a href="index.php" class="btn btn-sm btn-outline-secondary">Home</a></li>
                <li class="list-inline-item"><a href="media.php" class="btn btn-sm btn-outline-secondary">Media</a></li>
            </ul>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>