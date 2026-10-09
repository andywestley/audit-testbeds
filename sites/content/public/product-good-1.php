<?php
$pageTitle = 'Good Product 1';
include 'includes/header.php';
?>

<div itemscope itemtype="https://schema.org/Product" class="row mt-4">
    <div class="col-md-6">
        <img itemprop="image" src="https://placehold.co/600x400?text=Premium+Headphones" alt="A pair of sleek, black wireless headphones" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
        <h1 itemprop="name" class="display-5 fw-bold mb-3">Aura Wireless Headphones</h1>
        <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
            <h2 class="h3 text-primary mb-4" itemprop="priceCurrency" content="USD">$<span itemprop="price" content="199.99">199.99</span></h2>
            <link itemprop="availability" href="https://schema.org/InStock" />
        </div>
        
        <div itemprop="description" class="fs-5 mb-4">
            <p>Experience clear, balanced sound with our new wireless headphones. Active noise cancellation blocks background noise so you can focus on your music.</p>
            <p>The soft ear cushions provide comfort for long listening sessions. Control your volume, skip tracks, and answer calls using the simple touch panel on the right earcup.</p>
            <p>These headphones fold up easily to fit inside the included travel case. A single charge gives you up to 30 hours of playback, and a quick 10-minute charge adds three hours of life.</p>
            <p>We built the frame from durable, lightweight aluminum to ensure they last for years. Connect easily to any Bluetooth device within a 30-foot range.</p>
            <ul>
                <li>30 hours of battery life</li>
                <li>Fast charging support</li>
                <li>Bluetooth 5.0 connectivity</li>
                <li>Premium travel case included</li>
            </ul>
        </div>
        
        <button class="btn btn-primary btn-lg w-100">Add to Cart</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
