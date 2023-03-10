<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once '../../controllers/c_pengguna.php';
include_once '../../controllers/c_outlet.php';

$perintah = new c_pengguna();
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
                    <h4 class="card-title">Edit Pengguna</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" data-parsley-validate method="post" action="../../routers/r_pengguna.php?aksi=update">
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
                                value="<?php echo $data->nama?>"
                                data-parsley-required="true"
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
                                value="<?php echo $data->username?>"
                                data-parsley-required="true"
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
                              />
                            </div>
                          </div>
                          <center>
                          <div class="col-md-12 col-12">
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="id_outlet" id="" class="form-select">
                    <option>Outlet</option>
                    <?php foreach ($perintah2->getoutlet() as $data2) { ?>
                        <?php if ($data->id_outlet == $data2->id) { 
                            $select = "selected";
                         } else {
                            $select = "";
                         } 
                         echo "<option $select value='$data2->id'>$data2->nama</option>"
                         ?>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12 col-12">
                <label for="exampleInputEmail1" class="form-label"></label>
                    <select name="role" id="" class="form-select">
                    <option>-Pilih-</option>
                        <!-- <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                        <option value="owner">owner</option> -->
                        <?php if ($data->role == "admin") { 
                          echo '
                          <option selected value="admin">admin</option>
                          <option value="kasir">kasir</option>
                          <option value="owner">owner</option>';
                        } elseif ($data->role == "kasir") {
                          echo '
                          <option value="admin">admin</option>
                          <option selected value="kasir">kasir</option>
                          <option value="owner">owner</option>';
                        } elseif ($data->role == "owner") {
                          echo '
                          <option value="admin">administrator</option>
                          <option value="kasir">kasir</option>
                          <option selected value="owner">owner</option>';
                        } elseif ($data->role == "owner") 
                        {?>
                        
                        <?php } ?>
                    
                    </select>
                    </select>
                </div>
                        <div class="col-md-12 col-12">
                        <label for="exampleInputEmail1" class="form-label"></label>
                            <button
                              type="submit"
                              name="update"
                              class="btn btn-primary me-1 mb-1"
                            >
                              Konfirmasi Perubahan
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
