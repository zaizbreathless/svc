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
                                <h4 class="page-title">Senarai Pengguna</h4>
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

                            <div class="col-lg-12">
                                <div class="card-box">

                                    

                                    <h4 class="header-title m-t-0 m-b-30">Senarai</h4>

                                    <!-- <p class="text-muted font-13 m-b-15">
                                        Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.
                                    </p> -->

                                    <table class="table table-striped m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Kata Laluan</th>
                                                <th>Email</th>
                                                <th>Peranan</th>
                                                <th>Tarikh Daftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // include '../member-area/config.php';
                                            // // Search from MySQL database table
                                            $query = $pdo->prepare("select * from users LIMIT 0 , 100000000000" );
                                            //$query->bindValue(1, "%$rolefilter%", PDO::PARAM_STR);
                                            $query->execute();
                                            // Display search result
                                                     if (!$query->rowCount() == 0) {            
                                                        while ($results = $query->fetch()) {
                                                            echo "      <tr>
                                                                            <td>".$results['id']."</td>
                                                                            <td>".$results['fullname']."</td>
                                                                            <td>".$results['username']."</td>
                                                                            <td>".$results['password']."</td>
                                                                            <td>".$results['email']."</td>
                                                                            <td>".$results['role']."</td>
                                                                            <td>".$results['signup_date']."</td>
                                                                        </tr>";                 
                                                        }
                                                            
                                                    } else {
                                                            echo "      <tr>
                                                                            <td>NULL</td>
                                                                            <td>NULL</td>
                                                                            <td>NULL</td>
                                                                            <td>NULL</td>
                                                                            <td>NULL</td>
                                                                        </tr>";  
                                                    }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div><!-- end col -->

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
