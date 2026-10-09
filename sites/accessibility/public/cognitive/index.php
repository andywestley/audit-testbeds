<?php
$pageTitle = 'Cognitive Accessibility';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Cognitive & Neurodivergent Accessibility</h1>
<p class="lead">Demonstrations of barriers encountered by people with cognitive, learning, and neurological disabilities, including targeted tests for automated accessibility checkers.</p>

<h2 class="mt-5">Time & Memory</h2>
<p>Test cases for managing session limits and reducing the mental effort required to recall information.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Timeouts without Warning</h5>
                <p class="card-text">Sudden session expiration that doesn't allow users to extend their time.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Watch for the sudden redirection or logout without notice.<br>
                    <strong>Key Issue:</strong> WCAG 2.2.1 (Timing Adjustable)
                </small>
                <a href="timeout_no_warning.php" class="btn btn-secondary mt-3">Test Timeout</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Memory Burden Wizard</h5>
                <p class="card-text">Forms that require remembering data from previous steps without a summary.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Complete Step 3. Do you remember your reference code from Step 1?<br>
                    <strong>Key Issue:</strong> COGA Best Practice (Reduce Memory Load)
                </small>
                <a href="memory_burden.php" class="btn btn-secondary mt-3">Test Memory Load</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Blocked Copy-Paste</h5>
                <p class="card-text">Text inputs that disable paste handlers, forcing users to type manually.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Try pasting an email address or password into the confirm field.<br>
                    <strong>Key Issue:</strong> Cognitive/Physical strain, memory issues
                </small>
                <a href="blocked_paste.php" class="btn btn-secondary mt-3">Test Blocked Paste</a>
            </div>
        </div>
    </div>
</div>

<h2 class="mt-5">Attention & Focus</h2>
<p>Issues where sensory overload or distracting elements disrupt the user's ability to focus on primary tasks.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Overwhelming Visuals</h5>
                <p class="card-text">Cluttered layouts and auto-playing animations that distract from tasks.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Try to fill out the form while the background is moving.<br>
                    <strong>Key Issue:</strong> WCAG 2.2.2 (Pause, Stop, Hide)
                </small>
                <a href="overwhelming_visuals.php" class="btn btn-secondary mt-3">Test Focus Control</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Rapid Flashing Content</h5>
                <p class="card-text">Elements designed to flash at a rate greater than 3Hz, risking seizures.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Fast flashing banner causes visual strain and epilepsy risk.<br>
                    <strong>Key Issue:</strong> WCAG 2.3.1 (Three Flashes or Below Threshold)
                </small>
                <a href="rapid_flashing.php" class="btn btn-secondary mt-3">Test Rapid Flashing</a>
            </div>
        </div>
    </div>
</div>

