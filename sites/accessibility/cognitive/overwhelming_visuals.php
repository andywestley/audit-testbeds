<?php
$pageTitle = 'Overwhelming Visuals';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Overwhelming Visuals</h1>
<p class="lead">This page demonstrates the failure of WCAG 2.2.2 by using distracting, auto-playing animations and a cluttered layout.</p>

<div class="alert alert-dark">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for people with ADHD, autism, or those who find motion distracting or nauseating.<br>
        <strong>Observation:</strong> Try to read the content and fill out the form while the background and sidebar elements are moving constantly.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.2.2 (Pause, Stop, Hide)</li>
        </ul>
    </small>
</div>

<style>
    /* THE BUG: Cluttered, moving, and distracting elements */
    @keyframes moveBG {
        0% { background-position: 0 0; }
        100% { background-position: 100px 100px; }
    }
    
    .distracting-bg {
        background-image: radial-gradient(circle, #ddd 1px, transparent 1px);
        background-size: 20px 20px;
        animation: moveBG 2s linear infinite;
        padding: 40px;
        border-radius: 10px;
    }

    .moving-sidebar {
        animation: bounce 1.5s ease-in-out infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .flashy-offer {
        background: linear-gradient(90deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);
        animation: colorShift 3s infinite alternate;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    @keyframes colorShift {
        from { filter: hue-rotate(0deg); }
        to { filter: hue-rotate(90deg); }
    }
</style>

<div class="row mt-5 distracting-bg">
    <div class="col-md-8 bg-white p-4 shadow rounded">
        <h3>Primary Objective Form</h3>
        <p>Focus on the task below and ignore everything else.</p>
        
        <div class="mb-3">
            <label for="task-input" class="form-label">Enter the code displayed on the right:</label>
            <input type="text" class="form-control" id="task-input">
        </div>

        <button class="btn btn-primary">Submit Task</button>
    </div>
    
    <div class="col-md-4">
        <div class="moving-sidebar card p-3 bg-light border-primary">
            <h5>LATEST NEWS!</h5>
            <p class="small">This sidebar moves constantly to grab your attention away from the form.</p>
        </div>
        
        <div class="flashy-offer mt-4 rounded">
            LIMITED TIME OFFER!!! 50% OFF EVERYTHING!
        </div>
        
        <div class="mt-3 p-3 bg-dark text-white rounded">
            <h5>SECURITY CODE:</h5>
            <h2 class="text-center">XJ-99-ALPHA</h2>
            <p class="small text-muted mb-0">Wait, was that the code you needed?</p>
        </div>
    </div>
</div>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Users with attention-related conditions can easily lose their place or become overwhelmed by auto-playing movement. Animations that last longer than 5 seconds must have a mechanism for the user to pause, stop, or hide them.</p>
</div>

<?php include '../includes/footer.php'; ?>
