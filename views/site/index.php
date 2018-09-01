<?php

use yii\grid\GridView;

/**
 * @var $this yii\web\View
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'My Yii Application';

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'cost',
        'is_paid:boolean',
        'status_id',
        'comment:ntext',
        ['class' => \yii\grid\ActionColumn::class]
    ]
]);