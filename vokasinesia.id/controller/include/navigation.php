        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Vokasinesia.id Controller</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <a href="https://www.vokasinesia.id/" target="_blank"><i class="fa fa-external-link"></i> Go to Website</a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="pengaturan-akun"><i class="fa fa-gear fa-fw"></i> Pengaturan Akun</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="do.logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li> 
                        <?php if(roleActivate("role_read", $permissionPost)):?>
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Data Post<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="all-data">Semua Data</a>
                                </li>
                                <li>
                                    <a href="new-data">Tambah Data Baru</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionSlide)):?>
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="all-data-slide">Semua Slide</a>
                                </li>
                                <li>
                                    <a href="new-data-slide">Slide Baru</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionComment)):?>
                        <li>
                            <a href="comments"><i class="fa fa-comments-o fa-fw"></i> Komentar</a>
                        </li>
                        <?php endif; ?>
                        <?php// if ($_SESSION['level']==1): ?>
                        <!--
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Halaman Statis<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="all-static-all">Semua Halaman Statis</a>
                                </li>
                                <li>
                                    <a href="new-static-all">Halaman Statis Baru</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cloud-upload fa-fw"></i> Library Upload<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="library-upload">Semua Library Upload</a>
                                </li>
                                <li>
                                    <a href="library-upload-new">Library Upload Baru</a>
                                </li>
                            </ul>
                        </li>
                        -->
                        <?php if(roleActivate("role_read", $permissionSurvey)):?>
                        <li>
                            <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Survey<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="survey">Semua Survey</a>
                                </li>
                                <li>
                                    <a href="survey-new">Survey Baru</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionCategory)):?>
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Kategori<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="category">Semua Kategori</a>
                                </li>
                                <li>
                                    <a href="category-new">Kategori Baru</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionPengguna)):?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Pengguna<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pengguna">Semua Pengguna</a>
                                </li>
                                <?php if(roleActivate("role_write", $permissionPengguna)):?>
                                <li>
                                    <a href="pengguna-new">Pengguna Baru</a>
                                </li> 
                                <?php endif; ?>                               
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionGroup)):?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Group Pengguna<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="group-pengguna">Semua Group Pengguna</a>
                                </li>
                                <?php if(roleActivate("role_write", $permissionGroup)):?>
                                <li>
                                    <a href="group-pengguna-new">Group Pengguna Baru</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(roleActivate("role_read", $permissionPengaturan)):?>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pengaturan-umum">Pengaturan Umum</a>
                                </li>
                                <li>
                                    <a href="pengaturan-kontak">Pengaturan Kontak</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>