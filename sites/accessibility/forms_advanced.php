<?php
$pageTitle = 'Error Identification & Suggestions';
$extraStyles = '<style>
    .required-star { color: #ef4444; font-weight: bold; }
    .unlinked-error { color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 3.3.1 / 3.3.3 / 3.3.4 (Level A/AA/AAA)',
    'name' => 'Error Identification, Suggestions & Prevention',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 3.3.1 Error Identification: If an input error is detected, the item that is in error is identified and the error is described to the user in text. SC 3.3.4 Error Prevention: Reversible submissions or confirmations must be provided for irreversible actions.',
    'trigger_summary' => 'Color-only required indicators, disconnected error messages without aria-describedby, missing autocomplete tokens, immediate destructive submissions without confirmation, and cognitive authentication tests.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Error Handling &amp; Form Logic Violations</h5>
        <p class="small mb-0 text-secondary">
            This test page demonstrates common form validation and accessibility failures: error messages that are not programmatically connected to their fields, color-only required indicators, and irreversible actions lacking confirmation friction.
        </p>
    </div>
</div>

<!-- Test 1: Color-Only Required Fields -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Required Fields Indicated Solely by Red Asterisk (WCAG 1.4.1 / 3.3.2)</h2>
            <small class="text-muted">Lacks <code>required</code> or <code>aria-required="true"</code> attributes</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Required Indication Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <form onsubmit="return false;">
                <div class="mb-3" style="max-width: 350px;">
                    <label for="username" class="form-label fw-medium">Username <span class="required-star">*</span></label>
                    <input type="text" id="username" class="form-control" />
                    <small class="text-muted">Screen reader does not announce this field as mandatory.</small>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Test 2: Error Message Not Programmatically Connected -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Disconnected Error Message (WCAG 3.3.1 / 1.3.1)</h2>
            <small class="text-muted">Error text rendered visually without <code>aria-describedby</code> link</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Disconnected Error
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <form onsubmit="return false;">
                <div class="mb-3" style="max-width: 350px;">
                    <label for="password" class="form-label fw-medium">Password</label>
                    <input type="password" id="password" class="form-control is-invalid" aria-invalid="true" />
                    <div id="pw-error" class="unlinked-error"><i class="bi bi-x-circle me-1"></i> Password must be at least 8 characters.</div>
                    <small class="text-muted d-block mt-1">Screen readers focus the input but never read the error text because there is no <code>aria-describedby="pw-error"</code>.</small>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Test 3: Missing Autocomplete on Standard Inputs -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Missing Autocomplete Tokens (WCAG 1.3.5)</h2>
            <small class="text-muted">Standard address fields lacking <code>autocomplete="street-address"</code> etc.</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Autocomplete Missing
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <form onsubmit="return false;">
                <div class="row g-3" style="max-width: 500px;">
                    <div class="col-12">
                        <label for="street" class="form-label fw-medium">Street Address</label>
                        <input type="text" id="street" class="form-control" />
                    </div>
                    <div class="col-12">
                        <label for="city" class="form-label fw-medium">City</label>
                        <input type="text" id="city" class="form-control" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Test 4: Immediate Destructive Submission Without Confirmation -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">4. Immediate Destructive Action Without Confirmation (WCAG 3.3.4)</h2>
            <small class="text-muted">Permanent data deletion triggered instantly without 2-step confirmation friction</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Error Prevention Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <form onsubmit="alert('Data Deleted Immediately! (No confirmation dialog)'); return false;">
                <p class="small text-muted mb-2">Clicking this button submits and deletes records immediately without any modal or undo gate:</p>
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill me-1"></i> Delete All User Account Data
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Test 5: Redundant Data Entry & Cognitive Auth (AAA) -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">5. Redundant Data Entry (3.3.7) &amp; Cognitive Auth (3.3.8 / 3.3.9)</h2>
            <small class="text-muted">No 'same as shipping' auto-fill and complex math captcha tests</small>
        </div>
        <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">
            <i class="bi bi-info-circle-fill me-1"></i> Level AAA Form Violations
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <h6 class="fw-bold text-secondary">3.3.7 Redundant Entry (AA):</h6>
            <div class="row g-2 mb-3" style="max-width: 500px;">
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Shipping Address:</label>
                    <input type="text" class="form-control form-control-sm" placeholder="123 High St">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Billing Address (No Copy Checkbox):</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Must retype manually">
                </div>
            </div>

            <h6 class="fw-bold text-secondary">3.3.8 / 3.3.9 Cognitive Authentication Tests (AAA):</h6>
            <div class="p-3 border rounded bg-white" style="max-width: 450px;">
                <label class="form-label small fw-bold">Math CAPTCHA:</label>
                <p class="small text-muted mb-2">What is the square root of 144 plus 15?</p>
                <div class="input-group input-group-sm mb-2">
                    <input type="text" class="form-control" aria-label="Math answer">
                    <button class="btn btn-outline-secondary" type="button">Verify</button>
                </div>
                <small class="text-danger d-block">Cognitive calculation tests create barriers for users with cognitive or memory disabilities.</small>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>