<?php
$currentSlug = 'ugc-governance';
require_once __DIR__ . '/includes/data.php';

$currentTest = $tests[$currentSlug] ?? [
    'slug' => 'ugc-governance',
    'file' => 'ugc-governance.php',
    'compare_file' => 'ugc-governance.php#flagged-ugc-section',
    'rule' => 'ugc-scope-exclusion',
    'name' => 'User-Generated Content (UGC) & Scope Exclusion',
    'pillar' => 'pillar-clarity',
    'severity' => 'Info',
    'severity_class' => 'info',
    'citation' => 'Automated Content Scanner Heuristics: "User-authored content, reviews, and external discussions can be isolated via UGC flags or custom CSS selectors to prevent casual user phrasing from degrading audited editorial scores."',
    'trigger_summary' => 'Side-by-side benchmark verifying scanner behavior: Unflagged UGC (fails audit), Standard Flagged UGC with data-ugc="true" (stripped when Exclude UGC setting is ON), and Custom Selectors (.customer-story-card).'
];

$pageTitle = $currentTest['name'];
require_once __DIR__ . '/includes/header.php';
?>

<main class="py-4">
  <div class="container-fluid px-lg-4">
    <?php require_once __DIR__ . '/includes/diagnostic_header.php'; ?>

    <!-- Content Scanner Verification Guide & Configuration Banner -->
    <div class="alert alert-dark border-secondary shadow-sm p-4 mb-4 rounded-3 text-light">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pb-2 border-bottom border-secondary border-opacity-50">
        <div class="d-flex align-items-center gap-2">
          <span class="badge bg-warning text-dark px-2 py-1 fs-6"><i class="bi bi-gear-wide-connected"></i></span>
          <h2 class="h5 fw-bold mb-0 text-white">Content Quality &amp; Governance: Testing UGC Scope Exclusions</h2>
        </div>
        <span class="badge bg-secondary-subtle text-light border border-secondary">Audit Governance Suite</span>
      </div>

      <p class="text-white-50 small mb-3">
        Automated accessibility and readability scanners parse user reviews, testimonials, and comments by default. Because visitors write casually, these sections frequently fail cognitive and clarity heuristics (<code class="text-warning">coga-passive</code>, <code class="text-warning">coga-intensify</code>, <code class="text-warning">coga-cliches</code>, <code class="text-warning">coga-simplify</code>). Use the scenarios below to validate automated scanner scope exclusion features:
      </p>

      <div class="row g-3">
        <div class="col-md-4">
          <div class="p-3 rounded-2 bg-black bg-opacity-25 border border-danger border-opacity-50 h-100">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="badge bg-danger text-white"><i class="bi bi-x-circle me-1"></i> Mode 1: Default (UGC OFF)</span>
              <span class="small text-danger fw-bold">All 3 Scenarios Fail</span>
            </div>
            <div class="small text-white-50">
              With <strong>Exclude UGC</strong> toggled <em>OFF</em>, the scanner audits all three sections. Every section triggers readability warnings and cognitive flaws.
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="p-3 rounded-2 bg-black bg-opacity-25 border border-success border-opacity-50 h-100">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i> Mode 2: Exclude UGC ON</span>
              <span class="small text-success fw-bold">Section 2 Ignored</span>
            </div>
            <div class="small text-white-50">
              When <strong>Exclude UGC</strong> is enabled in scanner settings, the parser automatically strips elements with <code class="text-info">data-ugc="true"</code>, <code class="text-info">class="ugc"</code>, or <code class="text-info">data-audit-ignore="content"</code>.
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="p-3 rounded-2 bg-black bg-opacity-25 border border-primary border-opacity-50 h-100">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span class="badge bg-primary text-white"><i class="bi bi-sliders me-1"></i> Mode 3: Custom Selector</span>
              <span class="small text-primary fw-bold">Section 3 Excluded</span>
            </div>
            <div class="small text-white-50">
              In crawler <em>Scope Settings &gt; Exclude Elements by Selector</em>, enter <code class="text-warning">.customer-story-card</code>. The scanner strips Section 3 prior to NLP analysis.
            </div>
          </div>
        </div>
      </div>

      <!-- Live Interactive Simulator Controls -->
      <div class="mt-4 pt-3 border-top border-secondary border-opacity-50 d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-sliders2 text-warning fs-5"></i>
          <span class="fw-bold small text-white">Live Simulator Preview:</span>
          <span class="text-white-50 small">Toggle settings below to visualize DOM exclusion behavior:</span>
        </div>
        <div class="btn-group btn-group-sm" role="group" aria-label="Audit exclusion simulator">
          <button type="button" class="btn btn-outline-warning active" id="sim-default" onclick="setAuditSimulation('default')">
            <i class="bi bi-eye-fill me-1"></i> Default (UGC OFF)
          </button>
          <button type="button" class="btn btn-outline-warning" id="sim-ugc" onclick="setAuditSimulation('ugc-on')">
            <i class="bi bi-shield-slash-fill me-1"></i> Exclude UGC ON
          </button>
          <button type="button" class="btn btn-outline-warning" id="sim-custom" onclick="setAuditSimulation('custom-on')">
            <i class="bi bi-code-slash me-1"></i> Custom Selector ON
          </button>
          <button type="button" class="btn btn-outline-warning" id="sim-both" onclick="setAuditSimulation('both-on')">
            <i class="bi bi-check2-all me-1"></i> Both Active
          </button>
        </div>
      </div>
    </div>

    <!-- 3 Scenarios Container -->
    <div class="row g-4 mb-5">
      
      <!-- ========================================================================= -->
      <!-- SCENARIO 1: Unflagged User Content (Baseline / Control — Fails Audit)     -->
      <!-- ========================================================================= -->
      <div class="col-12">
        <section id="unflagged-ugc-section" class="mb-5 test-scenario-card">
          <div class="card border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-danger bg-opacity-10 py-3 border-bottom border-danger-subtle d-flex flex-wrap align-items-center justify-content-between gap-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-danger text-white px-2 py-1"><i class="bi bi-1-circle-fill me-1"></i> Scenario 1</span>
                <h2 class="h5 fw-bold mb-0 text-danger">Community Feedback (Unflagged Baseline)</h2>
              </div>
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1" id="badge-sec-1">
                  <i class="bi bi-exclamation-triangle-fill me-1"></i> Scanner Status: Evaluated &amp; Flagged
                </span>
                <span class="badge bg-light text-dark border">No UGC Attributes</span>
              </div>
            </div>

            <div class="card-body p-4">
              <div class="alert alert-danger bg-danger bg-opacity-10 border-danger-subtle text-danger small mb-4">
                <strong><i class="bi bi-info-circle-fill me-1"></i> Control Condition:</strong> This section contains authentic community comments without any UGC tags or wrapper attributes. Because it lacks markup flags, automated content scanners evaluate every word against readability standards, triggering multiple cognitive and clarity warnings.
              </div>

              <!-- Deliberate Failing Snippet 1 (Exact requirement) -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-person-circle me-1 text-secondary"></i> Posted by Sarah M. — 2 hours ago
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-intensify">coga-intensify</span>
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-passive">coga-passive</span>
                  </div>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  I basically think this tool is actually quite great. Goes to the website on my phone to find the refund policy, but it is buried in the footer. The label was printed by my sister.
                </p>
              </div>

              <!-- Deliberate Failing Snippet 2 (Comprehensive heuristic triggers) -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-person-circle me-1 text-secondary"></i> Posted by David K. — 5 hours ago
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-cliches">coga-cliches</span>
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-simplify">coga-simplify</span>
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-passive">coga-passive</span>
                  </div>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  At the end of the day, it's low-hanging fruit. I utilized this software to facilitate team discussions, but the confirmation email was never received by our coordinator. Goes to find the settings, which was difficult to find.
                </p>
              </div>

              <!-- Deliberate Failing Snippet 3 (Additional passive voice & weasel words) -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-person-circle me-1 text-secondary"></i> Posted by Elena R. — Yesterday
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-passive">coga-passive</span>
                    <span class="badge bg-warning-subtle text-dark border small" title="coga-intensify">coga-intensify</span>
                  </div>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  The request was submitted by my colleague last Thursday. We actually feel that it is extremely convoluted and basically confusing for elderly users.
                </p>
              </div>

              <!-- Diagnostic Analysis Breakdown -->
              <div class="p-3 bg-light rounded border small text-muted mt-3">
                <div class="fw-bold text-dark mb-1"><i class="bi bi-bug-fill text-danger me-1"></i> Why this section fails the audit:</div>
                <ul class="mb-0 ps-3">
                  <li><strong>Filler &amp; Weasel words (<code class="text-dark">coga-intensify</code>):</strong> <em>"basically", "actually", "quite", "extremely"</em> dilute directness.</li>
                  <li><strong>Weak wording &amp; sentence fragments (<code class="text-dark">coga-intensify</code>):</strong> <em>"Goes to find the settings, which was difficult to find."</em></li>
                  <li><strong>Passive voice (<code class="text-dark">coga-passive</code>):</strong> <em>"The label was printed by my sister", "was never received by our coordinator", "The request was submitted by my colleague"</em>.</li>
                  <li><strong>Clichés &amp; idioms (<code class="text-dark">coga-cliches</code>):</strong> <em>"At the end of the day", "low-hanging fruit"</em>.</li>
                  <li><strong>Complex vocabulary (<code class="text-dark">coga-simplify</code>):</strong> <em>"utilized"</em> (recommend: <em>use</em>), <em>"facilitate"</em> (recommend: <em>help/ease</em>).</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- ========================================================================= -->
      <!-- SCENARIO 2: Flagged UGC (Ignored by Scanner when Exclude UGC Setting is ON)-->
      <!-- ========================================================================= -->
      <div class="col-12">
        <section id="flagged-ugc-section" class="mb-5 ugc test-scenario-card" data-ugc="true" data-audit-ignore="content">
          <div class="card border-0 shadow-sm overflow-hidden" id="card-sec-2">
            <div class="card-header bg-success bg-opacity-10 py-3 border-bottom border-success-subtle d-flex flex-wrap align-items-center justify-content-between gap-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-success text-white px-2 py-1"><i class="bi bi-2-circle-fill me-1"></i> Scenario 2</span>
                <h2 class="h5 fw-bold mb-0 text-success">Verified Customer Reviews (Flagged UGC)</h2>
              </div>
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" id="badge-sec-2">
                  <i class="bi bi-shield-check me-1"></i> data-ugc="true" &bull; class="ugc" &bull; data-audit-ignore="content"
                </span>
                <span class="badge bg-light text-dark border">Standard UGC Attributes</span>
              </div>
            </div>

            <div class="card-body p-4">
              <div class="alert alert-success bg-success bg-opacity-10 border-success-subtle text-success small mb-4">
                <strong><i class="bi bi-check-circle-fill me-1"></i> Scanner Exclusion Rule:</strong> This section contains casual comments with the same cognitive triggers as Scenario 1, but is decorated with standard attributes: <code class="text-dark">data-ugc="true"</code>, <code class="text-dark">class="ugc"</code>, and <code class="text-dark">data-audit-ignore="content"</code>. When the crawler's <strong>Exclude UGC</strong> option is enabled, the crawler automatically prunes this subtree before auditing.
              </div>

              <!-- Flagged Comment 1 -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card" data-ugc="true">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-patch-check-fill text-success me-1"></i> Marcus T. (Verified Buyer) — 3 days ago
                  </div>
                  <span class="badge bg-success-subtle text-success border small">data-ugc="true"</span>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  It was discovered by our team that the software is extremely and basically very confusing at the end of the day. The onboarding guide was written by an amateur, and finding the API keys was practically impossible.
                </p>
              </div>

              <!-- Flagged Comment 2 -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card" data-ugc="true">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-patch-check-fill text-success me-1"></i> Priya N. (Enterprise Admin) — 1 week ago
                  </div>
                  <span class="badge bg-success-subtle text-success border small">data-ugc="true"</span>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  We utilized the platform to facilitate automated reporting across three regional divisions. Basically, it is quite sluggish when huge spreadsheets are uploaded by team members. Without a shadow of a doubt, it's a win-win scenario once set up properly.
                </p>
              </div>

              <!-- Flagged Comment 3 -->
              <div class="card p-3 mb-3 border bg-white shadow-sm user-review-card" data-ugc="true">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <div class="user-meta text-muted small fw-medium">
                    <i class="bi bi-patch-check-fill text-success me-1"></i> Liam O. (User Feedback) — 2 weeks ago
                  </div>
                  <span class="badge bg-success-subtle text-success border small">data-ugc="true"</span>
                </div>
                <p class="mb-0 fs-6 text-dark">
                  The initial configuration was completed by our IT contractor. Needless to say, it is what it is, and several unexpected runtime defects were encountered by our analysts.
                </p>
              </div>

              <!-- Code Verification Snippet -->
              <div class="p-3 bg-dark rounded border border-secondary text-light small mt-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="text-white-50 fw-bold"><i class="bi bi-code-slash text-warning me-1"></i> Container Markup Snapshot:</span>
                  <span class="badge bg-secondary">HTML5 Semantic Exclusions</span>
                </div>
                <pre class="mb-0 text-warning" style="white-space: pre-wrap; font-family: monospace;">&lt;section id="flagged-ugc-section" class="ugc" data-ugc="true" data-audit-ignore="content"&gt;
  &lt;!-- Scanner automatically prunes this subtree when "Exclude UGC" is active --&gt;
