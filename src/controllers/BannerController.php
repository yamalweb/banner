<?php

namespace yamalweb\banner\controllers;

use Yii;
use yamalweb\banner\models\Banner;
use yamalweb\banner\models\BannerSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

/**
 * Class BannerController
 * @package yamalweb\banner\controllers
 */
class BannerController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }


    /**
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
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

    /**
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new \common\modules\banner\models\Banner();

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {
            if($returnUrl = Yii::$app->request->get('return-url')){
                return $this->redirect([$returnUrl,'banner-id'=>$model->id]);
            }
            set_flash('Сохранено');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdatepic($id)
    {
        $model = $this->findOnePicModel($id);
        $model->setScenario('update');

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {

            return $this->redirect(['/banner/banner/update', 'id' => $model->banner_id]);
        }
        return $this->render('updatePic', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $currentPics = new ActiveDataProvider([
            'query' => $this->findPicModel($id),
        ]);
        $modelPic = new BannerPic();
        $modelPic->setScenario('update');

        if ( $modelPic->load(Yii::$app->request->post()) && $modelPic->validate() ) {

            $modelPic->banner_id = $id;
            $modelPic->save(false);
            set_flash('Сохранено');
            $this->refresh();
        }

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {
            set_flash('Сохранено');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'modelPic' => $modelPic,
            'currentPics' => $currentPics
        ]);
    }

    public function actionDeletepic($id)
    {
        $this->findOnePicModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function findPicModelById($id)
    {
        if ( ($model = Banner::find()->where(['id' => $id])->one()) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findPicModel($id)
    {
        if ( ($model = Banner::find()->where(['banner_id' => $id])) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findOnePicModel($id)
    {
        if ( ($model = Banner::find()->where(['id' => $id])->one()) !== null ) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ( ($model = \common\modules\banner\models\Banner::findOne($id)) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая странциа не найдена.');
    }

    /**
     * Deletes an existing Certificate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


}
