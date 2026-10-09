<?php
$pageTitle = 'Time-based Media & Audio/Video';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.2.1 / 1.2.2 / 1.2.3 / 1.2.5 (Level A/AA)',
    'name' => 'Time-based Media (Audio & Video Alternatives)',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 1.2.1-1.2.5: Prerecorded audio-only and video-only media must have text transcripts; prerecorded synchronized video must provide synchronized captions and audio descriptions.',
    'trigger_summary' => 'Video elements lacking <track kind="captions">, audio files without text transcripts, un-pausable auto-playing media, and missing audio descriptions.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Media Accessibility Violations (WCAG 1.2.x)</h5>
        <p class="small mb-0 text-secondary">
            This test page isolates time-based media failures: HTML5 video lacking closed captions (WebVTT), audio clips without text transcripts, and media elements with missing fallback content.
        </p>
    </div>
</div>

<!-- Test 1: Video Missing Captions Track -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Video Element Missing Captions Track (WCAG 1.2.2 Level A)</h2>
            <small class="text-muted"><code>&lt;video&gt;</code> without <code>&lt;track kind="captions"&gt;</code></small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Missing Captions
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Deaf or hard-of-hearing users cannot access spoken dialogue in the video:
        </p>
        <div class="test-sandbox-zone">
            <!-- Missing track element for captions -->
            <video controls width="360" class="rounded border shadow-sm">
                <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
    </div>
</div>

<!-- Test 2: Audio Element Missing Text Transcript -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Audio Recording Missing Text Transcript (WCAG 1.2.1 Level A)</h2>
            <small class="text-muted">Audio-only content presented without adjacent text equivalent or transcript link</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Missing Transcript
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Audio playback without text transcript:
        </p>
        <div class="test-sandbox-zone">
            <audio controls class="w-100 mb-2" style="max-width: 400px;">
                <source src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3" type="audio/mpeg">
                Your browser does not support audio element.
            </audio>
            <small class="text-muted d-block">No transcript is provided for this audio stream.</small>
        </div>
    </div>
</div>

<!-- Test 3: Video Missing Audio Description (AA) -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Synchronized Video Missing Audio Description (WCAG 1.2.5 Level AA)</h2>
            <small class="text-muted">Visual actions occurring without accompanying descriptive audio narrative</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Audio Description Missing
        </span>
    </div>
    <div class="card-body">
        <div class="test-sandbox-zone">
            <video controls width="360" class="rounded border shadow-sm">
                <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>