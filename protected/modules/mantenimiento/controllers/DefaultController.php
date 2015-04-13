<?php

class DefaultController extends Controller
{
	public $layout="//layouts/module";

	public function actionIndex()
	{
        $mantenimientos= Maintainance::model()->findAll(array('group'=>'vehicle_id'));
        $kms=Rutine::model()->findAll(array('select'=>'km','group'=>'km'));
        $client = new Client;
        $medio='website';
        if(isset($_GET["medio"])){
     		$medio=$_GET["medio"];
    	}
        $this->render('index',array("mantenimientos"=>$mantenimientos,'medio'=>$medio,'kms'=>$kms,'client'=>$client));
	}

	public function actionvalidateRegisterUserDataAjax(){
        $model=new Client;
        $model->attributes=$_POST['Client'];
        $model->preference_contact='';
        echo CActiveForm::validate($model);
    }

	public function actionCompleteRegistrationAjax(){
		if(isset($_POST['vehicle_id']) && isset($_POST['km']) && isset($_POST['Client'])){
	        $client = New Client;
	        $client->attributes=$_POST['Client'];
	        $client->preference_contact='-';
	        if($client->save()){
	        	$maintainance=Maintainance::model()->findByAttributes(array('vehicle_id'=>$_POST['vehicle_id'],'km'=>$_POST['km']));
	        	if($maintainance){
		        	$clientMaintainance=new ClientMaintainance;
		        	$clientMaintainance->client_id=$client->id;
		        	$clientMaintainance->maintainance_id=$maintainance->id;
		        	$clientMaintainance->creation_date=date('Y-m-d H:i:s');
		        	if($clientMaintainance->save()){
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
			            $rutines=Rutine::model()->findAllByAttributes(array('km'=>$_POST['km']));
			            $return=[];
			            $return['pdf']=$maintainance->vehicle->pdf;
			            foreach ($rutines as $i => $rutine) {
			            	$return[]=$rutine->description;
			            }
			            echo json_encode($return);
			        }
			        else{
			            echo "no save clientMaintainance";
			        }
			    }
			    else{
			    	echo "no maintainance";
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