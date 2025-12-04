<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white py-8 px-4 min-h-screen">
    <div class="max-w-md mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-white">Tambah Absensi</h1>
        
        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-white font-semibold mb-2">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">NPM</label>
                <input type="number" name="npm" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">Kelas</label>
                <input type="text" name="kelas" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">Bukti Foto</label>
                <input type="file" name="bukti_foto" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500 file:bg-blue-500 file:text-white file:px-4 file:py-2 file:rounded file:border-0 file:cursor-pointer">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-3">Status Kehadiran</label>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Hadir" required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Hadir</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Sakit" required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Sakit</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Izin" required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Izin</label>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-2 pt-4">
                <button type="submit" class="flex-1 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan Absensi</button>
                <a href="index.php" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
