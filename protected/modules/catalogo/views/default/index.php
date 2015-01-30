<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalogos Nissan</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/mobile-nissan.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/queries-nissan.css" type="text/css" rel="stylesheet"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<section class="cont-pagina">
  	<section class="modulos">
      	<h1>SOLICITUD DE CATÁLOGO</h1>
    	<div class="cont-formulario">
      		<div class="botoneras">
          		<ul>
              		<li id="btn-1" class="seleccion"><img id="paso_0" src="images/modulos/btn-infopersonal-hover.jpg" /></li>
            		<li id="btn-2"><img id="paso_1" src="images/modulos/btn-escojasumodelo.jpg" /></li>
                	<li id="btn-3"><img id="paso_2" src="images/modulos/btn-descargue.jpg" /></li>
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
            					'onsubmit'=>"return false;",/* Disable normal form submit */
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
                       	<h1>Selecciona los modelos de vehículos</h1>
                       	<?php foreach ($catalogs as $i => $catalog) { ?>
                       		<div class="carros-check">
                          		<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/<?php echo $catalog->vehicle->pictures[0]->description ?>"/>
                          		<input type="checkbox" id="c<?php echo $catalog->id ?>" class="cb" />
                            	<label for="c<?php echo $catalog->id ?>"><?php echo $catalog->description ?></label>
                       		</div>
                       	<?php } ?>
                       <button class="btns-submit-sc">Siguiente</button>
                  	</div>

                    <div class="formularios-mod" id="f-catalogos">
                       <h1>Descarga los Catalogos</h1>
                       <div id="pdfs"></div>
                    </div>
                </div>
               	<!-- -->
            </div>
        </div>
    </section>
    
</section>

<script type='text/javascript'>
	var paso=0;
	$(function() {
		var pictures=<?php echo CJSON::encode($pictures) ?>;
		var files=<?php echo CJSON::encode($files) ?>;
 		$('#f-infopersonal').hide();
 		$('#f-vehiculos').hide();
 		$('#f-catalogos').hide();

    	validarPasos();
    	$('.btns-submit-sc').prop('disabled',true);

		$('.cb').change(function () {
			if($("input:checked").length>0){
				$('.btns-submit-sc').prop('disabled',false);
			}
			else{
				$('.btns-submit-sc').prop('disabled',true);
			}
		})

		$('.btns-submit-sc').click(function () {
			console.log('finalizar');
			var cb=[];
			$("input:checked").each(function (i) {
				cb.push($(this).attr('id').substr(1));
			});
			var dataUser=$("#client-form").serializeArray();
			dataUser.push({name: 'selection', value: cb});
			$.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/catalogo/default/completeRegistrationAjax', dataUser).done(function (response) {
				console.log(response);
				if(response=="true"){
					paso++;
					validarPasos();
					var html='';
					for(i in cb){
						html+='<div class="carros-check">'+
                    		'<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/'+pictures[cb[i]-1]+'" alt="auto nissan"/>'+
                        	'<a href="http://nissan.com.ec/sp/web/nscuploader/pdf/'+files[cb[i]-1]+'" download>'+
                        		'<img src="images/btn-descargarpdf.png" alt="btn descargar"/>'+
                    		'</a>'+
                       	'</div>';
                   	}
					$('#pdfs').append(html);
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
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-descargue.jpg");
            break;
        case 1: 
            $("#f-vehiculos").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-descargue.jpg");
            break;
        case 2: 
            $("#f-catalogos").show("drop");
            $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-infopersonal-hover.jpg");
            $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-escojasumodelo-hover.jpg");
            $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/modulos/btn-descargue-hover.jpg");
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
