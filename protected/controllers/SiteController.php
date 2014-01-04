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
                    dd($model);
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
        
        public function actionAluno()
	{
		$model=new Aluno;
                $model_aux =new Pessoa;
               
		if(isset($_POST['Aluno']))
		{
                     
			$model->attributes=$_POST['Aluno'];
                        $model_aux->attributes=$_POST['Pessoa'];
                        
                     
			if($model->validate())
			{       
                            $model->cadastroAluno($model);
                       
                            $id_aluno = (int)$model->procuraId($model);
                  
                            $model_aux->cadastroPessoa($model_aux, $id_aluno);
				
			}
		}
		$this->render('aluno',array('model'=>$model,
                                            'model_aux'=>$model_aux));
	}
        
        
        public function actionGridAluno()
	{
		$model=new Aluno;
                $model_aux =new Pessoa;
               //dd($model);
		if(isset($_POST['Pessoa'] ))
		{
                     dd($_POST);
			$model->attributes=$_POST['Aluno'];
                        $model_aux->attributes=$_POST['Pessoa'];
                        $this->renderPartial('gridAluno',array('model'=>$model,
                                                'model_aux'=>$model_aux));
                        
                     
			d($model);
                        dd($model_aux);
		}
		$this->render('gridAluno',array('model'=>$model,
                                                'model_aux'=>$model_aux));
	}
        public function actionProfessor()
	{
		$model=new Professor;
                $model_aux =new Pessoa;
               
		if(isset($_POST['Professor']))
		{
                     // d($_POST);
			$model->attributes=$_POST['Professor'];
                        $model_aux->attributes=$_POST['Pessoa'];
                        
                       // d($model);
                       // dd($model_aux);
			if($model->validate())
			{       
                            $model->cadastroAluno($model);
                            
                           // d($model);
                            
                            $id_aluno = (int)$model->procuraId($model);
                            
                           // dd($id_aluno);
                            
                            $model_aux->cadastroPessoa($model_aux, $id_aluno);
				
			}
		}
		$this->render('professor',array('model'=>$model,
                                            'model_aux'=>$model_aux));
	}

        
           public function actionDepartamento()
	{
		$model=new Departamento;
              
              
		if(isset($_POST['Departamento']))
		{
                      
			$model->attributes=$_POST['Departamento'];
                      
                        
                     
			if($model->validate())
			{       
                            $model->cadastroDepartamento($model);
                         
				
			}
		}
               // dd($model);
		$this->render('departamento',array('model'=>$model,
                                            ));
	}
	/**
	 * Displays the login page
	 */
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
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
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