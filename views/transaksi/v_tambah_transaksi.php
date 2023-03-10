<?php 
    include_once '../template/header.php';
    include_once '../template/sidebar.php';
    include_once '../../controllers/c_outlet.php';
    include_once '../../controllers/c_pelanggan.php';
    include_once '../../controllers/c_pengguna.php';
    include_once '../../controllers/c_transaksi.php';

    $perintah = new c_outlet();
    $perintah2 = new c_pelanggan();
    $user = new c_pengguna();
    $transaksi = new c_transaksi();
    ?>

    <div class="row" style="background-color: dark; padding-bottom:300px !important;">
        <div class="col">
        </div>
        <div class="col-5" style=" height:648px;">
            <h2 style="margin-top:80px; margin-bottom:30px; text-align: center;">Tambah Transaksi</h2>
            <form action="../../routers/r_transaksi.php?aksi=tambah2" method="POST">
               
            <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">ID</label> --> <input type="text"
                        class="form-control" name="id" hidden>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">Kode Invoice</label> -->
                    <?php
                    $no=1;
                    ?>
                    <label for="exampleInputEmail1" class="form-label">Kode Invoice</label>
                     <input type="text" class="form-control" name="invoice" value="<?php $transaksi->invoice(); ?>" readonly>
                </div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal</label> 
                    <input type="text" class="form-control" name="tgl" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="mb-3">
                    <select name="id_member" id="" class="form-select">
                    <option>Pilihan Pelanggan</option>
                    <?php foreach ($perintah2->getmember() as $deba) { ?>
                        <option value="<?php echo $deba->id ?>"><?= $deba->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label"></label> -->
                    <input type="text" class="form-control" name="id_outlet" value="<?php echo $_SESSION['outlet']?>" hidden>
                </div>
                <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label"></label> -->
                        <input type="text" class="form-control" name="id_user" value="<?php echo $_SESSION['id']?>" hidden>
                </div>
                <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label"></label> -->
                    <select name="id_produk" id="" class="form-select">
                    <option>Pilihan Produk</option>
                    <?php foreach ($perintah2->getproduk() as $masbro) {
                        if ($_SESSION['produk'] == $masbro->id_produk) {
                        ?>
                        <option value="<?php echo $masbro->id ?>"><?= $masbro->nama_paket
                         ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quantity / KG</label> <input type="text"
                        class="form-control" name="qty">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Batas Waktu / Tgl Diambil</label> <input type="date"
                        class="form-control" name="batass">
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label> <input type="date"
                        class="form-control" name="tglbayar">
                </div> -->
                <!-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                     <input type="date"
                        class="form-control" name="biayatam" value="0 "hidden>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label> 
                    <input type="date"
                        class="form-control" name="diskon" value="0 "hidden>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                     <input type="date"
                        class="form-control" name="pajak" value="0 "hidden>
                </div> -->
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">ID</label> --> <input type="text"
                        class="form-control" name="status" value="baru" hidden>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">ID</label> --> <input type="text"
                        class="form-control" name="dibayar" value="belum_dibayar" hidden>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Keterangan</label> <input type="text"
                        class="form-control" name="keterangan">
                </div>
                <button style="" name="tambah2" type="submit" class="btn btn-primary">Kirim</button>
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