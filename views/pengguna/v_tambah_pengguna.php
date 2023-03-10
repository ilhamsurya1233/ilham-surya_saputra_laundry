<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once '../../controllers/c_outlet.php';

$perintah = new c_outlet();
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
                    <h4 class="card-title">Tambah Pengguna</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" data-parsley-validate method="post" action="../../routers/r_pengguna.php?aksi=tambah">
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
                          <div class="col-md-12 col-12">
                            <div class="form-group mandatory">
                              <label for="first-name-column" class="form-label"
                                >Nama Lengkap</label
                              >
                              <input
                                type="text"
                                id="first-name-column"
                                class="form-control"
                                placeholder="Nama Lengkap"
                                name="nama"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          <div class="col-md-12 col-12">
                            <div class="form-group">
                              <label for="city-column" class="form-label"
                                >Username</label
                              >
                              <input
                                type="text"
                                name="username"
                                id="city-column"
                                class="form-control"
                                placeholder="Username"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          </div>
                          <div class="col-md-12 col-12">
                            <div class="form-group">
                              <label for="company-column" class="form-label"
                                >Password</label
                                
                              >
                              <input
                                type="password"
                                id="company-column"
                                class="form-control"
                                name="password"
                                placeholder="Password"
                                data-parsley-required="true"
                                required
                              />
                            </div>
                          </div>
                          <center>
                          <div class="col-md-12 col-12">
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="id_outlet" id="" class="form-select" required>
                    <option value="">Outlet</option>
                    <?php foreach ($perintah->getoutlet() as $data) { ?>
                        <option value="<?php echo $data->id ?>"><?= $data->nama ?></option>
                        <?php } ?>
                        
                    </select >
                </div>
                <div class="col-md-12 col-12">
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="role" id="" class="form-select" required>

                    <option value="">roles</option>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                        <option value="owner">owner</option>
                    </select>
                </div>
                      
                        <div class="col-md-12 col-12">
                        <label for="exampleInputEmail1" class="form-label"></label>
                            <button
                              type="submit"
                              name="tambah"
                              class="btn btn-primary me-1 mb-1"
                            >
                              Submit
                            </button>
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
