<?php 
class Eps extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM eps");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Eps.php:: ".$error->getMessage());
        }
    }
}
?>