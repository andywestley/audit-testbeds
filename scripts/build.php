<?php
/**
 * Audit Testbeds Monorepo — Unified Build & Asset Synchronization Pipeline
 * 
 * Performs:
 * 1. Pure-PHP CSS & JS Minification (Zero Node.js / NPM dependencies).
 * 2. Pre-deployment synchronization of `shared/` assets into all 4 testbeds.
 * 3. Generation of minified production `.min.css` and `.min.js` bundles.
 */

declare(strict_types=1);

$startTime = microtime(true);
$rootDir = realpath(__DIR__ . '/..');

echo "========================================================\n";
echo " Audit Testbeds — Build & Asset Synchronization Pipeline\n";
echo "========================================================\n";

// Target Site Directory Mappings
$sites = [
    'accessibility' => [
        'name'            => 'Accessibility (WCAG 2.2)',
        'assets_shared'   => $rootDir . '/sites/accessibility/assets/shared',
        'includes_shared' => $rootDir . '/sites/accessibility/includes/shared',
        'local_css_dirs'  => [$rootDir . '/sites/accessibility/assets/css'],
        'local_js_dirs'   => [$rootDir . '/sites/accessibility/assets/js'],
    ],
    'content' => [
        'name'            => 'Content Quality',
        'assets_shared'   => $rootDir . '/sites/content/assets/shared',
        'includes_shared' => $rootDir . '/sites/content/includes/shared',
        'local_css_dirs'  => [$rootDir . '/sites/content/assets/css'],
        'local_js_dirs'   => [$rootDir . '/sites/content/assets/js'],
    ],
    'coga' => [
        'name'            => 'Cognitive (COGA)',
        'assets_shared'   => $rootDir . '/sites/coga/public/shared',
        'includes_shared' => $rootDir . '/sites/coga/public/includes/shared',
        'local_css_dirs'  => [$rootDir . '/sites/coga/public/css'],
        'local_js_dirs'   => [$rootDir . '/sites/coga/public/js'],
    ],
    'ux' => [
        'name'            => 'UX & Usability',
        'assets_shared'   => $rootDir . '/sites/ux/public/assets/shared',
        'includes_shared' => $rootDir . '/sites/ux/public/includes/shared',
        'local_css_dirs'  => [$rootDir . '/sites/ux/public/assets/css'],
        'local_js_dirs'   => [$rootDir . '/sites/ux/public/assets/js'],
    ],
];

/**
 * Lightweight pure-PHP CSS Minifier
 */
function minify_css(string $css): string {
    // Remove comments
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    // Remove space after colons
    $css = str_replace(': ', ':', $css);
    // Remove whitespace around braces and separators
    $css = preg_replace('/\s*([\{\}\;\,])\s*/', '$1', $css);
    // Collapse remaining multiple whitespace/newlines
    $css = preg_replace('/\s+/', ' ', $css);
    // Remove trailing semicolons before closing brace
    $css = str_replace(';}', '}', $css);
    return trim($css);
}

/**
 * Lightweight pure-PHP JS Minifier
 */
function minify_js(string $js): string {
    // Preserve strings while stripping comments
    $tokens = token_get_all("<?php " . $js);
    $output = '';
    $prevToken = null;

    foreach ($tokens as $token) {
        if (is_array($token)) {
            $id = $token[0];
            $text = $token[1];

            // Ignore PHP opening tag we injected
            if ($id === T_OPEN_TAG) {
                continue;
            }

            // Strip single-line and multi-line comments
            if ($id === T_COMMENT || $id === T_DOC_COMMENT) {
                continue;
            }

            // Collapse whitespace
            if ($id === T_WHITESPACE) {
                // Keep newline if needed to avoid breaking statement boundaries
                $output .= (strpos($text, "\n") !== false) ? "\n" : ' ';
                continue;
            }

            $output .= $text;
        } else {
            $output .= $token;
        }
    }

    // Clean up empty lines and trailing spaces
    $lines = explode("\n", $output);
    $cleaned = [];
    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed !== '') {
            $cleaned[] = $trimmed;
        }
    }

    return implode("\n", $cleaned);
}

/**
 * Recursively copy a directory
 */
