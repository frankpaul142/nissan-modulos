<?php 
class EmailCommand extends CConsoleCommand {
    public function run($args) {
        $daynow= date("d");
        $monthnow=date("m");
		$datenow=date("Y-m-d");
		$datenow1=new DateTime($datenow);
		//die($datenow);
        $quotations= Quotation::model()->findAllByAttributes(array('review'=>'NO'));
		
        foreach($quotations as $quotation){
		
       // $datequotation=date("Y-m-d",$quotation->registration_date);
		$datequotation1=new DateTime($quotation->creation_date);
		$aux=date_diff($datenow1, $datequotation1);
		//die(print_r($datequotation1));
		//die(print_r($aux->days));
            if($aux->days==2){
                        $message = new YiiMailMessage;
                        $message->view = '48hours';
                        $message->setBody(array("quotation"=>$quotation),'text/html');
                        $message->setSubject('¿Le ofrecieron la información requerida del vehículo Nissan cotizado?. Trabajamos para ofrecerle un mejor servicio.');
                        $message->addTo($quotation->client->email);
                        $message->from = Yii::app()->params['adminEmail'];
                        if(Yii::app()->mail->send($message)){ 
                           $quotation->review="YES";
                           $quotation->save();
                           
                        }
            }
           
            
        }
		 $suggestions= Suggestion::model()->findAllByAttributes(array('review'=>'NO'));
		         foreach($suggestions as $suggestion){
		
       // $datequotation=date("Y-m-d",$quotation->registration_date);
		$datequotation1=new DateTime($suggestion->creation_date);
		$aux=date_diff($datenow1, $datequotation1);
		//die(print_r($datequotation1));
		//die(print_r($aux->days));
            if($aux->days==2){
                        $message = new YiiMailMessage;
                        $message->view = '48hours_sugerencia';
                        $message->setBody(array("suggestion"=>$suggestion),'text/html');
                        $message->setSubject('¿Le ofrecieron la información requerida de la sugerencia solicitada.?. Trabajamos para ofrecerle un mejor servicio.');
                        $message->addTo($suggestion->client->email);
                        $message->from = Yii::app()->params['adminEmail'];
                        if(Yii::app()->mail->send($message)){ 
                           $suggestion->review="YES";
                           $suggestion->save();
                           
                        }
            }
           
            
        }
		  $replacements= Replacement::model()->findAllByAttributes(array('review'=>'NO'));
		          foreach($replacements as $replacement){
		
       // $datequotation=date("Y-m-d",$quotation->registration_date);
		$datequotation1=new DateTime($replacement->creation_date);
		$aux=date_diff($datenow1, $datequotation1);
		//die(print_r($datequotation1));
		//die(print_r($aux->days));
            if($aux->days==2){
                        $message = new YiiMailMessage;
                        $message->view = '48hours_repuesto';
                        $message->setBody(array("replacement"=>$replacement),'text/html');
                        $message->setSubject('¿Le ofrecieron la información requerida del repuesto Nissan solicitado?. Trabajamos para ofrecerle un mejor servicio.');
                        $message->addTo($replacement->client->email);
                        $message->from = Yii::app()->params['adminEmail'];
                        if(Yii::app()->mail->send($message)){ 
                           $replacement->review="YES";
                           $replacement->save();
                           
                        }
            }
           
            
        }
        
    }
}
?>