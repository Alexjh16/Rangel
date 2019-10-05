<?php 
class EstudiantesController extends Estudiante{
    public function index(){
        require_once("views/estudiante/index.php");
    }

    public function crear(){
        require_once("views/estudiante/registrar.php");
    }

    public function registrar(){
        $data = $_POST['data'];
        parent::insert($data);
    }

    public function actualizar(){
        $data = $_POST['data'];
        parent::update($data);
    }

    public function eliminar(){
        $id_estudiante = $_POST['id_estudiante'];
        parent::delete($id_estudiante);
    }
}
?>