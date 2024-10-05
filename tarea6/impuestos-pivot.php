
<?php 

	$usuario = 'Juanito Alacachofa';
	$tipo_rol = 'Administrador';

	include 'conexion.php';
	$sql = "SELECT 
				p.id_persona,
				p.dni,
			    p.nombre ,
			    p.paterno,
			    p.materno,
			    SUM(CASE 
			        WHEN LEFT(pr.cod_catastral, 1) = '1' THEN 1 
			        ELSE 0 
			    END) AS impuesto_alto,
			    SUM(CASE 
			        WHEN LEFT(pr.cod_catastral, 1) = '2' THEN 1 
			        ELSE 0 
			    END) AS impuesto_medio,
			    SUM(CASE 
			        WHEN LEFT(pr.cod_catastral, 1) = '3' THEN 1 
			        ELSE 0 
			    END) AS impuesto_bajo
			FROM 
			    personas p
			JOIN 
			    propiedades pr ON p.id_persona = pr.id_persona
			GROUP BY 
			    p.id_persona, p.nombre, p.paterno ";


	$resultado = mysqli_query($con, $sql);

?>



<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista usuarios</title>

	<?php include 'cabecera.php' ?>

		<!-- Page content -->
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE IMPUESTOS
				</h3>
				
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">

					<li>
						<a class="active" href="lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS POR IMPUESTO</a>
					</li>

				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CI</th>
								<th>NOMBRE</th>
								<th>PATERNO</th>
								<th>MATERNO</th>
								
								<th>ALTO</th>
								<th>MEDIO</th>
								<th>BAJO</th>
							</tr>
						</thead>
						<tbody>
						    <?php
							    while ($fila = mysqli_fetch_array($resultado)) {
							        echo '<tr class="text-center">';
							        echo '<th>' . $fila['id_persona'] . '</th>'; 
							        echo '<td>' . $fila['dni'] . '</td>'; 
							        echo '<td>' . $fila['nombre'] . '</td>'; 
							        echo '<td>' . $fila['paterno'] . '</td>'; 
							        echo '<td>' . $fila['materno'] . '</td>'; 
							        
							        echo '<td>' . $fila['impuesto_alto'] . '</td>';
							        echo '<td>' . $fila['impuesto_medio'] . '</td>'; 
							        echo '<td>' . $fila['impuesto_bajo'] . '</td>'; 
							        
							        echo '</tr>';
							        
							    }
						    ?>
						</tbody>

					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Anterior</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Siguiente</a>
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