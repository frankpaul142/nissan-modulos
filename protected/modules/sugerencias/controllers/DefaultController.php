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
                 $suggestion= new Suggestion();
                $concessioners=  Concessioner::model()->findAll();
					$criteria = new CDbCriteria;
				
                $criteria->order="name";
				$versions= VehicleVersion::model()->with('vehicle')->findAllbyAttributes(array(),$criteria);
	        	if(isset($_POST['ajax']) && $_POST['ajax']==='suggestion-form')
		{
			echo CActiveForm::validate($client);
        
			Yii::app()->end();
		}	
            
            	if(isset($_POST['siguiente']))
		{
                     
           
             
                 
                if(isset($_POST['Client'])&& isset($_POST['Suggestion']) && isset($_POST['VehicleClient']))
		{
                  
                    $client= new Client;
                    $client->attributes=$_POST['Client'];
                    $client->preference_contact="email";
                    $client->save();
                    $vehicle= new VehicleClient;
                    $vehicle->attributes=$_POST['VehicleClient'];
                    $vehicle->kilometer="1";
                    $vehicle->save();
                    $suggestion= new Suggestion;
                    $suggestion->attributes=$_POST['Suggestion'];
					$suggestion->type=$_POST['Suggestion']['type']."-".$_POST['Suggestion']['type2'];
                    $suggestion->client_id=$client->primaryKey;
                    $suggestion->vehicle_id=$vehicle->primaryKey;
					//die(print_r($suggestion));
                     $aux=  substr($_POST['Suggestion']['type2'],0,1);
                    
                    if($suggestion->save()){
                    
      
           
            $message = new YiiMailMessage;
			 $message->setSubject('Sugerencia del Servicio.');
            $message->view = 'sugerencia';
            $message->setBody(array("client"=>$client,"vehicle"=>$vehicle,"suggestion"=>$suggestion),'text/html');
             foreach($suggestion->concessioner->emails as $email){
                  if($email->type=="SUGGESTION-$aux"){
            $message->addTo($email->description);
            // $message->addTo('franklin.paula@share.com.ec');
			$message->addTo("anaquishpe@ayasa.com.ec");
			$message->addTo("mgonzalez@ayasa.com.ec");
			$message->addTo("gzumarraga@ayasa.com.ec");
			$message->addTo("solicitudeswebnissan@gmail.com");
             if($email->type=="SUGGESTION-O"){
             $message->addTo("rpazmino@ayasa.com.ec");
             }
            $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
           
            }
        }
         Yii::app()->mail->send($message);
                 $this->render('result',array("client"=>$client,"vehicle"=>$vehicle,"suggestion"=>$suggestion));
                
                    }else{
			   $this->render('error');
			   }     
                }
                
              //$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"suggestion"=>$suggestion));
            }else{
                
             
		$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"suggestion"=>$suggestion,"versions"=>$versions,"medio"=>$medio));
                }
	}
	    public function actionSatisfaction($id) {
        $suggestion = Suggestion::model()->findByPk($id);
        $model = new SatisfactionS;
        if (isset($_POST['SatisfactionS'])) {

            $model->attributes = $_POST['SatisfactionS'];
            $model->suggestion_id = $suggestion->id;

            if ($model->save()) {

                $sat = SatisfactionS::model()->findByPk($model->primaryKey);
                $message = new YiiMailMessage;
                $message->view = 'encuesta_s';
                $message->setBody(array("satisfaction" => $sat), 'text/html');
                $message->setSubject('Satisfacción del Prospecto Web.');
                if ($sat->score < 10) {
                    $message->setSubject('Satisfacción del Prospecto Web.');
                }
                if ($sat->contact == "NO") {
                    $message->setSubject('Prospecto No Contactado');
                }
                $aux1= strstr($suggestion->type, '-');
                $aux = substr($aux1, 1, 1);
              
                foreach ($suggestion->concessioner->emails as $email) {
                    if ($email->type == "SUGGESTION-$aux") {
                        $message->addTo($email->description);
                        // $message->addTo('franklin.paula@share.com.ec');
                        if ($email->type == "SUGGESTION-O") {
                            $message->addTo("rpazmino@ayasa.com.ec");
                        }
                        $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));
                    }
                }
                //$message->addTo("franklin.paula@share.com.ec");
                $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));
                Yii::app()->mail->send($message);
                $this->render('satisfaction_finished', array('suggestion' => $suggestion));
            }
        } else {

            if ($suggestion) {
                $this->render('satisfaction', array('model' => $model, 'suggestion' => $suggestion));
            }
        }
    }
}