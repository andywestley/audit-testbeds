# Accessibility Testbed

This microsite is designed to provide a comprehensive environment for testing accessibility tools and learning about WCAG violations. Each page focuses on specific categories of accessibility barriers.

## Live Demo
You can view the live production site here: [https://inaccessible.andrewwestley.co.uk/index.php](https://inaccessible.andrewwestley.co.uk/index.php)

> [!NOTE]
> This site is built using **PHP** and **Bootstrap 5**. While it looks modern, the accessibility violations are intentional and preserved.

## Development Methodology: "Vibe-Coding"

This project serves as a demonstration of **"Vibe-Coding"** with **Google Antigravity**—a term the author *hates*, but which accurately describes the workflow.

To test the capabilities of modern Agentic AI, almost none of the code in this repository was written by hand. Instead, the entire site—from the PHP structure and Bootstrap styling to the deliberate accessibility violations—was generated through natural language prompts and iterative collaboration with the AI.

This approach highlights what is achievable when using advanced AI agents to rapidly prototype and build complex, functional web environments.

## Purpose: The Automated Analyzer
While this site exists as a standalone demonstration of accessibility failures, its primary purpose is to serve as a **test harness** for an automated accessibility analyzer, which is being built using the same "vibe-coding" methodology.

This testbed provides the known bad states required to verify the detection logic of that analyzer, ensuring it can correctly identify and report on a wide range of WCAG violations.

## Architecture & Setup

### Requirements
- A web server with PHP support (e.g., Apache, Nginx, XAMPP, or built-in PHP server).
- Internet connection (for Bootstrap CDN).

### Running Locally
1. Clone the repository.
2. Point your web server to the root directory.
3. Access `index.php` (or just the root URL if `.htaccess` is supported).

### Structure
- `*.php`: The main content pages.
- `includes/`: Contains shared `header.php` and `footer.php`.
- `.htaccess`: Configures `index.php` as the default directory index.

### Analytics Setup
This project uses Google Tag Manager (GTM). To enable it:
1. Create a file named `includes/config.php`.
2. Add your GTM Container ID as follows:
   ```php
   <?php
   $gtmId = 'GTM-XXXXXXX';
   ```
3. This file is ignored by git to protect your configuration. If the file is missing or the ID is empty, GTM snippets will not be rendered, and the "Cookie Policy" link in the footer will be hidden.

#### Silktide Consent Manager
For cookie consent management, this testbed references Silktide artifacts via GTM. See [Silktide Consent Manager Installation](https://silktide.com/consent-manager/install/) for more details.

## Site Structure & Page Purpose

| Page | Description & Demonstrated Violations |
|------|---------------------------------------|
| `index.php` | **Homepage**: Serves as the navigation hub. Demonstrates basic structure violations like "div soup" instead of semantic HTML, missing skip links, and bad titles. |
| `aria_bad.php` | **Bad ARIA**: Showcases common misuses of ARIA, such as `aria-hidden="true"` on focusable elements, invalid roles, and conflicting attributes. |
| `contrast.php` | **Color Contrast**: Features text with insufficient color contrast ratios against backgrounds, making it difficult for low-vision users to read. |
| `flashing.php` | **Flashing Content**: Contains content that flashes or blinks at rates that may trigger seizures (Photosensitive Epilepsy risk). |
| `focus_order.php` | **Focus Order**: Demonstrates illogical tab order where keyboard focus jumps around unpredictably, confusing keyboard-only users. |
| `forms_advanced.php` | **Advanced Forms**: Complex form elements with missing labels, poor association between labels and inputs, and lack of error identification. |
| `forms_basic.php` | **Basic Forms**: Simple form fields missing explicit labels or using placeholder text as labels (which disappears on input). |
| `iframes.php` | **Iframes**: Contains iframes missing `title` attributes, making navigation difficult for screen reader users. |
| `images.php` | **Images**: Images missing `alt` text, using filenames as alt text, or having redundant alt text (e.g., "image of..."). |
| `interactive.php` | **Interactive**: Elements that are interactive only via mouse (e.g., `div` or `span` with click handlers) and not accessible via keyboard. |
| `keyboard_traps.php` | **Keyboard Traps**: Elements that trap focus, preventing users from navigating away using standard keyboard controls (e.g., Tab/Esc). |
| `language.php` | **Language**: Pages missing the `lang` attribute or parts of the page in a different language without proper tagging. |
| `links.php` | **Links**: ambiguous link text like "click here" or "read more" that provides no context when read out of context. |
| `media.php` | **Media**: Audio and video content missing captions, transcripts, or audio descriptions. |
| `orientation.php` | **Orientation**: Content that is locked to a specific orientation (portrait/landscape) or requires a specific device motion. |
| `parsing.php` | **Parsing**: Invalid HTML syntax, duplicate IDs, and unclosed tags that issues for assistive technologies. |
| `structure.php` | **Structure**: Improper use of headings (skipping levels), missing landmarks, and lack of semantic containers. |
| `tables.php` | **Tables**: Data tables missing header cells (`<th>`), scope attributes, or using tables for layout purposes. |
| `target_size.php` | **Target Size**: Demonstrates elements with insufficient target sizes (< 24x24px) and lack of spacing (WCAG 2.5.8). |
| `typography.php` | **Typography**: Text styling issues such as fixed font sizes, justified text, or poor line height that affect readability. |
| `zoom_responsive.php` | **Zoom & Responsive**: Content that overlaps, gets cut off, or becomes unusable when zoomed in (reflow issues) or viewed on small screens. |

### Journeys
A dedicated section `journeys/` contains multi-step flows to test interaction patterns:
-   **Login Flow**: `journeys/login.php` -> `journeys/dashboard.php`. Simulates authentication with missing labels, low contrast, and poor error handling.
-   **Multi-step Survey**: `journeys/survey_step1.php` -> `journeys/survey_step2.php` -> `journeys/survey_complete.php`. Simulates a wizard with fake buttons, inaccessible progress bars, and ungrouped controls.
-   **Blocked Registration**: `journeys/blocked_form.php`. Features strict client-side validation that relies on color and lacks error association, effectively blocking submission for many users.

### Heuristics & Interaction Dynamics
A dedicated section `heuristics/` contains test cases for dynamic content, focus management, and user hostile patterns:

#### Interaction Dynamics
-   **Focus Management Failure**: `heuristics/focus_failure.php`. Demonstrates focus loss during AJAX updates.
-   **Invisible Focus Indicator**: `heuristics/focus_hidden.php`. Hides focus rings on all interactive elements. (WCAG 2.4.7)
-   **Meaning by Color Alone**: `heuristics/color_only.php`. Status indicated only by colored circles. (WCAG 1.4.1)
-   **Silent Status Updates**: `heuristics/silent_update.php`. Demonstrates dynamic content updates missing `aria-live`.
-   **State Mismatch**: `heuristics/state_mismatch.php`. Demonstrates conflicting visual vs. programmatic state (e.g., `aria-expanded`).
-   **Keyboard Trap**: `heuristics/keyboard_trap.php`. A custom widget that captures focus and prevents exit.
-   **Layout Shift (CLS)**: `heuristics/layout_shift.php`. Content injection causing visual instability.
-   **The Sticky Tooltip**: `heuristics/sticky_tooltip.php`. Persistent tooltips that obscure content. (WCAG 1.4.13)
-   **Motion Actuation Failure**: `heuristics/shake_fail.php`. Requires device motion with no button alternative. (WCAG 2.5.4)
-   **Complex Pointer Gestures**: `heuristics/complex_gestures.php`. Requires path-based patterns for submission. (WCAG 2.5.1)

#### User Hostile Patterns (Dark Patterns)
These scenarios demonstrate complex widget failures and hostile design patterns:
-   **The "Ghost" Modal**: `heuristics/ghost_modal.php`. A dialog opens but focus remains on the background page. (WCAG 2.4.3)
-   **Unstoppable Carousel**: `heuristics/carousel_autoplay.php`. An auto-rotating slider with no pause control. (WCAG 2.2.2)
-   **The Vanishing Toast**: `heuristics/vanishing_toast.php`. Status messages that disappear too quickly. (WCAG 2.2.1)
-   **Mouse-Only Sortable List**: `heuristics/sortable_list.php`. Drag-and-drop interfaces that cannot be operated via keyboard. (WCAG 2.1.1)
-   **Timed Session Expiry**: `heuristics/session_expiry.php`. A session warning that traps focus or cannot be extended. (WCAG 2.2.1)
-   **Accordion "Yo-Yo"**: `heuristics/accordion_yoyo.php`. Opening one section automatically closes others, shifting layout. (WCAG 3.2.2)
-   **Complex Date Picker**: `heuristics/datepicker_trap.php`. A visual grid calendar that is a keyboard trap. (WCAG 4.1.2)
-   **Visual-Only CAPTCHA**: `heuristics/captcha_visual.php`. Security challenges that rely solely on visual identification. (WCAG 1.1.1)

### Cognitive Accessibility (COGA)
A dedicated section `cognitive/` tests logic for understanding, memory, and focus:
-   **Timeouts without Warning**: `cognitive/timeout_no_warning.php`. Sudden session expiration with no extension. (WCAG 2.2.1)
-   **Complex Language & Jargon**: `cognitive/complex_jargon.php`. Unnecessarily advanced vocabulary and industry acronyms. (WCAG 3.1.5)
-   **Inconsistent Navigation**: `cognitive/inconsistent_nav.php`. Navigation elements moving across pages. (WCAG 3.2.3)
-   **Overwhelming Visuals**: `cognitive/overwhelming_visuals.php`. Cluttered UI and distracting animations. (WCAG 2.2.2)
-   **Memory Burden Wizard**: `cognitive/memory_burden.php`. Forms requiring recall of info from earlier steps.
-   **Cryptic Error Messages**: `cognitive/cryptic_errors.php`. Tech jargon or vague codes instead of help. (WCAG 3.3.3)
-   **Blocked Copy-Paste**: `cognitive/blocked_paste.php`. Input fields that disable pasting. (COG.BLOCKED_PASTE)
-   **Rapid Flashing Content**: `cognitive/rapid_flashing.php`. High-frequency animations (> 3Hz). (COG.RAPID_FLASHING / WCAG 2.3.1)
-   **Justified Text Alignment**: `cognitive/justified_text.php`. Justified text blocking reading flow. (COG.JUSTIFIED_TEXT)
-   **Absolute Font Size**: `cognitive/absolute_font_size.php`. Hardcoded font sizes in absolute units. (COG.ABS_FONT_SIZE / WCAG 1.4.4)
-   **Wall of Text**: `cognitive/wall_of_text.php`. A paragraph of over 150 words with no visual breaks. (COG.WALL_OF_TEXT)
-   **Complex Wording**: `cognitive/complex_wording.php`. Sentences averaging more than 30 words. (COG.COMPLEX_WORDING)
-   **Viewport Zoom Restriction**: `cognitive/viewport_zoom.php`. Disabling scaling in the viewport. (COG.NO_ZOOM / WCAG 1.4.4)
-   **Small Click Targets**: `cognitive/small_click_targets.php`. Interactive targets smaller than 24x24px. (COG.TARGET_SIZE / WCAG 2.5.8)

## Roadmap

Future categories and enhancements planned for the testbed:
1. **Dynamic Content Refactoring**: Moving all interaction tests to use standard custom elements for easier detection testing.
2. **Audio/Video Tracks**: Adding actual media files with broken/missing VTT tracks for advanced media testing.




