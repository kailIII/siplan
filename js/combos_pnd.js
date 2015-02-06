//funcion para cargar los combos del plan nacional de desarrollo
function llena_combo_objetivo(pnd_eje){
	 var id_pnd_eje = pnd_eje;

	  if(id_pnd_eje==6){
     	 document.getElementById('pnd_objetivo').options[0] = new Option('No aplica','37');
     	 document.getElementById('pnd_estrategia').options[0] = new Option('No aplica','131');
     	 document.getElementById('pnd_linea').options[0] = new Option('No aplica','815');
     	 return false();
     }




	 document.getElementById('pnd_objetivo').length=0;
     document.getElementById('pnd_objetivo').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_estrategia').length=0;
     document.getElementById('pnd_estrategia').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');




    switch(id_pnd_eje){
 case"1":
document.getElementById('pnd_objetivo').options[1]=new Option('1.1. Promover y fortalecer la gobernabilidad democrÃ¡tica....','1');
document.getElementById('pnd_objetivo').options[2]=new Option('1.2. Garantizar la Seguridad Nacional....','2');
document.getElementById('pnd_objetivo').options[3]=new Option('1.3. Mejorar las condiciones de seguridad pÃºblica....','3');
document.getElementById('pnd_objetivo').options[4]=new Option('1.4. Garantizar un Sistema de Justicia Penal eficaz, expedito, i...','4');
document.getElementById('pnd_objetivo').options[5]=new Option('1.5. Garantizar el respeto y protecciÃ³n de los derechos h...','5');
document.getElementById('pnd_objetivo').options[6]=new Option('1.6. Salvaguardar a la poblaciÃ³n, a sus bienes y a su en...','6');
document.getElementById('pnd_objetivo').options[7]=new Option('1.A...','7');
break;
case"2":
document.getElementById('pnd_objetivo').options[1]=new Option('2.1. Garantizar el ejercicio efectivo de los derechos sociales p...','8');
document.getElementById('pnd_objetivo').options[2]=new Option('2.2. Transitar hacia una sociedad equitativa e incluyente....','9');
document.getElementById('pnd_objetivo').options[3]=new Option('2.3. Asegurar el acceso a los servicios de salud....','10');
document.getElementById('pnd_objetivo').options[4]=new Option('2.4. Ampliar el acceso a la seguridad social....','11');
document.getElementById('pnd_objetivo').options[5]=new Option('2.5. Proveer un entorno adecuado para el desarrollo de una vida ...','12');
document.getElementById('pnd_objetivo').options[6]=new Option('2.A...','13');
break;
case"3":
document.getElementById('pnd_objetivo').options[1]=new Option('3.1. Desarrollar el potencial humano de los mexicanos con educac...','14');
document.getElementById('pnd_objetivo').options[2]=new Option('3.2. Garantizar la inclusiÃ³n y la equidad en el Sistema E...','15');
document.getElementById('pnd_objetivo').options[3]=new Option('3.3. Ampliar el acceso a la cultura como un medio para la formac...','16');
document.getElementById('pnd_objetivo').options[4]=new Option('3.4. Promover el deporte de manera incluyente para fomentar una ...','17');
document.getElementById('pnd_objetivo').options[5]=new Option('3.5. Hacer del desarrollo cientÃ­fico, tecnolÃ³gico ...','18');
document.getElementById('pnd_objetivo').options[6]=new Option('3.A...','19');
break;
case"4":
document.getElementById('pnd_objetivo').options[1]=new Option('4.1. Mantener la estabilidad macroeconÃ³mica del paÃ­...','20');
document.getElementById('pnd_objetivo').options[2]=new Option('4.2. Democratizar el acceso al financiamiento de proyectos con p...','21');
document.getElementById('pnd_objetivo').options[3]=new Option('4.3. Promover el empleo de calidad....','22');
document.getElementById('pnd_objetivo').options[4]=new Option('4.4. Impulsar y orientar un crecimiento verde incluyente y facil...','23');
document.getElementById('pnd_objetivo').options[5]=new Option('4.5. Democratizar el acceso a servicios de telecomunicaciones....','24');
document.getElementById('pnd_objetivo').options[6]=new Option('4.6. Abastecer de energÃ­a al paÃ­s con precios comp...','25');
document.getElementById('pnd_objetivo').options[7]=new Option('4.7. Garantizar reglas claras que incentiven el desarrollo de un...','26');
document.getElementById('pnd_objetivo').options[8]=new Option('4.8. Desarrollar los sectores estratÃ©gicos del paÃ­...','27');
document.getElementById('pnd_objetivo').options[9]=new Option('4.9. Contar con una infraestructura de transporte que se refleje...','28');
document.getElementById('pnd_objetivo').options[10]=new Option('4.10. Construir un sector agropecuario y pesquero productivo que...','29');
document.getElementById('pnd_objetivo').options[11]=new Option('4.11. Aprovechar el potencial turÃ­stico de MÃ©xico ...','30');
document.getElementById('pnd_objetivo').options[12]=new Option('4.A...','31');
break;
case"5":
document.getElementById('pnd_objetivo').options[1]=new Option('5.1. Ampliar y fortalecer la presencia de MÃ©xico en el mu...','32');
document.getElementById('pnd_objetivo').options[2]=new Option('5.2. Promover el valor de MÃ©xico en el mundo mediante la ...','33');
document.getElementById('pnd_objetivo').options[3]=new Option('5.3. Reafirmar el compromiso del paÃ­s con el libre comerc...','34');
document.getElementById('pnd_objetivo').options[4]=new Option('5.4. Velar por los intereses de los mexicanos en el extranjero y...','35');
document.getElementById('pnd_objetivo').options[5]=new Option('5.A...','36');
break;

  }
}

function llena_combo_estrategia_pnd(objetivo_pnd){
	var id_pnd_objetivo = objetivo_pnd;
	 document.getElementById('pnd_estrategia').length=0;
     document.getElementById('pnd_estrategia').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');
     switch(id_pnd_objetivo){
     	case "1":
document.getElementById('pnd_estrategia').options['1']=new Option('1.1.1. Contribuir al desarrollo de la democracia.','1');
document.getElementById('pnd_estrategia').options['2']=new Option('1.1.2. Fortalecer la relaciÃ³n con el Honorable Congreso d','2');
document.getElementById('pnd_estrategia').options['3']=new Option('1.1.3. Impulsar un federalismo articulado mediante una coordinac','3');
document.getElementById('pnd_estrategia').options['4']=new Option('1.1.4. Prevenir y gestionar conflictos sociales a travÃ©s ','4');
document.getElementById('pnd_estrategia').options['5']=new Option('1.1.5. Promover una nueva polÃ­tica de medios para la equi','5');
break;
case "2":
document.getElementById('pnd_estrategia').options['1']=new Option('1.2.1. Preservar la integridad, estabilidad y permanencia del Es','6');
document.getElementById('pnd_estrategia').options['2']=new Option('1.2.2. Preservar la paz, la independencia y soberanÃ­a de ','7');
document.getElementById('pnd_estrategia').options['3']=new Option('1.2.3. Fortalecer la inteligencia del Estado Mexicano para ident','8');
document.getElementById('pnd_estrategia').options['4']=new Option('1.2.4. Fortalecer las capacidades de respuesta operativa de las ','9');
document.getElementById('pnd_estrategia').options['5']=new Option('1.2.5. Modernizar los procesos, sistemas y la infraestructura in','10');
break;
case "3":
document.getElementById('pnd_estrategia').options['1']=new Option('1.3.1. Aplicar, evaluar y dar seguimiento del Programa Nacional ','11');
document.getElementById('pnd_estrategia').options['2']=new Option('1.3.2. Promover la transformaciÃ³n institucional y fortale','12');
break;
case "4":
document.getElementById('pnd_estrategia').options['1']=new Option('1.4.1. Abatir la impunidad.','13');
document.getElementById('pnd_estrategia').options['2']=new Option('1.4.2. Lograr una procuraciÃ³n de justicia efectiva.','14');
document.getElementById('pnd_estrategia').options['3']=new Option('1.4.3. Combatir la corrupciÃ³n y transparentar la acci&oac','15');
break;
case "5":
document.getElementById('pnd_estrategia').options['1']=new Option('1.5.1. Instrumentar una polÃ­tica de Estado en derechos hu','16');
document.getElementById('pnd_estrategia').options['2']=new Option('1.5.2. Hacer frente a la violencia contra los niÃ±os, ni&n','17');
document.getElementById('pnd_estrategia').options['3']=new Option('1.5.3. Proporcionar servicios integrales a las vÃ­ctimas u','18');
document.getElementById('pnd_estrategia').options['4']=new Option('1.5.4. Establecer una polÃ­tica de igualdad y no discrimin','19');
break;
case "6":
document.getElementById('pnd_estrategia').options['1']=new Option('1.6.1. PolÃ­tica estratÃ©gica para la prevenci&oacut','20');
document.getElementById('pnd_estrategia').options['2']=new Option('1.6.2. GestiÃ³n de emergencias y atenciÃ³n eficaz de','21');
break;
case "7":
document.getElementById('pnd_estrategia').options['1']=new Option('1.I. Democratizar la productividad','22');
document.getElementById('pnd_estrategia').options['2']=new Option('1.II. Gobierno Cercano y Moderno','23');
document.getElementById('pnd_estrategia').options['3']=new Option('1.III. Perspectiva de GÃ©nero','24');
break;
case "8":
document.getElementById('pnd_estrategia').options['1']=new Option('2.1.1. Asegurar una alimentaciÃ³n y nutriciÃ³n adecu','25');
document.getElementById('pnd_estrategia').options['2']=new Option('2.1.2. Fortalecer el desarrollo de capacidades en los hogares co','26');
document.getElementById('pnd_estrategia').options['3']=new Option('2.1.3. Garantizar y acreditar fehacientemente la identidad de la','27');
break;
case "9":
document.getElementById('pnd_estrategia').options['1']=new Option('2.2.1. Generar esquemas de desarrollo comunitario a travÃ©','28');
document.getElementById('pnd_estrategia').options['2']=new Option('2.2.2. Articular polÃ­ticas que atiendan de manera espec&i','29');
document.getElementById('pnd_estrategia').options['3']=new Option('2.2.3. Fomentar el bienestar de los pueblos y comunidades ind&ia','30');
document.getElementById('pnd_estrategia').options['4']=new Option('2.2.4. Proteger los derechos de las personas con discapacidad y ','31');
break;
case "10":
document.getElementById('pnd_estrategia').options['1']=new Option('2.3.1. Avanzar en la construcciÃ³n de un Sistema Nacional ','32');
document.getElementById('pnd_estrategia').options['2']=new Option('2.3.2. Hacer de las acciones de protecciÃ³n, promoci&oacut','33');
document.getElementById('pnd_estrategia').options['3']=new Option('2.3.3. Mejorar la atenciÃ³n de la salud a la poblaci&oacut','34');
document.getElementById('pnd_estrategia').options['4']=new Option('2.3.4. Garantizar el acceso efectivo a servicios de salud de cal','35');
document.getElementById('pnd_estrategia').options['5']=new Option('2.3.5. Promover la cooperaciÃ³n internacional en salud.','36');
break;
case "11":
document.getElementById('pnd_estrategia').options['1']=new Option('2.4.1. Proteger a la sociedad ante eventualidades que afecten el','37');
document.getElementById('pnd_estrategia').options['2']=new Option('2.4.2. Promover la cobertura universal de servicios de seguridad','38');
document.getElementById('pnd_estrategia').options['3']=new Option('2.4.3. Instrumentar una gestiÃ³n financiera de los organis','39');
break;
case "12":
document.getElementById('pnd_estrategia').options['1']=new Option('2.5.1. Transitar hacia un Modelo de Desarrollo Urbano Sustentabl','40');
document.getElementById('pnd_estrategia').options['2']=new Option('2.5.2. Reducir de manera responsable el rezago de vivienda a tra','41');
document.getElementById('pnd_estrategia').options['3']=new Option('2.5.3. Lograr una mayor y mejor coordinaciÃ³n interinstitu','42');
break;
case "13":
document.getElementById('pnd_estrategia').options['1']=new Option('2.I. Democratizar la productividad','43');
document.getElementById('pnd_estrategia').options['2']=new Option('2.II Gobierno Cercano y Moderno','44');
document.getElementById('pnd_estrategia').options['3']=new Option('2.III Perspectiva de GÃ©nero','45');
break;
case "14":
document.getElementById('pnd_estrategia').options['1']=new Option('3.1.1. Establecer un sistema de profesionalizaciÃ³n docent','46');
document.getElementById('pnd_estrategia').options['2']=new Option('3.1.2. Modernizar la infraestructura y el equipamiento de los ce','47');
document.getElementById('pnd_estrategia').options['3']=new Option('3.1.3. Garantizar que los planes y programas de estudio sean per','48');
document.getElementById('pnd_estrategia').options['4']=new Option('3.1.4. Promover la incorporaciÃ³n de las nuevas tecnolog&i','49');
document.getElementById('pnd_estrategia').options['5']=new Option('3.1.5. Disminuir el abandono escolar, mejorar la eficiencia term','50');
document.getElementById('pnd_estrategia').options['6']=new Option('3.1.6. Impulsar un Sistema Nacional de EvaluaciÃ³n que ord','51');
break;
case "15":
document.getElementById('pnd_estrategia').options['1']=new Option('3.2.1. Ampliar las oportunidades de acceso a la educaciÃ³n','52');
document.getElementById('pnd_estrategia').options['2']=new Option('3.2.2. Ampliar los apoyos a niÃ±os y jÃ³venes en sit','53');
document.getElementById('pnd_estrategia').options['3']=new Option('3.2.3. Crear nuevos servicios educativos, ampliar los existentes','54');
break;
case "16":
document.getElementById('pnd_estrategia').options['1']=new Option('3.3.1. Situar a la cultura entre los servicios bÃ¡sicos br','55');
document.getElementById('pnd_estrategia').options['2']=new Option('3.3.2. Asegurar las condiciones para que la infraestructura cult','56');
document.getElementById('pnd_estrategia').options['3']=new Option('3.3.3. Proteger y preservar el patrimonio cultural nacional.','57');
document.getElementById('pnd_estrategia').options['4']=new Option('3.3.4. Fomentar el desarrollo cultural del paÃ­s a trav&ea','58');
document.getElementById('pnd_estrategia').options['5']=new Option('3.3.5. Posibilitar el acceso universal a la cultura mediante el ','59');
break;
case "17":
document.getElementById('pnd_estrategia').options['1']=new Option('3.4.1. Crear un programa de infraestructura deportiva.','60');
document.getElementById('pnd_estrategia').options['2']=new Option('3.4.2. DiseÃ±ar programas de actividad fÃ­sica y dep','61');
break;
case "18":
document.getElementById('pnd_estrategia').options['1']=new Option('3.5.1. Contribuir a que la inversiÃ³n nacional en investig','62');
document.getElementById('pnd_estrategia').options['2']=new Option('3.5.2. Contribuir a la formaciÃ³n y fortalecimiento del ca','63');
document.getElementById('pnd_estrategia').options['3']=new Option('3.5.3. Impulsar el desarrollo de las vocaciones y capacidades ci','64');
document.getElementById('pnd_estrategia').options['4']=new Option('3.5.4. Contribuir a la transferencia y aprovechamiento del conoc','65');
document.getElementById('pnd_estrategia').options['5']=new Option('3.5.5. Contribuir al fortalecimiento de la infraestructura cient','66');
break;
case "19":
document.getElementById('pnd_estrategia').options['1']=new Option('3.I. Democratizar la Productividad','67');
document.getElementById('pnd_estrategia').options['2']=new Option('3.II Gobierno Cercano y Moderno','68');
document.getElementById('pnd_estrategia').options['3']=new Option('3.III Perspectiva de GÃ©nero','69');
break;
case "20":
document.getElementById('pnd_estrategia').options['1']=new Option('4.1.1. Proteger las finanzas pÃºblicas ante riesgos del en','70');
document.getElementById('pnd_estrategia').options['2']=new Option('4.1.2. Fortalecer los ingresos del sector pÃºblico.','71');
document.getElementById('pnd_estrategia').options['3']=new Option('4.1.3. Promover un ejercicio eficiente de los recursos presupues','72');
break;
case "21":
document.getElementById('pnd_estrategia').options['1']=new Option('4.2.1. Promover el financiamiento a travÃ©s de institucion','73');
document.getElementById('pnd_estrategia').options['2']=new Option('4.2.2. Ampliar la cobertura del sistema financiero hacia un mayo','74');
document.getElementById('pnd_estrategia').options['3']=new Option('4.2.3 Mantener la estabilidad que permita el desarrollo ordenado','75');
document.getElementById('pnd_estrategia').options['4']=new Option('4.2.4 Ampliar el acceso al crÃ©dito y a otros servicios fi','76');
document.getElementById('pnd_estrategia').options['5']=new Option('4.2.5 Promover la participaciÃ³n del sector privado en el ','77');
break;
case "22":
document.getElementById('pnd_estrategia').options['1']=new Option('4.3.1 Procurar el equilibrio entre los factores de la producci&o','78');
document.getElementById('pnd_estrategia').options['2']=new Option('4.3.2 Promover el trabajo digno o decente.','79');
document.getElementById('pnd_estrategia').options['3']=new Option('4.3.3 Promover el incremento de la productividad con beneficios ','80');
document.getElementById('pnd_estrategia').options['4']=new Option('4.3.4 Perfeccionar los sistemas y procedimientos de protecci&oac','81');
break;
case "23":
document.getElementById('pnd_estrategia').options['1']=new Option('4.4.1 implementar una polÃ­tica integralo de desarrollo qu','82');
document.getElementById('pnd_estrategia').options['2']=new Option('4.4.2 Implementar un manejo sustentable del agua, haciendo posib','83');
document.getElementById('pnd_estrategia').options['3']=new Option('4.4.3 Fortalecer la polÃ­tica nacional de cambio clim&aacu','84');
document.getElementById('pnd_estrategia').options['4']=new Option('4.4.4 Proteger el patrimonio natural','85');
break;
case "24":
document.getElementById('pnd_estrategia').options['1']=new Option('4.5.1 Impulsar el desarrollo e innovaciÃ³n tecnolÃ³g','86');
break;
case "25":
document.getElementById('pnd_estrategia').options['1']=new Option('4.6.1 Asegurar el abastecimiento de petrÃ³leo crudo, gas n','87');
document.getElementById('pnd_estrategia').options['2']=new Option('4.6.2 Asegurar el abastecimiento racional de energÃ­a el&e','88');
break;
case "26":
document.getElementById('pnd_estrategia').options['1']=new Option('4.7.1 Apuntalar la competencia en el mercado interno','89');
document.getElementById('pnd_estrategia').options['2']=new Option('4.7.2 Implementar una mejora reguladora integral','90');
document.getElementById('pnd_estrategia').options['3']=new Option('4.7.3 Fortalecer el sistema de normalizaciÃ³n y evaluaci&o','91');
document.getElementById('pnd_estrategia').options['4']=new Option('4.7.4 Promover mayores niveles de inversiÃ³n a travÃ©','92');
document.getElementById('pnd_estrategia').options['5']=new Option('4.7.5 Proteger los derechos del consumidor, mejorar la informaci','93');
break;
case "27":
document.getElementById('pnd_estrategia').options['1']=new Option('4.8.1 Reactivar una polÃ­tica de fomento econÃ³mico ','94');
document.getElementById('pnd_estrategia').options['2']=new Option('4.8.2 Promover mayores niveles de inversiÃ³n y competitivi','95');
document.getElementById('pnd_estrategia').options['3']=new Option('4.8.3 Orientar y hacer mÃ¡s eficiente el gasto pÃºbl','96');
document.getElementById('pnd_estrategia').options['4']=new Option('4.8.4 Impulsar a los emprendedores y fortalecer a las micro, peq','97');
document.getElementById('pnd_estrategia').options['5']=new Option('4.8.5 Fomentar la economÃ­a social','98');
break;
case "28":
document.getElementById('pnd_estrategia').options['1']=new Option('4.9.1 modernizar, ampliar y conservar la infraestructura de los ','99');
break;
case "29":
document.getElementById('pnd_estrategia').options['1']=new Option('4.10.1 Impulsar la productividad en el sector agroalimentario me','100');
document.getElementById('pnd_estrategia').options['2']=new Option('4.10.2 Impulsar modelos de asociaciÃ³n que generen econom&','101');
document.getElementById('pnd_estrategia').options['3']=new Option('4.10.3 Promover mayor certidumbre en la actividad agroalimentari','102');
document.getElementById('pnd_estrategia').options['4']=new Option('4.10.4 Impulsar el aprovechamiento sustentable de los recursos n','103');
document.getElementById('pnd_estrategia').options['5']=new Option('4.10.5 Modernizar el marco normativo e institucional para impuls','104');
break;
case "30":
document.getElementById('pnd_estrategia').options['1']=new Option('4.11.1 Impulsar el ordenamiento y la transformaciÃ³n del s','105');
document.getElementById('pnd_estrategia').options['2']=new Option('4.11.2 Impulsar la innovaciÃ³n de la oferta y elevar la co','106');
document.getElementById('pnd_estrategia').options['3']=new Option('4.11.3 Fomentar un mayor flujo de inversiones y financiamiento e','107');
document.getElementById('pnd_estrategia').options['4']=new Option('4.11.4 Impulsar la sustentabilidad y que los ingresos generados ','108');
break;
case "31":
document.getElementById('pnd_estrategia').options['1']=new Option('4.I Democratizar la Productividad','109');
document.getElementById('pnd_estrategia').options['2']=new Option('4.II. Gobierno Cernano y Moderno','110');
document.getElementById('pnd_estrategia').options['3']=new Option('4.III Perspectiva de GÃ©nero','111');
break;
case "32":
document.getElementById('pnd_estrategia').options['1']=new Option('5.1.1 Consolidar la relaciÃ³n con Estados Unidos y Canad&a','112');
document.getElementById('pnd_estrategia').options['2']=new Option('5.1.2 Consolidar la posiciÃ³n de MÃ©xico como un act','113');
document.getElementById('pnd_estrategia').options['3']=new Option('5.1.3 Consolidar las relaciones con los paÃ­ses europeos s','114');
document.getElementById('pnd_estrategia').options['4']=new Option('5.1.4 Consolidar a Asia-PacÃ­fico como regiÃ³n clave','115');
document.getElementById('pnd_estrategia').options['5']=new Option('5.1.5 Aprovechar las oportunidades que presenta el sistema inter','116');
document.getElementById('pnd_estrategia').options['6']=new Option('5.1.6 Consolidar el papel de MÃ©xico como un actor respons','117');
document.getElementById('pnd_estrategia').options['7']=new Option('5.1.7 Impulsar una vigorosa polÃ­tica de cooperaciÃ³','118');
break;
case "33":
document.getElementById('pnd_estrategia').options['1']=new Option('5.2.1 Consolidar la red de representaciones de MÃ©xico en ','119');
document.getElementById('pnd_estrategia').options['2']=new Option('5.2.2 Definir agendas en materia de diplomacia pÃºblica y ','120');
break;
case "34":
document.getElementById('pnd_estrategia').options['1']=new Option('5.3.1 Impulsar y profundizar la polÃ­tica de apertura come','121');
break;
case "35":
document.getElementById('pnd_estrategia').options['1']=new Option('5.4.1 Ofrecer asistencia y protecciÃ³n consular a todos aq','123');
document.getElementById('pnd_estrategia').options['2']=new Option('5.4.2 Crear mecanismos para la reinserciÃ³n de las persona','124');
document.getElementById('pnd_estrategia').options['3']=new Option('5.4.3 Facilitar la movilidad internacional de personas en benefi','125');
document.getElementById('pnd_estrategia').options['4']=new Option('5.4.4 DiseÃ±ar mecanismos de coordinaciÃ³n interinst','126');
document.getElementById('pnd_estrategia').options['5']=new Option('5.4.5 Garantizar los derechos de las personas migrantes, solicit','127');
break;
case "36":
document.getElementById('pnd_estrategia').options['1']=new Option('5.I. Democratizar la Productividad','128');
document.getElementById('pnd_estrategia').options['2']=new Option('5.II Gobierno Cercano y Moderno','129');
document.getElementById('pnd_estrategia').options['3']=new Option('5.III Perspectiva de GÃ©nero','130');
break;

     }
}


