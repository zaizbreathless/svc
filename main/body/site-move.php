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
                                <h4 class="page-title">Pergerakan Fail</h4>
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
                        <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Carta Pergerakan Fail <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>

                                    <table id="mainTable" class="table table-striped m-b-0">
                                        <tr>
                                            <th>
                                                <i class="fa fa-briefcase"></i> Kepada
                                            </th>
                                            <th>
                                                <i class="fa fa-question"></i> Daripada
                                            </th>
                                            <th>
                                                <i class="fa fa-bookmark"></i> Status
                                            </th>
                                            <th>
                                                <i class="fa fa-bookmark"></i> Memo
                                            </th>
                                            <th>
                                                <i class="fa fa-bookmark"></i> Tarikh
                                            </th>
                                        </tr>
                                        <tbody>
                                                <?php 

                                                $filterID = $id;
                                                $query = $pdo->prepare("SELECT * FROM fail_pergerakan WHERE tapak_id LIKE '%$filterID%' ORDER BY id DESC");

                                                $query->execute();

                                                 if (!$query->rowCount() == 0) {
                                                    while ($results = $query->fetch()) {
                                            
                                                    echo "<tr class=\"danger".$results['id']."\">
                                                              <td>".$results['pengguna2']."</td>
                                                              <td>".$results['pengguna']."</td>
                                                              <td>".$results['statusPergerakan']."</td>
                                                              <td>".$results['memoPergerakan']."</td>
                                                              <td>".$results['tarikhPergerakan']."</td>
                                                              
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
                            </div><!-- end col -->
                            <?php 
                            if($role!='Client'){?>
                            <form action="?p=Move-Site" method="POST">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button type="submit" class="btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5"><i class="fa fa-pencil"></i> Pergerakan Baru</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }?>
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

