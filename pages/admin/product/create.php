      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="row">
                  <div class="col-lg-12">
                      <form action="/../../function/product.php" method="POST" enctype="multipart/form-data">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Tambah Produk</h4>
                              </div>
                              <div class="card-body">

                                  <div class="row">
                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label>Kode Produk</label>
                                              <input type="text" name="kode_produk" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nama Produk</label>
                                              <input type="text" name="nama_produk" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-4">
                                          <div class="form-group">
                                              <label>Satuan</label>
                                              <input type="text" name="satuan" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Quantity</label>
                                              <input type="number" name="qty" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Harga</label>
                                              <div class="input-group">
                                                  <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                          Rp.
                                                      </div>
                                                  </div>
                                                  <input name="harga" type="number" class="form-control">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Kategori Produk</label>
                                              <select class="form-control" name="kategori_id">
                                                  <option value="">-- Pilih Kategori Produk --</option>
                                                  <option value="1">Sembako</option>
                                              </select>
                                          </div>
                                      </div>


                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Status Produk</label>
                                              <select class="form-control" name="status">
                                                  <option value="">-- Pilih Status Produk --</option>
                                                  <option value="0">Nonaktif</option>
                                                  <option value="1">Aktif</option>
                                              </select>
                                          </div>
                                      </div>

                                      <!-- deskripsi,status,harga -->
                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <label>Deskripsi Produk</label>
                                              <textarea placeholder="Isi dengan deskripsi yang sesuai dengan produk" name="deskripsi" class="form-control" rows="4"></textarea>
                                          </div>
                                      </div>



                                      <!-- <div class="col-sm-4">
                                          <div class="form-group">
                                              <label>Foto Produk</label>
                                              <input type="file" name="foto_produk" class="form-control">
                                          </div>
                                      </div> -->

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