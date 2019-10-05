<?php 
    $id_grupo = $_REQUEST['id_grupo'];
    $registros = parent::RegistroGrupo($id_grupo);
    $estados_asistencia = parent::ConsultarEstadosAsistencia();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">

    <script type="text/javascript" src="assets/libs/js/jquery.js"></script>
    <script type="text/javascript" src="assets/libs/js/bootstrap.js"></script>
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

        <h1 class="fontin text-center">Registro de Asistencia</h1>
        <div class="alert alert-success">
            <span>El registro de asistencia, se guardo con exito!</span>
            <br><b>Puede verificar en la siguiente tabla.</b><br>
            <b>Fecha: </b> <?php parent::ConsultarFecha(); ?>
        </div>
        <?php if(isset($_REQUEST['updated'])): ?>
            <div class="alert alert-success">
                <span>El registro del estudiante ha sido actualizado</span>
                <br><b>Completamente!</b><br>
            </div>
        <?php endif; ?>
        <table class="table table-bordered table-striped table-collapse">
            <tr>
                <th>ID</th>
                <th>GRUPO/CURSO</th>
                <th>ESTUDIANTE</th>
                <th>ESTADO ASISTENCIA</th>
                <th>MODIFICAR</th>
            </tr>
            <?php foreach($registros as $registro): ?>
            <tr>
                <td><?php print($registro->id_registro_asistencia); ?></td>
                <td><?php print($registro->nombre_grupo); ?></td>
                <td><?php print($registro->nombres_estudiante." ".$registro->apellidos_estudiante); ?></td>
                <td><b><?php print($registro->nombre_estado_asistencia); ?></b></td>
                <td>
                    <button data-toggle="modal" data-target="#CambiarEstadoAsistencia"
                        id="cambiar_estado_asistencia_<?php print($registro->id_registro_asistencia); ?>"
                        class="btn btn-primary">Cambiar estado</button>
                </td>
            </tr>

            <script type="text/javascript">
            $("#cambiar_estado_asistencia_<?php print($registro->id_registro_asistencia); ?>").click(function() {
                $("#id_cambiar_estado_asistencia").val('<?php print($registro->id_registro_asistencia); ?>');
                $("#id_estado_asistencia").val('<?php print($registro->id_estado_asistencia); ?>');
                $("#nombres_estudiante").val(
                    '<?php print($registro->nombres_estudiante." ".$registro->apellidos_estudiante) ?>');
            });
            </script>
            <?php endforeach; ?>
        </table>
        
        <a class="btn btn-info" href="?class=Index&view=instructor">Go Back</a>
    </section>
    

    <!-- modal actualizar asistencia -->
    <div class="modal fade" id="CambiarEstadoAsistencia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Modificar el estado de asistencia</h4>
                </div>
                <div class="modal-body">
                    <p>Es probable que te hayas confundido al momento de hacer el registro de lista! :)</p>
                    <input type="hidden" id="id_cambiar_estado_asistencia">
                    <input type="hidden" id="id_grupo" value="<?php print($id_grupo); ?>">
                    <label for="nombres_estudiante">Nombres del estudiante</label>
                    <input type="text" disabled="true" id="nombres_estudiante" class="form-control">
                    <label for="id_estado_asistencia">Estado Asistencia</label>
                    <select name="" id="id_estado_asistencia" class="form-control">
                        <?php foreach($estados_asistencia as $estado_asistencia): ?>
                        <option selected="true" value="<?php print($estado_asistencia->id_estado_asistencia); ?>">
                            <?php print($estado_asistencia->nombre_estado_asistencia); ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="modificar_asistencia">Modificar</button>
                    <button class="btn" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal actualizar asistencia -->
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
<script src="assets/libs/js/scripts.js"></script>

</html>