<!DOCTYPE html>
<!--

TABLE OF CONTENTS.

Use search to find needed section.

=====================================================

|  1. $BODY                 |  Body                 |
|  2. $MAIN_NAVIGATION      |  Main navigation      |
|  3. $NAVBAR_ICON_BUTTONS  |  Navbar Icon Buttons  |
|  4. $MAIN_MENU            |  Main menu            |
|  5. $CONTENT              |  Content              |

=====================================================

-->


<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Usuarios ZmartBuy</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

		<!-- Open Sans font from Google CDN -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

		<!-- Pixel Admin's stylesheets -->
		<link href="assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
		<link href="assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
		<link href="assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
		<link href="assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
		<link href="assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

		<!--[if lt IE 9]>
			<script src="assets/javascripts/ie.min.js"></script>
		<![endif]-->

	</head>


<!-- 1. $BODY ======================================================================================
	
	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'      - Sets text direction to right-to-left
	* 'main-menu-right'    - Places the main menu on the right side
	* 'no-main-menu'       - Hides the main menu
	* 'main-navbar-fixed'  - Fixes the main navigation
	* 'main-menu-fixed'    - Fixes the main menu
	* 'main-menu-animated' - Animate main menu
-->
	<body class="theme-adminflare main-menu-animated">

		<div id="main-wrapper">


		<!-- 2. $MAIN_NAVIGATION ===========================================================================

			Main navigation
		-->
			<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
				<!-- Main menu toggle -->
				<button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
				
				<div class="navbar-inner">
					<!-- Main navbar header -->
					<div class="navbar-header">

						<!-- Logo -->
						<a href="../index.php" class="navbar-brand">
							<div><img alt="Pixel Admin" src="assets/images/pixel-admin/main-navbar-logo.png"></div>
							<strong>ZmartBuy</strong>
						</a>

						<!-- Main navbar toggle -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

					</div> <!-- / .navbar-header -->

					<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
						<div>
							<div class="right clearfix">
								<ul class="nav navbar-nav pull-right right-navbar-nav">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
											<img src="assets/demo/avatars/1.jpg" alt="">
											<span>cajaramillov</span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="#">Profile</a></li>
											<li><a href="#">Account</a></li>
											<li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
											<li class="divider"></li>
											<li><a href="../index.php"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
										</ul>
									</li>
								</ul> <!-- / .navbar-nav -->
							</div> <!-- / .right -->
						</div>
					</div> <!-- / #main-navbar-collapse -->
				</div> <!-- / .navbar-inner -->
			</div> <!-- / #main-navbar -->
		<!-- /2. $END_MAIN_NAVIGATION -->


		<!-- 4. $MAIN_MENU =================================================================================

				Main menu
				
				Notes:
				* to make the menu item active, add a class 'active' to the <li>
				  example: <li class="active">...</li>
				* multilevel submenu example:
					<li class="mm-dropdown">
					  <a href="#"><span class="mm-text">Submenu item text 1</span></a>
					  <ul>
						<li>...</li>
						<li class="mm-dropdown">
						  <a href="#"><span class="mm-text">Submenu item text 2</span></a>
						  <ul>
							<li>...</li>
							...
						  </ul>
						</li>
						...
					  </ul>
					</li>
		-->
			<div id="main-menu" role="navigation">
				<div id="main-menu-inner">
					<ul class="navigation">
						<li>
							<a href="#1" id="products"><i class="menu-icon fa fa-tag"></i><span class="mm-text">Productos</span></a>
						</li>
						<li>
							<a href="#2" id="sales"><i class="menu-icon fa fa-dollar"></i><span class="mm-text">Ventas</span></a>
						</li>
						<li class="mm-dropdown">
							<a href="#3" id="statistics"><i class="menu-icon fa fa-bar-chart-o"></i><span class="mm-text">Estadísticas</span></a>
							<ul>
								<li>
									<a tabindex="-1" href="#4" id="statisticsMonth"><span class="mm-text">Mensuales</span></a>
								</li>
							</ul>
						</li>
					</ul>	
				</div> <!-- / #main-menu-inner -->
			</div> <!-- / #main-menu -->
		<!-- /4. $MAIN_MENU -->


			<div id="content-wrapper1">
		<!-- 5. $CONTENT ===================================================================================

				Content
		-->
				<div class="panel-heading">
					<span class="panel-title">Productos Mercamas</span>
					<div class="panel-heading-controls">
						<button class="btn btn-labeled btn-danger"><span class="btn-label icon fa fa-plus-square"></span>Adicionar</button>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-primary">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-products">
							<thead>
								<tr>
									<th>#</th>
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th><i class="btn-label icon fa fa-cog"></i>&nbsp;&nbsp;Aministrar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>7707188184807</td>
									<td>Cuaderno Norma</td>
									<td>2000</td>
									<td>100</td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn dropdown-toggle btn-danger" data-toggle="dropdown"><i class="btn-label icon fa fa-pencil"></i>&nbsp;&nbsp;Editar&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar</a></li>
												<li><a href="#"><i class="btn-label icon fa fa-trash-o"></i>&nbsp;&nbsp;Borrar</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>7777188184807</td>
									<td>Chocolisto</td>
									<td>12000</td>
									<td>150</td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn dropdown-toggle btn-danger" data-toggle="dropdown"><i class="btn-label icon fa fa-pencil"></i>&nbsp;&nbsp;Editar&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar</a></li>
												<li><a href="#"><i class="btn-label icon fa fa-trash-o"></i>&nbsp;&nbsp;Borrar</a></li>
											</ul>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- / #content-wrapper -->

			<div id="content-wrapper2">
		<!-- 5. $CONTENT ===================================================================================

				Content
		-->
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Ventas Mercamas</span>
					</div>
					<div class="panel-body">
						<div class="table-primary">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-sales">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Total</th>
										<th><i class="btn-label icon fa fa-cog"></i>&nbsp;&nbsp;Detalles</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Carlos Andrés Jaramillo</td>
										<td>15/07/2015</td>
										<td>320000</td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-labeled btn-danger"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar&nbsp;&nbsp;</button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> <!-- / #content-wrapper -->

			<div id="content-wrapper3">
		<!-- 5. $CONTENT ===================================================================================

				Content
		-->
				<div class="panel panel-default panel-dark">
					<div class="panel-heading">
						<span class="panel-title">Estadistica de Ventas Mensuales</span>
						<div class="panel-heading-controls">
							<div class="panel-heading-icon"><i class="fa fa-bar-chart-o"></i></div>
						</div>
					</div>
					<div class="panel-body">
						<div class="stat-panel">
							<div class="stat-row">
								<!-- Small horizontal padding, bordered, without right border, top aligned text -->
								<div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">
									<!-- Small padding, without top padding, extra small horizontal padding -->
									<h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Uploads</h4>
									<!-- Without margin -->
									<ul class="list-group no-margin">
										<!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
										<li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius">
											Documents <span class="label label-pa-purple pull-right">34</span>
										</li> <!-- / .list-group-item -->
										<!-- Without left and right borders, extra small horizontal padding, without background -->
										<li class="list-group-item no-border-hr padding-xs-hr no-bg">
											Audio <span class="label label-danger pull-right">128</span>
										</li> <!-- / .list-group-item -->
										<!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
										<li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg">
											Videos <span class="label label-success pull-right">12</span>
										</li> <!-- / .list-group-item -->
									</ul>
								</div> <!-- /.stat-cell -->
								<!-- Primary background, small padding, vertically centered text -->
								<div class="stat-cell col-sm-8 bg-primary padding-sm valign-middle">
									<div id="hero-graph" class="graph" style="height: 230px;"></div>
								</div>
							</div>
						</div> <!-- /.stat-panel -->
					</div>
				</div>

			</div> <!-- / #content-wrapper -->
			
			<div id="main-menu-bg"></div>
		</div> <!-- / #main-wrapper -->

		<!-- Get jQuery from Google CDN -->
		<!--[if !IE]> -->
		<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
		<!-- <![endif]-->
		<!--[if lte IE 9]>
			<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
		<![endif]-->

		<!-- Pixel Admin's javascripts -->
		<script src="assets/javascripts/bootstrap.min.js"></script>
		<script src="assets/javascripts/pixel-admin.min.js"></script>
		<script src="assets/javascripts/InteraccionAdminMarcket.js"></script>

	</body>
</html>