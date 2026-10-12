# UxScanner Rule Expansion Guide: 4 New Usability & Anti-Pattern Rules

This specification is designed as a prompt-ready implementation guide for integrating 4 new heuristic detection rules into the `site-audit` engine (`UxScanner.js`). Each rule corresponds to a live test page now running on the [UX & Usability Anti-Patterns Testbed](https://uxusability-testbed.andrewwestley.co.uk/).

---

## 1. `ux-paste-disabled` — Paste Blocked on Input Fields

### Overview & Citation
* **Pillar:** Pillar 1 — Form & Input Usability
* **Default Severity:** `Warning`
* **Authority Standard:** **Baymard Institute Form Usability Guideline #881** & **OWASP ASVS v4.0 (Section 2.1.9)**
* **Citation:** *"Always allow pasting into password, email, and payment inputs. Blocking clipboard paste breaks password managers, dramatically increases typo rates, and reduces checkout completion."*
* **Live Testbed Demonstration:** [https://uxusability-testbed.andrewwestley.co.uk/tests/paste-disabled.php](https://uxusability-testbed.andrewwestley.co.uk/tests/paste-disabled.php)

### What It Triggers On
Interactive `<input>` and `<textarea>` controls where clipboard pasting is intentionally disabled or intercepted.

### Detection Heuristics (Static DOM & Cheerio / Playwright)

#### A. Static DOM (Cheerio)
1. Find all `<input>` and `<textarea>` elements on the page.
2. Check for inline event handler attributes:
   - `onpaste` attribute containing `return false`, `preventDefault()`, `return false;`, or empty/blocking functions.
   - Example: `input[onpaste*="return false"]`, `input[onpaste*="preventDefault"]`.
3. Check for non-standard clipboard-blocking attributes (e.g., `data-disable-paste="true"`).

#### B. Dynamic / Headless Browser (Playwright)
Evaluate attached event listeners on interactive inputs:
```javascript
// Playwright page evaluation
const blockedInputs = await page.$$eval('input, textarea', (elements) => {
  return elements.filter(el => {
    // 1. Inline onpaste
    const onpasteAttr = el.getAttribute('onpaste');
    if (onpasteAttr && (onpasteAttr.includes('return false') || onpasteAttr.includes('preventDefault'))) {
      return true;
    }
    // 2. Dispatched paste event cancellation test
    let wasPrevented = false;
    const testEvent = new ClipboardEvent('paste', { bubbles: true, cancelable: true });
    el.dispatchEvent(testEvent);
    return testEvent.defaultPrevented;
  }).map(el => ({
    name: el.name || el.id || el.placeholder,
    type: el.type,
    selector: el.id ? `#${el.id}` : el.name ? `[name="${el.name}"]` : el.tagName.toLowerCase()
  }));
});
```

### False-Positive Mitigation
* **Exclude Readonly & Disabled Inputs:** Skip `<input readonly>` or `<input disabled>` since they are not intended for active user editing.
* **Exclude Custom Code Editors:** Skip elements with role `code` or containers inside Monaco/CodeMirror where custom clipboard handling is normal.

### Recommended Remediation Output
> *"Remove `onpaste="return false;"` from input `[selector]`. Password managers and clipboard paste must remain functional to prevent checkout drop-offs and password errors."*

---

## 2. `ux-placeholder-as-label` — Placeholder Used as Sole Label

### Overview & Citation
* **Pillar:** Pillar 1 — Form & Input Usability
* **Default Severity:** `Warning`
* **Authority Standard:** **Nielsen Norman Group (NN/g)** & **W3C WAI Web Accessibility Tutorials**
* **Citation:** *"Placeholders in form fields are harmful when used as labels. Vanishing placeholder text strains short-term memory, obscures field requirements once typed, and causes high error rates."*
* **Live Testbed Demonstration:** [https://uxusability-testbed.andrewwestley.co.uk/tests/placeholder-as-label.php](https://uxusability-testbed.andrewwestley.co.uk/tests/placeholder-as-label.php)

### What It Triggers On
Interactive `<input>` or `<textarea>` form controls that have a `placeholder` attribute but completely lack an accessible, persistent label.

### Detection Heuristics (Static DOM & Cheerio)
1. Select all `<input:not([type="hidden"]):not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"])>` and `<textarea>`.
2. Filter for elements with a non-empty `placeholder` attribute:
   ```javascript
   const placeholder = $(el).attr('placeholder');
   if (!placeholder || placeholder.trim() === '') return false;
   ```
