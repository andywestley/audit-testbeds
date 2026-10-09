<?php
$pageTitle = 'Colour-Blindness Barriers';
$basePath = '../';
$extraStyles = '
<style>
    /* SVG filters application classes */
    .filter-normal { filter: none; }
    .filter-protanopia { filter: url(#protanopia); }
    .filter-deuteranopia { filter: url(#deuteranopia); }
    .filter-tritanopia { filter: url(#tritanopia); }
    .filter-achromatopsia { filter: url(#achromatopsia); }

    /* Simulator wrapper layout */
    .simulator-preview-area {
        transition: filter 0.2s ease;
        border: 2px dashed #dee2e6;
        border-radius: 12px;
        padding: 24px;
        background-color: #ffffff;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.02);
    }

    /* Barrier styling */
    .status-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
    }
    .status-dot.green { background-color: #2ec4b6; } /* Active / Success */
    .status-dot.red { background-color: #e71d36; } /* Error / Critical */
    .status-dot.orange { background-color: #ff9f1c; } /* Warning */

    /* Chart Simulation */
    .chart-bar-bad {
        height: 35px;
        margin-bottom: 10px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        padding-left: 12px;
        color: #fff;
        font-size: 14px;
    }
    .chart-bar-bad.red { background-color: #e71d36; }
    .chart-bar-bad.green { background-color: #2ec4b6; }

    .chart-bar-good {
        height: 35px;
        margin-bottom: 10px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        padding-left: 12px;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    .chart-bar-good.stripe-red {
        background: repeating-linear-gradient(
            45deg,
            #e71d36,
            #e71d36 10px,
            #ff5c70 10px,
            #ff5c70 20px
        );
        border: 1px solid #c1121f;
    }
    .chart-bar-good.solid-green {
        background-color: #2ec4b6;
        border: 1px solid #0f9f90;
    }

    /* Bad form validation */
    .bad-input-success {
        border: 2px solid #2ec4b6 !important;
    }
    .bad-input-error {
        border: 2px solid #e71d36 !important;
    }

    /* Bad links */
    .bad-link {
        color: #e71d36;
        text-decoration: none;
    }
    
    .good-link {
        color: #028090;
        text-decoration: underline;
        font-weight: 600;
    }

    /* Simulator control bar styling */
    .simulator-control-panel {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .btn-sim {
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }
    
    .btn-sim.active {
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
    }
</style>
';
include '../includes/header.php';
?>

<!-- Hidden SVG Filters for Colour-Blindness Simulation -->
<svg style="display:none">
  <defs>
    <!-- Protanopia (Red-blind) -->
    <filter id="protanopia">
      <feColorMatrix type="matrix" values="0.567, 0.433, 0,     0, 0,
                                           0.558, 0.442, 0,     0, 0,
                                           0,     0.242, 0.758, 0, 0,
                                           0,     0,     0,     1, 0"/>
    </filter>
    <!-- Deuteranopia (Green-blind) -->
    <filter id="deuteranopia">
      <feColorMatrix type="matrix" values="0.625, 0.375, 0,     0, 0,
                                           0.7,   0.3,   0,     0, 0,
                                           0,     0.3,   0.7,   0, 0,
                                           0,     0,     0,     1, 0"/>
    </filter>
    <!-- Tritanopia (Blue-blind) -->
    <filter id="tritanopia">
      <feColorMatrix type="matrix" values="0.95,  0.05,  0,     0, 0,
                                           0,     0.433, 0.567, 0, 0,
                                           0,     0.475, 0.525, 0, 0,
                                           0,     0,     0,     1, 0"/>
    </filter>
    <!-- Achromatopsia (Total colour-blindness) -->
    <filter id="achromatopsia">
      <feColorMatrix type="matrix" values="0.299, 0.587, 0.114, 0, 0,
                                           0.299, 0.587, 0.114, 0, 0,
                                           0.299, 0.587, 0.114, 0, 0,
                                           0,     0,     0,     1, 0"/>
    </filter>
  </defs>
</svg>

<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Colour-Blindness Accessibility Barriers</h1>
        <p class="lead text-muted">Demonstrates how reliance on colour alone as a source of information creates significant barriers for colour-blind users, and shows how to resolve them.</p>
        
        <!-- Interactive Control Panel (Unfiltered) -->
        <div class="simulator-control-panel shadow-sm">
            <h5 class="mb-3 d-flex align-items-center">
                <span class="badge bg-primary me-2">Interactive Simulator</span>
                Select a vision condition to filter the preview area below:
            </h5>
            <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sim active" data-filter="normal">
                    👀 Normal Vision
                </button>
                <button type="button" class="btn btn-outline-danger btn-sim" data-filter="deuteranopia">
                    🔴🟢 Deuteranopia (Green-blind)
                </button>
                <button type="button" class="btn btn-outline-danger btn-sim" data-filter="protanopia">
                    🔴🟢 Protanopia (Red-blind)
                </button>
                <button type="button" class="btn btn-outline-warning btn-sim" data-filter="tritanopia">
                    🔵🟡 Tritanopia (Blue-blind)
                </button>
                <button type="button" class="btn btn-outline-dark btn-sim" data-filter="achromatopsia">
                    ⚫⚪ Achromatopsia (Monochrome)
                </button>
            </div>
            <div class="mt-3 small text-muted">
                <strong>Note:</strong> The control panel itself is kept unfiltered so you can easily toggle and read options. The dotted container below simulates the selected vision condition.
            </div>
        </div>
    </div>
</div>

<!-- Preview Area that gets the Filter Applied -->
<div id="previewArea" class="simulator-preview-area filter-normal">

    <!-- Section: About -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="alert alert-light border shadow-sm">
                <h4 class="alert-heading text-dark">Why Colour Alone Fails</h4>
                <p class="mb-0">
                    WCAG Success Criterion <strong>1.4.1 Use of Color (Level A)</strong> states that colour should not be used as the only visual means of conveying information, indicating an action, prompting a response, or distinguishing a visual element. When interfaces use colour uniquely to represent states, errors, or data, users with colour-vision deficiencies cannot access this information.
                </p>
            </div>
        </div>
    </div>

    <!-- Barrier 1 -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-danger shadow-sm">
                <div class="card-header bg-danger-subtle text-danger-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>❌ Barrier: Colour-Only Status Dashboard</span>
                    <span class="badge bg-danger">Inaccessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">The system status is conveyed purely by the colour of the indicator dot. Under deuteranopia or protanopia, the "Critical Error" and "Online" dots look nearly identical.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <h6 class="border-bottom pb-2 mb-3">Server Monitor</h6>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span>Web Server (US-East)</span>
                            <span><span class="status-dot green"></span> Active</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span>API Gateway</span>
                            <span><span class="status-dot orange"></span> Warning</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Database Cluster</span>
                            <span><span class="status-dot red"></span> Critical</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-success shadow-sm">
                <div class="card-header bg-success-subtle text-success-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>✅ Accessible Solution: Color + Icons & Labels</span>
                    <span class="badge bg-success">Accessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">By using unique icons (checkmark, exclamation, cross) and descriptive labels, the status remains clear even if all colour is removed.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <h6 class="border-bottom pb-2 mb-3">Server Monitor</h6>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span>Web Server (US-East)</span>
                            <span class="text-success fw-bold">
                                <span class="badge bg-success-subtle text-success d-inline-flex align-items-center gap-1">
                                    ✓ Active
                                </span>
                            </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span>API Gateway</span>
                            <span class="text-warning fw-bold">
                                <span class="badge bg-warning-subtle text-warning d-inline-flex align-items-center gap-1">
                                    ⚠ Warning
                                </span>
                            </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Database Cluster</span>
                            <span class="text-danger fw-bold">
                                <span class="badge bg-danger-subtle text-danger d-inline-flex align-items-center gap-1">
                                    ✗ Critical
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Barrier 2 -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-danger shadow-sm">
                <div class="card-header bg-danger-subtle text-danger-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>❌ Barrier: Colour-Only Form Validation</span>
                    <span class="badge bg-danger">Inaccessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">The input borders change colour to indicate success (green) or validation failure (red). No error message or helper text is provided.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <form onsubmit="return false;">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="text" class="form-control bad-input-error" value="invalid-email@">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control bad-input-success" value="johndoe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-success shadow-sm">
                <div class="card-header bg-success-subtle text-success-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>✅ Accessible Solution: Error Messages & Icons</span>
                    <span class="badge bg-success">Accessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">Validation errors are explicitly described in text with associated icons, ensuring the problem is readable and clear to all users.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <form onsubmit="return false;">
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="accessibleEmail">Email Address</label>
                                <input type="text" id="accessibleEmail" class="form-control is-invalid" value="invalid-email@">
                                <div class="invalid-feedback d-block fw-semibold text-danger">
                                    ✗ Please enter a valid email address containing an '@' symbol and domain name.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="accessibleUser">Username</label>
                                <input type="text" id="accessibleUser" class="form-control is-valid" value="johndoe">
                                <div class="valid-feedback d-block fw-semibold text-success">
                                    ✓ Username is available!
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Barrier 3 -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-danger shadow-sm">
                <div class="card-header bg-danger-subtle text-danger-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>❌ Barrier: Inline Links Distinguished Only by Colour</span>
                    <span class="badge bg-danger">Inaccessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">The link inside the paragraph relies solely on a red colour to distinguish it from surrounding body text, and lacks an underline.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <p class="mb-0 text-dark">
                            To configure your account settings, you should navigate to the <a href="#" class="bad-link">admin console dashboard</a> where all main controls are situated.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-success shadow-sm">
                <div class="card-header bg-success-subtle text-success-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>✅ Accessible Solution: Underlines & High Contrast</span>
                    <span class="badge bg-success">Accessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">The link is underlined, satisfying the visual requirement to distinguish links from standard text using a non-colour indicator.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <p class="mb-0 text-dark">
                            To configure your account settings, you should navigate to the <a href="#" class="good-link">admin console dashboard</a> where all main controls are situated.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Barrier 4 -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-danger shadow-sm">
                <div class="card-header bg-danger-subtle text-danger-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>❌ Barrier: Colour-Only Information Chart</span>
                    <span class="badge bg-danger">Inaccessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">A sales projection chart uses only green and red colors to distinguish "Product Q1" vs "Product Q2" datasets in the bars and legend.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <h6 class="border-bottom pb-2 mb-3">Product Sales Comparison</h6>
                        
                        <div class="chart-bar-bad green" style="width: 80%;">Product Sales (80%)</div>
                        <div class="chart-bar-bad red" style="width: 55%;">Product Sales (55%)</div>
                        
                        <div class="mt-3 d-flex justify-content-center gap-4">
                            <div><span class="status-dot green"></span> Product Q1</div>
                            <div><span class="status-dot red"></span> Product Q2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-success shadow-sm">
                <div class="card-header bg-success-subtle text-success-emphasis fw-bold d-flex justify-content-between align-items-center">
                    <span>✅ Accessible Solution: Patterns and Text Labels</span>
                    <span class="badge bg-success">Accessible</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">By adding a repeating diagonal stripe pattern and explicit text identifiers within the bars and legends, the datasets are distinguishable.</p>
                    
                    <div class="border rounded p-3 bg-light">
                        <h6 class="border-bottom pb-2 mb-3">Product Sales Comparison</h6>
                        
                        <div class="chart-bar-good solid-green" style="width: 80%;">Product Q1: 80%</div>
                        <div class="chart-bar-good stripe-red" style="width: 55%;">Product Q2: 55%</div>
                        
                        <div class="mt-3 d-flex justify-content-center gap-4">
                            <div>
                                <span class="badge bg-success-subtle text-success border border-success d-inline-flex align-items-center gap-1">
                                    <span class="status-dot green m-0"></span> Product Q1 (Solid)
                                </span>
                            </div>
                            <div>
                                <span class="badge bg-danger-subtle text-danger border border-danger d-inline-flex align-items-center gap-1">
                                    <span class="status-dot red m-0" style="background: repeating-linear-gradient(45deg, #e71d36, #e71d36 3px, #fff 3px, #fff 6px);"></span> Product Q2 (Stripes)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const previewArea = document.getElementById('previewArea');
    const buttons = document.querySelectorAll('.btn-sim');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');

            // Remove all filter classes from preview area
            previewArea.classList.remove(
                'filter-normal',
                'filter-protanopia',
                'filter-deuteranopia',
                'filter-tritanopia',
                'filter-achromatopsia'
            );

            // Add the selected filter class
            const filterType = this.getAttribute('data-filter');
            previewArea.classList.add('filter-' + filterType);
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>
