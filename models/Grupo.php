<?php 
class Grupo extends database{
    public function read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM grupos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Grupo.php:: ".$error->getMessage());
        }
    }

    public function insert($nombre_grupo){
        try{
            $stm = parent::connect()->prepare("INSERT INTO grupos(nombre_grupo) VALUES('$nombre_grupo')");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Grupo.php:: ".$error->getMessage());
        }
    }
    
    public function update($id_grupo, $nombre_grupo){
        try{
            $stm = parent::connect()->prepare("UPDATE grupos SET nombre_grupo = '$nombre_grupo' WHERE id_grupo = $id_grupo");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Grupo.php:: ".$error->getMessage());
        }
    }

    public function delete($id_grupo){
        try{
            $stm = parent::connect()->prepare("DELETE FROM grupos WHERE id_grupo = $id_grupo");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Grupo.php:: ".$error->getMessage());
        }
    }
}
?>