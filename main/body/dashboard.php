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
                                <h4 class="page-title">Dashboard</h4>
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Inbox</h4>

                                    <div class="inbox-widget nicescroll" style="height: 315px;">

                                        <?php 


                                        $sess = $fullname;
                                        $ll = $connect->prepare("SELECT * FROM tapak WHERE pengguna LIKE '%$sess%' ORDER BY id DESC");
                                        $ll->execute(array(6,9));
                                        while($llr = $ll->fetch(PDO::FETCH_ASSOC)){
                                            
                                            $aa = $llr['no_fail'];
                                            $hh = $connect->prepare('SELECT * FROM tapak WHERE no_fail=?');
                                            $hh->execute(array($aa));
                                            while($grr = $hh->fetch(PDO::FETCH_ASSOC)){$aaa = $grr['no_fail'];}

                                            $an = $llr['pengguna'];
                                            $gg = $connect->prepare('SELECT * FROM tapak WHERE pengguna=?');
                                            $gg->execute(array($an));
                                            while($ggr = $gg->fetch(PDO::FETCH_ASSOC)){$ann = $ggr['pengguna'];}    

                                            $ai = $llr['pengguna2'];
                                            $ih = $connect->prepare('SELECT * FROM tapak WHERE pengguna2=?');
                                            $ih->execute(array($ai));
                                            while($ihr = $ih->fetch(PDO::FETCH_ASSOC)){$aim = $ihr['pengguna2'];}

                                            $aj = $llr['statusPergerakan'];
                                            $ih = $connect->prepare('SELECT * FROM tapak WHERE statusPergerakan=?');
                                            $ih->execute(array($aj));
                                            while($ihr = $ih->fetch(PDO::FETCH_ASSOC)){$ajm = $ihr['statusPergerakan'];}

                                            $af = $llr['memoPergerakan'];
                                            $ih = $connect->prepare('SELECT * FROM tapak WHERE memoPergerakan=?');
                                            $ih->execute(array($af));
                                            while($ihr = $ih->fetch(PDO::FETCH_ASSOC)){$afm = $ihr['memoPergerakan'];}

                                            $as = $llr['tarikhPergerakan'];
                                            $ia = $connect->prepare('SELECT * FROM tapak WHERE tarikhPergerakan=?');
                                            $ia->execute(array($as));
                                            while($ihr = $ia->fetch(PDO::FETCH_ASSOC)){$asm = $ihr['tarikhPergerakan'];}

                                        ?>
                                            
                                        <a href="?p=Info-Site&id=<?=$llr['id']?>">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"></div>
                                                <p class="inbox-item-author"><b><?=$llr['no_fail']?></b></p>
                                                <p class="inbox-item-text">Daripada : <b><?=$aim?></b><br> Status : <b><?=$ajm?></b><br> Memo : <b><?=$afm?></b></p>
                                                <p class="inbox-item-date"><?=$asm?></p>
                                            </div>
                                        </a>
                                        
                                        <?php }?>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-8">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Latest Projects</h4>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Assign</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Adminto Admin v1</td>
                                                    <td>01/01/2016</td>
                                                    <td>26/04/2016</td>
                                                    <td><span class="label label-danger">Released</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Adminto Frontend v1</td>
                                                    <td>01/01/2016</td>
                                                    <td>26/04/2016</td>
                                                    <td><span class="label label-success">Released</span></td>
                                                    <td>Adminto admin</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Adminto Admin v1.1</td>
                                                    <td>01/05/2016</td>
                                                    <td>10/05/2016</td>
                                                    <td><span class="label label-pink">Pending</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Adminto Frontend v1.1</td>
                                                    <td>01/01/2016</td>
                                                    <td>31/05/2016</td>
                                                    <td><span class="label label-purple">Work in Progress</span>
                                                    </td>
                                                    <td>Adminto admin</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Adminto Admin v1.3</td>
                                                    <td>01/01/2016</td>
                                                    <td>31/05/2016</td>
                                                    <td><span class="label label-warning">Coming soon</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>

                                                <tr>
                                                    <td>6</td>
                                                    <td>Adminto Admin v1.3</td>
                                                    <td>01/01/2016</td>
                                                    <td>31/05/2016</td>
                                                    <td><span class="label label-primary">Coming soon</span></td>
                                                    <td>Adminto admin</td>
                                                </tr>

                                                <tr>
                                                    <td>7</td>
                                                    <td>Adminto Admin v1.3</td>
                                                    <td>01/01/2016</td>
                                                    <td>31/05/2016</td>
                                                    <td><span class="label label-primary">Coming soon</span></td>
                                                    <td>Adminto admin</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">
                                    
                                    <h4 class="header-title m-t-0 m-b-30">Jumlah Tapak Utara</h4>

                                    <?php
                                    $query = $connect->query('SELECT * FROM tapak WHERE kaw LIKE "%U%"');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" type="hidden" value="100"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0" data-plugin="counterup"><?php echo $query->rowCOunt();?></h2>
                                            <p class="text-muted">Utara</p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Jumlah Tapak Tengah</h4>

                                    <?php
                                    $query = $connect->query('SELECT * FROM tapak WHERE kaw LIKE "%T%"');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                               data-bgColor="#FFE6BA" type="hidden" value="100"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>


                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted">Tengah</p>
                                        </div>
                                    </div>


                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Jumlah Tapak Selatan</h4>

                                    <?php
                                    $query = $connect->query('SELECT * FROM tapak WHERE kaw LIKE "%S%"');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#35b8e0"
                                               data-bgColor="#B8E6F4" type="hidden" value="100"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted">Selatan</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Jumlah Semua Tapak</h4>

                                    <?php
                                    $query = $connect->query('SELECT * FROM tapak');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#10c469"
                                               data-bgColor="#AAE2C6" type="hidden" value="100"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted">Semua</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Tapak Sudah Dilawat</h4>

                                    <?php

                                    $query = $connect->query("SELECT * FROM tapak WHERE status_lawat = 1 AND tempoh >= 0 ");
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-success pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?>  </h2>
                                            <p class="text-muted m-b-25">Sudah Dilawat</p>
                                        </div>

                                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 100%;">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Tapak Boleh Dilawat</h4>

                                    <?php
                                    $query = $connect->query('SELECT * FROM tapak WHERE status_lawat = 0 AND tempoh >= 59 && tempoh <= 89');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-primary pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted m-b-25">Boleh Dilawat</p>
                                        </div>

                                        <div class="progress progress-bar-primary-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                                 aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 100%;">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <!-- <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Tapak Yang Lewat</h4>

                                    <?php

                                    $query = $connect->query('SELECT * FROM tapak WHERE status_lawat = 0 AND tempoh >= 90');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-pink pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted m-b-25">Tapak Lewat</p>
                                        </div>

                                        <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-pink" role="progressbar"
                                                 aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 100%;">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div> -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Tapak Dalam Perhatian</h4>

                                    <?php

                                    $query = $connect->query('SELECT * FROM tapak WHERE status_lawat = 0 AND tempoh >= 1 && tempoh <= 59');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-purple pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted m-b-25">Dalam Perhatian</p>
                                        </div>

                                        <div class="progress progress-bar-purple-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-purple" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 100%;">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Tapak Tiada KMB</h4>

                                    <?php

                                    $query = $connect->query('SELECT * FROM tapak WHERE kmb = 0');
                                    if($query->rowCOunt()){
                                        
                                    }
                                    ?>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-warning pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0" data-plugin="counterup"> <?php echo $query->rowCOunt();?> </h2>
                                            <p class="text-muted m-b-25">Tiada KMB</p>
                                        </div>

                                        <div class="progress progress-bar-warning-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 100%;">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <?php

                                        $query = $connect->query('SELECT * FROM tapak WHERE tarikhBorangCCC != 0');
                                        if($query->rowCOunt()){
                                            
                                        }
                                        ?>
                                        <h2 class="text-custom" data-plugin="counterup"><?php echo $query->rowCOunt();?></h2>
                                        <h5>Tapak Siap / CCC</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 class="text-pink" data-plugin="counterup">5894</h2>
                                        <h5>Total Revenue</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 class="text-warning" data-plugin="counterup">452</h2>
                                        <h5>Sales Analytics</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 class="text-info" data-plugin="counterup">1254</h2>
                                        <h5>Daily Sales</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-lg-4">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0">Daily Sales</h4>

                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example"style="height: 245px;"></div>
                                        <ul class="list-inline chart-detail-list m-b-0">
                                            <li>
                                                <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>Series A</h5>
                                            </li>
                                            <li>
                                                <h5 style="color: #5b69bc;"><i class="fa fa-circle m-r-5"></i>Series B</h5>
                                            </li>
                                        </ul>
                                	</div>
                        		</div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Statistics</h4>
                                    <div id="morris-bar-example" style="height: 280px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Total Revenue</h4>
                                    <div id="morris-line-example" style="height: 280px;"></div>
                                </div>
                            </div>

                        </div> -->

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
