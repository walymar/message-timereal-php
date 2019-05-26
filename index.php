<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style></style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


  </head>
  <body>

    <div class="container">
      <div style="height:50px"></div>
      <h1>< tutofox /> <small>Oh my code!</small></h1>
      <p class="lead">
      <h3>PHP7 Mensaje</h3>
      <p>Mensaje nuevo en el tiempo real / Message in timereal</p>

      <hr>

      <?php

        include ('ModeloMensaje.php');
        $message = new ModeloMensaje;
        $datos = $message->listar();
      ?>

      <table class="table table-bordered order-table ">
        <thead>
          <tr>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody id="bodytable">

        <?php foreach ($datos as $value){ ?>
            <tr>
              <td><?= $value['titulo']; ?></td>
              <td><?= $value['mensaje']; ?></td>
              <td><?= $value['desde']; ?></td>
            </tr>
        <?php } ?>
        </body>
      </table>

    </div> <!-- /container -->

    <script>

    var myVar = setInterval(ciclo, 5000);

    function ciclo (){

     $.get( "api.php", function( data ) {


        const prueba = JSON.parse(data);

        if (prueba.success==true) {

          console.log("actualizado exitosamente")

          prueba.registro.map((columna)=>{

            $( "#bodytable" ).append( "<tr><td>"+columna.titulo+"</td><td>"+columna.mensaje+"</td><td>"+columna.desde+"</td></tr>" );
            //$("#bodytable").hide().appendTo("<tr><td>"+columna.titulo+"</td><td>"+columna.mensaje+"</td><td>"+columna.desde+"</td></tr>").show('normal');

          })

        }
        else{
          console.log("no hay datos "+prueba.success)
        }

      });

    }
    </script>

  </body>
</html>
