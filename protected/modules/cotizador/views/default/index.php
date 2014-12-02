<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cotizacion Nissan</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/fotorama.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/style-cotizador.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/queries-cotizador.css" rel="stylesheet" type="text/css" />

<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/fotorama.js"></script>
</head>
<body>
	<div class="contenido-cotiza">
    	<!--<div class="banner-principal">
       		<div class="fotorama" data-width="100%" data-autoplay="6000" data-loop="true" data-arrows="true" data-transition="dissolve">
                	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/FRONTIER.png" alt="Nissan Frontier"/>
                	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/MURANO.png" alt="Nissan Murano"/>
                	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/QASHQAI.png" alt="Nissan Qashqai"/>
                	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/banner/X-TRAIL.png" alt="Nissan X-trail"/>
                </div>
		<div class="logotipo2"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-nissan.jpg" width="100" alt="logo nissan"/></div>
        </div>
-->
                <div class="barra-btn">
                    <img id="paso_0" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-1over.jpg"/>
                    <img id="paso_1" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-2.jpg"/>
                    <img id="paso_2" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-3.jpg"/>
                    <div id="text_end" style="display:none">

                        <h1>Su envío se realizó con éxito.</h1><br/>

                        Gracias por ser parte de la comunidad NISSAN.

                        <br/><br/>

                        Hemos recibido su mensaje, un asesor

                        se comunicará con usted máximo en  las próximas 48 horas.

                	</div>
                </div>
        <div id="car_name" class="titulo-auto">Escoja un modelo</div>
          <div id="car_name3" class="titulo-auto" style="display: none;">Escoja un modelo</div>
                            <div class="img-auto">
                        <div id="first_car_cont" class="auto1"><img id="first_car_img" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" width="438" height="295" alt="auto nissan"/></div>
                        <div id="second_car_cont" class="auto2"><img id="second_car_img" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" width="438" height="295" alt="auto nissan"/></div>
						<!-- -->
                        <div class="botones-autos">
                        <a href="javascript:void(0)" id="btn-c">Modelo de Preferencia &nbsp;|</a>
                        <a href="javascript:void(0)" id="btn-c2">Modelo Alternativo</a>
						</div>
						<!-- -->
                         <div id="info_concessioner" class="info-concesionario" style="display:none;">
                            <div class="tit-concesionario">Concesionario</div>
                            <div class="txt-concesionario">
                               <label class="title_co">Nombre</label> 
							   <label id="name_concessioner"></label><br/>
                               <label class="title_co">Dirección</label> 
							   <label id="address_concessioner"></label><br/>
                                <label class="title_co">Teléfono</label>
								<label id="phone_concessioner"></label><br/>
                            </div>
                        </div>
                    </div>
        <div class="cont-cotizador">
            <!-- Cotizacion -->
            <div id="cotizacion" class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-version-form',
        'action'=>Yii::app()->createUrl('/cotizador/Default/validateRegisterVehicleDataAjax'),
        'enableClientValidation'=>false,
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,            
            'afterValidate'=>'js:validateUserData'            
	),
        'htmlOptions'=>array(
            'onsubmit'=>"return false;",/* Disable normal form submit */
            //'onkeypress'=>"if(event.keyCode == 13){ $(this).submit(); };",
        ),
)); ?>

                <div class="carro-cotizar">
                    <div class="info-formulario">
                        <span class="tit-formulario">Modelo de preferencia</span>
                        <div class='selectBox'>
              <select id="vehicle_1" class="select-n">
                  <option value="" selected="selected">selecciona un vehículo</option>
                     <?php foreach($vehicles as $vehicle): ?>           
					          <?php if($vehicle->id!=6 && $vehicle->id!=9  && $vehicle->id!=13){ ?>
                  <option value="<?php echo $vehicle->id ?>" car_name="<?php echo $vehicle->name ?>" <?php if($modelo==$vehicle->id) echo 'selected="selected"' ?>><?php echo $vehicle->name ?></option> 
                         <?php } endforeach; ?>      
                            </select>
                        </div>
                        <span class="tit-formulario">Versión</span>
                        <div  class='selectBox'>
                            <select id="Quotation_vehicle_version_id" class="select-n" name="Quotation[vehicle_version_id]">
								              <option value="" selected="selected">selecciona una versión</option>
                            </select>
                            <?php echo $form->error($model,'vehicle_version_id'); ?>
                        </div>
                        <span class="tit-formulario">Modelo alternativo</span>
                        <div class='selectBox'>
              <select id="vehicle_2" class="select-n">
				<option value="" selected="selected">selecciona un vehículo</option>
                     <?php foreach($vehicles as $vehicle): ?>           
			<?php if($vehicle->id!=6 && $vehicle->id!=9  && $vehicle->id!=13){ ?>
                  <option value="<?php echo $vehicle->id ?>"><?php echo $vehicle->name ?></option> 
                         <?php } endforeach; ?>      
                            </select>
                        </div>
                        <span class="tit-formulario">Versión</span>
                        <div class='selectBox'>
                            <select id="Quotation_vehicle_version_id2" class="select-n" name="Quotation[vehicle_version_id2]">
									<option value="" selected="selected">selecciona una versión</option>
                            </select>
                            <?php echo $form->error($model,'vehicle_version_id2'); ?>
                        </div>
                        <!-- btns -->
                        <?php //echo $form->hiddenfield($model,'vehicle_version_id'); ?>
