<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once "../../controllers/c_outlet.php";


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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Tambah Outlet</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" data-parsley-validate  action="../../routers/r_outlet.php?aksi=tambah" method="POST">
                        <div class="row">
                        <div class="col-md-12 col-12">
                        <input
                                type="text"
                                id="first-name-column"
                                class="form-control"
                                placeholder="Nama Lengkap"
                                name="id"
                                data-parsley-required="true"
                                hidden
                              />
                        </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                              <label for="first-name-column" class="form-label"
                                >Nama Lengkap</label
                              >
                              <input
                                type="text"
                                id="first-name-column"
                                class="form-control"
                                placeholder="Nama Ente"
                                name="nama"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="city-column" class="form-label"
                                >Alamat</label
                              >
                              <input
                                type="text"
                                id="city-column"
                                class="form-control"
                                name="alamat"
                                placeholder="dimana we bebas"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="company-column" class="form-label"
                                >Telepon</label
                              >
                              <input
                                type="text"
                                id="company-column"
                                class="form-control"
                                name="tlp"
                                placeholder="+62"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-12 d-flex justify-content-end">
                            <button
                              type="submit"
                              class="btn btn-primary me-1 mb-1"
                              name ="tambah"
                            >
                              Submit
                            </button>
                          </div>
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
