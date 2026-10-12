<?php
$pageTitle = 'Cookie & Privacy Policy';
$basePath = isset($basePath) ? $basePath : (isset($base_path) ? $base_path : '');
$currentSlug = 'cookie-policy';

if (file_exists(__DIR__ . '/includes/data.php')) {
    require_once __DIR__ . '/includes/data.php';
}
require_once __DIR__ . '/includes/header.php';
if (file_exists(__DIR__ . '/includes/navbar.php')) {
    require_once __DIR__ . '/includes/navbar.php';
}
?>

<main class="py-4">
  <div class="container-fluid px-lg-4">
    <div class="card border-0 shadow-sm p-4 p-md-5 bg-white mb-4">
      <div class="d-flex align-items-center gap-2 mb-3">
        <span class="badge bg-primary px-2 py-1"><i class="bi bi-shield-lock-fill me-1"></i> Privacy &amp; Transparency</span>
        <span class="badge bg-secondary-subtle text-secondary">GDPR &amp; ePrivacy Compliant</span>
      </div>
      
      <h1 class="h2 fw-bold text-dark mb-3">Cookie &amp; Privacy Policy</h1>
      <p class="lead text-muted mb-4">
        I believe in complete transparency and minimal data collection. This website is a benchmark and testing environment created and maintained by Andrew Westley. I only use cookies and browser storage strictly required for core operations and, with your permission, privacy-respecting analytics. I do not use advertising cookies, I do not profile your identity, and I do not share or sell your data.
      </p>

      <hr class="my-4">

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-gear-fill text-primary me-2"></i>1. Essential &amp; Functional Storage</h3>
            <p class="text-secondary small mb-2">
              I do not set persistent tracking cookies for basic browsing. You can explore all benchmark pages, guidelines, and code snippets without essential cookies being forced onto your device.
            </p>
            <p class="text-secondary small mb-0">
              When you make cookie choices, I record your consent in browser <code>localStorage</code> (<code>stcm.consent.*</code> and <code>silktideCookieChoice_*</code>) so I remember your preferences and do not repeatedly prompt you on future visits.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-graph-up-arrow text-success me-2"></i>2. Analytics &amp; Performance (GTM &amp; GA4)</h3>
            <p class="text-secondary small mb-2">
              With your permission, I use Google Tag Manager and Google Analytics 4 to evaluate page performance, verify test route crawling, and benchmark scanner reliability. This operates under <strong>Google Consent Mode v2</strong>:
            </p>
            <ul class="text-secondary small mb-0 ps-3">
              <li><strong>Denied by Default:</strong> Analytics storage is set to <code>denied</code> before any scripts load. Google Analytics sends only cookieless, anonymized telemetry pings. No persistent <code>_ga</code> tracking cookies are read or created.</li>
              <li><strong>Opt-In Elevation:</strong> If you grant consent via the cookie banner, Google Analytics is permitted to set performance cookies to associate page views within your active session.</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-check2-circle text-info me-2"></i>3. Silktide Consent Manager</h3>
            <p class="text-secondary small mb-0">
              Your consent preferences are managed via the Silktide Consent Manager. Your choices are stored locally on your device and are never transmitted to third parties or used across external sites.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="p-4 rounded-3 bg-light border h-100">
            <h3 class="h5 fw-bold text-dark mb-2"><i class="bi bi-sliders text-warning me-2"></i>4. Managing or Withdrawing Consent</h3>
            <p class="text-secondary small mb-3">
              You can review, change, or withdraw your cookie consent choices at any time. Click the button below, or click the small floating cookie badge (&#x1F36A;) docked at the bottom-left corner of every page:
            </p>
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="openCookiePreferences()">
              <i class="bi bi-sliders me-1"></i> Manage Cookie Preferences
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
function openCookiePreferences() {
  if (window.silktideConsentManager && typeof window.silktideConsentManager.showPreferences === 'function') {
    window.silktideConsentManager.showPreferences();
  } else {
    var icon = document.getElementById('stcm-cookie-icon') || document.getElementById('silktide-cookie-icon');
    if (icon) {
      icon.click();
    }
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
