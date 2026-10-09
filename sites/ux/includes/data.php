<?php
/**
 * UX & Usability Heuristics Catalog Data
 * Defines metadata, rule triggers, standard citations, and code snippets for all 11 test pages.
 */

$pillars = [
    'pillar-1' => [
        'id' => 'pillar-1',
        'name' => 'Form & Input Usability',
        'standard' => 'Baymard Institute Standards',
        'icon' => 'bi-input-cursor-text',
        'color' => 'primary',
        'description' => 'Optimizing touch keyboard ergonomics, autofill tokens, and input transparency for frictionless form completion.'
    ],
    'pillar-2' => [
        'id' => 'pillar-2',
        'name' => 'Navigation, Wayfinding & IA',
        'standard' => 'NN/g Usability & Information Architecture',
        'icon' => 'bi-compass',
        'color' => 'info',
        'description' => 'Ensuring persistent "You Are Here" wayfinding, deep scroll escapes, accurate visual affordances, and explicit link transitions.'
    ],
    'pillar-3' => [
        'id' => 'pillar-3',
        'name' => 'User Freedom & Safety',
        'standard' => 'NN/g Usability Heuristics #3 & #5',
        'icon' => 'bi-shield-check',
        'color' => 'danger',
        'description' => 'Guaranteeing emergency exits, modal escape vectors, error prevention, and multi-step confirmation barriers for destructive operations.'
    ],
    'pillar-4' => [
        'id' => 'pillar-4',
        'name' => 'Ethical UX & Deceptive Design',
        'standard' => 'FTC & EU GDPR Article 4(11)',
        'icon' => 'bi-heart-half',
        'color' => 'warning',
        'description' => 'Prohibiting preselected consent checkboxes, confirmshaming guilt-tripping copy, and dark patterns in decision-making flows.'
    ]
];

