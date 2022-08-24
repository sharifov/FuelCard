<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;
use common\models\Driver;
use common\models\Trailer;
use common\models\Truck;

/**
 * This is the base-model class for table "fuel_import".
 *
 * @property integer $id
 * @property string $transaction_id
 * @property string $card_check_no
 * @property string $load_no
 * @property string $driver_name_reported
 * @property string $purchase_date
 * @property string $purchase_time
 * @property string $trip_no
 * @property integer $unit_id
 * @property integer $driver_id
 * @property integer $truck_id
 * @property integer $trailer_id
 * @property string $vendor
 * @property string $city
 * @property integer $state_id
 * @property integer $product_code
 * @property string $quantity
 * @property string $cost
 * @property string $ppg
 * @property string $description
 * @property string $err
 *
 * @property Driver $driver
 * @property Trailer $trailer
 * @property Truck $truck
 * @property string $aliasModel
 */
abstract class FuelImport extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fuel_import';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_date', 'purchase_time'], 'safe'],
            [['unit_id', 'driver_id', 'truck_id', 'trailer_id', 'state_id'], 'default', 'value' => null],
            [['unit_id', 'driver_id', 'truck_id', 'trailer_id', 'state_id', 'product_code'], 'integer'],
            [['state_id'], 'required'],
            [['quantity', 'cost', 'ppg'], 'number'],
            [['transaction_id', 'card_check_no', 'load_no', 'driver_name_reported', 'trip_no', 'vendor', 'city', 'description', 'err'], 'string', 'max' => 255],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['trailer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trailer::className(), 'targetAttribute' => ['trailer_id' => 'id']],
            [['truck_id'], 'exist', 'skipOnError' => true, 'targetClass' => Truck::className(), 'targetAttribute' => ['truck_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_id' => 'Transaction ID',
            'card_check_no' => 'Card Check No',
            'load_no' => 'Load No',
            'driver_name_reported' => 'Driver Name Reported',
            'purchase_date' => 'Purchase Date',
            'purchase_time' => 'Purchase Time',
            'trip_no' => 'Trip No',
            'unit_id' => 'Unit ID',
            'driver_id' => 'Driver ID',
            'truck_id' => 'Truck ID',
            'trailer_id' => 'Trailer ID',
            'vendor' => 'Vendor',
            'city' => 'City',
            'state_id' => 'State ID',
            'product_code' => 'Product Code',
            'quantity' => 'Quantity',
            'cost' => 'Cost',
            'ppg' => 'Ppg',
            'description' => 'Description',
            'err' => 'Err',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrailer()
    {
        return $this->hasOne(Trailer::className(), ['id' => 'trailer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTruck()
    {
        return $this->hasOne(Truck::className(), ['id' => 'truck_id']);
    }

}