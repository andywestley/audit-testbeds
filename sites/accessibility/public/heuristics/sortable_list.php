<?php
$pageTitle = 'Mouse-Only Sortable List - Accessibility Journey';
$basePath = '../';
include '../includes/header.php';
?>

<h1>Mouse-Only Sortable List</h1>
<p class="lead">Drag-and-drop interfaces that ignore the keyboard.</p>

<div class="row">
    <div class="col-md-8">
        <p>This list allows users to reorder items by dragging and dropping them with a mouse. However, it is completely inoperable for keyboard-only users.</p>
        
        <p><strong>Try it:</strong></p>
        <ul>
            <li><strong>Mouse users:</strong> Drag the items to reorder them.</li>
            <li><strong>Keyboard users:</strong> Try to reorder the list using Tab and Arrow keys. You can't.</li>
        </ul>

        <!-- VIOLATION: WCAG 2.1.1 Keyboard -->
        <ul id="sortableList" class="list-group mb-5">
            <li class="list-group-item" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)">Item 1: Priority Task</li>
            <li class="list-group-item" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)">Item 2: Secondary Task</li>
            <li class="list-group-item" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)">Item 3: Optional Task</li>
            <li class="list-group-item" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)">Item 4: Backlog Task</li>
        </ul>

        <a href="index.php" class="btn btn-secondary">Back to Journeys</a>
    </div>
</div>

<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.innerHTML);
        ev.dataTransfer.setData("originId", Array.from(ev.target.parentNode.children).indexOf(ev.target));
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        // Simple swap logic for demo purposes (clunky but functional enough to show the mouse interaction)
        if (ev.target.tagName === 'LI') {
            let temp = ev.target.innerHTML;
            ev.target.innerHTML = data;
            
            // Find the original item and swap text (imperfect, but shows the point)
            const items = document.querySelectorAll('#sortableList li');
            items.forEach(item => {
                if (item !== ev.target && item.innerHTML === data) {
                   item.innerHTML = temp;
                }
            });
        }
    }
</script>

<?php include '../includes/footer.php'; ?>
