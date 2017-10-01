        <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">NAVIGASI</li>

                            <li>
                                <a href="./" class="waves-effect active"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <?php if ($role=='Super Admin') {
                                    echo "
                                <li class=\"has_sub\">
                                    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"zmdi zmdi-account-add\"></i> <span> Pengurusan Pengguna </span> <span class=\"menu-arrow\"></span></a>
                                    <ul class=\"list-unstyled\">
                                        <li><a href=\"?p=Add-Users\">Tambah Pengguna</a></li>
                                        <li><a href=\"?p=Users-List\">Senarai Pengguna</a></li>
                                    </ul>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP') {
                                    echo "
                                <li>
                                <a href=\"?p=Add-Site\" class=\"waves-effect\"><i class=\"zmdi zmdi-file-plus\"></i> <span> Tambah Tapak Baru </span> </a>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP') {
                                    echo "
                                <li class=\"has_sub\">
                                    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"zmdi zmdi-collection-text\"></i> <span> Senarai Semua Tapak </span> <span class=\"menu-arrow\"></span></a>
                                    <ul class=\"list-unstyled\">
                                        <li><a href=\"?p=All-Site\">Semua Tapak</a></li>
                                        <li><a href=\"?p=Search-Site\">Carian Tapak</a></li>
                                    </ul>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Utara') {
                                    echo "
                                <li class=\"has_sub\">
                                    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"zmdi zmdi-collection-text\"></i> <span> Tapak Utara </span> <span class=\"menu-arrow\"></span></a>
                                    <ul class=\"list-unstyled\">
                                        <li><a href=\"?p=All-North\">Semua Utara</a></li>
                                        <li><a href=\"?p=North-1\">Tapak Utara 1</a></li>
                                        <li><a href=\"?p=North-2\">Tapak Utara 2</a></li>
                                        <li><a href=\"?p=North-3\">Tapak Utara 3</a></li>
                                    </ul>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Tengah') {
                                    echo "
                                <li class=\"has_sub\">
                                    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"zmdi zmdi-collection-text\"></i> <span> Tapak Tengah </span> <span class=\"menu-arrow\"></span></a>
                                    <ul class=\"list-unstyled\">
                                        <li><a href=\"?p=All-Mid\">Semua Tengah</a></li>
                                        <li><a href=\"?p=Mid-1\">Tapak Tengah 1</a></li>
                                        <li><a href=\"?p=Mid-2\">Tapak Tengah 2</a></li>
                                        <li><a href=\"?p=Mid-3\">Tapak Tengah 3</a></li>
                                        <li><a href=\"?p=Mid-4\">Tapak Tengah 4</a></li>
                                    </ul>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Selatan') {
                                    echo "
                                <li class=\"has_sub\">
                                    <a href=\"javascript:void(0);\" class=\"waves-effect\"><i class=\"zmdi zmdi-collection-text\"></i> <span> Tapak Selatan </span> <span class=\"menu-arrow\"></span></a>
                                    <ul class=\"list-unstyled\">
                                        <li><a href=\"?p=All-South\">Semua Selatan</a></li>
                                        <li><a href=\"?p=South-1\">Tapak Selatan 1</a></li>
                                        <li><a href=\"?p=South-2\">Tapak Selatan 2</a></li>
                                        <li><a href=\"?p=South-3\">Tapak Selatan 3</a></li>
                                    </ul>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Utara' || $role=='Tengah' || $role=='Selatan') {
                                    echo "
                                <li>
                                <a href=\"?p=Visit-Site\" class=\"waves-effect\"><i class=\"zmdi zmdi-folder-star-alt\"></i> <span> Tapak Untuk Dilawat </span> </a>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Utara' || $role=='Tengah' || $role=='Selatan') {
                                    echo "
                                <li>
                                <a href=\"?p=Monitor-Site\" class=\"waves-effect\"><i class=\"zmdi zmdi-layers\"></i> <span> Tapak Sudah Dilawat</span> </a>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='UPP' || $role=='Utara' || $role=='Tengah' || $role=='Selatan') {
                                    echo "
                                <li>
                                <a href=\"?p=CCC-Site\" class=\"waves-effect\"><i class=\"zmdi zmdi-library\"></i> <span> Tapak Siap (CCC)</span> </a>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <?php if ($role=='Super Admin' || $role=='Client') {
                                    echo "
                                <li>
                                <a href=\"?p=Client-Site\" class=\"waves-effect\"><i class=\"zmdi zmdi-library\"></i> <span> Tapak Bina Pelanggan</span> </a>
                                </li>
                                    ";
                                } else {
                                
                                }
                                ?>

                            <li>
                                <a href="../logout/" class="waves-effect active"><i class="zmdi zmdi-power"></i> <span> Keluar </span> </a>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>