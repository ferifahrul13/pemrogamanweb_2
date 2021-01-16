<?php
//  session_start();
//  var_dump($_SESSION) and die();
if (!isset($_SESSION["username"])) {
    header("location: /index.php?page=login");
}
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Home</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        include __DIR__ . "/../../function/product.php";
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                            $obj = new Product();
                            $product = $obj->find($id);

                            if ($product) {
                                ?>
                                <form action="../../function/transaction.php" method="POST">
                                    <strong><?= $product["nama_produk"] ?></strong> <br>
                                    <input type="hidden" name="id" value="<?= $product["id"] ?>">
                                    Rp.<?= $product["harga"] ?> <br>
                                    Tersedia <?= $product["qty"] ?> <?= $product["satuan"] ?> <br>
                                    <p class="lead"> <?= $product["deskripsi"] ?></p> <br>
                                    <div class="form-group">
                                        <label>Jumlah beli</label>
                                        <div class="input-group">
                                    <input type="number" class="form-control col-sm-3" name="qty">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <?= $product["satuan"] ?>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="buy" class="btn btn-success">Beli</a>
                                    </div>
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>