<?php
$pageTitle = 'Unstoppable Carousel - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Unstoppable Carousel</h1>
<p class="lead">An auto-rotating slider that cannot be paused.</p>

<div class="row">
    <div class="col-md-8">
        <p>This carousel advances automatically every 3 seconds. There is no pause button, and hovering over it does not stop the motion.</p>
        
        <!-- VIOLATION: WCAG 2.2.2 Pause, Stop, Hide -->
        <div id="carousel" class="border p-4 mb-4 text-center bg-light" style="height: 200px; display: flex; align-items: center; justify-content: center;">
            <div id="slide1" class="slide">
                <h3>Slide 1: Important Info</h3>
                <p>This is the first piece of information you need to read.</p>
            </div>
            <div id="slide2" class="slide" style="display:none;">
                <h3>Slide 2: More Details</h3>
                <p>Here are more details that will disappear quickly.</p>
            </div>
            <div id="slide3" class="slide" style="display:none;">
                <h3>Slide 3: Final Point</h3>
                <p>Did you catch the first one? Too late!</p>
            </div>
        </div>

        <p>For users with cognitive disabilities or low literacy, this content moves too fast to read. For keyboard users, it can be distracting and focus-stealing.</p>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<script>
    let currentSlide = 1;
    setInterval(() => {
        document.getElementById('slide' + currentSlide).style.display = 'none';
        currentSlide = currentSlide < 3 ? currentSlide + 1 : 1;
        document.getElementById('slide' + currentSlide).style.display = 'block';
    }, 3000); // Auto-advance every 3s
</script>

<?php include '../includes/footer.php'; ?>
