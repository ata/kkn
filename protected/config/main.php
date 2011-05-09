<?php

date_default_timezone_set('Asia/Jakarta');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'KKN',

	// preloading 'log' component
	'preload'=>array('log'),
	'language' => 'id',
	'defaultController' => 'home',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.widgets.*',
		'application.components.widgets.grid.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'get',
			'showScriptName' => false,
			'urlSuffix' => '.aspx',
			'rules'=>array(
				// spesifik
				'admin' => 'admin/default/index',
				'admin/<controller:\w+>/<fakutasId:\d+>/dependentSelectJurusan'=>'admin/<controller>/dependentSelectJurusan',

				// common

				'admin/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				'admin/<controller:\w+>/<id:\d+>/<action:\w+>'=>'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
				'mahasiswa/<controller:\w+>/<id:\d+>'=>'admin/<controller>/view',
				'mahasiswa/<controller:\w+>/<id:\d+>/<action:\w+>'=>'admin/<controller>/<action>',
				'mahasiswa/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<id:\d+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=> require(dirname(__FILE__).'/database.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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

		'widgetFactory'=>array(
			'widgets'=>array(
				'CListView' => array(
					'cssFile' => false,
				),
				'CLinkPager' => array(
					'cssFile' => false,
				),
				'CGridView'=>array(
					'cssFile' => false,
				),
				'CDetailView'=>array(
					'cssFile' => false,
				),
				'CListView'=>array(
					'cssFile' => false,
				),
				'CActiveForm' => array(

					'clientOptions' => array(
						'validateOnSubmit' => true,
						'validateOnChange' => false,
					),

				),

			),
		),

		'mailer' => array(
			'class' => 'application.extensions.mailer.EMailer',
			'Mailer' => 'smtp',
			'SMTPAuth' => true,
			'Host' => 'mail.nevisa.web.id',
			'Username' => 'kkn+nevisa.web.id',
			'Password' => 'kkn',
			'From' => 'noreply@ngomik.com',
			'FromName' => 'LPPM'
		),
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'ext.giix.GiiModule',
			'password'=>'rahasia',
			// 'ipFilters'=>array(...a list of IPs...),
			'newFileMode'=>0644,
			'newDirMode'=>0755,
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ata@navisa.web.id',
		'webroot' => dirname(dirname(dirname(__FILE__))),
	),
);
