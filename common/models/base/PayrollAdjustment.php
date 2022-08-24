<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "payroll_adjustment".
 *
 * @property integer $id
 * @property integer $payroll_id
 * @property string $d_payroll_adjustment_code
 * @property integer $d_load_id
 * @property string $d_description
 * @property string $d_percent
 * @property string $d_amount
 * @property string $d_charge
 * @property integer $d_post_to_carrier_id
 * @property integer $d_post_to_driver_id
 * @property integer $d_post_to_vendor_id
 * @property string $d_account
 * @property string $d_calc_by
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property \common\models\Account $dAccount
 * @property \common\models\Carrier $dPostToCarrier
 * @property \common\models\Driver $dPostToDriver
 * @property \common\models\Load $dLoad
 * @property \common\models\Payroll $payroll
 * @property \common\models\PayrollAdjustmentCode $dPayrollAdjustmentCode
 * @property \common\models\User $createdBy
 * @property \common\models\User $updatedBy
 * @property \common\models\Vendor $dPostToVendor
 * @property string $aliasModel
 */
abstract class PayrollAdjustment extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_adjustment';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payroll_id', 'd_load_id', 'd_post_to_carrier_id', 'd_post_to_driver_id', 'd_post_to_vendor_id'], 'default', 'value' => null],
            [['payroll_id', 'd_load_id', 'd_post_to_carrier_id', 'd_post_to_driver_id', 'd_post_to_vendor_id'], 'integer'],
            [['d_percent', 'd_amount'], 'number'],
            [['d_payroll_adjustment_code', 'd_description', 'd_charge', 'd_account', 'd_calc_by'], 'string', 'max' => 255],
            [['d_account'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Account::className(), 'targetAttribute' => ['d_account' => 'account']],
            [['d_post_to_carrier_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Carrier::className(), 'targetAttribute' => ['d_post_to_carrier_id' => 'id']],
            [['d_post_to_driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Driver::className(), 'targetAttribute' => ['d_post_to_driver_id' => 'id']],
            [['d_load_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Load::className(), 'targetAttribute' => ['d_load_id' => 'id']],
            [['payroll_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Payroll::className(), 'targetAttribute' => ['payroll_id' => 'id']],
            [['d_payroll_adjustment_code'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\PayrollAdjustmentCode::className(), 'targetAttribute' => ['d_payroll_adjustment_code' => 'code']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['d_post_to_vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Vendor::className(), 'targetAttribute' => ['d_post_to_vendor_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'payroll_id' => Yii::t('app', 'Payroll ID'),
            'd_payroll_adjustment_code' => Yii::t('app', 'D Payroll Adjustment Code'),
            'd_load_id' => Yii::t('app', 'D Load ID'),
            'd_description' => Yii::t('app', 'D Description'),
            'd_percent' => Yii::t('app', 'D Percent'),
            'd_amount' => Yii::t('app', 'D Amount'),
            'd_charge' => Yii::t('app', 'D Charge'),
            'd_post_to_carrier_id' => Yii::t('app', 'D Post To Carrier ID'),
            'd_post_to_driver_id' => Yii::t('app', 'D Post To Driver ID'),
            'd_post_to_vendor_id' => Yii::t('app', 'D Post To Vendor ID'),
            'd_account' => Yii::t('app', 'D Account'),
            'd_calc_by' => Yii::t('app', 'D Calc By'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDAccount()
    {
        return $this->hasOne(\common\models\Account::className(), ['account' => 'd_account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDPostToCarrier()
    {
        return $this->hasOne(\common\models\Carrier::className(), ['id' => 'd_post_to_carrier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDPostToDriver()
    {
        return $this->hasOne(\common\models\Driver::className(), ['id' => 'd_post_to_driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDLoad()
    {
        return $this->hasOne(\common\models\Load::className(), ['id' => 'd_load_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayroll()
    {
        return $this->hasOne(\common\models\Payroll::className(), ['id' => 'payroll_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDPayrollAdjustmentCode()
    {
        return $this->hasOne(\common\models\PayrollAdjustmentCode::className(), ['code' => 'd_payroll_adjustment_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDPostToVendor()
    {
        return $this->hasOne(\common\models\Vendor::className(), ['id' => 'd_post_to_vendor_id']);
    }




}