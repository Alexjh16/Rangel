<?php $grupos = parent::read(); ?>
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

    <title>Document</title>
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
    <div class="slider-crear">
        <ul>
            <li><img class="tamaño" src="assets/libs/img/profesores/5.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/6.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/7.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/2.png" alt=""></li>
        </ul>
    </div>
    <section>


        <h1>Registro de Grupos</h1>
            <br>
        <button class="btn btn-success" data-toggle="modal" data-target="#RegistrarGrupo">Nuevo Grupo</button>
            <br><br>

        <?php if(isset($_REQUEST['inserted'])): ?>
        <div class="alert alert-success">
            <span>Registro Completo!</span> El registro se realizo exitosamente.
        </div>
        <?php endif; ?>

        <?php if(isset($_REQUEST['updated'])): ?>
        <div class="alert alert-success">
            <span>Registro Actualizado!</span> El registro se actualizo exitosamente.
        </div>
        <?php endif; ?>

        <?php if(isset($_REQUEST['deleted'])): ?>
        <div class="alert alert-danger">
            <span>Registro Eliminado!</span> El registro se elimino completamente.
        </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">GRUPO/CURSO</th>
                <th class="text-center">ACCION</th>
            </tr>
            <?php if(count($grupos) != 0): ?>
            <?php $i = 0; ?>
            <?php foreach($grupos as $grupo): ?>

            <tr>
                <td><?php print($grupo->id_grupo); ?></td>
                <td><?php print($grupo->nombre_grupo); ?></td>
                <td>
                    <button id="actualizar_id_<?php print($grupo->id_grupo); ?>" data-toggle="modal"
                        data-target="#ConsultarGrupo" class="btn btn-primary">Actualizar</button>
                    <button id="eliminar_id_<?php print($grupo->id_grupo); ?>" data-toggle="modal" data-target="#EliminarGrupo" class="btn btn-danger">ELiminar</button>
                </td>
            </tr>

            <script type="text/javascript">
                $("#actualizar_id_<?php print($grupo->id_grupo); ?>").click(function(){
                    $("#actualizar_id_grupo").val('<?php print($grupo->id_grupo); ?>');
                    $("#actualizar_nombre_grupo").val('<?php print($grupo->nombre_grupo); ?>')
                });

                $("#eliminar_id_<?php print($grupo->id_grupo); ?>").click(function(){
                    $("#eliminar_id_grupo").val('<?php print($grupo->id_grupo); ?>');
                });

            </script>
            <?php $i++; ?>
            <?php endforeach; ?>
                <tr>
                    <?php if($i == 1): ?>
                        <td colspan="3" class="text-center"><b>Solo hay un grupo registrado</b></td>
                    <?php  else: ?>
                        <td colspan="3" class="text-center"><b>Hay <?php print($i); ?> grupos registrados</b></td>
                    <?php  endif;?>
                </tr>                
            <?php else: ?>
            <tr>
                <td colspan="3" class="text-center"><b>No hay grupos registrado</b></td>
            </tr>
            <?php endif; ?>
        </table>

        <a class="btn btn-info" href="?class=Index&view=instructor">Go Back</a>
    </section>
    <!-- modal registro grupo -->
    <div class="modal fade" id="RegistrarGrupo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Registro de Grupos</h4>
                </div>
                <div class="modal-body">
                    <label for="registrar_nombre_grupo">Nombre Grupo</label>
                        <input type="text" id="registrar_nombre_grupo" class="form-control">
                    <span style="color: rgba(185, 12, 10); display:none" id="error_registrar">* Debe digitar un nombre</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="registrar_grupo">Registrar</button>
                    <button type="button" class="btn" id="cancelar_registrar_grupo" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal -->

<!-- modal actualizar grupo -->
    <div class="modal fade" id="ConsultarGrupo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Actualizar Datos</h4>
                </div>
                <div class="modal-body">
                    <label for="actualizar_id_grupo">ID Grupo</label>
                        <input type="text" class="form-control" disabled="true" id="actualizar_id_grupo">
                    <label for="actualizar_nombre_grupo">Nombre Grupo</label>
                        <input type="text" class="form-control" id="actualizar_nombre_grupo">
                    <span style="color: rgba(185, 12, 10); display:none" id="error_actualizar_grupo">* Debe digitar un nombre</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="actualizar_grupo">Confirmar</button>
                    <button type="button" class="btn" id="cancelar_actualizar_grupo" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<!-- fin modal actualizar grupo -->

<!-- modal eliminar grupo -->
    <div class="modal fade" id="EliminarGrupo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Eliminar Grupo</h4>
                    <p>
                        <div class="alert-danger">
                            ATENCION!
                        </div>
                        Si eliminas el registro de este curso, es probable que se eliminen todos los estudiantes relacionados con el.<br>
                        <span style="color: rgba(185, 15, 10);">¿Estas seguro que desea eliminar este registro?</span>
                    </p>
                    <input type="hidden" id="eliminar_id_grupo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="eliminar_grupo">Confirmar</button>
                    <button type="button" class="btn" id="cancelar_eliminar_grupo" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<!-- fin modal eliminar grupo -->

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
<script src="assets/libs/js/scripts.js"></script>
</body>

</html>