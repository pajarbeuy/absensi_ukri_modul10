<?php
include 'koneksi.php';
$id = $_GET["id"];

// LANGKAH 1: Ambil nama file gambar (Select Secure)
$query_pilih = "SELECT bukti_foto FROM absensi_ukri WHERE id = ?";
$stmt_pilih = $koneksi->prepare($query_pilih);
$stmt_pilih->bind_param("i", $id);
$stmt_pilih->execute();
$result_pilih = $stmt_pilih->get_result();
$data = $result_pilih->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan.");
}

// Hapus fisik gambar
if ($data['bukti_foto'] != "" && file_exists("img/".$data['bukti_foto'])) {
    unlink("img/".$data['bukti_foto']);
}
$stmt_pilih->close();

// LANGKAH 2: Hapus data dari database (Delete Secure)
$query_hapus = "DELETE FROM absensi_ukri WHERE id = ?";
$stmt_hapus = $koneksi->prepare($query_hapus);
$stmt_hapus->bind_param("i", $id);

if($stmt_hapus->execute()) {
    echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
} else {
    die("Gagal menghapus data: " . $stmt_hapus->error);
}

$stmt_hapus->close();
?>
