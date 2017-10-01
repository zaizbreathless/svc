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
                                <h4 class="page-title">Tapak Saringan</h4>
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
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-30">Senarai Tapak Yang Dicari</h4>

                                    <?php
                                            $kaw = $_POST["kaw"];
                                            $no_fail = $_POST["no_fail"];
                                            $rujukanOSC = $_POST["rujukanOSC"];
                                            $perkara = $_POST["perkara"];
                                            $lokasiTapak = $_POST["lokasiTapak"];
                                            $pemilikPemaju = $_POST["pemilikPemaju"];
                                            $pemohonPSP = $_POST["pemohonPSP"];
                                            $fkpb = $_POST["fkpb"];
                                            $tkpb = $_POST["tkpb"];
                                            $fbB = $_POST["fbB"];
                                            $tbB = $_POST["tbB"];
                                            $fkmb = $_POST["fkmb"];
                                            $tkmb = $_POST["tkmb"];
                                            $fbF = $_POST["fbF"];
                                            $tbF = $_POST["tbF"];

                                            $where = '';
                                            $flag = "0";
                                            $ckaw = "0"; $cno_fail = "0"; $crujukanOSC = "0"; $cperkara = "0"; $clokasiTapak = "0"; $cpemilikPemaju = "0";
                                            $cpemohonPSP = "0"; $ckpb = "0"; $ctarikhBorangB = "0"; $ckmb = "0"; $ctarikhBorangCCC = "0";

                                            $header = "";

                                            if($kaw!=NULL){
                                                $ckaw = "1";
                                                $header .= "1,";
                                                if ($flag == "0"){
                                                   $where .= " WHERE kaw='".$kaw."'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND kaw='".$kaw."'";
                                                }
                                            }

                                            if($no_fail!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE no_fail LIKE '%".$no_fail."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND no_fail LIKE '%".$no_fail."%'";
                                                }
                                            }

                                            if($rujukanOSC!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE rujukanOSC LIKE '%".$rujukanOSC."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND rujukanOSC LIKE '%".$rujukanOSC."%'";
                                                }
                                            }

                                            if($perkara!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE perkara LIKE '%".$perkara."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND perkara LIKE '%".$perkara."%'";
                                                }
                                            }

                                            if($lokasiTapak!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE lokasiTapak LIKE '%".$lokasiTapak."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND lokasiTapak LIKE '%".$lokasiTapak."%'";
                                                }
                                            }

                                            if($pemilikPemaju!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE pemilikPemaju LIKE '%".$pemilikPemaju."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND pemilikPemaju LIKE '%".$pemilikPemaju."%'";
                                                }
                                            }

                                            if($pemohonPSP!=NULL){
                                                if ($flag == "0"){
                                                   $where .= " WHERE pemohonPSP LIKE '%".$pemohonPSP."%'";
                                                   $flag = "1";
                                                } 
                                                else{
                                                    $where .= " AND pemohonPSP LIKE '%".$pemohonPSP."%'";
                                                }
                                            }

                                            if($fkpb!=NULL && $tkpb!=NULL){
                                                $ckpb = "1";
                                                $header .= "2,";
                                                if ($flag == "0"){
                                                    $where .= " WHERE kpb BETWEEN '".$fkpb."' AND '".$tkpb."'";
                                                    $flag = "1";
                                                } 
                                                else{
                                                   $where .= " AND kpb BETWEEN '".$fkpb."' AND '".$tkpb."'";
                                                }
                                            }

                                            if($fbB!=NULL && $tbB!=NULL){
                                                $ctarikhBorangB = "1";
                                                $header .= "3,";
                                                if ($flag == "0"){
                                                    $where .= " WHERE tarikhBorangB BETWEEN '".$fbB."' AND '".$tbB."'";
                                                    $flag = "1";
                                                } 
                                                else{
                                                   $where .= " AND tarikhBorangB BETWEEN '".$fbB."' AND '".$tbB."'";
                                                }
                                            }

                                            if($fkmb!=NULL && $tkmb!=NULL){
                                                $ckmb = "1";
                                                $header .= "4,";
                                                if ($flag == "0"){
                                                    $where .= " WHERE kmb BETWEEN '".$fkmb."' AND '".$tkmb."'";
                                                    $flag = "1";
                                                } 
                                                else{
                                                   $where .= " AND kmb BETWEEN '".$fkmb."' AND '".$tkmb."'";
                                                }
                                            }

                                            if($fbF!=NULL && $tbF!=NULL){
                                                $ctarikhBorangCCC = "1";
                                                $header .= "5,";
                                                if ($flag == "0"){
                                                    $where .= " WHERE tarikhBorangCCC BETWEEN '".$fbF."' AND '".$tbF."'";
                                                    $flag = "1";
                                                } 
                                                else{
                                                   $where .= " AND tarikhBorangCCC BETWEEN '".$fbF."' AND '".$tbF."'";
                                                }
                                            }

                                            $query = $pdo->prepare('SELECT * FROM tapak '.$where );
                                            $sql = 'SELECT * FROM tapak '.$where;
                                            $query->execute();

                                            
                                            if (!$query->rowCount() == 0) { ?>
                                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>BIL</th>
                                                            <th>BP</th>
                                                            <th>OSC</th>
                                                            <th>PROJEK</th>
                                                            <th>LOKASI</th>
                                                            <th>PEMILIK</th>
                                                            <th>PSP</th>
                                                            <?php if($ckaw == "1"){?><th>KAW</th><?php }?>
                                                            <?php if($ckpb == "1"){?><th>KPB</th><?php }?>
                                                            <?php if($ctarikhBorangB == "1"){?><th>BORANG B</th><?php }?>
                                                            <?php if($ckmb == "1"){?><th>KMB</th><?php }?>
                                                            <?php if($ctarikhBorangCCC == "1"){?><th>BORANG F</th><?php }?>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                            <?php
                                                $index = 1;
                                                while ($row = $query->fetch()) {?>
                                                    <tr>
                                                        <td><?php echo $index++;?></td>
                                                        <td><?php echo $row['no_fail'];?></td>
                                                        <td><?php echo $row['rujukanOSC'];?></td>
                                                        <td><?php echo $row['perkara']?></td>
                                                        <td><?php echo $row['lokasiTapak']?></td>
                                                        <td><?php echo $row['pemilikPemaju'];?></td>
                                                        <td><?php echo $row['pemohonPSP'];?></td>
                                                        <?php if($ckaw == "1"){?><td><?php echo $row['kaw'];}?></td>
                                                        <?php if($ckpb == "1"){?><td><?php echo $row['kpb'];}?></td>
                                                        <?php if($ctarikhBorangB == "1"){?><td><?php echo $row['tarikhBorangB'];}?></td>
                                                        <?php if($ckmb == "1"){?><td><?php echo $row['kmb'];}?></td>
                                                        <?php if($ctarikhBorangCCC == "1"){?><td><?php echo $row['tarikhBorangCCC'];}?></td>
                                                    </tr>

                                              <?php  }}else{
                                                echo "<script>alert('Tiada rekod')</script>";
                                              } ?>
                                              </tbody></table><?php



                                    ?>

                                </div>
                                <div class="panel-footer pull-right" style="background-color: rgb(37, 49, 56);">
                                    <form method="POST" action="?p=Pdf-Dom">
                                        <input type="hidden" name="type" value="site">
                                        <input type="hidden" name="data" value="<?=$sql?>">
                                        <input type="hidden" name="header" value="<?=$header?>">
                                        <button type="submit" class="btn btn-success waves-effect w-md waves-light m-b-5">Muat turun laporan</button>
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
//Otherwise, we display a link to log in and to Sign up
?>
<meta http-equiv="refresh" content="0; URL='../'" />
<?php
}
?>
        <?php include 'footer.php'; ?>
