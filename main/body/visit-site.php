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
                                <h4 class="page-title">Tapak Untuk Dilawat</h4>
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
                                  <?php 
                                            if ($role=='Super Admin' || $role=='UPP'){

                                            echo "<h4 class=\"header-title m-t-0 m-b-30\">Senarai Tapak Untuk Dilawat</h4>

                                            <table id=\"datatable-buttons\" class=\"table table-striped table-bordered\">
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

                                            $query = $pdo->prepare('SELECT * FROM tapak WHERE tempoh > 0 LIMIT 0 , 100000000000' );

                                            $query->execute();

                                             if (!$query->rowCount() == 0) {
                                                while ($results = $query->fetch()) {
                                        
                                                echo "<tr class=\"odd gradeX-".$results['id']."\">
                                                          
                                                          <td>".$results['kaw']."/<a href=\"?p=Info-Site&id=".$results['id']."\">".$results['noPermohonan']."</a></td>
                                                          <td><a href=\"?p=Info-Site&id=".$results['id']."\">".$results['no_fail']." ".$results['rujukanOSC']."</a></td>
                                                          <td>".$results['kod']."</td>
                                                          <td>".$results['tempoh']."</td>";
                                                            if($results['status_lawat'] == 0 AND $results['tempoh'] >= 1 && $results['tempoh'] <= 59){
                                                echo "         <td><button type=\"button\" class=\"btn btn-primary\">Dalam Perhatian</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 59 && $results['tempoh'] <= 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-warning\">Boleh Dilawat</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">Lewat</button></td>";
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

                                            }elseif ($role=='Super Admin' || $role=='Utara'){

                                            echo "<h4 class=\"header-title m-t-0 m-b-30\">Senarai Tapak Utara Untuk Dilawat</h4>

                                            <table id=\"datatable-buttons\" class=\"table table-striped table-bordered\">
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


                                            $query = $pdo->prepare('SELECT * FROM tapak WHERE tempoh > 0 && kaw LIKE "%U%" LIMIT 0 , 100000000000' );

                                            $query->execute();

                                             if (!$query->rowCount() == 0) {
                                                while ($results = $query->fetch()) {
                                        
                                                echo "<tr class=\"odd gradeX-".$results['id']."\">
                                                          
                                                          <td>".$results['kaw']."/<a href=\"?p=Info-Site&id=".$results['id']."\">".$results['noPermohonan']."</a></td>
                                                          <td><a href=\"?p=Info-Site&id=".$results['id']."\">".$results['no_fail']." ".$results['rujukanOSC']."</a></td>
                                                          <td>".$results['kod']."</td>
                                                          <td>".$results['tempoh']."</td>";
                                                            if($results['status_lawat'] == 0 AND $results['tempoh'] >= 1 && $results['tempoh'] <= 59){
                                                echo "         <td><button type=\"button\" class=\"btn btn-primary\">Dalam Perhatian</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 59 && $results['tempoh'] <= 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-warning\">Boleh Dilawat</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">Lewat</button></td>";
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

                                            }elseif ($role=='Super Admin' || $role=='Tengah'){

                                            echo "<h4 class=\"header-title m-t-0 m-b-30\">Senarai Tapak Tengah Untuk Dilawat</h4>

                                            <table id=\"datatable-buttons\" class=\"table table-striped table-bordered\">
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

                                            $query = $pdo->prepare('SELECT * FROM tapak WHERE tempoh > 0 && kaw LIKE "%T%" LIMIT 0 , 100000000000' );

                                            $query->execute();

                                             if (!$query->rowCount() == 0) {
                                                while ($results = $query->fetch()) {
                                        
                                                echo "<tr class=\"odd gradeX-".$results['id']."\">
                                                          
                                                          <td>".$results['kaw']."/<a href=\"?p=Info-Site&id=".$results['id']."\">".$results['noPermohonan']."</a></td>
                                                          <td><a href=\"?p=Info-Site&id=".$results['id']."\">".$results['no_fail']." ".$results['rujukanOSC']."</a></td>
                                                          <td>".$results['kod']."</td>
                                                          <td>".$results['tempoh']."</td>";
                                                            if($results['status_lawat'] == 0 AND $results['tempoh'] >= 1 && $results['tempoh'] <= 59){
                                                echo "         <td><button type=\"button\" class=\"btn btn-primary\">Dalam Perhatian</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 59 && $results['tempoh'] <= 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-warning\">Boleh Dilawat</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">Lewat</button></td>";
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

                                            }elseif ($role=='Super Admin' || $role=='Selatan'){

                                            echo "<h4 class=\"header-title m-t-0 m-b-30\">Senarai Tapak Selatan Untuk Dilawat</h4>

                                            <table id=\"datatable-buttons\" class=\"table table-striped table-bordered\">
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

                                            $query = $pdo->prepare('SELECT * FROM tapak WHERE tempoh > 0 && kaw LIKE "%S%" LIMIT 0 , 100000000000' );

                                            $query->execute();

                                             if (!$query->rowCount() == 0) {
                                                while ($results = $query->fetch()) {
                                        
                                                echo "<tr class=\"odd gradeX-".$results['id']."\">
                                                          
                                                          <td>".$results['kaw']."/<a href=\"?p=Info-Site&id=".$results['id']."\">".$results['noPermohonan']."</a></td>
                                                          <td><a href=\"?p=Info-Site&id=".$results['id']."\">".$results['no_fail']." ".$results['rujukanOSC']."</a></td>
                                                          <td>".$results['kod']."</td>
                                                          <td>".$results['tempoh']."</td>";
                                                            if($results['status_lawat'] == 0 AND $results['tempoh'] >= 1 && $results['tempoh'] <= 59){
                                                echo "         <td><button type=\"button\" class=\"btn btn-primary\">Dalam Perhatian</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 59 && $results['tempoh'] <= 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-warning\">Boleh Dilawat</button></td>";
                                                          } else if($results['status_lawat'] == 0 AND $results['tempoh'] > 89){
                                                echo "         <td><button type=\"button\" class=\"btn btn-danger\">Lewat</button></td>";
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

                                            }elseif ($role=='Super Admin' || $role=='Psp_Pemaju'){

                                            }else{

                                            }

                                            ?>
                                
                                        </tbody>
                                    </table>
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
