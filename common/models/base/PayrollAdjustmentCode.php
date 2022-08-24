<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "payroll_adjustment_code".
 *
 * @property string $code
 * @property string $adj_type
 * @property integer $post_to_carrier_id
 * @property integer $post_to_vendor_id
 * @property string $adj_class
 * @property string $account
 * @property string $based_on
 * @property string $percent
 * @property string $amount
 * @property boolean $empr_paid
 * @property boolean $inactive
 * @property integer $post_to_driver_id
 *
 * @property \common\models\DriverAdjustment[] $driverAdjustments
 * @property \common\models\Account $account0
 * @property \common\models\Carrier $postToCarrier
 * @property \common\models\Driver $postToDriver
 * @property \common\models\Vendor $postToVendor
 * @property string $aliasModel
 */
abstract class PayrollAdjustmentCode extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_adjustment_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'adj_type', 'account'], 'required'],
            [['post_to_carrier_id', 'post_to_vendor_id', 'post_to_driver_id'], 'default', 'value' => null],
            [['post_to_carrier_id', 'post_to_vendor_id', 'post_to_driver_id'], 'integer'],
            [['percent', 'amount'], 'number'],
            [['empr_paid', 'inactive'], 'boolean'],
            [['code', 'adj_type', 'adj_class', 'based_on'], 'string', 'max' => 255],
            [['account'], 'string', 'max' => 4],
            [['code'], 'unique'],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Account::className(), 'targetAttribute' => ['account' => 'account']],
            [['post_to_carrier_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Carrier::className(), 'targetAttribute' => ['post_to_carrier_id' => 'id']],
            [['post_to_driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Driver::className(), 'targetAttribute' => ['post_to_driver_id' => 'id']],
            [['post_to_vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Vendor::className(), 'targetAttribute' => ['post_to_vendor_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'adj_type' => Yii::t('app', 'Adj Type'),
            'post_to_carrier_id' => Yii::t('app', 'Post To Carrier ID'),
            'post_to_vendor_id' => Yii::t('app', 'Post To Vendor ID'),
            'adj_class' => Yii::t('app', 'Adj Class'),
            'account' => Yii::t('app', 'Account'),
            'based_on' => Yii::t('app', 'Based On'),
            'percent' => Yii::t('app', 'Percent'),
            'amount' => Yii::t('app', 'Amount'),
            'empr_paid' => Yii::t('app', 'Empr Paid'),
            'inactive' => Yii::t('app', 'Inactive'),
            'post_to_driver_id' => Yii::t('app', 'Post To Driver ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverAdjustments()
    {
        return $this->hasMany(\common\models\DriverAdjustment::className(), ['payroll_adjustment_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount0()
    {
        return $this->hasOne(\common\models\Account::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostToCarrier()
    {
        return $this->hasOne(\common\models\Carrier::className(), ['id' => 'post_to_carrier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostToDriver()
    {
        return $this->hasOne(\common\models\Driver::className(), ['id' => 'post_to_driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostToVendor()
    {
        return $this->hasOne(\common\models\Vendor::className(), ['id' => 'post_to_vendor_id']);
    }




}