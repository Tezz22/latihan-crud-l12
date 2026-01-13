<script>
    function openConfirmDelete(actionUrl) {
        const modal = document.getElementById('confirmDeleteModal');
        const box = document.getElementById('confirmDeleteBox');
        const form = document.getElementById('confirmDeleteForm');

        form.action = actionUrl;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // reset animation state
        box.classList.remove('opacity-0', 'scale-95');
        box.classList.add('opacity-100', 'scale-100');
    }

    function closeConfirmDelete() {
        const modal = document.getElementById('confirmDeleteModal');
        const box = document.getElementById('confirmDeleteBox');

        // animate out
        box.classList.remove('opacity-100', 'scale-100');
        box.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 200);
    }

    // klik di luar box buat nutup
    document.addEventListener('click', function (e) {
        const modal = document.getElementById('confirmDeleteModal');
        const box = document.getElementById('confirmDeleteBox');

        if (!modal || modal.classList.contains('hidden')) return;

        if (e.target === modal) closeConfirmDelete();
    });
</script>
