
<?php 

    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
    $id_p = isset($_SESSION['id_p']) ? $_SESSION['id_p'] : '0';


    if (isset($_SESSION['rol'])) {
        
        if ($_SESSION['rol'] == -1) {
            header('Location: login.php');
            exit();
        }
    } else {
        header('Location: login.php');
        exit();
    }

    switch ($_SESSION['rol']) {
    case 1:
        $tipo_rol = 'Funcionario';
        break;
    case 2:
        $tipo_rol = 'Administrador';
        break;

    default:
        $tipo_rol = 'Usuario'; // Por si hay un valor no esperado
        break;
    }

    include 'conexion.php';


    $sql = "SELECT
    			id_propiedad,
    			cod_catastral,
    			direccion,
    			CASE 
			        WHEN LEFT(cod_catastral, 1) = '1' THEN 'Alto'
			        WHEN LEFT(cod_catastral, 1) = '2' THEN 'Medio'
			        WHEN LEFT(cod_catastral, 1) = '3' THEN 'Bajo'
			        ELSE 'Desconocido'
			    END AS tipo_impuesto 
    		FROM propiedades WHERE id_persona = '$id_p'";



    $resultado = mysqli_query($con, $sql);

    






?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista de propiedades</title>

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
								<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Propiedades <i class="fas fa-chevron-down"></i></a>
								<ul>

									<li>
										<a href="lista-propiedades-user.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Popiedades </a>
									</li>
									<li>
										<a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar Propiedades</a>
									</li>

								</ul>
							</li>



						</ul>
					</nav>
				</div>
			</section>

        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="user-update.html">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; PROPIEDADES DE <?php echo htmlspecialchars($usuario); ?>

                </h3>

            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">

                    <li>
                        <a class="active" href="reservation-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PROPIEDADES</a>
                    </li>
                    <li>
                        <a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR PROPIEDADES</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENT-->
            
			 <div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CATASTRO</th>
								<th>DIRECCION</th>
								<th>TIPO DE IMPUESTO</th>
								<th>VALOR</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$contador = 1; 
							    while ($fila = mysqli_fetch_array($resultado)) {
							        echo '<tr class="text-center">';
							        echo '<td>' . $contador . '</td>'; 
							        echo '<td>' . $fila['cod_catastral'] . '</td>'; 
							        echo '<td>' . $fila['direccion'] . '</td>';
							        echo '<td>' . $fila['tipo_impuesto'] . '</td>'; 
							        
							        echo '<td>
							                <a href="user-prop.php?id_a=' . $fila['id_propiedad'] . '" class="btn btn-house">
							                    <i class="fas fa-home"></i>
							                </a>
							              </td>';
							        echo '</tr>';
							        $contador++;
							        
							    }

						    ?>
							

						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
        </section>
    </main>
    
    	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="./js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="./js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="./js/main.js" ></script>
</body>
</html>