<h2 class="mt-5">Clear Communication & Readability</h2>
<p>Barriers related to the complexity of language, unexpanded acronyms, typography, and layout formatting.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Complex Language & Jargon</h5>
                <p class="card-text">Content that uses unnecessarily advanced vocabulary and acronyms.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Try to understand the instructions without a dictionary.<br>
                    <strong>Key Issue:</strong> WCAG 3.1.5 (Reading Level)
                </small>
                <a href="complex_jargon.php" class="btn btn-secondary mt-3">Test Readability</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Cryptic Error Messages</h5>
                <p class="card-text">Technical jargon or vague error codes instead of helpful instructions.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Submit the form and try to fix the error based on the feedback.<br>
                    <strong>Key Issue:</strong> WCAG 3.3.3 (Error Suggestion)
                </small>
                <a href="cryptic_errors.php" class="btn btn-secondary mt-3">Test Error Clarity</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">The Academic Wall of Text</h5>
                <p class="card-text">Extremely dense, high reading-level text with excessive jargon and passive voice.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Readability scores will skyrocket on this post-graduate content.<br>
                    <strong>Key Issue:</strong> WCAG 3.1.5 (Reading Level) & 3.1.3 (Unusual Words)
                </small>
                <a href="academic_wall_of_text.php" class="btn btn-secondary mt-3">Test Reading Level</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">The Corporate Salad</h5>
                <p class="card-text">Business memo overloaded with complex synonyms and unexpanded acronyms.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Scan the page for definitions of the excessive acronyms; you won't find them.<br>
                    <strong>Key Issue:</strong> WCAG 3.1.4 (Abbreviations) & COGA Clear Language
                </small>
                <a href="corporate_salad.php" class="btn btn-secondary mt-3">Test Abbreviations</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">The Untagged Translation</h5>
                <p class="card-text">Content that switches languages abruptly without proper lang attribute markings.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Screen readers will try to read Spanish/French text using an English dictionary.<br>
                    <strong>Key Issue:</strong> WCAG 3.1.2 (Language of Parts)
                </small>
                <a href="untagged_translation.php" class="btn btn-secondary mt-3">Test Language Mapping</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Justified Text Alignment</h5>
                <p class="card-text">Text alignment set to justified, creating uneven spacing or "rivers of white".</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Scan the text blocks for varying and uneven gaps between words.<br>
                    <strong>Key Issue:</strong> Dyslexic readability barriers
                </small>
                <a href="justified_text.php" class="btn btn-secondary mt-3">Test Justified Text</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Absolute Font Size</h5>
                <p class="card-text">Font size defined in absolute units like pixels (px) inline on text blocks.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Verify text size cannot scale relative to user base-font settings.<br>
                    <strong>Key Issue:</strong> WCAG 1.4.4 (Resize Text)
                </small>
                <a href="absolute_font_size.php" class="btn btn-secondary mt-3">Test Absolute Font</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Wall of Text</h5>
                <p class="card-text">A paragraph of over 150 words with no visual breaks, paragraphs, or lists.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Read a very long paragraph without breaks; note reading comprehension fatigue.<br>
                    <strong>Key Issue:</strong> Cognitive overload, reading disabilities
                </small>
                <a href="wall_of_text.php" class="btn btn-secondary mt-3">Test Wall of Text</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Complex Wording</h5>
                <p class="card-text">Sentences averaging more than 30 words, creating comprehension difficulty.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Read run-on sentences that lack proper punctuation breaks.<br>
                    <strong>Key Issue:</strong> Cognitive comprehension load
                </small>
                <a href="complex_wording.php" class="btn btn-secondary mt-3">Test Complex Wording</a>
            </div>
        </div>
    </div>
</div>

<h2 class="mt-5">Consistency & Predictability</h2>
<p>Issues occurring when user interface elements or interactive patterns behave in an irregular way.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Inconsistent Navigation</h5>
                <p class="card-text">Navigation elements that change position or style across pages.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Notice how the "Submit" and "Back" buttons move around.<br>
                    <strong>Key Issue:</strong> WCAG 3.2.3 (Consistent Navigation)
                </small>
                <a href="inconsistent_nav.php" class="btn btn-secondary mt-3">Test Predictability</a>
            </div>
        </div>
    </div>
</div>

<h2 class="mt-5">Viewport & Interactive Targets</h2>
<p>Checks related to responsive zooming capabilities and the minimum size of interactive elements.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Viewport Zoom Restriction</h5>
                <p class="card-text">Viewport meta tag configuration that locks scale level and disables zoom features.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Try pinch-zooming the page on a mobile device or screen emulator.<br>
                    <strong>Key Issue:</strong> WCAG 1.4.4 (Resize Text)
                </small>
                <a href="viewport_zoom.php" class="btn btn-secondary mt-3">Test Zoom Lock</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Small Click Targets</h5>
                <p class="card-text">Interactive targets (buttons, links) designed with dimensions under 24x24px.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Try clicking the tiny target; note the lack of hit target area.<br>
                    <strong>Key Issue:</strong> WCAG 2.5.8 (Target Size - Minimum)
                </small>
                <a href="small_click_targets.php" class="btn btn-secondary mt-3">Test Target Size</a>
            </div>
        </div>
    </div>
</div>

<h2 class="mt-5">Sensory & Colour Perception</h2>
<p>Demonstrations of visual accessibility issues, particularly how relying on colour alone presents obstacles for colour-blind users.</p>

<div class="row mt-4">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Colour-Blindness Barriers</h5>
                <p class="card-text">Interfaces that use colour as the only means of conveying information, states, or actions.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Observation:</strong> Use the interactive simulator to view indicators, validation, links, and charts under different colour-vision deficiencies.<br>
                    <strong>Key Issue:</strong> WCAG 1.4.1 (Use of Color)
                </small>
                <a href="colour_blindness.php" class="btn btn-secondary mt-3">Test Colour-Blindness</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
