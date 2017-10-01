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
                                <h4 class="page-title">Pindaan Fail</h4>
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
                
            }
                
            ?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <?php 

                                            echo "<h4 class=\"header-title m-t-0 m-b-30\">Senarai Pindaan Untuk Tapak"?> <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a>
                                            <?php echo "</h4>

                                            <table class=\"table table table-hover m-0\">
                                                <thead>
                                                    <tr>
                                                        <th>Kaw/No</th>
                                                        <th>No.BP/OSC</th>
                                                        <th>Kod Kawasan</th>
                                                        <th>Tempoh</th>
                                                        <th>Status</th>
                                                        <th>Pemohon (PSP)</th>
                                                        <th>Pemilik/Projek</th>
                                                    </tr>
                                                </thead>

                                                <tbody>";


                                            $query = $pdo->prepare("SELECT * FROM tapak WHERE pindaan_id=$id ORDER BY id DESC");

                                            $query->execute();

                                             if (!$query->rowCount() == 0) {
                                                while ($results = $query->fetch()) {
                                        
                                                echo "<tr class=\"odd gradeX-".$results['id']."\">
                                                          
                                                          <td>".$results['kaw']."/<a href=\"?p=Info-Site&id=".$results['id']."\">".$results['noPermohonan']."</a></td>
                                                          <td><a href=\"?p=Info-Site&id=".$results['id']."\">".$results['no_fail']." ".$results['rujukanOSC']."</a></td>
                                                          <td>".$results['kod']."</td>
                                                          <td>".$results['tempoh']."</td>";
                                                            if($results['status_lawat'] == 0 AND $results['tempoh'] == 0){
                                                echo "         <td><button type=\"button\" class=\"btn btn-default\">Tiada KMB</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] >= 1 && $results['tempoh'] <= 59){
                                                echo "         <td><button type=\"button\" class=\"btn btn-primary\">Dalam Perhatian</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 59 && $results['tempoh'] <= 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-warning\">Boleh Dilawat</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">Lewat</button></td>";
                                                          } else if($results['status_lawat'] == 1 AND $results['tempoh_lanjut'] >= 0){
                                                echo "         <td><button type=\"button\" class=\"btn btn-success\">Sudah Dilawat</button></td>";
                                                          } else{
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">ERROR</button></td>";
                                                          }
                                                echo "         <td>".$results['pemohonPSP']."</td>
                                                               <td><strong>".$results['pemilikPemaju']."</strong><br>".$results['perkara']."</td>

                                                          
                                                      </tr>";

                                                }
                                            }
                                            else {
                                                //
                                            }

                                            

                                            ?>
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if($role!='Client'){?>
                            <form action="?p=Amend-Site" method="POST">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button type="submit" class="btn btn-custom waves-effect waves-light"><i class="fa fa-pencil"></i> Pindaan Baru</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                            </form><!-- end col -->
                            <?php }?>
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
