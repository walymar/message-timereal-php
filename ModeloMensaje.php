<?php

class ModeloMensaje  {

  public function conectar_bd()
  {

    $servername = "localhost";
    $username = "newuser";
    $password = "password";
    $dbname = "tutofox";

    /* crear la conexión */
    $conexion = new mysqli($servername, $username, $password, $dbname); //cambie la variable $conexionn por la variable $conn, ya que es la que se esta utilizando para la consulta en las lineas 16 y 17
    /* comprobar la conexión */
    if ($conn->connect_error) { 
        die("Falló la conexión:: " . $conn->connect_error);
    }
    else
    {
      return $conexion;
    }

  }

  public  function insert_mensaje($parametro){

    //tiempo
    $hoy = date("Y-m-d H:i:s");
    $asunto = $parametro['asunto'];
    $message = $parametro['mensaje'];

    $sql = "INSERT INTO `mensaje`(`titulo`, `mensaje`, `usuario`, `desde`, `leido`) VALUES ('$asunto', '$message', 1 ,'$hoy', 0)";

    $conn =  $this->conectar_bd();

    if ($conn->query($sql) === TRUE)
    {
        $res['success'] = TRUE;
        $res['message'] = "Envio exitosamente";
    }
    else
    {
      $res['success'] = FALSE;
      $res['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return $res;

  }


  public function listar(){

    $conn =  $this->conectar_bd();

    $consulta = "SELECT * FROM mensaje WHERE leido=1  ORDER by id DESC ";

    $res = $conn->query($consulta);

    //$res = mysqli_query($enlace, $consulta);

    return $res;

  }

  public function consulta_mensaje_noleido(){

    $conn =  $this->conectar_bd();

    $consulta = "SELECT * FROM mensaje WHERE leido=0 ";
    $res = $conn->query($consulta);
    return $res;

  }

  public function update_mensaje($id){

    $conn =  $this->conectar_bd();

    $consulta = "UPDATE `mensaje` SET leido=1 WHERE id=$id ";
    $res = $conn->query($consulta);
    //return $res;

  }

}

?>
