<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),

            /*'oauth' => array(
                // the list of additional properties of this action is below
                'class'=>'ext.hoauth.HOAuthAction',
                // Yii alias for your user's model, or simply class name, when it already on yii's import path
                // default value of this property is: User
                'model' => 'Users',
                // map model attributes to attributes of user's social profile
                // model attribute => profile attribute
                // the list of avaible attributes is below
                'attributes' => array(
                    'email' => 'email',
                    'first_name' => 'firstName',
                    'last_name' => 'lastName',
                    'gender' => 'genderShort',
                    'birthday' => 'birthDate',
                    // you can also specify additional values,
                    // that will be applied to your model (eg. account activation status)
//                    'acc_status' => 1,
                ),
            ),
            // this is an admin action that will help you to configure HybridAuth
            // (you must delete this action, when you'll be ready with configuration, or
            // specify rules for admin role. User shouldn't have access to this action!)
            'oauthadmin' => array(
                'class'=>'ext.hoauth.HOAuthAdminAction',
            ),*/
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionSignIn()
	{
        $this->pageTitle = Yii::t('app', 'Đăng nhập');

        // Debug
        if(isset($_GET['code']) && $_GET['code']){
            $signedRequest = Yii::app()->facebook->getSignedRequest();
            Common::debug($signedRequest);
//            $signedRequestData = Yii::app()->facebook->getSignedRequestData();
//            Common::debug($signedRequestData);
            Common::debugdie($_REQUEST);
        }

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
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('signin',array('model'=>$model));
	}


    /**
     * Displays the sign up page
     */
    public function actionSignUp()
    {
        $this->pageTitle = Yii::t('app', 'Đăng ký');

        $usersModel = new Users('register');
        if(isset($_POST['Users']))
        {
            $usersModel->attributes=$_POST['Users'];
            $password = $usersModel->password;
            if($usersModel->save()){
                //Set login
                $_identity = new UserIdentity($usersModel->email, $password);
                $_identity->id = $usersModel->id;
                $_identity->setState('id', $usersModel->id);
                $_identity->setState('email', $usersModel->email);
                $_identity->setState('first_name', $usersModel->first_name);
                $_identity->setState('last_name', $usersModel->last_name);
                Yii::app()->user->login($_identity, 0);
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('signup', array(
            'usersModel' => $usersModel
        ));
    }
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}