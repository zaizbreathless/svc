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
                                <h4 class="page-title">Galeri</h4>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'side-menu.php'; ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <?php
            $id = $_GET['id'];

            ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row port m-b-20">
                            <div class="portfolioContainer">
                                <?php
                                
                                $stmt = $connect->prepare("SELECT * FROM fail_lawat WHERE lawat_id=$id");
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                ?>
                                <div class="col-sm-6 col-lg-3 col-md-4 natural personal">
                                    <div class="gal-detail thumb">
                                        <img src="./files/<?php echo $row['nama_baru'] ?>" class="thumb-img" >
                                        <div class="caption text-center">
                                            <p><strong><?php echo $row['file_desc'] ?></strong></p>
                                        </div>
                                        <br>
                                        <div class="caption text-center">
                                            <p>
                                                <a href="<?php echo $row['fail_path'] ?>" class="btn btn-primary btn-trans waves-effect w-md waves-warning m-b-5">Muat Turun</a>
                                                <?php 
                                                if($role!='Client'){?>
                                                <a href="?p=Delete-Gallery&idd=<?php echo $row['id'] ?>&nama_baru=<?php echo $row['nama_baru'] ?>" onclick="return confirm('Anda pasti untuk memadam gambar ini?')" class="btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5">Padam</a>
                                                <?php }?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div><!-- end portfoliocontainer-->
                        </div> <!-- End row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    Viz Tech © 2017.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
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
