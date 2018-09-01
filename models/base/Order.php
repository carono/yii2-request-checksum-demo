<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace app\models\base;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the base-model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cost
 * @property integer $is_paid
 */
class Order extends ActiveRecord
{
    protected $_relationClasses = [];


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'is_paid', 'status_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\Order|\yii\db\ActiveRecord
     */
    public static function findOne($condition, $raise = false)
    {
        $model = parent::findOne($condition);
        if (!$model && $raise) {
            throw new \yii\web\HttpException(404, Yii::t('app', "Model app\\models\\Order not found"));
        } else {
            return $model;
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'cost' => Yii::t('app', 'Cost'),
            'is_paid' => Yii::t('app', 'Is Paid')
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrderQuery(get_called_class());
    }


    /**
     * @param string $attribute
     * @return string|null
     */
    public function getRelationClass($attribute)
    {
        return ArrayHelper::getValue($this->_relationClasses, $attribute);
    }
}
