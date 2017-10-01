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
                                <h4 class="page-title">Semua Tapak</h4>
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

                                    <h4 class="header-title m-t-0 m-b-30">Carian</h4>
                                    <form action="?p=Filtered-Site" method="post" class="form-horizontal" role="form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Zon</label>
                                                    <div class="col-sm-10">
                                                        <select name="kaw" type="text" id="kaw" class="form-control">
                                                            <option value="">Pilih Kawasan</option>
                                                            <option type="text" id="kaw" name="kaw" value="U1">U1</option>
                                                            <option type="text" id="kaw" name="kaw" value="U2">U2</option>
                                                            <option type="text" id="kaw" name="kaw" value="U3">U3</option>
                                                            <option type="text" id="kaw" name="kaw" value="T1">T1</option>
                                                            <option type="text" id="kaw" name="kaw" value="T2">T2</option>
                                                            <option type="text" id="kaw" name="kaw" value="T3">T3</option>
                                                            <option type="text" id="kaw" name="kaw" value="T4">T4</option>
                                                            <option type="text" id="kaw" name="kaw" value="S1">S1</option>
                                                            <option type="text" id="kaw" name="kaw" value="S2">S2</option>
                                                            <option type="text" id="kaw" name="kaw" value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Rujukan BP</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="no_fail" name="no_fail" class="form-control" placeholder="No BP">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Rujukan OSC</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="rujukanOSC" name="rujukanOSC" class="form-control" placeholder="No OSC">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Perkara</label>
                                                    <div class="col-md-10">
                                                        <textarea id="perkara" name="perkara" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Lokasi</label>
                                                    <div class="col-md-10">
                                                        <textarea id="lokasiTapak" name="lokasiTapak" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pemilik</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pemilikPemaju" name="pemilikPemaju" class="form-control" placeholder="Pemilik / Pemaju">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">PSP</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pemohonPSP" name="pemohonPSP" class="form-control" placeholder="Pemohon PSP">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">KPB Dari</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="fkpb" name="fkpb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">KPB Ke</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tkpb" name="tkpb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Borang B Dari</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="fbB" name="fbB" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Borang B Ke</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tbB" name="tbB" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">KMB Dari</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="fkmb" name="fkmb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">KMB Ke</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tkmb" name="tkmb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Borang F Dari</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="fbF" name="fbF" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Borang F Ke</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tbF" name="tbF" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Hantar</button>
                                                            <button type="reset" class="btn btn-default waves-effect m-l-5">Reset</button>
                                                            <button type="button" class="btn" onclick="window.history.back();">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- end col -->
                        </div>


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