$tests = [
    'inputmode-missing' => [
        'slug' => 'inputmode-missing',
        'file' => 'inputmode-missing.php',
        'rule' => 'ux-inputmode-missing',
        'name' => 'Inputmode Attribute Missing',
        'pillar' => 'pillar-1',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'Baymard Institute Mobile Form Usability Benchmark: "Touch keyboards should automatically adapt to input types (numeric/tel) to avoid mobile checkout drop-off."',
        'trigger_summary' => 'Numeric, phone, credit card, and CVV &lt;input&gt; fields that omit <code>inputmode="numeric"</code>, <code>inputmode="decimal"</code>, or <code>inputmode="tel"</code>, forcing standard alphanumeric QWERTY keyboards on touch devices.',
        'failing_snippet' => '<!-- FAILING: Mobile soft keyboards open full QWERTY text keyboard -->
<div class="mb-3">
  <label for="failing_phone" class="form-label">Phone Number</label>
  <input type="text" id="failing_phone" name="phone" class="form-control" placeholder="123-456-7890">
</div>
<div class="mb-3">
  <label for="failing_card" class="form-label">Credit Card Number</label>
  <input type="text" id="failing_card" name="card_number" class="form-control" placeholder="4532 0000 0000 0000">
</div>
<div class="mb-3">
  <label for="failing_cvv" class="form-label">Security Code (CVV)</label>
  <input type="text" id="failing_cvv" name="security_code" class="form-control" placeholder="123">
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Explicit inputmode triggers dedicated 10-key numeric keypad -->
<div class="mb-3">
  <label for="fixed_phone" class="form-label">Phone Number <span class="badge bg-success-subtle text-success">Optimized</span></label>
  <input type="tel" id="fixed_phone" name="phone" inputmode="tel" autocomplete="tel" class="form-control" placeholder="123-456-7890">
</div>
<div class="mb-3">
  <label for="fixed_card" class="form-label">Credit Card Number <span class="badge bg-success-subtle text-success">Optimized</span></label>
  <input type="text" id="fixed_card" name="card_number" inputmode="numeric" pattern="[0-9]*" autocomplete="cc-number" class="form-control" placeholder="4532 0000 0000 0000">
</div>
<div class="mb-3">
  <label for="fixed_cvv" class="form-label">Security Code (CVV) <span class="badge bg-success-subtle text-success">Optimized</span></label>
  <input type="password" id="fixed_cvv" name="security_code" inputmode="numeric" pattern="[0-9]*" maxlength="4" autocomplete="cc-csc" class="form-control" placeholder="123">
</div>'
    ],

    'autocomplete-missing' => [
        'slug' => 'autocomplete-missing',
        'file' => 'autocomplete-missing.php',
        'rule' => 'ux-autocomplete-missing',
        'name' => 'Autofill Tokens Missing',
        'pillar' => 'pillar-1',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C WCAG 2.1 (SC 1.3.5 Identify Input Purpose) & Baymard Checkout Study: "Failure to provide standard autocomplete tokens triples checkout completion time and increases error rates."',
        'trigger_summary' => 'Standard checkout and user profile inputs (email, name, address, city, postal code) missing standard HTML5 <code>autocomplete</code> tokens or intentionally disabling autofill with <code>autocomplete="off"</code>.',
        'failing_snippet' => '<!-- FAILING: Browser password managers and autofill engines cannot identify fields -->
<form autocomplete="off">
  <div class="mb-3">
    <label for="fail_fname">First Name</label>
    <input type="text" id="fail_fname" name="first_name" class="form-control">
  </div>
  <div class="mb-3">
    <label for="fail_email">Email Address</label>
    <input type="email" id="fail_email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="fail_addr">Street Address</label>
    <input type="text" id="fail_addr" name="street_address" class="form-control">
  </div>
</form>',
        'remediated_snippet' => '<!-- REMEDIATED: Standard WHATWG / WCAG autocomplete tokens -->
<form autocomplete="on">
  <div class="mb-3">
    <label for="fixed_fname">First Name</label>
    <input type="text" id="fixed_fname" name="first_name" autocomplete="given-name" class="form-control">
  </div>
  <div class="mb-3">
    <label for="fixed_email">Email Address</label>
    <input type="email" id="fixed_email" name="email" autocomplete="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="fixed_addr">Street Address</label>
    <input type="text" id="fixed_addr" name="street_address" autocomplete="street-address" class="form-control">
  </div>
  <div class="mb-3">
    <label for="fixed_zip">Postal Code</label>
    <input type="text" id="fixed_zip" name="postal_code" autocomplete="postal-code" inputmode="numeric" class="form-control">
  </div>
</form>'
    ],

    'password-toggle-missing' => [
        'slug' => 'password-toggle-missing',
        'file' => 'password-toggle-missing.php',
        'rule' => 'ux-password-toggle-missing',
        'name' => 'Password Visibility Toggle Missing',
        'pillar' => 'pillar-1',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'Jakob Nielsen (NN/g): "Stop Password Masking: Usability suffers severely when users cannot verify complex passwords they are typing on mobile and desktop."',
        'trigger_summary' => 'A <code>&lt;input type="password"&gt;</code> field in an authentication form that lacks an adjacent visibility toggle button or interactive reveal affordance.',
        'failing_snippet' => '<!-- FAILING: Masked dots only with no way to unmask and verify typographical errors -->
<div class="mb-3">
  <label for="fail_pwd" class="form-label">Account Password</label>
  <input type="password" id="fail_pwd" name="password" class="form-control" value="S3cureP@ssw0rd!#">
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Accessible toggle button with eye icon and live ARIA attributes -->
<div class="mb-3">
  <label for="fixed_pwd" class="form-label">Account Password</label>
  <div class="input-group">
    <input type="password" id="fixed_pwd" name="password" class="form-control" value="S3cureP@ssw0rd!#">
    <button class="btn btn-outline-secondary" type="button" id="pwdToggleBtn" aria-label="Show password" aria-controls="fixed_pwd" onclick="togglePasswordVisibility(\'fixed_pwd\', this)">
      <i class="bi bi-eye" aria-hidden="true"></i>
    </button>
  </div>
</div>'
    ],

    'active-nav-missing' => [
        'slug' => 'active-nav-missing',
        'file' => 'active-nav-missing.php',
        'rule' => 'ux-active-nav-missing',
        'name' => 'Active Navigation State Missing',
        'pillar' => 'pillar-2',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'Nielsen Norman Group (NN/g): "Navigation: You Are Here — Users need clear visual and programmatic landmarks to orient themselves within the hierarchy."',
        'trigger_summary' => 'Primary navigation bar with 5+ links (<code>&lt;nav class="navbar"&gt;</code>) where none of the anchor tags feature <code>aria-current="page"</code> or an <code>.active</code> CSS class matching the current route.',
        'failing_snippet' => '<!-- FAILING: No link indicates the user\'s current position -->
<nav class="navbar navbar-expand-lg bg-light border">
  <div class="container-fluid">
    <div class="navbar-nav">
      <a class="nav-link" href="/dashboard">Dashboard</a>
      <a class="nav-link" href="/reports">Reports</a>
      <a class="nav-link" href="/analytics">Analytics</a>
      <a class="nav-link" href="/settings">Settings</a>
      <a class="nav-link" href="/billing">Billing</a>
    </div>
  </div>
</nav>',
        'remediated_snippet' => '<!-- REMEDIATED: aria-current="page" and active highlight classes -->
<nav class="navbar navbar-expand-lg bg-light border" aria-label="Main Navigation">
  <div class="container-fluid">
    <div class="navbar-nav">
      <a class="nav-link" href="/dashboard">Dashboard</a>
      <a class="nav-link active text-primary fw-bold" href="/reports" aria-current="page">Reports</a>
      <a class="nav-link" href="/analytics">Analytics</a>
      <a class="nav-link" href="/settings">Settings</a>
      <a class="nav-link" href="/billing">Billing</a>
    </div>
  </div>
</nav>'
    ],

    'scroll-escape-missing' => [
        'slug' => 'scroll-escape-missing',
        'file' => 'scroll-escape-missing.php',
        'rule' => 'ux-scroll-escape-missing',
        'name' => 'Scroll Escape Mechanism Missing',
        'pillar' => 'pillar-2',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'Baymard Institute: "Long-Form Document Usability: Sticky headers and back-to-top anchors reduce scroll fatigue by 42% on pages exceeding 3,000 vertical pixels."',
        'trigger_summary' => 'Long-form page content with vertical scroll height exceeding 3,500px, utilizing a static (non-sticky) header and omitting a floating or footer "Back to Top" escape link.',
        'failing_snippet' => '<!-- FAILING: Static non-sticky navbar on a 4,000px height page with no back-to-top link -->
<header class="navbar navbar-dark bg-dark position-static">
  <span class="navbar-brand">Static Header (Disappears on scroll)</span>
</header>
<main style="min-height: 4000px;">
  <!-- Thousands of pixels of dense content without any return anchor -->
</main>',
        'remediated_snippet' => '<!-- REMEDIATED: Sticky top navigation bar + floating Back-to-Top anchor -->
<header class="navbar navbar-dark bg-dark sticky-top shadow-sm">
  <span class="navbar-brand">Sticky Header (Always Accessible)</span>
</header>
<main style="min-height: 4000px;">
  <!-- Dense content -->
</main>
<a href="#top" id="backToTopBtn" class="btn btn-primary btn-floating shadow" aria-label="Scroll back to top">
  <i class="bi bi-arrow-up"></i>
</a>'
    ],

    'false-affordance' => [
        'slug' => 'false-affordance',
        'file' => 'false-affordance.php',
        'rule' => 'ux-false-affordance',
        'name' => 'False Affordance / Dead Click Trigger',
        'pillar' => 'pillar-2',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'Don Norman: "The Design of Everyday Things — Affordances and Signifiers": When non-interactive elements signal clickability, users suffer trust degradation and frustration from dead clicks.',
        'trigger_summary' => 'Non-interactive <code>&lt;div&gt;</code>, <code>&lt;span&gt;</code>, and <code>&lt;p&gt;</code> elements styled with <code>cursor: pointer</code>, underline decoration, and hover lift shadows, but lacking <code>href</code>, <code>onclick</code>, or ARIA button roles.',
        'failing_snippet' => '<!-- FAILING: Looks like a button and has pointer cursor, but does nothing (dead click) -->
<div class="card p-3 fake-button" style="cursor: pointer; text-decoration: underline; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
  <span class="fw-bold text-primary">Upgrade Pro Plan Now</span>
  <p class="text-muted">Clicking this dead div does nothing and cannot be focused via keyboard tab.</p>
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: True semantic button with keyboard focus and ARIA attributes -->
<button type="button" class="btn btn-primary w-100 py-3 shadow-sm" onclick="alert(\'Action executed successfully!\')">
  <span class="fw-bold"><i class="bi bi-lightning-charge me-1"></i> Upgrade Pro Plan Now</span>
</button>'
    ],

    'external-link-cue' => [
        'slug' => 'external-link-cue',
        'file' => 'external-link-cue.php',
        'rule' => 'ux-external-link-cue',
        'name' => 'External Link Outbound Cue Missing',
        'pillar' => 'pillar-2',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'W3C WCAG Technique G201 & Baymard: "Disorienting New Tabs: Users must be warned visually and via screen readers before a link takes them outside the current application in a new window."',
        'trigger_summary' => 'Hyperlinks with <code>target="_blank"</code> pointing to external domains that lack an outbound visual indicator icon (e.g. <code>bi-box-arrow-up-right</code>) and omit accessible warning text.',
        'failing_snippet' => '<!-- FAILING: Silent new window launch without icon or screen reader warning -->
<p>
  Check the <a href="https://example.com/external-docs" target="_blank">External Documentation Portal</a> for details.
</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Visual icon + rel security attributes + screen reader notice -->
<p>
  Check the 
  <a href="https://example.com/external-docs" target="_blank" rel="noopener noreferrer" class="d-inline-inline-flex align-items-center" aria-label="External Documentation Portal (opens in a new tab)">
    External Documentation Portal
    <i class="bi bi-box-arrow-up-right ms-1 small" aria-hidden="true"></i>
    <span class="visually-hidden">(opens in a new tab)</span>
  </a> for details.
</p>'
    ],

    'modal-escape-missing' => [
        'slug' => 'modal-escape-missing',
        'file' => 'modal-escape-missing.php',
        'rule' => 'ux-modal-escape-missing',
        'name' => 'Modal Escape & Dismissal Missing',
        'pillar' => 'pillar-3',
        'severity' => 'Error',
        'severity_class' => 'danger',
        'citation' => 'NN/g Usability Heuristic #3: User Control and Freedom & W3C WAI-ARIA Modal Pattern: "Users often choose system functions by mistake and need a clearly marked emergency exit to leave the unwanted state without having to go through an extended dialogue."',
        'trigger_summary' => 'An active modal dialog (<code>[role="dialog"]</code> or <code>.modal</code>) that lacks a visible close button (<code>.btn-close</code>), disables backdrop clicking, and fails to handle the <code>Escape</code> keyboard event.',
        'failing_snippet' => '<!-- FAILING: Modal rendered open in initial DOM with NO close button, no Esc dismiss -->
<div class="modal show" style="display: block; position: relative; z-index: 1;">
  <div class="modal-dialog">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Trapped Modal (No Close Button)</h5>
      </div>
      <div class="modal-body">
        <p>No close button, no Escape key listener, and no dismiss attributes.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary disabled" disabled>Confirm</button>
      </div>
    </div>
  </div>
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Accessible modal with close button, Escape key support & backdrop dismiss -->
<div class="modal fade" id="accessibleModal" tabindex="-1" role="dialog" aria-labelledby="accModalLabel" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accModalLabel">Accessible Modal Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>This dialog responds to the Escape key, top-right close icon, and outside clicks.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Acknowledge</button>
      </div>
    </div>
  </div>
</div>'
    ],

    'destructive-unconfirmed' => [
        'slug' => 'destructive-unconfirmed',
        'file' => 'destructive-unconfirmed.php',
        'rule' => 'ux-destructive-unconfirmed',
        'name' => 'Destructive Action Safeguards',
        'pillar' => 'pillar-3',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'NN/g Usability Heuristic #5: Error Prevention: "Even better than good error messages is a careful design which prevents a problem from occurring in the first place... require user confirmation before committing irreversible actions."',
        'trigger_summary' => 'A prominent button or form action labelled "Delete Account", "Delete All", or "Purge All Data" that executes irreversible destruction immediately on single click with no confirmation dialog or two-step verification barrier.',
        'failing_snippet' => '<!-- FAILING: Raw destructive button without confirmation safeguard or modal gate -->
<button type="button" class="btn btn-danger">Delete Account</button>',
        'remediated_snippet' => '<!-- REMEDIATED: Safety barrier with confirmation modal, typed friction, and undo toast buffer -->
<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
  <i class="bi bi-trash"></i> Delete Account...
</button>

<!-- Two-step confirmation modal with phrase verification -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="delModalLabel">
  <div class="modal-dialog">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="delModalLabel"><i class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Irreversible Deletion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>This action <strong>cannot be undone</strong>. Please type <code class="text-danger">DELETE</code> to proceed.</p>
        <input type="text" id="confirmPhraseInput" class="form-control" placeholder="Type DELETE to confirm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteSubmit" class="btn btn-danger" disabled>I Understand, Delete Everything</button>
      </div>
    </div>
  </div>
</div>'
    ],

    'prechecked-consent' => [
        'slug' => 'prechecked-consent',
        'file' => 'prechecked-consent.php',
        'rule' => 'ux-prechecked-consent',
        'name' => 'Pre-checked Consent Checkbox',
        'pillar' => 'pillar-4',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'EU GDPR Article 4(11) / Recital 32 & FTC Dark Patterns Enforcement: "Silence, pre-ticked boxes or inactivity should not constitute consent. Consent must be given by a clear affirmative act."',
        'trigger_summary' => 'Optional marketing consent, third-party data sharing, SMS promotional updates, or paid add-on checkboxes set with <code>checked="checked"</code> by default.',
        'failing_snippet' => '<!-- FAILING: Deceptive default opt-in (GDPR violation & dark pattern) -->
<div class="form-check mb-2">
  <input class="form-check-input" type="checkbox" id="fail_optin_news" name="newsletter_optin" checked="checked">
  <label class="form-check-label" for="fail_optin_news">
    Send me weekly promotional emails and partner marketing deals (Pre-ticked)
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="checkbox" id="fail_optin_ins" name="insurance_addon" checked>
  <label class="form-check-label" for="fail_optin_ins">
    Add $4.99/mo premium hardware warranty to my order (Pre-ticked)
  </label>
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Explicit un-checked affirmative consent with distinct granular options -->
<div class="form-check mb-2">
  <input class="form-check-input" type="checkbox" id="fixed_optin_news" name="newsletter_optin">
  <label class="form-check-label" for="fixed_optin_news">
    I would like to receive product updates and release notes via email (Opt-in)
  </label>
</div>
<div class="form-check mb-2">
  <input class="form-check-input" type="checkbox" id="fixed_optin_ins" name="insurance_addon">
  <label class="form-check-label" for="fixed_optin_ins">
    Add optional $4.99/mo premium hardware warranty (Optional add-on)
  </label>
</div>'
    ],

    'confirmshaming' => [
        'slug' => 'confirmshaming',
        'file' => 'confirmshaming.php',
        'rule' => 'ux-confirmshaming',
        'name' => 'Confirmshaming Deceptive Copy',
        'pillar' => 'pillar-4',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'FTC Staff Report: Bringing Dark Patterns to Light & Deceptive Patterns Registry: "Confirmshaming uses emotionally manipulative, guilt-inducing language in the decline option to coerce user compliance."',
        'trigger_summary' => 'Modal dialogues, banners, and discount popups that pair an attractive affirmative CTA with an emotionally manipulative, insulting, or guilt-tripping decline text.',
        'failing_snippet' => '<!-- FAILING: Emotionally coercive decline copy designed to shame the user -->
<div class="card p-4 text-center border-warning">
  <h4>Unlock 25% Off Your Entire Order!</h4>
  <p class="text-muted">Join our VIP club for instant coupons.</p>
  <div class="d-grid gap-2 col-md-8 mx-auto mt-3">
    <button class="btn btn-success btn-lg">Claim My 25% Discount</button>
    <button class="btn btn-link text-muted small confirmshame-link">
      No thanks, I prefer paying full price and wasting money
    </button>
  </div>
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Neutral, respectful decline options with equal dignity -->
<div class="card p-4 text-center border-primary shadow-sm">
  <h4>Unlock 25% Off Your Entire Order!</h4>
  <p class="text-muted">Join our VIP club for instant coupons.</p>
  <div class="d-grid gap-2 col-md-8 mx-auto mt-3">
    <button class="btn btn-primary btn-lg">Claim My 25% Discount</button>
    <button class="btn btn-outline-secondary">
      No thanks, continue without discount
    </button>
  </div>
</div>'
    ]
];

/**
 * Helper to compute previous and next tests for crawler flow
 */
function getAdjacentTests($currentSlug, $tests) {
    $keys = array_keys($tests);
    $idx = array_search($currentSlug, $keys);
    
    $prev = null;
    $next = null;
    
    if ($idx !== false) {
        if ($idx > 0) {
            $prev = $tests[$keys[$idx - 1]];
        }
        if ($idx < count($keys) - 1) {
            $next = $tests[$keys[$idx + 1]];
        }
    }
    
    return [
        'index' => $idx + 1,
        'total' => count($keys),
        'prev' => $prev,
        'next' => $next
    ];
}
