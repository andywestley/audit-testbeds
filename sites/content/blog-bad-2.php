<?php
$pageTitle = 'Bad Blog 2';
include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="bad-content-notice">
            <h4>Intended Content Violations:</h4>
            <p>Language mismatch (Spanish content on an English page) and severe word overuse (repeating "coffee" continuously over a long text).</p>
        </div>
    </div>
</div>

<div itemscope itemtype="https://schema.org/BlogPosting" class="row justify-content-center mt-2">
    <div class="col-lg-8">
        <h1 itemprop="headline" class="mb-4">Mi Viaje a Madrid</h1>
        <div class="text-muted mb-4">
            By <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">Bilingual Traveler</span></span> | 
            <time itemprop="datePublished" datetime="2026-05-27">May 27, 2026</time>
        </div>
        
        <div itemprop="articleBody" class="fs-5">
            <!-- Bad Practice: Spanish text in <html lang="en"> -->
            <p>La semana pasada viajé a España para visitar a mi familia. El clima estaba perfecto, muy soleado y cálido. Caminamos por el parque del Retiro y comimos tapas deliciosas en la Plaza Mayor. Madrid es una ciudad increíble con mucha historia y cultura en cada esquina.</p>
            <p>Me encantó la arquitectura de la ciudad y la amabilidad de la gente. Visitamos el Museo del Prado y vimos obras de arte impresionantes. Recomiendo mucho visitar Madrid si tienes la oportunidad de viajar a Europa. Es una experiencia inolvidable que todos deberían disfrutar.</p>
            
            <hr class="my-4">
            
            <!-- Bad Practice: Word overuse -->
            <h2 class="h4">Morning Thoughts</h2>
            <p>Coffee is the best drink. I drink coffee every morning. When I wake up, I immediately want coffee. Coffee makes me feel awake. Without coffee, I am tired. I love the smell of coffee. The taste of coffee is amazing. I usually buy coffee at the coffee shop near my house, because their coffee is the freshest coffee in town. More people should drink coffee.</p>
            <p>Sometimes I make coffee at home. My home coffee is also good coffee. I have a special coffee machine just for making coffee. Coffee beans are very important for making good coffee. I buy expensive coffee beans for my coffee. When my friends visit, we drink coffee together. We talk about coffee while we drink our coffee.</p>
            <p>In the afternoon, I drink more coffee. Coffee helps me work. Coffee is my favorite beverage. Coffee is life. I will never stop drinking coffee.</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
