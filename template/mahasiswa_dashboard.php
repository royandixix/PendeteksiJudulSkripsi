<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <div style="text-align: center; max-width: 200px; margin: 0 auto;">
            <span class="brand-text font-weight-light">Pendeteksi Kemiripan<br>Judul Skripsi</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user4-160x160.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Mahasiswa</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Menu -->
                <li class="nav-item has-treeview <?php echo (basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'menu-open' : ''); ?>">
                    <a href="mahasiswa.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Judul Skripsi Menu -->
                <li class="nav-item has-treeview <?php echo (basename($_SERVER['PHP_SELF']) == 'cek_kemiripan.php' || basename($_SERVER['PHP_SELF']) == 'hasil_kemiripan.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'cek_kemiripan.php' || basename($_SERVER['PHP_SELF']) == 'hasil_kemiripan.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Tables<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="cek_kemiripan.php?page=cek_kemiripan" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'cek_kemiripan.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Judul Skripsi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="input_skripsi.php?page=input_skripsi" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'input_skripsi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>judul Mahasiswa</p>
                            </a>
                        </li>
                        </a>
                    </li>
                 </ul>
             </li>

                <!-- Settings Menu -->
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


