<?php

$mysqli = new mysqli("localhost", "root", "tr15t4n14", "indicadores");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Indicadores</title>
  <!-- Bootstrap Core CSS -->
  <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- Timeline CSS -->
  <link href="dist/css/timeline.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Morris Charts CSS -->
  <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->




</head>
<body>
  <div id="wrapper" style="padding-left:3%;padding-right:3%;">
    <h2 class="page-header">Agregar Indicador</h2>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Agregar indicador
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-lg-8">
                <form role="form">
                  <div class="form-group">
                    <label>Titulo</label>
                    <input class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Detalle</label>
                    <textarea class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Tipo de Cálculo</label>
                    <select class="form-control">
                      <option>-Seleccione-</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Responsable</label>
                    <input class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Vigencia</label>
                    <input type="date" required="required" class="form-control">
                  </div>

                  <div class="form-group">
                    <input type="submit" class="form-control" value="guardar">
                  </div>


                </div>
              </div>
            </div>



        </div>
      </div>
    </div>


  </div>
</body>
</html>
