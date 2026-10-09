# Audit Testbeds Monorepo — Developer & Deployment Setup Guide

Comprehensive setup, developer workflow, and CI/CD deployment guide for the unified **`audit-testbeds`** monorepo.

---

## 1. Monorepo Overview

This repository houses the 4 automated benchmark testbed applications within a single unified codebase, deploying to **4 independent live subdomains**:

| Testbed | Directory | Focus Area | Live Subdomain |
| :--- | :--- | :--- | :--- |
| **Accessibility** | [`sites/accessibility/`](sites/accessibility/) | WCAG 2.2 Level A/AA/AAA, Section 508, Axe-Core | `https://inaccessible.andrewwestley.co.uk/` |
| **Content Quality** | [`sites/content/`](sites/content/) | Plain English, Readability (Flesch), Inclusivity | `https://content-testbed.andrewwestley.co.uk/` |
| **Cognitive (COGA)** | [`sites/coga/`](sites/coga/) | Cognitive Accessibility, Memory, Mental Load | `https://coga-testbed.andrewwestley.co.uk/` |
| **UX & Usability** | [`sites/ux/`](sites/ux/) | UX Heuristics, Form Usability, Affordances | `https://uxusability-testbed.andrewwestley.co.uk/` |

---

## 2. Directory Architecture

```
audit-testbeds/
├── shared/                         # Single source of truth for cross-testbed components
│   ├── css/                        # testbed-theme.css & silktide-consent-manager.css
│   ├── js/                         # silktide-consent-manager.js & common utilities
│   └── includes/                   # suite-nav.php (navbar suite switcher dropdown)
├── sites/                          # Self-contained web roots for each live testbed
│   ├── accessibility/
│   ├── content/
│   ├── coga/
│   └── ux/
├── scripts/                        # Pure-PHP automation & build tools (Zero Node.js overhead)
│   ├── build.php                   # Minifies CSS/JS & synchronizes shared assets into all sites
│   ├── lint_all.php                # Parallel syntax linting across all sites (< 2s)
│   └── generate_all_sitemaps.php   # Sitemap regeneration across all testbeds
└── .github/workflows/
    └── deploy.yml                  # Intelligent path-filtered Plesk VPS deployment
```

---

## 3. Local Development Setup

### Prerequisites
* **PHP 8.1+** (Command-line CLI)
* **Git**

### Clone & Initialize
```powershell
git clone https://github.com/andywestley/audit-testbeds.git
cd audit-testbeds

# Build minified assets and synchronize shared includes into all sites
php scripts/build.php
```

### Running Local Development Servers
You can preview any testbed site locally using PHP's built-in web server:

```powershell
# Accessibility Testbed
php -S localhost:8001 -t sites/accessibility

# Content Testbed
php -S localhost:8002 -t sites/content

# Cognitive (COGA) Testbed
php -S localhost:8003 -t sites/coga/public

# UX & Usability Testbed
php -S localhost:8004 -t sites/ux
```

---

## 4. Automation Tooling

### 1. Build & Asset Minification (`php scripts/build.php`)
A fast, pure-PHP minifier and asset sync pipeline with zero npm dependencies:
* Minifies shared and site-level `.css` and `.js` into `.min.css` and `.min.js`.
* Synchronizes `shared/css/`, `shared/js/`, and `shared/includes/` into each site's destination asset folders.
* Executes in **~100ms**.

### 2. Monorepo Syntax Linter (`php scripts/lint_all.php`)
Checks all PHP files across the entire monorepo in parallel:
```powershell
php scripts/lint_all.php
```

### 3. Master Sitemap Generator (`php scripts/generate_all_sitemaps.php`)
Regenerates XML sitemaps across all 4 sites in a single command:
```powershell
php scripts/generate_all_sitemaps.php
```

---

## 5. Plesk VPS Deployment & CI/CD Configuration

Deployments are automated via GitHub Actions using SSH/Rsync in [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml).

### Required GitHub Repository Secrets
Navigate to **Settings $\rightarrow$ Secrets and variables $\rightarrow$ Actions** in your GitHub repository and configure the following:

#### Core SSH Credentials
* **`SSH_PRIVATE_KEY`**: Your VPS deployment private SSH key.
* **`SSH_HOST`**: Your VPS domain name or IP address.
* **`SSH_USER`**: SSH username on the VPS.

#### Target Subdomain Document Roots on Plesk
* **`TARGET_A11Y`**: `/var/www/vhosts/andrewwestley.co.uk/inaccessible.andrewwestley.co.uk/`
* **`TARGET_CONTENT`**: `/var/www/vhosts/andrewwestley.co.uk/content-testbed.andrewwestley.co.uk/`
* **`TARGET_COGA`**: `/var/www/vhosts/andrewwestley.co.uk/coga-testbed.andrewwestley.co.uk/`
* **`TARGET_UX`**: `/var/www/vhosts/andrewwestley.co.uk/uxusability-testbed.andrewwestley.co.uk/`

---

## 6. Intelligent Deployment Triggering

The deployment workflow uses `dorny/paths-filter` to only build and deploy sites that have changes:

* **Changes to `sites/accessibility/**`** $\rightarrow$ Deploys only Accessibility.
* **Changes to `sites/content/**`** $\rightarrow$ Deploys only Content.
* **Changes to `sites/coga/**`** $\rightarrow$ Deploys only COGA.
* **Changes to `sites/ux/**`** $\rightarrow$ Deploys only UX & Usability.
* **Changes to `shared/**`** $\rightarrow$ Builds and deploys all 4 testbeds in parallel.
* **Manual Dispatch**: Trigger a deploy for any/all sites anytime via GitHub Actions **Run workflow**.
