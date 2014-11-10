<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario Nissan</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#4D4D4F; font-size:15px; background: #e7e7e7; /* Old browsers */
	background: -moz-linear-gradient(top, #e7e7e7 2%, #ffffff 50%, #e7e7e7 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(2%,#e7e7e7), color-stop(50%,#ffffff), color-stop(100%,#e7e7e7)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #e7e7e7 2%,#ffffff 50%,#e7e7e7 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #e7e7e7 2%,#ffffff 50%,#e7e7e7 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #e7e7e7 2%,#ffffff 50%,#e7e7e7 100%); /* IE10+ */
	background: linear-gradient(to bottom, #e7e7e7 2%,#ffffff 50%,#e7e7e7 100%); /* W3C */">
	<div style="width:660px; height:570px; margin:95px auto 0 auto; padding:20px;">
	<div style="width:660px; height:570px; margin:0 auto; padding:20px;">
                         <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'satisfaction-form',
	'enableAjaxValidation'=>false,
    
)); ?>
    	<h1 style="font-size:18px; font-weight:bold">Estimad@ <?php echo $quotation->client->name." ".$quotation->client->lastname  ?></h1>
        <p>Han pasado 48 horas desde que recibimos su requerimiento en <strong>www.nissan.com.ec</strong></p>
        <p><strong>¿Podría por favor confirmarnos si nuestro asesor comercial se ha contactado con usted y le ha facilitado toda la información solicitada?</strong></p>
            <?php  $status=  array('YES' => 'SI', 'NO' => 'NO'); ?>    
            <?php echo $form->dropDownList($model,'contact', $status, array('prompt'=>'Selecciona una opción','style'=>'width:100px')); ?>
		<?php echo $form->error($model,'contact'); ?>  

      <p style="font-size:15px">Ayúdenos a mejorar.<br/>
      Nuestro compromiso, brindarle el mejor servicio.
      <br/><br/>
      Su opinión es muy importante para nosotros.<br/>
      Utilizando una escala de: 10 Muy bueno, 9 Bueno y 0-8 Malo.
      </p>
      <p><strong>¿En general, cómo califica nuestro Sitio Web?</strong></p>
	  <?php  $number=  array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'); ?>    
            <?php echo $form->dropDownList($model,'score', $number, array('prompt'=>'Selecciona una opción','style'=>'width:100px; clear:both')); ?>
		<?php echo $form->error($model,'score'); ?>   

    
     
	  <div id="description_cont" style="display:none;width:99%; padding:0.5%; border:1px dotted #4D4D4F; clear:both; float:left; margin-top:10px">
	    <h2 style="font-size:18px">Por favor detalle la razón de su calificación</h2>
       <span style="font-size:11px; margin-top:-5px; float:left;">*Si la calificación es menor de 10</span>
<!--      <textarea style="width:99.5%; height:130px; background-color:#d4d4d5;"></textarea>-->
   <?php echo $form->textArea($model,'description', array('style'=>'width:99.5%; height:130px; background-color:#d4d4d5;')); ?>        
 <?php echo $form->error($model,'description'); ?>   
      </div>
      <div style="clear:both; float:right; margin-top:5px;">
      	<input type="submit" value="Enviar" style="background-color:#4D4D4F; color:#FFF; font-size:15px; padding:2px 10px"/>
      </div>
      <span style="font-size: 15px; clear: both; width: 100%; float: left; margin-top: 10px;;">Gracias por visitar www.nissan.com.ec, para <strong>NISSAN</strong> es importante ofrecerle un servicio de excelencia.</span>
   <?php $this->endWidget(); ?>
        </div>

	<div style="float:left;	position:absolute; top:0; left:60px;"><img src="<?php echo Yii::app()->request->getBaseUrl(true) ?>/images/logo-nissan.jpg" width="130" alt="logo nissan"/></div>

</body>
<script type="text/javascript">
    
    $(document).ready(function() {
        
        $("#Satisfaction_score").change(function() {
           if($(this).val()==10){
               $("#description_cont").hide(); 
               
           }else{
                  $("#description_cont").show(); 
           } 
        });
    
    });
    </script>
</html>
