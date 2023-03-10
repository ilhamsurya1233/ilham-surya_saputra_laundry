<?php

class c_pengguna{
    public function koneksi(){
        $conn = mysqli_connect("localhost", "root", "", "laundry");

        return $conn;

    }
    

    public function tampil_data(){
        $conn = $this->koneksi();

        $batas = 90;
        $hai = "haiii";
        $query2 = mysqli_query($conn, "SELECT * FROM tb_user");
        $jmldata = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata/$batas);
        $page = (isset($_GET['page'])) ? $_GET['page']:1;
        $posisi = ($page - 1) * $batas;

    if (isset($_POST['search'])) {
            $ser = $_POST['cari'];
            $query = "SELECT * FROM tb_user WHERE nama = '$ser' or username = '$ser' or id_outlet = '$ser' or role = '$ser'";
        } else {
            $query = "SELECT * FROM tb_user LIMIT $posisi, $batas";
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
            
            $query = "SELECT * FROM tb_user";

            $data = mysqli_query($conn, $query);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }
    
    public function insert_data($id, $nama, $username, $password, $outlet, $role){

       

        $conn = $this->koneksi();

        $usercheck= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'"));
        // var_dump($usercheck);
        // exit;

        if($usercheck > 0){
            // echo "<script>alert('USERNAME TELAH DI GUNAKAN!!');location'../views/pengguna/v_tambah_pengguna.php'</script>";

            echo '<script>';
            echo 'alert("Username Telah Digunakan");';
            echo 'document.location.href="../views/pengguna/v_tambah_pengguna.php"';
            echo '</script>';
        }else{

        $pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_user VALUES ('$id', '$nama', '$username', '$pass', '$outlet', '$role')";
        // var_dump($sql);
        // exit;
        $query = mysqli_query($conn, $sql);


        // $query = "INSERT INTO tb_user VALUES ('$id', '$nama', '$username', '$pass', '$outlet', '$role')";
        
        // $insert = mysqli_query($conn, $query);

        if ($query){
            echo '<script>';
            echo 'alert("Data Berhasil ditambahkan");';
            echo 'document.location.href="../views/pengguna/v_list_pengguna.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data Gagal ditambahkan");';
            echo 'document.location.href="../views/pengguna/v_list_pengguna.php"';
            echo '</script>';
        }
        }
    }

    // public function getrole() {
    //     $conn = $this->koneksi();
    //      $outlett = "SELECT role FROM tb_user";

    //     $data = mysqli_query($conn, $outlett);
    //         while($d = mysqli_fetch_object($data)){
    //             $hasil[] = $d;
    //         }
    //         return $hasil;
    // }   

    public function hapus($id) {
        $conn = $this->koneksi();
        $query = "DELETE FROM tb_user WHERE id = $id";
        mysqli_query($conn,$query);
        echo '<script>';
        echo 'alert("Data Berhasil dihapus");';
        echo 'document.location.href="../views/pengguna/v_list_pengguna.php"';
        echo '</script>';
    }

    public function edit($id) {
        $conn = $this->koneksi();
        $query = "SELECT * FROM tb_user WHERE id = $id";
        
        $sql = mysqli_query($conn,$query);

        while ($data = mysqli_fetch_object($sql)) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getpengguna() {
        $conn = $this->koneksi();
         $outlett = "SELECT * FROM tb_user";

        $data = mysqli_query($conn, $outlett);
            while($d = mysqli_fetch_object($data)){
                $hasil[] = $d;
            }
            return $hasil;
    }   

    public function update($id, $nama, $username, $pass, $outlet, $role) {

        $conn = $this->koneksi();

        $query = "UPDATE tb_user SET nama='$nama', username='$username', password='$pass', id_outlet='$outlet', role='$role' WHERE id='$id'";
        $update = mysqli_query($conn, $query);

        if ($update) {
            echo '<script>';
            echo 'alert("Data Berhasil diubah");';
            echo 'document.location.href="../views/pengguna/v_list_pengguna.php"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Data gagal diubah");';
            echo 'document.location.href="../views/pengguna/v_list_pengguna.php"';
            echo '</script>';
        }
    }
}