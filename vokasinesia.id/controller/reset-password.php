<?php include "include/m.i.s.c.2.php"; ?>
<?php include "include/header.php"; ?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><strong>Reset Password</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="do.reset.passwd.php" method="post">                            
                            <div class="form-group">
                                <input class="form-control" placeholder="Masukan alamat email Anda" name="email" type="email" required autofocus>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                            <br>
                            <a href="login.php">&larr; Kembali ke halaman login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
