<?php
$pageTitle = 'Blocked Copy-Paste (COG.BLOCKED_PASTE)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Blocked Copy-Paste (COG.BLOCKED_PASTE)</h1>
    <p class="lead">Demonstrating text input fields that explicitly prevent pasting operations.</p>

    <div class="mt-4 border p-4 col-md-6">
        <h3>Example: Blocked Paste Input</h3>
        <label for="blocked-paste-input" class="form-label">Confirm Email (Paste is blocked):</label>
        <input type="text" id="blocked-paste-input" class="form-control" placeholder="Confirm Email" onpaste="event.preventDefault(); return false;">
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            Blocking copy-paste operations forces manual transcriptions. This is a significant barrier for users with cognitive or physical limitations, memory difficulties, or those who rely on password managers and assistive typing tools.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