function llena_combo_lineas_pnd(estrategia_pnd){
	var id_pnd_estrategia = estrategia_pnd;
	 document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');
    switch(id_pnd_estrategia){
    	case "1":
document.getElementById('pnd_linea').options['1']=new Option('1.1.1.1 Impulsar el respeto a los derechos polÃ­ticos ...','1');
document.getElementById('pnd_linea').options['2']=new Option('1.1.1.1 Impulsar el respeto a los derechos polÃ­ticos ...','2');
document.getElementById('pnd_linea').options['3']=new Option('1.1.1.2 Alentar acciones que promuevan la construcciÃ³...','3');
document.getElementById('pnd_linea').options['4']=new Option('1.1.1.3 Difundir campaÃ±as que contribuyan al fortalec...','4');
document.getElementById('pnd_linea').options['5']=new Option('1.1.1.4 Mantener una relaciÃ³n de colaboraciÃ³n,...','5');
document.getElementById('pnd_linea').options['6']=new Option('1.1.1.5 Coordinar con gobiernos estatales la instrumentaci&o...','6');
document.getElementById('pnd_linea').options['7']=new Option('1.1.1.6 Emitir lineamientos para el impulso y la conformaci&...','7');
document.getElementById('pnd_linea').options['8']=new Option('1.1.1.7 Promover convenios de colaboraciÃ³n para el fo...','8');
break;
case "2":
document.getElementById('pnd_linea').options['1']=new Option('1.1.2.1 Establecer mecanismos de enlace y diÃ¡logo per...','9');
document.getElementById('pnd_linea').options['2']=new Option('1.1.2.2 Construir una agenda legislativa nacional incluyente...','10');
document.getElementById('pnd_linea').options['3']=new Option('1.1.2.3 Promover consensos y acuerdos con el Poder Legislati...','11');
document.getElementById('pnd_linea').options['4']=new Option('1.1.2.4 DiseÃ±ar, promover y construir acuerdos con or...','12');
break;
case "3":
document.getElementById('pnd_linea').options['1']=new Option('1.1.3.1 Impulsar la inclusiÃ³n y participaciÃ³n ...','13');
document.getElementById('pnd_linea').options['2']=new Option('1.1.3.2 Promover la firma de Convenios Ãºnicos de Coor...','14');
document.getElementById('pnd_linea').options['3']=new Option('1.1.3.3 DiseÃ±ar e implementar un programa que dirija ...','15');
document.getElementById('pnd_linea').options['4']=new Option('1.1.3.4 Impulsar, mediante estudios e investigaciones, estra...','16');
document.getElementById('pnd_linea').options['5']=new Option('1.1.3.5 Promover el desarrollo de capacidades institucionale...','17');
break;
case "4":
document.getElementById('pnd_linea').options['1']=new Option('1.1.4.1 Establecer acciones coordinadas para la identificaci...','18');
document.getElementById('pnd_linea').options['2']=new Option('1.1.4.2 Promover la resoluciÃ³n de conflictos mediante...','19');
document.getElementById('pnd_linea').options['3']=new Option('1.1.4.3 Garantizar a los ciudadanos mexicanos el ejercicio d...','20');
document.getElementById('pnd_linea').options['4']=new Option('1.1.4.4 Garantizar y promover el respeto a los principios y ...','21');
document.getElementById('pnd_linea').options['5']=new Option('1.1.4.5 Impulsar un Acuerdo Nacional para el Bienestar, el R...','22');
break;
case "5":
document.getElementById('pnd_linea').options['1']=new Option('1.1.5.1 Promover una regulaciÃ³n de los contenidos de ...','23');
document.getElementById('pnd_linea').options['2']=new Option('1.1.5.2 Establecer una estrategia de comunicaciÃ³n coo...','24');
document.getElementById('pnd_linea').options['3']=new Option('1.1.5.3 Utilizar los medios de comunicaciÃ³n como agen...','25');
document.getElementById('pnd_linea').options['4']=new Option('1.1.5.4 Vigilar que las transmisiones cumplan con las dispos...','26');
document.getElementById('pnd_linea').options['5']=new Option('1.1.5.5 Generar polÃ­ticas pÃºblicas que permita...','27');
break;
case "6":
document.getElementById('pnd_linea').options['1']=new Option('1.2.1.1 Impulsar la creaciÃ³n de instancias de coordin...','28');
document.getElementById('pnd_linea').options['2']=new Option('1.2.1.2 Impulsar mecanismos de concertaciÃ³n de accion...','29');
document.getElementById('pnd_linea').options['3']=new Option('1.2.1.3 Promover esquemas de coordinaciÃ³n y cooperaci...','30');
document.getElementById('pnd_linea').options['4']=new Option('1.2.1.4 Impulsar el desarrollo del marco jurÃ­dico en ...','31');
document.getElementById('pnd_linea').options['5']=new Option('1.2.1.5 Establecer canales adecuados de comunicaciÃ³n ...','32');
document.getElementById('pnd_linea').options['6']=new Option('1.2.1.6 Fortalecer a la inteligencia civil como un Ã³r...','33');
break;
case "7":
document.getElementById('pnd_linea').options['1']=new Option('1.2.2.1 Impulsar la creaciÃ³n de instrumentos jur&iacu...','34');
document.getElementById('pnd_linea').options['2']=new Option('1.2.2.2 Adecuar la DivisiÃ³n Territorial Militar, Nava...','35');
document.getElementById('pnd_linea').options['3']=new Option('1.2.2.3 Fortalecer las actividades militares en los Ã¡...','36');
document.getElementById('pnd_linea').options['4']=new Option('1.2.2.4 Desarrollar operaciones coordinadas en los puntos ne...','37');
document.getElementById('pnd_linea').options['5']=new Option('1.2.2.5 Impulsar la coordinaciÃ³n con entidades paraes...','38');
document.getElementById('pnd_linea').options['6']=new Option('1.2.2.6 Coadyuvar con las instancias de seguridad pÃºb...','39');
document.getElementById('pnd_linea').options['7']=new Option('1.2.2.7 Impulsar y participar en mecanismos o iniciativas de...','40');
break;
case "8":
document.getElementById('pnd_linea').options['1']=new Option('1.2.3.1 Integrar una agenda de Seguridad Nacional que identi...','41');
document.getElementById('pnd_linea').options['2']=new Option('1.2.3.2 Impulsar la creaciÃ³n de instrumentos jur&iacu...','42');
document.getElementById('pnd_linea').options['3']=new Option('1.2.3.3 Impulsar, mediante la realizaciÃ³n de estudios...','43');
document.getElementById('pnd_linea').options['4']=new Option('1.2.3.4 DiseÃ±ar y operar un Sistema Nacional de Intel...','44');
document.getElementById('pnd_linea').options['5']=new Option('1.2.3.5 Fortalecer el Sistema de Inteligencia Militar y el S...','45');
document.getElementById('pnd_linea').options['6']=new Option('1.2.3.6 Promover, con las instancias de la Administraci&oacu...','46');
document.getElementById('pnd_linea').options['7']=new Option('1.2.3.7 Coadyuvar en la identificaciÃ³n, prevenci&oacu...','47');
document.getElementById('pnd_linea').options['8']=new Option('1.2.3.8 DiseÃ±ar e impulsar una estrategia de segurida...','48');
document.getElementById('pnd_linea').options['9']=new Option('1.2.3.9 Establecer un Sistema de Vigilancia AÃ©rea, Ma...','49');
document.getElementById('pnd_linea').options['10']=new Option('1.2.3.10 Fortalecer la seguridad de nuestras fronteras....','50');
break;
case "9":
document.getElementById('pnd_linea').options['1']=new Option('1.2.4.1 Fortalecer las capacidades de las Fuerzas Armadas co...','51');
document.getElementById('pnd_linea').options['2']=new Option('1.2.4.2 Contribuir en la atenciÃ³n de necesidades soci...','52');
document.getElementById('pnd_linea').options['3']=new Option('1.2.4.3 Fortalecer el Sistema de BÃºsqueda y Rescate M...','53');
document.getElementById('pnd_linea').options['4']=new Option('1.2.4.4 Fortalecer el Sistema de Mando y Control de la Armad...','54');
document.getElementById('pnd_linea').options['5']=new Option('1.2.4.5 Continuar con el programa de sustituciÃ³n de b...','55');
document.getElementById('pnd_linea').options['6']=new Option('1.2.4.6 Fortalecer la capacidad de apoyo aÃ©reo a las ...','56');
break;
case "10":
document.getElementById('pnd_linea').options['1']=new Option('1.2.5.1 Realizar cambios sustantivos en el Sistema Educativo...','57');
document.getElementById('pnd_linea').options['2']=new Option('1.2.5.2 Construir y adecuar la infraestructura, instalacione...','58');
document.getElementById('pnd_linea').options['3']=new Option('1.2.5.3 Fortalecer el marco legal en materia de protecci&oac...','59');
document.getElementById('pnd_linea').options['4']=new Option('1.2.5.4 Mejorar la seguridad social de los integrantes de la...','60');
document.getElementById('pnd_linea').options['5']=new Option('1.2.5.5 Impulsar reformas legales que fortalezcan el desarro...','61');
document.getElementById('pnd_linea').options['6']=new Option('1.2.5.6 Fortalecer y modernizar el Servicio de PolicÃ­...','62');
break;
case "11":
document.getElementById('pnd_linea').options['1']=new Option('1.3.1.1 Coordinar la estrategia nacional para reducir los &i...','63');
document.getElementById('pnd_linea').options['2']=new Option('1.3.1.2 Aplicar una campaÃ±a de comunicaciÃ³n en...','64');
document.getElementById('pnd_linea').options['3']=new Option('1.3.1.3 Dar seguimiento y evaluaciÃ³n de las acciones ...','65');
document.getElementById('pnd_linea').options['4']=new Option('1.3.1.4 Crear y desarrollar instrumentos validados y de proc...','66');
document.getElementById('pnd_linea').options['5']=new Option('1.3.1.5 Implementar y dar seguimiento a mecanismos de preven...','67');
document.getElementById('pnd_linea').options['6']=new Option('1.3.1.6 Garantizar condiciones para la existencia de mayor s...','68');
break;
case "12":
document.getElementById('pnd_linea').options['1']=new Option('1.3.2.1 Reorganizar la PolicÃ­a Federal hacia un esque...','69');
document.getElementById('pnd_linea').options['2']=new Option('1.3.2.2 Establecer una coordinaciÃ³n efectiva entre in...','70');
document.getElementById('pnd_linea').options['3']=new Option('1.3.2.3 Generar informaciÃ³n y comunicaciones oportuna...','71');
document.getElementById('pnd_linea').options['4']=new Option('1.3.2.4 Orientar la planeaciÃ³n en seguridad hacia un ...','72');
document.getElementById('pnd_linea').options['5']=new Option('1.3.2.5 Promover en el Sistema Penitenciario Nacional la rei...','73');
break;
case "13":
document.getElementById('pnd_linea').options['1']=new Option('1.4.1.1 Proponer las reformas legales en las Ã¡reas qu...','74');
document.getElementById('pnd_linea').options['2']=new Option('1.4.1.2 DiseÃ±ar y ejecutar las adecuaciones normativa...','75');
document.getElementById('pnd_linea').options['3']=new Option('1.4.1.3 Consolidar los procesos de formaciÃ³n, capacit...','76');
document.getElementById('pnd_linea').options['4']=new Option('1.4.1.4 RediseÃ±ar y actualizar los protocolos de actu...','77');
document.getElementById('pnd_linea').options['5']=new Option('1.4.1.5 Capacitar a los operadores del Sistema de Justicia P...','78');
document.getElementById('pnd_linea').options['6']=new Option('1.4.1.6 Implantar un Nuevo Modelo de OperaciÃ³n Insitu...','79');
document.getElementById('pnd_linea').options['7']=new Option('1.4.1.7 Implementar un sistema de informaciÃ³n institu...','80');
document.getElementById('pnd_linea').options['8']=new Option('1.4.1.8 RediseÃ±ar el servicio de carrera de los opera...','81');
document.getElementById('pnd_linea').options['9']=new Option('1.4.1.9 Proporcionar asistencia y representaciÃ³n efic...','82');
break;
case "14":
document.getElementById('pnd_linea').options['1']=new Option('1.4.2.1 Proponer las reformas constitucionales y legales que...','83');
document.getElementById('pnd_linea').options['2']=new Option('1.4.2.2 Establecer un programa en materia de desarrollo tecn...','84');
document.getElementById('pnd_linea').options['3']=new Option('1.4.2.3 Coadyuvar en la definiciÃ³n de una nueva pol&i...','85');
document.getElementById('pnd_linea').options['4']=new Option('1.4.2.4 Desarrollar un nuevo esquema de despliegue regional,...','86');
document.getElementById('pnd_linea').options['5']=new Option('1.4.2.5 Robustecer el papel de la ProcuradurÃ­a Genera...','87');
document.getElementById('pnd_linea').options['6']=new Option('1.4.2.6 Mejorar la calidad de la investigaciÃ³n de hec...','88');
break;
case "15":
document.getElementById('pnd_linea').options['1']=new Option('1.4.3.1 Promover la creaciÃ³n de un organismo aut&oacu...','89');
document.getElementById('pnd_linea').options['2']=new Option('1.4.3.2 Desarrollar criterios de selecciÃ³n evaluaci&...','90');
document.getElementById('pnd_linea').options['3']=new Option('1.4.3.3 Mejorar los procesos de vigilancia en relaciÃ³...','91');
document.getElementById('pnd_linea').options['4']=new Option('1.4.3.4 Transparentar la actuaciÃ³n ministerial ante l...','92');
document.getElementById('pnd_linea').options['5']=new Option('1.4.3.5 Fortalecer los mecanismos de coordinaciÃ³n ent...','93');
break;
case "16":
document.getElementById('pnd_linea').options['1']=new Option('1.5.1.1 Establecer un programa dirigido a la promociÃ³...','94');
document.getElementById('pnd_linea').options['2']=new Option('1.5.1.2 Promover la implementaciÃ³n de los principios ...','95');
document.getElementById('pnd_linea').options['3']=new Option('1.5.1.3 Promover mecanismos de coordinaciÃ³n con las d...','96');
document.getElementById('pnd_linea').options['4']=new Option('1.5.1.4 Establecer mecanismos de colaboraciÃ³n para pr...','97');
document.getElementById('pnd_linea').options['5']=new Option('1.5.1.5 Promover adecuaciones al ordenamiento jurÃ­dic...','98');
document.getElementById('pnd_linea').options['6']=new Option('1.5.1.6 Generar informaciÃ³n que favorezca la localiza...','99');
document.getElementById('pnd_linea').options['7']=new Option('1.5.1.7 Actualizar, sensibilizar y estandarizar los niveles ...','100');
document.getElementById('pnd_linea').options['8']=new Option('1.5.1.8 Promover acciones para la difusiÃ³n del conoci...','101');
document.getElementById('pnd_linea').options['9']=new Option('1.5.1.9 Promover los protocolos de respeto a los derechos hu...','102');
document.getElementById('pnd_linea').options['10']=new Option('1.5.1.10 Dar cumplimiento a las recomendaciones y sentencias...','103');
document.getElementById('pnd_linea').options['11']=new Option('1.5.1.11 Impulsar la inclusiÃ³n de los derechos humanm...','104');
document.getElementById('pnd_linea').options['12']=new Option('1.5.1.12 Fortalecer los mecanismos de protecciÃ³n de d...','105');
break;
case "17":
document.getElementById('pnd_linea').options['1']=new Option('1.5.2.1 Prohibir y sancionar efectivamente todas las formas ...','106');
document.getElementById('pnd_linea').options['2']=new Option('1.5.2.2 Priorizar la prevenciÃ³n de la violencia contr...','107');
document.getElementById('pnd_linea').options['3']=new Option('1.5.2.3 Crear sistemas de denuncia accesibles y adecuados pa...','108');
document.getElementById('pnd_linea').options['4']=new Option('1.5.2.4 Promover la recopilaciÃ³n de datos de todas la...','109');
break;
case "18":
document.getElementById('pnd_linea').options['1']=new Option('1.5.3.1 Coadyuvar en el funcionamiento del Sistema Nacional ...','110');
document.getElementById('pnd_linea').options['2']=new Option('1.5.3.2 Promover el cumplimiento de la obligaciÃ³n de ...','111');
document.getElementById('pnd_linea').options['3']=new Option('1.5.3.3 Fortalecer el establecimiento en todo el paÃ­s...','112');
document.getElementById('pnd_linea').options['4']=new Option('1.5.3.4 Establecer mecanismos que permitan al Ã³rgano ...','113');
document.getElementById('pnd_linea').options['5']=new Option('1.5.3.5 Promover la participaciÃ³n y establecer mecani...','114');
break;
case "19":
document.getElementById('pnd_linea').options['1']=new Option('1.5.4.1 Promover la armonizaciÃ³n del marco jurÃ­...','115');
document.getElementById('pnd_linea').options['2']=new Option('1.5.4.2 Promover acciones afirmativas dirigidas a generar co...','116');
document.getElementById('pnd_linea').options['3']=new Option('1.5.4.3 Fortalacer los mecanismos competentes para prevenir ...','117');
document.getElementById('pnd_linea').options['4']=new Option('1.5.4.4 Promover acciones concertadas dirigidas a propiciar ...','118');
document.getElementById('pnd_linea').options['5']=new Option('1.5.4.5 Promover el enfoque de derechos humanos y no discrim...','119');
document.getElementById('pnd_linea').options['6']=new Option('1.5.4.6 Promover una legislaciÃ³n acorde a la Convenci...','120');
break;
case "20":
document.getElementById('pnd_linea').options['1']=new Option('1.6.1.1 Promover y consolidar la elaboraciÃ³n de un At...','121');
document.getElementById('pnd_linea').options['2']=new Option('1.6.1.2 Impulsar la GestiÃ³n Integral del Riesgo como ...','122');
document.getElementById('pnd_linea').options['3']=new Option('1.6.1.3 Fomentar la cultura de protecciÃ³n civil y la ...','123');
document.getElementById('pnd_linea').options['4']=new Option('1.6.1.4 Fortalecer los instrumentos financieros de gesti&oac...','124');
document.getElementById('pnd_linea').options['5']=new Option('1.6.1.5 Promover los estudios y mecanismos tendientes a la t...','125');
document.getElementById('pnd_linea').options['6']=new Option('1.6.1.6 Fomentar, desarrollar y promover Normas Oficiales Me...','126');
document.getElementById('pnd_linea').options['7']=new Option('1.6.1.7 Promover el fortalecimiento de las normas existentes...','127');
break;
case "21":
document.getElementById('pnd_linea').options['1']=new Option('1.6.2.1 Fortalecer la capacidad logÃ­stica y de operac...','128');
document.getElementById('pnd_linea').options['2']=new Option('1.6.2.2 Fortalecer las capacidades de las Fuerzas Armadas pa...','129');
document.getElementById('pnd_linea').options['3']=new Option('1.6.2.3 Coordinar los esfuerzos de los gobiernos federal, es...','130');
break;
case "22":
document.getElementById('pnd_linea').options['1']=new Option('1.I.1 Impulsar la correcta implementaciÃ³n de las estr...','131');
break;
case "23":
document.getElementById('pnd_linea').options['1']=new Option('1.II.1 Estrechar desde la Oficina de la Presidencia, la Secr...','132');
document.getElementById('pnd_linea').options['2']=new Option('1.II.2 Evaluar y retroalimentar las acciones de las fuerzas ...','133');
document.getElementById('pnd_linea').options['3']=new Option('1.II.3 Impulsar la congruencia y consistencia del orden norm...','134');
document.getElementById('pnd_linea').options['4']=new Option('1.II.4 Promover la eficiencia en el Sistema de Justicia Form...','135');
document.getElementById('pnd_linea').options['5']=new Option('1.II.5 Colaborar en la promociÃ³n de acciones para una...','136');
document.getElementById('pnd_linea').options['6']=new Option('1.II.6 Fortalecer la investigaciÃ³n y el desarrollo ci...','137');
document.getElementById('pnd_linea').options['7']=new Option('1.II.7 Difundir, con apego a los principios de legalidad, ce...','138');
document.getElementById('pnd_linea').options['8']=new Option('1.II.8 Promover el respeto a los derechos humanos y la relac...','139');
document.getElementById('pnd_linea').options['9']=new Option('1.II.9 Fortalecer las polÃ­ticas en materia de federal...','140');
break;
case "24":
document.getElementById('pnd_linea').options['1']=new Option('1.III.1 Fomentar la participaciÃ³n y representaci&oacu...','141');
document.getElementById('pnd_linea').options['2']=new Option('1.III.2 Establecer medidas especiales orientadas a la erradi...','142');
document.getElementById('pnd_linea').options['3']=new Option('1.III.3 Garantizar el cumplimiento de los acuerdos generales...','143');
document.getElementById('pnd_linea').options['4']=new Option('1.III.4 Fortalecer el Banco Nacional de Datos e Informaci&oa...','144');
document.getElementById('pnd_linea').options['5']=new Option('1.III.5 Simplificar los procesos y mejorar la coordinaci&oac...','145');
document.getElementById('pnd_linea').options['6']=new Option('1.III.6 Acelerar la aplicaciÃ³n cabal de las Ã³r...','146');
document.getElementById('pnd_linea').options['7']=new Option('1.III.7 Promover la armonizaciÃ³n de protocolos de inv...','147');
document.getElementById('pnd_linea').options['8']=new Option('1.III.8 Propiciar la tipificaciÃ³n del delito de trata...','148');
document.getElementById('pnd_linea').options['9']=new Option('1.III.9 Llevar a cabo campaÃ±as nacionales de sensibil...','149');
document.getElementById('pnd_linea').options['10']=new Option('1.III.10 Capacitar a los funcionarios encargados de hacer cu...','150');
document.getElementById('pnd_linea').options['11']=new Option('1.III.11 Promover el enfoque de gÃ©nero en las actuaci...','151');
document.getElementById('pnd_linea').options['12']=new Option('1.III.12 Incorporar acciones especÃ­ficas para garanti...','152');
break;
case "25":
document.getElementById('pnd_linea').options['1']=new Option('2.1.1.1 Combatir la carencia alimentaria de la poblaci&oacut...','153');
document.getElementById('pnd_linea').options['2']=new Option('2.1.1.2 Propiciar un ingreso mÃ­nimo necesario para qu...','154');
document.getElementById('pnd_linea').options['3']=new Option('2.1.1.3 Facilitar el acceso a productos alimenticios b&aacut...','155');
document.getElementById('pnd_linea').options['4']=new Option('2.1.1.4 Incorporar componentes de carÃ¡cter productivo...','156');
document.getElementById('pnd_linea').options['5']=new Option('2.1.1.5 Adecuar el marco jurÃ­dico para fortalecer la ...','157');
break;
case "26":
document.getElementById('pnd_linea').options['1']=new Option('2.1.2.1 Propiciar que los niÃ±os, niÃ±as y j&oac...','158');
document.getElementById('pnd_linea').options['2']=new Option('2.1.2.2 Fomentar el acceso efectivo de las familias, princip...','159');
document.getElementById('pnd_linea').options['3']=new Option('2.1.2.3 Otorgar los beneficios del Sistema de Protecci&oacut...','160');
document.getElementById('pnd_linea').options['4']=new Option('2.1.2.4 Brindar capacitaciÃ³n a la poblaciÃ³n pa...','161');
document.getElementById('pnd_linea').options['5']=new Option('2.1.2.5 Contribuir al mejor desempeÃ±o escolar a trav&...','162');
document.getElementById('pnd_linea').options['6']=new Option('2.1.2.6 Promover acciones de desarrollo infantil temprano...','163');
break;
case "27":
document.getElementById('pnd_linea').options['1']=new Option('2.1.3.1 Impulsar la modernizaciÃ³n de los Registros Ci...','164');
document.getElementById('pnd_linea').options['2']=new Option('2.1.3.2 Fortalecer el uso y adopciÃ³n de la Clave &uac...','165');
document.getElementById('pnd_linea').options['3']=new Option('2.1.3.3 Consolidar el Sistema Nacional de Identificaci&oacut...','166');
document.getElementById('pnd_linea').options['4']=new Option('2.1.3.4 Adecuar el marco normativo en materia de poblaci&oac...','167');
break;
case "28":
document.getElementById('pnd_linea').options['1']=new Option('2.2.1.1 Fortalecer a los actores sociales que promuevan el d...','168');
document.getElementById('pnd_linea').options['2']=new Option('2.2.1.2 Potenciar la inversiÃ³n conjunta de la socieda...','169');
document.getElementById('pnd_linea').options['3']=new Option('2.2.1.3 Fortalecer el capital y cohesiÃ³n social media...','170');
break;
case "29":
document.getElementById('pnd_linea').options['1']=new Option('2.2.2.1 Promover el desarrollo integral de los niÃ±os ...','171');
document.getElementById('pnd_linea').options['2']=new Option('2.2.2.2 Fomentar el desarrollo personal y profesional de los...','172');
document.getElementById('pnd_linea').options['3']=new Option('2.2.2.3 Fortalecer la protecciÃ³n de los derechos de l...','173');
break;
case "30":
document.getElementById('pnd_linea').options['1']=new Option('2.2.3.1 Desarrollar mecanismos para que la acciÃ³n p&u...','174');
document.getElementById('pnd_linea').options['2']=new Option('2.2.3.2 Impulsar la armonizaciÃ³n del marco jurÃ­...','175');
document.getElementById('pnd_linea').options['3']=new Option('2.2.3.3 Fomentar la participaciÃ³n de las comunidades ...','176');
document.getElementById('pnd_linea').options['4']=new Option('2.2.3.4 Promover el desarrollo econÃ³mico de los puebl...','177');
document.getElementById('pnd_linea').options['5']=new Option('2.2.3.5 Asegurar el ejercicio de los derechos de los pueblos...','178');
document.getElementById('pnd_linea').options['6']=new Option('2.2.3.6 Impulsar polÃ­ticas para el aprovechamiento su...','179');
document.getElementById('pnd_linea').options['7']=new Option('2.2.3.7 Impulsar acciones que garanticen los derechos humano...','180');
break;
case "31":
document.getElementById('pnd_linea').options['1']=new Option('2.2.4.1 Establecer esquemas de atenciÃ³n integral para...','181');
document.getElementById('pnd_linea').options['2']=new Option('2.2.4.2 DiseÃ±ar y ejecutar estrategias para increment...','182');
document.getElementById('pnd_linea').options['3']=new Option('2.2.4.3 Asegurar la construcciÃ³n y adecuaciÃ³n ...','183');
break;
case "32":
document.getElementById('pnd_linea').options['1']=new Option('2.3.1.1 Garantizar el acceso y la calidad de los servicios d...','184');
document.getElementById('pnd_linea').options['2']=new Option('2.3.1.2 Fortalecer la rectorÃ­a de la autoridad sanita...','185');
document.getElementById('pnd_linea').options['3']=new Option('2.3.1.3 Desarrollar los instrumentos necesarios para lograr ...','186');
document.getElementById('pnd_linea').options['4']=new Option('2.3.1.4 Fomentar el proceso de planeaciÃ³n estrat&eacu...','187');
document.getElementById('pnd_linea').options['5']=new Option('2.3.1.5 Contribuir a la consolidaciÃ³n de los instrume...','188');
break;
case "33":
document.getElementById('pnd_linea').options['1']=new Option('2.3.2.1 Garantizar la oportunidad, calidad, seguridad y efic...','189');
document.getElementById('pnd_linea').options['2']=new Option('2.3.2.2 Reducir la carga de morbilidad y mortalidad de enfer...','190');
document.getElementById('pnd_linea').options['3']=new Option('2.3.2.3 Instrumentar acciones para la prevenciÃ³n y co...','191');
document.getElementById('pnd_linea').options['4']=new Option('2.3.2.4 Reducir la prevalencia en el consumo de alcohol, tab...','192');
document.getElementById('pnd_linea').options['5']=new Option('2.3.2.5 Controlar las enfermedades de transmisiÃ³n sex...','193');
document.getElementById('pnd_linea').options['6']=new Option('2.3.2.6 Fortalecer programas de detecciÃ³n oportuna de...','194');
document.getElementById('pnd_linea').options['7']=new Option('2.3.2.7 Privilegiar acciones de regulaciÃ³n y vigilanc...','195');
document.getElementById('pnd_linea').options['8']=new Option('2.3.2.8 Coordinar actividades con los sectores productivos p...','196');
break;
case "34":
document.getElementById('pnd_linea').options['1']=new Option('2.3.3.1 Asegurar un enfoque integral y la participaciÃ³...','197');
document.getElementById('pnd_linea').options['2']=new Option('2.3.3.2 Intensificar la capacitaciÃ³n y supervisi&oacu...','198');
document.getElementById('pnd_linea').options['3']=new Option('2.3.3.3 Llevar a cabo campaÃ±as de vacunaciÃ³n, ...','199');
document.getElementById('pnd_linea').options['4']=new Option('2.3.3.4 Impulsar el enfoque intercultural de salud en el dis...','200');
document.getElementById('pnd_linea').options['5']=new Option('2.3.3.5 Implementar acciones regulatorias que permitan evita...','201');
document.getElementById('pnd_linea').options['6']=new Option('2.3.3.6 Fomentar el desarrollo de infraestructura y la puest...','202');
document.getElementById('pnd_linea').options['7']=new Option('2.3.3.7 Impulsar acciones para la prevenciÃ³n y promoc...','203');
document.getElementById('pnd_linea').options['8']=new Option('2.3.3.8 Fortalecer los mecanismos de anticipaciÃ³n y r...','204');
break;
case "35":
document.getElementById('pnd_linea').options['1']=new Option('2.3.4.1 Preparar el sistema para que el usuario seleccione a...','205');
document.getElementById('pnd_linea').options['2']=new Option('2.3.4.2 Consolidar la regulaciÃ³n efectiva de los proc...','206');
document.getElementById('pnd_linea').options['3']=new Option('2.3.4.3 Instrumentar mecanismos que permitan homologar la ca...','207');
document.getElementById('pnd_linea').options['4']=new Option('2.3.4.4 Mejorar la calidad en la formaciÃ³n de los rec...','208');
document.getElementById('pnd_linea').options['5']=new Option('2.3.4.5 Garantizar medicamentos de calidad, eficaces y segur...','209');
document.getElementById('pnd_linea').options['6']=new Option('2.3.4.6 Implementar programas orientados a elevar la satisfa...','210');
document.getElementById('pnd_linea').options['7']=new Option('2.3.4.7 Desarrollar y fortalecer la infraestructura de los s...','211');
break;
case "36":
document.getElementById('pnd_linea').options['1']=new Option('2.3.5.1 Fortalecer la vigilancia epidemiolÃ³gica para ...','212');
document.getElementById('pnd_linea').options['2']=new Option('2.3.5.2 Cumplir con los tratados internacionales en materia ...','213');
document.getElementById('pnd_linea').options['3']=new Option('2.3.5.3 Impulsar nuevos esquemas de cooperaciÃ³n inter...','214');
break;
case "37":
document.getElementById('pnd_linea').options['1']=new Option('2.4.1.1 Fomentar polÃ­ticas de empleo y fortalecer los...','215');
document.getElementById('pnd_linea').options['2']=new Option('2.4.1.2 Instrumentar el Seguro de Vida para Mujeres Jefas de...','216');
document.getElementById('pnd_linea').options['3']=new Option('2.4.1.3 Promover la inclusiÃ³n financiera en materia d...','217');
document.getElementById('pnd_linea').options['4']=new Option('2.4.1.4 Apoyar a la poblaciÃ³n afectada por emergencia...','218');
break;
case "38":
document.getElementById('pnd_linea').options['1']=new Option('2.4.2.1 Facilitar la portabilidad de derechos entre los dive...','219');
document.getElementById('pnd_linea').options['2']=new Option('2.4.2.2 Promover la eficiencia y calidad al ofrecer derechos...','220');
break;
case "39":
document.getElementById('pnd_linea').options['1']=new Option('2.4.3.1 Reordenar los procesos que permitan el seguimiento d...','221');
document.getElementById('pnd_linea').options['2']=new Option('2.4.3.2 Racionalizar y optimizar el gasto operativo, y privi...','222');
document.getElementById('pnd_linea').options['3']=new Option('2.4.3.3 Incrementar los mecanismos de verificaciÃ³n y ...','223');
document.getElementById('pnd_linea').options['4']=new Option('2.4.3.4 Determinar y vigilar los costos de atenciÃ³n d...','224');
document.getElementById('pnd_linea').options['5']=new Option('2.4.3.5 Implementar programas de distribuciÃ³n de medi...','225');
document.getElementById('pnd_linea').options['6']=new Option('2.4.3.6 Promover esquemas innovadores de financiamiento p&ua...','226');
document.getElementById('pnd_linea').options['7']=new Option('2.4.3.7 Impulsar la sustentabilidad de los sistemas de pensi...','227');
document.getElementById('pnd_linea').options['8']=new Option('2.4.3.8 DiseÃ±ar una estrategia integral para el patri...','228');
break;
case "40":
document.getElementById('pnd_linea').options['1']=new Option('2.5.1.1 Fomentar ciudades mÃ¡s compactas, con mayor de...','229');
document.getElementById('pnd_linea').options['2']=new Option('2.5.1.2 Inhibir el crecimiento de las manchas urbanas hacia ...','230');
document.getElementById('pnd_linea').options['3']=new Option('2.5.1.3 Promover reformas a la legislaciÃ³n en materia...','231');
document.getElementById('pnd_linea').options['4']=new Option('2.5.1.4 Revertir el abandono e incidir positivamente en la p...','232');
document.getElementById('pnd_linea').options['5']=new Option('2.5.1.5 Mejorar las condiciones habitacionales y su entorno,...','233');
document.getElementById('pnd_linea').options['6']=new Option('2.5.1.6 Adecuar normas e impulsar acciones de renovaci&oacut...','234');
document.getElementById('pnd_linea').options['7']=new Option('2.5.1.7 Fomentar una movilidad urbana sustentable con apoyo ...','235');
document.getElementById('pnd_linea').options['8']=new Option('2.5.1.8 Propiciar la modernizaciÃ³n de catastros y de ...','236');
break;
case "41":
document.getElementById('pnd_linea').options['1']=new Option('2.5.2.1 Desarrollar y promover vivienda digna que favorezca ...','237');
document.getElementById('pnd_linea').options['2']=new Option('2.5.2.2 Desarrollar un nuevo modelo de atenciÃ³n de ne...','238');
document.getElementById('pnd_linea').options['3']=new Option('2.5.2.3 Fortalecer el mercado secundario de vivienda, incent...','239');
document.getElementById('pnd_linea').options['4']=new Option('2.5.2.4 Incentivar la oferta y demanda de vivienda en renta ...','240');
document.getElementById('pnd_linea').options['5']=new Option('2.5.2.5 Fortalecer el papel de la banca privada, la Banca de...','241');
document.getElementById('pnd_linea').options['6']=new Option('2.5.2.6 Desarrollar los instrumentos administrativos y contr...','242');
document.getElementById('pnd_linea').options['7']=new Option('2.5.2.7 Fomentar la nueva vivienda sustentable desde las dim...','243');
document.getElementById('pnd_linea').options['8']=new Option('2.5.2.8 Dotar con servicios bÃ¡sicos, calidad en la vi...','244');
document.getElementById('pnd_linea').options['9']=new Option('2.5.2.9 Establecer polÃ­ticas de reubicaciÃ³n de...','245');
break;
case "42":
document.getElementById('pnd_linea').options['1']=new Option('2.5.3.1 Consolidar una polÃ­tica unificada y congruent...','246');
document.getElementById('pnd_linea').options['2']=new Option('2.5.3.2 Fortalecer las instancias e instrumentos de coordina...','247');
document.getElementById('pnd_linea').options['3']=new Option('2.5.3.3 Promover la adecuaciÃ³n de la legislaciÃ³...','248');
break;
case "43":
document.getElementById('pnd_linea').options['1']=new Option('2.I.1 Promover el uso eficiente del territorio nacional a tr...','249');
document.getElementById('pnd_linea').options['2']=new Option('2.I.2 Reducir la informalidad y generar empleos mejor remune...','250');
document.getElementById('pnd_linea').options['3']=new Option('2.I.3 Fomentar la generaciÃ³n de fuentes de ingreso so...','251');
break;
case "44":
document.getElementById('pnd_linea').options['1']=new Option('2.II.1 Desarrollar polÃ­ticas pÃºblicas con base...','252');
document.getElementById('pnd_linea').options['2']=new Option('2.II.2 Incorporar la participaciÃ³n social desde el di...','253');
document.getElementById('pnd_linea').options['3']=new Option('2.II.3 Optimizar el gasto operativo y los costos de atenci&o...','254');
document.getElementById('pnd_linea').options['4']=new Option('2.II.4 Evaluar y rendir cuentas de los programas y recursos ...','255');
document.getElementById('pnd_linea').options['5']=new Option('2.II.5 Integrar un padrÃ³n con identificaciÃ³n &...','256');
document.getElementById('pnd_linea').options['6']=new Option('2.II.6 DiseÃ±ar e integrar sistemas funcionales, escal...','257');
document.getElementById('pnd_linea').options['7']=new Option('2.II.7 Identificar y corregir riesgos operativos crÃ­t...','258');
break;
case "45":
document.getElementById('pnd_linea').options['1']=new Option('2.III.1 Promover la igualdad de oportunidades entre mujeres ...','259');
document.getElementById('pnd_linea').options['2']=new Option('2.III.2 Desarrollar y fortalecer esquemas de apoyo y atenci&...','260');
document.getElementById('pnd_linea').options['3']=new Option('2.III.3 Fomentar polÃ­ticas dirigidas a los hombres qu...','261');
document.getElementById('pnd_linea').options['4']=new Option('2.III.4 Prevenir y atender la violencia contra las mujeres, ...','262');
document.getElementById('pnd_linea').options['5']=new Option('2.III.5 DiseÃ±ar, aplicar y promover polÃ­ticas ...','263');
document.getElementById('pnd_linea').options['6']=new Option('2.III.6 Evaluar los esquemas de atenciÃ³n de los progr...','264');
break;
case "46":
document.getElementById('pnd_linea').options['1']=new Option('3.1.1.1 Estimular el desarrollo profesional de los maestros,...','265');
document.getElementById('pnd_linea').options['2']=new Option('3.1.1.2 Robustecer los programas de formaciÃ³n para do...','266');
document.getElementById('pnd_linea').options['3']=new Option('3.1.1.3 Impulsar la capacitaciÃ³n permanente de los do...','267');
document.getElementById('pnd_linea').options['4']=new Option('3.1.1.4 Fortalecer el proceso de reclutamiento de directores...','268');
document.getElementById('pnd_linea').options['5']=new Option('3.1.1.5 Incentivar a las instituciones de formaciÃ³n i...','269');
document.getElementById('pnd_linea').options['6']=new Option('3.1.1.6 Estimular los programas institucionales de mejoramie...','270');
document.getElementById('pnd_linea').options['7']=new Option('3.1.1.7 Constituir el Servicio de Asistencia TÃ©cnica ...','271');
document.getElementById('pnd_linea').options['8']=new Option('3.1.1.8 Mejorar la supervisiÃ³n escolar, reforzando su...','272');
break;
case "47":
document.getElementById('pnd_linea').options['1']=new Option('3.1.2.1 Promover la mejora de la infraestructura de los plan...','273');
document.getElementById('pnd_linea').options['2']=new Option('3.1.2.2 Asegurar que los planteles educativos dispongan de i...','274');
document.getElementById('pnd_linea').options['3']=new Option('3.1.2.3 Modernizar el equipamiento de talleres, laboratorios...','275');
document.getElementById('pnd_linea').options['4']=new Option('3.1.2.4 Incentivar la planeaciÃ³n de las adecuaciones ...','276');
break;
case "48":
document.getElementById('pnd_linea').options['1']=new Option('3.1.3.1 Definir estÃ¡ndares curriculares que describan...','277');
document.getElementById('pnd_linea').options['2']=new Option('3.1.3.2 Instrumentar una polÃ­tica nacional de desarro...','278');
document.getElementById('pnd_linea').options['3']=new Option('3.1.3.3 Ampliar paulatinamente la duraciÃ³n de la jorn...','279');
document.getElementById('pnd_linea').options['4']=new Option('3.1.3.4 Incentivar el establecimiento de escuelas de tiempo ...','280');
document.getElementById('pnd_linea').options['5']=new Option('3.1.3.5 Fortalecer dentro de los planes y programas de estud...','281');
document.getElementById('pnd_linea').options['6']=new Option('3.1.3.6 Impulsar a travÃ©s de los planes y programas d...','282');
document.getElementById('pnd_linea').options['7']=new Option('3.1.3.7 Reformar el esquema de evaluaciÃ³n y certifica...','283');
document.getElementById('pnd_linea').options['8']=new Option('3.1.3.8 Fomentar desde la educaciÃ³n bÃ¡sica los...','284');
document.getElementById('pnd_linea').options['9']=new Option('3.1.3.9 Fortalecer la educaciÃ³n para el trabajo, dand...','285');
document.getElementById('pnd_linea').options['10']=new Option('3.1.3.10 Impulsar programas de posgrado conjuntos con instit...','286');
document.getElementById('pnd_linea').options['11']=new Option('3.1.3.11 Crear un programa de estadÃ­as de estudiantes...','287');
break;
case "49":
document.getElementById('pnd_linea').options['1']=new Option('3.1.4.1 Desarrollar una polÃ­tica nacional de inform&a...','288');
document.getElementById('pnd_linea').options['2']=new Option('3.1.4.2 Ampliar la dotaciÃ³n de equipos de cÃ³mp...','289');
document.getElementById('pnd_linea').options['3']=new Option('3.1.4.3 Intensificar el uso de herramientas de innovaci&oacu...','290');
break;
case "50":
document.getElementById('pnd_linea').options['1']=new Option('3.1.5.1 Ampliar la operaciÃ³n de los sistemas de apoyo...','291');
document.getElementById('pnd_linea').options['2']=new Option('3.1.5.2 Implementar un programa de alerta temprana para iden...','292');
document.getElementById('pnd_linea').options['3']=new Option('3.1.5.3 Establecer programas remediales de apoyo a estudiant...','293');
document.getElementById('pnd_linea').options['4']=new Option('3.1.5.4 Definir mecanismos que faciliten a los estudiantes t...','294');
break;
case "51":
document.getElementById('pnd_linea').options['1']=new Option('3.1.6.1 Garantizar el establecimiento de vÃ­nculos for...','295');
break;
case "52":
document.getElementById('pnd_linea').options['1']=new Option('3.2.1.1 Establecer un marco regulatorio con las obligaciones...','296');
document.getElementById('pnd_linea').options['2']=new Option('3.2.1.2 Fortalecer la capacidad de los maestros y las escuel...','297');
document.getElementById('pnd_linea').options['3']=new Option('3.2.1.3 Definir, alentar y promover las prÃ¡cticas inc...','298');
document.getElementById('pnd_linea').options['4']=new Option('3.2.1.4 Desarrollar la capacidad de la supervisiÃ³n es...','299');
document.getElementById('pnd_linea').options['5']=new Option('3.2.1.5 Fomentar la ampliaciÃ³n de la cobertura del pr...','300');
document.getElementById('pnd_linea').options['6']=new Option('3.2.1.6 Impulsar el desarrollo de los servicios educativos d...','301');
document.getElementById('pnd_linea').options['7']=new Option('3.2.1.7 Robustecer la educaciÃ³n indÃ­gena, la d...','302');
document.getElementById('pnd_linea').options['8']=new Option('3.2.1.8 Impulsar polÃ­ticas pÃºblicas para refor...','303');
document.getElementById('pnd_linea').options['9']=new Option('3.2.1.9 Fortalecer los servicios que presta el Instituto Nac...','304');
document.getElementById('pnd_linea').options['10']=new Option('3.2.1.10 Establecer alianzas con instituciones de educaci&oa...','305');
document.getElementById('pnd_linea').options['11']=new Option('3.2.1.11 Ampliar las oportunidades educativas para atender a...','306');
document.getElementById('pnd_linea').options['12']=new Option('3.2.1.12 Adecuar la infraestructura, el equipamiento y las c...','307');
document.getElementById('pnd_linea').options['13']=new Option('3.2.1.13 Garantizar el derecho de los pueblos indÃ­gen...','308');
break;
case "53":
document.getElementById('pnd_linea').options['1']=new Option('3.2.2.1 Propiciar la creaciÃ³n de un sistema nacional ...','309');
document.getElementById('pnd_linea').options['2']=new Option('3.2.2.2 Aumentar la proporciÃ³n de jÃ³venes en s...','310');
document.getElementById('pnd_linea').options['3']=new Option('3.2.2.3 Diversificar las modalidades de becas para apoyar a ...','311');
document.getElementById('pnd_linea').options['4']=new Option('3.2.2.4 Promover que en las escuelas de todo el paÃ­s ...','312');
document.getElementById('pnd_linea').options['5']=new Option('3.2.2.5 Fomentar un ambiente de sana convivencia e inculcar ...','313');
break;
case "54":
document.getElementById('pnd_linea').options['1']=new Option('3.2.3.1 Incrementar de manera sostenida la cobertura en educ...','314');
document.getElementById('pnd_linea').options['2']=new Option('3.2.3.2 Ampliar la oferta educativa de las diferentes modali...','315');
document.getElementById('pnd_linea').options['3']=new Option('3.2.3.3 Asegurar la suficiencia financiera de los programas ...','316');
document.getElementById('pnd_linea').options['4']=new Option('3.2.3.4 Impulsar la diversificaciÃ³n de la oferta educ...','317');
document.getElementById('pnd_linea').options['5']=new Option('3.2.3.5 Fomentar la creaciÃ³n de nuevas opciones educa...','318');
break;
case "55":
document.getElementById('pnd_linea').options['1']=new Option('3.3.1.1 Incluir a la cultura como un componente de las accio...','319');
document.getElementById('pnd_linea').options['2']=new Option('3.3.1.2 Vincular las acciones culturales con el programa de ...','320');
document.getElementById('pnd_linea').options['3']=new Option('3.3.1.3 Impulsar un federalismo cultural que fortalezca a la...','321');
document.getElementById('pnd_linea').options['4']=new Option('3.3.1.4 DiseÃ±ar un programa nacional que promueva la ...','322');
document.getElementById('pnd_linea').options['5']=new Option('3.3.1.5 Organizar un programa nacional de grupos artÃ­...','323');
break;
case "56":
document.getElementById('pnd_linea').options['1']=new Option('3.3.2.1 Realizar un trabajo intensivo de evaluaciÃ³n, ...','324');
document.getElementById('pnd_linea').options['2']=new Option('3.3.2.2 Generar nuevas modalidades de espacios multifunciona...','325');
document.getElementById('pnd_linea').options['3']=new Option('3.3.2.3 Dotar a la infraestructura cultural, creada en a&nti...','326');
break;
case "57":
document.getElementById('pnd_linea').options['1']=new Option('3.3.3.1 Promover un amplio programa de rescate y rehabilitac...','327');
document.getElementById('pnd_linea').options['2']=new Option('3.3.3.2 Impulsar la participaciÃ³n de los organismos c...','328');
document.getElementById('pnd_linea').options['3']=new Option('3.3.3.3 Fomentar la exploraciÃ³n y el rescate de sitio...','329');
document.getElementById('pnd_linea').options['4']=new Option('3.3.3.4 Reconocer, valorar, promover y difundir las culturas...','330');
break;
case "58":
document.getElementById('pnd_linea').options['1']=new Option('3.3.4.1 Incentivar la creaciÃ³n de industrias cultural...','331');
document.getElementById('pnd_linea').options['2']=new Option('3.3.4.2 Impulsar el desarrollo de la industria cinematogr&aa...','332');
document.getElementById('pnd_linea').options['3']=new Option('3.3.4.3 Estimular la producciÃ³n artesanal y favorecer...','333');
document.getElementById('pnd_linea').options['4']=new Option('3.3.4.4 Armonizar la conservaciÃ³n y protecciÃ³n...','334');
break;
case "59":
document.getElementById('pnd_linea').options['1']=new Option('3.3.5.1 Definir una polÃ­tica nacional de digitalizaci...','335');
document.getElementById('pnd_linea').options['2']=new Option('3.3.5.2 Estimular la creatividad en el campo de las aplicaci...','336');
document.getElementById('pnd_linea').options['3']=new Option('3.3.5.3 Crear plataformas digitales que favorezcan la oferta...','337');
document.getElementById('pnd_linea').options['4']=new Option('3.3.5.4 Estimular la creaciÃ³n de proyectos vinculados...','338');
document.getElementById('pnd_linea').options['5']=new Option('3.3.5.5 Equipar a la infraestructura cultural del paÃ­...','339');
document.getElementById('pnd_linea').options['6']=new Option('3.3.5.6 Utilizar las nuevas tecnologÃ­as, particularme...','340');
break;
case "60":
document.getElementById('pnd_linea').options['1']=new Option('3.4.1.1 Contar con informaciÃ³n confiable, suficiente ...','341');
document.getElementById('pnd_linea').options['2']=new Option('3.4.1.2 Definir con certeza las necesidades de adecuaci&oacu...','342');
document.getElementById('pnd_linea').options['3']=new Option('3.4.1.3 Recuperar espacios existentes y brindar la adecuada ...','343');
document.getElementById('pnd_linea').options['4']=new Option('3.4.1.4 Promover que todas las acciones de los miembros del ...','344');
document.getElementById('pnd_linea').options['5']=new Option('3.4.1.5 Poner en operaciÃ³n el sistema de evaluaci&oac...','345');
break;
case "61":
document.getElementById('pnd_linea').options['1']=new Option('3.4.2.1 Crear un programa de actividad fÃ­sica y depor...','346');
document.getElementById('pnd_linea').options['2']=new Option('3.4.2.2 Facilitar la prÃ¡ctica deportiva sin fines sel...','347');
document.getElementById('pnd_linea').options['3']=new Option('3.4.2.3 Estructurar con claridad dos grandes vertientes para...','348');
document.getElementById('pnd_linea').options['4']=new Option('3.4.2.4 Facilitar el acceso a la poblaciÃ³n con talent...','349');
document.getElementById('pnd_linea').options['5']=new Option('3.4.2.5 Llevar a cabo competencias deportivas y favorecer la...','350');
break;
case "62":
document.getElementById('pnd_linea').options['1']=new Option('3.5.1.1 Impulsar la articulaciÃ³n de los esfuerzos que...','351');
document.getElementById('pnd_linea').options['2']=new Option('3.5.1.2 Incrementar el gasto pÃºblico en CTI de forma ...','352');
document.getElementById('pnd_linea').options['3']=new Option('3.5.1.3 Promover la inversiÃ³n en CTI que realizan las...','353');
document.getElementById('pnd_linea').options['4']=new Option('3.5.1.4 Incentivar la inversiÃ³n del sector productivo...','354');
document.getElementById('pnd_linea').options['5']=new Option('3.5.1.5 Fomentar el aprovechamiento de las fuentes de financ...','355');
break;
case "63":
document.getElementById('pnd_linea').options['1']=new Option('3.5.2.1 Incrementar el nÃºmero de becas de posgrado ot...','356');
document.getElementById('pnd_linea').options['2']=new Option('3.5.2.2 Fortalecer el Sistema Nacional de Investigadores (SN...','357');
document.getElementById('pnd_linea').options['3']=new Option('3.5.2.3 Fomentar la calidad de la formaciÃ³n impartida...','358');
document.getElementById('pnd_linea').options['4']=new Option('3.5.2.4 Apoyar a los grupos de investigaciÃ³n existent...','359');
document.getElementById('pnd_linea').options['5']=new Option('3.5.2.5 Ampliar la cooperaciÃ³n internacional en temas...','360');
document.getElementById('pnd_linea').options['6']=new Option('3.5.2.6 Promover la participaciÃ³n de estudiantes e in...','361');
document.getElementById('pnd_linea').options['7']=new Option('3.5.2.7 Incentivar la participaciÃ³n de MÃ©xico ...','362');
break;
case "64":
document.getElementById('pnd_linea').options['1']=new Option('3.5.3.1 DiseÃ±ar polÃ­ticas pÃºblicas dife...','363');
document.getElementById('pnd_linea').options['2']=new Option('3.5.3.2 Fomentar la formaciÃ³n de recursos humanos de ...','364');
document.getElementById('pnd_linea').options['3']=new Option('3.5.3.3 Apoyar al establecimiento de ecosistemas cient&iacut...','365');
document.getElementById('pnd_linea').options['4']=new Option('3.5.3.4 Incrementar la inversiÃ³n en CTI a nivel estat...','366');
break;
case "65":
document.getElementById('pnd_linea').options['1']=new Option('3.5.4.1 Apoyar los proyectos cientÃ­ficos y tecnol&oac...','367');
document.getElementById('pnd_linea').options['2']=new Option('3.5.4.2 Promover la vinculaciÃ³n entre las institucion...','368');
document.getElementById('pnd_linea').options['3']=new Option('3.5.4.3 Desarrollar programas especÃ­ficos de fomento ...','369');
document.getElementById('pnd_linea').options['4']=new Option('3.5.4.4 Promover el desarrollo emprendedor de las institucio...','370');
document.getElementById('pnd_linea').options['5']=new Option('3.5.4.5 Incentivar, impulsar y simplificar el registro de la...','371');
document.getElementById('pnd_linea').options['6']=new Option('3.5.4.6 Propiciar la generaciÃ³n de pequeÃ±as em...','372');
document.getElementById('pnd_linea').options['7']=new Option('3.5.4.7 Impulsar el registro de patentes para incentivar la ...','373');
break;
case "66":
document.getElementById('pnd_linea').options['1']=new Option('3.5.5.1 Apoyar el incremento de infraestructura en el sistem...','374');
document.getElementById('pnd_linea').options['2']=new Option('3.5.5.2 Fortalecer la infraestructura de las instituciones p...','375');
document.getElementById('pnd_linea').options['3']=new Option('3.5.5.3 Extender y mejorar los canales de comunicaciÃ³...','376');
document.getElementById('pnd_linea').options['4']=new Option('3.5.5.4 Gestionar los convenios y acuerdos necesarios para f...','377');
break;
case "67":
document.getElementById('pnd_linea').options['1']=new Option('3.I.1 Enfocar el esfuerzo educativo y de capacitaciÃ³n...','378');
document.getElementById('pnd_linea').options['2']=new Option('3.I.2 Coordinar los esfuerzos de polÃ­tica social y at...','379');
document.getElementById('pnd_linea').options['3']=new Option('3.I.3 Ampliar y mejorar la colaboraciÃ³n y coordinaci&...','380');
document.getElementById('pnd_linea').options['4']=new Option('3.I.4 DiseÃ±ar e impulsar, junto con los distintos &oa...','381');
document.getElementById('pnd_linea').options['5']=new Option('3.I.5 Ampliar la jornada escolar para ofrecer mÃ¡s y m...','382');
document.getElementById('pnd_linea').options['6']=new Option('3.I.6 Fomentar la adquisiciÃ³n de capacidades bÃ¡...','383');
document.getElementById('pnd_linea').options['7']=new Option('3.I.7 Fomentar la certificaciÃ³n de competencias labor...','384');
document.getElementById('pnd_linea').options['8']=new Option('3.I.8 Apoyar los programas de becas dirigidos a favorecer la...','385');
document.getElementById('pnd_linea').options['9']=new Option('3.I.9 Fortalecer las capacidades institucionales de vinculac...','386');
document.getElementById('pnd_linea').options['10']=new Option('3.I.10 Impulsar el establecimiento de consejos institucional...','387');
document.getElementById('pnd_linea').options['11']=new Option('3.I.11 Incrementar la inversiÃ³n pÃºblica y prom...','388');
document.getElementById('pnd_linea').options['12']=new Option('3.I.12 Establecer un sistema de seguimiento de egresados del...','389');
document.getElementById('pnd_linea').options['13']=new Option('3.I.13 Impulsar la creaciÃ³n de carreras, licenciatura...','390');
break;
case "68":
document.getElementById('pnd_linea').options['1']=new Option('3.II.1 Operar un Sistema de InformaciÃ³n y Gesti&oacut...','391');
document.getElementById('pnd_linea').options['2']=new Option('3.II.2 Conformar un Sistema Nacional de PlaneaciÃ³n qu...','392');
document.getElementById('pnd_linea').options['3']=new Option('3.II.3 Avanzar en la conformaciÃ³n de un Sistema Integ...','393');
document.getElementById('pnd_linea').options['4']=new Option('3.II.4 Fortalecer los mecanismos, instrumentos y prÃ¡c...','394');
document.getElementById('pnd_linea').options['5']=new Option('3.II.5 Actualizar el marco normativo general que rige la vid...','395');
document.getElementById('pnd_linea').options['6']=new Option('3.II.6 Definir estÃ¡ndares de gestiÃ³n escolar p...','396');
document.getElementById('pnd_linea').options['7']=new Option('3.II.7 Actualizar la normatividad para el ingreso y permanen...','397');
document.getElementById('pnd_linea').options['8']=new Option('3.II.8 Revisar de manera integral en los Ã¡mbitos fede...','398');
document.getElementById('pnd_linea').options['9']=new Option('3.II.9 Contar con un sistema Ãºnico para el control es...','399');
break;
case "69":
document.getElementById('pnd_linea').options['1']=new Option('3.III.1 Impulsar en todos los niveles, particularmente en la...','400');
document.getElementById('pnd_linea').options['2']=new Option('3.III.2 Fomentar que los planes de estudio de todos los nive...','401');
document.getElementById('pnd_linea').options['3']=new Option('3.III.3 Incentivar la participaciÃ³n de las mujeres en...','402');
document.getElementById('pnd_linea').options['4']=new Option('3.III.4 Fortalecer los mecanismos de seguimiento para impuls...','403');
document.getElementById('pnd_linea').options['5']=new Option('3.III.5 Robustecer la participaciÃ³n de las niÃ±...','404');
document.getElementById('pnd_linea').options['6']=new Option('3.III.6 Promover la participaciÃ³n equitativa de las m...','405');
break;
case "70":
document.getElementById('pnd_linea').options['1']=new Option('4.1.1.1 DiseÃ±ar una polÃ­tica hacendaria integr...','406');
document.getElementById('pnd_linea').options['2']=new Option('4.1.1.2 Reducir la vulnerabilidad de las finanzas pÃºb...','407');
document.getElementById('pnd_linea').options['3']=new Option('4.1.1.3 Fortalecer y, en su caso, establecer fondos o instru...','408');
document.getElementById('pnd_linea').options['4']=new Option('4.1.1.4 Administrar la deuda pÃºblica para propiciar d...','409');
document.getElementById('pnd_linea').options['5']=new Option('4.1.1.5 Fomentar la adecuaciÃ³n del marco normativo en...','410');
document.getElementById('pnd_linea').options['6']=new Option('4.1.1.6 Promover un saneamiento de las finanzas de las entid...','411');
document.getElementById('pnd_linea').options['7']=new Option('4.1.1.7 Desincorporar del Gobierno Federal las entidades par...','412');
break;
case "71":
document.getElementById('pnd_linea').options['1']=new Option('4.1.2.1 Incrementar la capacidad financiera del Estado Mexic...','413');
document.getElementById('pnd_linea').options['2']=new Option('4.1.2.2 Hacer mÃ¡s equitativa la estructura impositiva...','414');
document.getElementById('pnd_linea').options['3']=new Option('4.1.2.3 Adecuar el marco legal en materia fiscal de manera e...','415');
document.getElementById('pnd_linea').options['4']=new Option('4.1.2.4 Revisar el marco del federalismo fiscal para fortale...','416');
document.getElementById('pnd_linea').options['5']=new Option('4.1.2.5 Promover una nueva cultura contributiva respecto de ...','417');
break;
case "72":
document.getElementById('pnd_linea').options['1']=new Option('4.1.3.1 Consolidar un Sistema de EvaluaciÃ³n del Desem...','418');
document.getElementById('pnd_linea').options['2']=new Option('4.1.3.2 Modernizar el sistema de contabilidad gubernamental....','419');
document.getElementById('pnd_linea').options['3']=new Option('4.1.3.3 Moderar el gasto en servicios personales al tiempo q...','420');
document.getElementById('pnd_linea').options['4']=new Option('4.1.3.4 Procurar la contenciÃ³n de erogaciones corresp...','421');
break;
case "73":
document.getElementById('pnd_linea').options['1']=new Option('4.2.1.1 Realizar las reformas necesarias al marco legal y re...','422');
document.getElementById('pnd_linea').options['2']=new Option('4.2.1.2 Fomentar la entrada de nuevos participantes en el si...','423');
document.getElementById('pnd_linea').options['3']=new Option('4.2.1.3 Promover la competencia efectiva entre los participa...','424');
document.getElementById('pnd_linea').options['4']=new Option('4.2.1.4 Facilitar la transferencia de garantÃ­as credi...','425');
document.getElementById('pnd_linea').options['5']=new Option('4.2.1.5 Incentivar la portabilidad de operaciones entre inst...','426');
document.getElementById('pnd_linea').options['6']=new Option('4.2.1.6 Favorecer la coordinaciÃ³n entre autoridades p...','427');
document.getElementById('pnd_linea').options['7']=new Option('4.2.1.7 Promover que las autoridades del sector financiero r...','428');
break;
case "74":
document.getElementById('pnd_linea').options['1']=new Option('4.2.2.1 Robustecer la relaciÃ³n entre la Banca de Desa...','429');
document.getElementById('pnd_linea').options['2']=new Option('4.2.2.2 Fortalecer la incorporaciÃ³n de educaciÃ³...','430');
document.getElementById('pnd_linea').options['3']=new Option('4.2.2.3 Fortalecer el sistema de garantÃ­as para aumen...','431');
document.getElementById('pnd_linea').options['4']=new Option('4.2.2.4 Promover el acceso y uso responsable de productos y ...','432');
break;
case "75":
document.getElementById('pnd_linea').options['1']=new Option('4.2.3.1 Mantener un seguimiento continuo al desarrollo de po...','433');
document.getElementById('pnd_linea').options['2']=new Option('4.2.3.2 Establecer y perfeccionar las normas prudenciales y ...','434');
break;
case "76":
document.getElementById('pnd_linea').options['1']=new Option('4.2.4.1 Redefinir el mandato de la Banca de Desarrollo para ...','435');
document.getElementById('pnd_linea').options['2']=new Option('4.2.4.2 Desarrollar capacidades tÃ©cnicas, dotar de fl...','436');
document.getElementById('pnd_linea').options['3']=new Option('4.2.4.3 Promover la participaciÃ³n de la banca comerci...','437');
document.getElementById('pnd_linea').options['4']=new Option('4.2.4.4 Gestionar eficientemente el capital dentro y entre l...','438');
break;
case "77":
document.getElementById('pnd_linea').options['1']=new Option('4.2.5.1 Apoyar el desarrollo de infraestructura con una visi...','439');
document.getElementById('pnd_linea').options['2']=new Option('4.2.5.2 Fomentar el desarrollo de relaciones de largo plazo ...','440');
document.getElementById('pnd_linea').options['3']=new Option('4.2.5.3 Priorizar los proyectos con base en su rentabilidad ...','441');
document.getElementById('pnd_linea').options['4']=new Option('4.2.5.4 Consolidar instrumentos de financiamiento flexibles ...','442');
document.getElementById('pnd_linea').options['5']=new Option('4.2.5.5 Complementar el financiamiento de proyectos con alta...','443');
document.getElementById('pnd_linea').options['6']=new Option('4.2.5.6 Promover el desarrollo del mercado de capitales para...','444');
break;
case "78":
document.getElementById('pnd_linea').options['1']=new Option('4.3.1.1 Privilegiar la conciliaciÃ³n para evitar confl...','445');
document.getElementById('pnd_linea').options['2']=new Option('4.3.1.2 Mejorar la conciliaciÃ³n, procuraciÃ³n e...','446');
document.getElementById('pnd_linea').options['3']=new Option('4.3.1.3 Garantizar certeza jurÃ­dica para todas las pa...','447');
break;
case "79":
document.getElementById('pnd_linea').options['1']=new Option('4.3.2.1 Impulsar acciones para la adopciÃ³n de una cul...','448');
document.getElementById('pnd_linea').options['2']=new Option('4.3.2.2 Promover el respeto de los derechos humanos, laboral...','449');
document.getElementById('pnd_linea').options['3']=new Option('4.3.2.3 Fomentar la recuperaciÃ³n del poder adquisitiv...','450');
document.getElementById('pnd_linea').options['4']=new Option('4.3.2.4 Contribuir a la erradicaciÃ³n del trabajo infa...','451');
break;
case "80":
document.getElementById('pnd_linea').options['1']=new Option('4.3.3.1 Fortalecer los mecanismos de consejerÃ­a, vinc...','452');
document.getElementById('pnd_linea').options['2']=new Option('4.3.3.2 Consolidar las polÃ­ticas activas de capacitac...','453');
document.getElementById('pnd_linea').options['3']=new Option('4.3.3.3 Impulsar, de manera focalizada, el autoempleo en la ...','454');
document.getElementById('pnd_linea').options['4']=new Option('4.3.3.4 Fomentar el incremento de la productividad laboral c...','455');
document.getElementById('pnd_linea').options['5']=new Option('4.3.3.5 Promover la pertinencia educativa, la generaci&oacut...','456');
break;
case "81":
document.getElementById('pnd_linea').options['1']=new Option('4.3.4.1 Tutelar los derechos laborales individuales y colect...','457');
document.getElementById('pnd_linea').options['2']=new Option('4.3.4.2 Otorgar crÃ©ditos accesibles y sostenibles a l...','458');
document.getElementById('pnd_linea').options['3']=new Option('4.3.4.3 DiseÃ±ar el proyecto del Seguro de Desempleo y...','459');
document.getElementById('pnd_linea').options['4']=new Option('4.3.4.4 Fortalecer y ampliar la cobertura inspectiva en mate...','460');
document.getElementById('pnd_linea').options['5']=new Option('4.3.4.5 Promover la participaciÃ³n de las organizacion...','461');
document.getElementById('pnd_linea').options['6']=new Option('4.3.4.6 Promover la protecciÃ³n de los derechos de los...','462');
break;
case "82":
document.getElementById('pnd_linea').options['1']=new Option('4.4.1.1 Alinear y coordinar programas federales, e inducir a...','463');
document.getElementById('pnd_linea').options['2']=new Option('4.4.1.2 Actualizar y alinear la legislaciÃ³n ambiental...','464');
document.getElementById('pnd_linea').options['3']=new Option('4.4.1.3 Promover el uso y consumo de productos amigables con...','465');
document.getElementById('pnd_linea').options['4']=new Option('4.4.1.4 Establecer una polÃ­tica fiscal que fomente la...','466');
document.getElementById('pnd_linea').options['5']=new Option('4.4.1.5 Promover esquemas de financiamiento e inversiones de...','467');
document.getElementById('pnd_linea').options['6']=new Option('4.4.1.6 Impulsar la planeaciÃ³n integral del territori...','468');
document.getElementById('pnd_linea').options['7']=new Option('4.4.1.7 Impulsar una polÃ­tica en mares y costas que p...','469');
document.getElementById('pnd_linea').options['8']=new Option('4.4.1.8 Orientar y fortalecer los sistemas de informaci&oacu...','470');
document.getElementById('pnd_linea').options['9']=new Option('4.4.1.9 Colaborar con organizaciones de la sociedad civil en...','471');
break;
case "83":
document.getElementById('pnd_linea').options['1']=new Option('4.4.2.1 Asegurar agua suficiente y de calidad adecuada para ...','472');
document.getElementById('pnd_linea').options['2']=new Option('4.4.2.2 Ordenar el uso y aprovechamiento del agua en cuencas...','473');
document.getElementById('pnd_linea').options['3']=new Option('4.4.2.3 Incrementar la cobertura y mejorar la calidad de los...','474');
document.getElementById('pnd_linea').options['4']=new Option('4.4.2.4 Sanear las aguas residuales con un enfoque integral ...','475');
document.getElementById('pnd_linea').options['5']=new Option('4.4.2.5 Fortalecer el desarrollo y la capacidad tÃ©cni...','476');
document.getElementById('pnd_linea').options['6']=new Option('4.4.2.6 Fortalecer el marco jurÃ­dico para el sector d...','477');
document.getElementById('pnd_linea').options['7']=new Option('4.4.2.7 Reducir los riesgos de fenÃ³menos meteorol&oac...','478');
document.getElementById('pnd_linea').options['8']=new Option('4.4.2.8 Rehabilitar y ampliar la infraestructura hidroagr&ia...','479');
break;
case "84":
document.getElementById('pnd_linea').options['1']=new Option('4.4.3.1 Ampliar la cobertura de infraestructura y programas ...','480');
document.getElementById('pnd_linea').options['2']=new Option('4.4.3.2 Desarrollar las instituciones e instrumentos de pol&...','481');
document.getElementById('pnd_linea').options['3']=new Option('4.4.3.3 Acelerar el trÃ¡nsito hacia un desarrollo bajo...','482');
document.getElementById('pnd_linea').options['4']=new Option('4.4.3.4 Promover el uso de sistemas y tecnologÃ­as ava...','483');
document.getElementById('pnd_linea').options['5']=new Option('4.4.3.5 Impulsar y fortalecer la cooperaciÃ³n regional...','484');
document.getElementById('pnd_linea').options['6']=new Option('4.4.3.6 Lograr un manejo integral de residuos sÃ³lidos...','485');
document.getElementById('pnd_linea').options['7']=new Option('4.4.3.7 Realizar investigaciÃ³n cientÃ­fica y te...','486');
document.getElementById('pnd_linea').options['8']=new Option('4.4.3.8 Lograr el ordenamiento ecolÃ³gico del territor...','487');
document.getElementById('pnd_linea').options['9']=new Option('4.4.3.9 Continuar con la incorporaciÃ³n de criterios d...','488');
document.getElementById('pnd_linea').options['10']=new Option('4.4.3.10 Contribuir a mejorar la calidad del aire, y reducir...','489');
document.getElementById('pnd_linea').options['11']=new Option('4.4.3.11 Lograr un mejor monitoreo de la calidad del aire me...','490');
break;
case "85":
document.getElementById('pnd_linea').options['1']=new Option('4.4.4.1 Promover la generaciÃ³n de recursos y benefici...','491');
document.getElementById('pnd_linea').options['2']=new Option('4.4.4.2 Impulsar e incentivar la incorporaciÃ³n de sup...','492');
document.getElementById('pnd_linea').options['3']=new Option('4.4.4.3 Promover el consumo de bienes y servicios ambientale...','493');
document.getElementById('pnd_linea').options['4']=new Option('4.4.4.4 Fortalecer el capital social y las capacidades de ge...','494');
document.getElementById('pnd_linea').options['5']=new Option('4.4.4.5 Incrementar la superficie del territorio nacional ba...','495');
document.getElementById('pnd_linea').options['6']=new Option('4.4.4.6 Focalizar los programas de conservaciÃ³n de la...','496');
document.getElementById('pnd_linea').options['7']=new Option('4.4.4.7 Promover el conocimiento y la conservaciÃ³n de...','497');
document.getElementById('pnd_linea').options['8']=new Option('4.4.4.8 Fortalecer los mecanismos e instrumentos para preven...','498');
document.getElementById('pnd_linea').options['9']=new Option('4.4.4.9 Mejorar los esquemas e instrumentos de reforestaci&o...','499');
document.getElementById('pnd_linea').options['10']=new Option('4.4.4.10 Recuperar los ecosistemas y zonas deterioradas para...','500');
document.getElementById('pnd_linea').options['11']=new Option('4.4.4.11 Recuperar los ecosistemas y zonas deterioradas para...','501');
break;
case "86":
document.getElementById('pnd_linea').options['1']=new Option('4.5.1.1 Crear una red nacional de centros comunitarios de ca...','502');
document.getElementById('pnd_linea').options['2']=new Option('4.5.1.2 Promover mayor oferta de los servicios de telecomuni...','503');
document.getElementById('pnd_linea').options['3']=new Option('4.5.1.3 Crear un programa de banda ancha que establezca los ...','504');
document.getElementById('pnd_linea').options['4']=new Option('4.5.1.4 Continuar y ampliar la CampaÃ±a Nacional de In...','505');
document.getElementById('pnd_linea').options['5']=new Option('4.5.1.5 Crear un programa de trabajo para dar cabal cumplimi...','506');
document.getElementById('pnd_linea').options['6']=new Option('4.5.1.6 Aumentar el uso del Internet mediante el desarrollo ...','507');
document.getElementById('pnd_linea').options['7']=new Option('4.5.1.7 Promover la competencia en la televisiÃ³n abie...','508');
document.getElementById('pnd_linea').options['8']=new Option('4.5.1.8 Fomentar el uso Ã³ptimo de las bandas de 700 M...','509');
document.getElementById('pnd_linea').options['9']=new Option('4.5.1.9 Impulsar la adecuaciÃ³n del marco regulatorio ...','510');
document.getElementById('pnd_linea').options['10']=new Option('4.5.1.10 Promover participaciones pÃºblico-privadas en...','511');
document.getElementById('pnd_linea').options['11']=new Option('4.5.1.11 Desarrollar e implementar un sistema espacial de al...','512');
document.getElementById('pnd_linea').options['12']=new Option('4.5.1.12 Desarrollar e implementar la infraestructura espaci...','513');
document.getElementById('pnd_linea').options['13']=new Option('4.5.1.13 Contribuir a la modernizaciÃ³n del transporte...','514');
break;
case "87":
document.getElementById('pnd_linea').options['1']=new Option('4.6.1.1 Promover la modificaciÃ³n del marco institucio...','515');
document.getElementById('pnd_linea').options['2']=new Option('4.6.1.2 Fortalecer la capacidad de ejecuciÃ³n de Petr&...','516');
document.getElementById('pnd_linea').options['3']=new Option('4.6.1.3 Incrementar las reservas y tasas de restituciÃ³...','517');
document.getElementById('pnd_linea').options['4']=new Option('4.6.1.4 Elevar el Ã­ndice de recuperaciÃ³n y la ...','518');
document.getElementById('pnd_linea').options['5']=new Option('4.6.1.5 Fortalecer el mercado de gas natural mediante el inc...','519');
document.getElementById('pnd_linea').options['6']=new Option('4.6.1.6 Incrementar la capacidad y rentabilidad de las activ...','520');
document.getElementById('pnd_linea').options['7']=new Option('4.6.1.7 Promover el desarrollo de una industria petroqu&iacu...','521');
break;
case "88":
document.getElementById('pnd_linea').options['1']=new Option('4.6.2.1 Impulsar la reducciÃ³n de costos en la generac...','522');
document.getElementById('pnd_linea').options['2']=new Option('4.6.2.2 Homologar las condiciones de suministro de energ&iac...','523');
document.getElementById('pnd_linea').options['3']=new Option('4.6.2.3 Diversificar la composiciÃ³n del parque de gen...','524');
document.getElementById('pnd_linea').options['4']=new Option('4.6.2.4 Modernizar la red de transmisiÃ³n y distribuci...','525');
document.getElementById('pnd_linea').options['5']=new Option('4.6.2.5 Promover el uso eficiente de la energÃ­a, as&i...','526');
document.getElementById('pnd_linea').options['6']=new Option('4.6.2.6 Promover la formaciÃ³n de nuevos recursos huma...','527');
break;
case "89":
document.getElementById('pnd_linea').options['1']=new Option('4.7.1.1 Aplicar eficazmente la legislaciÃ³n en materia...','528');
document.getElementById('pnd_linea').options['2']=new Option('4.7.1.2 Impulsar marcos regulatorios que favorezcan la compe...','529');
document.getElementById('pnd_linea').options['3']=new Option('4.7.1.3 Desarrollar las normas que fortalezcan la calidad de...','530');
break;
case "90":
document.getElementById('pnd_linea').options['1']=new Option('4.7.2.1 Fortalecer la convergencia de la FederaciÃ³n c...','531');
document.getElementById('pnd_linea').options['2']=new Option('4.7.2.2 Consolidar mecanismos que fomenten la cooperaci&oacu...','532');
break;
case "91":
document.getElementById('pnd_linea').options['1']=new Option('4.7.3.1 Mejorar el sistema para emitir de forma eficiente no...','533');
document.getElementById('pnd_linea').options['2']=new Option('4.7.3.2 Construir un mecanismo autosostenible de elaboraci&o...','534');
document.getElementById('pnd_linea').options['3']=new Option('4.7.3.3 Impulsar conjuntamente con los sectores productivos ...','535');
document.getElementById('pnd_linea').options['4']=new Option('4.7.3.4 Transformar las normas, y su evaluaciÃ³n, de b...','536');
document.getElementById('pnd_linea').options['5']=new Option('4.7.3.5 Desarrollar eficazmente los mecanismos, sistemas e i...','537');
document.getElementById('pnd_linea').options['6']=new Option('4.7.3.6 Promover las reformas legales que permitan la eficaz...','538');
break;
case "92":
document.getElementById('pnd_linea').options['1']=new Option('4.7.4.1 Mejorar el rÃ©gimen jurÃ­dico aplicable ...','539');
document.getElementById('pnd_linea').options['2']=new Option('4.7.4.2 Identificar inhibidores u obstÃ¡culos, sectori...','540');
document.getElementById('pnd_linea').options['3']=new Option('4.7.4.3 Fortalecer los instrumentos estadÃ­sticos en m...','541');
document.getElementById('pnd_linea').options['4']=new Option('4.7.4.4 DiseÃ±ar e implementar una estrategia integral...','542');
break;
case "93":
document.getElementById('pnd_linea').options['1']=new Option('4.7.5.1 Modernizar los sistemas de atenciÃ³n y procura...','543');
document.getElementById('pnd_linea').options['2']=new Option('4.7.5.2 Desarrollar el Sistema Nacional de ProtecciÃ³n...','544');
document.getElementById('pnd_linea').options['3']=new Option('4.7.5.3 Fortalecer la Red inteligente de AtenciÃ³n al ...','545');
document.getElementById('pnd_linea').options['4']=new Option('4.7.5.4 Establecer el Acuerdo Nacional para la Protecci&oacu...','546');
break;
case "94":
document.getElementById('pnd_linea').options['1']=new Option('4.8.1.1 Implementar una polÃ­tica de fomento econ&oacu...','547');
document.getElementById('pnd_linea').options['2']=new Option('4.8.1.2 Articular, bajo una Ã³ptica transversal, secto...','548');
break;
case "95":
document.getElementById('pnd_linea').options['1']=new Option('4.8.2.1 Fomentar el incremento de la inversiÃ³n en el ...','549');
document.getElementById('pnd_linea').options['2']=new Option('4.8.2.2 Procurar el aumento del financiamiento en el sector ...','550');
document.getElementById('pnd_linea').options['3']=new Option('4.8.2.3 Asesorar a las pequeÃ±as y medianas empresas e...','551');
break;
case "96":
document.getElementById('pnd_linea').options['1']=new Option('4.8.3.1 Promover las contrataciones del sector pÃºblic...','552');
document.getElementById('pnd_linea').options['2']=new Option('4.8.3.2 Implementar esquemas de compras pÃºblicas estr...','553');
document.getElementById('pnd_linea').options['3']=new Option('4.8.3.3 Promover la innovaciÃ³n a travÃ©s de la ...','554');
document.getElementById('pnd_linea').options['4']=new Option('4.8.3.4 Incrementar el aprovechamiento de las reservas de co...','555');
document.getElementById('pnd_linea').options['5']=new Option('4.8.3.5 Desarrollar un sistema de compensaciones industriale...','556');
document.getElementById('pnd_linea').options['6']=new Option('4.8.3.6 Fortalecer los mecanismos para asegurar que las comp...','557');
break;
case "97":
document.getElementById('pnd_linea').options['1']=new Option('4.8.4.1 Apoyar la inserciÃ³n exitosa de las micro, peq...','558');
document.getElementById('pnd_linea').options['2']=new Option('4.8.4.2 Impulsar la actividad emprendedora mediante la gener...','559');
document.getElementById('pnd_linea').options['3']=new Option('4.8.4.3 DiseÃ±ar e implementar un sistema de informaci...','560');
document.getElementById('pnd_linea').options['4']=new Option('4.8.4.4 Impulsar programas que desarrollen capacidades inten...','561');
document.getElementById('pnd_linea').options['5']=new Option('4.8.4.5 Mejorar los servicios de asesorÃ­a tÃ©cn...','562');
document.getElementById('pnd_linea').options['6']=new Option('4.8.4.6 Facilitar el acceso a financiamiento y capital para ...','563');
document.getElementById('pnd_linea').options['7']=new Option('4.8.4.7 Crear vocaciones emprendedoras desde temprana edad p...','564');
document.getElementById('pnd_linea').options['8']=new Option('4.8.4.8 Apoyar el escalamiento empresarial de las micro, peq...','565');
document.getElementById('pnd_linea').options['9']=new Option('4.8.4.9 Incrementar la participaciÃ³n de micro, peque&...','566');
document.getElementById('pnd_linea').options['10']=new Option('4.8.4.10 Fomentar los proyectos de los emprendedores sociale...','567');
document.getElementById('pnd_linea').options['11']=new Option('4.8.4.11 Impulsar la creaciÃ³n de ocupaciones a trav&e...','568');
document.getElementById('pnd_linea').options['12']=new Option('4.8.4.12 Fomentar la creaciÃ³n y sostenibilidad de las...','569');
break;
case "98":
document.getElementById('pnd_linea').options['1']=new Option('4.8.5.1 Realizar la promociÃ³n, visibilizaciÃ³n,...','570');
document.getElementById('pnd_linea').options['2']=new Option('4.8.5.2 Fortalecer las capacidades tÃ©cnicas, administ...','571');
break;
case "99":
document.getElementById('pnd_linea').options['1']=new Option('4.9.1.1 Fomentar que la construcciÃ³n de nueva infraes...','572');
document.getElementById('pnd_linea').options['2']=new Option('4.9.1.2 Evaluar las necesidades de infraestructura a largo p...','573');
document.getElementById('pnd_linea').options['3']=new Option('4.9.1.3 Consolidar y/o modernizar los ejes troncales transve...','574');
document.getElementById('pnd_linea').options['4']=new Option('4.9.1.4 Mejorar y modernizar la red de caminos rurales y ali...','575');
document.getElementById('pnd_linea').options['5']=new Option('4.9.1.5 Conservar y mantener en buenas condiciones los camin...','576');
document.getElementById('pnd_linea').options['6']=new Option('4.9.1.6 Modernizar las carreteras interestatales. (SECTOR CA...','577');
document.getElementById('pnd_linea').options['7']=new Option('4.9.1.7 Llevar a cabo la construcciÃ³n de libramientos...','578');
document.getElementById('pnd_linea').options['8']=new Option('4.9.1.8 Ampliar y construir tramos carreteros mediante nuevo...','579');
document.getElementById('pnd_linea').options['9']=new Option('4.9.1.9 Realizar obras de conexiÃ³n y accesos a nodos ...','580');
document.getElementById('pnd_linea').options['10']=new Option('4.9.1.10 Garantizar una mayor seguridad en las vÃ­as d...','581');
document.getElementById('pnd_linea').options['11']=new Option('4.9.1.11 Construir nuevos tramos ferroviarios, libramientos,...','582');
document.getElementById('pnd_linea').options['12']=new Option('4.9.1.12 Vigilar los programas de conservaciÃ³n y mode...','583');
document.getElementById('pnd_linea').options['13']=new Option('4.9.1.13 Promover el establecimiento de un programa integral...','584');
document.getElementById('pnd_linea').options['14']=new Option('4.9.1.14 Mejorar la movilidad de las ciudades mediante siste...','585');
document.getElementById('pnd_linea').options['15']=new Option('4.9.1.15 Fomentar el uso del transporte pÃºblico masiv...','586');
document.getElementById('pnd_linea').options['16']=new Option('4.9.1.16 Fomentar el desarrollo de puertos marÃ­timos ...','587');
document.getElementById('pnd_linea').options['17']=new Option('4.9.1.17 Mejorar la conectividad ferroviaria y carretera del...','588');
document.getElementById('pnd_linea').options['18']=new Option('4.9.1.18 Generar condiciones que permitan la logÃ­stic...','589');
document.getElementById('pnd_linea').options['19']=new Option('4.9.1.19 Ampliar la capacidad instalada de los puertos, prin...','590');
document.getElementById('pnd_linea').options['20']=new Option('4.9.1.20 Reducir los tiempos para el trÃ¡nsito de carg...','591');
document.getElementById('pnd_linea').options['21']=new Option('4.9.1.21 Agilizar la tramitologÃ­a aduanal y fiscal en...','592');
document.getElementById('pnd_linea').options['22']=new Option('4.9.1.22 Incentivar el relanzamiento de la marina mercante m...','593');
document.getElementById('pnd_linea').options['23']=new Option('4.9.1.23 Fomentar el desarrollo del cabotaje y el transporte...','594');
document.getElementById('pnd_linea').options['24']=new Option('4.9.1.24 Dar una respuesta de largo plazo a la demanda creci...','595');
document.getElementById('pnd_linea').options['25']=new Option('4.9.1.25 Desarrollar los aeropuertos regionales y mejorar su...','596');
document.getElementById('pnd_linea').options['26']=new Option('4.9.1.26 Supervisar el desempeÃ±o de las aerolÃ­...','597');
document.getElementById('pnd_linea').options['27']=new Option('4.9.1.27 Promover la certificaciÃ³n de aeropuertos con...','598');
document.getElementById('pnd_linea').options['28']=new Option('4.9.1.28 Continuar con el programa de formalizacÃ³n de...','599');
document.getElementById('pnd_linea').options['29']=new Option('4.9.1.29 Continuar con la elaboraciÃ³n de normas b&aac...','600');
document.getElementById('pnd_linea').options['30']=new Option('4.9.1.30 Dar certidumbre a la inversiÃ³n en el sector ...','601');
break;
case "100":
document.getElementById('pnd_linea').options['1']=new Option('4.10.1.1 Orientar la investigaciÃ³n y desarrollo tecno...','602');
document.getElementById('pnd_linea').options['2']=new Option('4.10.1.2 Desarrollar las capacidades productivas con visi&oa...','603');
document.getElementById('pnd_linea').options['3']=new Option('4.10.1.3 Impulsar la capitalizaciÃ³n de las unidades p...','604');
document.getElementById('pnd_linea').options['4']=new Option('4.10.1.4 Fomentar el financiamiento oportuno y competitivo....','605');
document.getElementById('pnd_linea').options['5']=new Option('4.10.1.5 Impulsar una polÃ­tica comercial con enfoque ...','606');
document.getElementById('pnd_linea').options['6']=new Option('4.10.1.6 Apoyar la producciÃ³n y el ingreso de los cam...','607');
document.getElementById('pnd_linea').options['7']=new Option('4.10.1.7 Fomentar la productividad en el sector agroalimenta...','608');
document.getElementById('pnd_linea').options['8']=new Option('4.10.1.8 Impulsar la competitividad logÃ­stica para mi...','609');
document.getElementById('pnd_linea').options['9']=new Option('4.10.1.9 Promover el desarrollo de las capacidades productiv...','610');
break;
case "101":
document.getElementById('pnd_linea').options['1']=new Option('4.10.1.1 Promover el desarrollo de conglomerados productivos...','611');
document.getElementById('pnd_linea').options['2']=new Option('4.10.1.2 Instrumentar nuevos modelos de agronegocios que gen...','612');
document.getElementById('pnd_linea').options['3']=new Option('4.10.1.3 Impulsar, en coordinaciÃ³n con los diversos &...','613');
break;
case "102":
document.getElementById('pnd_linea').options['1']=new Option('4.10.3.1 DiseÃ±ar y establecer un mecanismo integral d...','614');
document.getElementById('pnd_linea').options['2']=new Option('4.10.3.2 Priorizar y fortalecer la sanidad e inocuidad agroa...','615');
break;
case "103":
document.getElementById('pnd_linea').options['1']=new Option('4.10.4.1 Promover la tecnificaciÃ³n del riego y optimi...','616');
document.getElementById('pnd_linea').options['2']=new Option('4.10.4.2 Impulsar prÃ¡cticas sustentables en las activ...','617');
document.getElementById('pnd_linea').options['3']=new Option('4.10.4.3 Establecer instrumentos para rescatar, preservar y ...','618');
document.getElementById('pnd_linea').options['4']=new Option('4.10.4.4 Aprovechar el desarrollo de la biotecnologÃ­a...','619');
break;
case "104":
document.getElementById('pnd_linea').options['1']=new Option('4.10.5.1 Realizar una reingenierÃ­a organizacional y o...','620');
document.getElementById('pnd_linea').options['2']=new Option('4.10.5.2 Reorientar los programas para transitar de los subs...','621');
document.getElementById('pnd_linea').options['3']=new Option('4.10.5.3 Desregular, reorientar y simplificar el marco norma...','622');
document.getElementById('pnd_linea').options['4']=new Option('4.10.5.4 Fortalecer la coordinaciÃ³n interinstituciona...','623');
break;
case "105":
document.getElementById('pnd_linea').options['1']=new Option('4.11.1.1 Actualizar el marco normativo e institucional del s...','624');
document.getElementById('pnd_linea').options['2']=new Option('4.11.1.2 Promover la concurrencia de las acciones gubernamen...','625');
document.getElementById('pnd_linea').options['3']=new Option('4.11.1.3 Alinear la polÃ­tica turÃ­stica de las ...','626');
document.getElementById('pnd_linea').options['4']=new Option('4.11.1.4 Impulsar la transversalidad presupuestal y program&...','627');
break;
case "106":
document.getElementById('pnd_linea').options['1']=new Option('4.11.2.1 Fortalecer la investigaciÃ³n y generaci&oacut...','628');
document.getElementById('pnd_linea').options['2']=new Option('4.11.2.2 Fortalecer la infraestructura y la calidad de los s...','629');
document.getElementById('pnd_linea').options['3']=new Option('4.11.2.3 Diversificar e innovar la oferta de productos y con...','630');
document.getElementById('pnd_linea').options['4']=new Option('4.11.2.4 Posicionar adicionalmente a MÃ©xico como un d...','631');
document.getElementById('pnd_linea').options['5']=new Option('4.11.2.5 Concretar un Sistema Nacional de CertificaciÃ³...','632');
document.getElementById('pnd_linea').options['6']=new Option('4.11.2.6 Desarrollar agendas de competitividad por destinos....','633');
document.getElementById('pnd_linea').options['7']=new Option('4.11.2.7 Fomentar la colaboraciÃ³n y coordinaciÃ³...','634');
document.getElementById('pnd_linea').options['8']=new Option('4.11.2.8 Imprimir en el Programa Nacional de Infraestructura...','635');
break;
case "107":
document.getElementById('pnd_linea').options['1']=new Option('4.11.3.1 Fomentar y promover esquemas de financiamiento al s...','636');
document.getElementById('pnd_linea').options['2']=new Option('4.11.3.2 Incentivar las inversiones turÃ­sticas de las...','637');
document.getElementById('pnd_linea').options['3']=new Option('4.11.3.3 Promover en todas las dependencias gubernamentales ...','638');
document.getElementById('pnd_linea').options['4']=new Option('4.11.3.4 Elaborar un plan de conservaciÃ³n, consolidac...','639');
document.getElementById('pnd_linea').options['5']=new Option('4.11.3.5 DiseÃ±ar una estrategia integral de promoci&o...','640');
document.getElementById('pnd_linea').options['6']=new Option('4.11.3.6 Detonar el crecimiento del mercado interno a trav&e...','641');
break;
case "108":
document.getElementById('pnd_linea').options['1']=new Option('4.11.4.1 Crear instrumentos para que el turismo sea una indu...','642');
document.getElementById('pnd_linea').options['2']=new Option('4.11.4.2 Impulsar el cuidado y preservaciÃ³n del patri...','643');
document.getElementById('pnd_linea').options['3']=new Option('4.11.4.3 Convertir al turismo en fuente de bienestar social....','644');
document.getElementById('pnd_linea').options['4']=new Option('4.11.4.4 Crear programas para hacer accesible el turismo a t...','645');
document.getElementById('pnd_linea').options['5']=new Option('4.11.4.5 Promover el ordenamiento territorial, asÃ­ co...','646');
break;
case "109":
document.getElementById('pnd_linea').options['1']=new Option('4.I.1 Promover el desarrollo de productos financieros adecua...','647');
document.getElementById('pnd_linea').options['2']=new Option('4.I.2 Fomentar el acceso a crÃ©dito y servicios financ...','648');
document.getElementById('pnd_linea').options['3']=new Option('4.I.3 Garantizar el acceso a la energÃ­a elÃ©ctr...','649');
document.getElementById('pnd_linea').options['4']=new Option('4.I.4 Aumentar la cobertura de banda ancha en todo el pa&iac...','650');
document.getElementById('pnd_linea').options['5']=new Option('4.I.5 Impulsar la economÃ­a digital y fomentar el desa...','651');
document.getElementById('pnd_linea').options['6']=new Option('4.I.6 Fomentar y ampliar la inclusiÃ³n laboral, partic...','652');
document.getElementById('pnd_linea').options['7']=new Option('4.I.7 Promover permanentemente la mejora regulatoria que red...','653');
document.getElementById('pnd_linea').options['8']=new Option('4.I.8 Propiciar la disminuciÃ³n de los costos que enfr...','654');
document.getElementById('pnd_linea').options['9']=new Option('4.I.9 Desarrollar una infraestructura logÃ­stica que i...','655');
document.getElementById('pnd_linea').options['10']=new Option('4.I.10 Promover polÃ­ticas de desarrollo productivo ac...','656');
document.getElementById('pnd_linea').options['11']=new Option('4.I.11 Impulsar el desarrollo de la regiÃ³n Sur-Surest...','657');
document.getElementById('pnd_linea').options['12']=new Option('4.I.12 Revisar los programas gubernamentales para que no gen...','658');
break;
case "110":
document.getElementById('pnd_linea').options['1']=new Option('4.II.1 Modernizar la AdministraciÃ³n PÃºblica Fe...','659');
document.getElementById('pnd_linea').options['2']=new Option('4.II.2 Simplificar las disposiciones fiscales para mejorar e...','660');
document.getElementById('pnd_linea').options['3']=new Option('4.II.3 Fortalecer y modernizar el Registro PÃºblico de...','661');
document.getElementById('pnd_linea').options['4']=new Option('4.II.4 Garantizar la continuidad de la polÃ­tica de me...','662');
document.getElementById('pnd_linea').options['5']=new Option('4.II.5 Modernizar, formal e instrumentalmente, los esquemas ...','663');
document.getElementById('pnd_linea').options['6']=new Option('4.II.6 Realizar un eficaz combate a las prÃ¡cticas com...','664');
document.getElementById('pnd_linea').options['7']=new Option('4.II.7 Mejorar el sistema para emitir de forma eficiente nor...','665');
document.getElementById('pnd_linea').options['8']=new Option('4.II.8 Fortalecer las Normas Oficiales Mexicanas relacionada...','666');
document.getElementById('pnd_linea').options['9']=new Option('4.II.9 Combatir y castigar el delito ambiental, fortaleciend...','667');
break;
case "111":
document.getElementById('pnd_linea').options['1']=new Option('4.III.1 Promover la inclusiÃ³n de mujeres en los secto...','668');
document.getElementById('pnd_linea').options['2']=new Option('4.III.2 Desarrollar productos financieros que consideren la ...','669');
document.getElementById('pnd_linea').options['3']=new Option('4.III.3 Fortalecer la educaciÃ³n financiera de las muj...','670');
document.getElementById('pnd_linea').options['4']=new Option('4.III.4 Impulsar el empoderamiento econÃ³mico de las m...','671');
document.getElementById('pnd_linea').options['5']=new Option('4.III.5 Fomentar los esfuerzos de capacitaciÃ³n labora...','672');
document.getElementById('pnd_linea').options['6']=new Option('4.III.6 Impulsar la participaciÃ³n de las mujeres en e...','673');
document.getElementById('pnd_linea').options['7']=new Option('4.III.7 Desarrollar mecanismos de evaluaciÃ³n sobre el...','674');
break;
case "112":
document.getElementById('pnd_linea').options['1']=new Option('5.1.1.1 Ampliar y profundizar el diÃ¡logo bilateral co...','675');
document.getElementById('pnd_linea').options['2']=new Option('5.1.1.2 Impulsar la modernizaciÃ³n integral de la zona...','676');
document.getElementById('pnd_linea').options['3']=new Option('5.1.1.3 Reforzar las labores de atenciÃ³n a las comuni...','677');
document.getElementById('pnd_linea').options['4']=new Option('5.1.1.4 Consolidar la visiÃ³n de responsabilidad compa...','678');
document.getElementById('pnd_linea').options['5']=new Option('5.1.1.5 Fortalecer la relaciÃ³n bilateral con Canad&aa...','679');
document.getElementById('pnd_linea').options['6']=new Option('5.1.1.6 Apoyar los mecanismos y programas que prevÃ©n ...','680');
document.getElementById('pnd_linea').options['7']=new Option('5.1.1.7 Poner Ã©nfasis en el valor estratÃ©gico ...','681');
document.getElementById('pnd_linea').options['8']=new Option('5.1.1.8 Impulsar el diÃ¡logo polÃ­tico y t&eacut...','682');
break;
case "113":
document.getElementById('pnd_linea').options['1']=new Option('5.1.2.1 Fortalecer las relaciones diplomÃ¡ticas con to...','683');
document.getElementById('pnd_linea').options['2']=new Option('5.1.2.2 Apoyar, especialmente en el marco del Proyecto Mesoa...','684');
document.getElementById('pnd_linea').options['3']=new Option('5.1.2.3 Promover el desarrollo integral de la frontera sur c...','685');
document.getElementById('pnd_linea').options['4']=new Option('5.1.2.4 Identificar nuevas oportunidades de intercambio come...','686');
document.getElementById('pnd_linea').options['5']=new Option('5.1.2.5 Ampliar la cooperaciÃ³n frente a retos compart...','687');
document.getElementById('pnd_linea').options['6']=new Option('5.1.2.6 Fortalecer alianzas con paÃ­ses estratÃ©...','688');
break;
case "114":
document.getElementById('pnd_linea').options['1']=new Option('5.1.3.1 Fortalecer el diÃ¡logo polÃ­tico con tod...','689');
document.getElementById('pnd_linea').options['2']=new Option('5.1.3.2 Profundizar las asociaciones estratÃ©gicas con...','690');
document.getElementById('pnd_linea').options['3']=new Option('5.1.3.3 Aprovechar la coyuntura econÃ³mica actual para...','691');
document.getElementById('pnd_linea').options['4']=new Option('5.1.3.4 Ampliar los intercambios en el marco del tratado de ...','692');
document.getElementById('pnd_linea').options['5']=new Option('5.1.3.5 Impulsar la cooperaciÃ³n desde una perspectiva...','693');
document.getElementById('pnd_linea').options['6']=new Option('5.1.3.6 Consolidar a MÃ©xico como socio clave de la Un...','694');
document.getElementById('pnd_linea').options['7']=new Option('5.1.3.7 Promover un papel mÃ¡s activo de las represent...','695');
document.getElementById('pnd_linea').options['8']=new Option('5.1.3.8 Profundizar los acuerdos comerciales existentes y ex...','696');
break;
case "115":
document.getElementById('pnd_linea').options['1']=new Option('5.1.4.1 Incrementar la presencia de MÃ©xico en la regi...','697');
document.getElementById('pnd_linea').options['2']=new Option('5.1.4.2 Fortalecer la participaciÃ³n de MÃ©xico ...','698');
document.getElementById('pnd_linea').options['3']=new Option('5.1.4.3 Identificar coincidencias en los temas centrales de ...','699');
document.getElementById('pnd_linea').options['4']=new Option('5.1.4.4 Promover el acercamiento de los sectores empresarial...','700');
document.getElementById('pnd_linea').options['5']=new Option('5.1.4.5 Apoyar la negociaciÃ³n del Acuerdo Estrat&eacu...','701');
document.getElementById('pnd_linea').options['6']=new Option('5.1.4.6 Emprender una activa polÃ­tica de promoci&oacu...','702');
document.getElementById('pnd_linea').options['7']=new Option('5.1.4.7 Potenciar el diÃ¡logo con el resto de los pa&i...','703');
break;
case "116":
document.getElementById('pnd_linea').options['1']=new Option('5.1.5.1 Ampliar la presencia de MÃ©xico en Medio Orien...','704');
document.getElementById('pnd_linea').options['2']=new Option('5.1.5.2 Impulsar el diÃ¡logo con paÃ­ses de espe...','705');
document.getElementById('pnd_linea').options['3']=new Option('5.1.5.3 Promover la cooperaciÃ³n para el desarrollo en...','706');
document.getElementById('pnd_linea').options['4']=new Option('5.1.5.4 Aprovechar el reciente acercamiento entre los pa&iac...','707');
document.getElementById('pnd_linea').options['5']=new Option('5.1.5.5 Impulsar proyectos de inversiÃ³n mutuamente be...','708');
document.getElementById('pnd_linea').options['6']=new Option('5.1.5.6 Emprender una polÃ­tica activa de promoci&oacu...','709');
document.getElementById('pnd_linea').options['7']=new Option('5.1.5.7 Apoyar, a travÃ©s de la cooperaciÃ³n ins...','710');
document.getElementById('pnd_linea').options['8']=new Option('5.1.5.8 Vigorizar la agenda de trabajo en las representacion...','711');
break;
case "117":
document.getElementById('pnd_linea').options['1']=new Option('5.1.6.1 Impulsar firmemente la agenda de derechos humanos en...','712');
document.getElementById('pnd_linea').options['2']=new Option('5.1.6.2 Promover los intereses de MÃ©xico en foros y o...','713');
document.getElementById('pnd_linea').options['3']=new Option('5.1.6.3 Contribuir activamente en la definiciÃ³n e ins...','714');
document.getElementById('pnd_linea').options['4']=new Option('5.1.6.4 Participar en los procesos de deliberaciÃ³n de...','715');
document.getElementById('pnd_linea').options['5']=new Option('5.1.6.5 Impulsar la reforma del sistema de Naciones Unidas....','716');
document.getElementById('pnd_linea').options['6']=new Option('5.1.6.6 Reforzar la participaciÃ³n de MÃ©xico an...','717');
document.getElementById('pnd_linea').options['7']=new Option('5.1.6.7 Consensuar posiciones compartidas en foros regionale...','718');
document.getElementById('pnd_linea').options['8']=new Option('5.1.6.8 Ampliar la presencia de funcionarios mexicanos en lo...','719');
break;
case "118":
document.getElementById('pnd_linea').options['1']=new Option('5.1.7.1 Impulsar proyectos de cooperaciÃ³n internacion...','720');
document.getElementById('pnd_linea').options['2']=new Option('5.1.7.2 Centrar la cooperaciÃ³n en sectores claves par...','721');
document.getElementById('pnd_linea').options['3']=new Option('5.1.7.3 Ampliar la polÃ­tica de cooperaciÃ³n int...','722');
document.getElementById('pnd_linea').options['4']=new Option('5.1.7.4 Coordinar las capacidades y recursos de las dependen...','723');
document.getElementById('pnd_linea').options['5']=new Option('5.1.7.5 Ejecutar programas y proyectos financiados por el Fo...','724');
document.getElementById('pnd_linea').options['6']=new Option('5.1.7.6 Establecer el Registro Nacional de InformaciÃ³...','725');
document.getElementById('pnd_linea').options['7']=new Option('5.1.7.7 Ampliar la oferta de becas como parte integral de la...','726');
document.getElementById('pnd_linea').options['8']=new Option('5.1.7.8 Hacer un uso mÃ¡s eficiente de nuestra membres...','727');
break;
case "119":
document.getElementById('pnd_linea').options['1']=new Option('5.2.1.1 Promover, en paÃ­ses y sectores prioritarios, ...','728');
document.getElementById('pnd_linea').options['2']=new Option('5.2.1.2 Reforzar el papel de la SecretarÃ­a de Relacio...','729');
document.getElementById('pnd_linea').options['3']=new Option('5.2.1.3 Difundir los contenidos culturales y la imagen de M&...','730');
document.getElementById('pnd_linea').options['4']=new Option('5.2.1.4 Desarrollar y coordinar una estrategia integral de p...','731');
document.getElementById('pnd_linea').options['5']=new Option('5.2.1.5 Apoyar las labores de diplomacia parlamentaria como ...','732');
document.getElementById('pnd_linea').options['6']=new Option('5.2.1.6 Fortalecer el Servicio Exterior Mexicano y las repre...','733');
document.getElementById('pnd_linea').options['7']=new Option('5.2.1.7 Expandir la presencia diplomÃ¡tica de MÃ©...','734');
break;
case "120":
document.getElementById('pnd_linea').options['1']=new Option('5.2.2.1 Impulsar la imagen de MÃ©xico en el exterior m...','735');
document.getElementById('pnd_linea').options['2']=new Option('5.2.2.2 Promover que los mexicanos en el exterior contribuya...','736');
document.getElementById('pnd_linea').options['3']=new Option('5.2.2.3 Emplear la cultura como instrumento para la proyecci...','737');
document.getElementById('pnd_linea').options['4']=new Option('5.2.2.4 Aprovechar los bienes culturales, entre ellos la len...','738');
document.getElementById('pnd_linea').options['5']=new Option('5.2.2.5 Impulsar los vÃ­nculos de los sectores cultura...','739');
break;
case "121":
document.getElementById('pnd_linea').options['1']=new Option('5.3.1.1 Incrementar la cobertura de preferencias para produc...','740');
document.getElementById('pnd_linea').options['2']=new Option('5.3.1.2 Propiciar el libre trÃ¡nsito de bienes, servic...','741');
document.getElementById('pnd_linea').options['3']=new Option('5.3.1.3 Impulsar iniciativas con paÃ­ses afines en des...','742');
document.getElementById('pnd_linea').options['4']=new Option('5.3.1.4 Profundizar la apertura comercial con el objetivo de...','743');
document.getElementById('pnd_linea').options['5']=new Option('5.3.1.5 Negociar y actualizar acuerdos para la promoci&oacut...','744');
document.getElementById('pnd_linea').options['6']=new Option('5.3.1.6 Participar activamente en los foros y organismos int...','745');
document.getElementById('pnd_linea').options['7']=new Option('5.3.1.7 Reforzar la participaciÃ³n de MÃ©xico en...','746');
document.getElementById('pnd_linea').options['8']=new Option('5.3.1.8 Fortalecer la cooperaciÃ³n con otras oficinas ...','747');
document.getElementById('pnd_linea').options['9']=new Option('5.3.1.9 Defender los intereses comerciales de MÃ©xico ...','748');
document.getElementById('pnd_linea').options['10']=new Option('5.3.1.10 Difundir las condiciones de MÃ©xico en el ext...','749');
document.getElementById('pnd_linea').options['11']=new Option('5.3.1.11 Promover la calidad de bienes y servicios en el ext...','750');
document.getElementById('pnd_linea').options['12']=new Option('5.3.1.12 Impulsar mecanismos que favorezcan la internacional...','751');
document.getElementById('pnd_linea').options['13']=new Option('5.3.1.13 Implementar estrategias y acciones para que los pro...','752');
break;
case "122":
document.getElementById('pnd_linea').options['1']=new Option('5.3.2.1 Integrar a MÃ©xico en los nuevos bloques de co...','753');
document.getElementById('pnd_linea').options['2']=new Option('5.3.2.2 Profundizar nuestra integraciÃ³n con AmÃ©...','754');
document.getElementById('pnd_linea').options['3']=new Option('5.3.2.3 Vigorizar la presencia de MÃ©xico en los mecan...','755');
document.getElementById('pnd_linea').options['4']=new Option('5.3.2.4 Impulsar activamente el Acuerdo EstratÃ©gico T...','756');
document.getElementById('pnd_linea').options['5']=new Option('5.3.2.5 Consolidar el Proyecto de IntegraciÃ³n y Desar...','757');
document.getElementById('pnd_linea').options['6']=new Option('5.3.2.6 Profundizar la integraciÃ³n comercial con Am&e...','758');
document.getElementById('pnd_linea').options['7']=new Option('5.3.2.7 Promover nuevas oportunidades de intercambio comerci...','759');
document.getElementById('pnd_linea').options['8']=new Option('5.3.2.8 Integrar la conformaciÃ³n de un directorio de ...','760');
document.getElementById('pnd_linea').options['9']=new Option('5.3.2.9 Fortalecer la presencia de MÃ©xico en Ã¡...','761');
document.getElementById('pnd_linea').options['10']=new Option('5.3.2.10 Diversificar las exportaciones a travÃ©s de l...','762');
break;
case "123":
document.getElementById('pnd_linea').options['1']=new Option('5.4.1.1 Velar por el cabal respeto de los derechos de los me...','763');
document.getElementById('pnd_linea').options['2']=new Option('5.4.1.2 Promover una mejor inserciÃ³n de nuestros conn...','764');
document.getElementById('pnd_linea').options['3']=new Option('5.4.1.3 Desarrollar proyectos a nivel comunitario en Ã¡...','765');
document.getElementById('pnd_linea').options['4']=new Option('5.4.1.4 Fortalecer la relaciÃ³n estrecha con las comun...','766');
document.getElementById('pnd_linea').options['5']=new Option('5.4.1.5 Facilitar el libre trÃ¡nsito de los mexicanos ...','767');
document.getElementById('pnd_linea').options['6']=new Option('5.4.1.6 Fomentar una mayor vinculaciÃ³n entre las comu...','768');
document.getElementById('pnd_linea').options['7']=new Option('5.4.1.7 Apoyar al sector empresarial en sus intercambios y a...','769');
document.getElementById('pnd_linea').options['8']=new Option('5.4.1.8 Construir acuerdos y convenios de cooperaciÃ³n...','770');
document.getElementById('pnd_linea').options['9']=new Option('5.4.1.9 Impulsar una posiciÃ³n comÃºn y presenta...','771');
document.getElementById('pnd_linea').options['10']=new Option('5.4.1.10 Activar una estrategia de promociÃ³n y empode...','772');
break;
case "124":
document.getElementById('pnd_linea').options['1']=new Option('5.4.2.1 Revisar los acuerdos de repatriaciÃ³n de mexic...','773');
document.getElementById('pnd_linea').options['2']=new Option('5.4.2.2 Fortalecer los programas de repatriaciÃ³n, a f...','774');
document.getElementById('pnd_linea').options['3']=new Option('5.4.2.3 Establecer mecanismos de control que permitan la rep...','775');
document.getElementById('pnd_linea').options['4']=new Option('5.4.2.4 Crear y fortalecer programas de certificaciÃ³n...','776');
break;
case "125":
document.getElementById('pnd_linea').options['1']=new Option('5.4.3.1 DiseÃ±ar mecanismos de facilitaciÃ³n mig...','777');
document.getElementById('pnd_linea').options['2']=new Option('5.4.3.2 Facilitar la movilidad transfronteriza de personas y...','778');
document.getElementById('pnd_linea').options['3']=new Option('5.4.3.3 Simplificar los procesos para la gestiÃ³n migr...','779');
break;
case "126":
document.getElementById('pnd_linea').options['1']=new Option('5.4.4.1 Elaborar un programa en materia de migraciÃ³n ...','780');
document.getElementById('pnd_linea').options['2']=new Option('5.4.4.2 Promover una alianza intergubernamental entre M&eacu...','781');
document.getElementById('pnd_linea').options['3']=new Option('5.4.4.3 Crear un sistema nacional de informaciÃ³n y es...','782');
document.getElementById('pnd_linea').options['4']=new Option('5.4.4.4 Impulsar acciones dirigidas a reducir las condicione...','783');
document.getElementById('pnd_linea').options['5']=new Option('5.4.4.5 Impulsar la creaciÃ³n de regÃ­menes migr...','784');
document.getElementById('pnd_linea').options['6']=new Option('5.4.4.6 Promover acciones dirigidas a impulsar el potencial ...','785');
document.getElementById('pnd_linea').options['7']=new Option('5.4.4.7 Fortalecer los vÃ­nculos polÃ­ticos, eco...','786');
document.getElementById('pnd_linea').options['8']=new Option('5.4.4.8 DiseÃ±ar y ejecutar programas de atenciÃ³...','787');
break;
case "127":
document.getElementById('pnd_linea').options['1']=new Option('5.4.5.1 Implementar una polÃ­tica en materia de refugi...','788');
document.getElementById('pnd_linea').options['2']=new Option('5.4.5.2 Establecer mecanismos y acuerdos interinstitucionale...','789');
document.getElementById('pnd_linea').options['3']=new Option('5.4.5.3 Propiciar esquemas de trabajo entre las personas mig...','790');
document.getElementById('pnd_linea').options['4']=new Option('5.4.5.4 Promover la convivencia armÃ³nica entre la pob...','791');
document.getElementById('pnd_linea').options['5']=new Option('5.4.5.5 Implementar una estrategia intersectorial dirigida a...','792');
document.getElementById('pnd_linea').options['6']=new Option('5.4.5.6 Promover la profesionalizaciÃ³n, sensibilizaci...','793');
document.getElementById('pnd_linea').options['7']=new Option('5.4.5.7 Fortalecer mecanismos para investigar y sancionar a ...','794');
document.getElementById('pnd_linea').options['8']=new Option('5.4.5.8 Crear un sistema nacional Ãºnico de datos para...','795');
break;
case "128":
document.getElementById('pnd_linea').options['1']=new Option('5.I.1 Dedicar atenciÃ³n especial a temas relacionados ...','796');
document.getElementById('pnd_linea').options['2']=new Option('5.I.2 Fortalecer la alianza estratÃ©gica de Canad&aacu...','797');
document.getElementById('pnd_linea').options['3']=new Option('5.I.3 Lograr una plataforma estratÃ©gica para el forta...','798');
document.getElementById('pnd_linea').options['4']=new Option('5.I.4 Facilitar el comercio exterior impulsando la moderniza...','799');
document.getElementById('pnd_linea').options['5']=new Option('5.I.5 Profundizar la polÃ­tica de desregulaciÃ³n...','800');
document.getElementById('pnd_linea').options['6']=new Option('5.I.6 Diversificar los destinos de las exportaciones de bien...','801');
document.getElementById('pnd_linea').options['7']=new Option('5.I.7 Privilegiar las industrias de alto valor agregado en l...','802');
document.getElementById('pnd_linea').options['8']=new Option('5.I.8 Apoyar al sector productivo mexicano en coordinaci&oac...','803');
break;
case "129":
document.getElementById('pnd_linea').options['1']=new Option('5.II.1 Modernizar los sistemas y reducir los tiempos de gest...','804');
document.getElementById('pnd_linea').options['2']=new Option('5.II.2 Facilitar el acceso a trÃ¡mites y servicios de ...','805');
document.getElementById('pnd_linea').options['3']=new Option('5.II.3 Generar una administraciÃ³n eficaz de las front...','806');
document.getElementById('pnd_linea').options['4']=new Option('5.II.4 Dotar de infraestructura los puntos fronterizos, prom...','807');
document.getElementById('pnd_linea').options['5']=new Option('5.II.5 Fomentar la transparencia y la simplificaciÃ³n ...','808');
document.getElementById('pnd_linea').options['6']=new Option('5.II.6 Ampliar y profundizar el diÃ¡logo con el sector...','809');
document.getElementById('pnd_linea').options['7']=new Option('5.II.7 Fomentar la protecciÃ³n y promociÃ³n de l...','810');
break;
case "130":
document.getElementById('pnd_linea').options['1']=new Option('5.III.1 Promover y dar seguimiento al cumplimiento de los co...','811');
document.getElementById('pnd_linea').options['2']=new Option('5.III.2 Armonizar la normatividad vigente con los tratados i...','812');
document.getElementById('pnd_linea').options['3']=new Option('5.III.3 Evaluar los efectos de las polÃ­ticas migrator...','813');
document.getElementById('pnd_linea').options['4']=new Option('5.III.4 Implementar una estrategia intersectorial dirigida a...','814');
break;

    }
}

