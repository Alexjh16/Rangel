<?php 
class Genero extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM generos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Genero.php:: ".$error->getMessage());
        }
    }
}
?>