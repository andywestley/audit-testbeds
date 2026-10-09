<?php
$pageTitle = 'Complex Language & Jargon';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Complex Language & Jargon</h1>
<p class="lead">This page demonstrates the failure of WCAG 3.1.5 by using unnecessarily complex vocabulary and technical jargon.</p>

<div class="alert alert-warning">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for people with learning disabilities, non-native speakers, or those with reading difficulties.<br>
        <strong>Observation:</strong> Read the Terms of Service. Is the language clear and concise, or does it require a high level of literacy to parse?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 3.1.5 (Reading Level)</li>
        </ul>
    </small>
</div>

<div class="card mt-5">
    <div class="card-header bg-warning">
        <h5 class="mb-0">End-User License Agreement (EULA) - Section 14.b</h5>
    </div>
    <div class="card-body">
        <p class="lead">The following stipulations govern the bidirectional synchronization of metadata across heterogeneous distributed environments.</p>
        
        <p>
            The Licensee hereby acknowledges that the instantiation of the aforementioned Software-as-a-Service (SaaS) architecture 
            necessitates the periodic invocation of idempotent RESTful API endpoints for the purpose of state reconciliation. 
            Failure to maintain persistent socket connectivity may result in the suboptimal propagation of ephemeral data packets, 
            thereby compromising the referential integrity of the relational schema.
        </p>

        <p>
            Furthermore, the obfuscation of cryptographic primitives during the handshake protocol is strictly prohibited. 
            Licensees shall refrain from the unauthorized circumvention of non-deterministic polynomial-time (NP) complexity 
            algorithms employed for the mitigation of adversarial heuristic analysis.
        </p>

        <div class="p-3 bg-light border rounded">
            <strong>Check the box to proceed:</strong>
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="agree-jargon">
                <label class="form-check-label" for="agree-jargon">
                    I concede to the aforementioned parameters of heuristic mitigation and idempotent reconciliation.
                </label>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h4>Why this matters</h4>
    <p>Clear, simple language helps everyone. For users with cognitive disabilities, complex sentence structures and industry-specific jargon can make a service completely inaccessible. Aim for a reading level equivalent to lower secondary education (approx. 7th-9th grade).</p>
</div>

<?php include '../includes/footer.php'; ?>
