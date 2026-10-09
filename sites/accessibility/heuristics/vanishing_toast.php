<?php
$pageTitle = 'The Vanishing Toast - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>The Vanishing Toast</h1>
<p class="lead">Status messages that disappear too quickly.</p>

<div class="row">
    <div class="col-md-8">
        <p>When you click the button below, a "toast" message will appear at the top of the screen. It will vanish automatically after 2 seconds.</p>
        
        <button class="btn btn-success mb-5" onclick="showToast()">Save Changes</button>

        <p><strong>Did you see it?</strong></p>
        <ul>
            <li>Screen reader users might miss it entirely if `aria-live` isn't handled perfectly (which it isn't here).</li>
            <li>Low-vision users using screen magnification might be looking at the button and miss the message at the top.</li>
            <li>Users who read slowly won't have time to process the information.</li>
        </ul>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<!-- VIOLATION: WCAG 2.2.1 Timing Adjustable / WCAG 4.1.3 Status Messages (Partial) -->
<div id="toast" style="display:none; position: fixed; top: 20px; right: 20px; background: #28a745; color: white; padding: 1rem; border-radius: 4px; z-index: 2000;">
    Settings saved successfully!
</div>

<script>
    function showToast() {
        const toast = document.getElementById('toast');
        toast.style.display = 'block';
        
        // Vanish after 2 seconds - too short for many users
        setTimeout(() => {
            toast.style.display = 'none';
        }, 2000);
    }
</script>

<?php include '../includes/footer.php'; ?>
