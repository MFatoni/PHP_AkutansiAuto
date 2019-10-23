<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <script type="text/javascript" src="../../assets/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../assets/js/js.js"></script>
	<script src="../../assets/js/Chart.bundle.js"></script>
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.css">
</head>
<body>	
	<div class="row">
		<div class="col-lg-2">
			<div class="nav-side-menu">
				<div class="brand">Aplikasi Akutansi</div>
				<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
					<div class="menu-list">
						<ul id="menu-content" class="menu-content collapse out">
							<li>
								<a href="../../"><i class="fa fa-home"></i> Beranda </a>
							</li>
							<li>
								<a href="../input/index.php"><i class="fa fa-pencil-square-o"></i> Input Transaksi</a>
							</li>
							<li data-toggle="collapse" data-target="#new1" class="collapsed">
								<a href="../filter/jurnalUmum.php"><i class="fa fa-pencil-square-o"></i> Jurnal Umum <span class="arrow"></span></a>
							</li>
								<ul class="sub-menu collapse" id="new1">
									<li><a href="../jurnalUmum.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Jurnal Umum Keseluruhan </a></li>
								</ul>
							<li>
								<a href="../filter/bukuBesar.php"><i class="fa fa-pencil-square-o"></i> Buku Besar</a>
							</li>
							<li data-toggle="collapse" data-target="#new" class="collapsed">
								<a href="../filter/neracaLajur.php"><i class="fa fa-pencil-square-o"></i> Neraca Lajur <span class="arrow"></span></a>
							</li>
								<ul class="sub-menu collapse" id="new">
									<li><a href="../filter/generateNeracaLajur.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Generate Neraca Lajur</a></li>
								</ul>
							<li>
							<a href="../filter/jurnalPenyesuaian.php"><i class="fa fa-pencil-square-o"></i> Jurnal Penyesuaian</a>
							</li>
							<li>
							<a href="../filter/laporan.php"><i class="fa fa-pencil-square-o"></i> Laporan</a>
							</li>
						</ul>
				</div>
			</div>
		</div>
