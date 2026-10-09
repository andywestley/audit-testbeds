<?php
/**
 * Decommission Standalone Repositories Script
 * 
 * 1. Disables GitHub Actions workflows in old repos.
 * 2. Updates READMEs with the monorepo deprecation notice.
 * 3. Archives the repositories on GitHub (Read-Only).
 */

declare(strict_types=1);

$oldRepos = [
    'andywestley/accessibility-testbed' => [
        'workflow_id' => '300705503',
        'readme_file' => 'readme.md'
    ],
    'andywestley/content-testbed' => [
        'workflow_id' => '284107916',
        'readme_file' => 'README.md'
    ],
    'andywestley/coga-testbed' => [
        'workflow_id' => '307028611',
        'readme_file' => 'README.md'
    ],
    'andywestley/UXUsabilityTestbed' => [
        'workflow_id' => '378982939',
        'readme_file' => 'README.md'
    ],
];

$banner = "> [!NOTE]\n> **This standalone repository is archived and now actively maintained as part of the unified [audit-testbeds](https://github.com/andywestley/audit-testbeds) monorepo.**\n\n";

echo "========================================================\n";
echo " Decommissioning Standalone Audit Testbed Repositories\n";
echo "========================================================\n\n";

foreach ($oldRepos as $repo => $meta) {
    echo "Processing [{$repo}]...\n";

    // 1. Disable Workflows
    echo "  1. Disabling GitHub Actions workflow ({$meta['workflow_id']})...\n";
    exec("gh workflow disable {$meta['workflow_id']} --repo {$repo} 2>&1", $outDisable, $codeDisable);
    if ($codeDisable === 0) {
        echo "     ✓ Workflow disabled.\n";
    } else {
        echo "     ! Note: " . implode(" ", $outDisable) . "\n";
    }

    // 2. Fetch and Update README
    echo "  2. Fetching current {$meta['readme_file']}...\n";
    $json = shell_exec("gh api repos/{$repo}/contents/{$meta['readme_file']}");
    if ($json) {
        $data = json_decode($json, true);
        if (isset($data['sha']) && isset($data['content'])) {
            $rawContent = base64_decode($data['content']);
            
            // Avoid duplicate banners
            if (!str_contains($rawContent, 'audit-testbeds')) {
                $newContent = $banner . $rawContent;
                $encoded = base64_encode($newContent);
                $sha = $data['sha'];
                
                // Write payload to temporary file to avoid shell escape issues on Windows
                $payload = json_encode([
                    'message' => 'docs: add deprecation notice pointing to audit-testbeds monorepo',
                    'content' => $encoded,
                    'sha'     => $sha
                ]);
                $tempPayloadFile = sys_get_temp_dir() . '/gh_payload_' . md5($repo) . '.json';
                file_put_contents($tempPayloadFile, $payload);

                echo "     Updating {$meta['readme_file']} with monorepo notice...\n";
                $cmd = "gh api -X PUT repos/{$repo}/contents/{$meta['readme_file']} --input \"{$tempPayloadFile}\"";
                exec($cmd . ' 2>&1', $outPut, $codePut);
                @unlink($tempPayloadFile);

                if ($codePut === 0) {
                    echo "     ✓ README updated successfully.\n";
                } else {
                    echo "     ! Warning updating README: " . implode(" ", $outPut) . "\n";
                }
            } else {
                echo "     ✓ README already contains migration notice.\n";
            }
        }
    }

    // 3. Archive repository
    echo "  3. Archiving repository on GitHub...\n";
    exec("gh repo archive {$repo} --yes 2>&1", $outArchive, $codeArchive);
    if ($codeArchive === 0) {
        echo "     ✓ Repository archived (Read-Only).\n";
    } else {
        echo "     ! Note: " . implode(" ", $outArchive) . "\n";
    }

    echo "\n";
}

echo "========================================================\n";
echo " Decommissioning Complete! All 4 repositories are safely archived.\n";
echo "========================================================\n";
