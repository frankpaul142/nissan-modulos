<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NISSAN | Generador de Reportes</title>
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/styles-repuestos.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="login-gr">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
        'action' => Yii::app()->createUrl('/reporte/default/Login'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
  <div class="barra-logo">
  	<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/logo-nissan.png" alt="nissan logo"/>
  </div>
  <div class="inicio-sesion">
    <label>USUARIO</label>
                <?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username',array('style'=>'margin-top:0px;position:inherit  !important;')); ?>
    <label>PASSWORD</label>
                <?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password',array('style'=>'margin-top:0px;position:inherit  !important;')); ?>
    
         	<?php echo CHtml::submitButton('INGRESAR',array('class'=>'btn-Ingresar')); ?>
   
        
  </div>
    
<?php $this->endWidget(); ?>
</div>
</body>
</html>
