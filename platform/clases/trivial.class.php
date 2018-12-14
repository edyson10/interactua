<?php
//lamamos a la clase conexión
require_once 'conexion.class.php';
class Trivial
{
    private $dbh;//iniciamos dbh
    //cogemos la conexión de la clase conexión
    public function __construct()
    {
        $this->dbh = new Conexion();
    }
	//creamos un nuevo usuario si no existe o recogemos su información
	public function new_user($nombre,$puntos = 0)
	{
		 try {
		 	//obtenemos el nombre del usuario de la bd para ver si existe
            $query = $this->dbh->prepare('SELECT * FROM users WHERE nombre = ?');
            $query->bindParam(1, $nombre);
            $query->execute();
			//si hay una coincidencia creamos la sesión y devolvemos el nombre del usuario	
			if($query->rowCount() == 1)
            {               
                 $fila  = $query->fetch();
				 //creamos la sesión
                 $_SESSION['nombre'] = $fila['nombre'];    
				 $_SESSION['puntos'] = $fila['puntos'];
				 return TRUE;              
            }else{
            	//en otro caso, si no existía, lo guardamos en la tabla users y creamos la sesión
            	 $insert = $this->dbh->prepare('insert into users values(null,?,?)');
            	 $insert->bindParam(1, $nombre);
				 $insert->bindParam(2, $puntos);
				 $insert->execute();
				 $fila  = $insert->fetch();
                 $_SESSION['nombre'] = $fila['nombre'];   
				 $_SESSION['puntos'] = $fila['puntos'];   
				 return TRUE;    	
            }
			$this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
	}

	//actualizamos la puntuación del usuario
	public function update_puntuacion($puntos,$nombre)
	{
		try {
			 $query = $this->dbh->prepare('update users SET puntos = ? WHERE nombre = ?');
	         $query->bindParam(1, $puntos);
			 $query->bindParam(2, $nombre);
			 $query->execute();
			 $this->dbh = null;
			 return TRUE;
		}catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	public function ranking()
	{
		try {
			 $query = $this->dbh->prepare('SELECT * FROM users ORDER BY puntos desc');
			 $query->execute();
			 return $query->fetchAll();
			 $this->dbh = null;
		}catch (PDOException $e) {
            $e->getMessage();
        }
	}
	 
	//obtenemos una pregunta aleatoriamente
	public function get_preguntas()
    {
        try {
        	//con rand() de mysql obtenemos una pregunta aleatoria
            $query = $this->dbh->prepare('SELECT * FROM preguntas order by rand() LIMIT 1');
            $query->execute();
			//devolvemos la pregunta
            return $query->fetch();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	//obtenemos las respuestas de una pregunta
	public function get_respuestas($id_pregunta)
	{
		try {
            $query = $this->dbh->prepare('SELECT * FROM respuestas WHERE id_pregunta = ?');
            $query->bindParam(1, $id_pregunta);
            $query->execute();
			return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
}
