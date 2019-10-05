<?php 
class database{
    public function connect(){
        try{
            $PDO = new PDO("mysql:host=localhost;dbname=Rangel;charset=utf8","root","");
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        }
        catch(Exception $error){
            die("Error found in file models/database.php".$error->getMessage());
        }
    }
}
?>