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

    <title>Update Employee</title>
</head>

<body class="hold-transition sidebar-mini">

    <!-- left navbar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/left_navbar.php'); ?>
    <!-- right navbar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/right_navbar.php'); ?>
    <!-- sidebar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/sidebar.php'); ?>

    <!-- main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold">Employees</h1><span> Employees Manager</span>
                    </div><!-- /.col -->
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="<?php echo site_url('/employees') ?>">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                        </a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title ">
                            <i class="fas fa-user" style="font-size: 1.5rem;"></i>
                            Update Employee
                        </h1>

                    </div>
                    <div class="card-body">
                        <!-- alert notif  -->
                        <?php if (session()->has('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <!-- it will show error for every field -->
                                    <?php foreach (session('errors') as $error) : ?>
                                        <li><?php echo $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo site_url('employees/update/proccess') ?>" method="post">
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="employeeId" value="<?= $employee->employeeId ?>">
                            <div class="form-group">
                                <label for="employeeName">Name</label>
                                <input type="text" class="form-control" id="employeeName" placeholder="Please input name" name="employeeName" value="<?= $employee->employeeName ?>" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <label for="position ">Position</label>
                                <select class="form-control" id="position" name="position">
                                    <option value="" disabled> -- Select a position --</option>
                                    <option value="HRIS Administrator" <?= ($employee->position == "HRIS Administrator") ? "selected" : "" ?>>HRIS Administrator</option>
                                    <option value="Project Manager" <?= ($employee->position == "Project Manager") ? "selected" : "" ?>>Project Manager</option>
                                    <option value="Financial Analyst" <?= ($employee->position == "Financial Analyst") ? "selected" : "" ?>>Financial Analyst</option>
                                    <option value="Marketing Specialist" <?= ($employee->position == "Marketing Specialist") ? "selected" : "" ?>>Marketing Specialist</option>
                                    <option value="IT Support Specialist" <?= ($employee->position == "IT Support Specialist") ? "selected" : "" ?>>IT Support Specialist</option>
                                    <option value="Sales Manager" <?= ($employee->position == "Sales Manager") ? "selected" : "" ?>>Sales Manager</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department ">Department</label>
                                <select class="form-control" id="department" name="department">
                                    <option value="" disabled> -- Select a department --</option>
                                    <option value="Human Resources" <?= ($employee->department == "Human Resources") ? "selected" : "" ?>>Human Resources</option>
                                    <option value="Project Management" <?= ($employee->department == "Project Management") ? "selected" : "" ?>>Project Management</option>
                                    <option value="Finance" <?= ($employee->department == "Finance") ? "selected" : "" ?>>Finance</option>
                                    <option value="Marketing" <?= ($employee->department == "Marketing") ? "selected" : "" ?>>Marketing</option>
                                    <option value="Information Technology" <?= ($employee->department == "Information Technology") ? "selected" : "" ?>>Information Technology</option>
                                    <option value="Business Development" <?= ($employee->department == "Business Development") ? "selected" : "" ?>>Business Development</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Please input phone number" name="phoneNumber" value="<?= $employee->phoneNumber ?>" autocomplete="x">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control shadow-none" style="resize: none;" id="address" rows="3" name="address" placeholder="Please input address" autocomplete="x"><?= $employee->address ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Please input email " name="email" value="<?= $employee->email ?>" autocomplete="a">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Please input username  " name="username" value="<?= $employee->username ?>" autocomplete="s">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Please input password" name="password" value="<?= $employee->password ?>" autocomplete="false">
                            </div>
                            <button type="submit" class="btn btn-success form-control">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    <!-- control sidebar -->
    <?php include(APPPATH . 'Views/templates/navbar_admin/control_sidebar.php'); ?>
</body>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() . '/assets/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . '/assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . '/assets/dist/js/adminlte.min.js' ?>"></script>

</html>