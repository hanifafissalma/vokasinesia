<?php include "include/m.i.s.c.php"; ?>
<?php include "include/header.php"; ?>

<body>

    <div id="wrapper">

        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">            	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                        <!--<p>Selamat datang, <strong><?= $_SESSION['nama'] ?></strong>!</p>-->
                    	<div class="row">
			                <div class="col-lg-4 col-md-6">
			                    <div class="panel panel-green">
			                        <div class="panel-heading">
			                            <div class="row">
			                                <div class="col-xs-3">
			                                    <i class="fa fa-file fa-5x"></i>
			                                </div>
			                                <div class="col-xs-9 text-right">
			                                    <div class="huge"><?= allDataPost() ?></div>
			                                    <div>Data Post</div>
			                                </div>
			                            </div>
			                        </div>
			                        <a href="all-data">
			                            <div class="panel-footer">
			                                <span class="pull-left">View Details</span>
			                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			                                <div class="clearfix"></div>
			                            </div>
			                        </a>
			                    </div>
			                </div>
			                <div class="col-lg-4 col-md-6">
			                    <div class="panel panel-primary">
			                        <div class="panel-heading">
			                            <div class="row">
			                                <div class="col-xs-3">
			                                    <i class="fa fa-comments fa-5x"></i>
			                                </div>
			                                <div class="col-xs-9 text-right">
			                                    <div class="huge"><?= allUnreadComments() ?></div>
			                                    <div>Komentar Baru</div>
			                                </div>
			                            </div>
			                        </div>
			                        <a href="comments">
			                            <div class="panel-footer">
			                                <span class="pull-left">View Details</span>
			                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			                                <div class="clearfix"></div>
			                            </div>
			                        </a>
			                    </div>
			                </div>
			                <div class="col-lg-4 col-md-6">
			                    <div class="panel panel-red">
			                        <div class="panel-heading">
			                            <div class="row">
			                                <div class="col-xs-3">
			                                    <i class="fa fa-pie-chart fa-5x"></i>
			                                </div>
			                                <div class="col-xs-9 text-right">
			                                    <div class="huge"><?= allSurvey() ?></div>
			                                    <div>Survey</div>
			                                </div>
			                            </div>
			                        </div>
			                        <a href="survey">
			                            <div class="panel-footer">
			                                <span class="pull-left">View Details</span>
			                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
			                                <div class="clearfix"></div>
			                            </div>
			                        </a>
			                    </div>
			                </div>	
			                
			            </div>
                        
                    </div>
                </div>
                <div class="row">
            		<div class="col-lg-12">
            			<div class="panel panel-default">
	                        <div class="panel-heading">
	                            <STRONG><i class="fa fa-bar-chart-o fa-fw"></i> Website Statistik Report</STRONG>
	                        </div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body">
		            			<object data="https://www.vokasinesia.id/cgi-bin/awstats.pl?config=vokasinesia.id&framename=mainright" width="100%" height="400" style="overflow : hidden;">
								    <embed src="https://www.vokasinesia.id/cgi-bin/awstats.pl?config=vokasinesia.id&framename=mainright" width="100%" height="600"> </embed>
								    Error: Embedded data could not be displayed.
								</object>
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>
            		</div> 
            	</div>
            </div>
        </div>
    </div>

<?php include "include/footer.php"; ?>
