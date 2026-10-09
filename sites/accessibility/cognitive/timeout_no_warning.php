<?php
$pageTitle = 'Timeout without Warning';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Timeout without Warning</h1>
<p class="lead">This page demonstrates the failure of WCAG 2.2.1 by expiring a session abruptly without allowing the user to extend it.</p>

<div class="alert alert-danger">
    <small class="d-block">
        <strong>Demonstrates:</strong> High-impact barriers for users who need more time to process information or enter data.<br>
        <strong>Observation:</strong> Start filling out the form. A 15-second timer is running in the background. You will be "logged out" suddenly.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.2.1 (Timing Adjustable)</li>
        </ul>
    </small>
</div>

<div id="application-form" class="card mt-5">
    <div class="card-body">
        <h3>Grant Application Form</h3>
        <p class="text-muted">Please provide detailed justifications for your funding request.</p>
        
        <div class="mb-3">
            <label for="project-name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="project-name">
        </div>

        <div class="mb-3">
            <label for="justification" class="form-label">Detailed Justification</label>
            <textarea class="form-control" id="justification" rows="10" placeholder="Start typing your long explanation here..."></textarea>
        </div>

        <button class="btn btn-primary" onclick="alert('Submitted!')">Submit Application</button>
    </div>
</div>

<div id="timeout-overlay" class="text-center mt-5 d-none">
    <div class="alert alert-dark p-5">
        <h2>Session Expired</h2>
        <p>For your security, you have been logged out due to inactivity. All unsaved data has been lost.</p>
        <button class="btn btn-primary" onclick="location.reload()">Return to Login</button>
    </div>
</div>

<script>
    // THE BUG: No warning, no 'extend' option.
    setTimeout(() => {
        document.getElementById('application-form').classList.add('d-none');
        document.getElementById('timeout-overlay').classList.remove('d-none');
    }, 15000); // 15 seconds for demonstration purposes
</script>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Many users, including those with cognitive disabilities, may take longer to read, understand, or type. Systems must warn users before a timeout occurs and provide at least 20 seconds to extend the time with a simple action (like pressing a key).</p>
</div>

<?php include '../includes/footer.php'; ?>
