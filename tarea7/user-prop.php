<?php 

    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
    $distrito = $_GET['distrito'];
    $zona = $_GET['zona'];
    
    



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

    $id = $_GET['id_a'];
    $sql = "SELECT * FROM personas WHERE id_persona = '$id'";

    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);

    $sql2 = "SELECT * FROM propiedades WHERE id_persona = '$id'";
    $resultado2 = mysqli_query($con, $sql2);


?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nuevo prestamo</title>

    <?php include "cabecera.php" ?>

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
                    <i class="fas fa-plus fa-fw"></i> &nbsp; PROPIEDADES
                </h3>

            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="reservation-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA PROPIEDAD</a>
                    </li>
                    <li>
                        <a href="reservation-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PROPIEDADES</a>
                    </li>
                    <li>
                        <a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; BUSCAR PROPIEDADES</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENT-->
            <div class="container-fluid">
            	<div class="container-fluid form-neon">
                    <div class="container-fluid">
                        <p class="text-center roboto-medium">AGREGAR CLIENTE O ITEMS</p>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCliente"><i class="fas fa-user-plus"></i> &nbsp; Agregar cliente</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalItem"><i class="fas fa-box-open"></i> &nbsp; Agregar item</button>
                        </p>
                        <div>
                            <span class="roboto-medium">CLIENTE:</span> 
                            
                  			<form action="" style="display: inline-block !important;">
                            	<?php echo htmlspecialchars($fila['nombre'] . ' ' . $fila['paterno'] . ' ' . $fila['materno']); ?>


                                
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-sm">
                                <thead>
                                    <tr class="text-center roboto-medium">
                                        <th>#</th>
                                        <th>CATASTRO</th>
                                        <th>DIRECCION</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                                            echo '<tr class="text-center">';
                                            echo '<th>' . $fila2['id_propiedad'] . '</th>'; 
                                            echo '<td>' . $fila2['cod_catastral'] . '</td>'; 
                                            echo '<td>' . $fila2['direccion'] . '</td>'; 
                                            
                                            echo '<td>
                                                    <a href="user_update.php?id_a=' . $fila['id_persona'] . '" class="btn btn-success">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </a>
                                                  </td>';
                                            echo '<td>
                                                    <a href="eliminar-prop.php?id_a=' . $fila2['id_propiedad'] . '" class="btn btn-warning">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>

                                                  </td>';
                                            
                                            echo '</tr>';
                                            
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<form action="agregar-prop.php" method="POST" autocomplete="off">
                        <input type="hidden" name="id_a" value="<?php echo $id; ?>">
						<fieldset>
							<legend><i class="far fa-plus-square"></i> &nbsp; Agregar Nueva Propiedad</legend>
							<div class="container-fluid">
								<div class="row">
									
									<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="prestamo_estado" class="bmd-label-floating">Impuestos</label>
	                                        <select class="form-control" name="item_impuesto" id="item_estado">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="1">Alto</option>
	                                            <option value="2">Medio</option>
	                                            <option value="3">Bajo</option>
	                                        </select>
	                                    </div>
	                                </div>
									
	                                <div class="col-12 col-md-6">
	                                    <div class="form-group">
	                                        <label for="prestamo_pagado" class="bmd-label-floating">Direccion</label>
	                                        <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" class="form-control" name="prop_direccion" id="prestamo_pagadon" maxlength="100">
	                                    </div>
	                                </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prestamo_pagado" class="bmd-label-floating">Distrito</label>
                                            <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" value="<?php echo htmlspecialchars($distrito)?>" class="form-control" name="prop_distrito" id="prestamo_pagadon" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prestamo_pagado" class="bmd-label-floating">Zona</label>
                                            <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" value="<?php echo htmlspecialchars($zona) ?>" class="form-control" name="prop_zona" id="prestamo_pagadon" maxlength="100">
                                        </div>
                                    </div>
	                                <div class="col-12">
	                                    <div class="form-group">
	                                        <label for="prestamo_observacion" class="bmd-label-floating">Descripcion</label>
	                                        <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" class="form-control" name="prop_descripcion" id="prestamo_observacion" maxlength="400">
	                                    </div>
	                                </div>
								</div>
							</div>
						</fieldset>
						<br><br><br>
						<p class="text-center" style="margin-top: 40px;">
							<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
							&nbsp; &nbsp;
							<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
						</p>
					</form>
            	</div>
			</div>


            <!-- MODAL CLIENTE -->
            <div class="modal fade" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="ModalCliente" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalCliente">Agregar cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="agregar_cliente" class="bmd-label-floating">DNI, Nombre, Apellido, Telefono</label>
                                    <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,30}" class="form-control" name="agregar_cliente" id="agregar_cliente" maxlength="30">
                                </div>
                            </div>
                            <br>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm">
                                        <tbody>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del cliente</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del cliente</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del cliente</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del cliente</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- MODAL CLIENTE -->
            <div class="modal fade" id="ModalItem" tabindex="-1" role="dialog" aria-labelledby="ModalItem" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalItem">Agregar item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="agregar_item" class="bmd-label-floating">Código, Nombre</label>
                                    <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,30}" class="form-control" name="agregar_item" id="agregar_item" maxlength="30">
                                </div>
                            </div>
                            <br>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm">
                                        <tbody>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del item</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del item</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del item</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>000000000000 - Nombre del item</td>
                                                <td>
                                                    <form action="">
                                                        <button type="button" class="btn btn-primary"><i class="fas fa-box-open"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
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