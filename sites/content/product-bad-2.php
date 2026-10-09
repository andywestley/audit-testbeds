<?php
$pageTitle = 'Bad Product 2';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="bad-content-notice">
            <h4>Intended Content Violations:</h4>
            <p>Cliches ("think outside the box", "low-hanging fruit"), aggressive sales tone, non-inclusive language ("businessman"), extreme length.</p>
        </div>
    </div>
</div>

<div itemscope itemtype="https://schema.org/Product" class="row mt-2">
    <div class="col-md-6">
        <img itemprop="image" src="https://placehold.co/600x400?text=Business+Software" alt="Software box" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
        <h1 itemprop="name" class="display-5 fw-bold mb-3">Synergy Suite 5.0</h1>
        <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
            <h2 class="h3 text-primary mb-4" itemprop="priceCurrency" content="USD">$<span itemprop="price" content="499.00">499.00</span></h2>
        </div>
        
        <div itemprop="description" class="fs-5 mb-4">
            <p>Attention every modern businessman! If you want to grab the low-hanging fruit in your industry, you need this software right now. Do not wait, buy it today before your competitors crush you into the dust! This is literally the most important purchase you will make in your entire professional career.</p>
            <p>We built this suite to help you think outside the box and give 110% every single day. At the end of the day, it's a win-win situation for your entire enterprise. You will be able to touch base with all your key stakeholders and leverage synergies across all your core competencies in real-time.</p>
            <p>Push the envelope and take your synergies to the next level. This is the silver bullet your company has been waiting for! Stop boiling the ocean and start moving the needle. When push comes to shove, you need a best-of-breed solution that moves at the speed of business.</p>
            <p>Do not let your competitors steal your lunch! Hit the ground running with our turn-key platform. It is time to paradigm shift your workflow and disrupt the traditional corporate landscape. Buy Synergy Suite 5.0 right now, because hesitation is for losers and you are a winner!</p>
        </div>
        
        <button class="btn btn-danger btn-lg w-100 fw-bold">BUY IT RIGHT NOW BEFORE IT IS TOO LATE!</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
