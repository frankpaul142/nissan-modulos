<?php /* @var $this Controller */ 
$types=  Type::model()->findAll();
$cities= City::model()->findAll();
?> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true"><div id="FirebugChannel" style="display: none;"></div><script src="chrome-extension://bmagokdooijbeehmkpknfglimnifench/firebug-lite.js" id="FirebugLite" firebugignore="true" extension="Chrome"></script><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="/agendamientocita/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="/agendamientocita/css/print.css" media="print" />
	[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="/agendamientocita/css/ie.css" media="screen, projection" />
	<![endif]

	<link rel="stylesheet" type="text/css" href="/agendamientocita/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/agendamientocita/css/form.css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/styles-que.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/fotorama.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>-->
		<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/fotorama.js"></script>

<body>
<!--
<div class="concecionarios">
		<div class="banner-principal">
        	<div class="fotorama" data-width="100%" data-autoplay="6000" data-loop="true" data-arrows="true" data-transition="dissolve">
             <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/FRONTIER.png" alt="Nissan Frontier"/>
                <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/MURANO.png" alt="Nissan Murano"/>
                <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/QASHQAI.png" alt="Nissan Qashqai"/>
                <img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/X-TRAIL.png" alt="Nissan X-trail"/>
            </div>
<div class="logotipo2"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-nissan.jpg" width="100" alt="logo nissan"/></div>
        </div>
 -->
<div id="content">

<div class="localizador">
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suggestion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
         'action'=>$this->createUrl("Default/index"),
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
                  'clientOptions'=>array(
            'validateOnSubmit'=>true,            
           // 'afterValidate'=>'js:validateUserData'            
                ),

)); ?>
      <span>Peticiones, Quejas y Recomendaciones</span>
    <div id="part_1">
   	  <h2>Información Personal</h2>
      	<table width="290px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tr>
            <td>Cédula:</td>
            <td colspan="2">
            	
            <?php echo $form->textField($client,'identity',array("style"=>"width:150px;","class"=>"number")); ?>  
                 <?php echo $form->error($client,'identity'); ?>
            </td>
          </tr>
          <tr id="identity" style="display: table-row;">
            <td>Nombre:</td>
            <td colspan="2">
            	
            <?php echo $form->textField($client,'name',array("style"=>"width:150px;")); ?> 
                 <?php echo $form->error($client,'name'); ?>
            </td>
          </tr>
            <td>Apellido:</td>
            <td colspan="2">
                	
            
            <?php echo $form->textField($client,'lastname',array("style"=>"width:150px;")); ?>   
                 <?php echo $form->error($client,'lastname'); ?>
            </td>
          </tr>

          <tr>
            <td>E-mail:</td>
            <td colspan="2">
           		    
            <?php echo $form->textField($client,'email',array("style"=>"width:150px;")); ?>  
                <?php echo $form->error($client,'email'); ?>
            </td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td colspan="2">
          
            <?php echo $form->textField($client,'phone',array("style"=>"width:150px;","class"=>"number")); ?>
                  	 <?php echo $form->error($client,'phone'); ?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><div class="eje-placa"><strong>Ej:</strong>022344468</div></td>
          </tr>
          <tr>
            <td>Celular:</td>
            <td colspan="2">
            	      
            <?php echo $form->textField($client,'cellphone',array("style"=>"width:150px;","class"=>"number")); ?>
                  <?php echo $form->error($client,'cellphone'); ?>
            </td>
                <?php echo $form->hiddenField($client,'medio',array("value"=>$medio)); ?>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><div class="eje-placa"><strong>Ej:</strong>0992344468</div></td>
          </tr>

          <tr>
          	<td>&nbsp;</td>
         
          </tr>
        </table>
    </div>
    <div id="part_2">
    	<h2>Información de Vehículo</h2>
		<table width="300px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tbody>
		            <tr>
          	<td>Ciudad:</td>
            <td colspan="2">
     	<select class="select-n" name="city" id="city" >
                 <option value="0">Selecciona una ciudad</option>
									<?php foreach ($cities as $city): ?>
                                                                        <?php // if($city->id != 21){ ?>
                                                                        <?php if(isset($city_id)&&$city_id==$city->id){ ?>
                                                                          <option selected="true" value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php }else{ ?>
                                                                                   <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php  } ?>
                                                                        <?php // } 
                                                                        
                                                                        endforeach; ?>
                </select>   
			</td>
          </tr>
          <tr>
            <td colspan="3">Concesionario:</td>
          </tr>
          <tr>
            <td colspan="3">
            <select name="Suggestion[concessioner_id]" id="concessioner" style="width:250px">

            </select>  
            </td>
          </tr>
          <tr>
            <td>Modelo:</td>
            <td colspan="2">
                        <div class="errorMessage" id="VehicleClient_model_em_" style="display:none"></div>             
               <?php echo $form->error($vehicle,'model'); ?>
            <?php // echo $form->textField($vehicle,'model',array("style"=>"width:150px;")); ?> 
                <select   id="VehicleClient_model" type="text" maxlength="100" name="VehicleClient[model]" style="width:130px;">
				 <option value="0">Seleccione un vehículo</option>
                    
					<?php 
					
					foreach($versions as $version): ?>
					<?php if($version->id != 32 && $version->id != 34 && $version->id != 35 && $version->id != 36 && $version->id != 51 ){ ?>
                    <option value="<?php echo $version->vehicle->name." ".$version->motor." ".$version->type." ".$version->transmission." " ?>">
                        <?php 
                        
                        echo strtoupper($version->vehicle->name." ".$version->motor." ".$version->type." ".$version->transmission." ");
                        if($version->ac=="YES"){
                            echo "A/C"." ";
                        }
                        if($version->abs=="YES"){
                            echo "ABS"." ";
                        }
                        ?>
                    </option>
				
                  <?php } endforeach; ?>
                    <option value="Otro">OTRO</option>
                    </select>
            </td>
            </tr>
            <tr>
            	<td>Año:</td>
            	<td>
           		 <input style="width:35px;" class="number" name="VehicleClient[year]" id="VehicleClient_year" type="text" maxlength="4"> 
            	<?php echo $form->error($vehicle,'year'); ?>
              </td>
                <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Chasis:</td>
            <td colspan="2">         
            <input style="width:100px;"  name="VehicleClient[chasis]" id="VehicleClient_chasis" type="text" maxlength="12"> </td>
          </tr>
              
           <tr>
           	<td>&nbsp;</td>
            <td colspan="2"><div class="eje-placa"><strong>Ej:</strong>MNTCCGD40B600172</div></td>
          </tr>
                                     <tr>
            <td>Placa:</td>
            <td colspan="2">
                
        
            <?php echo $form->textField($vehicle,'license_plate',array("style"=>"width:130px;")); ?>
            <?php echo $form->error($vehicle,'license_plate'); ?> 
            
            </td>
            <td colspan="2">
                
                
            </td>
                       
          </tr>
                <tr>
          	<td colspan="1">&nbsp;</td>
            <td colspan="3"><span class="eje-placa"><strong>Particular:</strong>PJL0548 | <strong>Diplomático:</strong>CD1003</span></td>
          </tr>	
        </tbody>
        </table>
        <?php echo $form->error($vehicle,'kilometer'); ?><br><br>
         <br><br>
          <br>
    </div>
    <div id="part_3">
    <h2 id="title_client_info">Peticiones, Quejas y Recomendaciones</h2>
		<table width="290px" border="0" cellspacing="3" cellpadding="3" align="center">
	
         <tr>
	  	<td>Detalle:</td>
	  </tr>        
 	<tr id="identity" style="display: table-row;">
            <td>
		<select name="Suggestion[type]" id="suggestion" style="width:250px">
                    <option value="PETICIÓN">Petición</option>
                    <option value="QUEJA">Queja</option>
                 
					<option value="RECOMENDACIÓN">Recomendación</option>
                </select>    
            </td>
          </tr>
	  <tr>
	  	<td>Servicio:</td>
	  </tr>
	  <tr>
            <td>
		  	<select name="Suggestion[type2]" style="width:250px" id="selectServicio">
                <option>Vehículos Nuevos</option>
                <option>Servicio Técnico</option>
                <option>Repuestos</option>
	    		<option>Otros</option>
            </select>    
            </td>
          </tr>   
 	      
	  <tr>
            <td>
            	Descripción: 
            </td>
          </tr> 
          <tr>
            <td>
            	<textarea name="Suggestion[description]" class="text-sugerencia"></textarea> 
                <?php echo $form->error($suggestion,'description'); ?>
            </td>
               
          </tr>   
                    <tr>
                          <td><input type="submit" value="Enviar" name="siguiente" class="btn_siguiente2" style="margin-top:10px;"></td>
                    </tr>        
        </table>
    	
    	
    </div>
      <?php $this->endWidget(); ?>

