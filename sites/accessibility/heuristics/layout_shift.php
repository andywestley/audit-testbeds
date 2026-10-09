<?php
$pageTitle = 'Layout Shift Journey (CLS)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Layout Shift Journey (CLS)</h1>
<p class="lead">This page demonstrates Cumulative Layout Shift triggered by user interaction.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Visual instability and reading disruption.<br>
        <strong>Observation:</strong> Click to load image. Watch text jump. Verify no placeholder height on container.<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>Core Web Vitals (CLS)</li>
            <li>UX / Reading Continuity</li>
        </ul>
    </small>
</div>

<div class="alert alert-warning">
    <strong>The Bug:</strong> Click the "Show Article Image" button. Content will load asynchronously above the text without reserving space. This causes the text (and your reading position) to jump down abruptly.
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <button id="load-ad-btn" class="btn btn-secondary mb-3">Show Article Image</button>
        
        <!-- THE BUG: Container has no height, causing shift when content injects -->
        <div id="ad-container"></div>

        <article>
            <h3>The Importance of Stability</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <p>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p>
                <a href="#">Read more...</a>
            </p>
        </article>
    </div>
</div>

<script>
    document.getElementById('load-ad-btn').addEventListener('click', function() {
        const container = document.getElementById('ad-container');
        this.disabled = true;
        this.textContent = 'Loading...';

        // Simulate network delay
        setTimeout(() => {
            // Inject a large block element
            // In a real app this might be an Image or an Ad iframe
            const ad = document.createElement('div');
            ad.style.height = '250px';
            ad.style.background = '#ddd';
            ad.style.width = '100%';
            ad.style.display = 'flex';
            ad.style.alignItems = 'center';
            ad.style.justifyContent = 'center';
            ad.style.fontSize = '2rem';
            ad.style.marginBottom = '1rem';
            ad.style.fontWeight = 'bold';
            ad.textContent = 'Dynamic Content';
            
            container.appendChild(ad);
            this.textContent = 'Image Loaded';
        }, 600);
    });
</script>

<?php include '../includes/footer.php'; ?>
