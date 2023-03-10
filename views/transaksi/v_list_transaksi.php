
<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once "../../controllers/c_transaksi.php";
include_once "../../controllers/c_outlet.php";
include_once "../../controllers/c_pelanggan.php";
// include_once "v_registrasi_pelanggan.php";
error_reporting(0);
$pe = new c_transaksi();
$po = new c_outlet();
$pu = new c_pelanggan();
?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Table Transaksi</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                </nav>
              </div>
            </div>
          </div>



          <!-- Bordered table start -->
          <section class="section">
            <div class="row" id="table-bordered">
              <div class="col-12">
              <a style=" margin-left:876px; margin-bottom:9px;"href="v_tambah_transaksi.php"><button type="button" class="btn btn-round btn-success">Tambah Transaksi</button></a>
                <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Invoice</th>
                            <th>Outlet</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Batas Waktu</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Dibayar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1;
                          foreach ($pe->tampil_data() as $pi) {
                          ?>
                          <tr>
                            <td class="text-bold-500"><?php echo $no++?></td>
                            <td><?php echo $pi->kode_invoice?></td>
                            <?php foreach ($po->getoutlet() as $out) {
                            if ($pi->id_outlet == $out->id) {
                            ?>
                            <td><?php echo $out->nama?></td>
                            <?php }}?>
                            <?php foreach ($pe->getmember() as $pel) {
                            if ($pi->id_member == $pel->id) {
                            ?>
                            <td><?php echo $pel->nama?></td>
                            <?php }}?>
                            <td><?php echo $pi->tgl?></td>
                        
                            <td><?php echo $pi->batas_waktu?></td>
                            <td><?php echo $pi->tanggal_bayar?></td>
                            <td><?php echo $pi->status?></td>
                            <td><?php echo $pi->dibayar?></td>
                            <td>
                            <center>
                                              <a href="v_detail_transaksi.php?id=<?= $pi->id ?>"><button type="button" class="btn btn-round btn-primary">Detail</button></a>
                                              <a href="v_konfirmasi_pembayaran.php?id=<?= $pi->id ?>"><button type="button" class="btn btn-round btn-warning">Bayar</button></a>
                            
                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_transaksi.php?id=<?= $pi->id ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger">Hapus</button></a>
                            </center>
                            </td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Bordered table end -->

<?php
include_once "../template/footer.php";
?>