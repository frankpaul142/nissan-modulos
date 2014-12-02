<?php

class DefaultController extends Controller
{
	public $layout="//layouts/module";
	
	public function actionIndex()
	{
		    $model=new Drive;  
      	$client = new Client;
      	$vehicles= Vehicle::model()->findAllByAttributes(array('status'=>'ACTIVE'));
      	$cities=  City::model()->findAll();
        $modelo='';
        $medio='default';
        if(isset($_GET['utm_model'])){
                $modelo=$_GET['utm_model'];
              }
         if(isset($_GET["medio"])){
                 $medio=$_GET["medio"];
                }
        $this->render('index',array('model'=>$model,"vehicles"=>$vehicles,'cities'=>$cities,'client'=>$client,'modelo'=>$modelo,'medio'=>$medio));      
    }

    public function actionvalidateRegisterVehicleDataAjax(){
        $model=new Drive;
        $model->attributes=$_POST['Drive'];
        echo CActiveForm::validate($model);
    }

    public function actionvalidateRegisterUserDataAjax(){
        $model=new Client;
        $model->attributes=$_POST['Client'];
        echo CActiveForm::validate($model);
    }

    public function actionLoadVersionVehicle(){
		$criteria = new CDbCriteria;
	   	$criteria->order='reference'; 
	   	$criteria->condition = 'id != 32 AND id != 33 AND id != 34  AND id != 36 AND id != 37 AND id != 38 AND id != 39 AND id != 40 AND id != 41 AND id != 42';
        $vehicle_version=  VehicleVersion::model()->findAllByAttributes(array("vehicle_id"=>$_POST['vehicle_id'],"status"=>"ACTIVE"),$criteria);
        $vehicle_image=  Picture::model()->findByAttributes(array("vehicle_id"=>$_POST['vehicle_id']));
        $vehicle_s= Vehicle::model()->findByPk($_POST['vehicle_id']);
       	$return= array();
        foreach($vehicle_version as $z=> $vehicle){
           	$return[$z]['id']=$vehicle->id;
           	$return[$z]['reference']=$vehicle->reference;
           	$return[$z]['motor']=$vehicle->motor;
           	$return[$z]['type']=$vehicle->type;
           	$return[$z]['transmission']=$vehicle->transmission;
           	$return[$z]['combustion']=$vehicle->combustion;
           	$return[$z]['ac']=$vehicle->ac;
		    $return[$z]['abs']=$vehicle->abs;
       	}
       	$return['image']=$vehicle_image->description;
       	$return['name']=$vehicle_s->name;
        echo json_encode($return);
    }
        
    public function actionloadConcessioner(){
        $city= City::model()->findByPk($_POST['city_id']);
        $return= array();
        foreach($city->concessioners as $z => $concessioner){
         	if($concessioner->id !=3 && $concessioner->id !=4){
            	$return[$z]['id']=$concessioner->id;
            	$return[$z]['name']=$concessioner->name;
            	$return[$z]['address']=$concessioner->address;
             	$return[$z]['phone']=$concessioner->phone;
         	}
        }
        echo json_encode($return);
    }
                
	public function actionCompleteRegistrationAjax(){          
        $client = New Client;
        $client->attributes=$_POST['Client'];
        if($client->save()){
            $drive= new Drive;
            $drive->attributes=$_POST['Drive'];
            $drive->client_id=$client->primaryKey;
			$drive->creation_date=date("Y-m-d H:i:s");
            if($drive->save()){
				$driv= Drive::model()->findByPk( $drive->primaryKey);
                $message = new YiiMailMessage;
                $message->view = 'pruebamanejo';
                $message->setBody(array("client"=>$client,"drive"=>$driv),'text/html');
				$message->setSubject('Solicitud Prueba de Manejo');
              	foreach($driv->concessioner->emails as $email){
                 	if($email->type=="DRIVE"){
                    	$message->addTo($email->description);
               		}
               	}
          //$message->addTo("rodney.ledesma@share.com.ec");
			    //$message->addBcc("franklin.paula@share.com.ec");
          //$message->addBcc("rodney.ledesma@share.com.ec");
                $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
                Yii::app()->mail->send($message);
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }
        }
    }
        
}