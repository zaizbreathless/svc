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
                                <h4 class="page-title">Info Tapak</h4>
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
						$dariOSC = $rcd['dariOSC'];
						$hantarKP = $rcd['hantarKP'];
						$sediaKP = $rcd['sediaKP'];
						$tahun = $rcd['tahun'];
						$noPermohonan = $rcd['noPermohonan'];
						$no_fail = $rcd['no_fail'];
						$rujukanOSC = $rcd['rujukanOSC'];
						$jenisPermohonan = $rcd['jenisPermohonan'];
						$kategoriProjek = $rcd['kategoriProjek'];
						$jenisPemajuan = $rcd['jenisPemajuan'];
						$kategoriPermohonan = $rcd['kategoriPermohonan'];
						$kaw = $rcd['kaw'];
						$kod = $rcd['kod'];
						$tempoh = $rcd['tempoh'];
						$perkara = $rcd['perkara'];
						$lokasiTapak = $rcd['lokasiTapak'];
						$pemohonPSP = $rcd['pemohonPSP'];
						$firmaPemohon = $rcd['firmaPemohon'];
						$alamatPemohon = $rcd['alamatPemohon'];
						$telPemohon = $rcd['telPemohon'];
						$faxPemohon = $rcd['faxPemohon'];
						$pemilikPemaju = $rcd['pemilikPemaju'];
						$firmaPemaju = $rcd['firmaPemaju'];
						$alamatPemaju = $rcd['alamatPemaju'];
						$telPemaju = $rcd['telPemaju'];
                        $faxPemaju = $rcd['faxPemaju'];
						$username = $rcd['username'];
						$username2 = $rcd['username2'];
                        $daftarOleh = $rcd['daftarOleh'];
						$tarikhDaftar = $rcd['tarikhDaftar'];
						$status_failP = $rcd['status_failP'];
						$memo_failP = $rcd['memo_failP'];
						$luasTapak = $rcd['luasTapak'];
						$luasLantai = $rcd['luasLantai'];
						$sediaPerakuan = $rcd['sediaPerakuan'];
						$kepMesyuarat = $rcd['kepMesyuarat'];
						$pelanStruktur = $rcd['pelanStruktur'];
						$terimaPelanStruktur = $rcd['terimaPelanStruktur'];
						$pelanSaniteri = $rcd['pelanSaniteri'];
						$terimaPelanSaniteri = $rcd['terimaPelanSaniteri'];
						$kpb = $rcd['kpb'];
                        $kmb = $rcd['kmb'];
						$tarikhBorangB = $rcd['tarikhBorangB'];
                        $tarikhBorangCCC = $rcd['tarikhBorangCCC'];
						$dlmPemantauan = $rcd['dlmPemantauan'];
                        $client = $rcd['client'];
					}

					// $cd = $connect->prepare("SELECT * FROM visits WHERE site_id=$id");
					// $acd = array($id);
					// $cd->execute($acd);
					// while($rcd = $cd->fetch(PDO::FETCH_ASSOC)){
					// 	$visitID = $rcd['id'];
					// 	$laporan = $rcd['laporan'];
					// 	$tindakan = $rcd['tindakan'];
					// 	$pegawai = $rcd['pegawai'];
					// 	$tarikh_lawat = $rcd['tarikh_lawat'];
					// }


					// $lw = $connect->prepare("SELECT * FROM visits WHERE site_id=?");
				 //    $lw->execute($acd);
				 //    $lwt = $lw->rowCount();

				    $fi = $connect->prepare("SELECT * FROM bayaran WHERE tapak_id=?");
				    $fi->execute($acd);
				    $fee = $fi->rowCount();

				    $me = $connect->prepare("SELECT * FROM mesyuarat WHERE tapak_id=?");
				    $me->execute($acd);
				    $meet = $me->rowCount();

				    $fo = $connect->prepare("SELECT * FROM borang WHERE tapak_id=?");
				    $fo->execute($acd);
				    $form = $fo->rowCount();
					
					}
					
					?>




            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div align="center" class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                   <!-- <h4 class="header-title m-t-0 m-b-30">Icon Button</h4>
                                    <p class="text-muted m-b-15 font-13">Icon only button.</p> -->
                                    <a href="http://google.com" class="btn btn-default btn-rounded w-md waves-effect m-b-5"> <i class="fa fa-google m-r-5"></i> <span>Go to Google</span></a>
                                    <?php if($role!='Client'){?>
                                    <a href="?p=Site-Move&id=<?=$id?>" class="btn btn-warning btn-rounded w-md waves-effect waves-light m-b-5"> <i class="fa fa-rocket m-r-5"></i> <span>Pergerakan Fail</span> </a>
                                    <a href="?p=Site-Amend&id=<?=$id?>" class="btn btn-info btn-rounded w-md waves-effect waves-light m-b-5"> <i class="fa fa-cloud m-r-5"></i> <span>Pindaan Fail</span> </a><?php }?>
                                    <a href="?p=Site-Penalty&id=<?=$id?>" class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5"> <i class="fa fa-plane m-r-5"></i> <span>Kompaun</span> </a>
                                    <a href="?p=Site-Visit&id=<?=$id?>" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"> <span>Lawat Tapak</span> <i class="zmdi zmdi-tap-and-play"></i> </a>
                                    <?php if($role=='Super Admin' || $role=='Client'){?>
                                    <a href="?p=Site-File&id=<?=$id?>" class="btn btn-pink btn-rounded w-md waves-effect waves-light m-b-5"> <span>Fail Tapak</span> <i class="fa fa-cloud m-r-5"></i> </a><?php }?>
                                </div>
                            </div>
                        </div>
                        <form action="?p=Edit-Site" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">Info Tapak Bina <strong><a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></strong> didaftar pada <strong><?=$tarikhDaftar?></strong></h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No. Permohonan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$tahun?>/<?=$noPermohonan?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Dari OSC</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$dariOSC?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Sedia KP (Hari)</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$sediaKP?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Hantar KP</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$hantarKP?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Zon</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kaw?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Rujukan BP</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$no_fail?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Rujukan OSC</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$rujukanOSC?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kod Projek</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kod?></font></p>
                                                    </div>
                                                </div>
                                                <?php if ($role=='Super Admin') {?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nama "Client"</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static"><font color="white"><?=$client?></font></p>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Permohonan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$jenisPermohonan?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kategori Projek</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kategoriProjek?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Pemajuan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$jenisPemajuan?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kategori Permohonan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kategoriPermohonan?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Pembangunan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$perkara?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Lokasi</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$lokasiTapak?></font></p>
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
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Info Pemohon</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Pemohon PSP</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$pemohonPSP?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Firma Pemohon</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$firmaPemohon?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Alamat Pemohon</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$alamatPemohon?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Telefon</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$telPemohon?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Fax</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$faxPemohon?></font></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Info Pemaju</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Pemilik / Pemaju</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$pemilikPemaju?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Firma Pemaju</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$firmaPemaju?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Alamat Pemaju</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$firmaPemaju?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Telefon</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$telPemaju?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Fax</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$faxPemaju?></font></p>
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
                                            <div class="col-lg-6">
                                                <h3 class="form-section">LKP</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Luas Tapak (m²)</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$luasTapak?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Luas Lantai (m²)</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$luasLantai?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kertas Perakuan (Tarikh Sedia)</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$sediaPerakuan?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Surat Maklum Kep. Mesyuarat</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kepMesyuarat?></font></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="form-section">PS</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Pelan Struktur</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$pelanStruktur?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Pelan Saniteri</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$pelanSaniteri?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tarikh Terima Pelan Struktur</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$terimaPelanStruktur?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tarikh Terima Pelan Saniteri</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$terimaPelanSaniteri?></font></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="form-section">KPB / KMB</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kelulusan Pelan Bangunan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kpb?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kebenaran Mendirikan Bangunan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$kmb?></font></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Tarikh Borang</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tarikh Kemuka Borang B</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$tarikhBorangB?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tarikh Kemuka Borang CCC</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$tarikhBorangCCC?></font></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Dalam Pemantauan</label>
                                                    <div class="col-sm-10">
                                                      <p class="form-control-static"><font color="white"><?=$dlmPemantauan?></font></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <?php 
                            if($role!='Client'){?>
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
                                                                <button type="submit" class="btn btn-primary waves-effect w-md waves-light m-b-5">Edit Info Tapak Bina</button>
                                                                <button type="button" class="btn btn-default waves-effect w-md waves-light m-b-5" onclick="window.history.back();">Kembali</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <?php }?>
                        </form><!-- end row -->
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Butiran Bayaran <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>
                                    <?php if($fee==0){ ?>
                                        <h4 align="center">Tiada Bayaran.</h4>
                                            <?php {?>
                                            <div class="form-actions">
                                                <form action="?p=Fee-Site" method="POST">
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <input type="hidden" name="id" value="<?=$id?>">
                                                                        <?php 
                                                                        if($role!='Client'){
                                                                            echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Bayaran Baru</button>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php }} else {?>
                                            <?php 

                                            $filterID = $id;
                                            $query = $connect->prepare("SELECT * FROM bayaran WHERE tapak_id LIKE '%$filterID%' ORDER BY id ASC");
                                            $query->bindValue(1, "%$filterID%", PDO::PARAM_STR);
                                            $query->execute();
                                            // Display search result
                                             if (!$query->rowCount() == 0) {            
                                                while ($results = $query->fetch()) {?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>No Bil:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['noBil']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh Bil:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikhBil']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Fi (RM):</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['amaunBil']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>No Resit:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['noResit']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh Resit:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikhResit']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tujuan:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tujuan']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    if($role!='Client'){
                                                     echo "<a onclick=\"return confirm('Anda pasti untuk memadam rekod ini?')\" href=\"?p=Delete-Fee&idd=".$results['id']."\" class=\"btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5\">Padam</a>";   
                                                    }
                                                    ?>
                                                    <br><hr>
                                                <?php }} 
                                            ?>
                                        <form action="?p=Fee-Site" method="POST">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="hidden" name="id" value="<?=$id?>">
                                                            <?php 
                                                            if($role!='Client'){
                                                                echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Bayaran Baru</button>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <?php }?>
                                </div>
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Butiran Mesyuarat <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>
                                    <?php if($meet==0){ ?>
                                        <h4 align="center">Tiada Mesyuarat.</h4>
                                            <?php {?>
                                            <div class="form-actions">
                                                <form action="?p=Meeting-Site" method="POST">
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <input type="hidden" name="id" value="<?=$id?>">
                                                                        <?php 
                                                                        if($role!='Client'){
                                                                            echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Mesyuarat Baru</button>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php }} else {?>
                                            <?php 

                                            $filterID = $id;
                                            $query = $connect->prepare("SELECT * FROM mesyuarat WHERE tapak_id LIKE '%$filterID%' ORDER BY id ASC");
                                            $query->bindValue(1, "%$filterID%", PDO::PARAM_STR);
                                            $query->execute();
                                            // Display search result
                                             if (!$query->rowCount() == 0) {            
                                                while ($results = $query->fetch()) {?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh Mesyuarat:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikhM']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Mesyuarat:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['jenisM']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Bil Mesyuarat:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['bilM']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tujuan:</strong>
                                                                    <?php if ($results['tujuanM']=="Lain-lain")
                                                                        {
                                                                            echo"<span class=\"form-control-static\"><font color=\"white\">".$results['lainMesyuarat']."</font></span>";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tujuanM']."</font></span>";
                                                                        }
                                                                    ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Keputusan:</strong>
                                                                    <?php if ($results['keputusanM']=="Lain-lain")
                                                                        {
                                                                            echo"<span class=\"form-control-static\"><font color=\"white\">".$results['lainKeputusan']."</font></span>";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo"<span class=\"form-control-static\"><font color=\"white\">".$results['keputusanM']."</font></span>";
                                                                        }
                                                                    ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    if($role!='Client'){
                                                     echo "<a onclick=\"return confirm('Anda pasti untuk memadam rekod ini?')\" href=\"?p=Delete-Meeting&idd=".$results['id']."\" class=\"btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5\">Padam</a>";
                                                       
                                                    }
                                                    ?>
                                                    <br><hr>
                                                <?php }} 
                                            ?>
                                        <form action="?p=Meeting-Site" method="POST">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="hidden" name="id" value="<?=$id?>">
                                                            <?php 
                                                            if($role!='Client'){
                                                                echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Mesyuarat Baru</button>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <?php }?>
                                </div>
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Butiran Borang G1-G21/CCC <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>
                                    <?php if($form==0){ ?>
                                        <h4 align="center">Tiada Borang.</h4>
                                            <?php {?>
                                            <div class="form-actions">
                                                <form action="?p=Form-Site" method="POST">
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <input type="hidden" name="id" value="<?=$id?>">
                                                                        <?php 
                                                                        if($role!='Client'){
                                                                            echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Borang Baru</button>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php }} else {?>
                                            <?php 

                                            $filterID = $id;
                                            $query = $connect->prepare("SELECT * FROM borang WHERE tapak_id LIKE '%$filterID%' ORDER BY id ASC");
                                            $query->bindValue(1, "%$filterID%", PDO::PARAM_STR);
                                            $query->execute();
                                            // Display search result
                                             if (!$query->rowCount() == 0) {            
                                                while ($results = $query->fetch()) {?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Borang:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['borang']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Tarikh Borang:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['tarikhBorang']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-8"><strong>Terima Borang:</strong> <?php echo"<span class=\"form-control-static\"><font color=\"white\">".$results['terimaBorang']."</font></span>";?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    if($role!='Client'){
                                                     echo "<a onclick=\"return confirm('Anda pasti untuk memadam rekod ini?')\" href=\"?p=Delete-Form&idd=".$results['id']."\" class=\"btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5\">Padam</a>";
                                                       
                                                    }
                                                    ?>
                                                    <br><hr>
                                                <?php }} 
                                            ?>
                                        <form action="?p=Form-Site" method="POST">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="hidden" name="id" value="<?=$id?>">
                                                            <?php 
                                                            if($role!='Client'){
                                                                echo "<button type=\"submit\" class=\"btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5\"><i class=\"fa fa-pencil\"></i> Borang Baru</button>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <?php }?>
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