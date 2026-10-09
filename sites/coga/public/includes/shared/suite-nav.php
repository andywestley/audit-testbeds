<?php
/**
 * Shared Suite Navigation Switcher
 * Provides a unified header dropdown to jump across all 4 benchmark testbed sites.
 *
 * @param string $currentTestbed 'accessibility' | 'content' | 'coga' | 'ux'
 * @param string $theme 'dark' | 'light'
 */
if (!function_exists('render_suite_switcher')) {
    function render_suite_switcher($currentTestbed = '', $theme = 'dark') {
        $testbeds = [
            'accessibility' => [
                'name' => 'Accessibility',
                'url'  => 'https://inaccessible.andrewwestley.co.uk/',
                'icon' => 'bi-universal-access',
                'badge' => 'WCAG 2.2',
                'color' => 'primary'
            ],
            'content' => [
                'name' => 'Content Quality',
                'url'  => 'https://content-testbed.andrewwestley.co.uk/',
                'icon' => 'bi-file-earmark-text-fill',
                'badge' => 'Readability',
                'color' => 'warning'
            ],
            'coga' => [
                'name' => 'Cognitive (COGA)',
                'url'  => 'https://coga.andrewwestley.co.uk/',
                'icon' => 'bi-person-fill-check',
                'badge' => 'Cognitive',
                'color' => 'info'
            ],
            'ux' => [
                'name' => 'UX & Usability',
                'url'  => 'https://uxusability-testbed.andrewwestley.co.uk/',
                'icon' => 'bi-speedometer2',
                'badge' => 'Heuristics',
                'color' => 'danger'
            ]
        ];

        $menuClass = ($theme === 'dark') ? 'dropdown-menu-dark' : '';
        ?>
        <li class="nav-item dropdown testbed-suite-dropdown ms-lg-2">
            <a class="nav-link dropdown-toggle btn btn-sm btn-outline-secondary px-3 py-1 text-light d-flex align-items-center gap-1" href="#" id="suiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill text-warning"></i>
                <span>Testbed Suite</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow <?= $menuClass ?>" aria-labelledby="suiteDropdown">
                <li class="dropdown-header text-uppercase small fw-bold text-secondary">Switch Testbed Site</li>
                <?php foreach ($testbeds as $key => $tb): ?>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center py-2 <?= ($key === $currentTestbed) ? 'active fw-bold' : '' ?>" href="<?= htmlspecialchars($tb['url']) ?>">
                            <span>
                                <i class="bi <?= $tb['icon'] ?> text-<?= $tb['color'] ?> me-2"></i>
                                <?= htmlspecialchars($tb['name']) ?>
                            </span>
                            <span class="badge bg-<?= $tb['color'] ?>-subtle text-<?= $tb['color'] ?> ms-2"><?= htmlspecialchars($tb['badge']) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <?php
    }
}
