<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kategori</h4>
                    </div>
                    <div class="card-body">
                        <a href="/index.php?page=create_category" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i>Kategori</a>
                        <hr class="my-3">
                        <table class="table table-sm table-striped table-responsive-sm table-condesed table-hovered">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    Nama Kategori
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
                                            SELECT *
                                            FROM kategori
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
                                                <?= $row['nama_kategori']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="/index.php?page=edit_category&id=<?= $row['id']; ?>">Edit</a>
                                                <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" href="/index.php?page=delete_category&id=<?= $row['id']; ?>">Hapus</a>
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