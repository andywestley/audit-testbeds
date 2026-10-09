<?php
$pageTitle = 'Long Page (No Scroll Escape Demo)';
$basePath = '';

require_once __DIR__ . '/includes/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?> | UX Usability Testbed</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

    <!-- STATIC HEADER (NO sticky-top, NO fixed-top) -->
    <header class="bg-dark text-white py-3 border-bottom" style="position: static;">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-danger fs-6 p-2"><i class="bi bi-speedometer2"></i></span>
                <span class="fs-5 fw-bold">UX Usability <span class="text-danger fw-normal">Failing Long Page</span></span>
            </div>
            <a href="index.php" class="btn btn-outline-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Benchmark Matrix
            </a>
        </div>
    </header>

    <main class="py-4">
        <div class="container my-4">
            <!-- Diagnostic Banner -->
            <div class="alert alert-danger d-flex align-items-start gap-3 shadow-sm mb-4">
                <i class="bi bi-exclamation-triangle-fill fs-4 text-danger flex-shrink-0 mt-1"></i>
                <div>
                    <h5 class="alert-heading fw-bold mb-1">Intentional Failure Test: Long Page Scroll Escape Missing (Rule: ux-scroll-escape-missing)</h5>
                    <p class="small mb-0 text-secondary">
                        This page exceeds <strong>3,600px in vertical scroll height</strong>. The header above is positioned statically (scrolls away and disappears immediately), and there are <strong>NO "Back to top" links (no href="#", no .back-to-top) and NO floating escape controls</strong>. Users must manually scroll through the entire page.
                    </p>
                </div>
            </div>

            <div class="card border-danger border-opacity-25 shadow-sm p-4 bg-white mb-5">
                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
                    <div>
                        <h2 class="h5 fw-bold text-dark mb-0">Long-Form Corpus &sect;1 to &sect;12 (Exceeds 3,600px Height)</h2>
                        <small class="text-muted">Repetitive deep scroll content without escape controls.</small>
                    </div>
                    <span class="badge bg-danger">Scroll Height &gt; 3,600px</span>
                </div>

                <?php for ($chapter = 1; $chapter <= 12; $chapter++): ?>
                    <section class="mb-5 pb-4 border-bottom border-light-subtle" style="min-height: 280px;">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-danger-subtle text-danger">Section <?= $chapter ?>.0</span>
                            <h3 class="h6 fw-bold mb-0">Human-Computer Interaction Deep Document &sect;<?= $chapter ?></h3>
                        </div>
                        <p class="text-secondary leading-relaxed">
                            In digital product ergonomics, requiring users to scroll past multiple screen viewports without providing wayfinding landmarks or a sticky header increases cognitive disorientation and physical fatigue. Users who scroll deeply into lengthy terms of service, technical specifications, or catalogs lose access to the site navigation.
                        </p>
                        <div class="p-3 bg-light rounded-3 mb-3 border">
                            <h4 class="small fw-bold text-dark mb-1"><i class="bi bi-journal-text text-danger me-1"></i> Empirical Usability Benchmark &sect;<?= $chapter ?></h4>
                            <p class="small text-muted mb-0">
                                Studies by the Baymard Institute highlight that without a persistent header or floating return control, users spend 30% more time re-locating navigation menus and experience higher abandonment rates.
                            </p>
                        </div>
                        <p class="text-secondary small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </section>
                <?php endfor; ?>

                <div class="p-4 bg-danger bg-opacity-10 text-center rounded-3 border border-danger">
                    <h5 class="fw-bold text-danger mb-2">End of Long Page (3,600px Depth)</h5>
                    <p class="text-muted small mb-0">
                        Notice that there is no "Back to top" button anywhere on this page, requiring you to manually scroll all the way back up.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER (NO back to top links) -->
    <footer class="py-4 bg-dark text-white-50 border-top mt-auto">
        <div class="container text-center small">
            &copy; <?= date('Y') ?> UX Usability Testbed. Intentional failure test page for <code>ux-scroll-escape-missing</code>.
        </div>
    </footer>

</body>
</html>
