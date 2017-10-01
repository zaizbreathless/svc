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
                                <h4 class="page-title">Pengisian Pergerakan Fail</h4>
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


				$id = $_POST['id'];
				//GET CUSTOMER DETAIL
				$cd = $connect->prepare("SELECT * FROM tapak WHERE id=$id");
				$acd = array($id);
				$cd->execute($acd);
				while($rcd = $cd->fetch(PDO::FETCH_ASSOC)){

                    $id = $rcd['id'];
					$no_fail = $rcd['no_fail'];
				}
				
			?>



            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <form action="?p=Input-Move" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">No Rujukan Pelan: <strong><a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></strong></h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Hantar Fail kepada</label>
                                                    <div class="col-sm-10">
                                                        <?php 


                                                            try
                                                            {
                                                                     $sql = "SELECT * FROM users";
                                                                     $projresult = $connect->query($sql);
                                                                     $projresult->setFetchMode(PDO::FETCH_ASSOC);

                                                                     echo '<select name="pengguna2" type="text" id="pengguna2" class="select2me form-control">';
                                                                 while ( $row = $projresult->fetch() ) 
                                                                 {
                                                                    echo '<option type="text" id="pengguna2" name="pengguna2" value="'.$row['fullname'].'">'.$row['fullname'].'</option>';
                                                                 }

                                                                 echo '</select>';
                                                                }
                                                                catch (PDOException $e)
                                                                {   
                                                                    die("Some problem getting data from database !!!" . $e->getMessage());
                                                                }


                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status Pergerakan Fail</label>
                                                    <div class="col-sm-10">
                                                        <select name="statusPergerakan" type="text" id="statusPergerakan" class="select2me form-control">
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="<?=$statusPergerakan?>"></option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Semak/Rekod">Semak/Rekod</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Agih Permohonan">Agih Permohonan</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Untuk Makluman/Tindakan">Untuk Makluman/Tindakan</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Proses">Proses</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Untuk Ulasan">Untuk Ulasan</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Pengeluaran Bil">Pengeluaran Bil</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Untuk Perhatian">Untuk Perhatian</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Lawatan Tapak">Lawatan Tapak</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Kertas Perakuan">Kertas Perakuan</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Kelulusan Pelan Bangunan (KPB)">Kelulusan Pelan Bangunan (KPB)</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Kebenaran Mendirikan Bangunan (KMB)">Kebenaran Mendirikan Bangunan (KMB)</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Permit Menjalankan Pembinaaan Kecil">Permit Menjalankan Pembinaaan Kecil</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Lulus Perintah Pembangunan">Lulus Perintah Pembangunan</option>
                                                            <option type="text" id="statusPergerakan" name="statusPergerakan" value="Borang B">Borang B</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Memo</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="memoPergerakan" name="memoPergerakan" class="form-control required" placeholder="Memo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" name="id" value="<?=$id?>">
                                                                <button type="submit" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" onclick="return mess();">Hantar</button>
                                                                <button type="button" class="btn btn-default btn-bordred waves-effect w-md waves-light m-b-5" onclick="window.history.back();">Kembali</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                        </form><!-- end row -->
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

        <script type="text/javascript">
        function mess()
        {
            alert("Pergerakan fail baru berjaya direkod.");
            return true;
        }
        </script>

    