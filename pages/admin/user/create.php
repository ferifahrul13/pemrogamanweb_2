      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="row">
                  <div class="col-lg-12">
                      <form action="/../../function/user.php" method="POST">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Tambah Pengguna</h4>
                              </div>
                              <div class="card-body">

                                  <div class="row">

                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <label>Nama Pengguna</label>
                                              <input type="text" name="nama_user" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Username</label>
                                              <input type="text" name="username" class="form-control">
                                          </div>
                                      </div>
                                      
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>E-Mail</label>
                                              <input type="email" name="email" class="form-control">
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
                                                  <option value="admin">Admin</option>
                                                  <option value="user">User</option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              <div class="card-footer border-top">
                                  <div class="form-group float-right">
                                      <button type="submit" name="simpan" class="btn btn-lg btn-primary">Simpan</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>

          </section>
      </div>