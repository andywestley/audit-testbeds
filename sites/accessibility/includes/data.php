<?php
/**
 * WCAG 2.2 Accessibility Criteria & Principles Catalog Data
 */

$pillars = [
    'pillar-perceivable' => [
        'id' => 'pillar-perceivable',
        'name' => '1. Perceivable',
        'standard' => 'WCAG 2.2 Principle 1',
        'icon' => 'bi-eye-fill',
        'color' => 'primary',
        'description' => 'Information and user interface components must be presentable to users in ways they can perceive (Alt text, captions, contrast, reflow).'
    ],
    'pillar-operable' => [
        'id' => 'pillar-operable',
        'name' => '2. Operable',
        'standard' => 'WCAG 2.2 Principle 2',
        'icon' => 'bi-hand-index-thumb-fill',
        'color' => 'success',
        'description' => 'User interface components and navigation must be operable (Keyboard access, no traps, timing, seizure prevention, focus order, bypass blocks).'
    ],
    'pillar-understandable' => [
        'id' => 'pillar-understandable',
        'name' => '3. Understandable',
        'standard' => 'WCAG 2.2 Principle 3',
        'icon' => 'bi-lightbulb-fill',
        'color' => 'info',
        'description' => 'Information and the operation of user interface must be understandable (Language attributes, predictable inputs, error identification).'
    ],
    'pillar-robust' => [
        'id' => 'pillar-robust',
        'name' => '4. Robust',
        'standard' => 'WCAG 2.2 Principle 4',
        'icon' => 'bi-shield-shaded',
        'color' => 'warning',
        'description' => 'Content must be robust enough that it can be interpreted reliably by a wide variety of user agents, including assistive technologies (ARIA, parsing).'
    ]
];

