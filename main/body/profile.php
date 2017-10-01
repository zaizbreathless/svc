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
                                <h4 class="page-title">Profil Pengguna</h4>
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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    
                                    <h4 class="header-title m-t-0 m-b-30">Profil</h4>

                                    <form action="#" data-parsley-validate novalidate>
                                        

                                        <div class="form-group">
                                        <input type="hidden" class="form-control" name="fullname" id="fullname" value="<?php echo $fullname; ?>" />
                                        <label for="email" class="control-label">Nama</label> : <?php echo $fullname; ?>
                                        </div>
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" name="username" id="username" value="<?php echo $username; ?>" />
                                        <label for="email" class="control-label">Email</label> : <?php echo $email; ?>
                                        <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
                                        </div>
                                        <div class="form-group">
                                        <label for="role" class="control-label">Peranan</label> : <?php echo $role; ?>
                                        <input type="hidden" class="form-control" name="role" id="role" value="<?php echo $role; ?>" />
                                        </div>
                                        <h3>Tukar Kata Laluan</h3>
                                        <!-- <div class="form-group">
                                            <label for="pass1">Kata Laluan*</label>
                                            <input id="pass1" type="password" placeholder="Password" required
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Kata Laluan*</label>
                                            <input data-parsley-equalto="#pass1" type="password" required
                                                   placeholder="Password" class="form-control" id="passWord2">
                                        </div> -->

                                        <div class="form-group">
                                        <label for="password" class="control-label">Kata Laluan</label><input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>" />
                                        </div>
                                        <div class="form-group">
                                        <label for="passverif" class="control-label">Kata Laluan (Ulang)</label><input type="password" class="form-control" name="passverif" id="passverif" value="<?php echo $password; ?>" />
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Kemaskini</button>
                                            <button type="button" class="btn btn-default waves-effect waves-light" onclick="window.history.back();">Batal</button>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

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
?>
To access this page, you must be logged.<br />
<a href="../login/">Log in</a>
<?php
}
?>  
        <?php include 'footer.php'; ?>
