<?php
$pageTitle = 'Survey Step 1 (User Journey)';
$basePath = '../';
include '../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Detailed Survey - Step 1</h1>
        <p>Tell us about yourself.</p>

        <div class="alert alert-info">
            <small class="d-block">
                <strong>Demonstrates:</strong> Cumulative frustration in long flows.<br>
                <strong>Observation:</strong> Attempt to navigate using only keyboard. Note progress bar announcements.<br>
                <strong>Key Issues:</strong>
                <ul class="ps-3 mb-0">
                    <li>WCAG 2.1.2 (Keyboard Trap)</li>
                    <li>WCAG 4.1.2 (Name, Role, Value)</li>
                    <li>WCAG 2.4.6 (Headings/Labels)</li>
                </ul>
            </small>
        </div>
        
        <form> <!-- Missing action, will handle with JS/div button for max issues -->
            
            <!-- Issue: No labels, only placeholders -->
            <div class="mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>

            <div class="mb-3">
                <input type="number" class="form-control" name="age" placeholder="Age">
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="bio" rows="3" placeholder="Short Bio"></textarea>
            </div>
            
            <!-- Issue: Fake button, accessible only via mouse (no tabindex, no role) -->
            <div class="btn btn-primary" onclick="window.location.href='survey_step2.php'">Next Step</div>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
