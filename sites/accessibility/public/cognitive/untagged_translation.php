<?php
$pageTitle = 'The Untagged Translation';
$basePath = '../';
include '../includes/header.php';
?>

<h1>The Untagged Translation</h1>
    <p class="lead">Demonstrating a failure of WCAG 3.1.2 (Language of Parts) by switching languages without markup.</p>

    <div class="mt-4">
        <h2>Global Partnership Announcement</h2>
        <p>
            We are incredibly excited to announce our new global partnership initiative. This collaboration will allow us to expand our services and reach a broader audience across multiple continents. Our teams have been working tirelessly to ensure a seamless integration of our platforms, and we look forward to the innovative solutions this partnership will bring to our international community.
        </p>
        
        <p>
            Estamos muy contentos de compartir esta noticia con nuestra comunidad de habla hispana. Esta nueva asociación estratégica nos permitirá ofrecer un mejor soporte y crear oportunidades únicas para nuestro mercado internacional. Continuaremos esforzándonos por brindar la más alta calidad en nuestros servicios y esperamos crecer juntos en esta nueva y emocionante etapa.
        </p>

        <p>
            Le succès de ce projet repose sur la collaboration étroite de nos équipes à travers le monde. Nous sommes convaincus que cette synergie apportera une valeur ajoutée exceptionnelle pour nos clients. L'innovation et l'excellence restent au cœur de notre mission globale.
        </p>
    </div>

    <div class="mt-5 p-4 bg-light border border-danger">
        <h3>Why this matters</h3>
        <p>
            This page demonstrates a direct failure of <strong>WCAG 2.2 Success Criterion 3.1.2 (Language of Parts)</strong>.
            The page's primary language is declared as English in the root <code>&lt;html&gt;</code> tag, but the text changes to Spanish and French partway through without using the <code>lang="..."</code> attribute (e.g., <code>&lt;p lang="es"&gt;</code>) to indicate the shift.
            As a result, screen readers and translation engines will attempt to read the Spanish and French text using English pronunciation rules, resulting in incomprehensible gibberish for users relying on assistive technologies.
        </p>
    </div>
<?php include '../includes/footer.php'; ?>
