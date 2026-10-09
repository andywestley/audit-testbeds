<?php
$pageTitle = 'Silent Update Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Silent Update Journey</h1>
<p class="lead">This page demonstrates the lack of <code>aria-live</code> regions for dynamic updates.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Missing non-visual feedback.<br>
        <strong>Observation:</strong> Click "Add". Verify visual change. Check code for `aria-live` regions.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 4.1.3 (Status Messages)</li>
            <li>WCAG 3.3.1 (Error Identification)</li>
        </ul>
    </small>
</div>

<div class="alert alert-info">
    <strong>The Bug:</strong> When you click "Add to Cart", a visual message appears and the cart count updates. However, because there are no ARIA live regions, screen reader users receive no feedback that the action was successful.
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Awesome Widget</h5>
                <p class="card-text">The best widget you'll ever buy. $19.99.</p>
                <button id="add-btn" class="btn btn-success">Add to Cart</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 offset-md-4">
        <div class="border p-3">
            <h4>Shopping Cart</h4>
            <!-- THE BUG: No aria-live="polite" or role="status" on this container -->
            <div id="cart-status">
                Items: <span id="item-count">0</span>
            </div>
            <div id="status-message" class="text-success mt-2 font-weight-bold" style="min-height: 1.5em;"></div>
        </div>
    </div>
</div>

<script>
    let count = 0;
    document.getElementById('add-btn').addEventListener('click', function() {
        count++;
        // Update visual counter
        document.getElementById('item-count').textContent = count;
        
        // Show visual message
        const msg = document.getElementById('status-message');
        msg.textContent = 'Success! Item added to cart.';
        
        // Clear message after 3 seconds
        setTimeout(() => {
            msg.textContent = '';
        }, 3000);
    });
</script>

<?php include '../includes/footer.php'; ?>
