<!-- ================== DASHBOARD BARANG ================== -->
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Barang</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="h-full text-white">

<div class="min-h-full">
    <!-- ===== NAVBAR ===== -->
    @include('components.navbar')

    <!-- ===== HEADER ===== -->
    <header class="relative bg-gray-800 after:absolute after:inset-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6">
            <h1 class="text-3xl font-bold">Dashboard Barang</h1>
        </div>
    </header>

    <!-- ===== MAIN ===== -->
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6">

            <!-- ===== BUTTON CREATE ===== -->
            <button
                onclick="openCreate()"
                class="mb-4 rounded bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-700">
                + Tambah Barang
            </button>

            <!-- ================== TABLE ================== -->
            <div class="overflow-hidden rounded-lg border border-white/10">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-center">Jumlah</th>
                            <th class="px-4 py-3 text-center">Kategori</th>
                            <th class="px-4 py-3 text-center">Harga</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10 bg-gray-900">
                        @foreach ($barangs as $barang)
                        <tr>
                            <td class="px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="px-4 py-2 text-center">{{ $barang->jumlah_barang }}</td>
                            <td class="px-4 py-2 text-center">{{ $barang->kategori_barang }}</td>
                            <td class="px-4 py-2 text-center">{{ $barang->harga_barang }}</td>
                            <td class="px-4 py-2 flex justify-center gap-2">

                                <!-- EDIT -->
                                <button
                                    {{-- onclick="openEdit(
                                        {{ $barang->id }},
                                        '{{ $barang->nama_barang }}',
                                        '{{ $barang->jumlah_barang }}',
                                        '{{ $barang->kategori_barang }}',
                                        '{{ $barang->harga_barang }}'
                                    )" --}}
                                    data-id="{{ $barang->id }}"
                                    data-nama="{{ $barang->nama_barang }}"
                                    data-jumlah="{{ $barang->jumlah_barang }}"
                                    data-kategori="{{ $barang->kategori_barang }}"
                                    data-harga="{{ $barang->harga_barang }}"
                                    onclick="openEdit(this)"
                                    class="rounded bg-yellow-500 px-3 py-1 text-xs hover:bg-yellow-600">
                                    Edit
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('barangs.destroy', $barang) }}" method="POST" 
                                    onsubmit="return confirm('Hapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded bg-red-600 px-3 py-1 text-xs hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

<!-- ================== MODAL CREATE ================== -->
<div id="modalCreate" class="fixed inset-0 hidden bg-black/60 flex items-center justify-center">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Tambah Barang</h2>

        <form action="{{ url('/barangs') }}" method="POST" class="space-y-3">
            @csrf
            <input name="nama_barang" placeholder="Nama Barang" class="w-full rounded bg-gray-900 px-3 py-2">
            <input name="jumlah_barang" placeholder="Jumlah" class="w-full rounded bg-gray-900 px-3 py-2">
            <input name="kategori_barang" placeholder="Kategori" class="w-full rounded bg-gray-900 px-3 py-2">
            <input name="harga_barang" placeholder="Harga" class="w-full rounded bg-gray-900 px-3 py-2">

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeCreate()"
                    class="rounded bg-gray-600 px-4 py-2 text-sm">Batal</button>
                <button class="rounded bg-indigo-600 px-4 py-2 text-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ================== MODAL EDIT ================== -->
<div id="modalEdit" class="fixed inset-0 hidden bg-black/60 flex items-center justify-center">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Edit Barang</h2>

        <form id="formEdit" method="POST" class="space-y-3">
            @csrf
            @method('PUT')

            <input id="e_nama" name="nama_barang" class="w-full rounded bg-gray-900 px-3 py-2">
            <input id="e_jumlah" name="jumlah_barang" class="w-full rounded bg-gray-900 px-3 py-2">
            <input id="e_kategori" name="kategori_barang" class="w-full rounded bg-gray-900 px-3 py-2">
            <input id="e_harga" name="harga_barang" class="w-full rounded bg-gray-900 px-3 py-2">

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeEdit()"
                    class="rounded bg-gray-600 px-4 py-2 text-sm">Batal</button>
                <button class="rounded bg-yellow-500 px-4 py-2 text-sm">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- ================== SCRIPT ================== -->
<script>
    function openCreate() {
        document.getElementById('modalCreate').classList.remove('hidden');
    }
    function closeCreate() {
        document.getElementById('modalCreate').classList.add('hidden');
    }

    // function openEdit(id, nama, jumlah, kategori, harga) {
    //     document.getElementById('modalEdit').classList.remove('hidden');
    //     document.getElementById('formEdit').action = '/barangs/' + id;

    //     document.getElementById('e_nama').value = nama;
    //     document.getElementById('e_jumlah').value = jumlah;
    //     document.getElementById('e_kategori').value = kategori;
    //     document.getElementById('e_harga').value = harga;
    // }
    // function closeEdit() {
    //     document.getElementById('modalEdit').classList.add('hidden');
    // }
    function openEdit(button) {
        const id       = button.dataset.id;
        const nama     = button.dataset.nama;
        const jumlah   = button.dataset.jumlah;
        const kategori = button.dataset.kategori;
        const harga    = button.dataset.harga;

        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('formEdit').action = `/barangs/${id}`;

        document.getElementById('e_nama').value     = nama;
        document.getElementById('e_jumlah').value   = jumlah;
        document.getElementById('e_kategori').value = kategori;
        document.getElementById('e_harga').value    = harga;
    }

    function closeEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
</script>

</body>
</html>