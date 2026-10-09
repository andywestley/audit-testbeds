<?php
if (!isset($base_path)) {
    $base_path = '/';
}
?>
<footer class="mt-auto bg-dark text-light border-top border-secondary-subtle py-4">
  <div class="container-fluid px-lg-4">
    <div class="row align-items-center justify-content-between g-3">
      <div class="col-md-6 text-center text-md-start">
        <div class="d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
          <span class="badge bg-info text-dark"><i class="bi bi-person-fill-check"></i></span>
          <span class="fw-bold">COGA Cognitive Accessibility Testbed</span>
          <span class="text-white-50 small">| W3C COGA Compliance Suite</span>
        </div>
        <p class="small text-white-50 mb-0 mt-1">
          Designed for automated cognitive heuristics auditing, DOM inspection, and developer training.
        </p>
      </div>

      <div class="col-md-6 text-center text-md-end">
        <div class="d-flex align-items-center justify-content-center justify-content-md-end gap-3 small">
          <a href="<?= $base_path ?>index.php" class="text-white-50 text-decoration-none hover-white">
            <i class="bi bi-grid-fill me-1"></i> Guidelines Matrix
          </a>
          <span class="text-white-50">&bull;</span>
          <a href="<?= $base_path ?>guidelines/g1.php" class="text-info text-decoration-none">
            <i class="bi bi-arrow-repeat me-1"></i> Crawler Route
          </a>
          <span class="text-white-50">&bull;</span>
          <span class="badge bg-secondary">PHP 8.2+ / Plesk VPS</span>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Testbed Interactivity JS -->
<script src="<?= $base_path ?>js/main.js"></script>
</body>
</html>