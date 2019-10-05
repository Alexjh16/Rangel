<?php 
class Tipo_documento extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM tipo_documento");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Tipo_documento.php:: ".$error->getMessage());
        }
    }
}
?>