$testPages = [
    [
        'file' => 'images.php',
        'name' => 'Non-Text Content & Images',
        'rule' => 'WCAG 1.1.1',
        'level' => 'A',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.1.1: All non-text content presented to the user has a text alternative that serves the equivalent purpose.',
        'trigger_summary' => 'Missing alt attributes, file names as alt text, redundant phrases ("image of"), and missing image map area labels.'
    ],
    [
        'file' => 'media.php',
        'name' => 'Time-based Media & Audio/Video',
        'rule' => 'WCAG 1.2.1-1.2.5',
        'level' => 'A',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.2.1-1.2.5: Captions and alternative text/audio descriptions must be provided for pre-recorded time-based media.',
        'trigger_summary' => 'Autoplaying media without controls, missing synchronized video caption tracks, and missing audio descriptions.'
    ],
    [
        'file' => 'structure.php',
        'name' => 'Info & Relationships (Headings & Landmarks)',
        'rule' => 'WCAG 1.3.1',
        'level' => 'A',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.3.1: Information, structure, and relationships conveyed through presentation can be programmatically determined.',
        'trigger_summary' => 'Skipped heading levels, fake headings using divs, misused blockquotes/lists, and missing structural landmarks.'
    ],
    [
        'file' => 'tables.php',
        'name' => 'Data Tables & Headers',
        'rule' => 'WCAG 1.3.1',
        'level' => 'A',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.3.1: Tables used for tabular data must associate data cells with header cells (th) using appropriate scope and id/headers.',
        'trigger_summary' => 'Layout tables using presentation role incorrectly, data tables missing <th> headers, and complex tables missing scope attributes.'
    ],
    [
        'file' => 'orientation.php',
        'name' => 'Orientation (Portrait/Landscape)',
        'rule' => 'WCAG 1.3.4',
        'level' => 'AA',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.3.4: Content does not restrict its view and operation to a single display orientation, unless essential.',
        'trigger_summary' => 'CSS media queries and transform rules that lock viewport orientation or block landscape/portrait rendering.'
    ],
    [
        'file' => 'contrast.php',
        'name' => 'Color Contrast (Text & UI)',
        'rule' => 'WCAG 1.4.3 / 1.4.11',
        'level' => 'AA',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.4.3 & 1.4.11: Visual presentation of text and images of text has a contrast ratio of at least 4.5:1 (3:1 for large text & UI components).',
        'trigger_summary' => 'Sub-threshold text contrast (< 4.5:1), color used as sole information conveyance, and low-contrast text over busy backgrounds.'
    ],
    [
        'file' => 'zoom_responsive.php',
        'name' => 'Resize Text & Reflow (400% Zoom)',
        'rule' => 'WCAG 1.4.4 / 1.4.10',
        'level' => 'AA',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.4.4 & 1.4.10: Content can be zoomed to 200% without assistive technology and reflowed without two-dimensional scrolling at 400%.',
        'trigger_summary' => 'Fixed-pixel height containers causing text overflow clipping on 200% zoom, and fixed-width tables causing horizontal scrolling.'
    ],
    [
        'file' => 'typography.php',
        'name' => 'Text Spacing & Images of Text',
        'rule' => 'WCAG 1.4.5 / 1.4.12',
        'level' => 'AA',
        'pillar' => 'pillar-perceivable',
        'citation' => 'WCAG 2.2 SC 1.4.5 & 1.4.12: Avoid images of text and support user-adjusted line height (1.5x), letter spacing (0.12em), and word spacing (0.16em).',
        'trigger_summary' => 'Raster graphics containing embedded text, and strict overflow/line-height CSS causing truncation when text spacing is adjusted.'
    ],
    [
        'file' => 'interactive.php',
        'name' => 'Keyboard Accessibility & Hover Content',
        'rule' => 'WCAG 2.1.1 / 1.4.13',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.1.1 & 1.4.13: All functionality is operable through a keyboard interface without requiring specific timings for individual keystrokes.',
        'trigger_summary' => 'Mouse-only click handlers on divs/spans without tabindex or keydown events, and hover tooltips that disappear when mousing over.'
    ],
    [
        'file' => 'keyboard_traps.php',
        'name' => 'Keyboard Traps & Character Shortcuts',
        'rule' => 'WCAG 2.1.2 / 2.1.4',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.1.2: If keyboard focus can be moved to a component, focus can also be moved away using only a keyboard interface.',
        'trigger_summary' => 'Trapped focus in custom dialog widgets and single-key shortcuts that cannot be turned off or remapped.'
    ],
    [
        'file' => 'flashing.php',
        'name' => 'Timing Adjustable, Pause & No Seizure Flashing',
        'rule' => 'WCAG 2.2.1 / 2.3.1',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.3.1: Web pages do not contain anything that flashes more than three times in any one second period.',
        'trigger_summary' => 'High-frequency strobing CSS animations (> 3 Hz) and unpausable auto-updating tickers.'
    ],
    [
        'file' => 'navigation.php',
        'name' => 'Bypass Blocks & Navigation Structure',
        'rule' => 'WCAG 2.4.1',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.4.1 & Usability Heuristics: A mechanism is available to bypass blocks of content that are repeated on multiple Web pages.',
        'trigger_summary' => 'Missing skip-to-content mechanism, non-semantic <div> navigation containers, and excessive flat lists of 20+ unorganized button links.'
    ],
    [
        'file' => 'focus_order.php',
        'name' => 'Focus Order & Visible Focus Indicator',
        'rule' => 'WCAG 2.4.3 / 2.4.7',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.4.3 & 2.4.7: If a Web page can be navigated sequentially, focusable components receive focus in an order that preserves meaning.',
        'trigger_summary' => 'Positive tabindex attributes disrupting natural tab order, and CSS outline:none stripping visible focus rings.'
    ],
    [
        'file' => 'links.php',
        'name' => 'Link Purpose & Ambiguous Text',
        'rule' => 'WCAG 2.4.4 / 2.4.9',
        'level' => 'A',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.4.4 & 2.4.9: The purpose of each link can be determined from the link text alone or from the link text together with programmatic context.',
        'trigger_summary' => 'Repetitive ambiguous link text ("click here", "read more", "download") without contextual labels or aria-label.'
    ],
    [
        'file' => 'target_size.php',
        'name' => 'Target Size (Minimum 24x24px)',
        'rule' => 'WCAG 2.5.8',
        'level' => 'AA',
        'pillar' => 'pillar-operable',
        'citation' => 'WCAG 2.2 SC 2.5.8: The size of the target for pointer inputs is at least 24 by 24 CSS pixels, except where spacing or inline context allows.',
        'trigger_summary' => 'Tiny interactive links and icons (e.g., 12x12px or 16x16px) with insufficient spacing to adjacent targets.'
    ],
    [
        'file' => 'language.php',
        'name' => 'Language of Page & Parts',
        'rule' => 'WCAG 3.1.1 / 3.1.2',
        'level' => 'A',
        'pillar' => 'pillar-understandable',
        'citation' => 'WCAG 2.2 SC 3.1.1 & 3.1.2: The default human language of each Web page and passage can be programmatically determined via the lang attribute.',
        'trigger_summary' => 'Missing or invalid <html> lang attribute, and untagged multi-lingual foreign language phrases.'
    ],
    [
        'file' => 'forms_basic.php',
        'name' => 'Form Labels & Input Purpose',
        'rule' => 'WCAG 1.3.5 / 3.3.2',
        'level' => 'A',
        'pillar' => 'pillar-understandable',
        'citation' => 'WCAG 2.2 SC 3.3.2: Labels or instructions are provided when content requires user input. HTML autocomplete tokens must be present where applicable.',
        'trigger_summary' => 'Form inputs without programmatic label association, placeholder used as sole label, and missing autocomplete attributes.'
    ],
    [
        'file' => 'forms_advanced.php',
        'name' => 'Error Identification & Suggestions',
        'rule' => 'WCAG 3.3.1 / 3.3.3',
        'level' => 'A',
        'pillar' => 'pillar-understandable',
        'citation' => 'WCAG 2.2 SC 3.3.1 & 3.3.3: If an input error is automatically detected, the item is identified and the error is described to the user in text.',
        'trigger_summary' => 'Color-only validation errors, cryptic error codes, and missing aria-invalid/aria-describedby links.'
    ],
    [
        'file' => 'parsing.php',
        'name' => 'HTML Parsing & Duplicate IDs',
        'rule' => 'WCAG 4.1.1',
        'level' => 'A',
        'pillar' => 'pillar-robust',
        'citation' => 'WCAG 2.2 SC 4.1.1: Elements have complete start and end tags, elements are nested according to specification, and IDs are unique.',
        'trigger_summary' => 'Duplicate DOM IDs in form elements, unclosed structural tags, and invalid nesting.'
    ],
    [
        'file' => 'aria_bad.php',
        'name' => 'Name, Role, Value & ARIA Misuse',
        'rule' => 'WCAG 4.1.2',
        'level' => 'A',
        'pillar' => 'pillar-robust',
        'citation' => 'WCAG 2.2 SC 4.1.2: For all user interface components, the name and role can be programmatically determined and states/values can be set.',
        'trigger_summary' => 'Invalid or conflicting ARIA roles (e.g. role="button" on a div without keyboard support), missing required ARIA attributes.'
    ],
    [
        'file' => 'iframes.php',
        'name' => 'Iframe Titles & Embedding',
        'rule' => 'WCAG 4.1.2',
        'level' => 'A',
        'pillar' => 'pillar-robust',
        'citation' => 'WCAG 2.2 SC 4.1.2: Frames and iframes must have accessible title attributes that describe their purpose and content.',
        'trigger_summary' => 'Embedded iframe elements missing title attributes or with generic placeholder titles ("frame", "untitled").'
    ],
    [
        'file' => 'best_practices.php',
        'name' => 'Axe & Engine Best Practices',
        'rule' => 'Best Practice',
        'level' => 'AAA',
        'pillar' => 'pillar-robust',
        'citation' => 'Section 508 & Axe-Core Engine: Recommended industry best practices for accessibility and clean semantic markup.',
        'trigger_summary' => 'Outdated meta tags, target="_blank" missing security attributes, and non-standard layout techniques.'
    ]
];

function getAdjacentA11yTests($currentFile, $testPages) {
    $idx = array_search($currentFile, array_column($testPages, 'file'));
    $prev = null;
    $next = null;
    
    if ($idx !== false) {
        if ($idx > 0) {
            $prev = $testPages[$idx - 1];
        }
        if ($idx < count($testPages) - 1) {
            $next = $testPages[$idx + 1];
        }
    }
    
    return [
        'index' => ($idx !== false) ? $idx + 1 : 1,
        'total' => count($testPages),
        'prev' => $prev,
        'next' => $next
    ];
}