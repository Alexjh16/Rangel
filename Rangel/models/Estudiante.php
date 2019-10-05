<?php 
class Estudiante extends database{
    public function read(){
        try{
            $stm = parent::connect()->prepare("SELECT id_estudiante, nombre_tipo_documento, id_tipo_documento, numero_identificacion_estudiante, nombre_genero, id_genero, nombres_estudiante, apellidos_estudiante, edad_estudiante, nombre_eps, id_eps, nombre_ciudad, id_ciudad, direccion_estudiante, celular_estudiante, email_estudiante, nombre_grupo, id_grupo FROM estudiantes INNER JOIN tipo_documento ON fk_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN generos ON fk_genero = generos.id_genero INNER JOIN eps ON fk_eps = eps.id_eps INNER JOIN ciudades ON fk_ciudad = ciudades.id_ciudad INNER JOIN grupos ON fk_grupo = grupos.id_grupo ORDER BY id_estudiante ASC");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php:: ".$error->getMessage());
        }
    }

    public function insert($data){
        try{
            $stm = parent::connect()->prepare("INSERT INTO estudiantes(numero_identificacion_estudiante, nombres_estudiante, apellidos_estudiante, edad_estudiante, direccion_estudiante, celular_estudiante, email_estudiante, fk_grupo, fk_eps, fk_tipo_documento, fk_genero, fk_ciudad) VALUES('$data[numero_identificacion_estudiante]','$data[nombres_estudiante]','$data[apellidos_estudiante]','$data[edad_estudiante]','$data[direccion_estudiante]','$data[celular_estudiante]','$data[email_estudiante]','$data[fk_grupo]','$data[fk_eps]','$data[fk_tipo_documento]','$data[fk_genero]','$data[fk_ciudad]')");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php:: ".$error->getMessage());
        }
    }

    public function update($data){
        try{
            $stm = parent::connect()->prepare("UPDATE estudiantes SET numero_identificacion_estudiante = $data[numero_identificacion_estudiante], nombres_estudiante = '$data[nombres_estudiante]', apellidos_estudiante = '$data[apellidos_estudiante]', edad_estudiante = $data[edad_estudiante], direccion_estudiante = '$data[direccion_estudiante]', celular_estudiante = '$data[celular_estudiante]', email_estudiante = '$data[email_estudiante]', fk_grupo = $data[fk_grupo], fk_eps = $data[fk_eps], fk_tipo_documento = $data[fk_tipo_documento], fk_genero = $data[fk_genero], fk_ciudad = $data[fk_ciudad] WHERE id_estudiante = $data[id_estudiante]");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php:: ".$error->getMessage());
        }
    }

    public function delete($id_estudiante){
        try{
            $stm = parent::connect()->prepare("DELETE FROM estudiantes WHERE id_estudiante = $id_estudiante");
            $stm->execute();
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php:: ".$error->getMessage());
        }
    }

    public function ConsultarGrupo(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM grupos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php::".$error->getMessage());
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

    public function ConsultarEps(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM eps");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php::".$error->getMessage());
        }
    }

    public function ConsultarTipoDocumento(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM tipo_documento");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php::".$error->getMessage());
        }
    }

    public function ConsultarGenero(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM generos");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php::".$error->getMessage());
        }
    }

    public function ConsultarCiudad(){
        try{
            $stm = parent::connect()->prepare("SELECT * FROM ciudades");
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $error){
            die("Error found in file models/Estudiante.php::".$error->getMessage());
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