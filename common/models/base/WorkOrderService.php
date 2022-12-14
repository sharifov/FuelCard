<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "work_order_service".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $service_date
 * @property string $service_code
 * @property integer $vendor_id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\ServiceCode $serviceCode
 * @property \common\models\User $createdBy
 * @property \common\models\User $updatedBy
 * @property \common\models\Vendor $vendor
 * @property \common\models\WorkOrder $order
 * @property string $aliasModel
 */
abstract class WorkOrderService extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_order_service';
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
            [['order_id', 'service_date'], 'required'],
            [['order_id', 'vendor_id'], 'default', 'value' => null],
            [['order_id', 'vendor_id'], 'integer'],
            [['service_date'], 'safe'],
            [['service_code', 'description'], 'string', 'max' => 255],
            [['service_code'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\ServiceCode::className(), 'targetAttribute' => ['service_code' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Vendor::className(), 'targetAttribute' => ['vendor_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\WorkOrder::className(), 'targetAttribute' => ['order_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'service_date' => Yii::t('app', 'Service Date'),
            'service_code' => Yii::t('app', 'Service Code'),
            'vendor_id' => Yii::t('app', 'Vendor ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCode()
    {
        return $this->hasOne(\common\models\ServiceCode::className(), ['id' => 'service_code']);
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
    public function getVendor()
    {
        return $this->hasOne(\common\models\Vendor::className(), ['id' => 'vendor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\common\models\WorkOrder::className(), ['id' => 'order_id']);
    }




}
