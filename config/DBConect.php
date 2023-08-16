<?php

    // Modificado por Daniela Henao López
    class Database { 
        public $db;   // handle of the db connexion    
        private static $dns = "mysql:host=localhost;dbname=colegio"; 
        private static $user = "root"; 
        private static $pass = "";     
        private static $instance;

        public function __construct ()  
        {        
            $this->db = new PDO(self::$dns,self::$user,self::$pass);       
        } 

        // Se crea la instancia de la clase Database.
        // Se instancia la clase para iniciarla y poder acceder a las propiedades.
        public static function getInstance()
        { 
            if(!isset(self::$instance)) 
            { 
                $object= __CLASS__; 
                self::$instance=new $object; 
            } 
            return self::$instance; 
        } 
            
        public function DatosEstudiantes() { 
            $conexion = Database::getInstance(); 
            $sql  ="SELECT id,identificacion,nombres,apellidos,email,telefono,sexo,edad,raza from estudiantes ";
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function CrearEstudiante($identificacion,$nombres,$apellidos,$email,$telefono,$sexo,$edad,$raza) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO estudiantes (identificacion,nombres,apellidos,email,telefono,sexo,edad,raza) VALUES (:identificacion,:nombres,:apellidos,:email,:telefono,:sexo,:edad,:raza)");
                $result->execute(
                                    array(
                                        ':identificacion'=>$identificacion,
                                        ':nombres'=>$nombres,
                                        ':apellidos'=>$apellidos,
                                        ':email'=>$email,
                                        ':telefono'=>$telefono,
                                        ':sexo'=>$sexo,
                                        ':edad'=>$edad,
                                        ':raza'=>$raza,
         
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
         }
         

         public function editEstudiante($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,identificacion,nombres,apellidos,email,telefono,sexo,edad,raza from estudiantes where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
         } 

       public function updateEstudiante($id,$nombres,$apellidos,$email,$telefono,$identificacion,$sexo,$edad,$raza) { 

   try {
       $conexion = Database::getInstance(); 
       $result = $conexion->db->prepare("UPDATE estudiantes set nombres=:nombres,apellidos=:apellidos,email=:email,telefono=:telefono,identificacion=:identificacion,sexo=:sexo,edad=:edad,raza=:raza where id=:id ");
       $result->execute(
                           array(
                               ':nombres'=>$nombres,
                               ':apellidos'=>$apellidos,
                               ':email'=>$email,
                               ':telefono'=>$telefono,
                               ':identificacion'=>$identificacion,
                               ':sexo'=>$sexo,
                               ':edad'=>$edad,
                               ':raza'=>$raza,
                               ':id'=>$id,

                           )
                       );
       return "3";
   } catch(PDOException $e) {
       return "0";
   }
}
        
        public function EliminarEstudiante($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM estudiantes WHERE id=?");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }


        public function DatosMaterias() { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre,intensidad_horaria,tipo,creditos from materias"; 
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function EliminarMateria($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM materias WHERE id=?");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }

        public function CrearMateria($nombre,$intensidad_horaria,$tipo,$creditos) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO materias (nombre,intensidad_horaria,tipo,creditos) VALUES (:nombre,:intensidad_horaria,:tipo,:creditos)");
                $result->execute(
                                    array(
                                        ':nombre'=>$nombre,
                                        ':intensidad_horaria'=>$intensidad_horaria,
                                        ':tipo'=>$tipo,
                                        ':creditos'=>$creditos
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
         } 

         public function editMateria($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre,intensidad_horaria,tipo,creditos from materias where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
         }
         
     public function updateMateria($nombre,$intensidad_horaria,$tipo,$creditos,$id) { 

   try {
       $conexion = Database::getInstance(); 
       $result = $conexion->db->prepare("UPDATE materias SET nombre=:nombre,intensidad_horaria=:intensidad_horaria,tipo=:tipo,creditos=:creditos where id=:id ");
       $result->execute(
                           array(
                               ':nombre'=>$nombre,
                               ':intensidad_horaria'=>$intensidad_horaria,
                               ':tipo'=>$tipo,
                               ':creditos'=>$creditos,
                               ':id'=>$id,
                           )
                       );
       return "3";
   } catch(PDOException $e) {
       return "0";
   }
}


    }

?>