&lt;/section&gt;</pre>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- ========================================================================= -->
      <!-- SCENARIO 3: Custom Selector UGC (Setting Exclusion Test)                  -->
      <!-- ========================================================================= -->
      <div class="col-12">
        <section id="custom-selector-ugc-section" class="mb-5 test-scenario-card">
          <div class="card border-0 shadow-sm overflow-hidden" id="card-sec-3">
            <div class="card-header bg-primary bg-opacity-10 py-3 border-bottom border-primary-subtle d-flex flex-wrap align-items-center justify-content-between gap-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary text-white px-2 py-1"><i class="bi bi-3-circle-fill me-1"></i> Scenario 3</span>
                <h2 class="h5 fw-bold mb-0 text-primary">Customer Stories &amp; Testimonials (Custom Selector Exclusion)</h2>
              </div>
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1" id="badge-sec-3">
                  <i class="bi bi-bullseye me-1"></i> Target Selector: <code>.customer-story-card</code>
                </span>
                <span class="badge bg-light text-dark border">CSS Selector Exclusion</span>
              </div>
            </div>

            <div class="card-body p-4">
              <div class="alert alert-primary bg-primary bg-opacity-10 border-primary-subtle text-primary small mb-4">
                <strong><i class="bi bi-gear-fill me-1"></i> Custom Selector Rule:</strong> Websites often use proprietary CMS widgets or custom design cards rather than generic <code class="text-dark">data-ugc</code> attributes. To test custom scope filtering, wrap content in a designated class (e.g., <code class="text-dark">.customer-story-card</code>) and configure the scanner's <em>Custom Content Exclusion Selectors</em> with <code class="text-dark">.customer-story-card</code>.
              </div>

              <!-- Custom Story Card 1 -->
              <div class="customer-story-card card p-4 mb-3 border bg-white shadow-sm border-start border-4 border-primary">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h5 class="h6 fw-bold mb-0 text-dark">
                    <i class="bi bi-quote text-primary me-1 fs-5"></i> Apex Logistics: Fleet Overhaul Story
                  </h5>
                  <span class="badge bg-primary-subtle text-primary border border-primary-subtle small">Class: .customer-story-card</span>
                </div>
                <div class="user-meta text-muted small mb-2">
                  Contributed by Tom Henderson, Fleet Director &bull; Submitted via Customer Portal
                </div>
                <p class="fs-6 text-secondary mb-0">
                  At the end of the day, our legacy dispatch pipeline was fundamentally re-engineered by external consultants. We utilized this enterprise platform to facilitate real-time freight tracking. It was determined by our leadership team that operational efficiency was actually very significantly improved, though the migration was fraught with hurdles.
                </p>
              </div>

              <!-- Custom Story Card 2 -->
              <div class="customer-story-card card p-4 mb-3 border bg-white shadow-sm border-start border-4 border-primary">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h5 class="h6 fw-bold mb-0 text-dark">
                    <i class="bi bi-quote text-primary me-1 fs-5"></i> Beacon Health: Patient Records Migration
                  </h5>
                  <span class="badge bg-primary-subtle text-primary border border-primary-subtle small">Class: .customer-story-card</span>
                </div>
                <div class="user-meta text-muted small mb-2">
                  Contributed by Dr. Rachel Vance, Chief Medical Officer &bull; Submitted via Community Forum
                </div>
                <p class="fs-6 text-secondary mb-0">
                  The clinical records database was migrated by our departmental staff over the bank holiday weekend. Basically, we feel quite confident that this software facilitates easier patient bookings. At this point in time, low-hanging fruit has been picked by our administrative staff, and the report was drafted by our senior registrar.
                </p>
              </div>

              <!-- Verification Instruction Box -->
              <div class="p-3 bg-light rounded border small text-muted mt-3">
                <div class="fw-bold text-dark mb-1"><i class="bi bi-check2-circle text-primary me-1"></i> How to verify with an automated scanner:</div>
                <ol class="mb-0 ps-3">
                  <li>Navigate to crawler <strong>Project Settings &gt; Scope &amp; Exclusion Configuration</strong>.</li>
                  <li>In the <strong>Content Exclusion Selectors</strong> field, add: <code class="text-dark bg-white px-2 py-0 border rounded">.customer-story-card</code>.</li>
                  <li>Re-scan this URL (<code class="text-dark">ugc-governance.php</code>).</li>
                  <li>Verify that Scenario 3 triggers are completely excluded from Content &amp; Cognitive issue reports.</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
      </div>

    </div>

    <!-- Summary Comparison Table -->
    <div class="card border-0 shadow-sm mb-5">
      <div class="card-header bg-white py-3 border-bottom">
        <h3 class="h5 fw-bold mb-0"><i class="bi bi-table text-warning me-2"></i>Summary Matrix: Scanner Behavior Across UGC Scenarios</h3>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0 align-middle">
          <thead class="table-light">
            <tr>
              <th scope="col" style="width: 25%;">Test Scenario</th>
              <th scope="col" style="width: 25%;">Target Markup</th>
              <th scope="col" style="width: 25%;">UGC Setting OFF (Default)</th>
              <th scope="col" style="width: 25%;">UGC Setting ON / Selector Configured</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <span class="fw-bold text-danger"><i class="bi bi-1-circle me-1"></i> Unflagged UGC</span>
                <div class="small text-muted">Baseline community comments</div>
              </td>
              <td><code>&lt;div class="card"&gt;</code> (No attributes)</td>
              <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-x-octagon-fill me-1"></i> Fails Audit</span> (Triggers NLP issues)</td>
              <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-x-octagon-fill me-1"></i> Fails Audit</span> (Still audited)</td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold text-success"><i class="bi bi-2-circle me-1"></i> Flagged UGC</span>
                <div class="small text-muted">Verified user review section</div>
              </td>
              <td><code>data-ugc="true"</code>, <code>class="ugc"</code></td>
              <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-x-octagon-fill me-1"></i> Fails Audit</span> (Evaluated by scanner)</td>
              <td><span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-check-circle-fill me-1"></i> Ignored by Scanner</span> (Pruned from DOM)</td>
            </tr>
            <tr>
              <td>
                <span class="fw-bold text-primary"><i class="bi bi-3-circle me-1"></i> Custom Selector UGC</span>
                <div class="small text-muted">Customer stories &amp; case studies</div>
              </td>
              <td><code>class="customer-story-card"</code></td>
              <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-x-octagon-fill me-1"></i> Fails Audit</span> (Evaluated by scanner)</td>
              <td><span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-check-circle-fill me-1"></i> Excluded</span> (When <code>.customer-story-card</code> is set)</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</main>

