<?php

class ChoferController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Chofer;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Chofer']))
		{
			$model->attributes=$_POST['Chofer'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', '<strong>¡Registrado!</strong> Se registró con éxito un nuevo Chofer');
				$this->redirect(array('create'));
			}
			//Yii::app()->user->setFlash('error', '<strong>¡Falló!</strong> Ocurrió un error al registrar el chofer');
		}
		
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Chofer']))
		{
			$model->attributes=$_POST['Chofer'];
			if($model->save())
			{	
				Yii::app()->user->setFlash('success', '<strong>¡Actualizado!</strong> Se actualizó con éxito la información de Chofer');	
				$this->redirect(array('admin','action'=>'Modificar'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		//Yii::app()->user->setFlash('success', '<strong>¡Eliminado!</strong> Se eliminó con éxito la información de Chofer');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Chofer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Chofer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Chofer']))
			$model->attributes=$_GET['Chofer'];

		/*$this->render('admin',array(
			'model'=>$model,
		));*/
		
		$imprime = Yii::app()->ePdf->HTML2PDF();
		$imprime->WriteHTML($this->renderPartial('imprime', /*array(
			'model'=>$model,
		)*/ compact('model'), true));
		//$imprime->WriteHTML('<table><tr><td>Hello WORLD</td></tr></table>');
		$imprime->Output('/tmp/choferes.pdf', EYiiPdf::OUTPUT_TO_BROWSER);
		//$imprime->Output();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Chofer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Chofer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Chofer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='chofer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
