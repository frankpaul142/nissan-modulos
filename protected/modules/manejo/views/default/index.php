<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba de Manejo Nissan</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/mobile-nissan.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/queries-nissan.css" type="text/css" rel="stylesheet"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section class="cont-pagina">
  	<section class="modulos">
      	<h1>PRUEBA DE MANEJO</h1>
        <div class="cont-formulario">
          	<div class="botoneras">
              	<ul>
                  	<li id="btn-1" class="seleccion"><img id="paso_0" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg" /></li>
                	<li id="btn-2"><img id="paso_1" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-sconcesionario.jpg" /></li>
                    <li id="btn-3"><img id="paso_2" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal.jpg" /></li>
                </ul>
            </div>
            <!-- FORMULARIO MODULOS -->
            <div class="formularios-mod2">
            	<!-- SOLICITE SU CITA -->
                <div id="modulo-fase1">
                	<div class="modulo-int-izq">
                    	<div id="first_car_cont"><img id="first_car_img" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" /></div>
                    	<div id="second_car_cont"><img id="second_car_img" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" /></div>
                        <div id="car_name" class="n-auto-modulos">Escoja un modelo</div>
                        <div id="car_name3" class="n-auto-modulos" style="display: none;">Escoja un modelo</div>
                        <div class="btn-modelos">
                        	<a href="javascript:void(0)" id="btn-c">Modelo de preferencia</a> 
                        </div>
                        <div class="btn-modelos">
                        	<a href="javascript:void(0)" id="btn-c2">Modelo alternativo</a> 
                        </div>
                    </div>
                    <div class="modulo-int-der" id="cotizacion">
                    	<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'vehicle-version-form',
        					'action'=>Yii::app()->createUrl('/manejo/Default/validateRegisterVehicleDataAjax'),
        					'enableClientValidation'=>false,
							'enableAjaxValidation'=>true,
        					'clientOptions'=>array(
            					'validateOnSubmit'=>true,            
            					'afterValidate'=>'js:validateUserData'            
							),
        					'htmlOptions'=>array(
            					'onsubmit'=>"return false;",
        					),
						)); ?>
                        <div class="cont-inputs">
                            <label>Modelo de Preferencia:</label>
                            <select id="vehicle_1">
                                <option value="" selected="selected">selecciona un vehículo</option>
                     			<?php foreach($vehicles as $vehicle): ?>           
					          		<?php if($vehicle->id!=6 && $vehicle->id!=9  && $vehicle->id!=13){ ?>
                  						<option value="<?php echo $vehicle->id ?>" car_name="<?php echo $vehicle->name ?>" <?php if($modelo==$vehicle->id) echo 'selected="selected"' ?>><?php echo $vehicle->name ?></option> 
                         		<?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="cont-inputs">
                            <label>Versión:</label>
                            <select id="Drive_vehicle_version_id" name="Drive[vehicle_version_id]">
                                <option value="" selected="selected">selecciona una versión</option>
                            </select>
                            <?php echo $form->error($model,'vehicle_version_id', array('class'=>"error-mg")); ?> 
                        </div>
                        <div class="cont-inputs">
                            <label>Modelo Alternativo:</label>
                            <select id="vehicle_2">
                            	<option value="" selected="selected">selecciona un vehículo</option>
                            	<?php foreach($vehicles as $vehicle): ?>
					          		<?php if($vehicle->id!=6 && $vehicle->id!=9  && $vehicle->id!=13){ ?>
                  						<option value="<?php echo $vehicle->id ?>" car_name="<?php echo $vehicle->name ?>"><?php echo $vehicle->name ?></option>
                         		<?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="cont-inputs">
                            <label>Versión:</label>
                            <select id="Drive_vehicle_version_id2" name="Drive[vehicle_version_id2]">
                                <option value="" selected="selected">selecciona una versión</option>
                            </select>  
                            <?php echo $form->error($model,'vehicle_version_id2', array('class'=>"error-mg")); ?>
                        </div>
                        <?php echo CHtml::submitButton('Siguiente',array('id'=>'siguiente-1','class'=>'btns-submit')); ?>
                        <?php $this->endWidget(); ?>
                    </div>

                    <div class="modulo-int-der" id="donde-comprar">
                    	<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'concessioner-form',
        					'action'=>Yii::app()->createUrl('/manejo/Default/validateRegisterVehicleDataAjax'),
        					'enableClientValidation'=>false,
							'enableAjaxValidation'=>true,
        					'clientOptions'=>array(
					            'validateOnSubmit'=>true,            
					            'afterValidate'=>'js:validateUserData'            
							),
        					'htmlOptions'=>array(
            					'onsubmit'=>"return false;",
        					),
						)); ?>
                        <div class="cont-inputs">
                            <label>Ciudad:</label>
                            <select name="city" id="city">
                                <option value="0" selected="selected">Selecciona una ciudad</option>
								<?php foreach ($cities as $city){ ?>
                              		<option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="cont-inputs">
                            <label>Concecionario:</label>
                            <select name="Drive[concessioner_id]" id="Drive_concessioner_id">
                                <option value="">Selecciona un concesionario</option>
                            </select>
                            <?php echo $form->error($model,'concessioner_id', array('class'=>"error-mg")); ?>
                        </div>
                        <?php echo CHtml::submitButton('Siguiente',array('id'=>'siguiente-2','class'=>'btns-submit')); ?>
                        <?php $this->endWidget(); ?>
                    </div>

                    <div class="modulo-int-der" id="info-usuario">
                    	<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'client-form',
					        'action'=>Yii::app()->createUrl('/manejo/Default/validateRegisterUserDataAjax'),
					        'enableClientValidation'=>false,
							'enableAjaxValidation'=>true,
					        'clientOptions'=>array(
					            'validateOnSubmit'=>true,            
					            'afterValidate'=>'js:validateUserData'            
							),
					        'htmlOptions'=>array(
					            'onsubmit'=>"return false;",
					        ),
						)); ?>
                        <div class="cont-inputs">
                            <label>Nombre:</label>
                            <?php echo $form->textField($client,'name'); ?>
                            <?php echo $form->error($client,'name',array('class'=>'error-mg')); ?>
                        </div>
                        <div class="cont-inputs">
                            <label>Apellido:</label>
                            <?php echo $form->textField($client,'lastname'); ?>
                            <?php echo $form->error($client,'lastname',array('class'=>'error-mg')); ?>  
                        </div>
                        <div class="cont-inputs">
                            <label>Cédula:</label>
                            <?php echo $form->textField($client,'identity',array('class'=>'number')); ?>
                            <?php echo $form->error($client,'identity',array('class'=>'error-mg')); ?>
                        </div>
                        <div class="cont-inputs">
                            <label>E-mail:</label>
                            <?php echo $form->textField($client,'email'); ?>
                            <?php echo $form->error($client,'email',array('class'=>'error-mg')); ?>
                        </div>
                        <div class="cont-inputs">
                            <label>Teléfono:</label>
                            <?php echo $form->textField($client,'phone',array('class'=>'number', 'placeholder'=>'Ej: 022345678')); ?>
                            <?php echo $form->error($client,'phone',array('class'=>'error-mg')); ?>
                        </div>
                        <div class="cont-inputs">
                            <label>Celular:</label>
                            <?php echo $form->textField($client,'cellphone',array('class'=>'number', 'placeholder'=>'Ej: 0997854321')); ?>
                            <?php echo $form->error($client,'cellphone',array('class'=>'error-mg')); ?>
                        </div>
                        <div class="cont-inputs">
                            <label>Hora de Contacto:</label>
                            <select name="Client[preference_contact2]">
	                            <option value="8:00 am - 10:00 am"> 8:00 am - 10:00 am </option>  
	                            <option value="10:00 am - 12:00 pm"> 10:00 am - 12:00 pm </option>
	                            <option value="12:00 pm - 2:00 pm"> 12:00 pm - 2:00 pm </option>
	                            <option value="2:00 pm - 4:00 pm"> 2:00 pm - 4:00 pm </option>
	                            <option value="4:00 pm - 6:00 pm"> 4:00 pm - 6:00 pm </option>
	                        </select>
                        </div>
                        <div class="cont-inputs">
                            <label>Contactar por:</label>
                            <?php $condition=  array('E-mail' => 'E-mail', 'Teléfono' => 'Teléfono', 'Email y teléfono' => 'Email y Teléfono');
                  	 		echo $form->dropDownList($client,'preference_contact', $condition, array('prompt'=>'Selecciona una opción')); 
                 			echo $form->error($client,'preference_contact',array('class'=>'error-mg')); ?>
                        </div>
                         <?php echo $form->hiddenField($client,'medio',array("value"=>$medio)); ?>
                        <?php echo CHtml::submitButton('Finalizar',array('id'=>'siguiente-3','class'=>'btns-submit')); ?>
                    	<?php $this->endWidget(); ?>
                    </div>
                    <div class="modulo-int-der" id="solicitud-finalizada">
                    	<div class="txt-envio">
                        	Su envío se realizó con éxito.<br/>
                            Gracias por ser parte de la comunidad NISSAN
                            <br/><br/>
                        	Hemos recibidos su mensaje.<br/>
                            En las próximas 48 horas, uno de nuestros asesores<br/>
                            se comunicará con usted.
                        </div>
                        <div class="img-botones-links"> </div>
                        <div class="img-botones-links2"><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-soliciteCotizacion.png" /></a></div>
                    </div>
                    
                </div>
               <!-- --> 
                
            </div>
        </div>
    </section>
    
