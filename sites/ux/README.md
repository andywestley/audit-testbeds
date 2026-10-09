# UX & Usability Heuristics Benchmark Testbed (`ux-testbed`)

A standalone PHP/HTML5/Bootstrap web application designed specifically to benchmark and trigger every rule in the **UX & Usability Heuristics Engine (`UxScanner`)**.

This testbed isolates failing DOM patterns against compliant, human-centered UX design standards established by the **Baymard Institute**, the **Nielsen Norman Group (NN/g)**, and the **Federal Trade Commission (FTC)** ethical standards.

---

## 🚀 Technology Stack & Framework Guardrails

* **Backend:** PHP 8.2+
* **Markup:** Semantic HTML5
* **Styling:** Bootstrap 5 (via CDN) + custom CSS
* **Interactivity:** Vanilla JavaScript (ES6+)
* **Structure:** Clean modular PHP architecture with shared header, navbar, diagnostic bar, data catalog, and footer partials.
* **Deployment:** Standard Plesk Linux VPS / Apache via GitHub Actions SSH (`appleboy/ssh-action`).

---

## 📋 Dedicated Test Page Catalog (11 Test Pages)

Each test page features a **Standardized Rule Diagnostic Header Bar** and a **Side-by-Side Comparison** between **Section A (Intentional Failure Trigger)** and **Section B (Remediated Standard)** with live interactive sandboxes and 1-click clipboard copy blocks.

| # | Dedicated Test Page | Target Rule Code | Severity | Heuristic Standard & Citation |
|---|---|---|---|---|
| 1 | [`tests/inputmode-missing.php`](tests/inputmode-missing.php) | `ux-inputmode-missing` | **Warning** | **Baymard Institute**: Match touch keyboard (numeric/tel) to input type |
| 2 | [`tests/autocomplete-missing.php`](tests/autocomplete-missing.php) | `ux-autocomplete-missing` | **Warning** | **W3C WCAG 2.1 (SC 1.3.5) & Baymard**: Explicit autofill metadata tokens |
| 3 | [`tests/password-toggle-missing.php`](tests/password-toggle-missing.php) | `ux-password-toggle-missing` | **Info** | **NN/g**: "Stop Password Masking" with accessible show/hide toggle |
| 4 | [`tests/active-nav-missing.php`](tests/active-nav-missing.php) | `ux-active-nav-missing` | **Warning** | **NN/g**: "Navigation: You Are Here" wayfinding with `aria-current="page"` |
| 5 | [`tests/scroll-escape-missing.php`](tests/scroll-escape-missing.php) | `ux-scroll-escape-missing` | **Info** | **Baymard Institute**: Sticky headers & floating back-to-top on deep pages |
| 6 | [`tests/false-affordance.php`](tests/false-affordance.php) | `ux-false-affordance` | **Warning** | **Don Norman / NN/g**: Eliminating dead clicks on non-interactive elements |
| 7 | [`tests/external-link-cue.php`](tests/external-link-cue.php) | `ux-external-link-cue` | **Info** | **W3C WCAG G201 / Baymard**: Outbound visual icon & new tab aria announcement |
| 8 | [`tests/modal-escape-missing.php`](tests/modal-escape-missing.php) | `ux-modal-escape-missing` | **Error** | **NN/g Heuristic #3 & WAI-ARIA**: Emergency modal escape & `Escape` key dismiss |
| 9 | [`tests/destructive-unconfirmed.php`](tests/destructive-unconfirmed.php) | `ux-destructive-unconfirmed` | **Warning** | **NN/g Heuristic #5**: Error prevention with 2-step verification friction modal |
| 10 | [`tests/prechecked-consent.php`](tests/prechecked-consent.php) | `ux-prechecked-consent` | **Warning** | **EU GDPR Article 4(11) & FTC**: Prohibiting pre-ticked opt-in checkboxes |
| 11 | [`tests/confirmshaming.php`](tests/confirmshaming.php) | `ux-confirmshaming` | **Warning** | **FTC Deceptive Patterns**: Prohibiting manipulative guilt-tripping decline copy |

---

## 🏛️ Repository Architecture

```text
UXUsabilityTestbed/
├── index.php                         # Benchmark Matrix with Filter, Search & "Test All" Runner
├── README.md                         # Project documentation and rule catalog
├── includes/
│   ├── data.php                      # Centralized data catalog (rules, severity, citations, snippets)
│   ├── header.php                    # Shared HTML head with Bootstrap 5 CDN & meta tags
│   ├── navbar.php                    # Navigation bar with Testbed Family Suite Switcher
│   ├── diagnostic_header.php         # Standardized Rule Diagnostic Header Bar
│   └── footer.php                    # Shared footer partial & script assets
├── assets/
│   ├── css/
│   │   └── custom.css                # Polished design system, card tokens, and dark code blocks
│   └── js/
│       └── main.js                   # Interactive sandboxes (copy code, filters, toasts, modal gates)
├── tests/                            # 11 Dedicated test pages
│   ├── inputmode-missing.php
│   ├── autocomplete-missing.php
│   ├── password-toggle-missing.php
│   ├── active-nav-missing.php
│   ├── scroll-escape-missing.php
│   ├── false-affordance.php
│   ├── external-link-cue.php
│   ├── modal-escape-missing.php
│   ├── destructive-unconfirmed.php
│   ├── prechecked-consent.php
│   └── confirmshaming.php
└── .github/
    └── workflows/
        └── deploy.yml                # Plesk VPS SSH deployment workflow
```

---

## 🌐 Testbed Family Ecosystem

This repository is part of a unified family of 4 specialized compliance testbeds:

* 🌐 **Accessibility Testbed:** [inaccessible.andrewwestley.co.uk](https://inaccessible.andrewwestley.co.uk/) (WCAG 2.1/2.2 Criteria)
* 🧠 **COGA Testbed:** [coga-testbed.andrewwestley.co.uk](https://coga-testbed.andrewwestley.co.uk) (W3C Cognitive Accessibility Guidelines 1–8)
* 📝 **Content Testbed:** [content-testbed.andrewwestley.co.uk](https://content-testbed.andrewwestley.co.uk) (NLP Readability, Tone & Inclusivity)
* ⚡ **UX Usability Testbed:** [uxusability-testbed.andrewwestley.co.uk](https://uxusability-testbed.andrewwestley.co.uk) (Usability Heuristics & Ethical Design)

---

## 💻 Local Development

To run the testbed locally using PHP's built-in web server:

```bash
php -S 127.0.0.1:8000
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to access the interactive Heuristics Matrix and start the sequential crawler route.
