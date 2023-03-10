<?php 
    include_once '../template/header.php';
    include_once '../template/sidebar.php';
    // include_once '../template/topbar.php';
    include_once '../../controllers/c_outlet.php';
    include_once '../../controllers/c_pelanggan.php';
    include_once '../../controllers/c_pengguna.php';
    include_once '../../controllers/c_transaksi.php';

    $perintah = new c_outlet();
    $perintah2 = new c_pelanggan();
    $user = new c_pengguna();
    $transaksi = new c_transaksi();
    ?>

    <div class="row" style="background-color: dark;   padding-bottom:600px !important;">
        <div class="col">
        </div>
        <div class="col-5" style=" height:648px;">
            <h2 style="margin-top:80px; margin-bottom:30px; text-align: center;">Detail Transaksi</h2>
            <form action="../../routers/r_transaksi.php?aksi=update" method="POST">
            <?php
                     foreach ($transaksi->edit($_GET['id']) as $data) { ?>
                    
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">ID</label> --> <input type="text"
                        class="form-control" name="id" value="<?php echo $data->id ?>" hidden>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">Kode Invoice</label> -->
                     <label for="exampleInputEmail1" class="form-label">Kode Invoice</label>
                     <input type="text" class="form-control" name="invoice" value="<?php echo $data->kode_invoice ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal</label> 
                    <input type="text" class="form-control" name="tgl" value="<?php echo $data->tgl ?>" readonly>
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                    <?php foreach ($perintah2->getmember() as $deba) {
                        if ($data->id_member == $deba->id) { ?>
                        <input type="text" class="form-control" name="id_member" value="<?php echo $deba->id ?>" hidden>
                        <input type="text" class="form-control" value="<?php echo $deba->nama ?>" readonly>
                        <?php }} ?>
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Outlet</label>
                    <?php foreach ($perintah->getoutlet() as $doe) {
                        if ($data->id_outlet == $doe->id) { ?>
                        <input type="text" class="form-control" name="id_outlet" value="<?php echo $doe->id ?>" hidden>
                        <input type="text" class="form-control" value="<?php echo $doe->nama ?>" readonly>
                        <?php }} ?>
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                    <?php foreach ($user->getpengguna() as $taw) {
                        if ($data->id_user == $taw->id) {?>
                        <input type="text" class="form-control" name="id_user" value="<?php echo $taw->id ?>" hidden>
                        <input type="text" class="form-control" value="<?php echo $taw->nama ?>" readonly>
                        <?php }} ?>
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Produk / Paket</label>
                    <?php foreach ($perintah2->getproduk() as $masbro) { 
                        if ($data->id_paket == $masbro->id) {?>
                        <input type="text" class="form-control" name="id_produk" value="<?php echo $masbro->id ?>" hidden>
                        <input type="text" class="form-control" value="<?php echo $masbro->nama_paket ?>" readonly>
                        <?php }} ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quantity</label> <input type="text"
                        class="form-control" name="qty" value="<?php echo $data->qty ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Batas Waktu / Tanggal Diambil</label> <input type="date"
                        class="form-control" name="batass" value="<?php echo $data->batas_waktu ?>" readonly>
                </div>
                <div class="mb-3">
                    <?php if($data->dibayar == "dibayar") {?>
                    <label for="exampleInputEmail1" class="form-label">Tanggal Pembayaran</label> <input type="date"
                        class="form-control" name="tglbayar" value="<?php echo $data->tanggal_bayar ?>" readonly>
                        <?php } else {}?>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label> -->
                     <input type="date"
                        class="form-control" name="biayatam" value="0 "hidden>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>  -->
                    <input type="date"
                        class="form-control" name="diskon" value="0 "hidden>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label> -->
                     <input type="date"
                        class="form-control" name="pajak" value="0 "hidden>
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select name="status" id="" class="form-select">
                    <?php if($data->status == "baru") {
                        echo '<option selected value="baru">Baru</option>';
                        echo '<option  value="proses">Proses</option>';
                        echo '<option  value="selesai">Selesai</option>';
                        echo '<option  value="diambil">Diambil</option>';
                    } elseif ($data->status == "proses") {
                        echo '<option  value="baru">Baru</option>';
                        echo '<option selected value="proses">Proses</option>';
                        echo '<option  value="selesai">Selesai</option>';
                        echo '<option  value="diambil">Diambil</option>';
                    } elseif ($data->status == "selesai") {
                        echo '<option  value="baru">Baru</option>';
                        echo '<option  value="proses">Proses</option>';
                        echo '<option selected value="selesai">Selesai</option>';
                        echo '<option  value="diambil">Diambil</option>';
                    } elseif ($data->status == "diambil") {
                        echo '<option  value="baru">Baru</option>';
                        echo '<option  value="proses">Proses</option>';
                        echo '<option  value="selesai">Selesai</option>';
                        echo '<option selected value="diambil">Diambil</option>';
                    } else {
                        echo '<option value="baru">Baru</option>';
                        echo '<option value="proses">Proses</option>';
                        echo '<option value="selesai">Selesai</option>';
                        echo '<option value="diambil">Diambil</option>'; 
                    }?>
                    </select>
                </div>
                <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label">Pembayaran</label> -->
                <select name="dibayar" id="" class="form-select" hidden>
                    <?php if($data->dibayar == "belum_dibayar") {
                        echo '<option selected value="belum_dibayar">Belum Dibayar</option>';
                        echo '<option  value="dibayar">Dibayar</option>';
                    } elseif ($data->dibayar == "dibayar") {
                        echo '<option  value="belum_dibayar">Belum Dibayar</option>';
                        echo '<option selected value="proses">Dibayar</option>';
                    }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Keterangan</label> <input type="text"
                        class="form-control" name="keterangan" value="<?php echo $data->keterangan ?>" readonly>
                </div>
                <button style="" name="update" type="submit" class="btn btn-primary">Kirim</button>
                <?php } ?>
            </form>
        </div>
        <div class="col" style="background-color: dark;">
        </div>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"
    integrity="sha384-u10knCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTP00mMi466C8"
    crossorigin="anonymous"></script>
    <script src="../assets/js/bundle.js?ver=3.1.2"></script>
    <script src="../assets/js/scripts.js?ver=3.1.2"></script>
</body>
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</html>