<?php
$pageTitle = 'Bad Product 1';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="bad-content-notice">
            <h4>Intended Content Violations:</h4>
            <p>Weasel words ("virtually", "basically"), intensifiers ("extremely", "very"), complex vocabulary ("utilize", "optimum"), extreme length/rambling, missing ALT text on image.</p>
        </div>
    </div>
</div>

<div itemscope itemtype="https://schema.org/Product" class="row mt-2">
    <div class="col-md-6">
        <!-- Bad Practice: Missing ALT text -->
        <img itemprop="image" src="https://placehold.co/600x400?text=Smart+Watch" alt="" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
        <h1 itemprop="name" class="display-5 fw-bold mb-3">OmniTracker Pro</h1>
        <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
            <h2 class="h3 text-primary mb-4" itemprop="priceCurrency" content="USD">$<span itemprop="price" content="299.99">299.99</span></h2>
        </div>
        
        <div itemprop="description" class="fs-5 mb-4">
            <p>You can basically utilize this extremely advanced smartwatch to monitor virtually all of your vital signs. It is actually very good for achieving optimum health metrics across a plethora of interconnected physiological systems.</p>
            <p>The device facilitates seamless integration with your phone, providing a very robust notification system. Many experts agree it is arguably the most capable tracker currently available in the modern consumer electronics marketplace today. Essentially, you will find that it is very uniquely positioned to optimize your daily paradigm.</p>
            <p>It is generally considered to be quite durable, basically enduring very harsh environments. Some people say that it is actually virtually indestructible under most normal conditions. Furthermore, it is very apparent that the synergistic amalgamation of hardware and software components effectively facilitates an extremely superior user experience.</p>
            <p>In addition to these aforementioned capabilities, you can actually utilize the proprietary charging apparatus to achieve maximum battery revitalization in a very expedited timeframe. It is basically the pinnacle of horological achievement. Virtually everyone who has ever utilized the OmniTracker Pro has been extremely satisfied with the results.</p>
            <p>We basically think that you will actually love it very much because it is extremely useful for virtually all scenarios. Please purchase it today to basically improve your life very significantly.</p>
        </div>
        
        <button class="btn btn-primary btn-lg w-100">Add to Cart</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
