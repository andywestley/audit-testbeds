<?php
$pageTitle = 'Cryptic Error Messages';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Cryptic Error Messages</h1>
<p class="lead">This page demonstrates the failure of WCAG 3.3.3 by providing non-descriptive or technical error messages.</p>

<div class="alert alert-danger">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for users with cognitive impairments or those who are less technically inclined.<br>
        <strong>Observation:</strong> Try to submit the form without filling it out properly. Can you understand what went wrong from the error message?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 3.3.3 (Error Suggestion)</li>
        </ul>
    </small>
</div>

<div class="card mt-5">
    <div class="card-body">
        <h3>Secure File Upload</h3>
        <p class="text-muted">Enter metadata and select a file to upload.</p>
        
        <div class="mb-3">
            <label for="uid" class="form-label">User Identifier</label>
            <input type="text" class="form-control" id="uid" value="USER_882">
        </div>

        <div class="mb-3">
            <label for="filename-input" class="form-label">Filename</label>
            <input type="text" class="form-control" id="filename-input" placeholder="my_report.pdf">
        </div>

        <div id="error-container" class="alert alert-danger d-none mb-4">
            <h5 class="alert-heading">Critical System Exception</h5>
            <p id="error-message" class="mb-0"></p>
        </div>

        <button class="btn btn-primary" onclick="triggerError()">Initialize Upload</button>
    </div>
</div>

<script>
    function triggerError() {
        const container = document.getElementById('error-container');
        const message = document.getElementById('error-message');
        
        // THE BUG: Technical/Cryptic error message instead of useful suggestion
        const errors = [
            'Error Code: 0x80040E14 - Invalid parameter in binary stream.',
            'Integrity check failure: checksum mismatch in metadata packet.',
            'Suboptimal throughput detected in buffer allocation.',
            'Exception in thread "main" java.lang.NullPointerException: Null object reference.'
        ];
        
        message.innerText = errors[Math.floor(Math.random() * errors.length)];
        container.classList.remove('d-none');
        window.scrollTo(0, 0);
    }
</script>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Errors should be explained in plain language, and more importantly, they should provide an explicit suggestion on how the user can fix the problem (e.g., "The filename must not contain spaces"). technical codes should be hidden or relegated to "details" sections.</p>
</div>

<?php include '../includes/footer.php'; ?>
