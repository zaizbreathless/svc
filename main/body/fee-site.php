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
                                <h4 class="page-title">Pengisian Bayaran Tapak</h4>
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
                        <form action="?p=Input-Fee" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">No Rujukan Pelan: <strong><?=$no_fail?></strong></h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No. Bil</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="noBil" name="noBil" class="form-control required" placeholder="No. Bil">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No. Resit</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="noResit" name="noResit" class="form-control required" placeholder="No. Resit">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Jumlah (RM)</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="amaunBil" name="amaunBil" class="form-control required" placeholder="RM">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Bil</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhBil" name="tarikhBil" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Resit</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhResit" name="tarikhResit" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tujuan</label>
                                                    <div class="col-sm-10">
                                                        <select name="tujuan" type="text" id="tujuan" class="form-control">
                                                            <option type="text" id="tujuan" name="tujuan" value="<?=$tujuan?>"></option>
															<option type="text" id="tujuan" name="tujuan" value="Fee Memproses Pelan">Fee Memproses Pelan</option>
															<option type="text" id="tujuan" name="tujuan" value="Bayaran Tambahan Fee Pelan">Bayaran Tambahan Fee Pelan</option>
															<option type="text" id="tujuan" name="tujuan" value="Yuran Permit">Yuran Permit</option>
                                                        </select>
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
            alert("Bayaran baru berjaya direkod.");
            return true;
        }
        </script>