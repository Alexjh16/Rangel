<?php 
class Registro_grupo extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM registro_grupo");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_grupo.php:: ".$error->getMessage());
        }
    }
}
?>