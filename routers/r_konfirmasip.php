<?php
include '../controllers/c_transaksi.php';
// include_once '../controllers/c_pelanggan.php';

// // Register pelanggan
$data = new c_transaksi();
// $produk = new c_pelanggan();

$id = $_POST['id'];
$tglbayar = $_POST['tglbayar'];
// $produk = $_POST['hargaproduk'];
// $qty = $_POST['qty'];
// $hargaa = $_POST['hargaa'];
// $prod = $hargaa;

if ($_GET['aksi'] == 'updat') {
            if (!$tglbayar == "") {
                // echo "Udah bener";
                $dibayar = "dibayar";
                $data->update2($id, $tglbayar, $dibayar);
            } 
            else {
                echo '<script>';
                echo 'alert("Silahkan Konfirmasi Tanggal Pembayaran Dulu");';
                echo 'document.location.href="../views/transaksi/v_transaksi.php"';
                echo '</script>';
                // header("location:../views/transaksi/v_transaksi.php");
            }
        }