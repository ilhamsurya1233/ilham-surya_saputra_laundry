
<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once "../../controllers/c_outlet.php";


$bebas = new c_outlet();
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
                <h3>Table Outlet</h3>
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
              <a style=" margin-left:876px; margin-bottom:9px;"href="v_tambah_outlet.php"><button type="button" class="btn btn-round btn-success">Tambah Outlet</button></a>
                <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                                            $no=1;
                                            
                                            foreach ($bebas->tampil_data() as $du ){?>

                                                <tr>
                                                    <th scope="row"><?php echo $no++?></th>
                                                    <td><?php echo $du->nama?></td>
                                                    <td><?php echo $du->alamat?></td>
                                                    <td><?php echo $du->tlp?></td>
                                                    <th>
                                                    <center>
                                              <a href="v_edit_outlet.php?id=<?= $du->id ?>"><button type="button" class="btn btn-round btn-primary">Edit</button></a>
                            
                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_outlet.php?id=<?= $du->id ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger">Hapus</button></a>
                            </center>
                                                    </th>
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