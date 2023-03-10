<?php

class c_pelanggan{
    public function koneksi(){
        $conn = mysqli_connect("localhost", "root", "", "laundry");

        return $conn;

    }
    

    // public function cetak(){
    //      $conn = $this->koneksi();

    //         $query = "SELECT * FROM tb_transaksi";

    //         $data = mysqli_query($conn, $query);
    //         while($d = mysqli_fetch_object($data)){
    //             $hasil[] = $d;
    //         }
    //         return $hasil;
    //     }

    
    public function insert_data($id, $nama, $alamat, $jeniskel, $tlp){

        $conn = $this->koneksi();
        if (empty($nama) or empty($alamat) or $jeniskel === "" or empty($tlp)) {
            echo '<script>';
            echo 'alert("Data Tidak Boleh Kosong");';
            echo 'document.location.href="../views/pelanggan/v_tambah_pelanggan.php"';
            echo '</script>';
        } else{
        $query = "INSERT INTO tb_member VALUES ('$id', '$nama', '$alamat', '$jeniskel', '$tlp')";
        
        $insert = mysqli_query($conn, $query);

        if ($insert){
            echo '<script>';
            echo 'alert("Data Berhasil ditambahkan");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data Gagal ditambahkan");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
            }}
        
    }
   

        public function getmember() {
            $conn = $this->koneksi();
             $outlett = "SELECT * FROM tb_member";
    
            $data = mysqli_query($conn, $outlett);
                while($d = mysqli_fetch_object($data)){
                    $hasil[] = $d;
                }
                return $hasil;
        }   

        public function getproduk() {
            $conn = $this->koneksi();
             $outlett = "SELECT * FROM tb_paket";
    
            $data = mysqli_query($conn, $outlett);
                while($d = mysqli_fetch_object($data)){
                    $hasil[] = $d;
                }
                return $hasil;
        }   

    public function hapus($id) {
        $conn = $this->koneksi();
        $query = "DELETE FROM tb_member WHERE id = $id";
        mysqli_query($conn,$query);
        echo '<script>';
        echo 'alert("Data Berhasil dihapus");';
        // echo 'document.location.href="../views/transaksi/v_transaksi.php"';
        echo '</script>';
    }

    public function edit($idd) {
        $conn = $this->koneksi();
        $query = "SELECT * FROM tb_member WHERE id = $idd";
        
        $sql = mysqli_query($conn,$query);

        while ($data = mysqli_fetch_object($sql)) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function update($idd, $outlet, $invoice, $member, $tgl, $batass, $tglbayar, $status, $dibayar, $user) {

        $conn = $this->koneksi();

        $query = "UPDATE tb_member SET id='$idd', id_outlet='$outlet', kode_invoice='$invoice', id_member='$member', tgl='$tgl', batas_waktu='$batass', tanggal_bayar='$tglbayar', status='$status', dibayar='$dibayar', id_user='$user'";
        $update = mysqli_query($conn, $query);

        if ($update) {
            echo '<script>';
            echo 'alert("Data Berhasil diubah");';
            echo 'document.location.href="../views/transaksi/v_transaksi.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data gagal diubah");';
            echo 'document.location.href="../views/transaksi/v_transaksi.php"';
            echo '</script>';
        }
    }
}