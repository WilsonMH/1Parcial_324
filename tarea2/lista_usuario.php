
<?php 

	session_start();
	$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';


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
	$sql = "SELECT * FROM personas";
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>
				
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="nuevo_usuario.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a class="active" href="lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<li>
						<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
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
								<th>NOMBRE</th>
								<th>PATERNO</th>
								<th>MATERNO</th>
								<th>CI</th>
								<th>DIRECCION</th>
								<th>USUARIO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
								<th>PROPIEDADES</th>
							</tr>
						</thead>
						<tbody>
						    <?php
							    while ($fila = mysqli_fetch_array($resultado)) {
							        echo '<tr class="text-center">';
							        echo '<th>' . $fila['id_persona'] . '</th>'; 
							        echo '<td>' . $fila['nombre'] . '</td>'; 
							        echo '<td>' . $fila['paterno'] . '</td>'; 
							        echo '<td>' . $fila['materno'] . '</td>'; 
							        echo '<td>' . $fila['dni'] . '</td>'; 
							        echo '<td>' . $fila['direccion'] . '</td>';
							        echo '<td>' . $fila['user'] . '</td>'; 
							        echo '<td>
							                <a href="user_update.php?id_a=' . $fila['id_persona'] . '" class="btn btn-success">
							                    <i class="fas fa-sync-alt"></i>
							                </a>
							              </td>';
							        echo '<td>
							                <form action="eliminar_user.php" method="get">
							                    <input type="hidden" name="id_e" value="' . $fila['id_persona'] . '">
							                    <button type="submit" class="btn btn-warning">
							                        <i class="far fa-trash-alt"></i>
							                    </button>
							                </form>
							              </td>';
							        echo '<td>
							                <a href="user-prop.php?id_a=' . $fila['id_persona'] . '" class="btn btn-house">
							                    <i class="fas fa-home"></i>
							                </a>
							              </td>';
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