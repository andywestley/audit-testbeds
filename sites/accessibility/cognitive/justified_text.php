<?php
$pageTitle = 'Justified Text Alignment (COG.JUSTIFIED_TEXT)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Justified Text Alignment (COG.JUSTIFIED_TEXT)</h1>
    <p class="lead">Demonstrating text justified to both margins, which creates uneven word spacing ("rivers of white").</p>

    <div class="mt-4 border p-4">
        <h3>Example: Justified Paragraph</h3>
        <p style="text-align: justify;">
            This block of text has been aligned using the justify property, which will cause the scanner to flag a warning because the uneven spacing makes dyslexic reading significantly more difficult.
        </p>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            For users with dyslexia or other reading/cognitive impairments, fully justified text creates uneven gaps between words, leading to vertical tracks of white space that disrupt reading flow. Content should be left-aligned (or right-aligned for right-to-left languages) to maintain consistent word spacing.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
