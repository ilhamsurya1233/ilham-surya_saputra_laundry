<?php 
    include_once '../template/header.php';
    include_once '../template/sidebar.php';
    // include_once '../template/topbar.php';
    include_once '../../controllers/c_transaksi.php';
    include_once '../../controllers/c_outlet.php';
    include_once '../../controllers/c_pelanggan.php';

    $perintah = new c_transaksi();
    $perintah2 = new c_outlet();
    $pelanggan = new c_pelanggan();
    ?>
    <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Transaksi</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt">
                                                        <!-- <form action="" method="post">
                                                    <button class="btn btn-primary d-none d-md-inline-flex" name="search" type="submit">Cari</button>
                                                    </li>
                                                        <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input type="text" class="form-control" id="default-04" name="cari" placeholder="Pencarian">
                                                            </div>
                                                        </li>
                                                    </li>
                                                    </form> -->
                                                            <!-- <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>On Hold</span></a></li>
                                                                        <li><a href="#"><span>Delevired</span></a></li>
                                                                        <li><a href="#"><span>Rejected</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li> --> 
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="v_tambah_transaksi.php" class="btn btn-primary d-none d-md-inline-flex"><span>Tambah Transaksi</span></a> 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="text-align: center;"><span>No</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"><span>Kode Invoice</span></div>
                                            <div class="nk-tb-col tb-col-md" style="text-align: center;"><span>Outlet</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Pelanggan</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Tanggal</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Batas Waktu</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Tanggal Bayar</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Status</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span>Dibayar</span></div>
                                            <div class="nk-tb-col" style="text-align: center;"> <span></span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <?php
