<?php 
    include_once '../template/header.php';
    include_once '../template/sidebar.php';
    // include_once '../template/topbar.php';
    include_once '../../controllers/c_pelanggan.php';
    include_once '../../controllers/c_transaksi.php';

    $pelanggan = new c_pelanggan();
    $transaksi = new c_transaksi();
    ?>

    <div class="row" style="background-color: dark;">
        <div class="col">
        </div>
        <div class="col-5" style=" height:800px;">
            <h2 style="margin-top:80px; margin-bottom:30px; text-align: center;">Konfirmasi Pembayaran</h2>
            <form action="../../routers/r_konfirmasip.php?aksi=updat" method="POST">
            <?php foreach ($transaksi->edit($_GET['id']) as $data) { ?>
                <div class="mb-3">
                    <!-- <label for="exampleInputEmail1" class="form-label">ID</label> --> <input type="text"
                        class="form-control" name="id" value="<?php echo $data->id ?>" hidden>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kode Invoice</label> 
                    <input type="text" class="form-control" name="invoice" value="<?php echo $data->kode_invoice ?>">
                    <!-- <input type="text" class="form-control" name="dibayar" value="true" hidden> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Pembayaran</label> <input type="date"
                        class="form-control" name="tglbayar" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                    <?php foreach ($pelanggan->getmember() as $member) {
                        if ($data->id_member == $member->id) {?>
                     <input type="text"
                        class="form-control" name="" value="<?php echo $member->nama ?>" readonly>
                        <?php }}?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Produk / Paket</label> 
                    <?php foreach($pelanggan->getproduk() as $produk) {
                        if ($data->id_paket == $produk->id) { ?>
                    <input type="text"
                        class="form-control" name="" value="<?php echo $produk->nama_paket ?>" readonly>
                        <?php }}?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga Paket</label> 
                    <?php foreach($pelanggan->getproduk() as $produk) {
                        if ($data->id_paket == $produk->id) { ?>
                    <input type="text"
                        class="form-control" name="hargaproduk" value="<?php echo $produk->harga ?>" readonly>
                        <?php }}?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Qty</label> 
                    <input type="text" class="form-control" name="qty" value="<?php echo $data->qty ?>" readonly>
                    <!-- <input type="text" class="form-control" name="dibayar" value="true" hidden> -->
                </div>
                <div class="mb-3">
                    <?php foreach($pelanggan->getproduk() as $produk) {
                        if ($data->id_paket == $produk->id) {
                            $total = $produk->harga * $data->qty;
                            ?>
                    <label for="exampleInputEmail1" class="form-label">Total Pembayaran</label> 
                    <input type="text" class="form-control" name="hargaa" value="<?php echo $total ?>" readonly>
                    <?php }}?>
                    <!-- <input type="text" class="form-control" name="dibayar" value="true" hidden> -->
                </div>
                <button style="" name="updat" type="submit" class="btn btn-primary">Kirim</button>
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