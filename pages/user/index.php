<h4 class="text-center">TOKO SEDERHANA</h4>
<div class="row">
    <?php
    include __DIR__ . "/../../function/product.php";

    $obj = new Product();
    $products = $obj->mapperProduct();
    foreach ($products as $product) {
        ?>
        <div class="col-sm-3">
            <div class="card border-1">
                <div class="card-body">
                    <strong><?= $product["nama_produk"] ?></strong> <br>
                    Rp.<?= $product["harga_jual"] ?> <br>
                    <strong> Kategori <?= $product["nama_kategori"] ?> </strong><br>
                    <p class="lead"> <?= $product["deskripsi"] ?></p> <br>
                    <div class="float-right">
                    <a href="/index.php?page=detail_product&id=<?= $product["id"] ?>" class="btn btn-success">Detail Produk</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>