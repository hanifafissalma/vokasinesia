<?php include "include/m.i.s.c.2.php"; ?>
<?php include "include/header.php"; ?>

<?php 
$notification = "";
if(isset($_GET['notif'])&&($_GET['notif']=="nu")): 
    $notification = '<div class="alert alert-danger">   
        Pengguna tidak ditemukan
    </div>';
elseif(isset($_GET['notif'])&&($_GET['notif']=="wp")): 
    $notification = '<div class="alert alert-danger">   
        Password salah atau email tidak benar.
    </div>';
elseif (isset($_GET['notif'])&&($_GET['notif']=='sp')):
    $notification = '<div class="alert alert-danger">
        Pengguna tersuspend.
    </div>';
elseif (isset($_GET['notif'])&&($_GET['notif']=='lg')):
    $notification = '<div class="alert alert-success">
        Logout berhasil.
    </div>';
elseif (isset($_GET['notif'])&&($_GET['notif']=='rs')):
    $notification = '<div class="alert alert-success">
        Reset password berhasil. Silahkan cek email Anda.
    </div>';
elseif (isset($_GET['notif'])&&($_GET['notif']=='wr')):
    $notification = '<div class="alert alert-danger">
        Reset password gagal. Email tidak ditemukan.
    </div>';
endif; ?>

<body class="loginpage">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><strong>Login</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="do.login.php">
                            <?= $notification ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" required autofocus>
                            </div>
                            <div class="form-group showpassword">                                
                                <input class="form-control" id="password" placeholder="Password" name="passwd" type="password" required>
                                <i class="fa fa-eye" id="togglePassword"></i>
                                <script>
									const togglePassword = document.querySelector("#togglePassword");
									const password = document.querySelector("#password");
									togglePassword.addEventListener("click", function (e) {
										const type = password.getAttribute("type") === "password" ? "text" : "password";
										password.setAttribute("type", type);
										this.classList.toggle("fa-eye-slash");
									});
								</script>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="remember" value="0">
                                    <input name="remember" type="checkbox" value="1">Remember Me
                                </label>
                                    | <a href="reset-password">Forget Password</a>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
