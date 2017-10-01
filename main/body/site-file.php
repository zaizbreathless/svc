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
                                <h4 class="page-title">Fail Tapak</h4>
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

                
                // $id = $_POST['id'];

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
                        $kmb = $rcd['kmb'];
                        $tempoh = $rcd['tempoh'];
                        $perkara = $rcd['perkara'];
                        $lokasiTapak = $rcd['lokasiTapak'];
                    }
            

                $cd = $connect->prepare("SELECT * FROM lawat WHERE tapak_id=$id");
                $acd = array($id);
                $cd->execute($acd);
                while($rcd = $cd->fetch(PDO::FETCH_ASSOC)){
                    $visitID = $rcd['id'];
                    $laporan = $rcd['laporan'];
                    $tindakan = $rcd['tindakan'];
                    $pegawai = $rcd['pegawai'];
                    $tarikh_lawat = $rcd['tarikh_lawat'];
                }


                $lw = $connect->prepare("SELECT * FROM lawat WHERE tapak_id=?");
                $lw->execute($acd);
                $lwt = $lw->rowCount();

                 
                }
                    
            ?>


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <!-- PROGRESSBAR WIZARD -->
                            <div class="col-lg-12">
                                <div class="card-box p-b-0">
                                    
                                    <div id="progressbarwizard" class="pull-in">
                                        <ul>
                                            <li><a href="#profile-tab-2" data-toggle="tab">Muat Naik Fail</a></li>
                                            <li><a href="#finish-2" data-toggle="tab">Selesai</a></li>
                                        </ul>
                                        <form action="?p=Input-File" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="tab-content m-b-0">

                                            <div id="bar" class="progress progress-striped progress-bar-primary-alt active">
                                                <div class="bar progress-bar progress-bar-primary"></div>
                                            </div>
                                            <div class="tab-pane p-t-10 fade" id="profile-tab-2">
                                                <div class="row">
                                                    <button id="addfile" type="button" class="btn btn-warning waves-effect m-l-5" class="addfile">Tambah Fail</button>
                                                    <table width="100%" id="upload_visit" class="table m-0">
                                                        <tr>
                                                            <th>Info</th>
                                                            <th>Fail</th>
                                                        </tr>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <input class="form-control filedescription" name="filedescription[]" type="text" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input class="selectfile" name="selectfile[]" type="file" multiple />
                                                                </td>
                                                            </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-t-10 fade" id="finish-2">
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <table width="100%" border="0">
                                                                <tr>
                                                                    <td><input id="checkbox3" type="checkbox" required></td>
                                                                    <td>Saya setuju bahawa semua maklumat yang dimasukkan adalah benar.</td>
                                                                    <td><input type="hidden" name="id" value="<?=$id?>">
                                                                    <button type="submit" class="btn btn-success waves-effect waves-light" onclick="return mess();">Muat Naik</button></td>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager m-b-0 wizard">
                                                <li class="previous first" style="display:none;"><a href="#">First</a>
                                                </li>
                                                <li class="previous"><a href="#" class="btn btn-primary waves-effect waves-light">Kembali</a></li>
                                                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                <li class="next"><a href="#" class="btn btn-primary waves-effect waves-light">Seterusnya</a></li>
                                            </ul>
                                        </div>
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Senarai Fail Tapak Bina <a href="?p=Info-Site&id=<?=$id?>"><u><?=$no_fail?></u></a></h4>
                                        <div class="row port m-b-20">
                                            <div class="portfolioContainer">
                                                <?php
                                                
                                                $stmt = $connect->prepare("SELECT * FROM fail_tapak WHERE tapak_id=$id");
                                                $stmt->execute();
                                                while($row = $stmt->fetch()){
                                                ?>
                                                <div class="col-sm-6 col-lg-3 col-md-4 natural personal">
                                                    <div class="gal-detail thumb">
                                                        <img src="./files/<?php echo $row['nama_baru'] ?>" class="thumb-img" >
                                                        <div class="caption text-center">
                                                            <p><strong><?php echo $row['file_desc'] ?></strong></p>
                                                        </div>
                                                        <br>
                                                        <div class="caption text-center">
                                                            <p>
                                                                <a href="<?php echo $row['fail_path'] ?>" class="btn btn-primary btn-trans waves-effect w-md waves-warning m-b-5">Muat Turun</a>
                                                                <?php 
                                                                if($role=='Super Admin' || $role=='Client'){?>
                                                                <a href="?p=Delete-File&idd=<?php echo $row['id'] ?>&nama_baru=<?php echo $row['nama_baru'] ?>" onclick="return confirm('Anda pasti untuk memadam fail ini?')" class="btn btn-danger btn-trans waves-effect w-md waves-warning m-b-5">Padam</a>
                                                                <?php }?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div><!-- end portfoliocontainer-->
                                        </div> <!-- End row -->
                                    <hr><!-- end row -->
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
        <script type="text/javascript">
        function mess()
        {
            alert("Muat naik berjaya.");
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

        <!-- Form wizard -->
        <script src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
        <script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#basicwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified'});

                $('#progressbarwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;
                    var $percent = ($current/$total) * 100;
                    $('#progressbarwizard').find('.bar').css({width:$percent+'%'});
                },
                'tabClass': 'nav nav-tabs navtab-wizard nav-justified'});

                $('#btnwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified','nextSelector': '.button-next', 'previousSelector': '.button-previous', 'firstSelector': '.button-first', 'lastSelector': '.button-last'});

                var $validator = $("#commentForm").validate({
                    rules: {
                        emailfield: {
                            required: true,
                            email: true,
                            minlength: 3
                        },
                        namefield: {
                            required: true,
                            minlength: 3
                        },
                        urlfield: {
                            required: true,
                            minlength: 3,
                            url: true
                        }
                    }
                });

                $('#rootwizard').bootstrapWizard({
                    'tabClass': 'nav nav-tabs navtab-wizard nav-justified',
                    'onNext': function (tab, navigation, index) {
                        var $valid = $("#commentForm").valid();
                        if (!$valid) {
                            $validator.focusInvalid();
                            return false;
                        }
                    }
                });
            });

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

            //colorpicker start

            $('.colorpicker-default').colorpicker({
                format: 'hex'
            });
            $('.colorpicker-rgba').colorpicker();

            // Date Picker
            jQuery('#datepicker').datepicker();
            jQuery('#datepicker-autoclose').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });
            jQuery('#datepicker-inline').datepicker();
            jQuery('#datepicker-multiple-date').datepicker({
                format: "dd/mm/yyyy",
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

        <script type="text/javascript">
        jQuery(document).ready(function() {

                var k = 1, rowCountfile;
           $("#addfile").on('click', function(){
              var thisTableId = "upload_visit";
              var firstrow = $('#'+thisTableId + " tr:last").attr("id");
              var rowid = "";
              if (typeof firstrow === 'undefined') { rowid = "trowfile-1"; }
              else { rowid = $('#'+thisTableId + " tr:last").attr("id"); }
              var s = rowid; 
              var num = /trowfile-([^\s]+)/.exec(s)[1]; 
              num=parseInt(num); 
              num+=1; 
              var newrowid = "trowfile-"+num;
              var newRow = "<tr class='rowtableFile' id='"+newrowid+"'>";
              newRow += "<td class='text-center'> <input class='form-control filedescription' name='filedescription[]' type='text' /> </td>";
              newRow += "<td class='text-center'> <input class='selectfile' name='selectfile[]' type='file' multiple /></td>";
              newRow += "<td class='text-center'><button type='button' data-original-title='Remove This Row' title='Remove This Row' data-toggle='tooltip' data-placement='top' class='btn btn-sm btn-danger m-r-5 m-b-5 deletefile' style='visibility: hidden;'> <i class='fa fa-trash'></i> </button></td>";
              newRow += "</tr>";
              $('#'+thisTableId).append(newRow);
              $('#'+thisTableId + " tr:last td:last button").css("visibility", "visible");
              // $('#'+thisTableId).find(":file").filestyle({
              //    buttonText: "Upload",
              //    size: "sm",
              //    iconName: "glyphicon glyphicon-file"
              // });
              $(document).on('click', '.deletefile', function(e){
                 var thistr = $(this).closest('tr').attr('id');
                 $('#' + thisTableId + ' #' + thistr +" ").remove();
              });
              return false;
                });
            });
        </script>

    </body>
</html>