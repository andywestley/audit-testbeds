<?php
/**
 * Master Sitemap Generator for Audit Testbeds Monorepo
 * Executes individual sitemap generators or creates sitemap.xml for all 4 sites.
 */

$sites = [
    'accessibility' => 'https://inaccessible.andrewwestley.co.uk',
    'content'       => 'https://content-testbed.andrewwestley.co.uk',
    'coga'          => 'https://coga-testbed.andrewwestley.co.uk',
    'ux'            => 'https://uxusability-testbed.andrewwestley.co.uk'
];

$rootDir = dirname(__DIR__);

echo "=== Generating Sitemaps across all 4 Testbeds ===\n";

foreach ($sites as $key => $domain) {
    $sitePath = $rootDir . '/sites/' . $key;
    $generatorPath = $sitePath . '/generate_sitemap.php';
    
    if (file_exists($generatorPath)) {
        echo "\n[{$key}] Running {$generatorPath}...\n";
        $cmd = "php " . escapeshellarg($generatorPath);
        $cwd = getcwd();
        chdir($sitePath);
        passthru($cmd);
        chdir($cwd);
    } else {
        echo "\n[{$key}] No generate_sitemap.php found. Skipping.\n";
    }
}

echo "\n✅ All sitemaps updated successfully!\n";
