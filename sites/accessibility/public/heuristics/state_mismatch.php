<?php
$pageTitle = 'State Mismatch Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>State Mismatch Journey</h1>
<p class="lead">This page demonstrates a synchronization issue between the visual state of a component and its ARIA attributes.</p>

<div class="alert alert-info">
    <small class="d-block">
        <strong>Demonstrates:</strong> Broken semantics in custom widgets.<br>
        <strong>Observation:</strong> Toggle accordion. Inspect button. Does `aria-expanded` toggle true/false?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 4.1.2 (Name, Role, Value)</li>
            <li>ARIA Best Practices</li>
        </ul>
    </small>
</div>

<div class="alert alert-info">
    <strong>The Bug:</strong> Toggle the accordion below. Visually, the content opens and closes. However, inspect the button's code. <code>aria-expanded</code> is hardcoded to "false" and never changes, lying to screen reader users about the state of the content.
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <!-- THE BUG: aria-expanded is hardcoded false and not updated by JS -->
                    <button id="accordion-btn" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                        More Information (Click to Toggle)
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Simple custom collapse styles to avoid depending on complex bootstrap JS for this demo */
    .collapse {
        display: none;
    }
    .collapse.show {
        display: block;
    }
</style>

<script>
    document.getElementById('accordion-btn').addEventListener('click', function() {
        const targetId = this.getAttribute('aria-controls');
        const content = document.getElementById(targetId);
        
        // Toggle visual state
        content.classList.toggle('show');
        
        // THE BUG: We Intentionally forgot to update aria-expanded on 'this' button
        // visually it works, but semantically it's broken.
    });
</script>

<?php include '../includes/footer.php'; ?>
