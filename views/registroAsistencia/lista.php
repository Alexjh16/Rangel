<?php $id_grupo = $_POST['id_grupo']; ?>
<?php $estudiantes = parent::ListarGrupo($id_grupo); ?>
<?php $estados_asistencia = parent::ConsultarEstadosAsistencia(); ?>
<?php $ValidarFechaRegistro = parent::ValidarFechaRegistroLista($id_grupo); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <title>Lista</title>
</head>

<body class="body-crear">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="title" href="?class=Index&view=index">Carlos Rangel Lamus
                </a>
                <p class="font">INSTRUCTOR</p>
            </div>
        </div>
    </nav>
    <section>
        <h1 class="fontin">Llamado Lista <small>Fecha: <?php parent::ConsultarFecha(); ?></small></h1>
        <?php if($ValidarFechaRegistro == true): ?>
            <div class="alert alert-warning">
                <h5>Ya hay un registro de lista para esta fecha!! </h5>
                    <br>
                <a href="?class=RegistroAsistencias&view=registros&id_grupo=<?php print($id_grupo); ?>" class="btn btn-warning">ver lista</a>
            </div>
        <?php endif; ?>
    <form action="?class=RegistroAsistencias&view=registrar" method="post">
        <table class="table table-bordered table-striped table-collapse">
            <tr>
                <th>ID</th>
                <th>GRUPO</th>
                <th>ESTUDIANTE</th>
                <th>ESTADO ASISTENCIA</th>
                <!-- <th>MODFICAR</th> -->
            </tr>
                <?php if(count($estudiantes) != 0): ?>
                <?php $i = 0; ?>
                <?php foreach($estudiantes as $estudiante): ?>
                <tr>
                <td><?php print($estudiante->id_estudiante); ?></td>
                <td><?php print($estudiante->nombre_grupo); ?></td>
                <td><?php print($estudiante->nombres_estudiante." ".$estudiante->apellidos_estudiante); ?></td>
                <td>
                    <select name="id_estado_asistencia_<?php print($i); ?>" id="" class="form-control" required="true">
                        <option value="" disabled="true" selected="true">-----</option>
                        <?php foreach($estados_asistencia as $estado_asistencia): ?>
                        <option value="<?php print($estado_asistencia->id_estado_asistencia) ?>">
                            <?php  print($estado_asistencia->nombre_estado_asistencia); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                <!-- hide values to send with post -->
                    <p style="display: none"><?php $date = parent::ConsultarFecha();?></p>
                    <input type="hidden" name="id_grupo" value="<?php print($id_grupo); ?>">
                    <input type="hidden" name="id_estudiante_<?php print($i); ?>" value="<?php print($estudiante->id_estudiante); ?>">
                    <input type="hidden" name="fecha_registro_asistencia" value="<?php print($date); ?>">
                </td>             

                <!-- <td>
                        <button id="ModificarEstado" class="btn btn-primary">Cambiar estado</button>
                    </td> -->
                    <tr>
                <?php $i++; ?>
                <?php endforeach; ?>

                <?php if($i == 1): ?>
                <td colspan="5" class="text-center"><b>Hay un solo estudiante registrado en este grupo</b></td>
                <?php else: ?>
                <td colspan="5" class="text-center"><b>Hay <?php print($i); ?> estudiantes registrados en este grupo</b>
                </td>
                <?php endif; ?>
            </tr>
            <?php  else: ?>
            <tr>
                <td colspan="5" class="text-center"><b>No hay estudiantes registrados en este grupo</b></td>
            </tr>
            <?php endif; ?>
            </tr>
        </table>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <a class="btn btn-info" href="?class=RegistroAsistencias&view=index">Go Back</a></div>
                    <?php if (count($estudiantes) != 0): ?>
                        <div class="col-md-2">
                            <button class="btn btn-success" id="RegistrarAsitencias" >Enviar registro</button>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </form>
    </section>



    <footer class="footer campo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h4>Desarrolladores</h4>
                    <p><a class="fondos" href="https://github.com/Dashell2514">{Dashell Carrero}</a> | <a
                            class="fondos1" href="https://github.com/Alexjh16">{Jhon Ramos}</a></p>
                    <p><a class="fondos1" href="https://github.com/vaneXa02">{Vanessa Vega}</a> | <a class="fondos"
                            href="">{Kewin Angel}</a></p>
                    <p><a class="fondos" href="">{Lucrecia}</a> | <a class="fondos1"
                            href="https://github.com/juancaro2002">{David Martinez}</a></p>
                </div>
                <div class="col-md-4">
                    <h4>Ubicacion</h4>
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1739954249406!2d-72.2304113498075!3d7.771366494371725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e666ca27803e231%3A0x9e40da4279e47568!2sEscuela%20Carlos%20Rangel%20Lamus!5e0!3m2!1ses!2sco!4v1569952924299!5m2!1ses!2sco"
                        width="420" height="120"></iframe>
                </div>
                <div class="col-md-4">
                    <h4>Contactenos</h4>
                    <a href="https://www.facebook.com/"><img class="fb" src="assets/libs/img/icons/facebook.png"
                            width="60"></a>
                    <a href="https://www.instagram.com/"><img class="icon" src="assets/libs/img/icons/instagram.png"
                            width="60"></a>
                    <a href="https://github.com/"><img class="icon" src="assets/libs/img/icons/github.png"
                            width="60"></a>
                    <div> &copy; Icons made by <a href="https://www.flaticon.es/autores/freepik"
                            title="Freepik">Freepik</a>
                        from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a></div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>