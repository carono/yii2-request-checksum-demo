<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var \app\models\Order $order
 */
$form = ActiveForm::begin();
echo $form->field($order, 'name');
echo $form->field($order, 'cost');
echo $form->field($order, 'is_paid')->checkbox();
echo Html::submitButton('Add', ['class' => 'btn btn-success']);
ActiveForm::end();