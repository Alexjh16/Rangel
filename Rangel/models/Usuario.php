<?php 
class Usuario extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM usuarios");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Usuario.php:: ".$error->getMessage());
        }
    }
}
?>