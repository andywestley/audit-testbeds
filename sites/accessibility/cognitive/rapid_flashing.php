<?php
$pageTitle = 'Rapid Flashing Content (COG.RAPID_FLASHING)';
$extraStyles = '<style>
@keyframes flash-effect {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}
.danger-flash {
    animation: flash-effect 0.2s infinite;
    background: #ffc107;
    color: #000;
    padding: 15px;
    font-weight: bold;
    text-align: center;
    border-radius: 5px;
    margin-top: 15px;
}
</style>';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Rapid Flashing Content (COG.RAPID_FLASHING)</h1>
    <p class="lead">Demonstrating content animating faster than 3Hz (0.33s per cycle), which poses a risk of seizures.</p>

    <div class="mt-4 border p-4">
        <h3>Example: High-Frequency Flashing Element</h3>
        <div class="danger-flash">Warning! Fast Flashing Active</div>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            Elements that flash, strobe, or blink faster than 3 times per second (less than or equal to 0.33s per cycle) can cause seizures in individuals with photosensitive epilepsy, and cause severe distraction and sensory overload for users with ADHD or cognitive/neurological conditions.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
