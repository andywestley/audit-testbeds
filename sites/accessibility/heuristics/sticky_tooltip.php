<?php
$pageTitle = 'The Sticky Tooltip';
$basePath = '../';
include '../includes/header.php';
?>

<h1>The Sticky Tooltip</h1>
<p class="lead">This page demonstrates the failure of WCAG 1.4.13 by creating a persistent tooltip that obscures content and is hard to dismiss.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Disruption for screen magnifier users.<br>
        <strong>Observation:</strong> Hover over the "Help" icon. Does the tooltip obscure the text below it? Can you dismiss it without moving the mouse away?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 1.4.13 (Content on Hover or Focus)</li>
        </ul>
    </small>
</div>

<div class="mt-5 p-4 border rounded bg-light position-relative">
    <p>
        Your account balance is currently <strong>$1,240.50</strong> and is due for 
        <span class="badge bg-secondary" id="tooltip-trigger" tabindex="0" style="cursor: help;">
            Settlement Info (?)
        </span> 
        on the next business day.
    </p>

    <!-- THE BUG: Deeply nested, obscuring, and persistent tooltip -->
    <div id="custom-tooltip" class="position-absolute p-3 bg-dark text-white rounded shadow-lg" style="display:none; width: 300px; z-index: 1000; top: 40px; left: 150px;">
        <h6 class="border-bottom pb-2">Settlement Details</h6>
        <p class="small mb-0">
            The settlement process involves multi-bank verification and can take up to 48 hours to fully reconcile. 
            Note that international transfers may incur additional processing fees from intermediary banks 
            which are not visible in this interface.
        </p>
    </div>

    <p class="text-muted mt-3">This text is often obscured by the tooltip when it's open.</p>
</div>

<script>
    const trigger = document.getElementById('tooltip-trigger');
    const tooltip = document.getElementById('custom-tooltip');

    trigger.addEventListener('mouseenter', () => {
        tooltip.style.display = 'block';
    });
    
    // THE BUG: No way to dismiss with keyboard (Escape)
    // And it doesn't close when moving mouse to the tooltip itself (though this simplified version stays open)
    
    trigger.addEventListener('mouseleave', (e) => {
        // Intentionally slightly delayed or finicky
        setTimeout(() => {
            if (!tooltip.matches(':hover')) {
                tooltip.style.display = 'none';
            }
        }, 300);
    });
</script>

<div class="mt-5">
    <h4>WCAG Requirements</h4>
    <p>Content that appears on hover/focus must be:
        <ul>
            <li><strong>Dismissible:</strong> A mechanism exists to dismiss it without moving hover/focus (e.g. Esc key).</li>
            <li><strong>Hoverable:</strong> If hover triggers it, the pointer can move over the new content without it disappearing.</li>
            <li><strong>Persistent:</strong> It remains visible until hover/focus is removed or the user dismisses it.</li>
        </ul>
    </p>
</div>

<?php include '../includes/footer.php'; ?>
