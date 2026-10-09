<?php
$pageTitle = 'Complex Pointer Gestures';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Complex Pointer Gestures</h1>
<p class="lead">This page demonstrates the failure of WCAG 2.5.1 by requiring a complex path-based gesture with no simple point-and-click alternative.</p>

<div class="alert alert-warning">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for users with motor impairments or those using alternative pointers.<br>
        <strong>Observation:</strong> To "Unlock" the submit button, you must draw a specific "S" shape inside the canvas below. There is no simple button or keyboard command to do this.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.5.1 (Pointer Gestures)</li>
        </ul>
    </small>
</div>

<div class="row mt-5">
    <div class="col-md-6 offset-md-3 text-center">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Pattern Unlock Required</h5>
            </div>
            <div class="card-body">
                <p>Draw the gesture below to enable the Submit button.</p>
                <canvas id="unlock-canvas" width="300" height="200" style="border: 2px dashed #ccc; cursor: crosshair;"></canvas>
                
                <div class="mt-4">
                    <button id="submit-btn" class="btn btn-success btn-lg" disabled>Submit Application</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById('unlock-canvas');
    const ctx = canvas.getContext('2d');
    const submitBtn = document.getElementById('submit-btn');
    let drawing = false;
    let points = [];

    canvas.addEventListener('mousedown', () => { drawing = true; points = []; });
    canvas.addEventListener('mouseup', () => { 
        drawing = false; 
        if (points.length > 20) {
            // THE BUG: No simple point-and-click alternative
            // Simulating a "successful" complex gesture check
            submitBtn.disabled = false;
            alert('Gesture recognized! Submit enabled.');
        } else {
            alert('Gesture too simple. Try drawing the full pattern.');
        }
    });
    
    canvas.addEventListener('mousemove', (e) => {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        points.push({x, y});
        
        ctx.fillStyle = '#007bff';
        ctx.fillRect(x, y, 4, 4);
    });
</script>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Multipoint or path-based gestures can be impossible for users who use head-pointers, eye-trackers, or have limited manual dexterity. Functionality must be operable with a "single pointer" (a single tap or click) unless the gesture is essential.</p>
</div>

<?php include '../includes/footer.php'; ?>
