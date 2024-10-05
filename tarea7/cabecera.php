
		<!-- Normalize V8.0.1 -->
		<link rel="stylesheet" href="./css/normalize.css">

		<!-- Bootstrap V4.3 -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">

		<!-- Bootstrap Material Design V4.0 -->
		<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

		<!-- Font Awesome V5.9.0 -->
		<link rel="stylesheet" href="./css/all.css">

		<!-- Sweet Alerts V8.13.0 CSS file -->
		<link rel="stylesheet" href="./css/sweetalert2.min.css">

		<!-- Sweet Alert V8.13.0 JS file-->
		<script src="./js/sweetalert2.min.js" ></script>

		<!-- jQuery Custom Content Scroller V3.1.5 -->
		<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
		
		<!-- General Styles -->
		<link rel="stylesheet" href="./css/style.css">


	</head>
	<body>
		
		<!-- Main container -->
		<main class="full-box main-container">
			<!-- Nav lateral -->
			<section class="full-box nav-lateral">
				<div class="full-box nav-lateral-bg show-nav-lateral"></div>
				<div class="full-box nav-lateral-content">
					<figure class="full-box nav-lateral-avatar">
						<i class="far fa-times-circle show-nav-lateral"></i>
						<img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
						<figcaption class="roboto-medium text-center">
							<?php echo htmlspecialchars($usuario); ?> <br><small class="roboto-condensed-light"><?php echo htmlspecialchars($tipo_rol); ?></small>
						</figcaption>
					</figure>
					<div class="full-box nav-lateral-bar"></div>
					<nav class="full-box nav-lateral-menu">
						<ul>
							<li>
								<a href="home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
							</li>
							

							<li>
								<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Prestamos <i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a href="reservation-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Prestamo</a>
									</li>
									<li>
										<a href="reservation-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Prestamo </a>
									</li>
									<li>
										<a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar Prestamos</a>
									</li>
									<li>
										<a href="reservation-pending.html"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Prestamos Pendientes</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a href="nuevo_usuario.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
									</li>
									<li>
										<a href="lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
									</li>
									<li>
										<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
									</li>
								</ul>
							</li>

						</ul>
					</nav>
				</div>
			</section>
