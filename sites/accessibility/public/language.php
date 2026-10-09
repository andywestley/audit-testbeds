<?php
$pageTitle = 'Language of Page & Parts';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 3.1.1 / 3.1.2 (Level A/AA)',
    'name' => 'Language of Page & Language of Parts',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 3.1.1 Language of Page: The default human language of each Web page can be programmatically determined. SC 3.1.2 Language of Parts: The human language of each passage or phrase in the content can be programmatically determined.',
    'trigger_summary' => 'Untagged foreign language quotes, incorrect lang subcodes, and untranslated passages without lang attribute switching.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Language Declaration Violations (WCAG 3.1.x)</h5>
        <p class="small mb-0 text-secondary">
            Screen reader synthesizers switch pronunciation engines based on <code>lang</code> tags. When foreign phrases are untagged, screen readers pronounce words with incorrect phonetics.
        </p>
    </div>
</div>

<!-- Test 1: Untagged Foreign Language Quotation -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Untagged Foreign Language Passage (WCAG 3.1.2 Level AA)</h2>
            <small class="text-muted">French phrase rendered without <code>lang="fr"</code></small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> WCAG 3.1.2 Failure
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            An English screen reader will pronounce this French quote using English phonemes:
        </p>
        <div class="test-sandbox-zone">
            <p class="mb-0">
                As the famous philosopher once remarked, <em>"C'est la vie et rien d'autre"</em>, we must accept the inevitable realities.
            </p>
            <small class="text-danger d-block mt-2">Missing <code>&lt;span lang="fr"&gt;</code> wrapper around foreign phrase.</small>
        </div>
    </div>
</div>

<!-- Test 2: Invalid Language Subtag -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Invalid / Non-Standard Language Subtags</h2>
            <small class="text-muted">Using fake language codes like <code>lang="xyz"</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Invalid Lang Tag
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <p lang="xyz" class="mb-0">
                This paragraph specifies an invalid BCP 47 language code: <code>lang="xyz"</code>.
            </p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>