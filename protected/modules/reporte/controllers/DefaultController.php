<?php

class DefaultController extends Controller
{   
    
    public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view'),
				'users'=>array('*'),
                                'expression'=>'isset(Yii::app()->user->usertype))',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	public function actionIndex()
	{
	if(Yii::app()->user->isGuest){	       
            $model=new LoginForm;
                        $this->render('index',array('model'=>$model));
        }else{
          $this->redirect(Yii::app()->request->baseUrl.'/reporte/grid');  
        }
	}
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
				$this->redirect(Yii::app()->request->baseUrl.'/reporte/grid');
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}
        	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->request->baseUrl.'/reporte/default');
	}
}