<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Pengguna "Mas Diar"</h1>
                    </div>
                </div>                           
                
                <div class="row" style="margin-bottom:5em;">                    
                    <div class="col-lg-12">
                        <form role="form">
                        
                            <div class="alert alert-success">
                                Perubahan data pengguna sukses.
                            </div>
                            <div class="alert alert-danger">
                                Periksa kembali data Anda.
                            </div>
                    
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" value="Mas Diar" required>
                            </div>
                            <div class="form-group">
                                <label>Email Pengguna</label>
                                <input type="email" class="form-control" value="radhiarfadhila@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Tambahan</label>
                                <textarea class="form-control" rows="5">Lorem Ipsum Dolor SIt Amet</textarea>
                            </div>
                            <div class="form-group showpassword2">
                                <label>Set Password</label>
                                <input type="password" class="form-control" id="password">
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
                                <small>Password harus memenuhi Minimal 8 karakter dan terdiri dari minimal 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter khusus.</small>
                            </div>
                            <div class="form-group">
                                <label>Role Pengguna</label>
                                <select class="form-control" required>
                                    <option value="" disabled>Pilih Role Pengguna</option>
                                    <option value="1" selected>Administrator</option>
                                    <option value="2">Contributor</option>
                                </select>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Simpan Data Pengguna</button>
                        </form>                              
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
