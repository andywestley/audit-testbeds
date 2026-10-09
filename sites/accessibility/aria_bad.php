<?php
$pageTitle = 'Name, Role, Value & ARIA Misuse';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 4.1.2 (Level A)',
    'name' => 'Name, Role, Value (ARIA Misuse & State Mismatch)',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 4.1.2: For all user interface components, the name and role can be programmatically determined; states, properties, and values can be set programmatically; and notification of changes to these items is available to user agents.',
    'trigger_summary' => 'aria-hidden="true" applied to focusable interactive elements, invalid ARIA roles, and mismatched ARIA toggle states.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional ARIA Misuse Violations (WCAG 4.1.2)</h5>
        <p class="small mb-0 text-secondary">
            Applying invalid ARIA roles or hiding focusable elements with <code>aria-hidden="true"</code> causes severe accessibility tree corruption.
        </p>
    </div>
</div>

<!-- Test 1: aria-hidden on Focusable Elements -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. aria-hidden="true" on Focusable Button</h2>
            <small class="text-muted">Element receives keyboard focus but is hidden from screen readers</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Critical ARIA Bug
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Press <kbd>Tab</kbd> to focus this button. Screen readers will go completely silent because the parent or button has <code>aria-hidden="true"</code>:
        </p>
        <div class="test-sandbox-zone">
            <!-- Focusable element with aria-hidden -->
            <button type="button" class="btn btn-warning btn-sm" aria-hidden="true">
                <i class="bi bi-eye-slash-fill me-1"></i> Focusable but aria-hidden="true"
            </button>
            <small class="text-danger d-block mt-2">Violates Axe-Core rule <code>aria-hidden-focus</code>.</small>
        </div>
    </div>
</div>

<!-- Test 2: Invalid ARIA Role -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Non-Existent / Invalid ARIA Roles</h2>
            <small class="text-muted"><code>role="superbutton"</code> or <code>role="content"</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Invalid Role
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div role="superbutton" class="p-2 border rounded bg-light mb-2">
                This div uses an invalid custom role: <code>role="superbutton"</code>.
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>