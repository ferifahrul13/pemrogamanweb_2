<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Produk</h4>
                    </div>
                    <div class="card-body">
                        <a href="/index.php?page=create_product" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Produk</a>
                        <hr class="my-3">
                        <table class="table table-sm table-striped table-responsive-sm table-condesed table-hovered">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    Kode Produk
                                </th>
                                <th>
                                    Nama Produk
                                </th>
                                <th>
                                    Satuan
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga Beli
                                </th>
                                <th>
                                    Harga Jual
                                </th>
                                <th>
                                    Kategori Produk
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Deskripsi
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                include __DIR__ . '/../../../config/connect.php';

                                global $connect;

                                $query = "
                                            SELECT p.id as id_produk,p.kode_produk,p.nama_produk,p.satuan,p.harga_beli,p.harga_jual,p.qty,p.deskripsi,p.status, kategori.nama_kategori
                                            FROM produk as p
                                            INNER JOIN kategori
                                            ON p.kategori_id = kategori.id;
                                            ";

                                $result =  mysqli_query($connect, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $n = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $n; ?>
                                            </td>
                                            <td>
                                                <?= $row['kode_produk']; ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_produk']; ?>
                                            </td>
                                            <td>
                                                <?= $row['satuan']; ?>
                                            </td>
                                            <td>
                                                <?= $row['qty']; ?>
                                            </td>
                                            <td>
                                                <?= $row['harga_beli']; ?>
                                            </td>
                                            <td>
                                                <?= $row['harga_jual']; ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_kategori']; ?>
                                            </td>
                                            <td>
                                                <?= ($row['status'] == 1) ? "<span class='badge badge-success'>AKTIF</span>" : "<span class='badge badge-danger'>NONAKTIF</span>"; ?>
                                            </td>
                                            <td>
                                                <?= $row['deskripsi']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="/index.php?page=edit_product&id=<?= $row['id_produk']; ?>">Edit</a>
                                                <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" href="/index.php?page=delete_product&id=<?= $row['id_produk']; ?>">Hapus</a>
                                            </td>
                                        </tr>
                                <?php
                                        $n++;
                                    }
                                } else {
                                    echo '<tr>' .
                                        '<td>' .
                                        'kosong' .
                                        '</td>' .
                                        '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>