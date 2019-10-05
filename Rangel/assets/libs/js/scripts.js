$(document).ready(function(){
    //modal registrar grupo
    $("#registrar_grupo").click(function(){
        var nombre_grupo = $("#registrar_nombre_grupo").val();
        if(nombre_grupo == ''){
            $("#error_registrar").css("display","block");
        }
        else{
            $.post('?class=Grupos&view=registrar',{nombre_grupo: nombre_grupo },function(data){
                window.location.href="?class=Grupos&view=crear&inserted=true";
            });
        }
    });

    $("#cancelar_registrar_grupo").click(function(){
        $("#registrar_nombre_grupo").val('');
        $("#error_registrar").css("display","none");
    });

    //fin modal registrar grupo

    //modal actualizar grupo
    $("#actualizar_grupo").click(function(){
        var id_grupo = $("#actualizar_id_grupo").val();
        var nombre_grupo = $("#actualizar_nombre_grupo").val();
        
        if(nombre_grupo == ''){
            $("#error_actualizar_grupo").css("display","block");
        }
        else{
            $.post('?class=Grupos&view=actualizar',{id_grupo: id_grupo, nombre_grupo: nombre_grupo},function(data){
                window.location.href="?class=Grupos&view=crear&updated=true";
            });
        }
    });

    $("#cancelar_actualizar_grupo").click(function(){
        $("#error_actualizar_grupo").css("display","none");
    });
    //fin modal actualizar grupo

    // modal eliminar grupo
    $("#eliminar_grupo").click(function(){
        var id_grupo = $("#eliminar_id_grupo").val();
        $.post('?class=Grupos&view=eliminar',{id_grupo: id_grupo},function(data){
            window.location.href="?class=Grupos&view=crear&deleted=true";
        });
    });
    //fin modal eliminar grupo

    //modal registar estudiante
    $("#registrar_estudiante").click(function(){
        var data = {
            fk_tipo_documento: $("#tipo_identificacion_estudiante").val(),
            numero_identificacion_estudiante: $("#numero_identificacion_estudiante").val(),
            fk_genero: $("#id_genero_estudiante").val(),
            nombres_estudiante: $("#nombres_estudiante").val(),
            apellidos_estudiante: $("#apellidos_estudiante").val(),
            edad_estudiante: $("#edad_estudiante").val(),
            fk_eps: $("#id_eps_estudiante").val(),
            fk_ciudad: $("#id_ciudad_estudiante").val(),
            direccion_estudiante: $("#direccion_estudiante").val(),
            celular_estudiante: $("#celular_estudiante").val(),
            email_estudiante: $("#email_estudiante").val(),
            fk_grupo: $("#id_grupo_estudiante").val()
        }
        
        $.post('?class=Estudiantes&view=registrar',{data: data},function(result){
            window.location.href="?class=Estudiantes&view=crear&inserted=true";
        });          
    });
    //fin modal registar estudiante

    //modal actualizar estudiante
    $("#actualizar_estudiante").click(function(){
        var data = {
            id_estudiante: $("#actualizar_id_estudiante").val(),
            fk_tipo_documento: $("#actualizar_tipo_identificacion_estudiante").val(),
            numero_identificacion_estudiante: $("#actualizar_numero_identificacion_estudiante").val(),
            fk_genero: $("#actualizar_id_genero_estudiante").val(),
            nombres_estudiante: $("#actualizar_nombres_estudiante").val(),
            apellidos_estudiante: $("#actualizar_apellidos_estudiante").val(),
            edad_estudiante: $("#actualizar_edad_estudiante").val(),
            fk_eps: $("#actualizar_id_eps_estudiante").val(),
            fk_ciudad: $("#actualizar_id_ciudad_estudiante").val(),
            direccion_estudiante: $("#actualizar_direccion_estudiante").val(),
            celular_estudiante: $("#actualizar_celular_estudiante").val(),
            email_estudiante: $("#actualizar_email_estudiante").val(),
            fk_grupo: $("#actualizar_id_grupo_estudiante").val()
        }
        
        $.post('?class=Estudiantes&view=actualizar',{data: data},function(result){
            window.location.href="?class=Estudiantes&view=crear&updated=true";
        });          
    });
    //fin modal actualizar estudiante

    // modal eliminar estudiante
    $("#eliminar_estudiante").click(function(){
        var id_estudiante = $("#eliminar_id_estudiante").val();
        $.post('?class=Estudiantes&view=eliminar',{id_estudiante: id_estudiante},function(data){
            window.location.href="?class=Estudiantes&view=crear&deleted=true";

        });
    });
    //fin modal eliminar estudiante


    // modal modificar asistencia
    $("#modificar_asistencia").click(function(){
        var id_registro_asistencia = $("#id_cambiar_estado_asistencia").val();
        var id_estado_asistencia = $("#id_estado_asistencia").val();
        var id_grupo = $("#id_grupo").val();
        
        $.post('?class=RegistroAsistencias&view=modificar',{id_registro_asistencia: id_registro_asistencia, id_estado_asistencia: id_estado_asistencia}, function(data){
            window.location.href="?class=RegistroAsistencias&view=registros&updated=true&id_grupo="+id_grupo;
        });
    });
    // fin modal modificar asistencia
});