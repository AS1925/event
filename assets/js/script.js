document.addEventListener('DOMContentLoaded', function () {
    const checklistItems = Array.from(document.querySelectorAll('.todo-item input[type="checkbox"]'));
    const progressBar = document.getElementById('todo-progress');
    const statusText = document.getElementById('todo-status');

    if (!checklistItems.length || !progressBar || !statusText) {
        return;
    }

    function updateChecklist() {
        const completed = checklistItems.filter(item => item.checked).length;
        const total = checklistItems.length;
        const percent = Math.round((completed / total) * 100);

        checklistItems.forEach(item => {
            item.closest('.todo-item').classList.toggle('completed', item.checked);
        });

        progressBar.style.width = percent + '%';
        statusText.textContent = `Progress: ${completed} of ${total} completed`;
    }

    checklistItems.forEach(item => item.addEventListener('change', updateChecklist));
    updateChecklist();
});