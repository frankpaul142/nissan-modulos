<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		
              $model=new Quotation;  
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
		    	public function actionSatisfaction($id){
                 $quotation=  Quotation::model()->findByPk($id); 
                        $model= new Satisfaction;
                if(isset($_POST['Satisfaction'])){
                      //  die(print_r($_POST['Satisfaction']));
                 $model->attributes=  $_POST['Satisfaction'];
                 $model->quotation_id= $quotation->id;
                 if($model->save()){
				 
						$sat= Satisfaction::model()->findByPk( $model->primaryKey);
                        $message = new YiiMailMessage;
                        $message->view = 'encuesta';
                        $message->setBody(array("satisfaction"=>$sat),'text/html');
						$message->setSubject('Satisfacción del Prospecto Web.');
							if($sat->score<10){
						$message->setSubject('Satisfacción del Prospecto Web.');
						}
						if($sat->contact=="NO"){
						$message->setSubject('Prospecto No Contactado');
						}
					
						
                          foreach($quotation->concessioner->emails as $email){
                       
                             if($email->type=="QUOTATION"){
                            $message->addTo($email->description);
                       }
                       }
					     //$message->addTo("franklin.paula@share.com.ec");
                         $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
                        Yii::app()->mail->send($message);
                    $this->render('satisfaction_finished',array('quotation'=>$quotation));
                 }
                }
                else{
                       
                            if($quotation){
                                $this->render('satisfaction',array('model'=>$model,'quotation'=>$quotation));
                            }
                }
        }
      
        public function actionvalidateRegisterVehicleDataAjax(){
            $model=new Quotation;
            $model->attributes=$_POST['Quotation'];
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
                $return[$z]['price']=$vehicle->final_price;
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
                    $quotation= new Quotation;
                    $quotation->attributes=$_POST['Quotation'];
                    $quotation->client_id=$client->primaryKey;
					$quotation->creation_date=date("Y-m-d H:i:s");
                    if($quotation->save()){
						$quot= Quotation::model()->findByPk( $quotation->primaryKey);
                        $message = new YiiMailMessage;
                        $message->view = 'cotizador';
                        $message->setBody(array("client"=>$client,"quotation"=>$quot),'text/html');
						$message->setSubject('Prospecto para Cotización');
                          foreach($quot->concessioner->emails as $email){
                       
                             if($email->type=="QUOTATION"){
                            $message->addTo($email->description);
                       }
                       }
              // $message->addTo("franklin.paula@share.com.ec");
					    $message->addTo("solicitudeswebnissan@gmail.com");
                        $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
                        Yii::app()->mail->send($message);
                        echo json_encode(true);
                        
                    }
                    else{
                        echo json_encode(false);
                    }
                    }
                    $vehicle_version=  VehicleVersion::model()->findAllByAttributes(array("vehicle_id"=>$_POST['vehicle_id'],"status"=>"ACTIVE"));
                    echo json_encode(true);
       
        }
        
}