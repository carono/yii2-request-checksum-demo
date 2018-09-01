<?php

namespace app\controllers;

use app\models\Order;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = Order::find()->search();
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $order = Order::findOne($id, true);
        if ($order->load(Yii::$app->request->post())) {
            $order->save();
            return $this->redirect(['index']);
        }
        return $this->render('update', ['order' => $order]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionView($id)
    {
        $order = Order::findOne($id, true);
        return $this->render('view', ['order' => $order]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionCreate()
    {
        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            $order->save();
            return $this->redirect(['index']);
        }
        return $this->render('create', ['order' => $order]);
    }

    public function actionDelete($id)
    {
        Order::findOne($id, true)->delete();
        return $this->redirect(['index']);
    }
}
