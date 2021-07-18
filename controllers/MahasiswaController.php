<?php

namespace app\controllers;

use Yii;
use app\models\Mahasiswa;
use app\models\MahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Prodi;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



        public function actionSubcat()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if(isset($_POST['depdrop_parents'])){
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Prodi::getProdiList($cat_id);

                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }


    /**
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();

        Yii::$app->params['uploadPath'] = Yii::$app->basePath.'/web/img/';
        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'gambar');
            $model->foto = $img->name;
            $model->gambar = $img;
            $model->save();
            $model->gambar->saveAs(Yii::$app->params['uploadPath'].$model->gambar);   

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->params['uploadPath'] = Yii::$app->basePath.'/web/img/';
        if ($model->load(Yii::$app->request->post())) {
            $old = $model->foto;
                if($old="") {
                    unlinlk(Yii::$app->basePath.'/web/img/' . $old);
                }
                $img = UploadedFile::getInstance($model, 'gambar');
                $model->foto = $img->name;
                $model->gambar = $img;
                $model->save();
                $model->gambar->saveAs(Yii::$app->params['uploadPath'].$model->gambar);


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model
    ]);
    }

    /**
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
