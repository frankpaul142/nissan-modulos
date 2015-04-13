<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{   
              $medio="default";
                   if(isset($_GET["medio"])){
          
          $medio=$_GET["medio"];
          
      }
             $client= new Client();
                 $vehicle= new VehicleClient();
                 $replacement= new Replacement();
                $concessioners=  Concessioner::model()->findAll();
	       $criteria = new CDbCriteria;
				//$criteria->condition = 'id != 36';
                $criteria->order='name';
				$versions= VehicleVersion::model()->with('vehicle')->findAllbyAttributes(array(),$criteria);
	        	if(isset($_POST['ajax']) && $_POST['ajax']==='replacement-form')
		{
			echo CActiveForm::validate($client);
        
			Yii::app()->end();
		}	
            
            	if(isset($_POST['siguiente']))
		{
                     
           
                
                 
                if(isset($_POST['Client'])&& isset($_POST['Replacement']) && isset($_POST['VehicleClient']))
		{
                   
                    $client= new Client;
                    $client->attributes=$_POST['Client'];
                    $client->save();
                    $vehicle= new VehicleClient;
                    $vehicle->attributes=$_POST['VehicleClient'];
					//die(print_r($vehicle->attributes));
                    $vehicle->kilometer="1";
                    $vehicle->save();
                    $replacement= new Replacement;
                    $replacement->attributes=$_POST['Replacement'];
                    $replacement->client_id=$client->primaryKey;
                    $replacement->vehicle_id=$vehicle->primaryKey;
                 
                    if($replacement->save()){
                      

					$rep= Replacement::model()->findByPk( $replacement->primaryKey);
                        $message = new YiiMailMessage;
                        $message->view = 'repuesto';
                        $message->setBody(array("replacement"=>$rep),'text/html');
						$message->setSubject('Prospecto para repuesto');
						
                          foreach($rep->concessioner->emails as $email){
                       
                             if($email->type=="REPLACEMENT"){
                            $message->addTo($email->description);
                       }
                       } 
					    $message->addTo("gzumarraga@ayasa.com.ec");
                        $message->addTo("mgonzalez@ayasa.com.ec");
						$message->addTo("solicitudeswebnissan@gmail.com");
                        $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
                        Yii::app()->mail->send($message);
						$this->render('result',array("client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement));
                
                    }else{
			   $this->render('error');
			   }     
                }
                
              //$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement));
            }else{
                
             
		$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement,"versions"=>$versions,"medio"=>$medio));
                }
	}
	    public function actionSatisfaction($id) {
        $replacement = Replacement::model()->findByPk($id);
        $model = new SatisfactionR;
        if (isset($_POST['SatisfactionR'])) {
              
            $model->attributes = $_POST['SatisfactionR'];
            $model->replacement_id = $replacement->id;
            if ($model->save()) {

                $sat = SatisfactionR::model()->findByPk($model->primaryKey);
                $message = new YiiMailMessage;
                $message->view = 'encuesta_r';
                $message->setBody(array("satisfaction" => $sat), 'text/html');
                $message->setSubject('Satisfacción del Prospecto Web.');
                if ($sat->score < 10) {
                    $message->setSubject('Satisfacción del Prospecto Web.');
                }
                if ($sat->contact == "NO") {
                    $message->setSubject('Prospecto No Contactado');
                }


                foreach ($replacement->concessioner->emails as $email) {

                    if ($email->type == "REPLACEMENT") {
                        $message->addTo($email->description);
                    }
                }
                //$message->addTo("franklin.paula@share.com.ec");
                $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));
                Yii::app()->mail->send($message);
                $this->render('satisfaction_finished', array('replacement' => $replacement));
            }
        } else {

            if ($replacement) {
                $this->render('satisfaction', array('model' => $model, 'replacement' => $replacement));
            }
        }
    }
	
	public function actionDiagnostic() {
         $medio="default";
                   if(isset($_GET["medio"])){
          
          $medio=$_GET["medio"];
          
      }
		$client= new Client();
		$vehicle= new VehicleClient();
		$replacement= new Replacement();
		$criteria2= new CDbCriteria;
        //$criteria2->condition = 'id = 1 OR id = 2 OR id = 9 OR id = 10 OR id = 11  OR id = 13 OR id = 14 OR id= 15 OR id = 16';
        $concessioners = Concessioner::model()->findAllbyAttributes(array(),$criteria2);
		$criteria = new CDbCriteria;
		//$criteria->condition = 'id != 36';
		$criteria->order='name';
		$versions= VehicleVersion::model()->with('vehicle')->findAllbyAttributes(array(),$criteria);
		if(isset($_POST['ajax']) && $_POST['ajax']==='replacement-form')
		{
			echo CActiveForm::validate($client);
        
			Yii::app()->end();
		}	
            
            	if(isset($_POST['siguiente']))
		{
                     
           
                
                 
                if(isset($_POST['Client'])&& isset($_POST['Replacement']) && isset($_POST['VehicleClient']))
		{
                   
                    $client= new Client;
                    $client->attributes=$_POST['Client'];
                    $client->save();
                    $vehicle= new VehicleClient;
                    $vehicle->attributes=$_POST['VehicleClient'];
					//die(print_r($vehicle->attributes));
                    $vehicle->kilometer="1";
                    $vehicle->save();
                    $replacement= new Replacement;
                    $replacement->attributes=$_POST['Replacement'];
                    $replacement->client_id=$client->primaryKey;
                    $replacement->vehicle_id=$vehicle->primaryKey;
                 
                    if($replacement->save()){
                      

					$rep= Replacement::model()->findByPk( $replacement->primaryKey);
                        $message = new YiiMailMessage;
                        $message->view = 'repuesto';
                        $message->setBody(array("replacement"=>$rep),'text/html');
						$message->setSubject('Prospecto para repuesto');
						
                          foreach($rep->concessioner->emails as $email){
                       
                             if($email->type=="REPLACEMENT"){
                            $message->addTo($email->description);
                       }
                       } 
					    $message->addTo("gzumarraga@ayasa.com.ec");
                        $message->addTo("mgonzalez@ayasa.com.ec");
						$message->addTo("solicitudeswebnissan@gmail.com");
                        $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
                        Yii::app()->mail->send($message);
						$this->render('result',array("client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement));
                
                    }else{
			   $this->render('error');
			   }     
                }
                
              //$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement));
		}else{
            $this->render('index_d',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"replacement"=>$replacement,"versions"=>$versions,"medio"=>$medio));
		}	
    }
}