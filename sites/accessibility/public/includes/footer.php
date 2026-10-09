    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4 bg-dark text-white-50 border-top border-secondary">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start mb-3 mb-md-0">
                    <p class="mb-0 small">&copy; <?php echo date('Y'); ?> <strong>Accessibility Benchmark Testbed</strong>. Built with PHP, HTML5 &amp; Bootstrap 5.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-inline-flex gap-3 small">
                        <a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php" class="text-white-50 text-decoration-none hover-white">WCAG Matrix</a>
                        <a href="<?php echo isset($basePath) ? $basePath : ''; ?>journeys/index.php" class="text-white-50 text-decoration-none hover-white">User Journeys</a>
                        <a href="<?php echo isset($basePath) ? $basePath : ''; ?>cookie_policy.php" class="text-white-50 text-decoration-none hover-white">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo isset($basePath) ? $basePath : ''; ?>assets/js/main.js"></script>
</body>
</html>