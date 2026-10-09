<?php
$pageTitle = 'Cookie & Privacy Policy';
$basePath = '';
$currentSlug = 'cookie-policy';

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<main class="py-4">
  <div class="container-fluid px-lg-4">
    <div class="card border-0 shadow-sm p-4 p-md-5 bg-white mb-4">
      <div class="d-flex align-items-center gap-2 mb-3">
        <span class="badge bg-primary px-2 py-1"><i class="bi bi-shield-lock-fill me-1"></i> Privacy &amp; Governance</span>
        <span class="badge bg-secondary-subtle text-secondary">GDPR &amp; ePrivacy Compliant</span>
      </div>
      
      <h1 class="h2 fw-bold text-dark mb-3">Cookie &amp; Privacy Policy</h1>
      <p class="lead text-muted mb-4">
        This website (<strong>UX &amp; Usability Heuristics Testbed</strong>) is an automated and manual benchmarking environment. We believe in complete transparency, ethical UX, and user privacy.
      </p>

      <hr class="my-4">

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-gear-fill text-primary me-2"></i>1. Functional &amp; Essential Cookies</h3>
            <p class="text-secondary small mb-0">
              We do not set any tracking cookies that are strictly necessary for core static browsing. You can explore all testbed pages, benchmarks, and code snippets without essential cookies being forced onto your device.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-graph-up-arrow text-success me-2"></i>2. Analytics &amp; Performance (GA4 / GTM)</h3>
            <p class="text-secondary small mb-0">
              When consented, we utilize Google Tag Manager (GTM) and Google Analytics 4 (GA4) to evaluate page engagement, verify test route crawling, and benchmark scanner performance. Analytics storage is set to <code>denied</code> by default until explicit consent is given.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-check2-circle text-info me-2"></i>3. Silktide Consent Manager</h3>
            <p class="text-secondary small mb-0">
              User cookie consent choices are managed via the Silktide Consent Manager standard. Your privacy preferences are recorded locally in <code>localStorage</code> (<code>stcm.consent.*</code> / <code>silktideCookieChoice_*</code>) without transmitting unnecessary personal data.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-sliders text-warning me-2"></i>4. Managing Your Preferences</h3>
            <p class="text-secondary small mb-0">
              You can adjust or revoke your cookie choices at any time through your browser's site settings or by clearing your local storage preferences.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
