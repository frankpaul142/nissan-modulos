<?php /* @var $this Controller */ 
$types=  Type::model()->findAll();
$cities= City::model()->findAll();
$list = array();
$ci=array();
foreach($concessioners as $z => $con){
	$list[$con->id]=$con->name." ".$con->address."-".$con->city->name;
	$ci[$con->id]=$con->city->id;   
}

?> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<meta name="language" content="en">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/styles-rep.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/fotorama.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/fotorama.js"></script>
</head>

<body>
 
<div id="content">
<div class="localizador">
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
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
          <span>COTIZADOR DE REPUESTOS</span>
    <div id="part_1">
   	  <h2>Solicite su cotización</h2>
      	<table width="250px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tbody><tr>
            <td>Ciudad:</td>
          </tr>
          <tr>
            <td>
            	<select name="city" id="city" style="width:250px">
                    <option value="0">Selecciona una ciudad</option>
					<?php $ciudades=[];
					foreach ($concessioners as $concessioner):
						$r=false;
						foreach($ciudades as $ciudad_id){
							if($concessioner->city->id==$ciudad_id){
								$r=true;
								break;
							}
						}
						if(!$r){
							array_push($ciudades, $concessioner->city->id);?>
							<option value="<?php echo $concessioner->city->id ?>"><?php echo $concessioner->city->name ?></option>
						<?php }
					endforeach; ?>
                </select>
            </td>
          </tr>
          <tr>
            <td>Concesionario:</td>
          </tr>
          <tr>
            <td>
   			
                <?php echo $form->dropDownList($replacement,'concessioner_id',[], array('prompt'=>'Selecciona un concesionario','style'=>'width:250px')); ?>
                <?php echo $form->error($replacement,'concessioner_id'); ?>
            </td>
          </tr>
        </tbody>
        </table>
    </div>
    <div id="part_2">
    	<h2>Información de Vehículo</h2>
		<table width="300px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tbody><tr>
            <td>Modelo:</td>
            <td colspan="2">
                       <?php echo $form->error($vehicle,'model'); ?>
            <?php // echo $form->textField($vehicle,'model',array("style"=>"width:150px;")); ?> 
                <select   id="VehicleClient_model" type="text" maxlength="100" name="VehicleClient[model]" style="width: 130px;">
      <option selected="selected">Seleccione un vehículo</option>              
<?php foreach($versions as $version): ?>
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
            	<td style="width:80px">Año:</td>
            	<td style="width:70px">
           		 <input style="width:35px;" class="number" name="VehicleClient[year]" id="VehicleClient_year" type="text" maxlength="4"> 
            	</td>
                <td><?php echo $form->error($vehicle,'year',array("style"=>"width:130px; margin-top:0px")); ?></td>
          </tr>
          <tr>
            <td>Repuesto:</td>
            <td colspan="2">
             <?php echo $form->textField($replacement,'part',array("style"=>"width:130px;")); ?> 
            </td>
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
            
            </td>
                                 
          </tr>
	  
          <tr>
          	<td>&nbsp;</td>
            <td colspan="2"><span class="eje-placa"><strong>Particular:</strong>PJL0548 | <strong>Diplomático:</strong>CD1003</span></td>
          </tr>	
	  <tr>
	     <td>&nbsp;</td>
	     <td colspan="2">
              <?php echo $form->error($vehicle,'license_plate',array("style"=>"width:130px; margin-top:-10px")); ?>
	     </td>	
	  </tr>
        </tbody>
        </table>
       
        <?php echo $form->error($vehicle,'kilometer'); ?><br><br>
         
          
      
    </div>
    <div id="part_3">
    <h2 id="title_client_info">Información Personal</h2>
		<table width="290px" border="0" cellspacing="3" cellpadding="3" align="center">
          <tr id="identity" style="display: table-row;">
            <td>Cédula:</td>
            <td colspan="2">
            	 <?php echo $form->error($client,'identity'); ?>
            <?php echo $form->textField($client,'identity',array("style"=>"width:150px;","class"=>"number")); ?> 
            </td>
          </tr>
            <td>Nombre:</td>
            <td colspan="2">
            	 <?php echo $form->error($client,'name'); ?>
            <?php echo $form->textField($client,'name',array("style"=>"width:150px;")); ?> 
            </td>
          </tr>
          <tr>
            <td>Apellido:</td>
            <td colspan="2">
            	
             <?php echo $form->error($client,'lastname'); ?>
            <?php echo $form->textField($client,'lastname',array("style"=>"width:150px;")); ?>  
            </td>
          </tr>
          <tr>
            <td>E-mail:</td>
            <td colspan="2">
           		                            <?php echo $form->error($client,'email'); ?>
            <?php echo $form->textField($client,'email',array("style"=>"width:150px;")); ?> 
            </td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td colspan="2">
                                      <?php echo $form->error($client,'phone'); ?>
            <?php echo $form->textField($client,'phone',array("style"=>"width:150px;","class"=>"number")); ?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><div class="eje-placa"><strong>Ej:</strong>022322148</div></td>
          </tr>
          <tr>
            <td>Celular:</td>
            <td colspan="2">
             <?php echo $form->error($client,'cellphone'); ?>
            <?php echo $form->textField($client,'cellphone',array("style"=>"width:150px;","class"=>"number")); ?> 
                     <?php echo $form->hiddenField($client,'medio',array("value"=>$medio)); ?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><div class="eje-placa"><strong>Ej:</strong>0984250203</div></td>
          </tr>
          <tr>
          	<td>Cómo le contactamos:</td>
            <td colspan="2">
             <select class="select-n" name="Client[preference_contact]" id="Client_preference_contact">
                <option value="">Selecciona una opción</option>
                <option value="email">E-mail</option>
                <option value="Teléfono">Teléfono</option>
                <!--<option value="cellphone">Celular</option> -->
                <option value="Email y Teléfono">Email y Teléfono</option>
            </select>
            <?php echo $form->error($client,'preference_contact'); ?>
			</td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
            <td><input type="submit" value="Enviar" name="siguiente" class="btn_siguiente2" style="margin-top:20px;"></td>
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

  <div id="barra_txtf">"Este formulario no es un cotizador en línea, es una solicitud de cotización."</div>

  <div id="barra_localizador">Tenemos más de 20 concesionarios a nivel nacional y estaremos gustosos en atenderle.</div>
</div><!-- content -->
</div>

      <script type="text/javascript">
      
      
      $(document).ready(function() {
            /*$("#city").click(function(event){
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
                        if(val.id!=='3' && val.id!=='4'){
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                         aux.html(val.name+" ("+val.address+")");
                        $("#concessioner").append(aux);
                        }
                    });


                     }
                     
              
           });
    
            });*/

			var concessioners=<?php echo json_encode($list) ?>;
			var cities=<?php echo json_encode($ci) ?>;
			$("#city").change(function(){
				html='';
				for(k in cities){
					if(cities[k]==$(this).val()){
						html+='<option value="'+k+'">'+concessioners[k]+'</option>';
					}
				}
				$("#Replacement_concessioner_id").html('');
				$("#Replacement_concessioner_id").append(html);
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
                               $('[id^="type_"]').click(function(){
                     
                            
                                  $('#all').attr('checked', false); 
                               

                                });
               $('#all').click(function(){                      
        if( $('#all').is(':checked')){
                                       $('[id^="type_"]').attr('checked', false);   
                                    }
                                         });
                              
</script>
</body></html>
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