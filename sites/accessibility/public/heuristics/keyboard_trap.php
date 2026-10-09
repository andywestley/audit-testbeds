<?php
$pageTitle = 'Keyboard Trap Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Keyboard Trap Journey</h1>
<p class="lead">This page demonstrates a "Keyboard Trap", where focus enters a component but cannot leave via the keyboard.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> "Black hole" for keyboard users.<br>
        <strong>Observation:</strong> Tab into the scroll box. Attempt to Tab out to the next form field. Verify if stuck.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.1.2 (No Keyboard Trap)</li>
        </ul>
    </small>
</div>

<div class="alert alert-danger">
    <strong>The Bug:</strong> Tab into the "Terms and Conditions" box below. Once inside, try to Tab out to the "I Agree" button. You will find you are stuck inside the text box, cycling through dummy links or just unable to exit.
    <br><br>
    <em>(To escape: Reload the page or use your mouse)</em>
</div>

<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">
            </div>

            <div class="form-group">
                <label>Terms and Conditions</label>
                <!-- The Trap Container -->
                <div id="terms-trap" tabindex="0" class="border p-3" style="height: 200px; overflow-y: scroll; background: #f9f9f9;">
                    <p>Please read our terms carefully.</p>
                    <p>1. Rule One.</p>
                    <p>2. Rule Two: <a href="#">Link A</a> inside trap.</p>
                    <p>3. Rule Three.</p>
                    <p>4. Rule Four: <a href="#">Link B</a> inside trap.</p>
                    <p>5. Rule Five.</p>
                    <p>End of terms.</p>
                </div>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agree-check">
                <label class="form-check-label" for="agree-check">I agree to the terms</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit Registration</button>
        </form>
    </div>
</div>

<script>
    const trap = document.getElementById('terms-trap');
    
    // THE BUG: Aggressively keeping focus inside.
    // In real life, this often happens with JS that manages internal focus of widgets
    // but forgets to check for Tab vs Shift-Tab on the edges to let the user out.
    trap.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            e.preventDefault();
            // Just move focus between internal elements or keep it on container
           if(document.activeElement === trap) {
               // Focus the first link
               trap.querySelector('a').focus();
           } else {
               // Focus back to container
               trap.focus();
           }
        }
    });
</script>

<?php include '../includes/footer.php'; ?>
