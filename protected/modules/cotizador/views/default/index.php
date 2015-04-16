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
						<div id="precio1" style="display:none">
                        	<label class="title_co">Precio Contado</label> 
						   	<label id="precio_contado1"></label><br/>
						   	<div id="calculador_cuota1" style="display:none">
	                        	<label class="title_co">Entidad Financiera</label> 
							   	<select id="ifi1">
									<option>Elija una opción</option>
									<?php foreach ($banks as $i => $bank) { ?>	
									<option value="<?php echo $bank->id ?>"><?php echo $bank->nombre ?></option>
									<?php } ?>
								</select><br/>
	                        	<label class="title_co">Entrada Mínima</label>
	                        	<select id="entrada_minima1">
									<option>Elija una opción</option>
								</select><br/>
	                        	<label class="title_co">Cuotas</label>
							   	<select id="cuotas1">
							   		<option>Elija una opción</option>
							   	</select><br/>
	                        	<label class="title_co">Tasa de Interés</label> 
							   	<label id="tasa_interes1">0</label><br/>
	                        	<label class="title_co">Dispositivo por 1 año Aprox.</label> 
							   	<label id="dispositivo1">0</label><br/>
	                        	<label class="title_co">Gastos Administrativos Aprox.</label> 
							   	<label id="gastos_administrativos1">0</label><br/>
	                        	<label class="title_co">Valor a Financiar Aprox.</label> 
							   	<label id="valor_financiar1">0</label><br/>
	                        	<label class="title_co">Seguro Aprox. por <span id="spAnos1"></span> años</label> 
							   	<label id="seguro1">0</label><br/>
	                        	<label class="title_co">Total a Financiar</label> 
							   	<label id="total_financiar1">0</label><br/>
	                        	<label class="title_co">Cuota mensual estimada</label> 
							   	<label id="cuota_estimada1">0</label><br/>
						   	</div>
                        </div>
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
                    <div class="img-auto2">
                        <img id="car_second_final" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/auto-cotizador.jpg" width="438" height="295" alt="auto nissan"/>
                        <div>
                        	<label class="title_co">Precio Contado</label> 
						   	<label id="precio_contado2"></label><br/>
						   	<button class="btn-siguiente-input2" id="calcular_cuota">Calcular cuota</button>
                        	<div id="calculador_cuota2" style="display:none">
							   	<label class="title_co">Entidad Financiera</label> 
							   	<select id="ifi2">
									<option>Elija una opción</option>
									<?php foreach ($banks as $i => $bank) { ?>	
									<option value="<?php echo $bank->id ?>"><?php echo $bank->nombre ?></option>
									<?php } ?>
								</select><br/>
	                        	<label class="title_co">Entrada Mínima</label>
	                        	<select id="entrada_minima2">
									<option>Elija una opción</option>
								</select><br/>
	                        	<label class="title_co">Cuotas</label> 
							   	<select id="cuotas2">
							   		<option>Elija una opción</option>
							   	</select><br/>
	                        	<label class="title_co">Tasa de Interés</label> 
							   	<label id="tasa_interes2">0</label><br/>
	                        	<label class="title_co">Dispositivo por 1 año Aprox.</label> 
							   	<label id="dispositivo2">0</label><br/>
	                        	<label class="title_co">Gastos Administrativos Aprox.</label> 
							   	<label id="gastos_administrativos2">0</label><br/>
	                        	<label class="title_co">Valor a Financiar Aprox.</label> 
							   	<label id="valor_financiar2">0</label><br/>
	                        	<label class="title_co">Seguro Aprox. por <span id="spAnos2">0</span> años</label> 
							   	<label id="seguro2">0</label><br/>
	                        	<label class="title_co">Total a Financiar</label> 
							   	<label id="total_financiar2">0</label><br/>
	                        	<label class="title_co">Cuota mensual estimada</label> 
							   	<label id="cuota_estimada2">0</label><br/>
						   	</div>
                        </div>
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
  	var banks;
  	$.get('<?php echo Yii::app()->request->getBaseUrl(true); ?>/cotizador/Default/loadBanks').success(function (data) {
  		banks=JSON.parse(data);
  	});

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
                        //console.log(val);
                        if(val.id){
                        	var z="";
                         	var y="";
                        	if(val.ac=='YES') {
                          		z="AC";
                         	}
                           	if(val.abs=='YES') {
                          		y="ABS";
                         	}
                        	var aux= $("<option></option>");                
                        	aux.attr("class","selectOption");
                         	aux.attr("value",val.id);
                        	aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        	$("#Quotation_vehicle_version_id").append(aux);
                        	$('#precio_contado1').text('$'+val.price);
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
                        //console.log(val);
                        if(val.id){
                        	var z="";
                         	var y="";
                        	if(val.ac=='YES') {
                          		z="AC";
                         	}
                           	if(val.abs=='YES') {
                          		y="ABS";
                         	}
                        	var aux= $("<option></option>");                
                        	aux.attr("class","selectOption");
                         	aux.attr("value",val.id);
                        	aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        	$("#Quotation_vehicle_version_id").append(aux);
                        	$('#precio_contado1').text('$'+val.price);
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
                        aux.html(val.name+" ("+val.address+")");
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
                        	if(val.ac=='YES') {
                          		z="AC";
                         	}
                           	if(val.abs=='YES') {
                          		y="ABS";
                         	}
                        	var aux= $("<option></option>");
                        	aux.attr("class","selectOption");
                         	aux.attr("value",val.id);
                        	aux.html(" "+val.motor+" "+val.type+" "+val.transmission+" "+z+" "+y);
                        	$("#Quotation_vehicle_version_id2").append(aux);
                        	$('#precio_contado2').text('$'+val.price);
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
 
 		$(".form").attr("style", "visibility: visible");
    	validarPasos();

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

        $('#ifi1').change(function () {
        	var banco=$(this).val();
        	var html='<option>Elija una opción</option>';
        	var html2='<option>Elija una opción</option>';
        	if(typeof(banks)!=='undefined' && banco!='Elija una opción'){
        		var entradaMinima=parseInt(banks[banco]['entrada']);
        		var precio_contado=parseFloat($('#precio_contado1').text().substr(1));
        		for(var i=entradaMinima; i<entradaMinima+50; i+=5){
        			valor=i/100*precio_contado;
        			html+='<option value="'+valor+'">'+i+'% - '+valor.toFixed(2)+' USD</option>';
        		}
        		for(var i=parseInt(banks[banco]['plazo_min']); i<=parseInt(banks[banco]['plazo_max']); i+=6){
        			html2+='<option value="'+i+'">'+i+'</option>';
        		}
        	}
        	$('#entrada_minima1').html(html);
        	$('#cuotas1').html(html2);
        	cero(1);
        });
        $('#ifi2').change(function () {
        	var banco=$(this).val();
        	var html='<option>Elija una opción</option>';
        	var html2='<option>Elija una opción</option>';
        	if(typeof(banks)!=='undefined' && banco!='Elija una opción'){
        		var entradaMinima=parseInt(banks[banco]['entrada']);
        		var precio_contado=parseFloat($('#precio_contado2').text().substr(1));
        		for(var i=entradaMinima; i<entradaMinima+50; i+=5){
        			valor=i/100*precio_contado;
        			html+='<option value="'+valor+'">'+i+'% - '+valor.toFixed(2)+' USD</option>';
        		}
        		for(var i=parseInt(banks[banco]['plazo_min']); i<=parseInt(banks[banco]['plazo_max']); i+=6){
        			html2+='<option value="'+i+'">'+i+'</option>';
        		}
        	}
        	$('#entrada_minima2').html(html);
        	$('#cuotas2').html(html2);
        	cero(2);
        });
        $('#cuotas1').change(function () {
        	var num_cuotas=$('#cuotas1').val();
        	var banco=$('#ifi1').val();
        	var entrada=$('#entrada_minima1').val();
        	var noValido='Elija una opción';
        	if(num_cuotas!=noValido && banco!=noValido && entrada!=noValido){
        		calcular(num_cuotas,banco,entrada,1);
        	}
        	else{
        		cero(1);
        	}
        });
        $('#cuotas2').change(function () {
        	var num_cuotas=$('#cuotas2').val();
        	var banco=$('#ifi2').val();
        	var entrada=$('#entrada_minima2').val();
        	var noValido='Elija una opción';
        	if(num_cuotas!=noValido && banco!=noValido && entrada!=noValido){
        		calcular(num_cuotas,banco,entrada,2);
        	}
        	else{
        		cero(2);
        	}
        });
        $('#entrada_minima1').change(function () {
        	var num_cuotas=$('#cuotas1').val();
        	var banco=$('#ifi1').val();
        	var entrada=$('#entrada_minima1').val();
        	var noValido='Elija una opción';
        	if(num_cuotas!=noValido && banco!=noValido && entrada!=noValido){
        		calcular(num_cuotas,banco,entrada,1);
        	}
        	else{
        		cero(1);
        	}
        });
        $('#entrada_minima2').change(function () {
        	var num_cuotas=$('#cuotas2').val();
        	var banco=$('#ifi2').val();
        	var entrada=$('#entrada_minima2').val();
        	var noValido='Elija una opción';
        	if(num_cuotas!=noValido && banco!=noValido && entrada!=noValido){
        		calcular(num_cuotas,banco,entrada,2);
        	}
        	else{
        		cero(2);
        	}
        });

        $('#calcular_cuota').click(function () {
        	$('#calculador_cuota1').show('drop');
        	$('#calculador_cuota2').show('drop');
        });
	});

	function calcular (num_cuotas,banco,entrada,modelo) {
		var interes=parseFloat(banks[banco]['tasa']);
		var interes_mensual=interes/1200;
		var precio_contado=parseFloat($('#precio_contado'+modelo).text().substr(1));
		var prestado=precio_contado-entrada;
		var dispositivo=450;
		var dominio=350;
		var gastos_administrativos=0.02*prestado;
		var depreciacion=0.15;
		var tasa_seguro=parseFloat(banks[banco]['tasa_seguro']);
		var tasa_seguro_parcial=tasa_seguro+0.78;
		var tasa_seguro_total=0;
		var seguro=parseInt(banks[banco]['seguro']);
		if(seguro==99){
			var aux_plazo_anios=Math.round(num_cuotas/12);
		}
		else{
			var aux_plazo_anios=seguro;
		}
		for(i=1; i<=aux_plazo_anios; i++){
			tasa_seguro_total+=tasa_seguro_parcial;										
			tasa_seguro_parcial*=1-depreciacion;
		}
		tasa_seguro=tasa_seguro_total/100;
		seguro=tasa_seguro*precio_contado;
		seguro_aux=(tasa_seguro*precio_contado)/aux_plazo_anios;
		
		prestado+=dominio+dispositivo+gastos_administrativos;								
		
		var total_financiar=prestado;
		var cuota=total_financiar*(interes_mensual/(1-Math.pow(1+interes_mensual,-num_cuotas))); //monthly payment
		
		var cuota_seguro=pmt(5.5/1200, 12, (-1)*seguro_aux);
		
		cuota+=cuota_seguro;
		
		total_pagar=cuota * num_cuotas;  //total amount paid at end of loan
		total_intereses=total_pagar-total_financiar;         //total amount of interest paid at end of loan

		$('#tasa_interes'+modelo).text('$'+interes.toFixed(2));
		$('#dispositivo'+modelo).text('$'+dispositivo.toFixed(2));
		$('#gastos_administrativos'+modelo).text('$'+gastos_administrativos.toFixed(2));
		$('#valor_financiar'+modelo).text('$'+prestado.toFixed(2));
		$('#seguro'+modelo).text('$'+seguro.toFixed(2));
		$('#total_financiar'+modelo).text('$'+total_financiar.toFixed(2));
		$('#cuota_estimada'+modelo).text('$'+cuota.toFixed(2));
		$('#spAnos'+modelo).text(aux_plazo_anios);

	}

	function cero (modelo) {
		$('#tasa_interes'+modelo).text('0');
		$('#dispositivo'+modelo).text('0');
		$('#gastos_administrativos'+modelo).text('0');
		$('#valor_financiar'+modelo).text('0');
		$('#seguro'+modelo).text('0');
		$('#total_financiar'+modelo).text('0');
		$('#cuota_estimada'+modelo).text('0');
	}

	function pmt(i, n, p) {
		return i * p * Math.pow((1 + i), n) / (1 - Math.pow((1 + i), n));
	}

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
					$("#precio1").show();
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

</script>