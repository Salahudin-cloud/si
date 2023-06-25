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
    <title>Employees</title>
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
                        <h1 class="m-0 font-weight-bold">Employees</h1><span> Employees Manager</span>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <!-- button add employees -->
                        <a href="<?php echo site_url('employees/new') ?>">
                            <button class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> New Employees
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Show list of employees -->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 1%;">NO</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($employees as $emp) : ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $emp->employeeName ?></td>
                                        <td><?php echo $emp->position ?></td>
                                        <td><?php echo $emp->department ?></td>
                                        <td><?php echo $emp->phoneNumber ?></td>
                                        <td><?php echo $emp->address ?></td>
                                        <td><?php echo $emp->email ?></td>
                                        <td>
                                            <div class="btn-group " role="group" aria-label="Action buttons">
                                                <a href="<?php echo site_url('employees/update/'  . $emp->employeeId) ?>" class="btn btn-sm btn-warning mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                                <form action="<?php echo site_url('employees/delete/proccess/' . $emp->employeeId) ?>" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Are sure delete this article ? ')"><i class="nav-icon fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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