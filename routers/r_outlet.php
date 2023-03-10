<?php
include '../controllers/c_outlet.php';
$data = new c_outlet();

if (isset($_POST['tambah']) || isset($_POST['update'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

if ($_GET['aksi'] == 'tambah') {
    $data->insert_data($id, $nama, $alamat, $tlp);
} elseif ($_GET['aksi'] == 'update') {
    $data->update($id, $nama, $alamat, $tlp);
}} else {
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $data->hapus($id);
}}
?>