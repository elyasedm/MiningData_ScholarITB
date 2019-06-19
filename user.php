<?php
include("require.php");
$type = "1";
$msg = "";
$judul_msg = '404';
$tombol = 'Ok!';
$judul = "Data Scholar UI";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (DB::query('SELECT * FROM user WHERE id_user = :id_user', array(':id_user' => $id))) {
        $datadb  = DB::query('SELECT * FROM user WHERE id_user = :id_user', array(':id_user' => $id));
        //pretty($datadb);
        $id_user = $_GET['id'];
        $nama = $datadb[0][1];
        $affiliation = $datadb[0][2];
        $total_cites = $datadb[0][3];
        $h_index = $datadb[0][4];
        $i10_index = $datadb[0][5];
        $fields = $datadb[0][6];
        $homepage = $datadb[0][7];
        $cluster = $datadb[0][8];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Data Scholar UI</title>
            <link rel="stylesheet" href="./vendors/iconfonts/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
            <link rel="stylesheet" href="./vendors/css/vendor.bundle.addons.css">
            <link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/font-awesome.css">
            <link rel="stylesheet" href="./css/style.css">
            <link rel="stylesheet" href="./css/costum.css">
            <link rel="shortcut icon" href="./images/favicon.png" />
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        </head>

        <body>
            <div class="container-scroller">

                <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                        <a class="navbar-brand brand-logo" href="./">
                            Google Scholar ITB
                        </a>
                    </div>

                    <div class="navbar-menu-wrapper d-flex align-items-center">
                        <a class="navbar-brand brand-logo" href="./" >
                        Data Profile
                        </a>
                        <ul class="navbar-nav navbar-nav-right">
                            <!--User account top-right-->
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                <span class="mdi mdi-menu"></span>
                            </button>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid page-body-wrapper">

                    <nav class="sidebar sidebar-offcanvas bg-dark" id="sidebar">
                        <ul class="nav">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card-body">
                                <p class="h3 text-left"><img src="https://ditsti.itb.ac.id/wp-content/uploads/sites/219/2018/09/logo-itb-128px.png" alt="logo ui" /></p>
                                </div>
                            </div>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="./">
                                    <i class="menu-icon fa fa-user"></i>
                                    <span class="menu-title">User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./klaster.php" class="nav-link">
                                    <i  class="menu-icon fa fa-th-large"></i>
                                    <span class="menu-title">Cluster</span> 
                                </a>
                             </li>
                            <li class="nav-item">
                                <a href="#search" class="nav-link" data-toggle="modal" data-target="#search">
                                    <i class="menu-icon fa fa-search"></i><span class="menu-title"> Pencarian </span>
                                </a>
                            </li>

                    </nav>
                    <div class="modal" id="search">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form class="forms-sample" action="./search.php" method="get">
                                        <div class="form-group row">
                                            <div class="input-group col-sm-12">
                                                <input type="text" name="search" class="form-control" placeholder="Pencarian... " aria-label="Pencarian..." aria-describedby="colored-addon3">
                                                <div class="input-group-append bg-primary border-primary">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="fa fa-search text-white"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times text-white"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </ul>
                    <div class="main-panel">

                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-lg-9 col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="https://scholar.google.co.id/citations?view_op=small_photo&user=<?php echo $id; ?>&citpid=1" alt="foto google scholar" />
                                            &nbsp;<strong class="h1"> <a class="" href="./user.php?id=<?php echo $id ?>"><?php echo  $nama; ?> </a>
                                            </strong>
                                            <div class="float-right row">
                                                <i class="col-12 text-right"><?php echo $affiliation; ?> </i>
                                                <a class="col-12 text-right" href="<?php echo $homepage; ?>"><?php echo $homepage; ?></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 grid-margin stretch-card">
                                    <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-th-large text-success icon-lg"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <p class="mb-0 text-right">Golongan Cluster</p>
                                                        <div class="fluid-container">
                                                            <h3 class="font-weight-medium text-right mb-0 font-cash-card">
                                                                <?php echo $cluster; ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <?php if (isset($_GET['view'])) {
                                    if ($_GET['view'] == "publikasi") {
                                        ?>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Judul</th>
                                                                    <th>Jumlah Dikutip</th>
                                                                    <th>Tahun</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $datapublikasi = DB::query('SELECT * FROM publications WHERE user_id = :id', array(':id' => $id));
                                                                //pretty($datapublikasi);
                                                                $iterasi = 1;
                                                                foreach ($datapublikasi as $i) {
                                                                    echo "<tr><td>" . $iterasi . "</td><td>" . substr($i['title'],0,50) . "</td><td>" . $i['cites'] . "</td><td>" . $i['year'] . "</td></tr>";
                                                                    $iterasi++;
                                                                }

                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        </table>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            } else {
                                ?>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-caret-square-o-up text-info icon-lg"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <p class="mb-0 text-right">H Index</p>
                                                        <div class="fluid-container">
                                                            <h3 class="font-weight-medium text-right mb-0 font-cash-card">
                                                                <?php echo $h_index; ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-level-up text-primary icon-lg"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <p class="mb-0 text-right">i10 Index</p>
                                                        <div class="fluid-container">
                                                            <h3 class="font-weight-medium text-right mb-0 font-cash-card">
                                                                <?php echo $i10_index; ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-stack-overflow text-warning icon-lg"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <p class="mb-0 text-right">Total Publikasi</p>
                                                        <div class="fluid-container">
                                                            <h3 class="font-weight-medium text-right mb-0 font-cash-card">
                                                                <?php
                                                                $jumlah_pub = DB::query('SELECT Count(user_id) FROM publications WHERE user_id = :user_id', array(":user_id" => $id))[0][0];
                                                                ?>
                                                                <?php echo $jumlah_pub; ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                        <div class="card card-statistics">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-file text-success icon-lg"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <p class="mb-0 text-right">Total Sitasi</p>
                                                        <div class="fluid-container">
                                                            <h3 class="font-weight-medium text-right mb-0 font-cash-card">
                                                                <?php echo $total_cites; ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Diagram</h4>
                                                <canvas id="myChart" width="100px" height="40px" style="width:12px;height:12px"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="Text-light alert alert-info p-3 text-center">Publikasi</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Judul Publikasi</th>
                                                                <th>Jumlah Kutipan</th>
                                                                <th>Tahun Publikasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $datapublikasi = DB::query('SELECT * FROM publications WHERE user_id = :id Limit 5', array(':id' => $id));
                                                            //pretty($datapublikasi);
                                                            foreach ($datapublikasi as $i) {
                                                                echo "<tr><td>" . setLimitString($i['title'], 100) . "</td><td>" . $i['cites'] . "</td><td>" . $i['year'] . "</td></tr>";
                                                            }
                                                            if (DB::query('SELECT count(id_user) FROM  publications WHERE user_id = :id', array(':id' => $id))[0][0] > 5) {
                                                                echo '<tr><td colspan="3" align="center"> <a href="./user.php?id=' . $id . '&view=publikasi" class="">Lihat Semua</a>  </td></tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                <?php

                            }
                            ?>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['H Index', 'i10 Index', 'Jumlah Publikasi','Total Sitasi'],
                                            datasets: [{
                                                label: 'Data',
                                                data: [<?php echo $h_index ?>, <?php echo $i10_index ?>, <?php echo $jumlah_pub ?>, <?php echo $total_cites ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(200, 170, 240, 1)',
                                                    'rgba(255, 206, 86, 1)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(200, 170, 240, 1)',
                                                    'rgba(255, 206, 86, 1)'
                                                ],
                                                borderWidth: 10
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>

                        </div>
                        <footer class=" footer ">
                            <div class=" container-fluid clearfix">
                                <span class="float-none float-sm-right text-muted d-block mt-1 mt-sm-0 text-center"></span>
                            </div>
                        </footer>
                    </div>

                </div>

                <div class="modal" id=" search">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form class="forms-sample" action="./search. php" method="post">
                                    <div class="form-group row">
                                        <div class="input-group col-sm-12">
                                            <input typ e="text" nam e="soal" class="form-contro l " placeholder="Cari Soa l  Disi n i" aria-label="Masuk k an Nama" ar i a-describedby="c olored-addon3">
                                            <div class="input-group-append bg-primary  border-primary">
                                                <button class="btn btn-primary" type="submit">
                                                    <span class="fa fa-search text-white"></span>
                                                </button>
                                                <button type="button" class="btn  btn-danger" data-dismiss=" modal"><span class="fa fa-times   text-white"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="./vendors/js/vendor.bundle.base.js"> </script>

                <script src="./vendors/js/vendor.bundle.addons.js"> </script>

                <script src="./js/off-canvas.js"> </script>

                <script src="./js/misc.js"> </script>

                <script src="./js/dashboard.js ">
                </script>
            </div>
        </body>

        </html> <?php
        } else {
            $content = "Swal.fire({
            title: '404!',
            text: 'D Not Found',
            type: 'error',
            confirmButtonText: 'Ok!'
          })";
            setcookie('notif', $content, time() + 1, '/', null, null, null);
            redirect('./');
        }
    } else {
        $content = "Swal.fire({
        title: '404!',
        text: 'Invalid respone',
        type: 'error',
        confirmButtonText: 'Ok!'
      })";
        setcookie('notif', $content, time() + 1, '/', null, null, null);
        redirect('./');
    }
