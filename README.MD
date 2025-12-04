# Sistem Absensi UKRI

Sistem informasi untuk mengelola data absensi mahasiswa Universitas Kebangsaan Republik Indonesia (UKRI) dengan antarmuka yang user-friendly dan fitur-fitur lengkap.

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Struktur Folder](#struktur-folder)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)

## ✨ Fitur Utama

- **Melihat Data Absensi**: Tampilkan semua data absensi mahasiswa dalam bentuk tabel
- **Pencarian**: Cari data mahasiswa berdasarkan nama atau NPM
- **Tambah Absensi**: Tambahkan data absensi baru dengan foto bukti
- **Lihat Detail**: Lihat informasi lengkap mahasiswa termasuk bukti foto
- **Edit Data**: Ubah data absensi yang sudah ada
- **Hapus Data**: Hapus data absensi yang tidak diperlukan
- **Status Kehadiran**: Pilihan status (Hadir, Sakit, Izin)
- **Dokumentasi Foto**: Upload bukti foto untuk setiap absensi

## 💻 Persyaratan Sistem

- **PHP** versi 7.4 atau lebih tinggi
- **MySQL** atau MariaDB
- **Web Server** (Apache, Nginx, atau Laragon)
- **Browser** modern (Chrome, Firefox, Safari, Edge)

## 📦 Instalasi

### 1. Clone atau Download Project

```bash
git clone <repository-url>
cd absensi_ukri
```

### 2. Setup Database

- Buat database baru di MySQL:

```sql
CREATE DATABASE absensi_ukri;
USE absensi_ukri;

CREATE TABLE absensi_ukri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mahasiswa VARCHAR(100) NOT NULL,
    npm VARCHAR(20) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    status_kehadiran VARCHAR(20) NOT NULL,
    bukti_foto VARCHAR(255) NOT NULL
);
```

### 3. Konfigurasi Koneksi Database

Edit file `koneksi.php` dan sesuaikan dengan konfigurasi database Anda:

```php
<?php
$koneksi = mysqli_connect("localhost", "root", "", "absensi_ukri");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

### 4. Setup Folder

Pastikan folder `img/` sudah ada untuk menyimpan file foto:

```bash
mkdir img
```

### 5. Jalankan Project

- Akses via browser: `http://localhost/praktikum/modul10/absensi_ukri`

## 🚀 Penggunaan

### Halaman Utama (index.php)

- Menampilkan daftar semua absensi mahasiswa
- Fitur pencarian berdasarkan nama atau NPM
- Tombol untuk menambah, mengedit, dan menghapus data

### Tambah Absensi (tambah.php)

1. Klik tombol "+ Tambah Absensi"
2. Isi form dengan data lengkap:
   - Nama Mahasiswa
   - NPM
   - Kelas
   - Status Kehadiran (Hadir/Sakit/Izin)
   - Bukti Foto
3. Klik "Simpan Absensi"

### Lihat Detail (detail.php)

1. Klik tombol "Detail" pada data yang ingin dilihat
2. Tampilkan informasi lengkap dan bukti foto
3. Gunakan tombol "Edit" untuk mengubah atau "Kembali" untuk kembali

### Edit Data (edit.php)

1. Klik tombol "Edit" pada data yang ingin diubah
2. Ubah data sesuai kebutuhan
3. Ganti foto jika diperlukan (opsional)
4. Klik "Update Absensi"

### Hapus Data

1. Klik tombol "Hapus" pada data yang ingin dihapus
2. Konfirmasi penghapusan
3. Data akan dihapus dari database

### Pencarian

1. Masukkan nama mahasiswa atau NPM di kolom pencarian
2. Klik tombol "Cari"
3. Hasil akan ditampilkan sesuai pencarian
4. Klik "Reset" untuk kembali ke data lengkap

## 📁 Struktur Folder

```
absensi_ukri/
├── index.php              # Halaman utama (daftar absensi)
├── tambah.php             # Form tambah absensi
├── proses_tambah.php      # Proses penyimpanan data baru
├── edit.php               # Form edit absensi
├── proses_edit.php        # Proses perubahan data
├── detail.php             # Halaman detail absensi
├── hapus.php              # Proses penghapusan data
├── koneksi.php            # Konfigurasi koneksi database
├── img/                   # Folder penyimpanan bukti foto
└── README.md              # File dokumentasi ini
```

## 🛠️ Teknologi yang Digunakan

| Teknologi    | Versi | Fungsi                      |
| ------------ | ----- | --------------------------- |
| PHP          | 7.4+  | Backend Development         |
| MySQL        | 5.7+  | Database Management         |
| HTML5        | -     | Markup                      |
| CSS3         | -     | Styling                     |
| Tailwind CSS | 3.x   | Utility-First CSS Framework |
| JavaScript   | ES6+  | Frontend Interactivity      |

## 🔒 Keamanan

- **SQL Injection Prevention**: Menggunakan prepared statements
- **XSS Protection**: Menggunakan `htmlspecialchars()`
- **Input Validation**: Validasi input pada form
- **File Upload Validation**: Validasi tipe dan ukuran file

## 📝 Catatan

- Pastikan folder `img/` memiliki permission write (755)
- Ukuran maksimal file foto direkomendasikan 5MB
- Format file foto yang didukung: JPG, PNG, GIF
- Backup database secara berkala

## 👨‍💻 Pengembang

Modul Praktikum 10 - Sistem Informasi Absensi

## 📞 Support

Jika ada pertanyaan atau masalah, silakan hubungi administrator sistem.

---

**Terakhir diupdate**: Desember 2025
