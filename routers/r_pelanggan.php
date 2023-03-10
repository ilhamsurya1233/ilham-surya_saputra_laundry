<?php
include '../controllers/c_pelanggan.php';

// // Register pelanggan
$data = new c_pelanggan();
if (isset($_POST['tambah']) || isset($_POST['update'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jeniskel = $_POST['jeniskel'];
$tlp = $_POST['tlp'];

// Koneksi
if ($_GET['aksi'] == 'tambah') {
    $data->insert_data($id, $nama, $alamat, $jeniskel, $tlp);
} elseif ($_GET['aksi'] == 'update') {
    $data->update($id, $nama, $alamat, $jeniskel, $tlp);
}} else {
 if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $data->hapus($id);
}}