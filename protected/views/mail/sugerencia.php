<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PETICIONES, QUEJAS Y RECOMENDACIONES</title>
</head>
<body>
<div class="header" style="margin-left:15%;
	margin-right:15%;">
  <table style="width:100%;" border="0">
    <tbody>
      <tr>
        <td><img src="http://seraexcelente.com/nissan-mailing/header/nueva.jpg" width="99" height="124"></td>
      </tr>
    </tbody>
  </table>
  <table style="width:100%;" border="0">
    <tbody>
      <tr>
        <td class="titulo" style="font-size: 16px;
	font-style: normal;
	color: #900;
	background-color: #f2f2f2;">PETICIONES, QUEJAS Y RECOMENDACIONES</td>
      </tr>
    </tbody>
  </table>
  <table style="width:100%;" border="0">
    <tbody>
      <tr>
        <td style="background-color:
	#F2F2F2;"><table style="width:100%;" border="0">
            <tbody>
              <tr>
                <td style="font-size: 17px;
	font-style: normal;
	color:#000;
	text-align:center; width:33%;" >SUGERENCIAS</td>
                <td style="font-size: 17px;
	font-style: normal;
	color:#000;
	text-align:center;width:33%;">Información de Vehículo</td>
                <td style="font-size: 17px;
	font-style: normal;
	color:#000;
	text-align:center;width:33%;">Información Personal</td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td><table style="width:100%;" border="0">
            <tbody>
              <tr style="background-color:#F2F2F2">
                <td><table style="width: 272px;" height="250px" border="0">
                    <tbody>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Detalle - Servicio: <br>
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->type ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Descripción:</a> <br>
                          <br>
                          <div style="text-align:justify; width:200px; height:auto; margin-right:1px; color:#7c7c7c">
                            <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->description ?></label>
                          </div></td>
                      </tr>
                    </tbody>
                  </table></td>
                <td style="background-color:
	#F2F2F2;"><table style="width:100%;" height="300px" border="0">
                    <tbody>

                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Concesionario
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->concessioner->name ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Modelo:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo utf8_decode($suggestion->vehicle->model) ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Año:
                          <label style="color: #7C7C7C;
	
	float:right;">1991</label>
                          </a></td>
                      </tr>
                      <tr> </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Chasis:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->vehicle->chasis ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Placa:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->vehicle->license_plate ?></label>
                          </a></td>
                      </tr>
                    </tbody>
                  </table></td>
                <td><table width="233.33px" height="300px" border="0">
                    <tbody>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Cédula:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->identity ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Nombre:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->name ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Apellido:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->lastname ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">E-mail:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->email?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Teléfono:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->phone ?></label>
                          </a></td>
                      </tr>
                      <tr>
                        <td><a style="font-size: 14px;
	font-style: normal;
	text-align:right;">Celular:
                          <label style="color: #7C7C7C;
	
	float:right;"><?php echo $suggestion->client->cellphone ?></label>
                          </a></td>
                      </tr>
                          <tr>
    <td><a>�C&oacute;mo le contactamos?
    <br/>  <label><?php echo $suggestion->client->preference_contact?></label></a>
    </td>
  </tr>
                    </tbody>
                  </table></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </table>
</div>
<div id="body"></div>
<div id="footer"></div>
</body>
</html>