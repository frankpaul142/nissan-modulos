<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
		<head>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
			<title>Nissan Ecuador - Solicitud de Agendamiento</title>
		</head>
    <body>
<div id="resultado" >
  	  	<span>INFORMACIÓN DE CITA</span><br/>
    <p style="line-height:24px;">Su envío se realizó con éxito.<br/>

Cliente.<br/><br/>
       <label style="color:#C90046;"> Gracias por ser parte de la comunidad Nissan.</label> <br/></p>
  	<table width="800px" border="0" cellspacing="3" cellpadding="3" align="center" style="margin-top:20px;">
    	<tr>
        	<td width="148"><strong>Nombre:</strong></td>
            <td width="387" id="name_result"><?php echo $client->name." ".$client->lastname; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="148"><strong>Teléfono:</strong></td>
            <td width="387" id="name_result"><?php echo $client->phone; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="148"><strong>Celular:</strong></td>
            <td width="387" id="name_result"><?php echo $client->cellphone; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="148"><strong>Email:</strong></td>
            <td width="387" id="name_result"><?php echo $client->email; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="148"><strong>Preferencia de contacto:</strong></td>
            <td width="387" id="name_result"><?php echo $client->preference_contact; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="131"><strong>Horario</strong></td>
            <td width="67" id="hour_result"><?php echo $technicaldate->hour ?></td>
        </tr>
        <tr>
        	
            <td colspan="2">&nbsp;</td>
            <td><strong>Servicio de Taxi</strong> </td>
            <td id="taxi_result"><?php 
                
                
                if($technicaldate->taxi=="YES") 
                        echo "Si";
                else{
                    echo "No";
                }
                        ?>
            </td>
        </tr>
        <tr>
        	<td><strong>Centro de servicio:</strong></td>
            <td colspan="5" id="concessioner_result"><?php echo $technicaldate->concessioner->name ?></td>
        </tr>
         <tr>
        	<td><strong>Día de preferencia</strong></td>
            <td id="date_result"><?php echo $technicaldate->preference_date ?></td>
            <td colspan="4">&nbsp;</td>
        </tr>
         <tr>
        	<td><strong>Modelo</strong></td>
            <td id="model_result"><?php echo $vehicle->model ?></td>
            <td colspan="2">&nbsp;</td>
            <td><strong>Placa</strong></td>
            <td id="license_plate_result"><?php echo $vehicle->license_plate ?></td>
            
        </tr>
        <tr>

            <td><strong>Kilometraje actual</strong></td>
            <td id="kilometer_result"><?php echo $vehicle->kilometer ?></td>
            <td colspan="2">&nbsp;</td>
            <td><strong>Año</strong></td>
            <td id="year_result"><?php echo $vehicle->year ?></td>
        </tr>
        <tr>
        	<td><strong>Trabajo a realizar:</strong></td>
            <td colspan="5" id="work_result"><?php echo $technicaldate->work ?> </td>
			<td><strong>Trabajos adicionales:</strong></td>
			   <td colspan="5" id="work_result"><?php echo $technicaldate->detail_work ?> </td>
        </tr>
    </table>
  </div>
        	</body>
		</html>

