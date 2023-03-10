<?php
include '../controllers/c_produk.php';
$data = new c_produk();

if (isset($_POST['tambah']) || isset($_POST['update'])) {
$id = $_POST['id']; 
$outlet = $_POST['id_outlet'];
$jenispak = $_POST['jenispak'];
$namaket = $_POST['namaket'];
$harga = $_POST['harga'];

if ($_GET['aksi'] == 'tambah') {
    $data->insert_data($id, $outlet, $jenispak, $namaket, $harga);
} elseif ($_GET['aksi'] == 'update') {
    $data->update($id, $outlet, $jenispak, $namaket, $harga);
}} else {
if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $data->hapus($id);
}}
?>