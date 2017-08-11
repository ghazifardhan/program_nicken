<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | Nifty- Responsive admin template.</title>
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Open Sans Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link href="css/nifty.min.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Animate.css [ OPTIONAL ]-->
        <link href="plugins/animate-css/animate.min.css" rel="stylesheet">
        <!--Morris.js [ OPTIONAL ]-->
        <link href="plugins/morris-js/morris.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Demo script [ DEMONSTRATION ]-->
        <link href="css/demo/nifty-demo.min.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
        <!--
        REQUIRED
        You must include this in your project.
        RECOMMENDED
        This category must be included but you may modify which plugins or components which should be included in your project.
        OPTIONAL
        Optional plugins. You may choose whether to include it in your project or not.
        DEMONSTRATION
        This is to be removed, used for demonstration purposes only. This category must not be included in your project.
        SAMPLE
        Some script samples which explain how to initialize plugins or components. This category should not be included in your project.
        Detailed information and more samples can be found in the document.
        -->

    <style>

    .imgR {
      width: 100%;
      margin: auto;
    }

    .imgR img{
      width: 100%;
    }

    @media (max-width: 1024px){
      .imgR img{
        width: 100%;
      }
    }

    @media (max-width: 800px){
      .imgR img{
        width: 100%;
      }
    }

    @media (max-width: 768px){
      .imgR img{
        width: 100%;
      }
    }

    </style>

    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="effect mainnav-lg">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="home.php" class="navbar-brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <div class="brand-title">
                                <span class="brand-text">Xiinic</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                            <!--Messages Dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End mega dropdown-->
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right">
                                        <img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture">
                                    </span>
                                    <div class="username hidden-xs"><?php echo $_SESSION['username'];?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
                                    <!-- Dropdown heading  -->


                                    <!-- Dropdown footer -->
                                    <div class="pad-all text-right">
                                        <a href="logout.php" class="btn btn-primary">
                                            <i class="fa fa-sign-out fa-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">

                <nav id="mainnav-container">
                    <div id="mainnav">
                        <!--Shortcut buttons-->
                        <!--================================-->

                        <!--================================-->
                        <!--End shortcut buttons-->
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigation</li>

                                        <!--Menu list item-->
                                        <li>

                                            <!--Submenu-->
											<?php if($_SESSION['level']==='admin'){?>
											 <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Master Data</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                <li><a href="tampil_barang.php">Barang</a></li>
												<li><a href="tampil_category.php">Category</a></li>
												<li><a href="tampil_customer.php">Customer</a></li>
												<li><a href="tampil_salesman.php">Salesman</a></li>
												<li><a href="tampil_target.php">Salesman Target</a></li>
												<li><a href="tampil_wilayah.php">Wilayah</a></li>
                                            </ul>

											<?php } ?>

                                        </li>

										 <li>

                                            <!--Submenu-->
											<?php if($_SESSION['level']==='manager'){?>
											 <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Master Data</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
                                                		<li><a href="tampil_salesman.php">Salesman</a></li>
												<li><a href="tampil_target.php">Salesman Target</a></li>
												<li><a href="tampil_transaksi.php">Transaksi Penjualan</a></li>
												 <li><a href="persediaan.php">Report Stok Barang</a></li>
                                            </ul>

											<?php } ?>

                                        </li>

										<li>

                                            <!--Submenu-->
											<?php if($_SESSION['level']==='spv'){?>
											 <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Master Data</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <ul class="collapse">
												 <li><a href="persediaan.php">Stok Barang</a></li>
                                            </ul>

											<?php } ?>

                                        </li>


										<li>
										<?php if($_SESSION['level']==='spv'){ ?>
                                            <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Transaksi</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">

                                                <li><a href="tampil_transaksi.php">Transaksi Penjualan</a></li>
												<!--<li><a href="input_tagihan.php">Transaksi Pelunasan</a></li>-->


                                            </ul>
											<?php }?>
                                        </li>
										<li>
										<?php if($_SESSION['level']==='admin') { ?>
                                            <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Repot</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="komisi_sales.php">Repot Komisi Sales</a></li>
												<li><a href="laporan_komsi_bayar.php">Repot Komisi Pembayaran</a></li>
												 <li><a href="laporan_sales.php">Repot Sales</a></li>
												  <li><a href="laporan_perbarang.php">Repot Barang</a></li>
												   <li><a href="laporan_wilayah.php">Repot Wilayah</a></li>
												    <li><a href="laporan_customer.php">Repot Customer</a></li>
                                                <li><a href="tampil_tagihan.php">Transaksi tagihan</a></li>
												 <li><a href="persediaan.php">Report stok barang</a></li>

                                            </ul>
											<?php }?>
                                        </li>
										<li>
										<?php if($_SESSION['level']==='direktur') { ?>
                                            <a href="#">
                                                <i class="fa fa-th"></i>
                                                <span class="menu-title">
                                                    <strong>Repot</strong>
                                                </span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="komisi_sales.php">Repot Komisi Sales</a></li>
												 <li><a href="laporan_sales.php">Repot Sales</a></li>
												  <li><a href="laporan_perbarang.php">Repot Barang</a></li>
												   <li><a href="laporan_wilayah.php">Repot Wilayah</a></li>
												    <li><a href="laporan_customer.php">Repot Customer</a></li>
                                                <!--<li><a href="tampil_tagihan.php">Transaksi tagihan</a></li>-->
                                                <li><a href="tampil_transaksi.php">Transaksi Penjualan</a></li>
												 <li><a href="persediaan.php">Report stok barang</a></li>

                                            </ul>
											<?php }?>
                                        </li>

                                    <!--Third tab (Settings)-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <div class="tab-pane fade" id="demo-asd-tab-3">
                                        <ul class="list-group bg-trans">
                                            <li class="list-header">
                                                <h4 class="text-thin">Account Settings</h4>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox" checked>
                                                </div>
                                                <p>Show my personal status</p>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox" checked>
                                                </div>
                                                <p>Show offline contact</p>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox">
                                                </div>
                                                <p>Invisible mode </p>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                            </li>
                                        </ul>
                                        <hr>
                                        <ul class="list-group bg-trans">
                                            <li class="list-header"><h4 class="text-thin">Public Settings</h4></li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox" checked>
                                                </div>
                                                Online status
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox" checked>
                                                </div>
                                                Show offline contact
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pull-right">
                                                    <input class="demo-switch" type="checkbox">
                                                </div>
                                                Show my device icon
                                            </li>
                                        </ul>
                                        <hr>
                                        <h4 class="pad-hor text-thin">Task Progress</h4>
                                        <div class="pad-all">
                                            <p>Upgrade Progress</p>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                                            </div>
                                            <small class="text-muted">15% Completed</small>
                                        </div>
                                        <div class="pad-hor">
                                            <p>Database</p>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
                                            </div>
                                            <small class="text-muted">17/23 Database</small>
                                        </div>
                                    </div>
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--Third tab (Settings)-->
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!--===================================================-->
                <!--END ASIDE-->
            </div>

            <!-- FOOTER -->
			<div id="content-container">
