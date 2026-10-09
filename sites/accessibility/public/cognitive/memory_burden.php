<?php
$pageTitle = 'Memory Burden Wizard';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Memory Burden Wizard</h1>
<p class="lead">This page demonstrates a flow that puts an unnecessary burden on the user's short-term memory.</p>

<div class="alert alert-warning">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for users with memory impairments, brain injuries, or those who are easily distracted.<br>
        <strong>Observation:</strong> Complete the 3 steps. Notice that Step 3 requires information from Step 1, but Step 1 is no longer visible.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>COGA Best Practice (Reduce Memory Load)</li>
        </ul>
    </small>
</div>

<div class="card mt-5" id="mem-step-1">
    <div class="card-body">
        <h3>Step 1: Reference Setup</h3>
        <div class="alert alert-info">
            <strong>IMPORTANT:</strong> Your temporary Reference ID is <strong>"BLUE-WHALE-74"</strong>. You will need this at the end.
        </div>
        <p>Enter your department name:</p>
        <input type="text" class="form-control mb-4" placeholder="Department">
        
        <button class="btn btn-primary" onclick="showStep(2)">Next Step</button>
    </div>
</div>

<div class="card mt-5 d-none" id="mem-step-2">
    <div class="card-body">
        <h3>Step 2: Service Details</h3>
        <p>Wait... what was that code again? Never mind, just select your service level:</p>
        <select class="form-select mb-4">
            <option>Standard</option>
            <option>Premium</option>
        </select>
        
        <button class="btn btn-primary" onclick="showStep(3)">Final Step</button>
    </div>
</div>

<div class="card mt-5 d-none" id="mem-step-3">
    <div class="card-body">
        <h3>Step 3: Verification</h3>
        <p>To finish, please enter the Reference ID we gave you in Step 1:</p>
        
        <div class="mb-4">
            <input type="text" class="form-control" placeholder="Enter Reference ID">
        </div>
        
        <button class="btn btn-success" onclick="alert('Submission complete!')">Complete Registration</button>
    </div>
</div>

<script>
    function showStep(step) {
        document.querySelectorAll('.card').forEach(c => c.classList.add('d-none'));
        document.getElementById(`mem-step-${step}`).classList.remove('d-none');
    }
</script>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Websites should not rely on a user's ability to remember specific pieces of information from one page to the next. Provide summaries of previous choices, auto-fill recurring data, or allow the user to easily refer back to previous steps without losing their current place.</p>
</div>

<?php include '../includes/footer.php'; ?>
