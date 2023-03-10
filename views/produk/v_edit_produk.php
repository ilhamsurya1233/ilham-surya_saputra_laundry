<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once '../../controllers/c_produk.php';
include_once '../../controllers/c_outlet.php';

$perintah = new c_produk();
$perintah2 = new c_outlet();
?>
      
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

          <!-- // Basic multiple Column Form section start -->
          <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-8" style=" margin-left:154px;">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Produk</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" data-parsley-validate method="post" action="../../routers/r_produk.php?aksi=update">
                      <?php foreach ($perintah->edit($_GET['id']) as $data) { ?>
                        <div class="row">
                        <div class="col-md-12 col-12">
                        <input
                                type="text"
                                id="first-name-column"
                                class="form-control"
                                placeholder="Nama Lengkap"
                                name="id"
                                value="<?php echo $data->id?>"
                                data-parsley-required="true"
                                hidden
                              />
                      </div> 
                      <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Produk</label> <input type="text"
                        class="form-control" name="nama" value="<?php echo $data->nama ?>">
                </div>
                            <div class="col-md-12 col-12">
                            <div class="form-group">
                              <label for="company-column" class="form-label"
                                >Jenis Produk</label>
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="jenispak" id="" class="form-select">
                    <option>Jenis Produk</option>
                        <option value="kilon">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Sepray</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Other</option>
                    </select>
                </div>
                <div class="col-md-12 col-12">
                <div class="form-group mandatory">
                              <label for="first-name-column" class="form-label"
                                >Outlet</label
                              >
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="id_outlet" id="" class="form-select">
                    <option>Pilihan Outlet</option>
                    <?php foreach ($perintah2->getoutlet() as $data2) { ?>
                        <?php if ($data->id_outlet == $data2->id) { 
                            $select = "selected";
                         } else {
                            $select = "";
                         } 
                         echo "<option $select value='$data2->id'>$data2->nama</option>"
                         ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label> <input type="text"
                        class="form-control" name="harga" value="<?php echo $data->harga ?>">
                </div>
                        <div class="col-md-12 col-12">
                        <label for="exampleInputEmail1" class="form-label"></label>
                            <button
                              type="submit"
                              name="update"
                              class="btn btn-primary me-1 mb-1"
                            >
                              Submit
                            </button>
                            <?php }?>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic multiple Column Form section end -->
        </div>

        <?php
include_once "../template/footer.php";
?>
