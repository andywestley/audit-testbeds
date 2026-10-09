<?php
$pageTitle = 'Wall of Text (COG.WALL_OF_TEXT)';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Wall of Text (COG.WALL_OF_TEXT)</h1>
    <p class="lead">Demonstrating large blocks of unbroken text containing more than 150 words, which tires reading comprehension.</p>

    <div class="mt-4 border p-4">
        <h3>Example: Long Paragraph</h3>
        <p>
            This is the start of a very long paragraph designed specifically to trigger the wall of text rule. In web accessibility, presenting too much text in a single block without paragraphs, lists, headers, or other breaks makes it extremely difficult for readers with ADHD, cognitive impairments, or learning disabilities to follow along. To successfully trigger this rule, we need to count up to more than one hundred and fifty words in total. So we will continue writing sentences, adding more content, detailing access standards, listing guidelines, describing components, explaining engines, discussing compliance scores, and detailing the 80/20 rule until we have passed the word limit threshold. It is crucial to have visual breaks because reading large amounts of text is mentally fatiguing. We are still writing more words here to ensure that we easily exceed the 150-word count required by the Puppeteer heuristics scanner. Almost there now!
        </p>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            For readers with cognitive impairments, ADHD, dyslexia, or learning difficulties, large walls of text without headings, bullets, list items, or paragraph breaks increase cognitive load and make tracking lines of text difficult. Breaking up content improves overall comprehension and scanning speed.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
