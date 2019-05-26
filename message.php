<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style></style>

  </head>
  <body>

    <div class="container">
      <div style="height:50px"></div>
      <h1>< tutofox /> <small>Oh my code!</small></h1>
      <p class="lead">
      <h3>Enviar un nuevo mensaje </h3>

      <?php

      if ($_POST['asunto']&&$_POST['mensaje'])
      {

        include ('ModeloMensaje.php');

        $parametro['asunto']  = $_POST['asunto'];
        $parametro['mensaje'] = $_POST['mensaje'];

        $message = new ModeloMensaje;
        $resultado = $message->insert_mensaje($parametro);

        //$resultado = ModeloMensaje::insert_mensaje($parametro);

        if ($resultado['success']==TRUE)
        {
          $resmes = $resultado['message'];
          echo '<div class="alert alert-success" role="alert"> '.$resmes.' </div>';
        }
        else{
          $resmes = $resultado['message'];
          echo '<div class="alert alert-danger" role="alert"> '.$resmes.' </div>';
        }

      }

      ?>

      <hr>

      <form action="message.php" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Asunto</label>
          <input type="text" class="form-control" name="asunto">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Mensaje</label>
          <textarea class="form-control" name="mensaje" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Enviar</button>

      </form>

    </div> <!-- /container -->

  </body>
</html>
