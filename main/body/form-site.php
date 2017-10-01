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
                                <h4 class="page-title">Pengisian Borang G1-G21/CCC</h4>
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
					$no_fail = $rcd['no_fail'];
				}
				
			?>



            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <form action="?p=Input-Form" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">No Rujukan Pelan: <strong><?=$no_fail?></strong></h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Borang</label>
                                                    <div class="col-sm-10">
                                                        <select name="borang" type="text" id="borang" class="form-control">
                                                            <option type="text" id="borang" name="borang" value="<?=$borang?>"></option>
                                                            <option type="text" id="borang" name="borang" value="F: Perakuan Siap dan Pematuhan">F: Perakuan Siap dan Pematuhan</option>
                                                            <option type="text" id="borang" name="borang" value="F1: Perakuan Siap dan Pematuhan Sebahagian">F1: Perakuan Siap dan Pematuhan Sebahagian</option>
                                                            <option type="text" id="borang" name="borang" value="B: Notis Memulakan/Penyambungan Semula Kerja Bangunan">B: Notis Memulakan/Penyambungan Semula Kerja Bangunan</option>
                                                            <option type="text" id="borang" name="borang" value="G1-G3: Perakuan Berperingkat: Pemancangan Tanda; Asas Tapak; Struktur">G1-G3: Perakuan Berperingkat: Pemancangan Tanda; Asas Tapak; Struktur</option>
                                                            <option type="text" id="borang" name="borang" value="G1-G21: Perakuan Berperingkat">G1-G21: Perakuan Berperingkat</option>
                                                            <option type="text" id="borang" name="borang" value="G1: Perakuan Berperingkat : Kerja-kerja Tanah">G1: Perakuan Berperingkat : Kerja-kerja Tanah</option>
                                                            <option type="text" id="borang" name="borang" value="G2: Perakuan Berperingkat : Pemancangan Tanda">G2: Perakuan Berperingkat : Pemancangan Tanda</option>
                                                            <option type="text" id="tujuanM" name="tujuanM" value="G3: Perakuan Berperingkat : Asas Tapak">G3: Perakuan Berperingkat : Asas Tapak</option>
                                                            <option type="text" id="tujuanM" name="tujuanM" value="G4: Perakuan Berperingkat : Struktur">G4: Perakuan Berperingkat : Struktur</option>
                                                            <option type="text" id="tujuanM" name="tujuanM" value="G12: Perakuan Berperingkat : Bangunan">G12: Perakuan Berperingkat : Bangunan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Borang</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhBorang" name="tarikhBorang" value="" class="form-control" placeholder="dd/mm/yyyy">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Terima Borang</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="terimaBorang" name="terimaBorang" value="" class="form-control" placeholder="dd/mm/yyyy">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
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
            alert("Borang baru berjaya direkod.");
            return true;
        }
        </script>