<!--                        <input type="submit" class="btn-siguiente-input" id="siguiente-1" value="SIGUIENTE"/>-->
                       <?php echo CHtml::submitButton('SIGUIENTE',array('id'=>'siguiente-1','class'=>'btn-siguiente-input btnSiguiente')); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <!-- Donde comprar -->
            <div id="donde-comprar" class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'concessioner-form',
        'action'=>Yii::app()->createUrl('/cotizador/Default/validateRegisterVehicleDataAjax'),
        'enableClientValidation'=>false,
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,            
            'afterValidate'=>'js:validateUserData'            
	),
        'htmlOptions'=>array(
            'onsubmit'=>"return false;",/* Disable normal form submit */
            //'onkeypress'=>"if(event.keyCode == 13){ $(this).submit(); };",
        ),
)); ?>

                <div class="carro-cotizar">
                    <div class="info-formulario">
                        <span class="tit-formulario">Ciudad</span>
                        <div class='selectBox'>
                                       	<select name="city" id="city" class="select-n">
                    <option value="0" selected="selected">Selecciona una ciudad</option>
									<?php foreach ($cities as $city): ?>
                                                                        <?php if($city->id != 21){ ?>
                                                                        <?php //if(isset($city_id)&&$city_id==$city->id){ ?>
                                                                          <option  value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php }else{ ?>
                                                                                   <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php // }?>
                                                                        <?php } endforeach; ?>
                                        </select>
                        </div>
                        <span class="tit-formulario">Concesionario</span>
                        <div class='selectBox'>
                            <select name="Quotation[concessioner_id]" id="Quotation_concessioner_id" class="select-n">
                                <option value="" >Selecciona un concesionario</option>     
                            </select>
                        	<?php echo $form->error($model,'concessioner_id'); ?>
                        </div>
                        <span class="tit-formulario">Tiempo para adquirir</span>
                        <div class='selectBox'>
                            <select name="Quotation[time]" id="Quotation_time" class="select-n">
						<option value="" selected="selected">Selecciona una opción</option> 
						<option value="7">7 días</option> 
                                <option value="15 dias">15 días</option> 
								 <option value="30 dias">30 días</option> 
                                <option value="1-3 meses">1-3 meses</option> 
                                <option value="3-6 meses">3-6 meses</option> 
							<option value="+6 meses+">+6 meses</option> 
                            </select>
                        </div>
                         <?php echo $form->error($model,'time'); ?>
                         <?php echo CHtml::submitButton('SIGUIENTE',array('id'=>'siguiente-2','class'=>'btn-siguiente-input btnSiguiente')); ?>
                       <a href="javascript:void(0)" class="btn-atras btnAtras">ATRÁS</a>
                    </div>
                </div>
                  <?php $this->endWidget(); ?>
            </div>
            <!-- info usuario -->
            <div id="info-usuario" class="form">
         <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
        'action'=>Yii::app()->createUrl('/cotizador/Default/validateRegisterUserDataAjax'),
        'enableClientValidation'=>false,
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,            
            'afterValidate'=>'js:validateUserData'            
	),
        'htmlOptions'=>array(
            'onsubmit'=>"return false;",/* Disable normal form submit */
            //'onkeypress'=>"if(event.keyCode == 13){ $(this).submit(); };",
        ),
)); ?>
                <div class="carro-cotizar">
                    <div class="info-formulario">
                        <span class="tit-formulario2">Nombres</span>
                            <?php echo $form->textField($client,'name',array("class"=>"input-text","placeholder"=>"Nombres")); ?>
                      		<?php echo $form->error($client,'name',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
                        <span class="tit-formulario2">Apellidos</span>
                        	  <?php echo $form->textField($client,'lastname',array("class"=>"input-text","placeholder"=>"Apellidos")); ?>
                              <?php echo $form->error($client,'lastname',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
                        <span class="tit-formulario2">Cédula o Pasaporte</span>
                              <?php echo $form->textField($client,'identity',array("class"=>"input-text number","placeholder"=>"Cédula")); ?>
                              <?php echo $form->error($client,'identity',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
                        <span class="tit-formulario2">E-mail</span>
                        	  <?php echo $form->textField($client,'email',array("class"=>"input-text","placeholder"=>"E-mail")); ?>
                              <?php echo $form->error($client,'email',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
                        <span class="tit-formulario2">Teléfono</span>
                          	  <?php echo $form->textField($client,'phone',array("class"=>"input-text number","placeholder"=>"Teléfono")); ?>
                              <?php echo $form->error($client,'phone',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
						<div class="fecha-ejemplo"><strong>Ej:</strong>022345678</div>
                        <span class="tit-formulario2">Celular</span>
                        	  <?php echo $form->textField($client,'cellphone',array("class"=>"input-text number","placeholder"=>"Celular")); ?>
                              <?php echo $form->error($client,'cellphone',array('style'=>'left:0px !important; position:relative !important; margin-left:200px !important;')); ?>
						<div class="fecha-ejemplo"><strong>Ej:</strong>0997854321</div>
                        <span class="tit-formulario">Preferencia de contacto</span>
                        <div class='selectBox'>
                     		 <?php 
                       				$condition=  array('E-mail' => 'E-mail', 'Teléfono' => 'Teléfono', 'Email y teléfono' => 'Email y Teléfono');
                      	 		echo $form->dropDownList($client,'preference_contact', $condition, array('prompt'=>'Selecciona una opción','class'=>'select-n')); 
                     		 ?> 
<?php echo $form->error($client,'preference_contact',array('style'=>'left:0px !important; position:relative !important;')); ?>
                        </div>
						                <span class="tit-formulario">Nos localizó desde</span>
                         <div class='selectBox'>
                            <?php 
                       			$localize=  array('Facebook' => 'Facebook', 'Twitter' => 'Twitter', 'Youtube' => 'Youtube', 'Blog' => 'Blog', 'Google' => 'Google', 'Conocía nuestra web' => 'Conocía nuestra web');
                      	 		echo $form->dropDownList($client,'localize', $localize, array('prompt'=>'Opcional','class'=>'select-n')); 
                     		 ?> 
                               </div>
                               <?php echo $form->hiddenField($client,'medio',array("value"=>$medio)); ?>
                        <span class="tit-formulario2">Hora de Contacto</span>
                        <select name="Client[preference_contact2]" class="select-n">
                            <option value="8:00 am - 10:00 am"> 8:00 am - 10:00 am </option>  
                            <option value="10:00 am - 12:00 pm"> 10:00 am - 12:00 pm </option>
                            <option value="12:00 pm - 2:00 pm"> 12:00 pm - 2:00 pm </option>
                            <option value="2:00 pm - 4:00 pm"> 2:00 pm - 4:00 pm </option>
                            <option value="4:00 pm - 6:00 pm"> 4:00 pm - 6:00 pm </option>
                        </select>
                        <!-- btns -->
                            <?php echo CHtml::submitButton('FINALIZAR',array('id'=>'siguiente-3','class'=>'btn-siguiente-input btnSiguiente')); ?>
                                <a href="javascript:void(0)" class="btn-atras btnAtras">ATRÁS</a>
                    <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <!-- solicitud -->
            <div id="solicitud-finalizada" class="form">
            	<div class="barra-btn">
                <!-- cont izquierda -->                
                <div class="carro-cotizar-der">
                    <div id="car_name2"class="titulo-auto2">XTRAIL 2.5</div>
                    <div class="img-auto">
                        <img id="car_second_final" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" width="438" height="295" alt="auto nissan"/>
                        <a href="#" class="btn-cotizadador" id="solicitar-nueva"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-cotizador.png"/></a>
                        <a href="http://nissan.com.ec/sp/web/nscuploader/gama-nissan.html" target="_blank" class="btn-cotizadador"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-gamaautos.png" style="margin-left: 25px;"/></a>
                    </div>
                </div>
        </div>
    </div>

</div>
	<div class="footer-n">Los colores son referenciales. Las especificaciones y precios de los vehículos pueden variar sin previo aviso.</div>
<script type='text/javascript'>
  var paso=0;

			$(document).ready(function() {
			      $("#solicitar-nueva").click(function(){
                                    location.reload();
                                     });
            <?php if($modelo!=''){ ?>
              $('#vehicle_1').val(<?php echo $modelo ?>);
              $("#Quotation_vehicle_version_id").html("");
                  $.ajax({
                    url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/loadVersionVehicle",
                    cache: false,
                    type: "POST",
                    dataType: "json", 
                    async: false,
                    data:{
                        vehicle_id:$('#vehicle_1').val()
                    },
                     success: function(data) {
                    $.map( data, function( val, i ) {
                        console.log(val);
                        if(val.id){
                        var z="";
                         var y="";
                        if(val.ac=='YES')
                         {
                          z="AC";
                         }
                           if(val.abs=='YES')
                         {
                          y="ABS";
                         }
                        var aux= $("<option></option>");                
                        aux.attr("class","selectOption");
                         aux.attr("value",val.id);
                        aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        $("#Quotation_vehicle_version_id").append(aux);
                        }
                    });
                          $("#car_name").html(data.name);
                        $("#first_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
                     }                  
           });
            <?php } ?>
                                       $('#vehicle_1').change(function(){
                   $("#Quotation_vehicle_version_id").html("");
                            $.ajax({
                      url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/loadVersionVehicle",
                    cache: false,
                    type: "POST",
                    dataType: "json", 
                    async: false,
                    data:{
                        vehicle_id:$(this).val()
                    },
                     success: function(data) {
                    $.map( data, function( val, i ) {
                        console.log(val);
                        if(val.id){
                        var z="";
                         var y="";
                        if(val.ac=='YES')
                         {
                          z="AC";
                         }
                           if(val.abs=='YES')
                         {
                          y="ABS";
                         }
                        var aux= $("<option></option>");                
                        aux.attr("class","selectOption");
                         aux.attr("value",val.id);
                        aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        $("#Quotation_vehicle_version_id").append(aux);
                        }
                    });
                          $("#car_name").html(data.name);
                        $("#first_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
                     }                  
           });
            });  



                        $("#city").change(function(event){
                   $("#Quotation_concessioner_id").html("");
                            $.ajax({
                      url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/loadConcessioner",
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
                        // def.attr("disabled","disabled");
                         def.html("Seleciona un concesionario");
                         $("#Quotation_concessioner_id").append(def);
                    $.map( data, function( val, i ) {                 
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                        aux.attr("name_c",val.name);
                        aux.attr("phone",val.phone);
                        aux.attr("address",val.address);
                        aux.html(val.name+" "+val.address);
                        $("#Quotation_concessioner_id").append(aux);
                    });
                     }                       
           });
            });



                                       $('#vehicle_2').change(function(){
                   $("#Quotation_vehicle_version_id2").html("");
                            $.ajax({
                      url: "<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/loadVersionVehicle",
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
                        if(val.ac=='YES')
                         {
                          z="AC";
                         }
                           if(val.abs=='YES')
                         {
                          y="ABS";
                         }
                        var aux= $("<option></option>");
                        aux.attr("class","selectOption");
                         aux.attr("value",val.id);
                        aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        $("#Quotation_vehicle_version_id2").append(aux);

                       }
                    });
            $("#car_name2").html(data.name);
             $("#car_name3").html(data.name);
	  $("#second_car_img").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
            $("#car_second_final").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/vehicle/"+data.image);
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
                                    $('#Quotation_concessioner_id').change(function(){
                                   $('#name_concessioner').html( $('option:selected', this).attr('name_c'));
                                   $('#address_concessioner').html( $('option:selected', this).attr('address'));
                                   $('#phone_concessioner').html( $('option:selected', this).attr('phone'));
                                    $("#info_concessioner").show("drop");
                                   });
                        });
$(function() {   
 $(".form").attr("style", "visibility: visible");
    validarPasos();    
   // $(".btnSiguiente, .btnAtras, #btnRegistrar").button();

$(".btnAtras").click(function(){
    paso--;
    validarPasos();
});
});



function validarPasos(){    
    $(".form").hide();        
    switch(paso){

        case 0: 
                $("#cotizacion").show("drop");
                $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-1over.jpg");
                $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-2.jpg");
                $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-3.jpg");
                break;
        case 1: 
                $("#donde-comprar").show("drop");
                $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-1over.jpg");
                $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-2over.jpg");
                $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-3.jpg");
                break;
        case 2: 
                $("#info-usuario").show("drop");
                $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-1over.jpg");
                $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-2over.jpg");
                $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-3over.jpg");
                break;
         case 3:   
                register();
                $("#solicitud-finalizada").show("drop");
                $("#paso_0").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-1over.jpg");
                $("#paso_1").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-2over.jpg");
                $("#paso_2").attr("src","<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/btn-3over.jpg");
                $("#paso_0").hide();
                $("#paso_1").hide();
                $("#paso_2").hide();
                $("#btn-c").hide();
                $("#btn-c2").hide();

				 $("#text_end").show();
                break;
        default: $("#cotizacion").show("drop");
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
function register(){
    console.log("registrando");
    var dataUser=$("#client-form").serialize();
    var dataConcessioner=$("#concessioner-form").serialize();
    var dataVehicle= $("#vehicle-version-form").serialize();
    $.ajax({
         type: 'POST',
         url: '<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/completeRegistrationAjax',
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

</script>