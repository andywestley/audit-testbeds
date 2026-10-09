<?php
$pageTitle = 'Registration (User Journey)';
$basePath = '../';
include '../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Account Registration</h1>
        <p>Join our secure platform today.</p>

        <div class="alert alert-info">
            <small class="d-block">
                <strong>Demonstrates:</strong> Error handling failures.<br>
                <strong>Observation:</strong> Submit empty form. Note if focus moves to errors or if errors are read out.<br>
                <strong>Key Issues:</strong>
                <ul class="ps-3 mb-0">
                    <li>WCAG 3.3.1 (Error Identification)</li>
                    <li>WCAG 3.3.3 (Error Suggestion)</li>
                    <li>WCAG 4.1.3 (Status Messages)</li>
                </ul>
            </small>
        </div>
        
        <form id="regForm" onsubmit="return validateForm(event)">
            
            <div class="mb-3">
                <label>Username</label> <!-- Missing for -->
                <input type="text" class="form-control" id="username"> 
                <!-- Error div hidden by default -->
                <div id="usernameError" style="display:none; color: red;">Username invalid</div>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <label>Security PIN</label>
                <!-- Issue: Constraint not communicated (must be 6 digits) -->
                <input type="text" class="form-control" id="pin">
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>
            <div id="genericError" class="mt-2 text-danger"></div>
        </form>
    </div>
</div>

<script>
function validateForm(e) {
    e.preventDefault();
    const username = document.getElementById('username');
    const pin = document.getElementById('pin');
    const errorDiv = document.getElementById('genericError');
    let valid = true;

    // Reset styles
    username.style.border = '';
    pin.style.border = '';
    errorDiv.innerText = '';

    // Inaccessible validation: Color only, no aria-invalid, no focus movement
    if (username.value.length < 5) {
        username.style.border = '2px solid red'; // Color only
        valid = false;
    }

    // Hidden constraint: PIN must be 6 digits start with 1
    if (!/^\d{6}$/.test(pin.value)) {
        pin.style.border = '2px solid red';
        valid = false;
    }

    if (!valid) {
        // Generic error message, no live region
        errorDiv.innerText = 'Please fix the errors marked in red.'; 
        return false;
    }

    window.location.href = 'blocked_success.php';
    return false;
}
</script>

<?php include '../includes/footer.php'; ?>
