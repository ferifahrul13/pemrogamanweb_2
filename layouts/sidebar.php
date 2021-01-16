<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Sistem Informasi Toko Sederhana</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SITS</a>
        </div>
        <ul class="sidebar-menu">
            <?php
            if ($_SESSION["level"] == "admin") {
                ?>
                <li>
                    <a class="nav-link" href="?page=home">
                        <i class="fas fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="?page=index_product">
                        <i class="fas fa-boxes"></i> <span>Produk</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="?page=index_category">
                        <i class="fas fa-list-alt"></i> <span>Kategori</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="?page=index_user">
                        <i class="fas fa-users"></i> <span>Pengguna</span>
                    </a>
                </li>
            <?php
            }
            ?>

    </aside>
</div>