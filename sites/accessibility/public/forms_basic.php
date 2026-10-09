<?php
$pageTitle = 'Form Labels & Input Purpose';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 3.3.2 / 1.3.5 (Level A)',
    'name' => 'Form Labels & Input Purpose',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 3.3.2 Labels or Instructions & SC 1.3.5 Identify Input Purpose: Labels or instructions are provided when content requires user input. Form inputs must have programmatically determinable labels and autofill metadata.',
    'trigger_summary' => 'Inputs missing <label> association, placeholder used as sole label, unlinked implicit labels, duplicate IDs on form controls, and missing autocomplete tokens.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Form Label &amp; Input Violations (WCAG 3.3.2)</h5>
        <p class="small mb-0 text-secondary">
            This test page contains form inputs that lack programmatic <code>&lt;label for="..."&gt;</code> associations, rely exclusively on fading placeholder text, or share duplicate DOM IDs across multiple inputs.
        </p>
    </div>
</div>

<form>
    <!-- Test 1: Missing Labels (Text Node Only) -->
    <div class="test-section-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-0 fw-bold text-dark">1. Inputs Missing Programmatic Labels</h2>
                <small class="text-muted">Unwrapped text nodes adjacent to inputs without <code>&lt;label&gt;</code> or <code>aria-label</code></small>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                <i class="bi bi-exclamation-octagon-fill me-1"></i> Missing Label
            </span>
        </div>
        <div class="card-body">
            <p class="small text-muted mb-3">
                Clicking the text "First Name:" does not focus the input, and screen readers cannot determine the field purpose:
            </p>
            <div class="test-sandbox-zone">
                <div class="mb-3">
                    <!-- No label, just text node next to input -->
                    <span class="fw-medium text-secondary">First Name:</span>
                    <input type="text" name="firstname" class="form-control mt-1" style="max-width: 350px;" />
                </div>
            </div>
        </div>
    </div>

    <!-- Test 2: Placeholder as Sole Label -->
    <div class="test-section-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-0 fw-bold text-dark">2. Placeholder Text Used as Sole Label</h2>
                <small class="text-muted">Disappears upon text entry and lacks accessibility name in many screen readers</small>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                <i class="bi bi-exclamation-octagon-fill me-1"></i> Placeholder Label Failure
            </span>
        </div>
        <div class="card-body">
            <p class="small text-muted mb-3">
                No visual or programmatic label outside the input placeholder:
            </p>
            <div class="test-sandbox-zone">
                <div class="mb-3">
                    <!-- Only placeholder, no visual label or aria-label -->
                    <input type="text" placeholder="Enter your Last Name here..." name="lastname" class="form-control" style="max-width: 350px;" />
                </div>
            </div>
        </div>
    </div>

    <!-- Test 3: Unlinked Label Tag -->
    <div class="test-section-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-0 fw-bold text-dark">3. Label Tag Not Associated via 'for' or Wrapping</h2>
                <small class="text-muted"><code>&lt;label&gt;</code> exists in DOM but lacks matching <code>for="id"</code></small>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                <i class="bi bi-exclamation-octagon-fill me-1"></i> Disconnected Label
            </span>
        </div>
        <div class="card-body">
            <p class="small text-muted mb-3">
                The label is visible on screen but disconnected from the input element:
            </p>
            <div class="test-sandbox-zone">
                <div class="mb-3">
                    <!-- Label tag exists but doesn't wrap input and no 'for' attribute -->
                    <label class="form-label fw-medium text-secondary">Email Address</label>
                    <input type="email" name="email" class="form-control" style="max-width: 350px;" />
                </div>
            </div>
        </div>
    </div>

    <!-- Test 4: Duplicate IDs on Multiple Controls -->
    <div class="test-section-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-0 fw-bold text-dark">4. Duplicate DOM IDs Across Form Inputs</h2>
                <small class="text-muted">Multiple controls sharing identical <code>id="phone"</code> attributes</small>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                <i class="bi bi-exclamation-octagon-fill me-1"></i> Duplicate ID Failure
            </span>
        </div>
        <div class="card-body">
            <p class="small text-muted mb-3">
                Clicking any of the labels focuses only the very first input because IDs must be unique:
            </p>
            <div class="test-sandbox-zone">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-medium text-secondary">Work Phone:</label>
                        <input type="text" id="phone" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-medium text-secondary">Cell Phone:</label>
                        <input type="text" id="phone" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-medium text-secondary">Fax Number:</label>
                        <input type="text" id="phone" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Test 5: Batch Unlabeled Inputs -->
    <div class="test-section-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-0 fw-bold text-dark">5. Unlabeled Input Clusters</h2>
                <small class="text-muted">Multiple consecutive fields with plain text nodes</small>
            </div>
            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                <i class="bi bi-exclamation-octagon-fill me-1"></i> Cluster Label Failure
            </span>
        </div>
        <div class="card-body">
            <div class="test-sandbox-zone">
                <div class="row g-2">
                    <div class="col-md-4"><div>Field 1: <input type="text" name="f1" class="form-control form-control-sm mt-1" /></div></div>
                    <div class="col-md-4"><div>Field 2: <input type="text" name="f2" class="form-control form-control-sm mt-1" /></div></div>
                    <div class="col-md-4"><div>Field 3: <input type="text" name="f3" class="form-control form-control-sm mt-1" /></div></div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'includes/footer.php'; ?>