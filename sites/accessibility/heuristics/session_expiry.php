<?php
$pageTitle = 'Timed Session Expiry - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Timed Session Expiry</h1>
<p class="lead">A session warning that traps focus or cannot be extended.</p>

<div class="row">
    <div class="col-md-8">
        <p>This page simulates a secure banking session. After 5 seconds, a "Session Expiring" warning will appear.</p>
        
        <p><strong>The Trap:</strong></p>
        <ul>
            <li>The warning modal might not be announced to screen readers.</li>
            <li>Focus might be trapped inside it (or worse, left outside it).</li>
            <li><strong>The kicker:</strong> The "Extend Session" button is a <code>div</code> with a click handler, so you can't tab to it to save your work.</li>
        </ul>

        <div class="card p-4 mb-5">
            <h3>Important Transfer</h3>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" id="amount" class="form-control" placeholder="1000">
            </div>
            <button class="btn btn-primary">Transfer Funds</button>
        </div>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<!-- VIOLATION: WCAG 2.2.1 Timing Adjustable / WCAG 2.1.1 Keyboard -->
<div id="sessionModal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 8px; text-align: center; max-width: 400px;">
        <h2>Session Expiring</h2>
        <p>Your session will expire in <span id="countdown">10</span> seconds.</p>
        <p>Do you want to continue?</p>
        
        <!-- VIOLATION: Not a button, not keyboard accessible -->
        <div class="btn btn-primary" onclick="extendSession()">Extend Session</div>
        <div class="btn btn-secondary" onclick="document.getElementById('sessionModal').style.display = 'none'">Log Out</div>
    </div>
</div>

<script>
    // Hide initially via JS to ensure it's hidden
    document.getElementById('sessionModal').style.display = 'none';

    setTimeout(() => {
        document.getElementById('sessionModal').style.display = 'flex';
        let count = 10;
        const timer = setInterval(() => {
            count--;
            document.getElementById('countdown').innerText = count;
            if (count <= 0) {
                clearInterval(timer);
                alert("Session Expired (Simulation)");
                document.getElementById('sessionModal').style.display = 'none';
            }
        }, 1000);
    }, 5000); // Trigger after 5s

    function extendSession() {
        document.getElementById('sessionModal').style.display = 'none';
        alert("Session Extended (Via Mouse)");
    }
</script>

<?php include '../includes/footer.php'; ?>
