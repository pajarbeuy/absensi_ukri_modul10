<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // --- MENGAMBIL DATA DENGAN AMAN ---
    $query = "SELECT * FROM absensi_ukri WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); // "i" karena ID adalah Integer
    $stmt->execute();
    
    // Mengambil hasil query
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white py-8 px-4 min-h-screen">
    <div class="max-w-md mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-white">Edit Absensi</h1>
        
        <form method="POST" action="proses_edit.php" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <div>
                <label class="block text-white font-semibold mb-2">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" value="<?php echo htmlspecialchars($data['nama_mahasiswa']); ?>" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">NPM</label>
                <input type="number" name="npm" value="<?php echo htmlspecialchars($data['npm']); ?>" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">Kelas</label>
                <input type="text" name="kelas" value="<?php echo htmlspecialchars($data['kelas']); ?>" required class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-3">Status Kehadiran</label>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Hadir" <?php if($data['status_kehadiran'] == 'Hadir') echo 'checked'; ?> required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Hadir</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Sakit" <?php if($data['status_kehadiran'] == 'Sakit') echo 'checked'; ?> required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Sakit</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="status_kehadiran" value="Izin" <?php if($data['status_kehadiran'] == 'Izin') echo 'checked'; ?> required class="w-4 h-4 cursor-pointer">
                        <label class="ml-2 text-white cursor-pointer">Izin</label>
                    </div>
                </div>
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">Bukti Foto Saat Ini</label>
                <img src="img/<?php echo htmlspecialchars($data['bukti_foto']); ?>" class="w-32 h-32 object-cover rounded-md mb-4">
            </div>
            
            <div>
                <label class="block text-white font-semibold mb-2">Ganti Gambar (Opsional)</label>
                <input type="file" name="bukti_foto" class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500 file:bg-blue-500 file:text-white file:px-4 file:py-2 file:rounded file:border-0 file:cursor-pointer">
            </div>
            
            <div class="flex gap-2 pt-4">
                <button type="submit" class="flex-1 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Absensi</button>
                <a href="index.php" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
