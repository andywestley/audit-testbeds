# Audit Testbeds Monorepo — Setup & Migration Guide

This document provides step-by-step instructions for publishing, testing, and managing the unified **`audit-testbeds`** monorepo, followed by the graceful decommissioning of the original standalone repositories.

---

## 1. Monorepo Overview

This monorepo aggregates the 4 automated benchmark testbeds into a single codebase while maintaining **4 independent live domains**:

| Testbed | Directory | Focus Area | Live Subdomain |
| :--- | :--- | :--- | :--- |
| **Accessibility** | [`sites/accessibility/`](sites/accessibility/) | WCAG 2.2 Level A/AA/AAA | `https://inaccessible.andrewwestley.co.uk/` |
| **Content Quality** | [`sites/content/`](sites/content/) | Plain English, Readability, Format | `https://content-testbed.andrewwestley.co.uk/` |
| **Cognitive (COGA)** | [`sites/coga/`](sites/coga/) | Cognitive Accessibility & Memory | `https://coga-testbed.andrewwestley.co.uk/` |
| **UX & Usability** | [`sites/ux/`](sites/ux/) | UX Heuristics & Interaction Design | `https://uxusability-testbed.andrewwestley.co.uk/` |

---

## 2. Step 1: Publish Monorepo to GitHub

1. Create a new repository on GitHub:
   - **Repository Name**: `audit-testbeds`
   - **Owner**: `andywestley`
   - **Visibility**: Public (or Private)

2. Link local repo and push to GitHub:
   ```powershell
   git clone https://github.com/andywestley/audit-testbeds.git
   cd audit-testbeds
   ```

---

## 3. Step 2: Configure GitHub Actions Secrets

Navigate to `https://github.com/andywestley/audit-testbeds/settings/secrets/actions` and add the following repository secrets for Plesk VPS deployment:

### Core SSH Credentials
- **`SSH_PRIVATE_KEY`**: Your VPS deployment private key.
- **`SSH_HOST`**: Your VPS domain / IP address.
- **`SSH_USER`** (or `SSH_USERNAME`): SSH username on the VPS.

### VPS Deployment Target Paths
- **`TARGET_A11Y`**: `/var/www/vhosts/andrewwestley.co.uk/inaccessible.andrewwestley.co.uk/`
- **`TARGET_CONTENT`**: `/var/www/vhosts/andrewwestley.co.uk/content-testbed.andrewwestley.co.uk/`
- **`TARGET_COGA`**: `/var/www/vhosts/andrewwestley.co.uk/coga-testbed.andrewwestley.co.uk/`
- **`TARGET_UX`**: `/var/www/vhosts/andrewwestley.co.uk/uxusability-testbed.andrewwestley.co.uk/`

*(Note: The workflow `.github/workflows/deploy.yml` has fallbacks for `SERVER_HOST`, `SERVER_USERNAME`, and `SSH_TARGET_DIR` for backward compatibility).*

---

## 4. Step 3: Local Developer Workflow & Automation
 
### Build & Asset Minification Pipeline (Pure PHP)
To minify all CSS/JS assets and synchronize shared includes/themes into all 4 testbeds:
```powershell
php scripts/build.php
```
*(Note: This step also runs automatically inside GitHub Actions on every VPS push).*

### Syntax Linting (All 4 Sites)
To check all PHP files across the entire monorepo in under 2 seconds:
```powershell
php scripts/lint_all.php
```

### Master Sitemap Generator
To regenerate sitemaps across all 4 sites in one command:
```powershell
php scripts/generate_all_sitemaps.php
```

### Shared Single-Source Components
- **`shared/css/testbed-theme.css`**: Unified design system containing all tokens (`:root`), body typography, diagnostic header bars, severity pills, comparison cards, matrix tables, and sandboxes.
- **`shared/css/silktide-consent-manager.css` & `shared/js/silktide-consent-manager.js`**: Centralized Silktide consent banner assets.
- **`shared/includes/suite-nav.php`**: Standard suite switcher component rendering a cross-site dropdown in the navbar.

---

## 5. Step 4: Verification & Deployment Workflow

The monorepo utilizes `.github/workflows/deploy.yml` with intelligent path filtering (`dorny/paths-filter`):

- **Pushing changes to `sites/ux/**`** -> Only deploys the UX Usability testbed.
- **Pushing changes to `sites/coga/**`** -> Only deploys the COGA testbed.
- **Pushing changes to `sites/content/**`** -> Only deploys the Content testbed.
- **Pushing changes to `sites/accessibility/**`** -> Only deploys the Accessibility testbed.
- **Pushing changes to `shared/**`** -> Deploys all 4 testbeds in parallel.
- **Manual Trigger**: You can trigger a deployment for any/all sites anytime via GitHub Actions **Run workflow** (`workflow_dispatch`).

---

## 6. Step 5: Decommissioning Original Repositories

Once you have verified the first successful deployment from `audit-testbeds`:

1. **Disable GitHub Actions in Old Repos**:
   In each of the 4 original repositories, go to **Actions** -> **Deploy to VPS** -> Click `...` -> **Disable workflow**.

2. **Add Deprecation Notice to Old `README.md` files**:
   ```markdown
   > **Note**: This standalone repository is now archived and maintained as part of the unified [audit-testbeds](https://github.com/andywestley/audit-testbeds) monorepo.
   ```

3. **Archive Old Repositories on GitHub**:
   In each repo: **Settings** -> **Danger Zone** -> **Archive this repository** (sets repo to read-only).
