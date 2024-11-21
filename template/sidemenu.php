<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
        <span class="brand-text font-weight-bold">Pendeteksi Kemiripan<br>Judul Skripsi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 d-flex">
            <div class="image">
                <img src="dist/img/user3-160x160.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="home.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Tables Section -->
                <li class="nav-item has-treeview <?php echo (basename($_SERVER['PHP_SELF']) == 'judul_skripsi.php' || basename($_SERVER['PHP_SELF']) == 'hasil_kemiripan.php' || basename($_SERVER['PHP_SELF']) == 'judul_mahasiswa.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="judul_skripsi.php?page=judul_skripsi" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'judul_skripsi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Judul Skripsi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="hasil_kemiripan.php?page=hasil_kemiripan" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'hasil_kemiripan.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Kemiripan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="judul_mahasiswa.php?page=judul_mahasiswa" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'judul_mahasiswa.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Judul Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Management User Menu -->
                <li class="nav-item has-treeview <?php echo basename($_SERVER['PHP_SELF']) == 'data_user.php' ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'data_user.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Management User<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="data_user.php?page=data_user" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'data_user.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <a href="log_activity.php?page=log_activity" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Aktivitas</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
