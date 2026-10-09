<?php
/**
 * W3C COGA Cognitive Accessibility Guidelines Catalog Data
 * Single source of truth for Guidelines 1-8, citations, trigger summaries and code snippets.
 */

$pillars = [
    'pillar-perception' => [
        'id' => 'pillar-perception',
        'name' => 'Perception & Understanding',
        'standard' => 'W3C COGA Guidelines 1 & 3',
        'icon' => 'bi-eye',
        'color' => 'primary',
        'description' => 'Ensuring users recognize UI components, understand plain language, and are not overwhelmed by text density.'
    ],
    'pillar-navigation' => [
        'id' => 'pillar-navigation',
        'name' => 'Wayfinding & Structure',
        'standard' => 'W3C COGA Guideline 2 & Miller\'s Law',
        'icon' => 'bi-compass',
        'color' => 'info',
        'description' => 'Providing logical heading outlines, skip links, search mechanisms, and avoiding excessive landmark clutter.'
    ],
    'pillar-safety' => [
        'id' => 'pillar-safety',
        'name' => 'Error Prevention & Focus',
        'standard' => 'W3C COGA Guidelines 4 & 5',
        'icon' => 'bi-shield-check',
        'color' => 'danger',
        'description' => 'Flexible input formatting, semantic error summaries, grouped fieldsets, and eliminating unpauseable media distractions.'
    ],
    'pillar-memory' => [
        'id' => 'pillar-memory',
        'name' => 'Memory Support & Personalization',
        'standard' => 'W3C COGA Guidelines 6, 7 & 8',
        'icon' => 'bi-cpu',
        'color' => 'warning',
        'description' => 'Supporting unblocked paste, browser autofill, contextual help channels, and relative font zoom scaling.'
    ]
];

