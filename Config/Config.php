<?php 
	

	define ('BASE_URL', 'http://localhost/sistema');
	
	//Zona horaria
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	
  
	//Datos de conexión a Base de Datos
	define ('DB_HOST', 'localhost');
	define ('DB_NAME', 'db_s1');
	define ('DB_USER', 'root');
	define ('DB_PASSWORD', '');
	define ('DB_CHARSET', 'utf8');
	

	//Deliminadores decimal y millar Ej. 24,1989.00
	define ('SPD',".");
	define ('SPM',",");






	



	//Modulos

	define ('MDASHBOARD',"1");
	define ('MUSUARIOS',"2");

	define ('MMODULOS',"3");
	define ('MROLES',"4");
	define ('MPERSONAS',"5");
	define ('MPUESTOS',"6");
	define ('MCALIFICACIONES',"20");
	define ('MINFORMES',"21");
	//roles
	define ('RADMINISTRADOR', "1");
	define ('RCLIENTES', "7");
	
	define ('STATUS', "array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado'");

 ?>
