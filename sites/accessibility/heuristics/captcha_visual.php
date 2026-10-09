<?php
$pageTitle = 'Visual-Only CAPTCHA - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Visual-Only CAPTCHA</h1>
<p class="lead">Security checks that exclude blind users.</p>

<div class="row">
    <div class="col-md-8">
        <p>This form requires you to identify an object in an image. However, there is no audio alternative, no alt text describing the challenge, and no text based fallback.</p>
        
        <form onsubmit="event.preventDefault(); alert('Checked (Simulated)');">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control" id="username">
            </div>
            
            <div class="mb-4 border p-3 bg-light">
                <p class="fw-bold">Security Check:</p>
                <p>Please click on the cat to prove you are human.</p>
                
                <!-- VIOLATION: WCAG 1.1.1 Non-text Content / WCAG 2.1.1 Keyboard -->
                <div style="display:flex; gap:10px;">
                    <!-- Using placeholder images from placehold.co -->
                    <img src="https://placehold.co/100x100?text=Dog" onclick="fail()" style="cursor:pointer;" alt="Security Image 1"> <!-- Alt text exists but is wrong/misleading in a real scenario, or just missing -->
                    <img src="https://placehold.co/100x100?text=Cat" onclick="success()" style="cursor:pointer;"> <!-- Missing alt text entirely -->
                    <img src="https://placehold.co/100x100?text=Bird" onclick="fail()" style="cursor:pointer;" alt=""> <!-- Empty alt text -->
                </div>
                <div id="captchaResult" class="mt-2"></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-4">Back to Journeys</a>
    </div>
</div>

<script>
    function success() {
        document.getElementById('captchaResult').innerHTML = '<span class="text-success">Correct!</span>';
    }
    function fail() {
        document.getElementById('captchaResult').innerHTML = '<span class="text-danger">Incorrect. Try again.</span>';
    }
</script>

<?php include '../includes/footer.php'; ?>
