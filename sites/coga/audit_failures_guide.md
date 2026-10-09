# Auditing Guide: Detecting COGA Failures and Success Criteria

This document provides a technical guide for building automated accessibility audit tools to detect violations of the 8 COGA guidelines. It details specific HTML, CSS, and DOM patterns that signal failures or successes.

---

## Guideline 1: Help users understand what things are and how to use them

### Automated Detection Strategies

#### 1. Inconsistent Interactive Element Semantics
*   **Fail Indicator (Non-standard Interactive Elements):**
    *   Presence of `div`, `span`, or `p` elements with click event listeners (`onclick` or JS-bound click handler) but missing `role="button"` or `tabindex="0"`.
    *   Using anchor tags `<a>` without an `href` attribute functioning as buttons.
*   **Detection Rule:** Parse the DOM for elements with click handlers. If tag name is not `button`, `input[type="submit"]`, `input[type="button"]`, or `a[href]`, verify that `role` is set appropriately (`button`, `link`, etc.) and `tabindex` is present to ensure keyboard focus.

#### 2. Ambiguous or Unlabelled Icons
*   **Fail Indicator:** Inline SVG, icon font classes (e.g., `.fa`, `.bi`, `.material-icons`), or `<img>` elements containing action links/buttons that have no accessible name (no inner text, no `aria-label`, no `aria-labelledby`, or no `alt` attribute).
*   **Detection Rule:** Find all interactive elements (`button`, `a`) where the only children are icons. Check if `aria-label` or `aria-labelledby` is missing or empty, or if nested `img`/`svg` lacks `alt` / `aria-label`.

---

## Guideline 2: Help users find what they need

### Automated Detection Strategies

#### 1. Poor Heading Hierarchy
*   **Fail Indicator:** Skipped heading levels (e.g., `<h1>` followed directly by `<h3>` or `<h4>`), or multiple `<h1>` elements on a single page, or headings that are styled divs (e.g., `<div class="heading-style">`) rather than semantic headings (`<h1>`–`<h6>`).
*   **Detection Rule:** Outline the document structure using heading elements (`h1` to `h6`). Flag any instances where a level is skipped (e.g., $h_{i} \to h_{i+2}$).

#### 2. Navigation Aids Check
*   **Fail Indicator:** 
    *   Absence of a `<nav>` landmark or navigation container.
    *   Lack of a search input (input type `search` or role `search`).
    *   No skip-link (an anchor at the very beginning of the page linking to the main content container, e.g. `<a href="#main-content">Skip to content</a>`).
*   **Detection Rule:** Check for standard landmarks: `nav`, `main`, `header`, `footer`. Check for an anchor element with class/text indicating "skip" that points to an ID existing in the DOM.

---

## Guideline 3: Use clear and understandable content

### Automated Detection Strategies

#### 1. Text Density and Readability (Flesch-Kincaid / Automated Readability Index)
*   **Fail Indicator:** Text blocks with high density, extremely long sentences, and complex vocabulary.
*   **Detection Rule:** Extract text node content inside `<main>` and calculate readability scores (e.g., Flesch Reading Ease or Gunning Fog Index). Flag blocks of text that score below 60 (difficult to read, requiring high school/college education).

#### 2. Walls of Text without Visual Separation
*   **Fail Indicator:** Paragraphs (`<p>`) exceeding 150 words without list items (`<ul>`/`<ol>`), headings, images, or figures to break up content.
*   **Detection Rule:** Count words per paragraph block. Flag paragraphs exceeding a threshold (e.g., 100–120 words).

---

## Guideline 4: Help users avoid mistakes and know how to correct them

### Automated Detection Strategies

#### 1. Inflexible or Restrictive Form Validation
*   **Fail Indicator:** Form inputs targeting formatted data (phone numbers, postal codes, credit cards) containing strict HTML5 `pattern` regex that rejects spaces, hyphens, or parentheses without providing helper text or examples.
*   **Detection Rule:** Detect pattern attributes. If the pattern is restrictive (e.g. `^[0-9]{10}$` which fails on `123-456-7890` or `123 456 7890`), flag it if there is no accompanying `<span class="hint">` or descriptive `<label>`.

#### 2. Non-Semantic Error Summaries and Messages
*   **Fail Indicator:** Form submission errors that appear only inline without an error summary panel at the top, or error messages that are not dynamically announced (missing `aria-invalid="true"`, or `aria-describedby` pointing to the error message container).
*   **Detection Rule:** Inspect forms for inputs with `aria-invalid="true"`. Verify that their ID is referenced by `aria-describedby` on the same input, and that an element containing the error message exists in the DOM.

---

## Guideline 5: Help users focus

### Automated Detection Strategies

