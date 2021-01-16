  <?php
    include __DIR__ . "/../../../function/user.php";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $obj = new User();
        $user = $obj->find($id);
        if ($user) {
            ?>

          <!-- Main Content -->
          <div class="main-content">
              <section class="section">
                  <div class="row">
                      <div class="col-lg-12">
                          <form action="/../../function/user.php" method="POST">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Edit Pengguna</h4>
                              </div>
                              <div class="card-body">

                                  <div class="row">

                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                              <label>Nama Pengguna</label>
                                              <input type="text" value="<?= $user["nama_user"] ?>" name="nama_user" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Username</label>
                                              <input type="text" value="<?= $user["username"] ?>" name="username" class="form-control">
                                          </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>E-Mail</label>
                                              <input type="email" value="<?= $user["email"] ?>" name="email" class="form-control">
                                          </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <label>Password</label>
                                              <input type="text" name="password" class="form-control">
                                          </div>
                                      </div>
                                      
                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <label>Level Akses</label>
                                              <select name="level" class="form-control">
                                                  <option value="">-- Pilih Level Akses --</option>
                                                  <option value="admin"  <?php echo ($user["level"] == "admin") ?  "selected" : ""; ?>>Admin</option>
                                                  <option value="user"  <?php echo ($user["level"] == "user") ?  "selected" : ""; ?>>User</option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              <div class="card-footer border-top">
                                  <div class="form-group float-right">
                                      <button type="submit" name="update" class="btn btn-lg btn-primary">Simpan</button>
                                  </div>
                              </div>
                          </div>
                          </form>
                      </div>
              </section>
          </div>

  <?php
        }
    }
    ?>