<?php

class c_transaksi{
    public function koneksi(){
        $conn = mysqli_connect("localhost", "root", "", "laundry");

        return $conn;

    }
    

    public function tampil_data(){
        $conn = $this->koneksi();

        $batas = 5;
        $hai = "haiii";
        $query2 = mysqli_query($conn, "SELECT * FROM tb_transaksi");
        $jmldata = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata/$batas);
        $page = (isset($_GET['page'])) ? $_GET['page']:1;
        $posisi = ($page - 1) * $batas;

    if (isset($_POST['search'])) {
            $ser = $_POST['cari'];
            $query = "SELECT * FROM tb_transaksi WHERE kode_invoice = '$ser' or id_member = '$ser' or status = '$ser' or dibayar = '$ser' or status = '$ser' id_paket = '$ser' or qty = '$ser'";
        } else {
            $query = "SELECT * FROM tb_transaksi ";
            $_SESSION['halaman'] = $jmlhalaman;
            $_SESSION['batas'] = $batas;
            $_SESSION['posisi'] = $posisi; 
            $_SESSION['page'] = $page;
        }
        $data = mysqli_query($conn, $query);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
            $test['yaho'] = $hai;
            
    }

    public function cetak(){
         $conn = $this->koneksi();

            $query = "SELECT * FROM tb_transaksi";

            $data = mysqli_query($conn, $query);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
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
    
        public function insert_data2($id, $outlet, $invoice, $member, $tgl, $batass, $status, $dibayar, $user, $produk, $qty, $keterangan){

            $conn = $this->koneksi();

            if ($member === "" or $produk === "" or empty($batass) or empty($qty) or empty($keterangan)) {
                echo '<script>';
                echo 'alert("Data Tidak Boleh Kosong");';
                echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
                echo '</script>';
            } else {
    
            $query = "INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tanggal_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`, `id_paket`, `qty`, `keterangan`) VALUES ('$id', '$outlet', '$invoice', '$member', '$tgl', '$batass', '', '', '', '', '$status', '$dibayar', '$user', '$produk', '$qty', '$keterangan');";
            
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
    

    public function hapus($id) {
        $conn = $this->koneksi();
        $query = "DELETE FROM tb_transaksi WHERE id = $id";
        mysqli_query($conn,$query);
        echo '<script>';
        echo 'alert("Data Berhasil dihapus");';
        echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
        echo '</script>';
    }

    public function edit($id) {
        $conn = $this->koneksi();
        $query = "SELECT * FROM tb_transaksi WHERE id = $id";
        
        $sql = mysqli_query($conn,$query);

        while ($data = mysqli_fetch_object($sql)) {
            $hasil[] = $data;
        }
        return $hasil;
    }


    public function update($id, $status) {

        $conn = $this->koneksi();

        $query = "UPDATE tb_transaksi SET status='$status' WHERE id=$id";
        $update = mysqli_query($conn, $query);

        if ($update) {
            echo '<script>';
            echo 'alert("Data Berhasil diubah");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data gagal diubah");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
        }
    }

    public function update2($id, $tglbayar, $dibayar) {

        $conn = $this->koneksi();
        
        $query = "UPDATE tb_transaksi SET tanggal_bayar='$tglbayar', dibayar='$dibayar' WHERE id=$id";
        $update = mysqli_query($conn, $query);
        
        if ($update) {
            echo '<script>';
            echo 'alert("Transaksi Berhasil");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Transaksi Gagal");';
            echo 'document.location.href="../views/transaksi/v_list_transaksi.php"';
            echo '</script>';
        }
    }
            public function invoice() {
              // https://www.malasngoding.com
// menghubungkan dengan koneksi database
$conn = $this->koneksi();
 
// mengambil data barang dengan kode paling besar
$query = mysqli_query($conn, "SELECT max(kode_invoice) as kodeTerbesar FROM tb_transaksi");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "TR";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
echo $kodeBarang;
}
        }
    
