<?php
$pageTitle = 'Text Spacing & Images of Text';
$extraStyles = '<style>
    .tight-spacing-clipped {
        height: 45px;
        overflow: hidden;
        line-height: 1.1;
        letter-spacing: normal;
        border: 1px solid #ef4444;
        padding: 8px;
        background-color: #fef2f2;
    }
</style>';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.4.5 / 1.4.12 (Level AA)',
    'name' => 'Images of Text & Text Spacing Adaptation',
    'level' => 'AA',
    'citation' => 'WCAG 2.2 SC 1.4.5 Images of Text: If the technologies being used can achieve the visual presentation, text is used to convey information rather than images of text. SC 1.4.12 Text Spacing: No loss of content occurs when line height is set to 1.5x, letter spacing to 0.12em, and word spacing to 0.16em.',
    'trigger_summary' => 'Raster bitmap images containing embedded text phrases, and strict overflow containers that clip when text spacing stylesheets are applied.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Typography &amp; Spacing Violations (WCAG 1.4.5 / 1.4.12)</h5>
        <p class="small mb-0 text-secondary">
            Users with dyslexia or low vision often apply user stylesheets to expand letter and line spacing. Fixed containers with <code>overflow:hidden</code> truncate when text expands.
        </p>
    </div>
</div>

<!-- Test 1: Image of Text -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Images of Text (WCAG 1.4.5 Level AA)</h2>
            <small class="text-muted">Raster graphics with embedded text instead of selectable HTML text</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Image of Text
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Users cannot resize, customize fonts, or translate the embedded text:
        </p>
        <div class="test-sandbox-zone">
            <img src="https://placehold.co/360x70/1e293b/ffffff?text=SPECIAL+DISCOUNT+OFFER" alt="Special discount offer banner" class="img-fluid rounded border mb-2" />
            <small class="text-muted d-block">Text is baked into the raster pixels rather than styled HTML.</small>
        </div>
    </div>
</div>

<!-- Test 2: Text Spacing Override Breakage -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Content Truncation on Text Spacing Override (WCAG 1.4.12)</h2>
            <small class="text-muted">Container breaks when user applies line-height: 1.5x and word-spacing: 0.16em</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Spacing Failure
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <div class="tight-spacing-clipped">
                Adjusting text spacing or increasing letter spacing clips these critical details instantly.
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>