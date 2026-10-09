<?php
$pageTitle = 'User Journeys';
$basePath = '../';
include '../includes/header.php';
?>

<h1>User Journeys</h1>
<p class="lead">Select a journey below to simulate common user flows. These flows contain intentional accessibility errors for testing purposes.</p>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Login Flow</h5>
                <p class="card-text">A standard email and password login form followed by a success page.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Demonstrates:</strong> High-impact barriers to entry.<br>
                    <strong>Observation:</strong> Try to identify fields without using visual labels. Check tab order.<br>
                    <strong>Key Issues:</strong>
                    <ul class="ps-3 mb-0">
                        <li>WCAG 1.4.3 (Contrast)</li>
                        <li>WCAG 3.3.2 (Labels)</li>
                        <li>WCAG 1.3.5 (Autocomplete)</li>
                    </ul>
                </small>
                <a href="login.php" class="btn btn-primary mt-3">Start Login Flow</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Multi-step Survey</h5>
                <p class="card-text">A multi-page data collection wizard with complex inputs.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Demonstrates:</strong> Cumulative frustration in long flows.<br>
                    <strong>Observation:</strong> Attempt to navigate using only keyboard. Note progress bar announcements.<br>
                    <strong>Key Issues:</strong>
                    <ul class="ps-3 mb-0">
                        <li>WCAG 2.1.2 (Keyboard Trap)</li>
                        <li>WCAG 4.1.2 (Name, Role, Value)</li>
                        <li>WCAG 2.4.6 (Headings/Labels)</li>
                    </ul>
                </small>
                <a href="survey_step1.php" class="btn btn-primary mt-3">Start Survey Flow</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Blocked Registration</h5>
                <p class="card-text">A form with inaccessible Javascript validation.</p>
                <hr>
                <small class="text-muted d-block mb-2">
                    <strong>Demonstrates:</strong> Error handling failures.<br>
                    <strong>Observation:</strong> Submit empty form. Note if focus moves to errors or if errors are read out.<br>
                    <strong>Key Issues:</strong>
                    <ul class="ps-3 mb-0">
                        <li>WCAG 3.3.1 (Error Identification)</li>
                        <li>WCAG 3.3.3 (Error Suggestion)</li>
                        <li>WCAG 4.1.3 (Status Messages)</li>
                    </ul>
                </small>
                <a href="blocked_form.php" class="btn btn-danger mt-3">Start Blocked Flow</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
