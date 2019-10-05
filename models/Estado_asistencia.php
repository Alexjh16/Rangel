<?php 
class Estado_asistencia extends database{
    public function Read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM estado_asistencia");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estado_asistencia.php:: ".$error->getMessage());
        }
    }
}
?>