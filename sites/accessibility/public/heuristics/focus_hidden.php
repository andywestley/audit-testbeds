<?php
$pageTitle = 'Invisible Focus Indicator';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Invisible Focus Indicator</h1>
<p class="lead">This page demonstrates the failure of WCAG 2.4.7 by hiding focus indicators on interactive elements.</p>

<div class="alert alert-danger">
    <small class="d-block">
        <strong>Demonstrates:</strong> High-impact navigation barriers for keyboard users.<br>
        <strong>Observation:</strong> Try tabbing through the buttons below. Can you tell which one is currently selected?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.4.7 (Focus Visible)</li>
        </ul>
    </small>
</div>

<style>
    /* THE BUG: Removing focus outlines without alternative visibility */
    .btn:focus, a:focus, input:focus, select:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>

<div class="card mt-5">
    <div class="card-body">
        <h3>User Settings Panel</h3>
        <p>Try to navigate this form using only your Tab key.</p>
        
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username">
        </div>
        
        <div class="mb-3">
            <label for="prefs" class="form-label">Privacy Level</label>
            <select class="form-select" id="prefs">
                <option>Public</option>
                <option>Private</option>
                <option>Hidden</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Save Changes</button>
            <button class="btn btn-secondary">Cancel</button>
            <a href="#" class="btn btn-link">Need Help?</a>
        </div>
    </div>
</div>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Sighted keyboard users rely on the focus indicator to know which element they are interacting with. Removing it is equivalent to hiding the mouse cursor for mouse users.</p>
</div>

<?php include '../includes/footer.php'; ?>