#### 1. Autoplay Media & Uncontrolled Animation
*   **Fail Indicator:** `<video>` or `<audio>` elements featuring `autoplay` attributes without user-visible pause/stop buttons, or CSS animations running indefinitely (`animation-iteration-count: infinite`) without a mechanism to pause them.
*   **Detection Rule:** Search for `autoplay` attribute on media elements. Check CSS files/style blocks for `infinite` animations and flag if they aren't wrapped in a `@media (prefers-reduced-motion)` query.

---

## Guideline 6: Ensure processes do not rely on memory

### Automated Detection Strategies

#### 1. Paste Events Blocked
*   **Fail Indicator:** Inputs (especially passwords, confirm-password, email, verification codes) where paste events are blocked via inline handlers (e.g., `onpaste="return false;"`) or event listeners in JS.
*   **Detection Rule:** Static analysis of the HTML/DOM looking for `onpaste` attributes containing `return false` or `preventDefault()`. In browser environments, programmatically dispatch a paste event to target inputs and verify if default behavior is prevented.

#### 2. Missing Autocomplete Attributes
*   **Fail Indicator:** Standard input fields (names, email addresses, phone numbers, shipping addresses) missing semantic `autocomplete` attributes, which prevents the browser from auto-filling details.
*   **Detection Rule:** Flag any text/email/tel inputs with names/labels like "name", "email", "address", "phone" that lack a valid HTML `autocomplete` attribute (e.g. `autocomplete="email"`).

---

## Guideline 7: Provide help and support

### Automated Detection Strategies

#### 1. Lack of Support Channels
*   **Fail Indicator:** Pages containing forms or multi-step processes that lack links or buttons leading to support documents, contact options, or help desks.
*   **Detection Rule:** Search for anchor tags or buttons with href/text/class containing "help", "support", "contact", "faq", or "feedback". If none are present on pages containing forms, flag as a warning.

---

## Guideline 8: Support adaptation and personalisation

### Automated Detection Strategies

#### 1. Fixed Pixel Fonts
*   **Fail Indicator:** Font sizes, line heights, or margins styled using static pixels (`px`) instead of relative units (`rem`, `em`, `%`), preventing fluid scaling.
*   **Detection Rule:** Scan CSS declarations for font-related attributes (`font-size`, `line-height`) using `px` units.

#### 2. Prevented User Scaling (Viewport Meta Tag)
*   **Fail Indicator:** Viewport configuration that locks scale, disabling browser zoom.
    ```html
    <meta name="viewport" content="user-scalable=no">
    <!-- OR -->
    <meta name="viewport" content="maximum-scale=1.0">
    ```
*   **Detection Rule:** Parse the `<meta name="viewport">` tag's `content` attribute. Flag if `user-scalable` is `no` or `0`, or if `maximum-scale` is less than `2.0`.

---

## Additional Cognitive & Memory Audits (General Heuristics)

### 1. Excessive Navigation Landmarks (Guideline 2 & 5)
*   **Fail Indicator:** Having too many distinct `<nav>` elements or containers with `role="navigation"` on a single page, which scatters attention.
*   **Detection Rule:** Query all navigation landmarks: `document.querySelectorAll('nav, [role="navigation"]').length`. If the count is greater than 3, trigger a warning flag for navigation clutter.

### 2. Overloaded Menus / Miller's Law (Guideline 6)
*   **Fail Indicator:** A navigation menu containing too many items overall, or a deeply nested structure (menus containing sub-menus, sub-sub-menus, etc.) that requires users to remember multiple navigation pathways, exceeding cognitive limits.
*   **Detection Rule:**
    1.  **Total Link Count:** Within each `<nav>` container, count all descendant link tags (`document.querySelectorAll('nav a')`). If the total links exceed 9, check if they are grouped with headings.
    2.  **Nesting Depth:** Walk the DOM tree inside each `<nav>` to find nested list elements (`ul`, `ol`). Calculate the maximum depth of list nesting (e.g., `nav > ul > li > ul > li > ul`). If the nesting depth is 3 or more (Menu -> Sub-menu -> Sub-sub-menu), flag it as a failure because tracking deep hierarchies requires high working memory load.


### 3. Complex Forms lacking Fieldsets (Guideline 4 & 5)
*   **Fail Indicator:** Form with many inputs ($> 7$ inputs) that are not organized into logical steps or wrapped in descriptive `<fieldset>` tags with `<legend>` descriptions.
*   **Detection Rule:** Parse all `<form>` elements. Count the input, select, and textarea elements. If the count exceeds 7 and the form lacks `<fieldset>` structures or is not split across multi-step layouts, flag it as a cognitive load failure.

### 4. Ambiguous Link Labels (Guideline 1 & 3)
*   **Fail Indicator:** Repeating generic anchor labels such as "Click Here", "More Info", or "Read More" pointing to different destinations.
*   **Detection Rule:** Collect all anchors on the page. Compare their exact visible text. If multiple links have the same text but different `href` attributes, verify if they contain `aria-label` or `aria-describedby` specifying the unique target context. If not, flag them as ambiguous.

