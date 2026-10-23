<?php
// blok kode untuk insert data ke tabel buku
if (isset($_POST['submit'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $sampul = $_FILES['sampul'];

    $nama_sampul = $sampul['name'];
    move_uploaded_file($sampul['tmp_name'], 'sampul/' . $nama_sampul);

    require 'koneksi.php';
    $sql = "INSERT INTO buku 
        (kode_buku, judul, pengarang, penerbit, tahun_terbit, stok, sampul) 
        VALUES ('$kode_buku', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$stok', '$nama_sampul')";

    $query = $koneksi->query($sql); // eksekusi query sql ke database

    if ($query) {
        // echo "Berhasil menyimpan data!";
        header("Location: buku.php");
    } else {
        echo "Gagal menyimpan data";
    }
}

// blok kode untuk update data ke tabel buku
if (isset($_POST['update'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];
    $sampul = $_FILES['sampul'];

    $nama_sampul = $sampul['name'];
    move_uploaded_file($sampul['tmp_name'], 'sampul/' . $nama_sampul);

    require 'koneksi.php';
    $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stok='$stok', sampul='$nama_sampul' WHERE kode_buku='$kode_buku'";

    $query = $koneksi->query($sql); // eksekusi query sql ke database

    if ($query) {
        // echo "Berhasil mengubah data!";
        header("Location: buku.php");
    } else {
        echo "Gagal mengubah data";
    }
}
