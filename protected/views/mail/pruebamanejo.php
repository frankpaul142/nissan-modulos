	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
		<head>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
			<title>Nissan Ecuador - Prueba de manejo</title>
			<!--[if lte IE 8]>
				<link rel="stylesheet" type="text/css" href="ie8-media.css" />
			<![endif]-->
		</head>
		<body>
			<table style="background-color:#efefef;">
				<thead>
					<th style="background-color:#FFFFFF; text-align:left; width:700px;" colspan="2"><img src="http://seraexcelente.com/nissan-mailing/header/nueva.jpg"/></th>
				</thead>	
			<tbody>
				<tr>
					<td colspan="2">  
						<h1>Prueba de Manejo</h1>
						
					</td>
				</tr>


				<tr>
		<td align="right" style="width:30%"><b>Fecha: </b></td><td style="width:70%"><?php
					echo  $drive->creation_date ;
                                        ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Requerimiento: </b></td><td style="width:70%">Prueba de manejo</td>
				</tr>
                                <tr>
					<td align="right" style="width:30%"><b>C&eacute;dula: </b></td><td style="width:70%"><?php echo $client->identity; ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Nombre: </b></td><td style="width:70%"><?php echo $client->name; ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Apellido: </b></td><td style="width:70%"><?php echo $client->lastname; ?></td>
				</tr>

              
				<tr>
					<td align="right" style="width:30%"><b>Tel&eacute;fono: </b></td><td style="width:30%"><?php echo $client->phone; ?></td>
				</tr>
                                <tr>
					<td align="right" style="width:30%"><b>Celular: </b></td><td style="width:70%"><?php echo $client->cellphone; ?></td>
				</tr>
   
				<tr>
					<td align="right" style="width:30%"><b>E-mail: </b></td><td style="width:30%"><?php echo $client->email; ?></td>
				</tr>
					 <tr>
        	<td><strong>Medio:</strong></td>
            <td colspan="3" id="concessioner_result"><?php echo $client->medio; ?></td>
        </tr>
				<tr>
					<td align="right" style="width:30%"><b>Medio de contacto: </b></td><td style="width:30%"><?php echo $client->preference_contact; ?></td>
				</tr>
					<tr>
					<td align="right" style="width:30%"><b>Hora de contacto: </b></td><td style="width:30%"><?php echo $client->preference_contact2; ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Concesionario donde desea ser atendido: </b></td><td><?php echo $drive->concessioner->name; ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Preferencia 1: </b></td><td><?php echo $drive->vehicleversion->vehicle->name." ".$drive->vehicleversion->reference; ?></td>
				</tr>
				<tr>
					<td align="right" style="width:30%"><b>Preferencia 2: </b></td><td><?php echo $drive->vehicleversion2->vehicle->name." ".$drive->vehicleversion2->reference;  ?></td>
				</tr>
				<tr>
<!--					<td align="right" style="width:30%"><b>Hora de Preferencia para su Atenci&oacute;n: </b></td><td>'.$data['user_hour_contact'].'</td>
				</tr>				-->

			</table>
		</body>
		</html>