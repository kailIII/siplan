<?php session_start();
date_default_timezone_set('America/Mexico_City');


/*
echo '<pre>' ;
var_dump($_POST);
echo '</pre>' ;

echo '<pre>' ;
var_dump($_FILES);
echo '</pre>' ;
echo $_FILES["archivo"]["tmp_name"].$_FILES["archivo"]["size"].$_FILES["archivo"]["name"]."hola-";*/


// echo json_encode(array(
  //          'error' => true,
    //       'msg'   => $_FILES["archivo"]["tmp_name"].$_FILES["archivo"]["size"].$_FILES["archivo"]["name"]."hola-"
      //         ));
        //        exit();

if(!empty($_POST) and $_SESSION['id_dependencia_v3']!=""){
	//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

		$id=$_POST['ido'];
        $nombre= $_POST['nombre'.$id];
       // $archivo= $_POST['archivo'];
        $tipo1= $_POST['cbo_tipo'.$id];
        $obs= $_POST['obs'.$id];
       $idobra=$_POST['ido'];
         /*  if ( $nombre == false ) {
            echo json_encode(array(
            'error' => true,
           'msg'   => "The email address entered it's not correct!"
               ));
                exit;
            }

			if ( $mail ) {
                //finally send the ajax response
                echo json_encode(array(
                    'error' => false
                ));
                exit;

            } */

 $archivo = $_FILES["archivo".$id]["tmp_name"];
 $tamanio = $_FILES["archivo".$id]["size"];
 $tipo    = $_FILES["archivo".$id]["type"];
 $nombre_arch  = $_FILES["archivo".$id]["name"];
$nombre_arch= str_replace(" ","_",$nombre_arch);




 if ($tamanio<=(2048*1024) and $nombre_arch!="" and $tipo=="application/pdf" and $archivo!="none" and $idobra!=""){
//		header("Content-type: ".$data['tipo']);
 //   header("Content-Disposition: attachment; filename=".$data['nombre']);
  //  echo $data['archivo'];


			 //leer el archivo temporal en binario
                $fp     = fopen($archivo, 'r+b');
                $data = fread($fp, $tamanio);
                fclose($fp);

                //escapar los caracteres
            //    $data = mysql_escape_string($data);
				 $data = addslashes($data);

				$fecha1=date('Y-m-d H:i:s');

		//	echo "INSERT INTO pdf values('',$idobra,'$nombre_arch','$tipo1','$data','En Revisión','$fecha1','$obs','')";

 $resultado = mysql_query("INSERT INTO pdf values('',$idobra,'$nombre','$tipo1','$data','En Revisión','$fecha1','$obs','')",$siplan_data_conn)  or die (mysql_error()); ;

    if ($resultado){

            echo "El archivo ha sido guardado exitosamente";
            /*   ));
                exit();
				  echo json_encode(array(
            'error' => true,
           'msg'   => "el archivo ha sido guardado exitosamente"
               ));
                exit();*/


    } else {
		echo "Ocurrio un error al guardar el archivo";


    }

  } else {echo "archivo no permitido, es tipo de archivo prohibido o excede el tamaño, contacte al administrador";


  }




}






