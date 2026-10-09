<?php
if (!isset($basePath)) {
    $basePath = '';
}
?>
<footer class="mt-auto bg-dark text-light border-top border-secondary-subtle py-4">
  <div class="container-fluid px-lg-4">
    <div class="row align-items-center justify-content-between g-3">
      <div class="col-md-6 text-center text-md-start">
        <div class="d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
          <span class="badge bg-primary"><i class="bi bi-speedometer2"></i></span>
          <span class="fw-bold">UxScanner Benchmark Testbed</span>
          <span class="text-white-50 small">| NN/g &amp; Baymard Compliance Suite</span>
        </div>
        <p class="small text-white-50 mb-0 mt-1">
          Designed for automated heuristics auditing, static DOM inspection, and manual usability review.
        </p>
      </div>

      <div class="col-md-6 text-center text-md-end">
        <div class="d-flex align-items-center justify-content-center justify-content-md-end gap-3 small">
          <a href="<?= $basePath ?>index.php" class="text-white-50 text-decoration-none hover-white">
            <i class="bi bi-grid-fill me-1"></i> Catalog Matrix
          </a>
          <span class="text-white-50">&bull;</span>
          <a href="<?= $basePath ?>cookie_policy.php" class="text-white-50 text-decoration-none hover-white">
            <i class="bi bi-shield-check me-1"></i> Cookie Policy
          </a>
          <span class="text-white-50">&bull;</span>
          <a href="<?= $basePath ?>tests/inputmode-missing.php" class="text-info text-decoration-none">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Silktide Consent Manager JS -->
<?php if (file_exists(__DIR__ . '/../assets/shared/js/silktide-consent-manager.min.js')): ?>
<script src="<?= $basePath ?>assets/shared/js/silktide-consent-manager.min.js"></script>
<?php elseif (file_exists(__DIR__ . '/../assets/shared/js/silktide-consent-manager.js')): ?>
<script src="<?= $basePath ?>assets/shared/js/silktide-consent-manager.js"></script>
<?php endif; ?>

<!-- Custom Testbed Interactivity JS -->
<script src="<?= $basePath ?>assets/js/main.min.js"></script>
</body>
</html>
