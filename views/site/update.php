<?php

use yii\widgets\ActiveForm;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Order $order
 */

$form = ActiveForm::begin();
echo $form->field($order, 'name')->textInput();
echo Html::checkbox('add-comment', false, ['label' => 'Add Comment', 'id' => 'add-comment']);
echo $form->field($order, 'comment')->textarea(['disabled' => true])->label(false);
echo $form->field($order, 'status_id')->dropDownList([1 => 'Status 1', 2 => 'Status 2']);
echo Html::submitButton('Update', ['class' => 'btn btn-success']);
echo Html::button('Add fields by JS', ['class' => 'btn btn-warning', 'id' => 'btn-js']);
ActiveForm::end();

$script = <<<JS
$('#btn-js').on('click', function() {
  let form = $('form');
  form.append('<input type="text" name="Order[is_paid]" placeholder="is paid">');
});

$('#add-comment').on('change',function(){
    let instance = $(this);
    $('#order-comment').prop('disabled', function(i, v) { return !instance.prop('checked'); });
});
JS;

$this->registerJs($script);