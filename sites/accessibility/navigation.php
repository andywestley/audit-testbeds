<?php
$pageTitle = 'Bypass Blocks & Navigation Structure';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 2.4.1 / Usability Nav',
    'name' => 'Bypass Blocks & Navigation Structure',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 2.4.1 (Level A) & NN/g Navigation Heuristics: A mechanism must be available to bypass blocks of content that are repeated on multiple Web pages. Navigation must use semantic landmarks and avoid unorganized flat button menus.',
    'trigger_summary' => 'Missing skip-to-content link, non-semantic <div> navigation container without ARIA landmark, and 24 flat unorganized button links.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Overview Description -->
<div class="alert alert-warning d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-exclamation-triangle-fill fs-4 text-warning flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Failure Test: Poor / Long Non-Semantic Navigation</h5>
        <p class="small mb-0 text-secondary">
            This test page preserves the original deliberate failure pattern: a non-semantic <code>&lt;div&gt;</code> navigation bar containing <strong>24 flat button links</strong> without list markup (<code>&lt;ul&gt;</code>/<code>&lt;li&gt;</code>), without a <code>&lt;nav&gt;</code> landmark, and without a "Skip to Main Content" mechanism. Screen reader and keyboard users are forced to tab through every button to reach the content.
        </p>
    </div>
</div>

<div class="row g-4">
    <!-- Section A: Intentional Failure -->
    <div class="col-lg-6">
        <div class="test-section-card h-100 border-danger">
            <div class="card-header bg-danger bg-opacity-10 border-danger d-flex justify-content-between align-items-center">
                <span class="badge bg-danger">Section A (Intentional Failure)</span>
                <span class="small text-danger fw-bold"><i class="bi bi-x-circle-fill me-1"></i> WCAG 2.4.1 Violation</span>
            </div>
            <div class="card-body">
                <h5 class="fw-bold mb-2">Non-Semantic Flat 24-Button Navigation (No Skip Link)</h5>
                <p class="small text-muted mb-3">
                    Try navigating this simulated header using only your <kbd>Tab</kbd> key. Notice there is no skip link and all 24 links are rendered as flat inline <code>&lt;a class="btn"&gt;</code> tags without <code>&lt;nav&gt;</code> or hierarchical grouping:
                </p>

                <div class="test-sandbox-zone border-danger border-opacity-50 bg-light p-3">
                    <!-- Non-semantic navigation maintained -->
                    <div class="d-flex flex-wrap gap-1 p-2 bg-light border rounded align-items-center justify-content-center">
                        <div><a href="index.php" class="btn btn-primary btn-sm">Home</a></div>
                        <div><a href="journeys/index.php" class="btn btn-success btn-sm">Journeys</a></div>
                        <div><a href="cognitive/index.php" class="btn btn-info btn-sm">Cognitive</a></div>
                        <div><a href="heuristics/index.php" class="btn btn-warning btn-sm">Heuristics</a></div>
                        <div><a href="best_practices.php" class="btn btn-outline-secondary btn-sm">Best Practices</a></div>
                        <div><a href="images.php" class="btn btn-outline-secondary btn-sm">Images</a></div>
                        <div><a href="structure.php" class="btn btn-outline-secondary btn-sm">Structure</a></div>
                        <div><a href="tables.php" class="btn btn-outline-secondary btn-sm">Tables</a></div>
                        <div><a href="links.php" class="btn btn-outline-secondary btn-sm">Links</a></div>
                        <div><a href="media.php" class="btn btn-outline-secondary btn-sm">Media</a></div>
                        <div><a href="typography.php" class="btn btn-outline-secondary btn-sm">Typography</a></div>
                        <div><a href="forms_basic.php" class="btn btn-outline-secondary btn-sm">Basic Forms</a></div>
                        <div><a href="forms_advanced.php" class="btn btn-outline-secondary btn-sm">Advanced Forms</a></div>
                        <div><a href="keyboard_traps.php" class="btn btn-outline-secondary btn-sm">Keyboard Traps</a></div>
                        <div><a href="focus_order.php" class="btn btn-outline-secondary btn-sm">Focus Order</a></div>
                        <div><a href="interactive.php" class="btn btn-outline-secondary btn-sm">Interactive</a></div>
                        <div><a href="contrast.php" class="btn btn-outline-secondary btn-sm">Contrast</a></div>
                        <div><a href="zoom_responsive.php" class="btn btn-outline-secondary btn-sm">Zoom/Responsive</a></div>
                        <div><a href="flashing.php" class="btn btn-outline-secondary btn-sm">Flashing</a></div>
                        <div><a href="orientation.php" class="btn btn-outline-secondary btn-sm">Orientation</a></div>
                        <div><a href="aria_bad.php" class="btn btn-outline-secondary btn-sm">Bad ARIA</a></div>
                        <div><a href="parsing.php" class="btn btn-outline-secondary btn-sm">Parsing</a></div>
                        <div><a href="language.php" class="btn btn-outline-secondary btn-sm">Language</a></div>
                        <div><a href="iframes.php" class="btn btn-outline-secondary btn-sm">Iframes</a></div>
                    </div>

                    <div class="mt-3 p-2 bg-white rounded border text-muted small">
                        <strong>Simulated Destination:</strong> Tabbing reaches this main section only after passing through 24 individual top-level buttons.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section B: Remediated Standard -->
    <div class="col-lg-6">
        <div class="test-section-card h-100 border-success">
            <div class="card-header bg-success bg-opacity-10 border-success d-flex justify-content-between align-items-center">
                <span class="badge bg-success">Section B (Remediated Standard)</span>
                <span class="small text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i> WCAG 2.4.1 Compliant</span>
            </div>
            <div class="card-body">
                <h5 class="fw-bold mb-2">Hierarchical Semantic Navigation with Skip Link</h5>
                <p class="small text-muted mb-3">
                    Compliant pattern featuring a visible-on-focus skip link, a semantic <code>&lt;nav aria-label="..."&gt;</code> landmark, and structured dropdown menus:
                </p>

                <div class="test-sandbox-zone border-success border-opacity-50 bg-light p-3 position-relative">
                    <!-- Skip link inside sandbox -->
                    <a class="btn btn-sm btn-primary mb-2 d-inline-block" href="#remediated-target">
                        <i class="bi bi-arrow-down-circle me-1"></i> Skip to Remediated Content
                    </a>

                    <nav class="navbar navbar-expand-sm navbar-dark bg-dark rounded p-2" aria-label="Remediated Demo Nav">
                        <div class="container-fluid">
                            <span class="navbar-brand fs-6 fw-bold">Demo Suite</span>
                            <ul class="navbar-nav me-auto mb-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle py-1 px-2 text-white" href="#" role="button" data-bs-toggle="dropdown">POUR Categories</a>
                                    <ul class="dropdown-menu dropdown-menu-dark shadow">
                                        <li><a class="dropdown-item small" href="images.php">1. Perceivable</a></li>
                                        <li><a class="dropdown-item small" href="interactive.php">2. Operable</a></li>
                                        <li><a class="dropdown-item small" href="language.php">3. Understandable</a></li>
                                        <li><a class="dropdown-item small" href="parsing.php">4. Robust</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div id="remediated-target" class="mt-3 p-2 bg-white rounded border text-success small">
                        <strong>Remediated Target:</strong> Screen reader &amp; keyboard users can instantly bypass repetitive navigation menus.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>