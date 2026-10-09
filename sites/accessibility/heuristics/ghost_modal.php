<?php
$pageTitle = 'The "Ghost" Modal - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>The "Ghost" Modal</h1>
<p class="lead">A modal dialog that isn't really a modal.</p>

<div class="row">
    <div class="col-md-8">
        <p>This page demonstrates a common accessibility failure where a "modal" dialog is displayed visually but fails to manage keyboard focus or screen reader context.</p>
        
        <button id="openModal" class="btn btn-primary mb-4" onclick="document.getElementById('fakeModal').style.display='block'">Open Terms & Conditions</button>

        <p>Try to read this text while the modal is open. A screen reader user effectively "sees" right through the modal (hence "Ghost") and can interact with this background content even though it should be obscured.</p>
        
        <div class="mb-5">
            <label for="bgInput" class="form-label">Background Input (Should be blocked)</label>
            <input type="text" class="form-control" id="bgInput" placeholder="Try typing here while modal is open">
        </div>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<!-- The "Ghost" Modal -->
<!-- VIOLATION: No role="dialog", no aria-modal="true", no focus trap -->
<div id="fakeModal" style="display:none; position: fixed; top: 20%; left: 50%; transform: translateX(-50%); width: 80%; max-width: 500px; background: white; padding: 2rem; border: 2px solid #333; box-shadow: 0 10px 25px rgba(0,0,0,0.5); z-index: 1000;">
    <h2>Terms and Conditions</h2>
    <p>These are the terms. They are very important.</p>
    <p>Notice that your keyboard focus might still be on the button behind this modal, or you can tab "out" of this modal into the page background.</p>
    <div class="text-end mt-4">
        <button class="btn btn-primary" onclick="document.getElementById('fakeModal').style.display='none'">I Agree</button>
        <button class="btn btn-secondary" onclick="document.getElementById('fakeModal').style.display='none'">Close</button>
    </div>
</div>
<!-- VIOLATION: No page overlay to block clicks -->

<?php include '../includes/footer.php'; ?>
