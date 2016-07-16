<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'timeZone'=>'asia/jakarta',
	// preloading 'log' component
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.commands.*',
	),
	// application components
	'components'=>array(
		'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            //'Host' => "mail.budgetdesign.com.sg",
            //'Username' => 'testing@budgetdesign.com.sg',
            //'Password' => 'testing',
            'Mailer' => 'smtp',
           // 'Port' => 25,
            'SMTPAuth' => true,
        ),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=persseleb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);