<?php
$pageTitle = 'Inconsistent Navigation';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Inconsistent Navigation</h1>
<p class="lead">This page demonstrates the failure of WCAG 3.2.3 by changing the relative order and style of navigation/action elements.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Confusion for users who rely on muscle memory and predictable patterns.<br>
        <strong>Observation:</strong> Follow the "Next" buttons through the three steps. Do the buttons stay in the same place?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 3.2.3 (Consistent Navigation)</li>
            <li>WCAG 3.2.4 (Consistent Identification)</li>
        </ul>
    </small>
</div>

<div class="card mt-5" id="wizard-step-1">
    <div class="card-body">
        <h3>Step 1: Account Type</h3>
        <p>Please select your account type.</p>
        <select class="form-select mb-4">
            <option>Personal</option>
            <option>Professional</option>
            <option>Enterprise</option>
        </select>
        
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" onclick="showStep(2)">Next Step</button>
        </div>
    </div>
</div>

<div class="card mt-5 d-none" id="wizard-step-2">
    <div class="card-body">
        <h3>Step 2: Preferences</h3>
        <p>Choose your notification settings.</p>
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="email-notif">
            <label class="form-check-label" for="email-notif">Email Notifications</label>
        </div>
        
        <!-- THE BUG: Swapped order and changed alignment -->
        <div class="d-flex justify-content-start gap-2">
            <button class="btn btn-primary" onclick="showStep(3)">Continue</button>
            <button class="btn btn-outline-secondary" onclick="showStep(1)">Go Back</button>
        </div>
    </div>
</div>

<div class="card mt-5 d-none" id="wizard-step-3">
    <div class="card-body">
        <h3>Step 3: Review</h3>
        <p>Confirm your settings.</p>
        
        <!-- THE BUG: Completely different style and position -->
        <div class="text-center mt-5">
            <button class="btn btn-success btn-lg px-5" onclick="alert('Done!')">FINISH</button>
            <div class="mt-2">
                <a href="#" onclick="showStep(2)">change previous settings</a>
            </div>
        </div>
    </div>
</div>

<script>
    function showStep(step) {
        document.querySelectorAll('.card').forEach(c => c.classList.add('d-none'));
        document.getElementById(`wizard-step-${step}`).classList.remove('d-none');
    }
</script>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Consistency is key for users with cognitive disabilities. Navigation and repeatable actions (like "Next", "Back", or "Submit") should appear in the same relative order and style throughout a process to minimize the mental effort required to navigate the site.</p>
</div>

<?php include '../includes/footer.php'; ?>
