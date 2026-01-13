{{-- COMPONENT: Confirm Delete Modal --}}
<div id="confirmDeleteModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60">
    <div id="confirmDeleteBox"
         class="w-full max-w-md rounded-xl bg-gray-800 p-6 shadow-lg outline outline-1 -outline-offset-1 outline-white/10
                opacity-0 scale-95 transition duration-200 ease-out">
        <h3 class="text-lg font-bold text-white">Konfirmasi Hapus</h3>
        <p class="mt-2 text-sm text-gray-300">
            Yakin mau hapus data ini? Aksi ini tidak bisa dibatalkan.
        </p>

        <div class="mt-6 flex justify-end gap-2">
            <button type="button"
                    onclick="closeConfirmDelete()"
                    class="rounded bg-gray-600 px-4 py-2 text-sm hover:bg-gray-700">
                Batal
            </button>

            <form id="confirmDeleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded bg-red-600 px-4 py-2 text-sm hover:bg-red-700">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
