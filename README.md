# Audit Testbeds Monorepo

Unified monorepo containing the 4 automated benchmark testbeds for digital accessibility, content quality, cognitive inclusion, and UX heuristics.

## Testbed Sites

| Testbed | Directory | Focus Area | Live Subdomain |
| :--- | :--- | :--- | :--- |
| **Accessibility** | [`sites/accessibility/`](sites/accessibility/) | WCAG 2.2 Level A/AA/AAA | `https://inaccessible.andrewwestley.co.uk/` |
| **Content Quality** | [`sites/content/`](sites/content/) | Readability, Plain English, Formatting | `https://content-testbed.andrewwestley.co.uk/` |
| **Cognitive (COGA)** | [`sites/coga/`](sites/coga/) | Cognitive Accessibility, Memory, Attention | `https://coga-testbed.andrewwestley.co.uk/` |
| **UX & Usability** | [`sites/ux/`](sites/ux/) | UX Heuristics, Forms, Affordances | `https://uxusability-testbed.andrewwestley.co.uk/` |

---

## Directory Structure & Shared Architecture

```
audit-testbeds/
├── shared/                         # Single source of truth for reusable components
│   ├── css/                        # testbed-theme.css & silktide-consent-manager.css
│   ├── js/                         # silktide-consent-manager.js & common tools
│   └── includes/                   # suite-nav.php (navbar switcher dropdown)
├── sites/                          # Individual site web roots
│   ├── accessibility/
│   ├── content/
│   ├── coga/
│   └── ux/
├── scripts/                        # Pure-PHP automation tools (Zero Node.js overhead)
│   ├── build.php                   # Minifies CSS/JS & synchronizes shared assets into all sites
│   ├── lint_all.php                # Parallel syntax linting across all sites (< 2s)
│   └── generate_all_sitemaps.php   # Sitemap regeneration across all testbeds
└── .github/workflows/
    └── deploy.yml                  # Intelligent path-filtered Plesk VPS deployment
```

---

## Developer Automation Commands

### 1. Build & Minify All Assets
Minifies CSS/JS into `.min.css` and `.min.js` and syncs shared components across all 4 sites:
```powershell
php scripts/build.php
```

### 2. Lint All PHP Files
Checks syntax across the monorepo:
```powershell
php scripts/lint_all.php
```

### 3. Regenerate Sitemaps
Updates XML sitemaps for all 4 testbeds:
```powershell
php scripts/generate_all_sitemaps.php
```

---

## Setup & Deployment Guide

For full local development setup, PHP built-in server commands, and GitHub Actions secret configuration for Plesk VPS deployment, see the **[SETUP_GUIDE.md](SETUP_GUIDE.md)**.
