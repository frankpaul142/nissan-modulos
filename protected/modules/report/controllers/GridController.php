<?php

class GridController extends Controller
{
    public $layout='//layouts/column2';

  public static $wid;

    
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
                                'id:number',
                                  'client.identity:text',
                                'client.name:text',
                                'client.lastname:text',
                                 'client.email:text',
                                'concessioner.name:text',
                                'work:text',
                                'preference_date:date',
                                 'hour:text',
                                 'taxi:text',
                                 'detail_work:text',
                                'creation_date:date'
                            );
                            $date="creation_date";
                            $vehicle_or_version="vehicle_id";
                            break;
                        case "Quotation":
                                $columns = array(
                                'id:number',
                                     'client.identity:text',
                                'client.name:text',
                                 
                                'client.lastname:text',
                                       'client.email:text',
                                'concessioner.name:text',
                               'vehicleversion.reference:text',
                                'vehicleversion2.reference:text',
                                 'time:text',
                                'registration_date:date'
                            );
                            
                            $date="registration_date";
                            $vehicle_or_version="vehicle_version_id";
                            break;
                        case "Replacement":
                              $columns = array(
                                'id:number',
                                    'client.identity:text',
                                'client.name:text',
                                
                                'client.lastname:text',
                                     'client.email:text',
                                'concessioner.name:text',
                                'part:text'
                            );
                            $vehicle_or_version="vehicle_id";
                            break;
                            case "Suggestion":
                              $columns = array(
                                'id:number',
                                   'client.identity:text',
                                'client.name:text',
                               
                                'client.lastname:text',
                                     'client.email:text',
                                'concessioner.name:text',
                                'vehicle.name:text',
                                'description:text',
                                  'type:text',
                                     'creation_date:date'
                            );
                          $date="creation_date";
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
                    $dataProvider = new CActiveDataProvider($_POST['Search']['module'], array(
                     'criteria'      => $criteria,
                     'pagination'    => $pagination,
                            'sort' => $sort
                        ));
               
                    }else{
                        
                        
                        $dataProvider = new CActiveDataProvider('TechnicalDate', array(
                     'criteria'      => $criteria));  
                       
                    }
                    
                   
                     
                      self::$wid=$this->createWidget('ext.EDataTables.EDataTables', array(
                        'id'            => 'data_table',
                        'dataProvider'  => $dataProvider,
                      
                        'ajaxUrl'       => $this->createUrl('grid/DataTables'),
                          
                      
                        'columns'       => $columns,
                        'serverData' => array("module"=>$_POST['Search']['module']),
                        'buttons'        => array(
                        'export' => array(
                            'label' => Yii::t('app','Save as CSV'),
                            'text' => false,
                            'htmlClass' => '',
                            'icon' => Yii::app()->theme!==null&&Yii::app()->theme->name=='bootstrap' ? 'icon-download-alt' : 'ui-icon-disk',
                            'url' => $this->createUrl('grid/exportCVS'),
                        ),
                        ),
                        'options' => array(
                                        'bStateSave'    => false,
                                        'bPaginate'     => false,
                                        'bLengthChange' => true, 
                                        'iDisplayLength'=> 50,
                                       
                                          
                                        
                                   
                         ),
      
                       ));
                     
                       if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                      $this->render('index',array('cities'=>$cities,'vehicles'=>$vehicles,'versions'=>$versions,'concessioners'=>$concessioners,'widget'=>  self::$wid));
                         return;
                       } else {
                         echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
                         Yii::app()->end();
                       } 
                       
                       
                   }
                   else{
                $this->render('index',array('cities'=>$cities,'vehicles'=>$vehicles,'versions'=>$versions,'concessioners'=>$concessioners));
                   }
	}
                  public function actionexportCVS() {
            
        return array(
            'export' => array(
                'class'        => 'ext.exporter.ExportAction',
                'modelClass'=> 'PreciousMetalFixing',
                'columns'    => $columns(),
                'widget'    => array('filename' => 'reporte.csv'),
            ),
        );
    }
public function actionDataTables(){
          $criteria = new CDbCriteria;       
            $pagination = new EDTPagination();
                       
                         $sort = new EDTSort($_REQUEST['module'], $_REQUEST['sColumns']);
                        $sort->defaultOrder = 'id';

                         //die(print_r($criteria));
                    $dataProvider = new CActiveDataProvider($_REQUEST['module'], array(
                     'criteria'      => $criteria,
                     'pagination'    => $pagination,
                            'sort' => $sort
                        ));
     
             self::$wid=$this->createWidget('ext.EDataTables.EDataTables', array(
                        'id'            => 'data_table',
                        'dataProvider'  => $dataProvider,
                      
                        'ajaxUrl'       => $this->createUrl('grid/DataTables'),
                          
                      
                        'columns'       => $_REQUEST['sColumns'],
                        'serverData' => array("dataProvider"=>$dataProvider),
                        'buttons'        => array(
                        'export' => array(
                            'label' => Yii::t('app','Save as CSV'),
                            'text' => false,
                            'htmlClass' => '',
                            'icon' => Yii::app()->theme!==null&&Yii::app()->theme->name=='bootstrap' ? 'icon-download-alt' : 'ui-icon-disk',
                            'url' => $this->createUrl('grid/exportCVS'),
                        ),
                        ),
                        'options' => array(
                                        'bStateSave'    => false,
                                        'bPaginate'     => true,
                                        'bLengthChange' => true, 
                                        'iDisplayLength'=> 50,
                                       
                                          
                                        
                                   
                         ),
      
                       ));
      echo json_encode( self::$wid->getFormattedData(intval($_REQUEST['sEcho'])));
                         Yii::app()->end();

                       
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