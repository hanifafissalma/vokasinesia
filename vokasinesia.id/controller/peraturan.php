<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Peraturan</h1>
                    </div>
                </div>
                
                
                
                <div class="row" style="margin-bottom:5em;">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="60%">Judul Peraturan</th>
                                        <th width="20%" class="text-center">Tanggal</th>
                                        <th width="20%" class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PERATURAN MENTERI KEUANGAN REPUBLIK INDONESIA NOMOR 86/PMK.010/2015</td>
                                        <td>6 Januari 2020</td>
                                        <td class="text-center"><a href="peraturan-edit.php"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>KEPUTUSAN DIREKTUR JENDERAL PAJAK NOMOR KEP-94/PJ/2015</td>
                                        <td>8 Januari 2020</td>
                                        <td class="text-center"><a href="peraturan-edit.php"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>                          
                    </div>
                </div>
                
            </div>
        </div>

        
    </div>

<?php include "include/footer.php"; ?>
