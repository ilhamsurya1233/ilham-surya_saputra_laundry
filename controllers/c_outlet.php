<?php

class c_outlet{
    public function koneksi(){
        $conn = mysqli_connect("localhost", "root", "", "laundry");

        return $conn;

    }
    

    public function tampil_data(){
        $conn = $this->koneksi();

        $batas = 5;
        $hai = "haiii";
        $query2 = mysqli_query($conn, "SELECT * FROM tb_outlet");
        $jmldata = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata/$batas);
        $page = (isset($_GET['page'])) ? $_GET['page']:1;
        $posisi = ($page - 1) * $batas;

    if (isset($_POST['search'])) {
            $ser = $_POST['cari'];
            $query = "SELECT * FROM tb_outlet WHERE nama = '$ser' or alamat = '$ser' or tlp = '$ser'";
        } else {
            $query = "SELECT * FROM tb_outlet";
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

            $query = "SELECT * FROM tb_outlet";

            $data = mysqli_query($conn, $query);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }
    

    public function insert_data($id, $nama, $alamat, $tlp){

        $conn = $this->koneksi();
        if (empty($nama) or empty($alamat) or empty($tlp)) {
            echo '<script>';
            echo 'alert("Data Tidak Boleh Kosong");';
            echo 'document.location.href="../views/outlet/v_tambah_outlet.php"';
            echo '</script>';
        } else {

        $query = "INSERT INTO tb_outlet VALUES ('$id', '$nama', '$alamat', '$tlp')";
        
        $insert = mysqli_query($conn, $query);

        if ($insert){
            echo '<script>';
            echo 'alert("Data Berhasil ditambahkan");';
            echo 'document.location.href="../views/outlet/v_list_outlet.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data Gagal ditambahkan");';
            echo 'document.location.href="../views/outlet/v_list_outlet.php"';
            echo '</script>';
            } }
        
    }

    public function hapus($id) {
        $conn = $this->koneksi();
        $query = "DELETE FROM tb_outlet WHERE id = $id";
        mysqli_query($conn,$query);
        echo '<script>';
        echo 'alert("Data Berhasil dihapus");';
        echo 'document.location.href="../views/outlet/v_list_outlet.php"';
        echo '</script>';
    }

    public function edit($id) {
        $conn = $this->koneksi();
        $query = "SELECT * FROM tb_outlet WHERE id = $id";
        
        $sql = mysqli_query($conn,$query);

        while ($data = mysqli_fetch_object($sql)) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getoutlet() {
        $conn = $this->koneksi();
         $outlett = "SELECT * FROM tb_outlet";

        $data = mysqli_query($conn, $outlett);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
    }   

    public function update($id, $nama, $alamat, $tlp) {

        $conn = $this->koneksi();

        $query = "UPDATE tb_outlet SET nama='$nama', alamat='$alamat', tlp='$tlp' WHERE id='$id'";
        $update = mysqli_query($conn, $query);

        if ($update) {
            echo '<script>';
            echo 'alert("Data Berhasil diubah");';
            echo 'document.location.href="../views/outlet/v_list_outlet.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data gagal diubah");';
            echo 'document.location.href="../views/outlet/v_list_outlet.php"';
            echo '</script>';
        }
    }
}