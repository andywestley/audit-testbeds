<?php
$pageTitle = 'Absolute Font Size (COG.ABS_FONT_SIZE)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Absolute Font Size (COG.ABS_FONT_SIZE)</h1>
    <p class="lead">Demonstrating font sizes defined in absolute units like pixels (px), which prevents user text resizing preferences.</p>

    <div class="mt-4 border p-4">
        <h3>Example: Absolute Font Size</h3>
        <span style="font-size: 14px;">This text uses a hardcoded pixel size inline.</span>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            Defining font size with absolute units (such as pixels or points) prevents browsers from scaling text dynamically based on the user's custom browser/system zoom settings. Using relative units like <code>em</code> or <code>rem</code> respects user text-size preferences.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
