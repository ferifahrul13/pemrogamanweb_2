  <?php
    include __DIR__ . "/../../../function/category.php";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $obj = new Category();
        $category = $obj->find($id);
        if ($category) {
            ?>

          <!-- Main Content -->
          <div class="main-content">
              <section class="section">
                  <div class="row">
                      <div class="col-lg-12">
                          <form action="/../../function/category.php" method="POST">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Edit Produk</h4>
                                  </div>
                                  <div class="card-body">

                                      <div class="row">


                                          <div class="col-sm-12">
                                              <input type="hidden" name="id" value="<?= $category["id"] ?>">
                                              <div class="form-group">
                                                  <label>Nama Kategori</label>
                                                  <input type="text" name="nama_kategori" value="<?= $category["nama_kategori"] ?>" class="form-control">
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