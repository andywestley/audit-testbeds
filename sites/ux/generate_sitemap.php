<?php
/**
 * CLI Sitemap Generator for UX Usability Testbed
 * Automatically parses includes/data.php to generate sitemap.xml and public/sitemap.xml
 */

require_once __DIR__ . '/includes/data.php';

$domain = 'https://uxusability-testbed.andrewwestley.co.uk';
$lastmod = date('Y-m-d');

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');

// Homepage
$url = $xml->addChild('url');
$url->addChild('loc', $domain . '/');
$url->addChild('lastmod', $lastmod);
$url->addChild('changefreq', 'weekly');
$url->addChild('priority', '1.0');

$url = $xml->addChild('url');
$url->addChild('loc', $domain . '/index.php');
$url->addChild('lastmod', $lastmod);
$url->addChild('changefreq', 'weekly');
$url->addChild('priority', '1.0');

// Cookie Policy
$url = $xml->addChild('url');
$url->addChild('loc', $domain . '/cookie_policy.php');
$url->addChild('lastmod', $lastmod);
$url->addChild('changefreq', 'monthly');
$url->addChild('priority', '0.5');

// Long Page scroll escape failure demo
$url = $xml->addChild('url');
$url->addChild('loc', $domain . '/long-page.php');
$url->addChild('lastmod', $lastmod);
$url->addChild('changefreq', 'monthly');
$url->addChild('priority', '0.6');

// All 11 dedicated test pages
foreach ($tests as $slug => $test) {
    $url = $xml->addChild('url');
    $url->addChild('loc', $domain . '/tests/' . $test['file']);
    $url->addChild('lastmod', $lastmod);
    $url->addChild('changefreq', 'monthly');
    $url->addChild('priority', '0.8');
}

$dom = new DOMDocument('1.0', 'UTF-8');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());

$xmlContent = $dom->saveXML();

// Save to root
file_put_contents(__DIR__ . '/sitemap.xml', $xmlContent);

echo "Successfully generated sitemap.xml with " . (count($tests) + 3) . " URLs!\n";
