<?php
include 'koneksi.php';

// Validasi: Cek apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // --- QUERY AMAN (SECURE) ---
    // Kita mengambil data spesifik berdasarkan ID
    $query = "SELECT * FROM absensi_ukri WHERE id = ?";
    
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); // "i" artinya integer
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    // Jika ID diketik ngawur di URL dan data tidak ditemukan
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!');window.location='index.php';</script>";
        exit();
    }
} else {
    // Jika user membuka detail.php tanpa membawa ID
    echo "<script>alert('Silakan pilih data terlebih dahulu.');window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi - <?php echo $data['nama_mahasiswa']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white py-8 px-4 min-h-screen">
    <div class="max-w-4xl mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-white">Detail Mahasiswa</h1>
        <hr class="border-gray-700 mb-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Info Mahasiswa (Kiri) -->
            <div class="flex flex-col justify-center space-y-4">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">Nama: <?php echo htmlspecialchars($data['nama_mahasiswa']); ?></h2>
                    <p class="text-orange-400 text-xl font-semibold">NPM <?php echo htmlspecialchars($data['npm']); ?></p>
                </div>

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <p class="mb-3"><strong class="text-blue-400">ID:</strong> <span class="text-gray-300"><?php echo $data['id']; ?></span></p>
                    <p class="mb-3"><strong class="text-blue-400">Kelas:</strong> <span class="text-gray-300"><?php echo htmlspecialchars($data['kelas']); ?></span></p>
                    <p class="mb-3"><strong class="text-blue-400">Status Kehadiran:</strong> <span class="text-green-400 font-semibold"><?php echo htmlspecialchars($data['status_kehadiran']); ?></span></p>
                </div>
                
                <div>
                    <p class="text-gray-300">
                        <strong class="text-blue-400">Informasi:</strong><br>
                        Mahasiswa ini telah tercatat dalam sistem absensi UKRI dengan status kehadiran <strong><?php echo htmlspecialchars($data['status_kehadiran']); ?></strong>. 
                        Bukti foto telah disimpan sebagai dokumentasi resmi kehadiran di kelas <strong><?php echo htmlspecialchars($data['kelas']); ?></strong>.
                    </p>
                </div>

                <div class="flex gap-2 pt-4">
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Edit</a>
                    <a href="index.php" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">Kembali</a>
                </div>
            </div>

            <!-- Gambar Bukti Foto (Kanan) -->
            <div class="flex flex-col items-center justify-center">
                <img src="img/<?php echo htmlspecialchars($data['bukti_foto']); ?>" alt="<?php echo htmlspecialchars($data['nama_mahasiswa']); ?>" class="w-full max-w-sm h-auto object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>

</body>
</html>
