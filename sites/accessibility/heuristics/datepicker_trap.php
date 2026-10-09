<?php
$pageTitle = 'Complex Date Picker - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Complex Date Picker</h1>
<p class="lead">A custom calendar widget that traps keyboard focus.</p>

<div class="row">
    <div class="col-md-8">
        <p>This date picker is implemented as a table inside a modal. It allows arrow key navigation, but it doesn't allow standard tab navigation to exit the grid.</p>
        
        <p><strong>The Trap:</strong></p>
        <ul>
            <li>Once you TAB into the calendar grid, you cannot TAB out.</li>
            <li>Pressing ESC might not close it.</li>
            <li>Screen readers might read the entire table row for every cell, causing verbosity issues.</li>
        </ul>

        <div class="mb-4">
            <label for="dateInput" class="form-label">Select Date:</label>
            <div class="input-group">
                <input type="text" id="dateInput" class="form-control" placeholder="YYYY-MM-DD">
                <button class="btn btn-primary" onclick="openDatePicker()">Choose</button>
            </div>
        </div>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<!-- VIOLATION: WCAG 2.1.2 No Keyboard Trap -->
<div id="dateModal" style="display:none; position: fixed; top: 100px; left: 50%; transform: translateX(-50%); background: white; border: 1px solid #ccc; padding: 10px; z-index: 2000; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
    <div class="d-flex justify-content-between mb-2">
        <span class="fw-bold">October 2023</span>
        <button onclick="document.getElementById('dateModal').style.display='none'">X</button>
    </div>
    <table class="table table-bordered table-sm text-center">
        <thead>
            <tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>
        </thead>
        <tbody id="calendarBody">
            <!-- Populated by JS -->
        </tbody>
    </table>
    <div class="text-center">
        <button class="btn btn-sm btn-light">Previous</button>
        <button class="btn btn-sm btn-light">Next</button>
    </div>
</div>

<script>
    function openDatePicker() {
        document.getElementById('dateModal').style.display = 'block';
        
        // Populate dummy calendar
        const tbody = document.getElementById('calendarBody');
        tbody.innerHTML = '';
        let day = 1;
        for(let i=0; i<5; i++) {
            const tr = document.createElement('tr');
            for(let j=0; j<7; j++) {
                const td = document.createElement('td');
                if(day <= 31) {
                    // VIOLATION: Simple div/button that doesn't manage focus properly
                    td.innerHTML = `<button class="btn btn-link btn-sm p-0 trap-target" onclick="selectDate(${day})">${day}</button>`;
                    day++;
                }
                tr.appendChild(td);
            }
            tbody.appendChild(tr);
        }
        
        // Force focus into the trap
        setTimeout(() => document.querySelector('.trap-target').focus(), 100);
    }
    
    function selectDate(day) {
        document.getElementById('dateInput').value = `2023-10-${day.toString().padStart(2, '0')}`;
        document.getElementById('dateModal').style.display = 'none';
        document.getElementById('dateInput').focus();
    }

    // VIOLATION: Trap Logic - Listen for tab and prevent leaving
    document.getElementById('dateModal').addEventListener('keydown', function(e) {
        if(e.key === 'Tab') {
            e.preventDefault();
            // Just circle focus inside the first few days for maximum frustration
            const buttons = document.querySelectorAll('.trap-target');
            // Simplified loop for demo
            const current = document.activeElement;
            // ... logic that keeps focus circular
        }
    });
</script>

<?php include '../includes/footer.php'; ?>
