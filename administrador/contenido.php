<?php
if(!isset($_SESSION)){
?>
<script type="text/javascript">
location.href="index.html";
</script>
<?php
}
   if(isset($_GET["token"])){

   switch($_GET["token"]){
   	/*--------------- administrador--------------------------------*/
	    case md5(0):
		include("administrador/info_gral.php");
		break;
		case md5(1):
		include("administrador/marco_estrategico.php");
		break;
		case md5(2):
		include("administrador/marco_estrategico_guarda.php");
		break;
		case md5(3):
		include("administrador/proyectos/proyecto.php");
		break;
		case md5(4):
		include("administrador/proyectos/nuevo.php");
		break;
		case md5(5):
		include("administrador/proyectos/guarda_proyecto.php");
		break;
		case md5(6):
		include("administrador/detalle_usuario.php");
		break;
		case md5(7):
		include("administrador/actualiza_usuario.php");
		break;
		default:
		case md5(8):
		include("administrador/proyectos/editar_proyecto.php");
		break;
		default:
		case md5(9):
		include("administrador/proyectos/actualiza_proyecto.php");
		break;
		default:
		case md5(10):
		include("administrador/proyectos/indicadores.php");
		break;
		case md5(11):
		include("administrador/proyectos/editar_indicador.php");
		break;
		case md5(12):
		include("administrador/indicadores/guarda_indicador.php");
		break;
		case md5(13):
		include("administrador/proyectos/componentes.php");
		break;
		case md5(14):
		include("administrador/proyectos/nuevo_componente.php");
		break;
		case md5(15):
		include("administrador/proyectos/editar_componente.php");
		break;
		case md5(16):
		include("administrador/proyectos/guardar_componente.php");
		break;
		case md5(17):
		include("administrador/proyectos/actualiza_componente.php");
		break;
		case md5(18):
		include("administrador/proyectos/eliminar_componente.php");
		break;
		case md5(19):
		include("administrador/proyectos/acciones.php");
		break;
		case md5(20):
		include("administrador/proyectos/nueva_accion.php");
		break;
		case md5(21):
		include("administrador/proyectos/editar_accion.php");
		break;
		case md5(22):
		include("administrador/proyectos/guardar_accion.php");
		break;
		case md5(23):
		include("administrador/proyectos/actualizar_accion.php");
		break;
		case md5(24):
		include("administrador/proyectos/eliminar_accion.php");
		break;
		case md5(25):
		include("administrador/proyectos/info_proyecto.php");
		break;
		case md5(26):
		include("administrador/proyectos/aprobar_proyecto.php");
		break;
		case md5(27):
		include("administrador/proyectos/borrar_proyecto.php");
		break;

/*---------------------- menu obras ----------------------------*/
		case md5(28):
		include("administrador/obras/obra.php");
		break;
		case md5(29):
		include("administrador/obras/nueva_obra.php");
		break;
		case md5(30):
		include("administrador/obras/mostrar_obra.php");
		break;
		case md5(31):
		include("administrador/obras/editar_obra.php");
		break;
		case md5(32):
		include("administrador/obras/lista_obra.php");
		break;
		case md5(33):
		include("administrador/obras/mostrar_obra_fuente.php");
		break;
		case md5(34):
		include("administrador/obras/nuevo_origen.php");
		break;


		/*---------------------estfin----------------------*/
		case md5(35):
		include("administrador/actualiza_edofin.php");
		break;
		case md5(36):
		include("administrador/edo_fin_info.php");
		break;
		case md5(37):
		include("administrador/proyectos/activa_proyecto.php");
		break;
		case md5(38):
		include("administrador/proyectos/inactiva_proyecto.php");
		break;



       case md5(39):
		include("administrador/obras/editar_obra_fuente.php");
		break;


          case md5(40):
        include("about.php");
        break;

        case md5(41):
        include("rechazar_proyecto.php");
        break;

        case md5(42):
        include("indicadores/listado_indicadores_fin.php");
        break;

        case md5(43):
        include("indicadores/indicador_info_fin.php");
        break;
         case md5(44):
        include("indicadores/calculo_fin.php");
        break;

       case md5(45):
        include("indicadores/guarda_calculo_fin.php");
        break;

        case md5(90):
		include("administrador/proyectos/info_componente.php");
		break;
		case md5(91):
		include("administrador/proyectos/aprobar_proyecto.php");
		break;
		case md5(92):
		include("administrador/proyectos/actualiza_indicador.php");
		break;
	case md5(93):
		include("administrador/adm/of_aprob.php");
		break;
	case md5(94):
		include("administrador/adm/usuarios.php");
		break;
/*----------------------- MENU RESULTRADOS -------------------------------*/

        /************** Resultados - Dependencia - POA Dependencia ****************/

        case md5(RD): //Resultados Dependencia
            include("administrador/resultados/resultados_dependencia.php");
		break;

        case md5(RPD): //Resultados POA Dependencia
            include("administrador/resultados/resultados_POA_dependencia.php");
		break;

        case md5(RPxD): // Resultados Proyectos por Dependencia
            include("administrador/resultados/resultados_proyectos_dependencia.php");
		break;

        case md5(RCxPD): //Resultados Componentes por Proyecto
            include("administrador/resultados/resultados_componentes_proyecto.php");
		break;

        case md5(RAxCPD):
            include("administrador/resultados/resultados_acciones_componente.php");
		break;

        /************** Resultados - POA x Sector ***********************************/
       	case md5(RPxS):
            include("administrador/resultados/resultadosPoaXSector.php");
        break;
        case  md5(RPxSD):
	       include("administrador/resultados/resultadosPoaXSector_Depen.php");
        break;
        case md5(RPxSP):
            include("administrador/resultados/resultadosPoaXSector_Proy.php");
        break;
        case md5(RPxSC):
            include("administrador/resultados/resultadosPoaXSector_Comp.php");
        break;
        case md5(RPxSA):
            include("administrador/resultados/resultadosPoaXSector_Acc.php");
        break;

        /****************** Resultados - POA X Ejes ********************************/
        case md5(RPxE):
        include("administrador/resultados/resultadosPoaXEjes.php");
        break;

        /****************** Resultados - % Dependencias ***************************/
        case md5(RxSD):
		  include("administrador/resultados/resultadosSemaforoDepen.php");
		break;

        /****************** Resultados - % Proyecto *******************************/
        case md5(RxSP):
		  include("administrador/resultados/resultadosSemaforoProy.php");
        break;



	/*-------------------reportes------------------------------------*/
	case md5('r'):
		include("administrador/reportes_poa_main.php");
		break;
	case md5('i'):
		include("administrador/indicadores.php");
		break;
		case md5('p'):
		include("administrador/repo_proy.php");
		break;
		case md5('g'):
		include("administrador/repo_gral.php");
		break;

	case md5('rof'):
		include("rpts/rpt_res_ofi_graf.php");
		break;


	/*---------------------- evaluaci�n ----------------------------*/


 case md5(E0):
            include("administrador/evaluacion/evaluacion.php");
        break;

        case md5(E1):
	       include("administrador/evaluacion/evaluar.php");
        break;

        case md5(E2):
            include("administrador/evaluacion/componentes.php");
        break;

        case md5(E3):
	       include("administrador/evaluacion/acciones.php");
        break;


		default:
        include("administrador/info_gral.php");
	   }
   }else {
	   include("administrador/info_gral.php");
   }
 ?>