</div>
         <div class="aniWrap">
    <div class="mouse">
    <div class="scroller">
    </div>
    <div class="arrow">
    </div>
  </div>  
</div>
<!--  <div id="barra_txtf">"Este formulario no es un cotizador en línea, es una solicitud de cotización. Nuestro asesor de Repuestos se comunicará con usted a la brevedad posible."</div>-->
  <div id="barra_localizador">Tenemos más de 20 concesionarios a nivel nacional y estaremos gustosos en atenderle.</div>

      <script type="text/javascript">
      
      
      $(document).ready(function() {
            $("#city").click(function(event){
                   $("#concessioner").html("");
				    var z =$("<option>Seleccione un concesionario</option>");
				    $("#concessioner").append(z);
                            $.ajax({
                      url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/Site/loadConcessioner",
                    cache: false,
                    type: "POST",
                    dataType: "json", 
                    async: false,
                    data:{
                        city_id:$('#city').val()

                    },
                     success: function(data) {
					  
                    $.map( data, function( val, i ) {
                        //if(val.id!=='2'){
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                          aux.html(val.name+" ("+val.address+")");
                        $("#concessioner").append(aux);
                       // }
                    });


                     }
                     
              
           });
    
            });
            $("#work").change(function(){
              if( $(this).val() === "Mantenimiento Preventivo"){
       
           $("#additional_work").hide();  
                       $("#km_work").show();  
                       $("#aw_cont").hide();

    }else {
        if($(this).val() === "Mantenimiento Preventivo con Trabajos Adicionales"){
             $("#additional_work").show();  
                       $("#km_work").show();  
                       $("#aw_cont").hide();  
        }
    
        else{

          $("#additional_work").show();      
                        $("#km_work").hide();
                         $("#aw_cont").hide();

    }
               
    }      });
    $("#person_select").change(function(){
              if( $(this).val() === '0'){
        $("#title_client_info").html("Información Personal");
           $("#identity").show();  
                       $("#ruc").hide();  
                       $("#social").hide();
                       $("#label_contact").hide();
                       

    }else{
   $("#title_client_info").html("Información Jurídica");
          $("#identity").hide();  
                       $("#ruc").show();  
                       $("#social").show();
                         $("#label_contact").show();

    }
               
            });
            
            
            
        $("#city").change(function(){
              if( $(this).val() === "11"){
       
          
                       $("#pyp").show();      

    }else{

      
                        $("#pyp").hide();

    }
               
            });  
        $("#concessioner").change(function(){
            /*if($("#city").val()==="11"){
              	if( $(this).val() === "5" || $(this).val() === "6" || $(this).val() === "7"){
                    $("#pyp").hide();      
    			}else{
                    $("#pyp").show();
    			}
            }*/
            var options='<option>Vehículos Nuevos</option>'+
                '<option>Servicio Técnico</option>'+
                '<option>Repuestos</option>'+
	    		'<option>Otros</option>';
            if($(this).val()=='11' || $(this).val()=='14'){
            	options='<option>Vehículos Nuevos</option>'+
                '<option>Servicio Técnico</option>'+
	    		'<option>Otros</option>';
            }
            $('#selectServicio').html(options);
        });

    $("#aw").change(function() {  
        if($("#aw").is(':checked')) {  
            $("#additional_work").show();
        } else {  
             $("#additional_work").hide();  
        }  
    });        
                    
    
         
            $('.number').keydown(function(event) {
                // Allow special chars + arrows 
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                    || event.keyCode == 27 || event.keyCode == 13 
                    || (event.keyCode == 65 && event.ctrlKey === true) 
                    || (event.keyCode >= 35 && event.keyCode <= 39)){
                        return;
                }else {
                    // If it's not a number stop the keypress
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
            });
    });
     

      </script></div><!-- content -->
</div>
<script type="text/javascript">
                               $(function () {
             var $win = $(window);

             $win.scroll(function () {
                 if ($win.scrollTop() >= 50)
                      $(".aniWrap").fadeIn("normal");
                 if ($win.scrollTop() == 0)
                      $(".aniWrap").fadeOut("normal");
                else if ($win.height() + $win.scrollTop()
                                == $(document).height()) {
                      $(".aniWrap").fadeOut("normal");
                 }
             });
         });
</script>