</section>


        
<script type='text/javascript'>
  	var paso=0;

	$(document).ready(function() {
    	validarPasos();
		$('#second_car_cont').hide();

      	$("#solicitar-nueva").click(function(){
        	location.reload();
        });

        <?php if($modelo!=''){ ?>
            $('#vehicle_1').val(<?php echo $modelo ?>);
            $("#Drive_vehicle_version_id").html("");
            $.ajax({
                url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/manejo/Default/loadVersionVehicle",
                cache: false,
                type: "POST",
                dataType: "json", 
                async: false,
                data:{
                    vehicle_id:$('#vehicle_1').val()
                },
                success: function(data) {
                    $.map( data, function( val, i ) {
                        if(val.id){
                            var z="";
                            var y="";
                            if(val.ac=='YES'){
                                z="AC";
                            }
                            if(val.abs=='YES'){
                                y="ABS";
                            }
                            var aux= $("<option></option>");              
                            aux.attr("class","selectOption");
                            aux.attr("value",val.id);
                            aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                            $("#Drive_vehicle_version_id").append(aux);
                        }
                    });
                    $("#car_name").html(data.name);
                    $("#first_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
                }                  
            });
        <?php } ?>
       	$('#vehicle_1').change(function(){
           	$("#Drive_vehicle_version_id").html("");
            $.ajax({
              	url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/manejo/Default/loadVersionVehicle",
                cache: false,
                type: "POST",
                dataType: "json", 
                async: false,
                data:{
                    vehicle_id:$(this).val()
                },
             	success: function(data) {
                	$.map( data, function( val, i ) {
                        //console.log(val);
                        if(val.id){
                        	var z="";
                         	var y="";
	                        if(val.ac=='YES'){
	                          	z="AC";
	                        }
	                       	if(val.abs=='YES'){
	                          	y="ABS";
	                        }
	                        var aux= $("<option></option>");              
	                        aux.attr("class","selectOption");
	                        aux.attr("value",val.id);
	                        aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
	                        $("#Drive_vehicle_version_id").append(aux);
                        }
                    });
                  	$("#car_name").html(data.name);
                    $("#first_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
             	}                  
           	});
        });  

		$("#city").change(function(event){
           	$("#Drive_concessioner_id").html("");
            $.ajax({
              	url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/manejo/Default/loadConcessioner",
               	cache: false,
                type: "POST",
                dataType: "json", 
                async: false,
                data:{
                    city_id:$('#city').val()
               	},
             	success: function(data) {
                 	var def =$("<option></option>");
                 	def.val("");
                 	def.html("Seleciona un concesionario");
                 	$("#Drive_concessioner_id").append(def);
                    $.map( data, function( val, i ) {                 
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                        aux.attr("name_c",val.name);
                        aux.attr("phone",val.phone);
                        aux.attr("address",val.address);
                        aux.html(val.name+" "+val.address);
                        $("#Drive_concessioner_id").append(aux);
                    });
             	}                 
           	});
        });

		$('#vehicle_2').change(function(){
           	$("#Drive_vehicle_version_id2").html("");
            $.ajax({
              	url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/manejo/Default/loadVersionVehicle",
               	cache: false,
                type: "POST",
                dataType: "json", 
                async: false,
                data:{
                    vehicle_id:$(this).val()
                },
             	success: function(data) {
                    $.map( data, function( val, i ) {
                       	if(val.id){
                           	var z="";
                         	var y="";
                        	if(val.ac=='YES'){
                          		z="AC";
                         	}
                           	if(val.abs=='YES'){
                          		y="ABS";
                         	}
                        	var aux= $("<option></option>");
                        	aux.attr("class","selectOption");
                         	aux.attr("value",val.id);
                        	aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        	$("#Drive_vehicle_version_id2").append(aux);
                       	}
                    });
             		$("#car_name3").html(data.name);
	  				$("#second_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
             	}
           	});
        });

     	$('#btn-c').click(function(){
          	$('#first_car_cont').show();
         	$('#second_car_cont').hide();
     		$("#car_name").show();
         	$("#car_name3").hide();
       	});

        $('#btn-c2').click(function(){
         	$('#first_car_cont').hide();
         	$('#second_car_cont').show();
          	$("#car_name3").show();
         	$("#car_name").hide();
       	});

        $('#Drive_concessioner_id').change(function(){
           	$('#name_concessioner').html( $('option:selected', this).attr('name_c'));
           	$('#address_concessioner').html( $('option:selected', this).attr('address'));
           	$('#phone_concessioner').html( $('option:selected', this).attr('phone'));
            $("#info_concessioner").show("drop");
       	});


		$(".btnAtras").click(function(){
    		paso--;
    		validarPasos();
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

function validarPasos(){    
    $(".modulo-int-der").hide();
    switch(paso){
        case 0: 
            $("#cotizacion").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-sconcesionario.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal.jpg");
            break;
        case 1:
            $("#donde-comprar").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-sconcesionario-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal.jpg");
            break;
        case 2:
            $("#info-usuario").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-sconcesionario-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            break;
        case 3:
            register();
            $("#solicitud-finalizada").show("drop");
            $("#paso_0").hide();
            $("#paso_1").hide();
            $("#paso_2").hide();
            //$("#btn-c").hide();
            //$("#btn-c2").hide();
            break;
        default: 
        	$("#cotizacion").show("drop");
    }
}

function validateUserData(form, data, hasError){
    if(!hasError){
        paso++;
        validarPasos();
    }
}
function register(){
    console.log("registrando");
    var dataUser=$("#client-form").serialize();
    var dataConcessioner=$("#concessioner-form").serialize();
    var dataVehicle= $("#vehicle-version-form").serialize();
    $.ajax({
     	type: 'POST',
     	url: '<?php echo Yii::app()->request->getBaseUrl(true); ?>/manejo/Default/completeRegistrationAjax',
     	data:dataUser+"&"+dataConcessioner+"&"+dataVehicle,
     	dataType:'json',
     	success:function(data){
            $("#mensajeRegistro").html(data["transactionMessage"]);
            if(data["login"]){
                window.location.href = "<?php echo Yii::app()->createAbsoluteUrl("community/planrecommended") ?>";
            }
       	},
     	error: function(data) { // if error occured
         	$("#mensajeRegistro").html(data);
     	}
    });
}

</script>