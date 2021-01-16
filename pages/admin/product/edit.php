  <?php
    include __DIR__ . "/../../../function/product.php";
    include __DIR__ . "/../../../function/category.php";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $obj = new Product();
        $product = $obj->find($id);
        if ($product) {
            ?>

          <!-- Main Content -->
          <div class="main-content">
              <section class="section">
                  <div class="row">
                      <div class="col-lg-12">
                          <form action="/../../function/product.php" method="POST">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Edit Produk</h4>
                                  </div>
                                  <div class="card-body">

                                      <div class="row">
                                          <div class="col-sm-2">
                                              <input type="hidden" name="id" value="<?= $product["id"] ?>">
                                              <div class="form-group">
                                                  <label>Kode Produk</label>
                                                  <input type="text" name="kode_produk" value="<?= $product["kode_produk"] ?>" class="form-control">
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Nama Produk</label>
                                                  <input type="text" name="nama_produk" value="<?= $product["nama_produk"] ?>" class="form-control">
                                              </div>
                                          </div>

                                          <div class="col-sm-4">
                                              <div class="form-group">
                                                  <label>Satuan</label>
                                                  <input type="text" name="satuan" value="<?= $product["satuan"] ?>" class="form-control">
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Quantity</label>
                                                  <input type="number" name="qty" value="<?= $product["qty"] ?>" class="form-control">
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
                                                      <input name="harga" type="number" value="<?= $product["harga"] ?>" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Kategori Produk</label>
                                              <?php
                                              $obj = new Category();
                                              $categories = $obj->mapperCategory();
                                              ?>
                                              <select class="form-control" name="kategori_id">
                                                  <option value="">-- Pilih Kategori Produk --</option>
                                                  <?php foreach($categories as $category){ ?>
                                                  <option value="<?= $category["id"] ?>" <?php echo ($product["kategori_id"] == $category["id"]) ?  "selected" : ""; ?>><?= $category["nama_kategori"] ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>


                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Status Produk</label>
                                                  <select class="form-control" name="status">
                                                      <option value="">-- Pilih Status Produk --</option>
                                                      <option value="0" <?php echo ($product["status"] == 0) ?  "selected" : ""; ?>>Nonaktif</option>
                                                      <option value="1" <?php echo ($product["status"] == 1) ?  "selected" : ""; ?>>Aktif</option>
                                                  </select>
                                              </div>
                                          </div>

                                          <!-- deskripsi,status,harga -->
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label>Deskripsi Produk</label>
                                                  <textarea placeholder="Isi dengan deskripsi yang sesuai dengan produk" name="deskripsi" class="form-control" rows="4"><?= $product["deskripsi"] ?></textarea>
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