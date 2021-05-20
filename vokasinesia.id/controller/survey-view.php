<?php include "include/m.i.s.c.php"; ?>
<?php include "include/header.php"; ?>
<?php
$detail = getDetailSurvey($_GET['id']);
$result = getResultSurvey($_GET['id']);
$labels = "";
$data   = "";
?>
<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Detail Survey</h1>
                    </div>
                </div>
                <div class="row" id="printarea">                    
                    <div class="col-md-12" style="margin-bottom:2em;">
                        <h3><?= $detail['judul'] ?></h3>      
                    <div class="col-sm-8 chartarea">
                        <canvas id="oilChart" width="100%"></canvas>                         
                    </div>                    
                    <div class="col-sm-8" style="margin-bottom:1em;">                        
                        <div class="list-group">
                            <?php for($i=0;$i<sizeof($result);$i++): ?>
                            <div class="list-group-item">
                                <?= $result[$i]['pilihan_survey'] ?>
                                <span class="pull-right"><?= $result[$i]['jumlah_jawaban'] ?> voters
                                </span>
                            </div>
                            <?php 
                            if($i<(sizeof($result)-1)):
                                $labels.='"'.$result[$i]['pilihan_survey'].'",';
                                $data.=$result[$i]['jumlah_jawaban'].",";
                            else:
                                $labels.='"'.$result[$i]['pilihan_survey'].'"';
                                $data.=$result[$i]['jumlah_jawaban'];
                            endif;
                        endfor;
                        ?>          
                        </div>                           
                    </div> 
                    <script src="js/Chart.min.js"></script>
                    <script type="text/javascript">
                        var oilCanvas = document.getElementById("oilChart");

                        var randomColorPlugin = {
                            beforeUpdate: function(chart) {
                                var backgroundColor = [];
                                for (var i = 0; i < chart.config.data.datasets[0].data.length; i++) {
                                    var color = "rgba(" + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + ",";
                                    backgroundColor.push(color + "1)");
                                }
                                chart.config.data.datasets[0].backgroundColor = backgroundColor;
                            }
                        };

                        Chart.pluginService.register(randomColorPlugin);

                        var oilData = {
                            labels: [
                                <?= $labels ?>
                            ],
                            datasets: [
                                {
                                    data: [<?= $data ?>]
                                }]
                        };

                        var pieChart = new Chart(oilCanvas, {
                            type: 'bar',
                            data: oilData,
                            options: {
                                legend: {
                                    display: false
                                },
                                scales: {
					                yAxes: [{
					                    ticks: {
					                        beginAtZero: true,
					                        stepSize: 1,
					                    },
								        afterDataLimits(scale) {
								          scale.max += 1;
								        }
					                }]
					            },
					            responsive: true,
                				maintainAspectRatio: true
                            }
                        });
                    </script> 
                </div>                 
                <div id="no-print" style="margin-bottom:5em;">
                    <button class="btn btn-danger btn-lg" onclick="saveAsPDF();"><i class="fa fa-download"></i> Simpan ke PDF</button>
                    <a href="javascript:if(window.print)window.print()" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print Hasil Survey</a>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
                    <script>
                    function saveAsPDF() {
                       html2canvas(document.getElementById("printarea"), {
                          onrendered: function(canvas) {
                             var img = canvas.toDataURL("image/jpg", 1.0); //image data of canvas
                             var doc = new jsPDF();
                             doc.addImage(img, 10, 10);
                             doc.save('test.pdf');
                          }
                       });
                    }
                    </script>                       
                </div>
            </div>
        </div>

    </div>

<?php include "include/footer.php"; ?>