function copy_dir_recursive(string $src, string $dst): void {
    if (!is_dir($src)) {
        return;
    }
    if (!is_dir($dst)) {
        mkdir($dst, 0777, true);
    }

    $dir = opendir($src);
    while (($file = readdir($dir)) !== false) {
        if ($file !== '.' && $file !== '..') {
            $srcPath = $src . '/' . $file;
            $dstPath = $dst . '/' . $file;
            if (is_dir($srcPath)) {
                copy_dir_recursive($srcPath, $dstPath);
            } else {
                copy($srcPath, $dstPath);
            }
        }
    }
    closedir($dir);
}

/**
 * Process and minify directory of CSS/JS files
 */
function process_directory_assets(string $dirPath, string $type = 'css'): int {
    if (!is_dir($dirPath)) {
        return 0;
    }

    $count = 0;
    $ext = ($type === 'css') ? '.css' : '.js';
    $minExt = ($type === 'css') ? '.min.css' : '.min.js';

    $files = scandir($dirPath);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..' || str_ends_with($file, $minExt)) {
            continue;
        }

        if (str_ends_with($file, $ext)) {
            $sourceFile = $dirPath . '/' . $file;
            $baseName = substr($file, 0, -strlen($ext));
            $targetMinFile = $dirPath . '/' . $baseName . $minExt;

            $content = file_get_contents($sourceFile);
            $minified = ($type === 'css') ? minify_css($content) : minify_js($content);
            file_put_contents($targetMinFile, $minified);

            $rawSize = strlen($content);
            $minSize = strlen($minified);
            $saved = ($rawSize > 0) ? round((1 - ($minSize / $rawSize)) * 100, 1) : 0;

            echo "  ✓ Minified: {$file} -> {$baseName}{$minExt} ({$rawSize}B -> {$minSize}B, -{$saved}%)\n";
            $count++;
        }
    }
    return $count;
}

echo "\n[Step 1/3] Minifying Shared Assets...\n";
$sharedCssDir = $rootDir . '/shared/css';
$sharedJsDir  = $rootDir . '/shared/js';

$minifiedCount = 0;
$minifiedCount += process_directory_assets($sharedCssDir, 'css');
$minifiedCount += process_directory_assets($sharedJsDir, 'js');

echo "\n[Step 2/3] Minifying Site-Specific Local Assets...\n";
foreach ($sites as $key => $siteConfig) {
    echo "  -> Processing {$siteConfig['name']}...\n";
    foreach ($siteConfig['local_css_dirs'] as $cssDir) {
        $minifiedCount += process_directory_assets($cssDir, 'css');
    }
    foreach ($siteConfig['local_js_dirs'] as $jsDir) {
        $minifiedCount += process_directory_assets($jsDir, 'js');
    }
}

echo "\n[Step 3/3] Synchronizing Shared Assets & Includes into All 4 Testbeds...\n";
$sharedIncludesDir = $rootDir . '/shared/includes';
$sharedImagesDir   = $rootDir . '/shared/images';

foreach ($sites as $key => $siteConfig) {
    echo "  -> Syncing to [{$key}] ({$siteConfig['name']})...\n";

    // 1. Sync CSS
    $targetCss = $siteConfig['assets_shared'] . '/css';
    copy_dir_recursive($sharedCssDir, $targetCss);

    // 2. Sync JS
    $targetJs = $siteConfig['assets_shared'] . '/js';
    copy_dir_recursive($sharedJsDir, $targetJs);

    // 3. Sync Images (if present)
    if (is_dir($sharedImagesDir)) {
        $targetImages = $siteConfig['assets_shared'] . '/images';
        copy_dir_recursive($sharedImagesDir, $targetImages);
    }

    // 4. Sync PHP Includes
    if (is_dir($sharedIncludesDir)) {
        copy_dir_recursive($sharedIncludesDir, $siteConfig['includes_shared']);
    }
}

$elapsed = round((microtime(true) - $startTime) * 1000, 2);
echo "\n========================================================\n";
echo " Build & Sync Complete! Processed {$minifiedCount} files in {$elapsed}ms.\n";
echo " All 4 testbeds are ready for local preview or VPS deployment.\n";
echo "========================================================\n";
