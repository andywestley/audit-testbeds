<?php
/**
 * Monorepo PHP Syntax Linter
 * Scans and validates all PHP files across all 4 testbed sites.
 */

$rootDir = dirname(__DIR__);
$sitesDir = $rootDir . '/sites';

echo "=== Linting all PHP files in audit-testbeds ===\n";

$errorCount = 0;
$fileCount = 0;

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sitesDir, RecursiveDirectoryIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $fileCount++;
        $filePath = $file->getRealPath();
        $output = [];
        $returnVar = 0;
        exec("php -l " . escapeshellarg($filePath), $output, $returnVar);

        if ($returnVar !== 0) {
            $errorCount++;
            echo "❌ [ERROR] " . $filePath . "\n";
            echo "   " . implode("\n   ", $output) . "\n";
        }
    }
}

echo "--------------------------------------------------\n";
echo "Linted {$fileCount} PHP files across all 4 sites.\n";

if ($errorCount === 0) {
    echo "✅ All PHP files passed syntax check with 0 errors!\n";
    exit(0);
} else {
    echo "❌ Found {$errorCount} files with syntax errors.\n";
    exit(1);
}
