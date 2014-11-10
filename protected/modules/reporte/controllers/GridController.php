<?php

class GridController extends Controller
{
    public $layout='//layouts/column2';

  public static $wid;
  public static $dataProvider;


    	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index'),
				'users'=>array('@'),
                              
			),
		
		);
	}

	public function actionIndex()
	{
		
                    $concessioners=  Concessioner::model()->findAll();
                    $vehicles= Vehicle::model()->findAllByAttributes(array('status'=>'ACTIVE'));
                    $versions= VehicleVersion::model()->findAllByAttributes(array('status'=>'ACTIVE'));
                    $cities= City::model()->findAll();
                      
                   if(isset($_POST['Search'])){
                      $criteria = new CDbCriteria;
                      $date="";
                      $vehicle_or_version="";
                      $columns= array();
                 switch ($_POST['Search']['module']) {
                        case "TechnicalDate":                         
                             $columns = array(
                                'id',
                                 'client.identity',
                                'client.name',
                                'client.lastname',
                                'client.email',
								'client.phone',
								'client.preference_contact',
								'client.cellphone',
								'vehicle.model',
								'vehicle.year',
								'vehicle.license_plate',
								'vehicle.kilometer',
						
                                'concessioner.name',
								'concessioner.address',
                                'work',
                                'preference_date',
                                'hour',
                                 'taxi',
                                 'detail_work',
                                'creation_date'
                            );
                            $date="creation_date";
                            $vehicle_or_version="vehicle_id";
                            break;
                        case "Quotation":
                                $columns = array(
                                'id',
                                 'Cédula'=>    'client.identity:text',
                              'Nombre'=>  'client.name:text',
                                'Apellido'=> 'client.lastname:text',
                                       'client.email:text',
									   	'client.phone',
								'client.preference_contact',
								'client.preference_contact2',
								'client.cellphone',
								'client.localize',
                               'concessioner.name',
								  'Ciudad'=>'concessioner.city.name',
								'Vehiculo 1'=>'vehicleversion.vehicle.name',
                               'Referencia 1 vehículo'=>'vehicleversion.reference',
							   'Vehiculo 2'=>'vehicleversion2.vehicle.name',
                               'Referencia 2 vehículo'=> 'vehicleversion2.reference',
                                'Tiempo'=> 'time:text',
                                'Fecha de creación'=>'creation_date'
                            );
                            
                            $date="creation_date";
                            $vehicle_or_version="vehicle_version_id";
                            break;
                        case "Replacement":
                              $columns = array(
                                'id:number',
                                  'Cédula'=>  'client.identity:text',
                               'Nombre'=> 'client.name:text',                                
                               'Apellido'=> 'client.lastname:text',
                                     'client.email:text',
									 	'client.phone',
								'client.preference_contact',
								'client.cellphone',
                               'Concesionario'=> 'concessioner.name:text',
                               'Parte a reemplazar'=> 'part:text',
							   	'vehicle.model',
								'vehicle.year',
								'vehicle.license_plate',
								'vehicle.kilometer',
								'vehicle.chasis',
								'Fecha de creación'=>'creation_date'
                            );
                            $vehicle_or_version="vehicle_id";
                            break;
                            case "Suggestion":
                              $columns = array(
                                'id:number',
                                'Cédula'=>   'client.identity:text',
                              'Nombre'=>  'client.name:text',
                               
                               'Apellido'=> 'client.lastname:text',
                                     'client.email:text',
									 	'client.phone',
								'client.preference_contact',
								'client.cellphone',
                               'Concesionario'=> 'concessioner.name:text',
                               'Vehículo'=> 'vehicle.name:text',
                               'Descripción'=> 'description:text',
                                'Tipo'=>  'type:text',
                                 'Fecha de creación'=>    'creation_date:date'
                            );
                          $date="creation_date";
                            break;
							  case "Satisfaction":
                    $columns = array(
                        'id:number',
                        'Cédula' => 'quotation.client.identity:text',
                        'Nombre' => 'quotation.client.name:text',
                        'Apellido' => 'quotation.client.lastname:text',
                        'quotation.client.email:text',
                        'quotation.client.phone',
                        'quotation.client.preference_contact',
                        'quotation.client.cellphone',
                        'Concesionario' => 'quotation.concessioner.name:text',
                        ' Cliente Contactado' => 'contact:text',
                        'Puntaje' => 'score:text',
                        'Descripción' => 'description:text',
                        'Fecha de creación' => 'creation_date:date'
                    );
                    $date = "creation_date";
                    break;
									  case "SatisfactionR":
                    $columns = array(
                        'id:number',
                        'Cédula' => 'replacement.client.identity:text',
                        'Nombre' => 'replacement.client.name:text',
                        'Apellido' => 'replacement.client.lastname:text',
                        'replacement.client.email:text',
                        'replacement.client.phone',
                        'replacement.client.preference_contact',
                        'replacement.client.cellphone',
                        'Concesionario' => 'replacement.concessioner.name:text',
                        ' Cliente Contactado' => 'contact:text',
                        'Puntaje' => 'score:text',
                        'Descripción' => 'description:text',
                        'Fecha de creación' => 'creation_date:date'
                    );
                    $date = "creation_date";
                    break;
					  case "SatisfactionS":
                    $columns = array(
                        'id:number',
                        'Cédula' => 'suggestion.client.identity:text',
                        'Nombre' => 'suggestion.client.name:text',
                        'Apellido' => 'suggestion.client.lastname:text',
                        'suggestion.client.email:text',
                        'suggestion.client.phone',
                        'suggestion.client.preference_contact',
                        'suggestion.client.cellphone',
                        'Concesionario' => 'suggestion.concessioner.name:text',
                        ' Cliente Contactado' => 'contact:text',
                        'Puntaje' => 'score:text',
                        'Descripción' => 'description:text',
                        'Fecha de creación' => 'creation_date:date'
                    );
                    $date = "creation_date";
                    break;
                    } 
                   if($_POST['Search']['date_from'] && $_POST['Search']['date_to']){
                        
                        $criteria->addBetweenCondition('creation_date', $_POST['Search']['date_from'], $_POST['Search']['date_to']);
                    }
                    if($_POST['Search']['city']!=0 && $_POST['Search']['concessioner']==0 ){
                        $citiess= City::model()->findByPk($_POST['Search']['city']);
                       
                        foreach($citiess->concessioners as $concessioner){
                        
                        $criteria->addSearchCondition('concessioner_id',$concessioner->id,"",'OR');
                        }
                    }elseif($_POST['Search']['city']!=0 && $_POST['Search']['concessioner']!=0){
                       
                     $criteria->addSearchCondition('concessioner_id',$_POST['Search']['concessioner']);   
                    }
                    if($_POST['Search']['identity']){
                        $clients=  Client::model()->findAllByAttributes(array('identity'=>$_POST['Search']['identity']));
                        foreach($clients as $client){
                       $criteria->addSearchCondition('client_id',$client->id,"",'OR');    
                        }
                    }
                    if($_POST['Search']['name']){
                         $clients2=  Client::model()->findAllByAttributes(array('name'=>$_POST['Search']['name']));
                        foreach($clients2 as $client){
                       $criteria->addSearchCondition('client_id',$client->id,"",'OR');    
                        }
                        
                    }
                      if($_POST['Search']['lastname']){
                           $clients3=  Client::model()->findAllByAttributes(array('lastname'=>$_POST['Search']['lastname']));
                        foreach($clients3 as $client){
                       $criteria->addSearchCondition('client_id',$client->id,"",'OR');    
                        }
                        
                    }
                      if($_POST['Search']['email']){
                           $clients4=  Client::model()->findAllByAttributes(array('email'=>$_POST['Search']['email']));
                        foreach($clients4 as $client){
                       $criteria->addSearchCondition('client_id',$client->id,"",'OR');    
                        }
                        
                    }
                    if($_POST['Search']['model']!=0 &&  $_POST['Search']['version']==0){
                        
                        if($vehicle_or_version=="vehicle_id"){
                                  
                            $criteria->addSearchCondition('vehicle_id',$_POST['Search']['model']);  
                                  
                        }elseif($vehicle_or_version=="vehicle_version_id"){
                            
                          $vehicle1= Vehicle::model()->findByPk($_POST['Search']['model']);
                       
                            foreach($vehicle1->vehicleVersions as $version){

                            $criteria->addSearchCondition('vehicle_version_id',$version->id,"",'OR');
                             $criteria->addSearchCondition('vehicle_version_id2',$version->id,"",'OR');
                            }    
                            
                        }
                       
                    }elseif($_POST['Search']['model']==0 &&  $_POST['Search']['version']!=0){
                        
                        
                             
                              if($vehicle_or_version=="vehicle_version_id"){    
                              $criteria->addSearchCondition('vehicle_version_id',$_POST['Search']['version'],"",'OR');
                             $criteria->addSearchCondition('vehicle_version_id2',$_POST['Search']['version'],"",'OR');
                              }   
                        
                            
                        }
                        
                   
                    if($_POST['Search']['module']!="0"){
                         $pagination = new EDTPagination();
                         $criteria->order="id DESC";
                         $pagination->applyLimit($criteria);
                         $sort = new EDTSort($_POST['Search']['module'], $columns);
                        $sort->defaultOrder = 'id';
                        
                         //die(print_r($criteria));
                    self::$dataProvider = new CActiveDataProvider($_POST['Search']['module'], array(
                     'criteria'      => $criteria,
                     'pagination'    => $pagination,
                            'sort' => $sort
                        ));
                  
                    }else{
                        
                        
                    self::$dataProvider = new CActiveDataProvider('TechnicalDate', array(
                     'criteria'      => $criteria));  
                       
                    }
              $widget2 = $this->widget('EExcelView', array(
                'dataProvider'=> self::$dataProvider,
                'grid_mode'=>'export',
                'title'=>'report',
                'autoWidth'=>true,
                'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
                'filename'=>'report',
                'stream'=>false,
                'columns' => $columns 
                    ));

                      $widget1=$this->createWidget('ext.EDataTables.EDataTables', array(
                        'id'            => 'data_table',
                        'dataProvider'  => self::$dataProvider,
                      
                        //'ajaxUrl'       => $this->createUrl('grid/DataTables'),
                          
                      
                        'columns'       => $columns,
                        'serverData' => array("module"=>$_POST['Search']['module']),
                        'buttons'        => array(
                             'refresh' => null,

         
                        ),
                        'options' => array(
                                        'bStateSave'    => false,
                                        'bPaginate'     => false,
                                        'bLengthChange' => true, 
                                    
                                       
                                          
                                        
                                   
                         ),
      
                       ));
                     
                       if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                              $export=0;
                           if($_POST['Search']['print']=="YES"){
                                $export=1; 
                           }
                        
                      $this->render('index',array('cities'=>$cities,'vehicles'=>$vehicles,'versions'=>$versions,'concessioners'=>$concessioners,'widget2'=>$widget2,'widget1'=>$widget1,'export'=>$export));
                         return;
                       } else {
                         echo json_encode(self::$wid->getFormattedData(intval($_REQUEST['sEcho'])));
                         Yii::app()->end();
                       } 
                       
                       
                   }
                   else{
                $this->render('index',array('cities'=>$cities,'vehicles'=>$vehicles,'versions'=>$versions,'concessioners'=>$concessioners));
                   }
	}



    

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}