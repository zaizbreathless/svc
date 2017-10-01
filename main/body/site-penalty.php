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
                                <h4 class="page-title">Kompaun</h4>
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
            <?php   

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                //GET SITES DETAIL
                $cd = $connect->prepare("SELECT * FROM tapak WHERE id=$id");
                $acd = array($id);
                $cd->execute($acd);

                while($rcd = $cd->fetch(PDO::FETCH_ASSOC)){
                    $id = $rcd['id'];
                    $no_fail = $rcd['no_fail'];
                    $rujukanOSC = $rcd['rujukanOSC'];
                }

                $pe = $connect->prepare("SELECT * FROM kompaun WHERE tapak_id=?");
                $pe->execute($acd);
                $penalty = $pe->rowCount();
                
            }
                
            ?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Senarai Kompaun <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>
                                    <?php if($penalty==0){ ?>
                                        <h4 align="center">Tiada Kompaun.</h4>
                                            <?php {?>
                                            <div class="form-actions">
                                                <form action="?p=Penalty-Site" method="POST">
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <input type="hidden" name="id" value="<?=$id?>">
                                                                        <?php 
                                                                        if($role!='Client'){
                                                                            echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Kompaun Baru</button>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php }} else {?>
                                            <?php 

                                            $filterID = $id;
                                            $query = $connect->prepare("SELECT * FROM kompaun WHERE tapak_id LIKE '%$filterID%' ORDER BY id ASC");
                                            $query->bindValue(1, "%$filterID%", PDO::PARAM_STR);
                                            $query->execute();
                                            // Display search result
                                             if (!$query->rowCount() == 0) {            
                                                while ($results = $query->fetch()) {?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>No Kompaun:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['no_bkb']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Kepada:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['kepada']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Alamat:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['alamat']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Akta:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['akta']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Undang-undang Kecil:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['kecil']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Kesalahan:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['kesalahan']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tempat:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tempat']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikh']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Masa:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['masa']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh Luput:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikh_luput']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>No Rujukan BP:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['no_fail']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>No Rujukan OSC:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['rujukanOSC']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    if($role=='Super Admin' || $role=='UPP'){
                                                     echo "<a onclick=\"return confirm('Anda pasti untuk memadam rekod ini?')\" href=\"?p=Delete-Form&idd=".$results['id']."\" class=\"btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5\">Padam</a>";
                                                       
                                                    }
                                                    ?>
                                                    <br><hr>
                                                <?php }} 
                                            ?>
                                        <form action="?p=Penalty-Site" method="POST">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="hidden" name="id" value="<?=$id?>">
                                                            <?php 
                                                            if($role!='Client'){
                                                                echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Kompaun Baru</button>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <?php }?>
                                </div>
                            </div><!-- end col -->
                        </div>


                    </div><!-- end col -->
                </div>
                        <!-- end row -->

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

