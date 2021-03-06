<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{
    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $this->render('view',array(
            '<?php echo $this->modelId?>' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $<?php echo $this->modelId?> = new <?php echo $this->modelClass; ?>;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($<?php echo $this->modelId?>);

        if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
            $<?php echo $this->modelId?>->attributes=$_POST['<?php echo $this->modelClass; ?>'];
            if ($<?php echo $this->modelId?>->save()) {
                $this->redirect(array('view','id' => $<?php echo $this->modelId?>-><?php echo $this->tableSchema->primaryKey; ?>));
            }
        }

        $this->render('create',array(
            '<?php echo $this->modelId?>' => $<?php echo $this->modelId?>,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $<?php echo $this->modelId?> = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($<?php echo $this->modelId?>);

        if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
            $<?php echo $this->modelId?>->attributes=$_POST['<?php echo $this->modelClass; ?>'];
            if ($<?php echo $this->modelId?>->save()) {
                $this->redirect(array('view','id' => $<?php echo $this->modelId?>-><?php echo $this->tableSchema->primaryKey; ?>));
            }
        }

        $this->render('update',array(
            '<?php echo $this->modelId?>' => $<?php echo $this->modelId?>,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('<?php echo $this->modelClass; ?>');
        $this->render('index',array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $<?php echo $this->modelId?> = new <?php echo $this->modelClass; ?>('search');
        $<?php echo $this->modelId?>->unsetAttributes();  // clear any default values
        if (isset($_GET['<?php echo $this->modelClass; ?>'])) {
            $<?php echo $this->modelId?>->attributes = $_GET['<?php echo $this->modelClass; ?>'];
        }

        $this->render('admin',array(
            '<?php echo $this->modelId?>' => $<?php echo $this->modelId?>,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $this->_model = <?php echo $this->modelClass; ?>::model()->findbyPk($_GET['id']);
            }
            if ($this->_model === null) {
                throw new CHttpException(404,'The requested page does not exist.');
            }
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($<?php echo $this->modelId?>)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === '<?php echo $this->class2id($this->modelClass); ?>-form') { 
            echo CActiveForm::validate($<?php echo $this->modelId?>);
            Yii::app()->end();
        }
    }
}
