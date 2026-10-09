<?php
$pageTitle = 'Keyboard Accessibility & Content on Hover';
$extraStyles = '<style>
    .fake-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        color: white;
        border-radius: 0.375rem;
        cursor: pointer;
        user-select: none;
    }
    .hover-tooltip-trigger {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted #333;
    }
    .hover-tooltip-content {
        display: none;
        position: absolute;
        bottom: 125%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #1e293b;
        color: #fff;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 0.8rem;
        white-space: nowrap;
        z-index: 10;
    }
    .hover-tooltip-trigger:hover .hover-tooltip-content {
        display: block;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.1.1 / 1.4.13 (Level A/AA)',
    'name' => 'Keyboard Accessibility & Content on Hover',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.1.1 Keyboard: All functionality of the content is operable through a keyboard interface without requiring specific timings. SC 1.4.13: Hover or focus content must be dismissible, hoverable, and persistent.',
    'trigger_summary' => 'Click handlers on <div> or <span> without tabindex/keydown, hover tooltips that vanish when mouse moves over tooltip, and non-focusable custom controls.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Keyboard &amp; Pointer Interaction Violations</h5>
        <p class="small mb-0 text-secondary">
            This test page demonstrates interactive elements that completely ignore keyboard navigation (mouse-only <code>onclick</code> on <code>&lt;div&gt;</code> without <code>tabindex</code> or key listeners) and un-hoverable tooltips.
        </p>
    </div>
</div>

<!-- Test 1: Mouse-Only Div Button -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Non-Focusable Mouse-Only &lt;div&gt; Button (WCAG 2.1.1)</h2>
            <small class="text-muted"><code>&lt;div onclick="..."&gt;</code> without <code>tabindex="0"</code> or <code>role="button"</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Keyboard Inaccessible
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Try pressing <kbd>Tab</kbd> to reach this button. The keyboard cursor will completely bypass it:
        </p>
        <div class="test-sandbox-zone">
            <!-- Non-keyboard accessible button -->
            <div class="fake-btn" onclick="alert('Action triggered via Mouse click!')">
                <i class="bi bi-mouse me-1"></i> Click Me (Mouse Only)
            </div>
            <small class="text-danger d-block mt-2">Cannot be focused via Tab key or triggered via Enter / Spacebar.</small>
        </div>
    </div>
</div>

<!-- Test 2: Hover Tooltip Disappears on Mouseover -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Content on Hover Not Hoverable (WCAG 1.4.13)</h2>
            <small class="text-muted">Tooltip that vanishes if user attempts to move pointer over tooltip text</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Hoverable Violation
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Hover over the dotted text to reveal the tooltip, then try moving your pointer directly onto the tooltip box:
        </p>
        <div class="test-sandbox-zone">
            <span class="hover-tooltip-trigger fw-bold text-primary">
                Inspect Term Definition
                <span class="hover-tooltip-content shadow">
                    Tooltip explanation (Un-hoverable!)
                </span>
            </span>
        </div>
    </div>
</div>

<!-- Test 3: Non-Standard Dropdown Without Keyboard Support -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Custom Dropdown Lacking ARIA &amp; Arrow Key Navigation</h2>
            <small class="text-muted">Plain list toggled via mouse clicks without <code>aria-expanded</code> or ArrowDown listeners</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Custom Widget Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div class="dropdown">
                <div class="fake-btn" onclick="document.getElementById('custom-menu').classList.toggle('d-none');">
                    Toggle Menu (Mouse-Only)
                </div>
                <ul id="custom-menu" class="list-group d-none mt-2 shadow-sm" style="max-width: 250px;">
                    <li class="list-group-item list-group-item-action" onclick="alert('Selected 1')">Option 1</li>
                    <li class="list-group-item list-group-item-action" onclick="alert('Selected 2')">Option 2</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>