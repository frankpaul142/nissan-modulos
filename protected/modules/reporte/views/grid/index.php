<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NISSAN | Buscador General</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/styles-repuestos.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<header>
        <div class="barra-logo2">
        	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-nissan.png" alt="nissan logo"/>
      	</div>
        <div class="tit-genera">GENERADOR DE REPORTES</div>
    </header>

    <section class="section-contenido">
  
    	<section class="contenido-buscador">
                      		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('default/logout/'), 'visible'=>!Yii::app()->user->isGuest)
			)
		)); ?>
        	<span>BUSCADOR</span>
                
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    
	'enableAjaxValidation'=>false,
)); ?>
            <label>Módulo:</label>
            <select name="Search[module]" >
                <option value="0">Selecciona un módulo</option>
            	<option value="TechnicalDate">Agendamiendo de Cita</option>
                <option value="Quotation">Cotizador</option>
                <option value="Replacement">Repuestos</option>
                <option value="Suggestion">Sugerencias</option>
				  <option value="Satisfaction">Satisfacción del Cliente a la Cotización</option>
				   <option value="SatisfactionR">Satisfacción del Cliente al Repuesto</option>
				    <option value="SatisfactionS">Satisfacción del Cliente a la Sugerencia</option>
            </select>
            <label>Desde:</label>
          <?php  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                 'name'=>'Search[date_from]',
                  'language' => 'es',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                    

                    ),
                    'htmlOptions'=>array(
                      'readonly'=>'readonly'
                ),
            )); ?>
            <label>Hasta:</label>
           <?php  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'Search[date_to]',
                'language' => 'es',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=>'yy-mm-dd',
                   

                ),
                'htmlOptions'=>array(
                  'readonly'=>'readonly'
                ),
            )); ?>
            <label>Ciudad:</label>
        	<select  name="Search[city]" id="city" style="width:250px">
                    <option value="0">Todas las ciudades</option>
                                                <?php foreach ($cities as $city): ?>
                                                <?php if(isset($city_id)&&$city_id==$city->id){ ?>
                                                  <option selected="true" value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                <?php }else{ ?>
                                                           <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                                <?php  }?>
                                                <?php  endforeach; ?>
                </select>
            <label>Cédula:</label>
            <input type="text" name="Search[identity]"/>
            <label>Nombre:</label>
            <input type="text" name="Search[name]"/>
             <label>Apellido:</label>
            <input type="text" name="Search[lastname]"/>
             <label>Email:</label>
            <input type="text" name="Search[email]"/>
            <label>Concesionario:</label>
            <select id="concessioner" name="Search[concessioner]">
                <option value="0">Todos</option>
            </select>
            <label>Modelo:</label>
              <select name="Search[model]">
                  <option value="0" selected="selected">Todos</option>
                     <?php foreach($vehicles as $vehicle): ?>           
					          <?php if($vehicle->id!=6 && $vehicle->id!=9){ ?>
                  <option value="<?php echo $vehicle->id ?>" car_name="<?php echo $vehicle->name ?>"><?php echo $vehicle->name ?></option> 
                         <?php } endforeach; ?>      
                            </select>
            <label>Version:</label>
                <select   id="version" type="text" maxlength="100" name="Search[version]" style="width: 130px;">
				        <option value="0">Todos</option>
                    <?php foreach($versions as $version): ?>
                    <option value="<?php  echo $version->id ?>">
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
             <label>Descargar:</label>
            <select   id="print" type="text" maxlength="100" name="Search[print]" style="width: 130px;">
                <option value="NO"> NO </option>  
                <option value="YES"> SI </option>
                  
                </select>
            <input id="sub" type="submit" value="Buscar" class="Bnt-buscar"/>
           
        </section>
       
        <?php $this->endWidget(); ?>
        <section class="contenido-layout">
        	<h1>Resultado de Busqueda</h1>
            <!-- TABLA -->
            
            <?php if(isset($widget1)): ?>
            <?php $widget1->run(); ?>
       
        
        <?php 
        if(isset($export)){
            if($export!=0){
        $widget2->stream=true;
                $widget2->run(); 
            }
        }
    ?>
        <?php endif; ?>
            <!-- -->
        </section>
    </section>
</body>
    <script>
        $(document).ready(function() {
                 $("#DataTables_Table_0_filter").hide(); 
            $("#print").change(function(event){
                   // alert($("#print").val());
                      
                      if($("#print").val()=="YES"){
                             $("#sub").val("Descargar");  
                      }
                      else{
                      if($("#print").val()=="NO"){
                         $("#sub").val("Consultar");  
                      }
                      }
              
       
     
    
            });  
                $("#city").click(function(event){
                   $("#concessioner").html("");
				   var z =$("<option value='0'>Todos</option>");
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
                        if(val.id!=='2'){
                        var aux= $("<option></option>");
                        aux.attr("value",val.id);
                        aux.html(val.name+" "+val.address);
                        $("#concessioner").append(aux);
                        }
                    });


                     }
                     
              
           });
    
            });   
         });
    		
		
		
    </script>
    
</html>
