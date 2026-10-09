<?php
$pageTitle = 'Non-Text Content & Images';
include 'includes/header.php';

$currentCriterion = [
    'rule' => 'WCAG 1.1.1 (Level A)',
    'name' => 'Non-Text Content & Image Alternatives',
    'level' => 'A',
    'citation' => 'WCAG 2.2 SC 1.1.1 Non-text Content: All non-text content that is presented to the user has a text alternative that serves the equivalent purpose.',
    'trigger_summary' => 'Missing alt attributes, raw filenames used as alt text, redundant descriptions ("image of..."), decorative images with unnecessary alt text, and complex charts lacking long descriptions.'
];
include 'includes/diagnostic_header.php';
?>

<!-- Diagnostic Description -->
<div class="alert alert-info d-flex align-items-start gap-3 shadow-sm mb-4">
    <i class="bi bi-info-circle-fill fs-4 text-info flex-shrink-0 mt-1"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Intentional Image Accessibility Violations (WCAG 1.1.1)</h5>
        <p class="small mb-0 text-secondary">
            This test page demonstrates common non-text alternative failures: missing <code>alt</code> attributes, file extensions in descriptions, redundant phrases, and unlabeled image map hot-spots.
        </p>
    </div>
</div>

<!-- Test 1: Missing Alt Text Entirely -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">1. Images Missing alt Attribute Entirely</h2>
            <small class="text-muted"><code>&lt;img&gt;</code> tags without any <code>alt</code> attribute defined</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Missing Alt Violation
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Screen readers will attempt to announce the full raw image URL or file path:
        </p>
        <div class="test-sandbox-zone d-flex flex-wrap gap-3">
            <!-- Missing alt attribute entirely -->
            <img src="https://placehold.co/180x120/e2e8f0/475569?text=No+Alt+1" class="img-thumbnail" />
            <img src="https://placehold.co/180x120/e2e8f0/475569?text=No+Alt+2" class="img-thumbnail" />
            <img src="https://placehold.co/180x120/e2e8f0/475569?text=No+Alt+3" class="img-thumbnail" />
            <img src="https://placehold.co/180x120/e2e8f0/475569?text=No+Alt+4" class="img-thumbnail" />
            <img src="https://placehold.co/180x120/e2e8f0/475569?text=No+Alt+5" class="img-thumbnail" />
        </div>
    </div>
</div>

<!-- Test 2: Ineffective / Generic Alt Text -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">2. Filenames &amp; Generic Placeholders as Alt Text</h2>
            <small class="text-muted">Alt text using raw file extensions or generic terms ("photo.jpg", "graphic", "picture")</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Bad Alt Violation
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Alt text fails to describe the purpose or content of the image:
        </p>
        <div class="test-sandbox-zone d-flex flex-wrap gap-3">
            <div class="text-center">
                <img src="https://placehold.co/180x120/jpg" alt="photo.jpg" class="img-thumbnail d-block mb-1" />
                <code class="small text-muted">alt="photo.jpg"</code>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/180x120/png" alt="image.png" class="img-thumbnail d-block mb-1" />
                <code class="small text-muted">alt="image.png"</code>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/180x120" alt="picture" class="img-thumbnail d-block mb-1" />
                <code class="small text-muted">alt="picture"</code>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/180x120" alt="graphic" class="img-thumbnail d-block mb-1" />
                <code class="small text-muted">alt="graphic"</code>
            </div>
            <div class="text-center">
                <img src="https://placehold.co/180x120" alt="bullet point" class="img-thumbnail d-block mb-1" />
                <code class="small text-muted">alt="bullet point"</code>
            </div>
        </div>
    </div>
</div>

<!-- Test 3: Redundant "Image of" Phrasing -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">3. Redundant "Image of" / "Graphic of" Text</h2>
            <small class="text-muted">Screen readers already announce "image", making these words redundant</small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Redundant Phrasing
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Screen readers announce: <em>"Graphic, Image of a placeholder"</em>:
        </p>
        <div class="test-sandbox-zone">
            <!-- "image of" redundancy -->
            <img src="https://placehold.co/240x120" alt="Image of a placeholder" class="img-thumbnail d-block mb-2" />
            <code class="small text-muted">alt="Image of a placeholder"</code>
        </div>
    </div>
</div>

<!-- Test 4: Decorative Image with Unnecessary Alt -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">4. Decorative Image with Unnecessary Alt Text</h2>
            <small class="text-muted">Decorative spacers/icons should use empty <code>alt=""</code></small>
        </div>
        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> Decorative Alt Misuse
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Purely decorative spacer image given an announced description:
        </p>
        <div class="test-sandbox-zone">
            <!-- Decorative image should have empty alt, but has description -->
            <img src="https://placehold.co/40x40/transparent" alt="Spacer" class="border p-1 bg-light d-block mb-2" />
            <code class="small text-muted">alt="Spacer"</code>
        </div>
    </div>
</div>

<!-- Test 5: Complex Chart without Long Description -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">5. Complex Data Chart Missing Long Description</h2>
            <small class="text-muted">Brief alt text is insufficient for charts; requires textual data breakdown</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Incomplete Alt Description
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            A complex multi-series bar chart lacking a data table or extended textual summary:
        </p>
        <div class="test-sandbox-zone">
            <!-- Chart placeholder without long description -->
            <img src="https://placehold.co/400x200?text=Complex+Quarterly+Growth+Chart" alt="Bar chart showing Q1 growth" class="img-fluid rounded border mb-2" />
            <p class="small text-muted mb-0">The chart above shows data without providing programmatic access to the underlying metrics.</p>
        </div>
    </div>
</div>

<!-- Test 6: Image Map Area Missing Alt -->
<div class="test-section-card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h2 class="h5 mb-0 fw-bold text-dark">6. Image Map Hotspot Missing Alt Attribute</h2>
            <small class="text-muted"><code>&lt;area&gt;</code> elements inside client-side image maps must have individual <code>alt</code> labels</small>
        </div>
        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
            <i class="bi bi-exclamation-octagon-fill me-1"></i> Area Missing Alt
        </span>
    </div>
    <div class="card-body">
        <p class="small text-muted mb-3">
            Interactive map hotspots without text equivalents cannot be navigated by keyboard or assistive tech:
        </p>
        <div class="test-sandbox-zone">
            <img src="https://placehold.co/320x100?text=Interactive+Image+Map" usemap="#examplemap" alt="Interactive Map" class="img-fluid rounded border mb-2" />
            <map name="examplemap">
                <!-- Missing alt on area tag -->
                <area shape="rect" coords="0,0,160,100" href="#region1" />
                <area shape="rect" coords="161,0,320,100" href="#region2" />
            </map>
            <div class="small text-muted">Image map contains 2 clickable <code>&lt;area&gt;</code> tags without <code>alt</code> attributes.</div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>