<?php

  include ('ModeloMensaje.php');


  $message = new ModeloMensaje;
  $datos = $message->consulta_mensaje_noleido();

  if ($datos->num_rows>=1){

    $datanew = [];

    foreach ($datos as  $value) {
      // code...
      $datacol['titulo']  = $value['titulo'];
      $datacol['mensaje']  = $value['mensaje'];
      $datacol['desde']  = $value['desde'];

      $message->update_mensaje($value['id']);

      array_push($datanew,$datacol);
    }

    $response['registro'] = $datanew;
    $response['success'] = true;
  }
  else {
    $response['registro'] = null;
    $response['success'] = false;
  }

  // respuesta eb json
  echo json_encode($response);

?>