<style>
.user-review-card {
  transition: all 0.25s ease-in-out;
}
.test-scenario-card.simulator-excluded {
  opacity: 0.35;
  filter: grayscale(80%);
  position: relative;
}
.test-scenario-card.simulator-excluded::after {
  content: "EXCLUDED FROM AUDIT (DOM STRIPPED BY SCANNER)";
  position: absolute;
  top: 15px;
  right: 20px;
  background-color: #065f46;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.75rem;
  padding: 0.35rem 0.75rem;
  border-radius: 0.25rem;
  letter-spacing: 0.05em;
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.2);
  z-index: 10;
}
</style>

<script>
// Interactive Client-Side Vanilla JS Scanner Simulator
function setAuditSimulation(mode) {
  const btnDefault = document.getElementById('sim-default');
  const btnUgc = document.getElementById('sim-ugc');
  const btnCustom = document.getElementById('sim-custom');
  const btnBoth = document.getElementById('sim-both');

  const sec1 = document.getElementById('unflagged-ugc-section');
  const sec2 = document.getElementById('flagged-ugc-section');
  const sec3 = document.getElementById('custom-selector-ugc-section');

  const badge2 = document.getElementById('badge-sec-2');
  const badge3 = document.getElementById('badge-sec-3');

  // Reset active buttons
  [btnDefault, btnUgc, btnCustom, btnBoth].forEach(btn => btn.classList.remove('active'));

  // Reset excluded states
  sec1.classList.remove('simulator-excluded');
  sec2.classList.remove('simulator-excluded');
  sec3.classList.remove('simulator-excluded');

  if (mode === 'default') {
    btnDefault.classList.add('active');
    badge2.className = 'badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1';
    badge2.innerHTML = '<i class="bi bi-x-octagon-fill me-1"></i> Scanner Status: Evaluated &amp; Flagged (UGC Setting OFF)';
    badge3.className = 'badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1';
    badge3.innerHTML = '<i class="bi bi-x-octagon-fill me-1"></i> Scanner Status: Evaluated &amp; Flagged (No Selector Set)';
  } else if (mode === 'ugc-on') {
    btnUgc.classList.add('active');
    sec2.classList.add('simulator-excluded');
    badge2.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
    badge2.innerHTML = '<i class="bi bi-shield-check me-1"></i> Scanner Status: STRIPPED (Exclude UGC ON)';
    badge3.className = 'badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1';
    badge3.innerHTML = '<i class="bi bi-x-octagon-fill me-1"></i> Scanner Status: Evaluated &amp; Flagged';
  } else if (mode === 'custom-on') {
    btnCustom.classList.add('active');
    sec3.classList.add('simulator-excluded');
    badge2.className = 'badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1';
    badge2.innerHTML = '<i class="bi bi-x-octagon-fill me-1"></i> Scanner Status: Evaluated &amp; Flagged';
    badge3.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
    badge3.innerHTML = '<i class="bi bi-bullseye me-1"></i> Scanner Status: STRIPPED (.customer-story-card)';
  } else if (mode === 'both-on') {
    btnBoth.classList.add('active');
    sec2.classList.add('simulator-excluded');
    sec3.classList.add('simulator-excluded');
    badge2.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
    badge2.innerHTML = '<i class="bi bi-shield-check me-1"></i> Scanner Status: STRIPPED (Exclude UGC ON)';
    badge3.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
    badge3.innerHTML = '<i class="bi bi-bullseye me-1"></i> Scanner Status: STRIPPED (.customer-story-card)';
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