// manampilkan data dari method atau function tampil_data() 
if (!$perintah->tampil_data()) {
    echo '
    <div class="toasts" style=" width:242% !important;">
    <div role="alert" class="fade alert alert-warning alert-dismissible show">
    <a href="v_transaksi.php"><button type="button" class="btn-close" aria-label="Close alert"></button></a>
      <div class="d-flex">
        <img alt="noti-icon" src="https://brand.workingsolutions.com/components/images/warning.svg" width="28" class="me-4">
        <div>
          <div class="alert-heading h4">Oops!</div>
          <p>Data Tidak Ditemukan, Pastikan untuk menambah data di kolom tambah diatas</p>
        </div>
      </div>
    </div>
  </div>
    ';
} else {
    $posisi = $_SESSION['posisi'];
    $no = 1+$posisi;
foreach ($perintah->tampil_data() as $data) {
?>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead" style=" text-align: center;" ><a href="#" style=" text-align: center;"><?php echo $no++ ?></a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm" style=" text-align: center;">
                                                <span class="tb-sub"><?php echo $data->kode_invoice ?></span>
                                            </div>
                                            <?php foreach ($perintah2->getoutlet() as $dot) {
                                            if ($data->id_outlet == $dot->id) { ?>
                                            <div class="nk-tb-col"  style=" text-align: center;">
                                            <span class="tb-sub" style=" text-align: center;"><?php echo $dot->nama ?></span>
                                            </div>
                                            <?php }}?>
                                            <?php foreach ($perintah->getmember() as $dat) {
                                            if ($data->id_member == $dat->id) { ?>
                                            <div class="nk-tb-col"  style=" text-align: center;">
                                            <span class="tb-sub" style=" text-align: center;"><?php echo $dat->nama ?></span>
                                            </div>
                                            <?php }}?>
                                            <div class="nk-tb-col tb-col-sm" style=" text-align: center;">
                                                <span class="tb-sub"><?php echo $data->tgl ?></span>
                                            </div>
                                            <div class="nk-tb-col"  style=" text-align: center;">
                                            <span class="tb-sub" style=" text-align: center;"><?php echo $data->batas_waktu ?></span>
                                                <!-- <span class="dot bg-warning d-sm-none"></span>
                                                <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex" >On Hold</span> -->
                                            </div>
                                            <div class="nk-tb-col tb-col-sm" style=" text-align: center;">
                                            <?php if ($data->tanggal_bayar == "0000-00-00") {?>
                                                <span class="tb-sub">Belum Konfirmasi</span>
                                                <?php } else {?>
                                                    <span class="tb-sub"><?php echo $data->tanggal_bayar ?></span>
                                                    <?php }?>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm" style=" text-align: center;">
                                            <?php if ($data->status == 'baru') {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex" >Baru</span>';
                                                } else if ($data->status == 'proses') {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex" >Proses</span>';
                                                } else if ($data->status == 'selesai') {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" >Selesai</span>';
                                                } else if ($data->status == "diambil") {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" >Diambil</span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="nk-tb-col" style=" text-align: center;">
                                            <?php if ($data->dibayar == 'dibayar') {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" >Dibayar</span>';
                                                } else {
                                                    echo '<span class="badge badge-sm badge-dot has-bg bg-danger d-none d-sm-inline-flex" >Belum Dibayar</span>';
                                                }
                                                    ?>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm" style="width: 100px; text-align: center;">
                                                <span class="tb-sub"></span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden"><a href="v_detail_transaksi.php?id=<?php echo $data->id ?>" class="btn btn-icon btn-trigger btn-tooltip" title="Detail">
                                                            <em class="icon ni ni-pen2"></em></a></li>
                                                            <?php if ($data->dibayar == "belum_dibayar") {?>
                                                    <li class="nk-tb-action-hidden"><a href="v_konfirmasi_pembayaran.php?id=<?php echo $data->id ?>" class="btn btn-icon btn-trigger btn-tooltip" title="Konfirmasi Pembayaran">
                                                            <em class="icon ni ni-pen2"></em></a></li>
                                                            <?php } else {}?>
                                                    <li class="nk-tb-action-hidden"><a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_transaksi.php?id=<?php echo $data->id ?>&aksi=hapus" class="btn btn-icon btn-trigger btn-tooltip" name="hapus" title="Delete">
                                                            <em class="icon ni ni-cross"></em></a></li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <?php }} ?>
                                    </div><!-- .nk-tb-list -->
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                    <?php 
    $get = 2;
    $halm = $_SESSION['halaman'];
    $page = $_SESSION['page'];
    $batas = $_SESSION['batas'];
    if (isset($_POST['search'])) {
        echo "";
    } else {
        if ($page-1) {
            echo "<li class='page-item'><a class='page-link' href=\"v_transaksi.php?page=".($page-1)."\"><em class='icon ni ni-chevrons-left'></em></a></li>";
         }
   
       for($x=1; $x<=$halm; $x++){
           if($x != $page) {
            if(($x>=$get-2) && ($x<=$get+1) || ($x==1) || ($x==$halm))
            {
                echo "<li class='page-item'><a class='page-link' href=\"v_transaksi.php?page=$x\">$x</a></li>";
            }
           } else {
            echo "<li class='page-item active'><a class='page-link' href=\"v_transaksi.php?page=$x\">$x<span class='sr-only'></span></a></li>";
           }
       }
       if ($page!=$halm) {
           echo "<li class='page-item'><a class='page-link' href=\"v_transaksi.php?page=".($page+1)."\"><em class='icon ni ni-chevrons-right'></em></a></li>";
        }
    }
    ?>
                                                        <!-- <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li> -->
                                                    </ul><!-- .pagination -->
                                                </div>
                                                <!-- <div class="g">
                                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                        <div>Page</div>
                                                        <div>
                                                            <select class="form-select js-select2" data-search="on" data-dropdown="xs center">
                                                                <option value="page-1">1</option>
                                                                <option value="page-2">2</option>
                                                                <option value="page-4">4</option>
                                                                <option value="page-5">5</option>
                                                                <option value="page-6">6</option>
                                                                <option value="page-7">7</option>
                                                                <option value="page-8">8</option>
                                                                <option value="page-9">9</option>
                                                                <option value="page-10">10</option>
                                                                <option value="page-11">11</option>
                                                                <option value="page-12">12</option>
                                                                <option value="page-13">13</option>
                                                                <option value="page-14">14</option>
                                                                <option value="page-15">15</option>
                                                                <option value="page-16">16</option>
                                                                <option value="page-17">17</option>
                                                                <option value="page-18">18</option>
                                                                <option value="page-19">19</option>
                                                                <option value="page-20">20</option>
                                                            </select>
                                                        </div>
                                                        <div>OF 102</div>
                                                    </div>
                                                </div>.pagination-goto -->
                                            </div><!-- .nk-block-between -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <!-- JavaScript -->
    <script src="../../assets/js/bundle.js?ver=3.1.2"></script>
    <script src="../../assets/js/scripts.js?ver=3.1.2"></script>
</body>

</html>