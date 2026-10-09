<?php
$pageTitle = 'Focus Failure Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Focus Failure Journey</h1>
<p class="lead">This page demonstrates a common focus management issue in Single Page Applications (SPAs) or dynamic lists.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Disorienting focus resets.<br>
        <strong>Observation:</strong> Click "Load More". Press Tab. Does focus resume at the new item or restart at the top?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 2.4.3 (Focus Order)</li>
            <li>Best Practice (Manage Focus)</li>
        </ul>
    </small>
</div>

<div class="alert alert-info">
    <strong>The Bug:</strong> When you click "Load More Results", new content is added, but your keyboard focus is reset to the top of the document (or lost completely to the body), forcing you to tab all the way back down.
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <h3>Search Results</h3>
        <ul id="results-list" class="list-group mb-4">
            <li class="list-group-item">Result Item 1: Accessible Web Design</li>
            <li class="list-group-item">Result Item 2: WAI-ARIA Basics</li>
            <li class="list-group-item">Result Item 3: Color Contrast Standards</li>
            <li class="list-group-item">Result Item 4: Semantic HTML</li>
            <li class="list-group-item">Result Item 5: Keyboard Navigation</li>
        </ul>

        <button id="load-more-btn" class="btn btn-primary">Load More Results</button>
    </div>
</div>

<script>
    document.getElementById('load-more-btn').addEventListener('click', function() {
        const list = document.getElementById('results-list');
        const start = list.children.length + 1;
        
        // Simulate AJAX delay
        this.innerHTML = 'Loading...';
        
        setTimeout(() => {
            // Append new items
            for (let i = 0; i < 3; i++) {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = `Result Item ${start + i}: New Dynamic Content`;
                list.appendChild(li);
            }
            
            this.innerHTML = 'Load More Results';
            
            // THE BUG: Intentionally resetting focus to the body or top of page
            // instead of keeping it on the button or moving to the first new item.
            document.body.setAttribute('tabindex', '-1');
            document.body.focus();
            
        }, 800);
    });
</script>

<?php include '../includes/footer.php'; ?>
