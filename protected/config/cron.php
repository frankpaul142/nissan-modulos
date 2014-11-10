<?php

return array(
    // This path may be different. You can probably get it from `config/main.php`.
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Cron',
  'timeZone' => 'America/Guayaquil',
    'preload'=>array('log'),
 
    'import'=>array(
        'application.components.*',
        'application.models.*',
         'application.extensions.*',
        'ext.yii-mail.YiiMailMessage',
    ),
    // We'll log cron messages to the separate files
    
    'components'=>array(
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron.log',
                    'levels'=>'error, warning',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron_trace.log',
                    'levels'=>'trace',
                ),
            ),
        ),
             'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),
        // Your DB connection
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=nissanec_web2',
			'emulatePrepare' => true,
			'username' => 'nissanec_webcont',
			'password' => '+E8yw6Lv)g.V',
			'charset' => 'utf8',
		),
		
    ),
		'params'=>array(
		// this is used in contact page
		'adminEmail'=>'equiponissan@nissanecuador.webcontent.ec',
	),
);
