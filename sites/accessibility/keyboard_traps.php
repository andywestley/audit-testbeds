<?php
$pageTitle = 'Keyboard Traps & Character Shortcuts';
$extraStyles = '<style>
    .trap-zone {
        border: 2px dashed #ef4444;
        background-color: #fee2e2;
        padding: 20px;
        border-radius: 8px;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.1.2 / 2.1.4 (Level A)',
    'name' => 'Keyboard Traps & Character Shortcuts',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.1.2 No Keyboard Trap: If keyboard focus can be moved to a component of the page using a keyboard interface, then focus can be moved away from that component using only a keyboard interface. SC 2.1.4: Character Key Shortcuts can be turned off or remapped.',
    'trigger_summary' => 'JavaScript focus trapping preventing Tab exit without Escape support, and single-letter key listeners active across document.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Keyboard Trap Violations (WCAG 2.1.2)</h5>
        <p class="small mb-0 text-secondary">
            A keyboard trap occurs when a keyboard user can tab into a component but cannot tab back out to the rest of the web page.
        </p>
    </div>
</div>

<!-- Test 1: Keyboard Focus Trap Sandbox -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Interactive Keyboard Focus Trap Demo</h2>
            <small class="text-muted">Simulated custom modal widget that prevents forward <kbd>Tab</kbd> progression</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Critical Keyboard Trap
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Focus inside the trapped input below and try to <kbd>Tab</kbd> past the trap:
        </p>
        <div class="test-sandbox-zone">
            <div class="trap-zone">
                <h6 class="fw-bold text-danger"><i class="bi bi-lock-fill me-1"></i> Trapped Container</h6>
                <div class="mb-2" style="max-width: 320px;">
                    <input type="text" id="trapped-input" class="form-control" placeholder="Trapped input..." onkeydown="if(event.key === 'Tab' && !event.shiftKey){ event.preventDefault(); alert('Trapped! Cannot Tab forward out of this container.'); }">
                </div>
                <small class="text-danger">JavaScript traps forward Tab focus inside this field.</small>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>