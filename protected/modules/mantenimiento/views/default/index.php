<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rutinas de Mantenimiento Nissan</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/mobile-nissan.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/queries-nissan.css" type="text/css" rel="stylesheet"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<section class="cont-pagina">
  	<section class="modulos">
      	<h1>RUTINAS DE MANTENIMIENTO</h1>
    	<div class="cont-formulario">
      		<div class="botoneras">
          		<ul>
              		<li id="btn-1" class="seleccion"><img id="paso_0" src="images/modulos/btn-infopersonal-hover.jpg" /></li>
            		<li id="btn-2"><img id="paso_1" src="images/modulos/btn-escojasumodelo.jpg" /></li>
                	<li id="btn-3"><img id="paso_2" src="images/modulos/btn-rutina.jpg" /></li>
            	</ul>
        	</div>
            <!-- FORMULARIO MODULOS -->
            <div class="formularios-mod2">
              	<!-- SOLICITE SU CITA -->
                <div id="modulo-fase1">

                    <div class="formularios-mod" id="f-infopersonal">
                        <h1>Información Personal</h1>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'client-form',
                            'action'=>Yii::app()->createUrl('/catalogo/Default/validateRegisterUserDataAjax'),
                            'enableClientValidation'=>false,
                            'enableAjaxValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,            
                                'afterValidate'=>'js:validateUserData'            
                            ),
                            'htmlOptions'=>array(
                                'onsubmit'=>"return false;",// Disable normal form submit 
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
                        <?php echo $form->hiddenField($client,'medio',array("value"=>$medio)); ?>
                        <?php echo CHtml::submitButton('Siguiente',array('id'=>'siguiente-1','class'=>'btns-submit')); ?>
                        <?php $this->endWidget(); ?>
                    </div>

                    <div class="formularios-mod" id="f-vehiculos">
	                    <!-- <div class="modulo-int-izq">
	                        <img src="<?php //echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" alt="autos nissan"/>
	                        <div class="n-auto-modulos">Escoja un modelo</div>
	                    </div> -->
	                    <!-- <div class="modulo-int-der"> -->
	                        <div class="cont-inputs">
	                            <label>Modelo de Vehículo:</label>
	                            <select id="slModelo">
	                            <?php foreach ($mantenimientos as $i => $mantenimiento) { ?>
	                                <option value="<?php echo $mantenimiento->vehicle->id ?>"><?php echo $mantenimiento->vehicle->model ?></option>
	                            <?php } ?>
	                            </select>  
	                            <!-- <div class="error-mg">*Este campo no puede ser nulo</div> -->
	                        </div>
	                        <div class="cont-inputs">
	                            <label>Kilometraje Actual:</label>
	                            <select id="slKm">
	                                <?php foreach ($kms as $i => $km) { ?>
	                                    <option value="<?php echo $km->km ?>"><?php echo $km->km ?></option>
	                                <?php } ?>
	                            </select>  
	                            <!-- <div class="error-mg">*Este campo no puede ser nulo</div>   -->
	                        </div>
	                        <input type="submit" value="Siguiente" class="btns-submit-sc"/>
	                    <!-- </div> -->
                    </div>
                    
                    <div class="formularios-mod" id="f-rutinas">
	                    <!-- <div class="modulo-int-der"> -->
	                    	<span id="modeloEscogido"></span>
	                        <div id="trabajos-realizar">
	                            <div class="cont-caracteristica">
	                                <div class="tit-caracteristicaint">Accionamiento de vidrios</div>
	                                <div class="det-caracteristicaint">Eléctrico en las 4 puertas (Sistema automático, lado conductor) Eléctrico en las 4 puertas (Sistema automático, lado conductor)</div>
	                            </div>
	                            <div class="cont-caracteristica2">
	                                <div class="tit-caracteristicaint">Accionamiento de vidrios</div>
	                                <div class="det-caracteristicaint2">Eléctrico en las 4 puertas (Sistema automático, lado conductor) Eléctrico en las 4 puertas (Sistema automático, lado conductor)</div>
	                            </div>
	                        </div>
	                        <div>
	                        	<p>&nbsp;</p>
	                        	<p style="font-size: small;">* Precios incluyen costo de Repuestos, Mano de obra e IVA.</p>
	                        	<p style="font-size: small;">** Aplica para vehículos con regulación en el tiempo de ignición</p>
	                        	<p style="font-size: small;">*** Vehículos 4x2</p>
	                        	<p style="font-size: small;">**** Vehículos 4x4</p>
	                        	<p style="font-size: small;">***** Vehículos con A/C</p>
	                        	<p style="font-size: small;">****** No incluye el cambio de partes que por su naturaleza de desgaste debido al uso normal o severo, no se consideran dentro del mantenimiento</p>
	                        </div>
	                        <a id="aPdf" href="" target="_blank"><div class="img-botones-links"><img src="images/btn-descargarpdf.png" alt="Calcule su cuota"/></div></a>
	                        <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>"><div class="img-botones-links2"><img src="images/btn-agendamientocitas.png" alt="Cotizacion"/></div></a>
	                    <!-- </div> -->
					</div>
                </div>
            </div>
        </div>
    </section>
    
</section>

<script type='text/javascript'>
	var paso=0;
	$(function() {
		//var pictures=<?php //echo CJSON::encode($pictures) ?>;
		//var pdfs=<?php //echo CJSON::encode($files) ?>;
 		$('#f-infopersonal').hide();
 		$('#f-vehiculos').hide();
 		$('#f-rutinas').hide();

    	validarPasos();
    	
		$('.btns-submit-sc').click(function () {
			// console.log('finalizar');
			var dataUser=$("#client-form").serializeArray();
			dataUser.push({name: 'vehicle_id', value: $('#slModelo').val()});
			dataUser.push({name: 'km', value: $('#slKm').val()});
			//console.log(dataUser);
			$.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/mantenimiento/default/completeRegistrationAjax', dataUser).done(function (response) {
				if(response.substr(0,3)!="no "){
					$('#modeloEscogido').text($('#slModelo option:selected').text());
					var data=JSON.parse(response);
					paso++;
					validarPasos();
					var html='';
					for(i in data){
						if(i=='pdf'){
							if(data[i]==null){
								$('#aPdf').hide();
							}
							else{
								$('#aPdf').attr('href','http://www.nissan.com.ec/sp/web/nscuploader/pdf/rutinas/'+data[i]);
							}
						}
						else{
							if(i%2==0){
								html+='<div class="cont-caracteristica">'+
		                                '<div class="tit-caracteristicaint">'+$('#slKm').val()+'</div>'+
		                                '<div class="det-caracteristicaint">'+data[i]+'</div>'+
		                            '</div>';
		                    }
		                    else{
		                    	html+='<div class="cont-caracteristica2">'+
		                                '<div class="tit-caracteristicaint">'+$('#slKm').val()+'</div>'+
		                                '<div class="det-caracteristicaint2">'+data[i]+'</div>'+
		                            '</div>';
		                    }
		                }
                   	}
					$('#trabajos-realizar').html(html);
				}
			});
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
    $(".formularios-mod").hide();        
    switch(paso){
        case 0: 
            $("#f-infopersonal").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-rutina.jpg");
            break;
        case 1: 
            $("#f-vehiculos").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-rutina.jpg");
            break;
        case 2: 
            $("#f-rutinas").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-rutina-hover.jpg");
            break;
    }
}
function validateUserData(form, data, hasError)
{   
    if(!hasError){
        paso++;
        validarPasos();
    }
}

</script>
