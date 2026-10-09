<?php
$pageTitle = 'Data Tables & Headers';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.3.1 (Level A)',
    'name' => 'Data Tables & Semantic Structure',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 1.3.1 Info and Relationships: Tables used to display tabular data must associate data cells with header cells (th) using appropriate scope and id/headers. Tables must not be used for layout without proper ARIA presentation roles.',
    'trigger_summary' => 'Data tables missing <th> headers, complex multi-tier tables missing scope attributes, layout tables with nested structural elements, and nested presentation tables.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Test 1: Data Table Missing <th> Headers -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="card-title-main">1. Data Table Missing &lt;th&gt; Header Cells</h2>
            <p class="card-subtitle-text">Uses bolded <code>&lt;td&gt;&lt;b&gt;</code> cells instead of semantic <code>&lt;th&gt;</code> elements</p>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1.5 fw-semibold">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 1.3.1 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-secondary mb-3">
            Screen readers will treat the first row as regular data rather than announcing them as column headers for subsequent rows:
        </p>
        <div class="test-sandbox-zone">
            <div class="test-sandbox-label"><i class="bi bi-code-slash"></i> Intentional Failure Sandbox:</div>
            <!-- No TH, just bold TD -->
            <table class="table table-bordered w-100" border="1">
                <tbody>
                    <tr class="table-light">
                        <td><b>Name</b></td>
                        <td><b>Age</b></td>
                        <td><b>City</b></td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>30</td>
                        <td>New York</td>
                    </tr>
                    <tr>
                        <td>Jane</td>
                        <td>25</td>
                        <td>London</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Test 2: Complex Table Missing Scope Attributes -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="card-title-main">2. Complex Multi-Tier Table Missing Scope Attributes</h2>
            <p class="card-subtitle-text"><code>&lt;th&gt;</code> elements present across multiple levels but missing <code>scope="col"</code> / <code>scope="row"</code></p>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1.5 fw-semibold">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 1.3.1 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-secondary mb-3">
            Without explicit <code>scope</code> or <code>id</code>/<code>headers</code> associations, assistive tech cannot resolve whether headers apply to columns or groups:
        </p>
        <div class="test-sandbox-zone">
            <div class="test-sandbox-label"><i class="bi bi-code-slash"></i> Intentional Failure Sandbox:</div>
            <!-- TH elements present but missing scope attribute for ambiguous relationships -->
            <table class="table table-bordered w-100" border="1">
                <thead>
                    <tr class="table-secondary">
                        <th></th>
                        <th colspan="2">2020</th>
                        <th colspan="2">2021</th>
                    </tr>
                    <tr class="table-light">
                        <th>City</th>
                        <th>Q1</th>
                        <th>Q2</th>
                        <th>Q1</th>
                        <th>Q2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>London</td>
                        <td>10</td>
                        <td>20</td>
                        <td>15</td>
                        <td>25</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Test 3: Data Table Missing Headers Entirely -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="card-title-main">3. Data Table with Missing Header Row Entirely</h2>
            <p class="card-subtitle-text">Product data rendered with raw data cells and no table header row</p>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1.5 fw-semibold">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> WCAG 1.3.1 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-secondary mb-3">
            Data values have no programmatic column or row labels:
        </p>
        <div class="test-sandbox-zone">
            <div class="test-sandbox-label"><i class="bi bi-code-slash"></i> Intentional Failure Sandbox:</div>
            <table class="table table-bordered w-100" border="1">
                <tbody>
                    <tr>
                        <td>Product A</td>
                        <td>$10</td>
                        <td>In Stock</td>
                    </tr>
                    <tr>
                        <td>Product B</td>
                        <td>$20</td>
                        <td>Out of Stock</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Test 4: Layout Table Used for Page Columns -->
<div class="test-section-card card-aa">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="card-title-main">4. Layout Table for Multi-Column Content</h2>
            <p class="card-subtitle-text">Table used for visual side-by-side positioning without presentation role</p>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2.5 py-1.5 fw-semibold">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Layout Table Pattern
        </span>
    </div>
    <div class="card-body">
        <p class="small text-secondary mb-3">
            Using table markup for layout purposes interferes with screen reader reading order and responsive mobile reflow:
        </p>
        <div class="test-sandbox-zone">
            <div class="test-sandbox-label"><i class="bi bi-code-slash"></i> Intentional Failure Sandbox:</div>
            <!-- Table related elements used for layout purposes -->
            <table border="0" cellpadding="12" cellspacing="0" role="presentation" class="w-100 bg-white border rounded">
                <tr>
                    <td style="width: 35%; vertical-align: top; border-right: 1px solid #e2e8f0;">
                        <h6 class="fw-bold mb-2 text-dark">Simulated Sidebar Nav</h6>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1"><a href="#" class="text-decoration-none text-primary">&bull; Dashboard Link</a></li>
                            <li><a href="#" class="text-decoration-none text-primary">&bull; Settings Link</a></li>
                        </ul>
                    </td>
                    <td style="width: 65%; vertical-align: top; padding-left: 1.5rem;">
                        <h6 class="fw-bold mb-2 text-dark">Simulated Main Content</h6>
                        <p class="small mb-0 text-secondary">This content is laid out using a multi-cell table structure rather than CSS Flexbox/Grid.</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Test 5: Nested Layout Tables -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="card-title-main">5. Nested Tables for Layout Alignment</h2>
            <p class="card-subtitle-text">Table nested inside table cell without semantic data structure</p>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1.5 fw-semibold">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Nested Table Violation
        </span>
    </div>
    <div class="card-body">
        <p class="small text-secondary mb-3">
            Deeply nested layout tables create confusing screen reader announcements and severe reflow issues:
        </p>
        <div class="test-sandbox-zone">
            <div class="test-sandbox-label"><i class="bi bi-code-slash"></i> Intentional Failure Sandbox:</div>
            <table class="table table-bordered w-100">
                <tr>
                    <td class="p-3 bg-white">
                        <span class="fw-bold d-block mb-2 text-secondary small text-uppercase">Outer Table Container</span>
                        <table class="table table-sm table-warning mb-0 border">
                            <tr>
                                <td class="p-2"><strong>Nested Item 1:</strong> Content inside nested child table</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>