# COGA Cognitive Accessibility Testbed

A sandbox testbed designed to demonstrate the 8 Cognitive Accessibility (COGA) principles outlined by the W3C. This repository showcases side-by-side examples of **design failures** and **remediated solutions** to help audit tools, QA engineers, and developers understand cognitive accessibility.

The live deployment of this demonstration site can be viewed at: **https://coga.andrewwestley.co.uk**

---

## Features

- **Modular Layout**: Shared headers, footers, and navigations written in modular PHP.
- **Styling**: Built with Bootstrap 5 and customized style tokens.
- **Aesthetics & Personalization**: Live client-side toolbar controls supporting:
  - Theme toggles (Light, Dark, and High Contrast).
  - Fluid text and line spacing options.
  - Dyslexic-friendly font spacing overrides.
- **Comparative Pages**: Each of the 8 COGA principles includes:
  - A **Fail Page** containing standard inaccessible DOM patterns (unlabelled icon buttons, multi-level nested menus, strict regex validations, missing semantic fields, and autoplay distractions).
  - A **Pass Page** demonstrating accessible remediation patterns.

---

## The 8 COGA Guidelines Demonstrated

1. **Understand Purpose**: Clear button roles vs. ambiguous icons and link styles.
2. **Find Content**: Logical heading outlines vs. skipped heading levels and excessive `<nav>` landmarks.
3. **Clear Content**: Plain English vs. dense walls of jargon and unexpanded acronyms.
4. **Avoid Mistakes**: Forgiving validations and descriptive error summaries vs. strict formats and unhelpful error codes.
5. **Help Focus**: Clean distraction-free viewports vs. blinking banners and autoplay audio.
6. **No Memory Reliance**: Enabled autocomplete and copy-paste inputs vs. blocked paste actions and complex verification codes.
7. **Provide Support**: Multi-channel support desk widgets vs. hidden or single-channel contact details.
8. **Adaptability**: Responsive `rem` layout scaling vs. fixed pixel sizes (`px`) and locked user zooming viewport metadata.

---

## Automated Auditing Capabilities

This sandbox acts as a testbed for automated accessibility auditing tools. It implements realistic failures that violate COGA success criteria, such as:
- Blocked keyboard focus and click handlers on non-interactive elements (`div`, `span`).
- Viewport scaling locks (`user-scalable=no`).
- Restrictive regular expression patterns on inputs without instructional hints.
- Nested menu depth structures exceeding 3 levels (violating working memory constraints).
- Repeated identical link text labels pointing to different destination endpoints.

For details on how to write automated checks for these failures, view the [Audit Failures Guide](.system_generated/steps/4/content.md) (or the `audit_failures_guide.md` artifact in the brain workspace).

---

## Local Setup

Run the built-in PHP development server from the project directory:

```bash
php -S localhost:8080 -t public
```

Open your browser and navigate to `http://localhost:8080`.
