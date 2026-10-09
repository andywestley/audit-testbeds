<?php
$pageTitle = 'Motion Actuation Failure';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Motion Actuation Failure</h1>
<p class="lead">This page demonstrates the failure of WCAG 2.5.4 by requiring device motion for a function with no button alternative.</p>

<div class="alert alert-danger">
    <small class="d-block">
        <strong>Demonstrates:</strong> Exclusion of users with limited mobility or mounted devices.<br>
        <strong>Observation:</strong> The "Reset Form" functionality is linked to the device's accelerometer. Unless you "shake" your device (simulated here with a button for testing, but imagine it missing), there is no way to clear the form.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.5.4 (Motion Actuation)</li>
        </ul>
    </small>
</div>

<div class="card mt-5">
    <div class="card-body text-center">
        <h3>Secure Data Entry</h3>
        <p class="text-muted">Enter sensitive information below.</p>
        
        <div class="mb-3 text-start">
            <textarea class="form-control" id="sensitive-data" rows="5" placeholder="Type something private..."></textarea>
        </div>

        <div class="p-4 border border-dashed rounded bg-light mb-3">
            <p class="mb-0"><strong>Pro-Tip:</strong> Just <em>shake</em> your device to clear all data instantly!</p>
        </div>

        <!-- THE BUG: In a real scenario, this button wouldn't exist, only the motion event -->
        <div id="simulated-shake" class="d-none">
            <button class="btn btn-outline-danger" onclick="clearData()">Simulate Shake</button>
        </div>
        
        <script>
            // Show simulation button for desktop testing
            if (!('DeviceMotionEvent' in window)) {
                document.getElementById('simulated-shake').classList.remove('d-none');
            }

            function clearData() {
                document.getElementById('sensitive-data').value = '';
                alert('Form cleared via motion!');
            }

            // Real implementation would look like this
            window.addEventListener('devicemotion', (event) => {
                const acceleration = event.accelerationIncludingGravity;
                if (Math.abs(acceleration.x) > 15 || Math.abs(acceleration.y) > 15) {
                    clearData();
                }
            });
        </script>
    </div>
</div>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Users who have their devices mounted (e.g., on a wheelchair) or who have tremors or limited range of motion cannot perform "shake" or "tilt" gestures. All such functions must have a conventional user interface alternative (like a button).</p>
</div>

<?php include '../includes/footer.php'; ?>
