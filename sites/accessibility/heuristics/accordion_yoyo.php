<?php
$pageTitle = 'Accordion "Yo-Yo" - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Accordion "Yo-Yo"</h1>
<p class="lead">Interaction that causes unexpected layout shifts.</p>

<div class="row">
    <div class="col-md-8">
        <p>In this accordion, opening one section automatically closes all others. While common, this implementation destroys the user's reading context.</p>
        
        <p><strong>The Issue:</strong></p>
        <ul>
            <li>If you are reading Section 3 and decide to check Section 1, Section 3 closes.</li>
            <li>If Section 1 was short and Section 3 was long, the whole page layout jumps up.</li>
            <li>Screen reader users might lose their place or be confused by the sudden disappearance of content they were just reading.</li>
        </ul>

        <!-- VIOLATION: WCAG 3.2.2 On Input (Unexpected Context Change) -->
        <div class="accordion mb-5" id="yoyoAccordion">
            <div class="card mb-2">
                <button class="btn btn-light w-100 text-start border" onclick="toggleSection('sec1')">
                    Section 1: Introduction
                </button>
                <div id="sec1" class="p-3 border-start border-end border-bottom" style="display:none;">
                    <p>This is a short introduction.</p>
                </div>
            </div>
            
            <div class="card mb-2">
                <button class="btn btn-light w-100 text-start border" onclick="toggleSection('sec2')">
                    Section 2: Detailed History (Long)
                </button>
                <div id="sec2" class="p-3 border-start border-end border-bottom" style="display:none;">
                    <p>This is a very long section designed to push content down.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>

            <div class="card mb-2">
                <button class="btn btn-light w-100 text-start border" onclick="toggleSection('sec3')">
                    Section 3: Conclusion
                </button>
                <div id="sec3" class="p-3 border-start border-end border-bottom" style="display:none;">
                    <p>This is the conclusion. If you open Section 2 now, this will snap shut!</p>
                </div>
            </div>
        </div>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<script>
    function toggleSection(id) {
        // Auto-close others (The "Yo-Yo" effect)
        ['sec1', 'sec2', 'sec3'].forEach(sid => {
            if (sid !== id) {
                document.getElementById(sid).style.display = 'none';
            }
        });
        
        // Toggle requested
        const el = document.getElementById(id);
        el.style.display = el.style.display === 'block' ? 'none' : 'block';
    }
</script>

<?php include '../includes/footer.php'; ?>
