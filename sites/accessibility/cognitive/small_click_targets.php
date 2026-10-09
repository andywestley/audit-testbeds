<?php
$pageTitle = 'Small Click Targets (COG.TARGET_SIZE)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Small Click Targets (COG.TARGET_SIZE)</h1>
    <p class="lead">Demonstrating interactive click targets that are smaller than the accessible minimum size (24x24px).</p>

    <div class="mt-4 border p-4">
        <h3>Example: Tiny Button</h3>
        <p>Try clicking the close button below:</p>
        <button style="width: 20px; height: 20px; padding: 0;">✖</button>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            Interactive targets like buttons, links, or inputs must be at least 24x24px (preferably 44x44px or larger) to ensure they can be easily activated by users with motor control difficulties, hand tremors, or those using mobile touch screens.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
