<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOLICITUD DE COTIZACION DE REPUESTOS</title>
</head>
<body>
 
 
<div style="margin-left: 15% ;margin-right: 15%;">
<table width="100%" border="0">
  <tr>
    <td><img src="http://seraexcelente.com/nissan-mailing/header/nueva.jpg" width="99" height="124" /></td>
  </tr>
</table>
 
<table width="700px" border="0">
  <tr>
    <td style="font-size: 16px;
                font-style: normal;
                color: #900;
                background-color: #f2f2f2;">SOLICITUD DE COTIZACION DE REPUESTOS</td>
  </tr>
</table>
 
<table width="700px" border="0">
  <tr>
    <td style="     background-color:
                #F2F2F2;"><table width="700px" border="0">
  <tr>
    <td style="font-size: 17px;
                font-style: normal;
                color:#000;
                text-align:center;" width="100px">LUGAR</td>
    <td style="font-size: 17px;
                font-style: normal;
                color:#000;
                text-align:center;" width="233.33px">Informaci&oacute;n de Veh&iacute;culo</td>
    <td style="font-size: 17px;
                font-style: normal;
                color:#000;
                text-align:center;" width="233.33px">Informaci&oacute;n Personal</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="700px" border="0">
  <tr>
    <td style="     background-color:#F2F2F2"><table width="233.33px" height="250px" border="0">
 
  <tr>
    <td><a>Concesionario:
     <br/>
    <label ><?php echo $replacement->concessioner->name ?></label></a>
    </td>
  </tr>
</table>
</td>
    <td style="background-color:#F2F2F2" ><table width="233.33px" height="300px" border="0">
  <tr>
    <td ><a>Modelo:
    <label ><?php echo utf8_decode($replacement->vehicle->model) ?></label>
   
 </select></a>
    </td>
  </tr>
  
  <tr>
    <td><a>A&ntilde;o:
    <label ><?php echo $replacement->vehicle->year ?></label></a></td>
  </tr>
  <tr>
    <td><a>Repuesto:
    <label ><?php echo $replacement->part ?></label></a>
   
    </td>
  </tr>
  <tr>
    <td><a>Chasis:
   <label ><?php echo $replacement->vehicle->chasis ?></label></a>
    </td>
  </tr>
  <tr>
    <td><a>Placa:
    <label><?php echo $replacement->vehicle->license_plate ?></label></a>
    </td>
  </tr>
</table>
</td>
    <td style="background-color:#F2F2F2" ><table width="233.33px" height="300px" border="0">
  <tr>
    <td><a>C&eacute;dula:
    <label ><?php echo $replacement->client->identity ?></label></a>
    </td>
  </tr>
  <tr>
    <td><a>Nombre:
   <label ><?php echo $replacement->client->name ?></label></a>
    </td>
  </tr>
  <tr>
    <td><a>Apellido:
    <label ><?php echo $replacement->client->lastname ?></label>
    </a></td>
  </tr>
  <tr>
    <td><a>E-mail:
   <label ><?php echo $replacement->client->email?></label></a>
    </td>
  </tr>
 <tr>
    <td><a>Tel&eacute;fono:
   <label><?php echo $replacement->client->phone ?></label></a>
    </td>
  </tr>
  <tr>
    <td><a>Celular:
    <label><?php echo $replacement->client->cellphone ?></label></a>
    </td>
  </tr>
  <tr>
    <td><a>¿C&oacute;mo le contactamos?
    <br/>  <label><?php echo $replacement->client->preference_contact?></label></a>
    </td>
  </tr>
 	 <tr>
        	<td><strong>Medio:</strong></td>
            <td colspan="3" id="concessioner_result"><?php echo $client->medio; ?></td>
        </tr>
</table>
</td>
  </tr>
</table>
</td>
  </tr>
 
</table>
 
</div>
 
 
 
 
 
 
</body>
</html>
