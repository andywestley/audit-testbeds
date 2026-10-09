<?php
/**
 * Dynamic XML Sitemap Endpoint
 * Outputs dynamic XML sitemap with current domain and timestamps
 */

header('Content-Type: application/xml; charset=utf-8');

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') 
    || ($_SERVER['SERVER_PORT'] ?? '') == 443 
    || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');

$protocol = $isHttps ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'uxusability-testbed.andrewwestley.co.uk';
$baseUrl = "{$protocol}://{$host}";

require_once __DIR__ . '/includes/data.php';

$lastmod = date('Y-m-d');

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= htmlspecialchars($baseUrl . '/') ?></loc>
        <lastmod><?= $lastmod ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= htmlspecialchars($baseUrl . '/index.php') ?></loc>
        <lastmod><?= $lastmod ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
<?php foreach ($tests as $slug => $test): ?>
    <url>
        <loc><?= htmlspecialchars($baseUrl . '/tests/' . $test['file']) ?></loc>
        <lastmod><?= $lastmod ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
<?php endforeach; ?>
</urlset>
