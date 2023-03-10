<?php
include '../controllers/c_pengguna.php';
$data = new c_pengguna();


if (isset($_POST['tambah']) || isset($_POST['update'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$outlet = $_POST['id_outlet'];
$role = $_POST['role'];

if ($_GET['aksi'] == 'tambah') {
    $data->insert_data($id, $nama, $username, $password, $outlet, $role);
} elseif ($_GET['aksi'] == 'update') {
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $data->update($id, $nama, $username, $pass, $outlet, $role);
}} else {
 if ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $data->hapus($id);
}}
?>
</html>
