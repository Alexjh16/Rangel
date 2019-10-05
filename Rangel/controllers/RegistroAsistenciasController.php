<?php 
class RegistroAsistenciasController extends RegistroAsistencia{ 
    public function index(){
        require_once("views/registroAsistencia/index.php");
    }

    public function lista(){
        require_once("views/registroAsistencia/lista.php");
    }

    public function registrar(){
        $fk_grupo = $_POST['id_grupo'];
        $fecha_registro_asistencia = $_POST['fecha_registro_asistencia'];
        $fk_profesor = 1;

        $numrows_estudiantes = count(parent::ListarGrupo($fk_grupo));

        for($i = 0; $i < $numrows_estudiantes; $i++){
            $fk_estado_asistencia = $_POST["id_estado_asistencia_$i"];
            $fk_estudiante = $_POST["id_estudiante_$i"];
            parent::insert($fk_estado_asistencia, $fk_estudiante, $fk_profesor, $fk_grupo, $fecha_registro_asistencia);
            header("location:?class=RegistroAsistencias&view=registros&id_grupo=$fk_grupo");
        }
    }

    public function registros(){
        require_once("views/registroAsistencia/registros.php");
    }

    public function modificar(){
        $id_registro_asistencia = $_POST['id_registro_asistencia'];
        $fk_estado_asistencia = $_POST['id_estado_asistencia'];
        parent::update($id_registro_asistencia, $fk_estado_asistencia);
    }
}
?>