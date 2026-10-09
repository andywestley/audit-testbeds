<?php
$pageTitle = 'Resize Text & Reflow (400% Zoom)';
$extraStyles = '<style>
    .fixed-height-box {
        height: 60px;
        overflow: hidden;
        border: 2px solid #ef4444;
        padding: 10px;
        background-color: #fee2e2;
    }
    .fixed-width-overflow {
        width: 1200px;
        border: 2px solid #ef4444;
        padding: 15px;
        background-color: #fee2e2;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.4.4 / 1.4.10 (Level AA)',
    'name' => 'Resize Text (200%) & Reflow (400% Zoom)',
    'level' => 'AA',
    'citation' => 'WCAG 2.2 SC 1.4.4 Resize Text: Text can be resized without assistive technology up to 200 percent without loss of content. SC 1.4.10 Reflow: Content can be presented without two-dimensional scrolling at 400% zoom (1280px viewport).',
    'trigger_summary' => 'Fixed-pixel height containers with overflow:hidden causing text truncation at 200% zoom, and fixed-pixel 1200px width containers causing horizontal scrollbars.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Zoom, Text Resizing &amp; Reflow Failures</h5>
        <p class="small mb-0 text-secondary">
            Zoom your browser to 200% (<kbd>Ctrl</kbd> + <kbd>+</kbd>) to see text get clipped in fixed-height boxes, and inspect the 1200px container causing horizontal scrolling at 400% zoom.
        </p>
    </div>
</div>

<!-- Test 1: Fixed Height Container Text Clipping -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Fixed Pixel Height with overflow:hidden (WCAG 1.4.4)</h2>
            <small class="text-muted">Resizing text causes paragraphs to be clipped and lost</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Text Truncation Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            At 200% zoom, the second half of this critical message disappears:
        </p>
        <div class="test-sandbox-zone">
            <div class="fixed-height-box">
                <p class="mb-0 fw-medium">
                    IMPORTANT NOTICE: Due to mandatory security updates, all system services will be offline starting at 22:00 UTC. Ensure all records are saved prior to downtime.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Test 2: Fixed 1200px Container Reflow Failure -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Fixed 1200px Width Container (WCAG 1.4.10 Reflow)</h2>
            <small class="text-muted">Forces two-dimensional horizontal scrolling on 320px mobile viewports or 400% zoom</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Reflow Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone overflow-auto">
            <div class="fixed-width-overflow">
                <h6 class="fw-bold mb-1">Fixed 1200px Wide Table / Block</h6>
                <p class="small mb-0">This container has a rigid <code>width: 1200px;</code> setting that triggers horizontal scrollbars on smaller viewports.</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>