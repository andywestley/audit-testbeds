<?php
$pageTitle = 'Viewport Zoom Restriction (COG.NO_ZOOM)';
$extraStyles = '<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Viewport Zoom Restriction (COG.NO_ZOOM)</h1>
    <p class="lead">Demonstrating viewport scaling lock settings that prevent users from zooming in.</p>

    <div class="mt-4 alert alert-warning">
        <strong>Trigger Action:</strong> The <code>&lt;meta name="viewport"&gt;</code> tag in the <code>&lt;head&gt;</code> of this page contains <code>user-scalable=no</code>, which disables scaling/pinch-to-zoom on mobile browsers.
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            Users with low vision or cognitive disabilities often need to zoom in on page content to read it. Restricting zoom capabilities violates <strong>WCAG 1.4.4 (Resize Text)</strong> and prevents assistive scaling tools from functioning properly.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
