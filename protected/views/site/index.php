<?php /* @var $this Controller */ 
$types=  Type::model()->findAll();
$cities= City::model()->findAll();
?> 
<div class="localizador">
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
         'action'=>$this->createUrl("Site/index"),
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
                  'clientOptions'=>array(
            'validateOnSubmit'=>true,            
           // 'afterValidate'=>'js:validateUserData'            
                ),

)); ?>
  <span class="span_localizador">AGENDAMIENTO DE CITAS</span>
    <div id="part_1">
   	  <h2>Solicite su cita</h2>
      	<table width="250px" border="0" cellspacing="3" cellpadding="3" align="center" >
          <tr>
            <td colspan="4">Ciudad:</td>
          </tr>
          <tr>
            <td colspan="4">
            	<select name="city" id="city" style="width:250px">
                    <option value="0">Selecciona una ciudad</option>
									<?php foreach ($cities as $city): ?>
                                                                        <?php if($city->id != 21){ ?>
                                                                        <?php if(isset($city_id)&&$city_id==$city->id){ ?>
                                                                          <option selected="true" value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php }else{ ?>
                                                                                   <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                                        <?php  }?>
                                                                        <?php } endforeach; ?>
                </select>
            </td>
          </tr>
          <tr>
            <td colspan="4">Centro de Servicio:</td>
          </tr>
          <tr>
            <td colspan="4">
           			
                <?php echo $form->dropDownList($technicaldate,'concessioner_id',array(), array('prompt'=>'Selecciona un concesionario','style'=>'width:250px')); ?>
                <?php echo $form->error($technicaldate,'concessioner_id'); ?>
            </td>
          </tr>
          <tr>
            <td colspan="4">Día de Preferencia:</td>
          </tr>
          <tr>
            <td colspan="4">
                <?php

                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $technicaldate,
    'attribute'=>'preference_date',
      'options' => array(
                   // also opens with a button
        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
         
        // can seelect dates in other months
        'changeYear' => true,           // can change year
        'changeMonth' => true,          // can change month
        'yearRange' => '1900:2018',     // range of year
        'minDate' => '2014-01-01',      // minimum date
        'maxDate' => '2014-12-31',      // maximum date
        'showButtonPanel' => false,      // show button panel
    ),
   
    'language' => 'es',
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));
                        ?>
        		
            </td>
          </tr>

          <tr>
            <td colspan="2">Horario de preferencia:</td>
            <td colspan="2">

                <select name="TechnicalDate[hour]" id="hour" style="width:110px;" >
                         
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option id="pyp" style="display: none;" value="Pico y Placa">Pico y Placa</option>

                </select>
            </td>
          </tr>
          <tr>
          	<td colspan="3">Requiere servicio de taxi:</td>
            <td>
            	<select name="TechnicalDate[taxi]" id="taxi" style="width:100px;">
                            <option value="YES">Si</option>
                            <option value="NO">No</option>
				</select>
            </td>
          </tr>
        </table>
    </div>
    <div id="part_2">
    	<h2>Información de Vehículo</h2>
		<table width="300px" border="0" cellspacing="3" cellpadding="3" align="center" >
          <tr>
            <td>Modelo:</td>
            <td colspan="2">
                        <?php echo $form->error($vehicle,'model'); ?>
            <?php // echo $form->textField($vehicle,'model',array("style"=>"with:150px;")); ?> 
                <select   id="VehicleClient_model" type="text" maxlength="100" name="VehicleClient[model]" style="width: 130px;">
				        <option value="0">Seleccione un vehículo</option>
                    <?php foreach($versions as $version): ?>
                    <option value="<?php  echo $version->vehicle->name." ".$version->motor." ".$version->type." ".$version->transmission." ";
                        if($version->ac=="YES"){
                            echo "A/C"." ";
                        }
                        if($version->abs=="YES"){
                            echo "ABS"." ";
                        }
						?>">
                        <?php 
                        
                        echo $version->vehicle->name." ".$version->motor." ".$version->type." ".$version->transmission." ";
                        if($version->ac=="YES"){
                            echo "A/C"." ";
                        }
                        if($version->abs=="YES"){
                            echo "ABS"." ";
                        }
                        ?>
                    </option>
                  <?php endforeach; ?>
                    <option value="Otro">Otro</option>
                </select>
            </td>
            <td>Año:</td>
            <td>
                      
            <?php echo $form->textField($vehicle,'year',array("style"=>"width:35px;","class"=>"number")); ?> 
			  <?php echo $form->error($vehicle,'year',array("style"=>"margin-top:6px;")); ?>
            </td>
          </tr>
          <tr>
            <td>Placa:</td>
            <td colspan="2">
                
        
            <?php echo $form->textField($vehicle,'license_plate',array("style"=>"width:130px;")); ?> 
         
			 <?php echo $form->error($vehicle,'license_plate',array("style"=>"margin-top:38px;")); ?>
            </td>
                     
						
					
                       
          </tr>
		  <tr>
          	<td colspan="1">&nbsp;</td>
            <td colspan="3"><span class="eje-placa"><strong>Particular:</strong>PJL0548 | <strong>Diplomático:</strong>CD1003</span></td>
          </tr>

           <tr>

          </tr>
          <tr>
            <td colspan="1">Kilometraje Actual:</td>
            <td colspan="3">         
            <?php echo $form->textField($vehicle,'kilometer',array("style"=>"with:100px;","class"=>"number")); ?> 
			 </br>
			 <?php echo $form->error($vehicle,'kilometer',array("style"=>"margin-top:5px;")); ?>
			</td>
		
			
			
          </tr>
           <tr>
            <td colspan="5"><h4>Trabajo a realizar</h4></td>
          </tr>
          <tr>
               <td colspan="5">
                   <select id="work"  name="TechnicalDate[work]"  style="width:300px;" >
                            <option id="mant" value="Mantenimiento Preventivo" >Mantenimiento Preventivo</option>
                            <option id="manta" value="Mantenimiento Preventivo con Trabajos Adicionales" >Mantenimiento Preventivo con Trabajos Adicionales</option>
                            <option id="mec"  value="Mecánica o mantenimiento con trabajos adicionales">Mecánica</option>
							<option id="Dt"  value="Diagnóstico Técnico">Diagnóstico Técnico</option>
							
                    </select>
               </td>
          </tr>
          <tr id="aw_cont" style="display: none;">
              <td colspan="3"><input id="aw" type="checkbox"/>Con trabajos adicionales.</td> 
          </tr>  
          <tr>
            <td id="km_work" style="display: block;width: 74px" colspan="5">
                   
                <select name="km_work"  style="width:92px;" >
                           <?php for($i=5000; $i<=100000; $i+=5000){ ?> 
                    <option value="<?php echo $i ?>km"><?php echo $i ?>km</option>
                           <?php } ?>   
                          <option value="+100000km">+100000km</option>
                </select>
              </td>

          </tr>
          <tr>
              <td id="additional_work" style="display: none;" colspan="5">
              <h4 id="title_additional_work">Trabajo adicional:</h4>
              <textarea name="TechnicalDate[detail_work]"  style="width:300px"></textarea>
              </td>
          </tr>
        </table>
       
       
        
        
    </div>
    <div id="part_3">
    <h2 id="title_client_info">Información Personal</h2>
    <select id="person_select" style="margin-left: 60px;">
        <option value="0">
            Persona Natural
        </option>
        <option value="1">
            Persona Jurídica
        </option>
    </select>
		<table width="290px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tr id="identity" style="height:40px">
             <td id="title_identity">Cédula:</td>
            <td colspan="2">
            <?php echo $form->error($client,'identity'); ?>
            <?php echo $form->textField($client,'identity',array("style"=>"with:150px;","class"=>"number")); ?> 
            </td>
          </tr>

          <tr id="social" style="display:none;height:40px;">
            <td>Razón Social:</td>
            <td colspan="2">
            <?php //echo $form->error($client,'name'); ?>
            <?php echo CHtml::textField('','',array("style"=>"with:150px;")); ?> 
            </td>
          </tr>
          <tr id="label_contact" style="display: none;">
            <td colspan="3" style="text-align:center; font-weight:bold">Datos de la persona de Contacto</td>
          </tr>

          <tr style="height:40px">
            <td>Nombre:</td>
            <td colspan="2">
                    <?php echo $form->error($client,'name'); ?>
            <?php echo $form->textField($client,'name',array("style"=>"with:150px;")); ?> 
            </td>
          </tr>
          <tr style="height:40px">
            <td>Apellido:</td>
            <td colspan="2">
                            <?php echo $form->error($client,'lastname'); ?>
            <?php echo $form->textField($client,'lastname',array("style"=>"with:150px;")); ?> 
            </td>
          </tr>
          <tr style="height:40px">
            <td>E-mail:</td>
            <td colspan="2">
                            <?php echo $form->error($client,'email'); ?>
            <?php echo $form->textField($client,'email',array("style"=>"with:150px;")); ?> 
            </td>
          </tr>
          <tr style="height:40px">
            <td>Teléfono:</td>
            <td colspan="2">
                            <?php echo $form->error($client,'phone'); ?>
            <?php echo $form->textField($client,'phone',array("style"=>"with:150px;","class"=>"number")); ?> 
            </td>
          </tr>
          <tr style="height:20px">
            <td>&nbsp;</td>
            <td colspan="2">
                   <span class="eje-placa"><strong>Ejemplo:</strong>022578689</span> 
            </td>
          </tr>
          <tr style="height:40px">
            <td>Celular:</td>
            <td colspan="2">
            <?php echo $form->error($client,'cellphone'); ?>
            <?php echo $form->textField($client,'cellphone',array("style"=>"with:150px;","class"=>"number")); ?> 
            </td>
          </tr>
		  <tr style="height:20px">
            <td>&nbsp;</td>
            <td colspan="2">
                   <span class="eje-placa"><strong>Ejemplo:</strong>0996486578</span> 
            </td>
          </tr>
          <tr>
            <td colspan="3"><h4>¿Cómo prefiere que lo contactemos?</h4></td>
          </tr>
          <tr>
            <td colspan="3"><input name="Client[preference_contact]" value="Teléfono convencional" type="checkbox"/> Teléfono convencional</td>
          </tr>
          <tr>
            <td colspan="3"><input name="Client[preference_contact]" value="Teléfono celular" type="checkbox"/> Teléfono celular</td>
          </tr>
          <tr>
            <td colspan="3"><input name="Client[preference_contact]" value="E-mail" type="checkbox"/> E-mail</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Siguiente" name="siguiente" class="btn_siguiente2" style="margin-top: -20px;"/></td>
          </tr>
         
        </table>
    	
    	
    </div>
  </div>  <div id="barra_localizador">Su cita debe ser agendada con 48 horas de anticipación. El agendamiento de su cita dependerá de la <br/>disponibilidad de nuestros Centros de Servicio.</br>Tenemos m&aacute;s de 20 concesionarios a nivel nacional, y estaremos gustosos en atenderle.</div>


    <?php $this->endWidget(); ?>
    <div class="aniWrap">
    <div class="mouse">
    <div class="scroller">
    </div>
    <div class="arrow">
    </div>
  </div>  
