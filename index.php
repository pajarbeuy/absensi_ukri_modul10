<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Absensi Ukri</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white py-8 px-4 min-h-screen">
    <h1 class="text-2xl font-bold mb-4 text-white text-center">Absensi Ukri</h1>
   
    <br><br>

    <!-- Form Pencarian -->
    <form method="GET" class="mb-4 w-full max-w-md">
        <div class="flex gap-2">
            <input type="text" name="cari" placeholder="Cari nama atau NPM..." value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>" class="flex-1 px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">Cari</button>
            <a href="index.php" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">Reset</a>
        </div>
    </form>
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" href="tambah.php">+ Tambah Absensi</a>
    <br><br>

    <table>
        <thead class="text-white text-md items-center">
            <tr>
                <th class="text-center bg-gray-900">No</th>
                <th class="text-center bg-gray-900">Nama Mahasiswa</th>
                <th class="text-center bg-gray-900">NPM</th>
                <th class="text-center bg-gray-900">Kelas</th>
                <th class="text-center bg-gray-900">Status Kehadiran</th>
                <th class="text-center bg-gray-900 ">Bukti</th>
                <th class="text-center bg-gray-900">Aksi</th>

            </tr>
        </thead>
        <tbody class="text-center text-white text-md ">
            <?php
            $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
             if ($cari != '') {
                $query = "SELECT * FROM absensi_ukri WHERE nama_mahasiswa LIKE '%$cari%' OR npm LIKE '%$cari%' ORDER BY id ASC";
            } else {
                $query = "SELECT * FROM absensi_ukri ORDER BY id ASC";
            }
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <div class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700 flex flex-col items-center">
                <td><?php echo $no; ?></td>
                <td><?php echo htmlspecialchars($row['nama_mahasiswa']); ?></td>
                <td><?php echo htmlspecialchars($row['npm']); ?></td>
                <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                <td><?php echo htmlspecialchars($row['status_kehadiran']); ?></td>
                <td class="text-center">
                    <img src="img/<?php echo $row['bukti_foto']; ?>" class="mx-auto w-20 h-20 object-cover rounded-md" alt="Bukti Foto">
                </td>
                <td>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" href="detail.php?id=<?php echo $row['id']; ?>">Detail</a> | 
                    
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-4" href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr></div>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
