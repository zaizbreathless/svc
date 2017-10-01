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
                                <h4 class="page-title">Tambah Tapak</h4>
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
                        <form action="?p=Input-Site" method="post" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h3 class="form-section">Pengisian Info Tapak</h3>
                                        <div class="row">
                                            <h4 class="form-section">No Akhir = 
                                                <?php 
                                                    $query = $pdo->prepare('SELECT MAX(noPermohonan) AS noPermohonan FROM tapak WHERE tahun = 2017' );

                                                    $query->execute();

                                                    if (!$query->rowCount() == 0) {
                                                        while ($results = $query->fetch()) {
                                                
                                                        echo "".$results['noPermohonan']."";
                                                        }
                                                    }
                                                ?>
                                            </h4>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No. Permohonan</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="noPermohonan" name="noPermohonan" class="form-control required" placeholder="Nombor Baru">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tahun</label>
                                                    <div class="col-sm-10">
                                                        <select name="tahun" type="text" id="tahun" class="form-control">
                                                            <option value="">Pilih Tahun</option>
                                                            <option type="text" id="tahun" name="tahun" value="2014">2014</option>
                                                            <option type="text" id="tahun" name="tahun" value="2015">2015</option>
                                                            <option type="text" id="tahun" name="tahun" value="2016">2016</option>
                                                            <option type="text" id="tahun" name="tahun" value="2017">2017</option>
                                                            <option type="text" id="tahun" name="tahun" value="2018">2018</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Dari OSC</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="dariOSC" name="dariOSC" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Sedia KP (Hari)</label>
                                                    <div class="col-sm-10">
                                                        <select name="sediaKP" type="text" id="sediaKP" class="form-control">
                                                            <option value="">Pilih Hari</option>
                                                            <option type="text" id="sediaKP" name="sediaKP" value="1">1</option>
                                                            <option type="text" id="sediaKP" name="sediaKP" value="3">3</option>
                                                            <option type="text" id="sediaKP" name="sediaKP" value="7">7</option>
                                                            <option type="text" id="sediaKP" name="sediaKP" value="14">14</option>
                                                            <option type="text" id="sediaKP" name="sediaKP" value="30">30</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                                                        <input type="text" id="rujukanOSC" name="rujukanOSC" class="form-control" placeholder=" No OSC">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kod Projek</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="kod" name="kod" class="form-control" placeholder="Nama Kod">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Permohonan</label>
                                                    <div class="col-sm-10">
                                                        <select name="jenisPermohonan" type="text" id="jenisPermohonan" class="form-control">
                                                            <option value="">Pilih Jenis Permohonan</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A01 - Serentak: PU+KM+PB+PJ">A01 - Serentak: PU+KM+PB+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A02 - Serentak: PP+KM+PB+PJ">A02 - Serentak: PP+KM+PB+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A03 - Serentak: PU+KM+PB">A03 - Serentak: PU+KM+PB</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A04 - Serentak: PP+KM+PB">A04 - Serentak: PP+KM+PB</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A05 - Serentak: PU+KM+PJ">A05 - Serentak: PU+KM+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A06 - Serentak: PP+KM+PJ">A06 - Serentak: PP+KM+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A07 - Serentak: KM+PB+PJ">A07 - Serentak: KM+PB+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A08 - Serentak: PU+KM">A08 - Serentak: PU+KM</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A09 - Serentak: PP+KM">A09 - Serentak: PP+KM</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A10 - Serentak: KM+PB">A10 - Serentak: KM+PB</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A11 - Serentak: KM+PJ">A11 - Serentak: KM+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A12 - Serentak: PB+PJ">A12 - Serentak: PB+PJ</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A13 - Kebenaran Merancang (KM)">A13 - Kebenaran Merancang (KM)</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="A14 - Pelan Kejuruteraan (PJ)">A14 - Pelan Kejuruteraan (PJ)</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="B1 - Pelan Bangunan (PB)">B1 - Pelan Bangunan (PB)</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="B2 - Permit Pembinaan Kecil">B2 - Permit Pembinaan Kecil</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="B3 - Permit Sementara Bangunan">B3 - Permit Sementara Bangunan</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="B4 - Pelan Sanitari">B4 - Pelan Sanitari</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="B5 - Pelan Konkrit Tetulang">B5 - Pelan Konkrit Tetulang</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="C1 - Permohonan CFO">C1 - Permohonan CFO</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="D1 - Notis Penyiapan Berperingkat Sub-struktur">D1 - Notis Penyiapan Berperingkat Sub-struktur</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="D2 - Laporan Ketidakpatuhan Sistem CCC">D2 - Laporan Ketidakpatuhan Sistem CCC</option>
                                                            <option type="text" id="jenisPermohonan" name="jenisPermohonan" value="Pelbagai (Kebenaran Meroboh Bangunan)">Pelbagai (Kebenaran Meroboh Bangunan)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kategori Projek</label>
                                                    <div class="col-sm-10">
                                                        <select name="kategoriProjek" type="text" id="kategoriProjek" class="form-control">
                                                            <option value="">Pilih Kategori Projek</option>
                                                            <option type="text" id="kategoriProjek" name="kategoriProjek" value="A : Projek Biasa">A : Projek Biasa</option>
                                                            <option type="text" id="kategoriProjek" name="kategoriProjek" value="B : Bina Kemudian Jual">B : Bina Kemudian Jual</option>
                                                            <option type="text" id="kategoriProjek" name="kategoriProjek" value="C : Projek Kerajaan">C : Projek Kerajaan</option>
                                                            <option type="text" id="kategoriProjek" name="kategoriProjek" value="D : Impak Tinggi">D : Impak Tinggi</option>
                                                            <option type="text" id="kategoriProjek" name="kategoriProjek" value="E : Pelabur Asing">E : Pelabur Asing</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Pemajuan</label>
                                                    <div class="col-sm-10">
                                                        <select name="jenisPemajuan" type="text" id="jenisPemajuan" class="form-control">
                                                            <option value="">Pilih Jenis Pemajuan</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="A : Perumahan">A : Perumahan</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="B : Bercampur">B : Bercampur</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="C : Komersial">C : Komersial</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="D : Industri">D : Industri</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="E : Institusi">E : Institusi</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="F : Kediaman">F : Kediaman</option>
                                                            <option type="text" id="jenisPemajuan" name="jenisPemajuan" value="G : Lain-lain">G : Lain-lain</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Kategori Permohonan</label>
                                                    <div class="col-sm-10">
                                                        <select name="kategoriPermohonan" type="text" id="kategoriPermohonan" class="form-control">
                                                            <option value="">Pilih Kategori Permohonan</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="Pelan Bangunan">Pelan Bangunan</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="Kebenaran Merancang">Kebenaran Merancang</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="Permit Bangunan Sementara">Permit Bangunan Sementara</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="Permit Pembinaan Kecil">Permit Pembinaan Kecil</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="Permit Sementara-Telco">Permit Sementara-Telco</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="KUL Submission">KUL Submission</option>
                                                            <option type="text" id="kategoriPermohonan" name="kategoriPermohonan" value="1 Submission">1 Submission</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pembangunan</label>
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
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Pengisian Info Pemohon</h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pemohon PSP</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pemohonPSP" name="pemohonPSP" class="form-control" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Firma Pemohon</label>
                                                    <div class="col-md-10">
                                                        <textarea id="firmaPemohon" name="firmaPemohon" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Alamat Pemohon</label>
                                                    <div class="col-md-10">
                                                        <textarea id="alamatPemohon" name="alamatPemohon" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Telefon</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="telPemohon" name="telPemohon" class="form-control" placeholder="Telefon">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Fax</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="faxPemohon" name="faxPemohon" class="form-control" placeholder="Fax">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Pengisian Info Pemaju</h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pemilik/Pemaju</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pemilikPemaju" name="pemilikPemaju" class="form-control" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Firma Pemaju</label>
                                                    <div class="col-md-10">
                                                        <textarea id="firmaPemaju" name="firmaPemaju" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Alamat Pemaju</label>
                                                    <div class="col-md-10">
                                                        <textarea id="alamatPemaju" name="alamatPemaju" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Telefon</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="telPemaju" name="telPemaju" class="form-control" placeholder="Telefon">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Fax</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="faxPemaju" name="faxPemaju" class="form-control" placeholder="Fax">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
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
                                                    <label class="col-md-2 control-label">Luas Tapak Cadangan (m²)</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="luasTapak" name="luasTapak" class="form-control" placeholder="(m²)">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Luas Lantai (m²)</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="luasLantai" name="luasLantai" class="form-control" placeholder="(m²)">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kertas Perakuan (Tarikh Sedia)</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="sediaPerakuan" name="sediaPerakuan" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Surat Maklum Kep. Mesyuarat</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="kepMesyuarat" name="kepMesyuarat" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <h3 class="form-section">PS</h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pelan Struktur (No Fail)</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pelanStruktur" name="pelanStruktur" class="form-control" placeholder="Nombor Struktur">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">No Pelan Saniteri</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="pelanSaniteri" name="pelanSaniteri" class="form-control" placeholder="Nombor Saniteri">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Terima Pelan Struktur</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="terimaPelanStruktur" name="terimaPelanStruktur" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Terima Pelan Saniteri</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="terimaPelanSaniteri" name="terimaPelanSaniteri" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="form-section">KPB / KMB</h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kelulusan Pelan Bangunan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="kpb" name="kpb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kebenaran Mendirikan Bangunan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="kmb" name="kmb" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="form-section">Tarikh Borang</h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Kemuka Borang B</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhBorangB" name="tarikhBorangB" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tarikh Kemuka Borang CCC</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="date" id="tarikhBorangCCC" name="tarikhBorangCCC" class="form-control" placeholder="dd/mm/yyyy" id="datepicker">
                                                            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Dalam Pemantauan</label>
                                                    <div class="col-sm-10">
                                                        <select name="dlmPemantauan" type="text" id="dlmPemantauan" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option type="text" id="dlmPemantauan" name="dlmPemantauan" value="Ya">Ya</option>
                                                            <option type="text" id="dlmPemantauan" name="dlmPemantauan" value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div>      
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="hidden" id="akt" name="akt" value=" DITAMBAH ">
                                                            <button type="submit" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" onclick="return mess();">Hantar</button>
                                                            <button type="reset" class="btn btn-custom btn-bordred waves-effect w-md waves-light m-b-5">Reset</button>
                                                            <button type="button" class="btn btn-default btn-bordred waves-effect w-md waves-light m-b-5" onclick="window.history.back();">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         </form><!-- end row -->
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
        <script type="text/javascript">
        function mess()
        {
            alert("Tapak bina berjaya ditambah.");
            return true;
        }
        </script>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Autocomplete Js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <!-- Plugins Js -->
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">

        // $(document).ready(function(){

        //     $("#pemohonPSP").select2({
        //     placeholder: "PSP",
        //     minimumInputLength: 2,
        //     allowClear: true,
        //     ajax: {
        //         url: "?p=QueryPSP" ,
        //         dataType: 'json',
        //         data: function (params) {
        //             return {
        //                 q: $.trim(params.term)
        //             };
        //         },
        //         processResults: function (data) {
        //             console.log(data);
        //             return {
        //                 results: data
        //             };
        //         },
        //         cache: true
        //     },
        //     escapeMarkup: function (markup) { return markup; },
        //     minimumInputLength: 4,
        //     tags: true
        //     });
        // });

        </script>

        <script>
            jQuery(document).ready(function() {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                  maximumSelectionLength: 2
                });

            });

            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }

            $("input[name='demo1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                postfix: '%'
            });
            $("input[name='demo2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='demo3']").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='demo3_21']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='demo3_22']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });

            $("input[name='demo5']").TouchSpin({
                prefix: "pre",
                postfix: "post",
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='demo0']").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });

            // Time Picker
            jQuery('#timepicker').timepicker({
                defaultTIme : false
            });
            jQuery('#timepicker2').timepicker({
                showMeridian : false
            });
            jQuery('#timepicker3').timepicker({
                minuteStep : 15
            });

            
            // Date Picker
            jQuery('#datepicker').datepicker({
                format: "dd/mm/yyyy"
            });
            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            jQuery('#datepicker-inline').datepicker();
            jQuery('#datepicker-multiple-date').datepicker({
                format: "mm/dd/yyyy",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });

            //Date range picker
            $('.input-daterange-datepicker').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary'
            });
            $('.input-daterange-timepicker').daterangepicker({
                timePicker: true,
                format: 'MM/DD/YYYY h:mm A',
                timePickerIncrement: 30,
                timePicker12Hour: true,
                timePickerSeconds: false,
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary'
            });
            $('.input-limit-datepicker').daterangepicker({
                format: 'MM/DD/YYYY',
                minDate: '06/01/2016',
                maxDate: '06/30/2016',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-primary',
                dateLimit: {
                    days: 6
                }
            });

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2016',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            //Bootstrap-MaxLength
            $('input#defaultconfig').maxlength()

            $('input#thresholdconfig').maxlength({
                threshold: 20
            });

            $('input#moreoptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger"
            });

            $('input#alloptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                separator: ' out of ',
                preText: 'You typed ',
                postText: ' chars available.',
                validate: true
            });

            $('textarea#textarea').maxlength({
                alwaysShow: true
            });

            $('input#placement').maxlength({
                alwaysShow: true,
                placement: 'top-left'
            });
        </script>

        

    </body>
</html>