$tests = [
    'g1' => [
        'slug' => 'g1',
        'file' => 'g1.php',
        'rule' => 'coga-understandable-controls',
        'name' => 'Guideline 1: Understandable Controls & Consistency',
        'pillar' => 'pillar-perception',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C COGA Guideline 1 (Objective 1.1): "Help users understand what things are and how to use them. Use clear visual signifiers, consistent icons, and avoid identical ambiguous links."',
        'trigger_summary' => 'Interactive controls styled as plain text, misleading icons (e.g. cart icon for help), and identical ambiguous link texts ("click here") pointing to different URLs.',
        'failing_snippet' => '<!-- FAILING: Ambiguous link texts and buttons masquerading as plain text -->
<p>To view our Terms, <a href="/terms.php">click here</a>.</p>
<p>To view our Policy, <a href="/policy.php">click here</a>.</p>
<div onclick="alert(\'Form cancelled!\')" style="cursor:pointer; text-decoration:underline; font-weight:bold;">
  Cancel (Dead Div Button)
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Explicit, descriptive link text and semantic button controls -->
<p>Read our full <a href="/terms.php">Terms of Service Agreement</a>.</p>
<p>Download the <a href="/policy.php">User Privacy Policy Document</a>.</p>
<button type="button" class="btn btn-outline-secondary" onclick="alert(\'Form cancelled!\')">
  <i class="bi bi-x-circle me-1"></i> Cancel Registration
</button>'
    ],

    'g2' => [
        'slug' => 'g2',
        'file' => 'g2.php',
        'rule' => 'coga-finding-content-navigation',
        'name' => 'Guideline 2: Find What You Need & Structure',
        'pillar' => 'pillar-navigation',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C COGA Guideline 2 (Objective 2.1 & 2.2): "Help users find what they need through logical heading hierarchies, visible skip links, search inputs, and clean landmarks."',
        'trigger_summary' => 'Skipped heading hierarchy (h1 jumping to h3), missing skip-to-content anchor, lack of search landmarks, and over 3 fragmented nav landmarks.',
        'failing_snippet' => '<!-- FAILING: Skipped headings and missing skip link -->
<body>
  <h1>Portal Dashboard</h1>
  <!-- Missing Skip Link -->
  <!-- Skipped h2 directly to h4 -->
  <h4>Quarterly Summary</h4>
</body>',
        'remediated_snippet' => '<!-- REMEDIATED: Skip link, strict sequential heading hierarchy (h1 -> h2 -> h3) -->
<body>
  <a href="#main-content" class="visually-hidden-focusable btn btn-primary m-2">Skip to main content</a>
  <h1>Portal Dashboard</h1>
  <h2>System Overview</h2>
  <h3>Quarterly Summary</h3>
  <main id="main-content">...</main>
</body>'
    ],

    'g3' => [
        'slug' => 'g3',
        'file' => 'g3.php',
        'rule' => 'coga-clear-content-density',
        'name' => 'Guideline 3: Clear Content & Text Density',
        'pillar' => 'pillar-perception',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'W3C COGA Guideline 3 (Objective 3.1 & 3.2): "Use clear language and digestible formatting. Break walls of text exceeding 100 words using bullet points, short paragraphs, and clear subheadings."',
        'trigger_summary' => 'Dense paragraphs exceeding 150 words with low Flesch Reading Ease scores (< 50), complex jargon without definitions, and no visual separation.',
        'failing_snippet' => '<!-- FAILING: Unbroken 200-word wall of text with dense corporate jargon -->
<p>Our decentralized algorithmic protocol leverages multi-tier asynchronous paradigms to facilitate hyper-converged ledger reconciliations without synchronous telemetry intervention, necessitating an exhaustive cognitive appraisal of peripheral cryptographic heuristics...</p>',
        'remediated_snippet' => '<!-- REMEDIATED: Plain language with bulleted digest and high readability -->
<p class="lead">We built a faster way to verify transactions safely without waiting for manual approvals.</p>
<ul>
  <li><strong>Fast:</strong> Processes in under 2 seconds.</li>
  <li><strong>Secure:</strong> Automatic encryption on every step.</li>
  <li><strong>Simple:</strong> No complex setup required.</li>
</ul>'
    ],

    'g4' => [
        'slug' => 'g4',
        'file' => 'g4.php',
        'rule' => 'coga-error-prevention-correction',
        'name' => 'Guideline 4: Error Prevention & Form Guidance',
        'pillar' => 'pillar-safety',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C COGA Guideline 4 (Objective 4.1 & 4.2): "Help users avoid mistakes and know how to correct them. Accept flexible input formats and use descriptive aria error summaries."',
        'trigger_summary' => 'Inflexible regex patterns that reject spaces or hyphens without helper hints, form errors missing aria-invalid or aria-describedby, and >7 inputs without fieldset grouping.',
        'failing_snippet' => '<!-- FAILING: Strict regex rejects formatted input without hints or aria linkages -->
<div class="mb-3">
  <label for="fail_phone">Phone Number</label>
  <input type="text" id="fail_phone" pattern="^[0-9]{10}$" class="form-control">
</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Flexible pattern, explicit helper text, and live aria-describedby linkage -->
<div class="mb-3">
  <label for="fixed_phone" class="form-label">Phone Number</label>
  <input type="tel" id="fixed_phone" name="phone" class="form-control" aria-describedby="phoneHelper phoneError" placeholder="(555) 000-0000">
  <div id="phoneHelper" class="form-text">Spaces, hyphens, and parentheses are accepted.</div>
</div>'
    ],

    'g5' => [
        'slug' => 'g5',
        'file' => 'g5.php',
        'rule' => 'coga-focus-distraction-free',
        'name' => 'Guideline 5: Focus & Distraction Elimination',
        'pillar' => 'pillar-safety',
        'severity' => 'Error',
        'severity_class' => 'danger',
        'citation' => 'W3C COGA Guideline 5 (Objective 5.1 & 5.2): "Help users focus. Never autoplay audio or video without controls, and provide explicit pause mechanisms for looping animations."',
        'trigger_summary' => 'Media elements with autoplay and no visible pause button, or continuous CSS marquee animations with no prefers-reduced-motion toggle.',
        'failing_snippet' => '<!-- FAILING: Uncontrollable autoplaying video and infinite flashing banner -->
<video autoplay loop muted playsinline src="/assets/promo.mp4"></video>
<div class="infinite-flashing-marquee">FLASH SALE! HURRY!</div>',
        'remediated_snippet' => '<!-- REMEDIATED: Autoplay disabled by default, user-controlled playback and pause button -->
<div class="video-container position-relative">
  <video id="accessibleVideo" controls preload="metadata" src="/assets/promo.mp4" class="w-100"></video>
  <button type="button" class="btn btn-sm btn-outline-dark mt-2" onclick="togglePlayPause()">
    <i class="bi bi-pause-fill"></i> Pause Animation
  </button>
</div>'
    ],

    'g6' => [
        'slug' => 'g6',
        'file' => 'g6.php',
        'rule' => 'coga-memory-reliance-paste',
        'name' => 'Guideline 6: Eliminate Reliance on Memory',
        'pillar' => 'pillar-memory',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C COGA Guideline 6 (Objective 6.1 & 6.2): "Do not rely on user memory. Never disable paste events in inputs, and provide autocomplete tokens for familiar information."',
        'trigger_summary' => 'Input fields that block paste events via onpaste="return false;" (violating password manager integration) or lack standard HTML5 autocomplete attributes.',
        'failing_snippet' => '<!-- FAILING: Blocking paste on verification codes and passwords -->
<input type="password" id="fail_pwd" onpaste="return false;" placeholder="Paste blocked">
<input type="text" id="fail_otp" onpaste="event.preventDefault();" placeholder="2FA Code">',
        'remediated_snippet' => '<!-- REMEDIATED: Unrestricted paste support and password manager autofill -->
<input type="password" id="fixed_pwd" autocomplete="current-password" class="form-control" placeholder="Enter or paste password">
<input type="text" id="fixed_otp" inputmode="numeric" autocomplete="one-time-code" class="form-control" placeholder="Paste 6-digit code">'
    ],

    'g7' => [
        'slug' => 'g7',
        'file' => 'g7.php',
        'rule' => 'coga-help-and-support',
        'name' => 'Guideline 7: Contextual Help & Support Channels',
        'pillar' => 'pillar-memory',
        'severity' => 'Info',
        'severity_class' => 'info',
        'citation' => 'W3C COGA Guideline 7 (Objective 7.1): "Provide help and support. Users must have easy access to human support, contextual tooltips, and clear FAQ assistance."',
        'trigger_summary' => 'Transactional, payment, or multi-step account forms with zero contextual help links, support contacts, or FAQ assistance.',
        'failing_snippet' => '<!-- FAILING: Multi-step checkout with no help or support contact options -->
<form action="/checkout" method="post">
  <!-- Complex billing inputs with no support links or contact info -->
  <button type="submit" class="btn btn-primary">Pay $499.00</button>
</form>',
        'remediated_snippet' => '<!-- REMEDIATED: Visible help triggers, live support contact modal, and FAQ guidance -->
<form action="/checkout" method="post">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <span>Billing Information</span>
    <a href="#helpModal" data-bs-toggle="modal" class="btn btn-sm btn-outline-info">
      <i class="bi bi-question-circle me-1"></i> Need Help?
    </a>
  </div>
  <button type="submit" class="btn btn-primary">Pay $499.00</button>
</form>'
    ],

    'g8' => [
        'slug' => 'g8',
        'file' => 'g8.php',
        'rule' => 'coga-personalisation-adaptation',
        'name' => 'Guideline 8: Support Adaptation & Personalization',
        'pillar' => 'pillar-memory',
        'severity' => 'Warning',
        'severity_class' => 'warning',
        'citation' => 'W3C COGA Guideline 8 (Objective 8.1 & 8.2): "Support adaptation and personalization. Use relative units (rem/em) and never lock viewport zoom with user-scalable=no."',
        'trigger_summary' => 'Viewport meta tags blocking browser zoom (user-scalable=no or maximum-scale=1.0) and fixed px font sizes preventing custom browser stylesheet overrides.',
        'failing_snippet' => '<!-- FAILING: Viewport blocks pinch-to-zoom and uses fixed px typography -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
<style>
  body { font-size: 12px; line-height: 14px; }
</style>',
        'remediated_snippet' => '<!-- REMEDIATED: Unrestricted fluid zoom and scalable rem/em typography -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body { font-size: 1rem; line-height: 1.6; }
</style>'
    ]
];

function getAdjacentCogaTests($currentSlug, $tests) {
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