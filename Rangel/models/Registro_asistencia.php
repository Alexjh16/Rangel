<?php 
date_default_timezone_set("America/Bogota");
class RegistroAsistencia extends database{
    public function read(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM registro_asistencias");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function insert($fk_estado_asistencia, $fk_estudiante, $fk_profesor, $fk_grupo, $fecha_registro_asistencia){
        try{
            $stm = parent::connect()->prepare("INSERT INTO registro_asistencias(fk_estado_asistencia, fk_estudiante, fk_profesor, fk_grupo, fecha_registro_asistencia) VALUES($fk_estado_asistencia, $fk_estudiante, $fk_profesor, $fk_grupo, '$fecha_registro_asistencia')");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function update($id_registro_asistencia, $fk_estado_asistencia){
        try{
            $stm = parent::connect()->prepare("UPDATE registro_asistencias set fk_estado_asistencia = $fk_estado_asistencia WHERE id_registro_asistencia = $id_registro_asistencia");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function ConsultarGrupos(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM grupos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function ListarGrupo($id_grupo){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM estudiantes INNER JOIN grupos ON fk_grupo = grupos.id_grupo WHERE fk_grupo = $id_grupo ORDER BY id_estudiante ASC");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function ConsultarEstadosAsistencia(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM estado_asistencia ORDER BY nombre_estado_asistencia ASC");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function RegistroGrupo($id_grupo){
        try{
            $stm = parent::connect()->prepare("SELECT id_registro_asistencia, nombre_grupo, id_grupo, nombres_estudiante, apellidos_estudiante, id_estudiante, nombre_estado_asistencia, id_estado_asistencia, fecha_registro_asistencia FROM registro_asistencias INNER JOIN grupos ON fk_grupo = grupos.id_grupo INNER JOIN estudiantes ON fk_estudiante = estudiantes.id_estudiante INNER JOIN estado_asistencia ON fk_estado_asistencia = estado_asistencia.id_estado_asistencia WHERE id_grupo = $id_grupo");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function ValidarFechaRegistroLista($id_grupo){
        try{
            $stm = parent::connect()->prepare("SELECT fecha_registro_asistencia FROM registro_asistencias WHERE fk_grupo = $id_grupo");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            $fecha_actual = date("Y-m-d");
            foreach($data as $fecha){
                if($fecha->fecha_registro_asistencia == $fecha_actual){
                    return true;
                    break;
                }
                else{
                    return false;
                    break;
                }
            }
        }
        catch(Exception $error){
            die("Error found in file models/Registro_asistencia.php:: ".$error->getMessage());
        }
    }

    public function ConsultarFecha(){
        $date = date("Y-m-d");
        $date_default = $date;
        list($year, $month, $day) = explode("-",$date);
        switch($month){
            case 1:
                $month = "Enero";
            break;
            
            case 2:
                $month = "Febrero";
            break;

            case 3:
                $month = "Marzo";
            break;

            case 4:
                $month = "Abril";
            break;

            case 5:
                $month = "Mayo";
            break;

            case 6:
                $month = "Junio";
            break;

            case 7:
                $month = "Julio";
            break;

            case 8:
                $month = "Agosto";
            break;

            case 9:
                $month = "Septiembre";
            break;

            case 10:
                $month = "Octubre";
            break;

            case 11:
                $month = "Noviembre";
            break;

            case 12:
                $month = "Diciembre";
            break;      
        }

        $date = ($month." ".$day." del ".$year);
        print($date);
        return $date_default;
    }
}
?>