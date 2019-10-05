<?php 
class Rol extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM roles");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Rol.php:: ".$error->getMessage());
        }
    }
}
?>