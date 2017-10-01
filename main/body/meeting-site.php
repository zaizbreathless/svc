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
                                <h4 class="page-title">Pengisian Keputusan Mesyuarat</h4>
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
                        <form action="?p=Input-Meeting" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">No Rujukan Pelan: <strong><?=$no_fail?></strong></h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Mesyuarat</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhM" name="tarikhM" value="" class="form-control" placeholder="dd/mm/yyyy">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Bil Mesyuarat</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="bilM" name="bilM" class="form-control required" placeholder="Bil">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mesyuarat</label>
                                                    <div class="col-sm-10">
                                                        <select name="jenisM" type="text" id="jenisM" class="form-control">
                                                            <option type="text" id="jenisM" name="jenisM" value="<?=$jenisM?>"></option>
                                                            <option type="text" id="jenisM" name="jenisM" value="JKTPS">JKTPS</option>
                                                            <option type="text" id="jenisM" name="jenisM" value="JKPS">JKPS</option>
                                                            <option type="text" id="jenisM" name="jenisM" value="JKPS 2">JKPS 2</option>
                                                            <option type="text" id="jenisM" name="jenisM" value="OSA">OSA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tujuan</label>
                                                    <div class="col-md-7">
                                                        <select name="tujuanM" type="text" id="tujuanM" class="select2me form-control">
                                                            <option type="text" id="" name="" value="<?=$tujuanM?>"></option>
                                                            <option type="text" id="" name="" value="Proses Biasa">Proses Biasa</option>
                                                            <option type="text" id="" name="" value="Lapor Semula">Lapor Semula</option>
                                                            <option type="text" id="" name="" value="Rayuan">Rayuan</option>
                                                            <option type="text" id="" name="" value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                        <div class="col-md-14">
                                                        <input type="text" id="lainMesyuarat" name="lainMesyuarat" value="" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Keputusan</label>
                                                    <div class="col-md-7">
                                                        <select name="keputusanM" type="text" id="keputusanM" class="select2me form-control">
                                                            <option type="text" id="" name="" value="<?=$keputusanM?>"></option>
                                                            <option type="text" id="" name="" value="Lulus">Lulus</option>
                                                            <option type="text" id="" name="" value="Lulus Dengan Bersyarat">Lulus Dengan Bersyarat</option>
                                                            <option type="text" id="" name="" value="Ditolak">Ditolak</option>
                                                            <option type="text" id="" name="" value="Ditangguhkan">Ditangguhkan</option>
                                                            <option type="text" id="" name="" value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                        <div class="col-md-14">
                                                        <input type="text" id="lainKeputusan" name="lainKeputusan" value="" class="form-control" >
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
            alert("Mesyuarat baru berjaya direkod.");
            return true;
        }
        </script>

        <script>
        jQuery(document).ready(function() { 

           $('#lainMesyuarat').hide();

           $(document).on("change","#tujuanM", function() {

                var type = $(this).val();
                if(type == 'Lain-lain')
                    $('#lainMesyuarat').show();
                else{
                    $('#lainMesyuarat').hide();
                    $('#lainMesyuarat').val("");
                }   
            }); 

           $('#lainKeputusan').hide();

           $(document).on("change","#keputusanM", function() {

                var type = $(this).val();
                if(type == 'Lain-lain')
                    $('#lainKeputusan').show();
                else{
                    $('#lainKeputusan').hide();
                    $('#lainKeputusan').val("");
                }   
            });

        });
        </script>