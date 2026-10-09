document.addEventListener('DOMContentLoaded', () => {
  // Setup Code Copy Buttons
  document.querySelectorAll('.code-copy-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-target');
      const codeEl = document.getElementById(targetId);
      if (codeEl) {
        navigator.clipboard.writeText(codeEl.innerText).then(() => {
          const originalText = btn.innerHTML;
          btn.innerHTML = '<i class="bi bi-check2"></i> Copied!';
          btn.classList.replace('btn-outline-light', 'btn-success');
          setTimeout(() => {
            btn.innerHTML = originalText;
            btn.classList.replace('btn-success', 'btn-outline-light');
          }, 2000);
        });
      }
    });
  });

  // Setup Index Filtering
  const searchInput = document.getElementById('searchRules');
  const pillarFilter = document.getElementById('filterPillar');
  const tableRows = document.querySelectorAll('#matrixTable tbody tr');

  function filterTable() {
    const query = (searchInput?.value || '').toLowerCase().trim();
    const selectedPillar = pillarFilter?.value || 'all';

    tableRows.forEach(row => {
      const text = row.innerText.toLowerCase();
      const pillar = row.getAttribute('data-pillar');
      const matchesSearch = text.includes(query);
      const matchesPillar = selectedPillar === 'all' || pillar === selectedPillar;

      row.style.display = (matchesSearch && matchesPillar) ? '' : 'none';
    });
  }

  searchInput?.addEventListener('input', filterTable);
  pillarFilter?.addEventListener('change', filterTable);
});