<?php

class MahasiswaController extends Controller
{
    private $_mahasiswa;
    
    
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('captcha','register','registerSuccess','token','dependentSelectJurusan'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','view','update'),
                'users' => array('@'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on 
            //the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }
    
    public function actionIndex()
    {
        $mahasiswa = new Mahasiswa('search');
        $mahasiswa->unsetAttributes();  // clear any default values
        if (isset($_GET['Mahasiswa'])) {
            $mahasiswa->attributes = $_GET['Mahasiswa'];
        }

        $this->render('index',array(
            'mahasiswa' => $mahasiswa,
        ));
    }

    public function actionRegister()
    {
        $mahasiswa = new Mahasiswa;
        $this->performAjaxValidation($mahasiswa);
        if (isset($_POST['Mahasiswa'])) {
            $mahasiswa = Mahasiswa::model()->findByNIM(trim($_POST['Mahasiswa']['nim']));
            if($mahasiswa !== null && $mahasiswa->registered == 1) {
                Yii::app()->user->setFlash('message',"Mahasiswa dengan "
                    . "NIM <b>{$mahasiswa->nim}</b> sudah terdaftar");
                $this->redirect(array('token'));
            }
            if($mahasiswa === null) {
                Yii::app()->user->setFlash('message',"Mahasiswa dengan "
                    . "NIM <b>{$_POST['Mahasiswa']['nim']}</b> tidak ada dalam sistem "
                    . "silahkan hubungi petugas LPPM");
                $mahasiswa = new Mahasiswa;
            } else if(isset($_POST['Mahasiswa']['namaLengkap'])) {
                $mahasiswa->attributes = $_POST['Mahasiswa'];
                $mahasiswa->registered = 1;
                if($mahasiswa->save()) {
                    $this->redirect(array('registerSuccess'));
                }
            }
        }
        
        $this->render('register',array(
            'mahasiswa' => $mahasiswa,
        ));
    }
    
    public function actionRegisterSuccess()
    {
        $this->render('registerSuccess');
    }
    
    public function actionToken()
    {
        $this->render('token');
    }

    public function actionUpdate()
    {
        $mahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
        $mahasiswa->update = true;
        $this->performAjaxValidation($mahasiswa);
        if(isset($_POST['Mahasiswa'])){
            $_POST['Mahasiswa']['password'];
            $mahasiswa->attributes=$_POST['Mahasiswa'];
            
            if ($mahasiswa->save()) {
                $this->redirect(array('/dashboard/mahasiswa/view'));
            }
        }
        $this->render('update',array(
            'mahasiswa'=>$mahasiswa,
        ));
    }
    
    public function actionDependentSelectJurusan()
    {
        echo CHtml::activeDropDownList(Mahasiswa::model(),'jurusanId', 
            CHtml::listData(Jurusan::model()->findAllByFakultasId($_GET['fakultasId']),'id','nama'),
            array('empty' => Yii::t('app','Select Jurusan'))
        );
        Yii::app()->end();
    }
    
    
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax'])) { 
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionView()
    {
        $this->layout = '//layouts/dashboard';
        if(!isset($_GET['id'])){
            $mahasiswa = Mahasiswa::model()->findByUserId(Yii::app()->user->id);
            $editable = true;
        } else {
            $mahasiswa = Mahasiswa::model()->findByPk($_GET['id']);
        } 
        if ($mahasiswa === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $editable = false;
        if ($mahasiswa->user !== null && $mahasiswa->user->id === Yii::app()->user->id) {
            $editable = true;
        }
        $this->render('view',array(
            'mahasiswa' => $mahasiswa,
            'editable' => $editable
        ));
    }
}
