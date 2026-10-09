<?php
$pageTitle = 'Meaning by Color Alone';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Meaning by Color Alone</h1>
<p class="lead">This page demonstrates the failure of WCAG 1.4.1 by using color as the only way to convey status information.</p>

<div class="alert alert-warning">
    <small class="d-block">
        <strong>Demonstrates:</strong> Barriers for colorblind users and those in high-contrast modes.<br>
        <strong>Observation:</strong> Look at the server status dashboard. Can you tell which systems are failing without relying on the color?<br>
        <strong>Key Issues:</strong>
        <ul class="ps-3 mb-0">
            <li>WCAG 1.4.1 (Use of Color)</li>
        </ul>
    </small>
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">System Health Dashboard</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    API Gateway
                    <span style="width: 20px; height: 20px; background-color: #28a745; border-radius: 50%;" title="Status Indicator"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Database Cluster
                    <span style="width: 20px; height: 20px; background-color: #dc3545; border-radius: 50%;" title="Status Indicator"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Load Balancer
                    <span style="width: 20px; height: 20px; background-color: #28a745; border-radius: 50%;" title="Status Indicator"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    CDN Edge Nodes
                    <span style="width: 20px; height: 20px; background-color: #ffc107; border-radius: 50%;" title="Status Indicator"></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="mt-5">
    <h4>The Accessible Alternative</h4>
    <p>Status indicators should use text (e.g., "Active", "Down", "Slow") or distinct icons (e.g., checkmarks vs. crosses) in addition to color.</p>
</div>

<?php include '../includes/footer.php'; ?>
