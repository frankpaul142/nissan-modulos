<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','test'),
				'users'=>array('*'),
                              
			),
		
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                   $medio="default";
				   if(isset($_GET["medio"])){
          
          $medio=$_GET["medio"];
          
      }
			 $client= new Client();
                 $vehicle= new VehicleClient();
                 $technicaldate= new TechnicalDate();
                $concessioners=  Concessioner::model()->findAll();
				$criteria = new CDbCriteria;
				//$criteria->condition = 'id != 32 AND id != 33 AND id != 34  AND id != 36 AND id != 37 AND id != 38 AND id != 39 AND id != 40 AND id != 41 AND id != 42';
                //$criteria->order=name;
				$criteria = new CDbCriteria;
				//$criteria->condition = 'id != 36';
                $criteria->order="name";
				$versions= VehicleVersion::model()->with('vehicle')->findAllbyAttributes(array(),$criteria);
				//$versions= VehicleVersion::model()->findAllbyAttributes(array('status'=>'ACTIVE'),$criteria);
	        	if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($client);
        
			Yii::app()->end();
		}	
            
            	if(isset($_POST['siguiente']))
		{
                     
                   // die("hola");
                
                 
                if(isset($_POST['Client'])&& isset($_POST['TechnicalDate']) && isset($_POST['VehicleClient']))
		{
                    //die("hola");
                    $client= new Client;
                    $client->attributes=$_POST['Client'];
                    $client->save();
                    $vehicle= new VehicleClient;
                    $vehicle->attributes=$_POST['VehicleClient'];
                    $vehicle->save();
                    $technicaldate= new TechnicalDate;
                    $technicaldate->attributes=$_POST['TechnicalDate'];
                    $technicaldate->client_id=$client->primaryKey;
                    $technicaldate->vehicle_id=$vehicle->primaryKey;
                    if($technicaldate->work=='Mantenimiento Periódico' && isset($_POST['tdne'])){
                    	$technicaldate->work.=' '.$_POST['tdne'];
                    }
                    if($technicaldate->save()){
						$message = new YiiMailMessage;
						$message->view = 'agendamiento';
						$message->setSubject('Prospecto agendamiento de Cita');
						$message->setBody(array("client"=>$client,"vehicle"=>$vehicle,"technicaldate"=>$technicaldate),'text/html');
						  $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
             foreach($technicaldate->concessioner->emails as $email){
				if($email->type=="TECHNICAL_DATE"){
				$message->addTo($email->description);
				}
				$message->addTo("anaquishpe@ayasa.com.ec");
				$message->addTo("mgonzalez@ayasa.com.ec");
				$message->addTo("gzumarraga@ayasa.com.ec");
				$message->addTo("solicitudeswebnissan@gmail.com");
			
			}
				//$message->addTo("supervisorcallcenter@ayasa.com.ec");
				Yii::app()->mail->send($message);
                $this->render('result',array("client"=>$client,"vehicle"=>$vehicle,"technicaldate"=>$technicaldate));
               }else{
               		//print_r($technicaldate->getErrors());
			   		$this->render('error');
			   } 
                 
                }
                
              //$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"technicaldate"=>$technicaldate));
            }else{
                
             
		$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"technicaldate"=>$technicaldate,"versions"=>$versions,"medio"=>$medio));
                }
	}

	public function actionSatisfaction($id) {
        $technical = TechnicalDate::model()->findByPk($id);
        $model = new SatisfactionT;
        if (isset($_POST['SatisfactionT'])) {
              
            $model->attributes = $_POST['SatisfactionT'];
            $model->technical_id = $technical->id;
            if ($model->save()) {

                $sat = SatisfactionT::model()->findByPk($model->primaryKey);
                $message = new YiiMailMessage;
                $message->view = 'encuesta_t';
                $message->setBody(array("satisfaction" => $sat), 'text/html');
                $message->setSubject('Satisfacción del Prospecto Web.');
                if ($sat->score < 10) {
                    $message->setSubject('Satisfacción del Prospecto Web.');
                }
                if ($sat->contact == "NO") {
                    $message->setSubject('Prospecto No Contactado');
                }


                foreach ($technical->concessioner->emails as $email) {

                    if ($email->type == "TECHNICAL_DATE") {
                        $message->addTo($email->description);
                    }
                }
                //$message->addTo("franklin.paula@share.com.ec");
                $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));
                Yii::app()->mail->send($message);
                $this->render('satisfaction_finished', array('technical' => $technical));
            }
        } else {

            if ($technical) {
                $this->render('satisfaction', array('model' => $model, 'technical' => $technical));
            }
        }
    }

	public function actionDiagnostic() {
		 $medio="default";
				   if(isset($_GET["medio"])){
          
          $medio=$_GET["medio"];
          
      }
        $client = new Client();
        $vehicle = new VehicleClient();
        $technicaldate = new TechnicalDate();
        $criteria2= new CDbCriteria;
        //$criteria2->condition = 'id = 1 OR id = 3 OR id = 9 OR id = 13 OR id= 15 OR id = 16';
        $concessioners = Concessioner::model()->findAllbyAttributes(array(),$criteria2);
        $criteria = new CDbCriteria;
      
        //$criteria->order=name;
        $criteria = new CDbCriteria;
        //$criteria->condition = 'id != 36';
        $criteria->order = "name";
        $versions = VehicleVersion::model()->with('vehicle')->findAllbyAttributes(array(), $criteria);
        //$versions= VehicleVersion::model()->findAllbyAttributes(array('status'=>'ACTIVE'),$criteria);
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'client-form') {
            echo CActiveForm::validate($client);

            Yii::app()->end();
        }

        if (isset($_POST['siguiente'])) {

            // die("hola");


            if (isset($_POST['Client']) && isset($_POST['TechnicalDate']) && isset($_POST['VehicleClient'])) {
                //die("hola");
                $client = new Client;
                $client->attributes = $_POST['Client'];
                $client->save();
                $vehicle = new VehicleClient;
                $vehicle->attributes = $_POST['VehicleClient'];
                $vehicle->save();
                $technicaldate = new TechnicalDate;
                $technicaldate->attributes = $_POST['TechnicalDate'];
                $technicaldate->client_id = $client->primaryKey;
                ;
                $technicaldate->vehicle_id = $vehicle->primaryKey;
                ;
                if ($technicaldate->save()) {
                    $message = new YiiMailMessage;
                    $message->view = 'agendamiento';
                    $message->setSubject('Prospecto agendamiento de Cita');
                    $message->setBody(array("client" => $client, "vehicle" => $vehicle, "technicaldate" => $technicaldate), 'text/html');
                    $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));
                    foreach ($technicaldate->concessioner->emails as $email) {
                        if ($email->type == "TECHNICAL_DATE") {
                            $message->addTo($email->description);
                        }
                    }
                    //$message->addTo("supervisorcallcenter@ayasa.com.ec");
                    $message->addTo("anaquishpe@ayasa.com.ec");
					$message->addTo("mgonzalez@ayasa.com.ec");
					$message->addTo("gzumarraga@ayasa.com.ec");
					$message->addTo("solicitudeswebnissan@gmail.com");
                    Yii::app()->mail->send($message);
                    $this->render('result', array("client" => $client, "vehicle" => $vehicle, "technicaldate" => $technicaldate));
                } else {
                    $this->render('error');
                }
            }

            //$this->render('index',array('concessioners'=>$concessioners,"client"=>$client,"vehicle"=>$vehicle,"technicaldate"=>$technicaldate));
        } else {


            $this->render('index_d', array('concessioners' => $concessioners, "client" => $client, "vehicle" => $vehicle, "technicaldate" => $technicaldate, "versions" => $versions,"medio"=>$medio));
        }
    }
	    public function actionTest() {
		
        $message = new YiiMailMessage;
        $message->view = '48hours_repuesto';
		$message->setSubject('¿Cotizamos sus respuestos?');
        $message->setBody(array(), 'text/html');
        $message->addTo("franklin.paula@share.com.ec");
		 $message->addTo("roberto.fuentes@grupocreativo.ec");
        $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));

       if(Yii::app()->mail->send($message)){
	   echo "envio 1";
	   }
		
		
         $message = new YiiMailMessage;
        $message->view = '48hours_sugerencia';
		$message->setSubject('¿Un asesor comercial se ha contactado con usted?');
        $message->setBody(array(), 'text/html');
        $message->addTo("franklin.paula@share.com.ec");
		 $message->addTo("pablo.jara@share.com.ec");
        $message->setFrom(array(Yii::app()->params['adminEmail'] => 'El Equipo Nissan Ecuador'));

        if(Yii::app()->mail->send($message)){
		echo "envio 2";
		}
		
		
		die("");
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

        public function actionloadConcessioner(){
            $city= City::model()->findByPk($_POST['city_id']);
            $return= array();
            foreach($city->concessioners as $z => $concessioner){
              
                $return[$z]['id']=$concessioner->id;
                $return[$z]['name']=$concessioner->name;
                $return[$z]['address']=$concessioner->address;
                
            }
            echo json_encode($return);
        }
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}