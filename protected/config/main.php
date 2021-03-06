<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Share Room',
    'language' => 'vi',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.yii-facebook-opengraph.*',
//        'ext.*'
	),

	'modules'=>array(
        'admin',
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
        'facebook'=>array(
//            'class' => '\YiiFacebook\SFacebook',
            // client site dev
            'class' => 'ext.yii-facebook-opengraph.YiiFacebookOpengraph',
            //'appId'=>'307712732770232', // needed for JS SDK, Social Plugins and PHP SDK912936042093128
            //'secret'=>'4cb70d39c27a6de827ffa1a22791da01', // needed for the PHP SDK

            //client id shareroom.vn
            'appId'=>'1621562994796845', // needed for JS SDK, Social Plugins and PHP SDK912936042093128
            'secret'=>'1512c0e5b45d3e9c004ac18c1a20d831', // needed for the PHP SDK
            'version'=>'v2.3', // Facebook APi version to default to
            //'locale'=>'en_US', // override locale setting (defaults to en_US)
            //'jsSdk'=>true, // don't include JS SDK
            //'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            //'callbackScripts'=>'', // default JS SDK init callback JavaScript
            //'status'=>true, // JS SDK - check login status
            //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            //'hideFlashCallback'=>null, // JS SDK - A function that is called whenever it is necessary to hide Adobe Flash objects on a page.
            //'html5'=>true,  // use html5 Social Plugins instead ofolder XFBML
            //'defaultScope'=>array(), // default Facebook Login permissions to request
            //'redirectUrl'=>null, // default Facebook post-Login redirect URL
            //'expiredSessionCallback'=>null, // PHP callable method to run if expired Facebook session is detected
            //'userFbidAttribute'=>null, // if using SFacebookAuthBehavior, declare Facebook ID attribute on user model here
            //'accountLinkUrl'=>null, // if using SFacebookAuthBehavior, declare link to user account page here
            //'ogTags'=>array(  // set default OG tags
            //'og:title'=>'MY_WEBSITE_NAME',
            //'og:description'=>'MY_WEBSITE_DESCRIPTION',
            //'og:image'=>'URL_TO_WEBSITE_LOGO',
            //),
        ),
        'google' => array(
            'class' => 'ext.yii-google-api-php-client.YiiGoogleApi',
            // See http://code.google.com/p/google-api-php-client/wiki/OAuth2
            // client id shareroom.vn
            'clientId' => '441501181947-i6vvh4adacu0ejv338mdi71egrrdeps2.apps.googleusercontent.com',
            'clientSecret' => 'UsGUhSMlol9fN3DCRIBrlJR7',

            // client Id dev local shareroomyii1.com
            //'clientId' => '441501181947-c8rfavgbor7r3p6dmp6i17dcorkslojh.apps.googleusercontent.com',
            //'clientSecret' => 'SczvVtWbaqzhHqhHGyUaO6Nk',
             // This is the API key for 'Simple API Access'
            'developerKey' => 'AIzaSyD1KM1GqKb_vr6FXEAJ8azksz1PBRzkwAk',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'returnUrl'=>'/profile/dashboard',
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
		        'rooms/view/<id>/<name>'=>'rooms/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
            ),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
// 			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, trace',
                    'categories'=>'system.db.*',
                    'logFile'=>'sql.log',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),

        'clientScript' => array(
            'class' => 'MyClientScript',
            'scriptMap' => array(
                'jquery.js'=>false,  //disable default implementation of jquery
                'jquery.min.js'=>false,  //desable any others default implementation
                'jquery.ba-bbq.js' => false,
            )
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@shareroom.vn',
	),
);
