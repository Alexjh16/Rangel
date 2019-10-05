<?php $estudiantes = parent::read(); ?>
<?php $grupos = parent::ConsultarGrupo(); ?>
<?php $epss = parent::ConsultarEps(); ?>
<?php $tipo_documentos = parent::ConsultarTipoDocumento(); ?>
<?php $generos = parent::ConsultarGenero(); ?>
<?php $ciudades = parent::ConsultarCiudad(); ?>
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

    <title>Registrar</title>
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
    <!-- <input type="checkbox" id="cerrar">
    <div class="modal">
        <div class="container contenido">
            <label class="cerra-btn" for="cerrar" id="btn-cerrar">X</label>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Estudiante</label>
                                    <input type="text" name="" class="form-control">
                                    <label for="">Curso</label>
                                    <select name="" id="">
                                    </select>
                                </div>
                                <button class="btn btn-danger">Registrar</button><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="slider-crear">
        <ul>
            <li><img class="tamaño" src="assets/libs/img/profesores/8.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/9.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/10.jpg" alt=""></li>
            <li><img class="tamaño" src="assets/libs/img/profesores/11.jpg" alt=""></li>
        </ul>
    </div>
    <section>
        <h1>Registrar Estudiante</h1>
        <br>
        <button class="btn btn-success" data-toggle="modal" data-target="#RegistrarEstudiante">Ingresar Nuevo
            Estudiante</button>
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
        <table class="table table-bordered table-striped table-collapse">
            <tr>
                <th>ID</th>
                <th>ESTUDIANTE</th>
                <th>GRUPO/CURSO</th>
                <th>Accion</th>
            </tr>
            <?php if(count($estudiantes) != 0): ?>
                <?php $i = 0; ?>
                <?php foreach($estudiantes as $estudiante): ?>
                <tr>
                    <td><?php print($estudiante->id_estudiante); ?></td>
                    <td><?php print($estudiante->nombres_estudiante." ".$estudiante->apellidos_estudiante); ?></td>
                    <td><?php print($estudiante->nombre_grupo); ?></td>
                    <td>
                        <button id="consultar_id_<?php print($estudiante->id_estudiante); ?>" data-toggle="modal" data-target="#ConsultarEstudiante" class="btn btn-info">Ver mas...</button>
                        <button  id="actualizar_id_<?php print($estudiante->id_estudiante); ?>" data-toggle="modal" data-target="#ActualizarEstudiante"  class="btn btn-primary">Actualizar</button>
                        <button id="eliminar_id_<?php print($estudiante->id_estudiante); ?>" data-toggle="modal" data-target="#EliminarEstudiante"  class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <script>

                    //button consultar
                    $("#consultar_id_<?php print($estudiante->id_estudiante); ?>").click(function(){
                        $("#consultar_tipo_identificacion_estudiante").val('<?php print($estudiante->nombre_tipo_documento) ?>');
                        $("#consultar_numero_identificacion_estudiante").val('<?php print($estudiante->numero_identificacion_estudiante) ?>');
                        $("#consultar_id_genero_estudiante").val('<?php print($estudiante->nombre_genero) ?>');
                        $("#consultar_nombres_estudiante").val('<?php print($estudiante->nombres_estudiante) ?>');
                        $("#consultar_apellidos_estudiante").val('<?php print($estudiante->apellidos_estudiante) ?>');
                        $("#consultar_edad_estudiante").val('<?php print($estudiante->edad_estudiante) ?>');
                        $("#consultar_id_eps_estudiante").val('<?php print($estudiante->nombre_eps) ?>');
                        $("#consultar_id_ciudad_estudiante").val('<?php print($estudiante->nombre_ciudad) ?>');
                        $("#consultar_direccion_estudiante").val('<?php print($estudiante->direccion_estudiante) ?>');
                        $("#consultar_celular_estudiante").val('<?php print($estudiante->celular_estudiante) ?>');
                        $("#consultar_email_estudiante").val('<?php print($estudiante->email_estudiante) ?>');
                        $("#consultar_id_grupo_estudiante").val('<?php print($estudiante->nombre_grupo) ?>');
                    });
                    // end function buttton consultar

                    //button actualizar
                    $("#actualizar_id_<?php print($estudiante->id_estudiante); ?>").click(function(){
                        $("#actualizar_id_estudiante").val(<?php print($estudiante->id_estudiante); ?>);
                        $("#actualizar_tipo_identificacion_estudiante").val('<?php print($estudiante->id_tipo_documento) ?>');
                        $("#actualizar_numero_identificacion_estudiante").val('<?php print($estudiante->numero_identificacion_estudiante) ?>');
                        $("#actualizar_id_genero_estudiante").val('<?php print($estudiante->id_genero) ?>');
                        $("#actualizar_nombres_estudiante").val('<?php print($estudiante->nombres_estudiante) ?>');
                        $("#actualizar_apellidos_estudiante").val('<?php print($estudiante->apellidos_estudiante) ?>');
                        $("#actualizar_edad_estudiante").val('<?php print($estudiante->edad_estudiante) ?>');
                        $("#actualizar_id_eps_estudiante").val('<?php print($estudiante->id_eps) ?>');
                        $("#actualizar_id_ciudad_estudiante").val('<?php print($estudiante->id_ciudad) ?>');
                        $("#actualizar_direccion_estudiante").val('<?php print($estudiante->direccion_estudiante) ?>');
                        $("#actualizar_celular_estudiante").val('<?php print($estudiante->celular_estudiante) ?>');
                        $("#actualizar_email_estudiante").val('<?php print($estudiante->email_estudiante) ?>');
                        $("#actualizar_id_grupo_estudiante").val('<?php print($estudiante->id_grupo) ?>');
                    });
                    // end function buttton actualizar

                    // function button eliminar
                    $("#eliminar_id_<?php print($estudiante->id_estudiante); ?>").click(function(){
                        $("#eliminar_id_estudiante").val('<?php print($estudiante->id_estudiante); ?>');
                    });
                    //end function button eliminar

                </script>
                <?php $i++; ?>
                <?php endforeach; ?>
                    <tr>
                        <?php if($i == 1): ?>
                            <td colspan="4" class="text-center"><b>Solo hay un estudiante registrado</b></td>
                        <?php  else: ?>
                            <td colspan="4" class="text-center"><b>Hay <?php print($i); ?> estudiantes registrados</b></td>
                        <?php  endif;?>
                    </tr>
            <?php else: ?>
                <tr>
                    <td colspan="4"><b>No hay estudiantes registrados</b></td>
                </tr>
            <?php endif; ?>
        </table>


        <a class="btn btn-info" href="?class=Index&view=instructor">Go Back</a>
    </section>
    <!-- modal registro estudiante -->
    <div class="modal fade" id="RegistrarEstudiante" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Registro de Estudiante</h4>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="tipo_identificacion_estudiante" class="col-sm-3">Tipo Documento</label>
                        <div class="col-sm-9">
                            <select id="tipo_identificacion_estudiante" class="form-control">
                                <option value="" disable="true" selected="true">Elija una opcion</option>
                                <?php foreach($tipo_documentos as $tipo_documento): ?>
                                <option value="<?php print($tipo_documento->id_tipo_documento); ?>">
                                    <?php print($tipo_documento->nombre_tipo_documento); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numero_identificacion estudiante" class="col-sm-3">N° Documento</label>
                        <div class="col-sm-9">
                            <input type="text" id="numero_identificacion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_genero_estudiante" class="col-sm-3">Genero</label>
                        <div class="col-sm-9">
                            <select id="id_genero_estudiante" class="form-control">
                                <option value="" disable="true" selected="true">Elija una opcion</option>
                                <?php foreach($generos as $genero): ?>
                                <option value="<?php print($genero->id_genero); ?>">
                                    <?php print($genero->nombre_genero); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombres_estudiante" class="col-sm-3">Nombres</label>
                        <div class="col-sm-9">
                            <input type="text" id="nombres_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos_estudiante" class="col-sm-3">Apellidos</label>
                        <div class="col-sm-9">
                            <input type="text" id="apellidos_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edad_estudiante" class="col-sm-3">Edad</label>
                        <div class="col-sm-9">
                            <input type="number" id="edad_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_eps_estudiante" class="col-sm-3">EPS</label>
                        <div class="col-sm-9">
                            <select id="id_eps_estudiante" class="form-control">
                                <option value="" disable="true" selected="true">Elija una opcion</option>
                                <?php foreach($epss as $eps): ?>
                                    <option value="<?php print($eps->id_eps); ?>">
                                    <?php print($eps->nombre_eps); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_ciudad_estudiante" class="col-sm-3">Ciudad</label>
                        <div class="col-sm-9">
                            <select id="id_ciudad_estudiante" class="form-control">
                                <option value="" disable="true" selected="true">Elija una opcion</option>
                                <?php foreach($ciudades as $ciudad): ?>
                                    <option value="<?php print($ciudad->id_ciudad); ?>">
                                    <?php print($ciudad->nombre_ciudad); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion_estudiante" class="col-sm-3">Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" id="direccion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular_estudiante" class="col-sm-3">Celular</label>
                        <div class="col-sm-9">
                            <input type="text" id="celular_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_estudiante" class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="email_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_grupo_estudiante" class="col-sm-3">Grupo</label>
                        <div class="col-sm-9">
                            <select id="id_grupo_estudiante" class="form-control">
                                <option value="" disable="true" selected="true">Elija un grupo para asignar</option>
                                <?php foreach($grupos as $grupo): ?>
                                <option value="<?php print($grupo->id_grupo); ?>">
                                    <?php print($grupo->nombre_grupo); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <span style="color: rgba(185, 14, 10); display:none;" id="error_registrar"> * Complete todos los campos</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="registrar_estudiante">Registrar</button>
                    <button type="button" class="btn" id="cancelar_registrar_estudiante"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal registro estudiante -->


 <!-- modal actualizar estudiante -->
 <div class="modal fade" id="ActualizarEstudiante" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Actualizar informacion Estudiante</h4>
                </div>
                <div class="modal-body">
                <form>
                <div>
                    <input type="hidden" id="actualizar_id_estudiante">
                </div>
                    <div class="form-group row">
                        <label for="actualizar_tipo_identificacion_estudiante" class="col-sm-3">Tipo Documento</label>
                        <div class="col-sm-9">
                            <select id="actualizar_tipo_identificacion_estudiante" class="form-control">
                                <?php foreach($tipo_documentos as $tipo_documento): ?>
                                <option selected="true" value="<?php print($tipo_documento->id_tipo_documento); ?>">
                                    <?php print($tipo_documento->nombre_tipo_documento); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_numero_identificacion_estudiante" class="col-sm-3">N° Documento</label>
                        <div class="col-sm-9">
                            <input type="text" id="actualizar_numero_identificacion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_id_genero_estudiante" class="col-sm-3">Genero</label>
                        <div class="col-sm-9">
                            <select id="actualizar_id_genero_estudiante" class="form-control">
                                <?php foreach($generos as $genero): ?>
                                <option selected="true" value="<?php print($genero->id_genero); ?>">
                                    <?php print($genero->nombre_genero); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_nombres_estudiante" class="col-sm-3">Nombres</label>
                        <div class="col-sm-9">
                            <input type="text" id="actualizar_nombres_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_apellidos_estudiante" class="col-sm-3">Apellidos</label>
                        <div class="col-sm-9">
                            <input type="text" id="actualizar_apellidos_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_edad_estudiante" class="col-sm-3">Edad</label>
                        <div class="col-sm-9">
                            <input type="number" id="actualizar_edad_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_id_eps_estudiante" class="col-sm-3">EPS</label>
                        <div class="col-sm-9">
                            <select id="actualizar_id_eps_estudiante" class="form-control">
                                <?php foreach($epss as $eps): ?>
                                    <option selected="true" value="<?php print($eps->id_eps); ?>">
                                    <?php print($eps->nombre_eps); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_id_ciudad_estudiante" class="col-sm-3">Ciudad</label>
                        <div class="col-sm-9">
                            <select id="actualizar_id_ciudad_estudiante" class="form-control">
                                <?php foreach($ciudades as $ciudad): ?>
                                    <option selected="true" value="<?php print($ciudad->id_ciudad); ?>">
                                    <?php print($ciudad->nombre_ciudad); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_direccion_estudiante" class="col-sm-3">Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" id="actualizar_direccion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_celular_estudiante" class="col-sm-3">Celular</label>
                        <div class="col-sm-9">
                            <input type="text" id="actualizar_celular_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_email_estudiante" class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="actualizar_email_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="actualizar_id_grupo_estudiante" class="col-sm-3">Grupo</label>
                        <div class="col-sm-9">
                            <select id="actualizar_id_grupo_estudiante" class="form-control">
                                <?php foreach($grupos as $grupo): ?>
                                <option selected="true" value="<?php print($grupo->id_grupo); ?>">
                                    <?php print($grupo->nombre_grupo); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <span style="color: rgba(185, 14, 10); display:none;" id="error_actualizar"> * Complete todos los campos</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="actualizar_estudiante">Registrar</button>
                    <button type="button" class="btn" id="cancelar_actualizar_estudiante"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal actualizar estudiante -->
    

    <!-- modal consultar estudiante -->
    <div class="modal fade" id="ConsultarEstudiante" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Informacion del Estudiante</h4>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="consultar_tipo_identificacion_estudiante" class="col-sm-3">Tipo Documento</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_tipo_identificacion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_numero_identificacion_estudiante" class="col-sm-3">N° Documento</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_numero_identificacion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_id_genero_estudiante" class="col-sm-3">Genero</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_id_genero_estudiante"    class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_nombres_estudiante" class="col-sm-3">Nombres</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_nombres_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_apellidos_estudiante" class="col-sm-3">Apellidos</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_apellidos_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_edad_estudiante" class="col-sm-3">Edad</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="number" id="consultar_edad_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_id_eps_estudiante" class="col-sm-3">EPS</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_id_eps_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_id_ciudad_estudiante" class="col-sm-3">Ciudad</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_id_ciudad_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_direccion_estudiante" class="col-sm-3">Direccion</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_direccion_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_celular_estudiante" class="col-sm-3">Celular</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_celular_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_email_estudiante" class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="email" id="consultar_email_estudiante" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="consultar_id_grupo_estudiante" class="col-sm-3">Grupo</label>
                        <div class="col-sm-9">
                            <input disabled="true" type="text" id="consultar_id_grupo_estudiante" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="cancelar_registrar_estudiante"
                        data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal consultar estudiante -->




    <!-- modal eliminar grupo -->
    <div class="modal fade" id="EliminarEstudiante" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Eliminar Estudiante</h4>
                    <p>
                        <div class="alert-danger">
                            ATENCION!
                        </div>
                        Si eliminas el registro de este estudiante, es probable que los cambios sean irrevercibles<br>
                        <span style="color: rgba(185, 15, 10);">¿Estas seguro que desea eliminar este registro?</span>
                    </p>
                    <input type="hidden" id="eliminar_id_estudiante">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="eliminar_estudiante">Confirmar</button>
                    <button type="button" class="btn" id="cancelar_eliminar_estudiante" data-dismiss="modal">Cancelar</button>
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
</body>
<script src="assets/libs/js/scripts.js"></script>

</html>