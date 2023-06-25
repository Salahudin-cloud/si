<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/dist/css/adminlte.min.css' ?>">
    <title>Admin Dashboard</title>
</head>

<body class="hold-transition sidebar-mini">


    <!-- left navbar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/left_navbar.php'); ?>
    <!-- right navbar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/right_navbar.php'); ?>
    <!-- sidebar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/sidebar.php'); ?>

    <!-- main content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold">Dashboard</h1><span>Control Panel</span>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- small box info  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header  bg-primary">
                                    <h1 class="card-title">
                                        <i class="fa fa-home" style="font-size: 1.5rem;"> Dashboard</i>
                                    </h1>
                                </div>
                                <div class="card-body">
                                    <h3>Selamat Datang !</h3>
                                    <div class="table-responsive">
                                        <table class="table table-borderless ">
                                            <tr>
                                                <th width="10%">Nama</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('employeeName')?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Username</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('username') ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="10%">Position</th>
                                                <th width="1%">:</th>
                                                <td>
                                                    <p><?php echo session()->get('position') ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> <!--card body  -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>

    <!-- control sidebar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/control_sidebar.php'); ?>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo base_url() . '/assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() . '/assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() . '/assets/dist/js/adminlte.min.js' ?>"></script>
</body>

</html>