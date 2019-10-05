<?php 
class Ciudad extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM ciudades");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Ciudad.php:: ".$error->getMessage());
        }
    }
}
?>