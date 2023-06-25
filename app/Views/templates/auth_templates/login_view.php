 <div class="login-box">
     <!-- /.login-logo -->
     <div class="card card-outline card-primary">
         <div class="card-header text-center">
             <a href="../../index2.html" class="h1"><b>Login</b></a>
         </div>
         <div class="card-body">
             <!-- alert notif -->
             <?php
                if (session()->getFlashdata('error') === 'failed') {
                    echo "<div class='alert alert-danger font-weight-bold text-center'>
              Please check your account and try again
            </div>";
                }
                ?>
             <p class="login-box-msg">Sign in to start your session</p>
             <form action="<?php echo site_url('auth/login') ?>" method="post">
                 <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="nope" required>
                     <div class="input-group-append">
                         <div class="input-group-text">
                             <span class="fas fa-user-alt"></span>
                         </div>
                     </div>
                 </div>
                 <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="nope" required>
                     <div class="input-group-append">
                         <div class="input-group-text">
                             <span class="fas fa-lock"></span>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <!-- /.col -->
                     <div class="col-4 ">
                         <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <!-- /.col -->
                 </div>
             </form>

             <p class="mb-1 mt-2">
                 <a href="register.html" class="text-center">Register a new account</a>
             </p>
         </div>
         <!-- /.card-body -->
     </div>
     <!-- /.card -->
 </div>
 <!-- /.login-box -->