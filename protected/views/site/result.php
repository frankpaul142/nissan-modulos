<?php $city= City::model()->findByPk($technicaldate->concessioner->city_id); 
        
        
        ?>
<div id="resultado" >
  	  	<span>INFORMACIÓN DE CITA</span><br/>
    <p style="line-height:24px;">Su envío se realizó con éxito.<br/>

Hemos recibido su mensaje, nuestra asesor/a de servicio al cliente se comunicará con usted a la brevedad posible para confirmar su cita.<br/><br/>
       <label style="color:#C90046;"> Gracias por ser parte de la comunidad Nissan.</label> <br/></p>
  	<table width="800px" border="0" cellspacing="3" cellpadding="3" align="center" style="margin-top:20px;">
    	<tr>
        	<td width="148"><strong>Nombre:</strong></td>
            <td width="387" id="name_result"><?php echo $client->name." ".$client->lastname; ?></td>
            <td colspan="2">&nbsp;</td>
            <td width="131"><strong>Horario</strong></td>
            <td width="67" id="hour_result"><?php echo $technicaldate->hour ?></td>
        </tr>
        <tr>
        	<td><strong>Ciudad:</strong></td>
            <td id="city_result"><?php echo $city->name; ?></td>
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
        </tr>
    </table>
  </div>
<!--<input type="button" value="Imprimir" name="Imprimir" onclick="PrintElem(resultado)" class="btn_siguiente2"/>-->
  <div id="barra_localizador">Su cita debe ser agendada con 48 horas de anticipación. El agendamiento de su cita dependerá de la <br/>
disponibilidad de nuestros Centros de Servicio.</div>
<script>
    
      function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Agendamiendo de Cita', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Agendamiendo de Cita</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
    </script>