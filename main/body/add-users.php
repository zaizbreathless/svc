<?php include 'body/header.php'; ?>

        <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
            <?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
?>
            <!-- Top Bar Start -->
            <div class="topbar">
            <?php include 'top.php'; ?>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <h4 class="page-title">Tambah Pengguna</h4>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'side-menu.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <form action="?p=Input-Users" method="post" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">Tambah Pengguna Baru</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nama Penuh</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="fullname" name="fullname" class="form-control required" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Staf</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="staff_id" name="staff_id" class="form-control required" placeholder="No Gaji">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nama Pengguna</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="username" name="username" class="form-control required" placeholder="Untuk Staf DBKL sila nyatakan No Gaji">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kata Laluan</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="password" name="password" class="form-control required" placeholder="No IC">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" id="email" name="email" class="form-control required" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Peranan</label>
                                                    <div class="col-sm-10">
                                                        <select name="role" type="text" id="role" class="form-control">
                                                            <option value="">Pilih Peranan</option>
                                                            <option type="text" id="role" name="role" value="Utara">Utara</option>
                                                            <option type="text" id="role" name="role" value="Tengah">Tengah</option>
                                                            <option type="text" id="role" name="role" value="Selatan">Selatan</option>
                                                            <option type="text" id="role" name="role" value="UPP">UPP</option>
                                                            <option type="text" id="role" name="role" value="Client">Client</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" onclick="return mess();">Hantar</button>
                                                            <button type="reset" class="btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5">Reset</button>
                                                            <button type="button" class="btn btn-default btn-bordred waves-effect w-md waves-light m-b-5" onclick="window.history.back();">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         </form><!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
                <footer class="footer">
                    Viz Tech © 2017.
                </footer>

            </div>













            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->




        <!-- END wrapper -->
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<meta http-equiv="refresh" content="0; URL='../'" />
<?php
}
?>
        <?php include 'footer.php'; ?>

        <script type="text/javascript">
        function mess()
        {
            alert("Pengguna baru berjaya ditambah.");
            return true;
        }
        </script>