3. Verify if an accessible label exists:
   - Check if enclosed in `<label>`: `$(el).closest('label').length > 0`
   - Check for explicit `<label for="...">`: `id ? $(`label[for="${id}"]`).length > 0 : false`
   - Check for `aria-label`: `Boolean($(el).attr('aria-label'))`
   - Check for `aria-labelledby`: `Boolean($(el).attr('aria-labelledby'))`
   - Check for Bootstrap Floating Label: `$(el).closest('.form-floating').find('label').length > 0`
4. If **NONE** of the above label associations exist, flag the element as `ux-placeholder-as-label`.

### False-Positive Mitigation
* **Search / Icon Inputs:** Skip inputs inside search bars where an adjacent `<button type="submit">` containing a search icon or word "Search" immediately follows and visually labels the field.
* **Hidden/Offscreen Fields:** Ignore `display: none` or hidden utility fields.

### Recommended Remediation Output
> *"Provide a persistent visible `<label for="...">` or floating label wrapper for input `[selector]`. Relying solely on `placeholder="[text]"` causes the label to disappear when users type."*

---

## 3. `ux-target-touch-size` — Sub-Standard Touch Target Size & Spacing

### Overview & Citation
* **Pillar:** Pillar 2 — Navigation, Wayfinding & IA
* **Default Severity:** `Warning`
* **Authority Standard:** **Apple Human Interface Guidelines (HIG)** & **W3C WCAG 2.2 SC 2.5.8 (Target Size Minimum)**
* **Citation:** *"Touch controls should have an interactive target area of at least 44×44px (and a strict minimum of 24×24px) with adequate spacing to prevent accidental activation on touch devices."*
* **Live Testbed Demonstration:** [https://uxusability-testbed.andrewwestley.co.uk/tests/target-touch-size.php](https://uxusability-testbed.andrewwestley.co.uk/tests/target-touch-size.php)

### What It Triggers On
Clickable elements (`<a>`, `<button>`, `input[type="button"]`, pagination links, action icons) whose bounding client rectangle is smaller than 24×24px, or closely clustered with <8px spacing from adjacent interactive targets.

### Detection Heuristics (Playwright / Headless Browser)
```javascript
// Playwright evaluated in mobile viewport (e.g. 390x844px)
const smallTargets = await page.$$eval('a[href], button, [role="button"], input[type="submit"]', (elements) => {
  return elements.map(el => {
    const rect = el.getBoundingClientRect();
    const style = window.getComputedStyle(el);
    
    // Ignore hidden or zero-dimension elements
    if (rect.width === 0 || rect.height === 0 || style.display === 'none' || style.visibility === 'hidden') {
      return null;
    }
    
    // Check if target is strictly smaller than minimum 24x24px
    const isUndersized = rect.width < 24 || rect.height < 24;
    
    // Check spacing against adjacent elements if under 44px
    return isUndersized ? {
      text: el.innerText.trim().slice(0, 30) || el.getAttribute('aria-label') || el.className,
      width: Math.round(rect.width),
      height: Math.round(rect.height),
      tag: el.tagName.toLowerCase()
    } : null;
  }).filter(Boolean);
});
```

### False-Positive Mitigation
* **Inline Text Links:** Do NOT flag inline links inside standard paragraphs of running text (e.g., links inside `<p>` tags), as text links naturally scale with font-size and are exempt under WCAG 2.5.8.
* **Header / Breadcrumb Dividers:** Ensure non-interactive visual separator spans are excluded.

### Recommended Remediation Output
> *"Enlarge touch target for `[selector]` (current size: ${width}×${height}px). Increase padding or hit-zone dimensions to at least 44×44px (minimum 24×24px) to prevent mis-taps on mobile devices."*

---

## 4. `ux-deceptive-asymmetry` — Asymmetric Choice Architecture (Visual Interference)

### Overview & Citation
* **Pillar:** Pillar 4 — Ethical UX & Deceptive Design
* **Default Severity:** `Error` (Dark Pattern / Regulatory Violation)
* **Authority Standard:** **FTC Staff Report: Bringing Dark Patterns to Light** & **EU Digital Services Act (DSA Article 25)**
* **Citation:** *"Visual interference uses asymmetric visual weight, contrasting button sizes, and hidden decline options to steer users away from neutral choices."*
* **Live Testbed Demonstration:** [https://uxusability-testbed.andrewwestley.co.uk/tests/deceptive-asymmetry.php](https://uxusability-testbed.andrewwestley.co.uk/tests/deceptive-asymmetry.php)

### What It Triggers On
Modal dialogs, consent banners, or upgrade conversion cards where the positive/commercial action is styled as a large, high-contrast button, while the negative/neutral option (e.g., "Decline", "Maybe later", "Keep Free") is rendered as an unstyled, low-contrast text link with significantly diminished visual weight.

### Detection Heuristics (Static DOM & Playwright)

#### Static DOM Patterns (Cheerio):
1. Locate decision containers: `.modal`, `.dialog`, `.banner`, `[role="dialog"]`, or cards containing conversion buttons (`Upgrade`, `Accept`, `Subscribe`, `Claim`, `Buy`).
2. Search for paired negative actions (`Decline`, `Reject`, `Later`, `Cancel`, `No thanks`, `Skip`).
3. Check the element type and class disparity:
   - Primary action: `<button class="btn btn-primary btn-lg">`
   - Secondary action: `<a>` or `<button>` with classes `.small`, `.text-muted`, `.text-secondary`, `.btn-link`, or font-size < 12px / opacity < 0.7.
   - If affirmative action is a filled button and negative action is plain text/link without a button container, flag as asymmetric visual interference.

#### Dynamic Style Comparison (Playwright):
```javascript
// Compare computed visual prominence between paired actions
const affirmativeBtn = container.querySelector('.btn-primary, button[type="submit"]');
const declineLink = container.querySelector('a, .btn-link');

if (affirmativeBtn && declineLink) {
  const affStyle = window.getComputedStyle(affirmativeBtn);
  const decStyle = window.getComputedStyle(declineLink);
  
  const affArea = affirmativeBtn.offsetWidth * affirmativeBtn.offsetHeight;
  const decArea = declineLink.offsetWidth * declineLink.offsetHeight;
  
  // Severe area disparity ratio > 4:1 and decline has low contrast / no background
  if (affArea > decArea * 4 && decStyle.backgroundColor === 'rgba(0, 0, 0, 0)') {
    // Flag ux-deceptive-asymmetry
  }
}
```

### False-Positive Mitigation
* **Standard Form Save/Cancel:** Ordinary form footers (e.g. `Save Changes` primary button next to `Cancel` outline button) are symmetric and neutral. Only flag when the negative option is demoted to unstyled, faint microcopy (<12px or low contrast link) specifically on conversion/consent prompts.

### Recommended Remediation Output
> *"Provide equal visual prominence between affirmative and decline choices in `[container]`. Both options should use clear button styling with balanced contrast to comply with FTC and EU Fair Choice regulations."*

---

## Ready-to-Use Prompt for Your `site-audit` Assistant:

```text
Please implement 4 new rules in worker/engines/UxScanner.js based on the UxScanner Rule Expansion Guide:

1. 'ux-paste-disabled': Detects <input> and <textarea> elements blocking clipboard paste via inline onpaste="return false", event.preventDefault(), or event interception. (Severity: Warning, Pillar: form-usability).
2. 'ux-placeholder-as-label': Detects form inputs that have a placeholder attribute but lack any accessible <label>, aria-label, aria-labelledby, or floating label wrapper. (Severity: Warning, Pillar: form-usability).
3. 'ux-target-touch-size': Detects interactive touch targets (<button>, <a>, touch controls) with computed bounding box under 24x24px or clustered with under 8px clearance. (Severity: Warning, Pillar: navigation-ia).
4. 'ux-deceptive-asymmetry': Detects asymmetric choice architecture / visual interference where commercial or consent prompts use large high-contrast buttons for affirmative actions while rendering decline options as unstyled, low-contrast, or hidden text links. (Severity: Error, Pillar: ethical-ux).

Reference the live demonstration suite for verification:
- https://uxusability-testbed.andrewwestley.co.uk/tests/paste-disabled.php
- https://uxusability-testbed.andrewwestley.co.uk/tests/placeholder-as-label.php
- https://uxusability-testbed.andrewwestley.co.uk/tests/target-touch-size.php
- https://uxusability-testbed.andrewwestley.co.uk/tests/deceptive-asymmetry.php
```
