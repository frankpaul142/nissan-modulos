<?php

class DefaultController extends Controller
{
	public $layout="//layouts/module";

	public function actionIndex()
	{
        $client = new Client;
        $catalogs= Catalog::model()->findAll(array('condition'=>"status='ACTIVE'", 'order'=>'category'));
        $pictures=[];
        $files=[];
        foreach ($catalogs as $i => $catalog) {
        	array_push($pictures, $catalog->vehicle->pictures[0]->description);
        	array_push($files, $catalog->file);
        }
        $this->render('index',array("catalogs"=>$catalogs,'client'=>$client, 'pictures'=>$pictures, 'files'=>$files));
	}

	public function actionvalidateRegisterUserDataAjax(){
        $model=new Client;
        $model->attributes=$_POST['Client'];
        $model->preference_contact='';
        echo CActiveForm::validate($model);
    }

	public function actionCompleteRegistrationAjax(){
		if(isset($_POST['selection']) && isset($_POST['Client'])){
	        $client = New Client;
	        $client->attributes=$_POST['Client'];
	        $client->preference_contact='-';
	        if($client->save()){
	        	$error=false;
	        	for ($i=0; $i<strlen($_POST['selection']); $i+=2) {//echo json_encode($i.'-');
	        		$cc=new ClientCatalog();
	        		$cc->client_id=$client->id;
	        		$cc->catalog_id=$_POST['selection'][$i];
	        		$cc->creation_date=date("Y-m-d H:i:s");
	        		$cc->isNewRecord=true;
	        		if(!$cc->save()){
	        			$error=true;
	        			break;
	        		}
	        		unset($cc);
	        	}
	        	if(!$error){
					/*$quot= Quotation::model()->findByPk( $quotation->primaryKey);
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
		            $message->setFrom(array(Yii::app()->params['adminEmail']=>'El Equipo Nissan Ecuador'));
		            Yii::app()->mail->send($message);*/
		            echo json_encode(true);
		        }
		        else{
		            echo json_encode(false);
		        }
	        }
	        else{
	        	echo "no save client";
	        	echo json_encode($client->getErrors());
	        }
	    }
	    else{
	    	echo 'no post';
	    }
    }
        
}