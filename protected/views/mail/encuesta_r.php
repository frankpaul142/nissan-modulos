<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SATISFACCI�N DEL CLIENTE</title>
</head>
<body>
<table width="100%" border="0" >
  <tr>
    <td><img src="http://seraexcelente.com/nissan-mailing/header/nueva.jpg" width="99" height="124" /></td>
  </tr>
</table>

<table width="700px" border="0">
  <tr>
    <td style="font-size: 16px;
	font-style: normal;
	color: #900;
	background-color: #f2f2f2;">SATISFACCI&Oacute;N DEL CLIENTE</td>
  </tr>
</table>

<table width="700px" border="0">
  <tr>
    <td style="background-color:
	#F2F2F2;"><table width="700px" border="0">
  <tr>
    <td style="font-size: 17px;
	font-style: normal;
	color:#000;
	text-align:center;" width="40%"><a>El asesor comercial se ha contactado?</a></td>
    <td style="font-size: 17px;
	font-style: normal;
	color:#000;
	text-align:center;" width="60%"><a><label style="color: #7C7C7C;
	
	float:left;"><?php echo $satisfaction->contact ?></label></a></td>
  </tr>
</table>
    <table width="100%" height="AUTO" border="0">
  <td style="\text-align:center;
	background-color:
	#F2F2F2;" width="40%"><a>DATOS DE CLIENTE</a></td>
    <td style="background-color:
	#F2F2F2;"width="60%" height="auto"><a>C&eacute;dula:
    <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->identity ?></label></a><br/>
<a>Nombre:<label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->name ?></label></a>
<br/>
<a>Apellido:
    <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->lastname ?></label>
    </a>
<br/>
<a>E-mail:
   <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->email ?></label></a>
<br/>
<a>Tel&eacute;fono:
   <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->phone ?></label></a>
<br/>
<a>Celular:
    <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->client->cellphone ?></label></a>    
<br/>
<a>Concesionario:
    <label style="background-color:
	#F2F2F2;"><?php echo $satisfaction->replacement->concessioner->name ?></label></a>          	

    </td>
    
    
  	
</table>

</td>
  </tr>
  <tr>
    <td><table width="700px" height="40px"border="0">
  <tr>
    <td><table width="100%" height="100px" border="0">
  <td style="text-align:center;
	background-color:
	#F2F2F2;" width="40%"><a>CALIFICACI&Oacute;N DEL SITIO WEB</a></td>
    <td style="background-color:
	#F2F2F2;" width="60%"><a><label class="label2"><?php echo $satisfaction->score ?></label></a></td>
    
  	
</table>
<table width="100%" height="auto" border="0">
  <td style="\text-align:center;
	background-color:
	#F2F2F2;" width="40%"><a>RAZ&Oacute;N DE CALIFICACI&Oacute;N</a></td>
    <td style="background-color:
	#F2F2F2;"width="60%" height="auto"><label><?php echo utf8_decode($satisfaction->description) ?></label></td>
    
  	
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
