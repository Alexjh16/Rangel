<?php 
class GruposController extends Grupo{

    public function crear(){
        require_once("views/grupo/crear.php");
    }
    public function registrar(){
        $nombre_grupo = $_POST['nombre_grupo'];
        parent::insert($nombre_grupo);
    }

    public function actualizar(){
        $id_grupo = $_POST['id_grupo'];
        $nombre_grupo = $_POST['nombre_grupo'];
        parent::update($id_grupo, $nombre_grupo);
    }

    public function eliminar(){
        $id_grupo = $_POST['id_grupo'];
        parent::delete($id_grupo);
    }
}
?>