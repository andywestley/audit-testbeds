<?php
$pageTitle = 'Color Contrast (Text & UI)';
$extraStyles = '<style>
    .low-contrast-text {
        color: #999999;
        background-color: #ffffff;
    }
    .very-low-contrast-text {
        color: #cccccc;
        background-color: #ffffff;
    }
    .bg-image-text {
        background-image: url("https://placehold.co/400x120/1e293b/ffffff?text=Busy+Background");
        background-size: cover;
        color: #e2e8f0;
        padding: 25px;
        font-weight: 500;
    }
    a.bad-link-color {
        text-decoration: none;
        color: #3b82f6;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.4.3 / 1.4.11 (Level AA)',
    'name' => 'Color Contrast & Visual Presentation',
    'level' => 'AA',
    'citation' => 'WCAG 2.2 SC 1.4.3 Contrast (Minimum): The visual presentation of text and images of text has a contrast ratio of at least 4.5:1 (3:1 for large text). SC 1.4.1: Color is not used as the only visual means of conveying information.',
    'trigger_summary' => 'Text with contrast ratio under 4.5:1 on white background, color used as sole status indicator, and text overlaid on busy non-uniform background images.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Color Contrast &amp; Conveyance Violations</h5>
        <p class="small mb-0 text-secondary">
            This test page isolates intentional color failures: sub-threshold contrast ratios (2.85:1, 1.6:1), color used as the sole conveyor of status/action, and un-underlined inline link colors.
        </p>
    </div>
</div>

<!-- Test 1: Low Contrast Text Examples -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Sub-Threshold Text Contrast Ratios (&lt; 4.5:1)</h2>
            <small class="text-muted">Fails WCAG 1.4.3 Level AA requirement of 4.5:1 contrast for regular body text</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> WCAG 1.4.3 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Light gray text rendered against pure white background:
        </p>
        <div class="test-sandbox-zone bg-white p-3">
            <div class="p-3 mb-2 border rounded bg-white low-contrast-text">
                <strong>Ratio ~2.85:1 (Fail AA):</strong> This text is #999 on #FFF, failing the 4.5:1 minimum threshold.
            </div>
            <div class="p-3 border rounded bg-white very-low-contrast-text">
                <strong>Ratio ~1.6:1 (Critical Fail):</strong> This text is #CCC on #FFF, virtually unreadable for low-vision users.
            </div>
        </div>
    </div>
</div>

<!-- Test 2: Severe Color Mismatch Palette -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Chromatic Clash &amp; Insufficient Foreground Combinations</h2>
            <small class="text-muted">Demonstrates poor text-to-background pairings</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Severe Contrast Failures
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone bg-white p-3">
            <div class="row g-2 text-center small fw-bold">
                <div class="col-md-4"><div class="p-2 border rounded" style="color: #bbb; background: #fff;">Gray (#BBB) on White</div></div>
                <div class="col-md-4"><div class="p-2 border rounded" style="color: red; background: blue;">Red on Blue (Vibrating)</div></div>
                <div class="col-md-4"><div class="p-2 border rounded" style="color: #00ff00; background: #ffffff;">Light Green on White</div></div>
                <div class="col-md-4"><div class="p-2 border rounded" style="color: #ffff00; background: #ffffff;">Yellow on White</div></div>
                <div class="col-md-4"><div class="p-2 border rounded" style="color: #00ffff; background: #ffffff;">Cyan on White</div></div>
                <div class="col-md-4"><div class="p-2 border rounded" style="color: #888888; background: #333333;">Gray (#888) on Dark (#333)</div></div>
            </div>
        </div>
    </div>
</div>

<!-- Test 3: Color as Sole Conveyor of Information -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Color as the Sole Conveyor of Information (WCAG 1.4.1)</h2>
            <small class="text-muted">Instructions relying exclusively on recognizing green/red colors</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 1.4.1 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Users with color-vision deficiencies (e.g. protanopia or deuteranopia) cannot distinguish the buttons:
        </p>
        <div class="test-sandbox-zone bg-white p-3">
            <p class="mb-2">To accept the terms, click the <span style="color: green; font-weight: bold;">colored</span> button:</p>
            <div class="d-flex gap-2">
                <button type="button" class="btn" style="background: green; color: white;">Option 1</button>
                <button type="button" class="btn" style="background: red; color: white;">Option 2</button>
            </div>
        </div>
    </div>
</div>

<!-- Test 4: Text Over Busy Background Image -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">4. Text Overlaid on Busy Non-Uniform Background</h2>
            <small class="text-muted">Lack of backdrop contrast filter or semi-opaque overlay</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Busy Background
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone p-0 overflow-hidden rounded">
            <div class="bg-image-text">
                <h5 class="fw-bold mb-1">Text Over Busy Background Image</h5>
                <p class="mb-0">Without a solid scrim or background card, contrast varies unpredictably across pixels.</p>
            </div>
        </div>
    </div>
</div>

<!-- Test 5: Links Distinguished Solely by Color -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">5. Inline Links Distinguished Solely by Color</h2>
            <small class="text-muted">Un-underlined links lacking 3:1 contrast against surrounding body text</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Link Color Only
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone bg-white p-3">
            <p class="mb-0" style="color: #334155;">
                For more information regarding compliance testing, please visit <a href="#" class="bad-link-color">our documentation portal</a> to read the complete specifications.
            </p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>