</div>
  <script type="text/javascript">
      
      
      $(document).ready(function() {
            $("#city").click(function(event){
                   $("#TechnicalDate_concessioner_id").html("");
				   var z =$("<option>Seleccione un concesionario</option>");
				    $("#TechnicalDate_concessioner_id").append(z);
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
                        if(val.id!=='2'&& val.id!=='4'){
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                        aux.html(val.name+" "+val.address);
                        $("#TechnicalDate_concessioner_id").append(aux);
                        }
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
             $("#additional_work").show();  		$("#title_additional_work").html("Trabajo adicional:");
                       $("#km_work").show();  
                       $("#aw_cont").hide();  
        }
    
        else{	$("#title_additional_work").html("Descripción");

          $("#additional_work").show();      
                        $("#km_work").hide();
                         $("#aw_cont").hide();

    }if($(this).val() === "Diagnóstico Técnico"){
	  $("#additional_work").hide();  
                       $("#km_work").show();  
                       $("#aw_cont").hide();
	}
               
    }      });
    $("#person_select").change(function(){
              if( $(this).val() === '0'){
        $("#title_client_info").html("Información Personal");
    $("#title_identity").html("Cédula");  
                       $("#social").hide();
                       $("#label_contact").hide();
                       

    }else{
   $("#title_client_info").html("Información Jurídica");
           $("#title_identity").html("R.U.C"); 
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
            if($("#city").val()==="11"){
              if( $(this).val() === "5" || $(this).val() === "6" || $(this).val() === "7"){
       
          
                       $("#pyp").hide();      

    }else{

      
                        $("#pyp").show();

    }
            }       
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
     

      </script>
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