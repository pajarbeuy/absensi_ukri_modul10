<?php
include 'koneksi.php';

$nama_mahasiswa = $_POST['nama_mahasiswa'];
$npm       = $_POST['npm'];
$gambar      = $_FILES['bukti_foto']['name'];
$kelas = $_POST['kelas'];
$status_kehadiran = $_POST['status_kehadiran'];

if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_bukti_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
        move_uploaded_file($file_tmp, 'img/'.$nama_bukti_baru);
        
        // --- BAGIAN SECURE CODING (BIND PARAM) ---
        
        // 1. Siapkan query dengan tanda tanya (?)
        $query = "INSERT INTO absensi_ukri (nama_mahasiswa, npm, kelas, status_kehadiran, bukti_foto) VALUES (?, ?, ?, ?, ?)";
        
        // 2. Prepare statement
        $stmt = $koneksi->prepare($query);
        
        // 3. Bind parameter
        // "sis" artinya: String (nama), Integer (harga), String (gambar)
        $stmt->bind_param("sisss", $nama_mahasiswa,  $npm, $kelas, $status_kehadiran, $nama_bukti_baru);
        
        // 4. Eksekusi
        if($stmt->execute()){
            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        } else {
            die ("Query gagal dijalankan: " . $stmt->error);
        }
        
        // 5. Tutup statement
        $stmt->close();
        
    } else {     
        echo "<script>alert('Ekstensi gambar salah.');window.location='tambah.php';</script>";
    }
}
?>
