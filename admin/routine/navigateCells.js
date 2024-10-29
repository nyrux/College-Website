document.addEventListener('keydown', function(event) {
    const focusedElement = document.activeElement;

    if (focusedElement.tagName === 'INPUT') {
        const currentCell = focusedElement.closest('td');
        const row = currentCell.parentElement;
        const table = row.closest('table');
        const cells = Array.from(table.querySelectorAll('td input'));

        const index = cells.indexOf(focusedElement);

        if (event.key === 'ArrowRight' && index + 1 < cells.length) {
            cells[index + 1].focus();
            event.preventDefault();
        } else if (event.key === 'ArrowLeft' && index - 1 >= 0) {
            cells[index - 1].focus();
            event.preventDefault();
        } else if (event.key === 'ArrowDown' && row.nextElementSibling) {
            const nextRow = row.nextElementSibling;
            const nextCell = nextRow.children[currentCell.cellIndex].querySelector('input');
            nextCell.focus();
            event.preventDefault();
        } else if (event.key === 'ArrowUp' && row.previousElementSibling) {
            const prevRow = row.previousElementSibling;
            const prevCell = prevRow.children[currentCell.cellIndex].querySelector('input');
            prevCell.focus();
            event.preventDefault();
        }
    }
});
