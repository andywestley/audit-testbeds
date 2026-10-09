# Content Scanner Testbed

This repository contains a simple, modular PHP testbed website. It is specifically designed to demonstrate both good and bad content practices for the **Content Insights and Brand Values scanning engines**. 

The site provides concrete examples of how different heuristics (such as Flesch-Kincaid readability scores, passive voice detection, weasel words, and inclusivity checks) trigger against web content.

## Purpose

The primary goal of this site is to serve as a testing ground for automated accessibility and content scanning tools. It includes deliberately flawed pages that violate content guidelines, alongside clean, well-written equivalents. 

Each "bad" page features a prominent visual callout block at the top, explaining exactly which content rules it is designed to violate (e.g., high reading level, mild profanity, language mismatch, aggressive sales tone).

## Project Structure

The site is built using basic PHP to ensure it is lightweight and easy to deploy, utilizing Bootstrap 5 for responsive layout and styling.

```text
/
├── .github/workflows/
│   └── deploy.yml          # GitHub Action for SSH/Rsync deployment
├── assets/
│   └── css/
│       └── style.css       # Custom styles, premium aesthetics, and bad-content callouts
├── includes/
│   ├── header.php          # Global header, navigation, and disclaimer banner
│   └── footer.php          # Global footer and JS bundles
├── index.php               # Homepage / Dashboard with links to all examples
├── content_scanning_rules.md # Documentation of the scanning heuristics
└── [Content Pages]         # The good/bad PHP examples
```

### Content Archetypes

1. **News Articles (`news-*.php`)**
   - Implements Schema.org `NewsArticle`.
   - Tests for reading complexity, passive voice, and clear journalism structures.
2. **Product Pages (`product-*.php`)**
   - Implements Schema.org `Product`.
   - Tests for weasel words, intensifiers, cliches, and missing image `alt` attributes.
3. **Blog Posts (`blog-*.php`)**
   - Implements Schema.org `BlogPosting`.
   - Tests for non-inclusive language, mild profanity, language mismatch (Spanish on English page), and severe word overuse.

## Running Locally

You do not need a complex web server (like Apache or Nginx) to run this locally. You can use PHP's built-in development server.

1. Open your terminal and navigate to the project directory.
2. Run the following command:
   ```bash
   php -S localhost:8000
   ```
3. Open `http://localhost:8000` in your web browser.

## Deployment

The repository includes a GitHub Action (`.github/workflows/deploy.yml`) that automatically deploys the `main` branch to a remote server using Rsync over SSH. 

To use this action, you must define the following secrets in your GitHub repository settings (**Settings > Secrets and variables > Actions**):
- `SSH_PRIVATE_KEY`
- `SERVER_HOST`
- `SERVER_USERNAME`
- `SERVER_TARGET_DIR`
