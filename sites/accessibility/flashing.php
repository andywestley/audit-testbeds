<?php
$pageTitle = 'Flashing & Seizure Hazards';
$extraStyles = '<style>
    @keyframes strobeEffect {
        0%, 49% { background-color: #ef4444; color: #ffffff; }
        50%, 100% { background-color: #3b82f6; color: #ffffff; }
    }
    .strobe-box {
        animation: strobeEffect 0.2s infinite;
        padding: 20px;
        text-align: center;
        font-weight: bold;
        border-radius: 6px;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.3.1 / 2.2.2 (Level A)',
    'name' => 'Three Flashes or Below Threshold (Seizure Hazards)',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.3.1: Web pages do not contain anything that flashes more than three times in any one second period, or the flash is below the general flash and red flash thresholds.',
    'trigger_summary' => 'High-frequency strobing CSS animations (> 3 Hz) that pose photosensitive seizure risks, and unpausable auto-updating content.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-danger d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-exclamation-octagon-fill fs-4 text-danger flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Warning: Seizure Hazard Simulation</h5>
        <p class="small mb-0 text-danger">
            Content that flashes more than 3 times per second can trigger photosensitive epileptic seizures. (The interactive demonstration is controlled via an explicit button).
        </p>
    </div>
</div>

<!-- Test 1: Rapid Flashing Strobe Animation -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Rapid Strobing Animation (&gt; 3 Flashes/Sec)</h2>
            <small class="text-muted">Violates WCAG 2.3.1 Level A Three Flashes threshold</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Seizure Violation
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div id="strobe-demo" class="p-3 border rounded bg-light text-center mb-3">
                <span class="text-muted">Strobe animation is currently paused for safety.</span>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="document.getElementById('strobe-demo').classList.toggle('strobe-box');">
                <i class="bi bi-lightning-fill me-1"></i> Toggle Simulated Strobe
            </button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>