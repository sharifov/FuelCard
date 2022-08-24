<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "load_rating_matrix".
 *
 * @property string $number
 * @property string $name
 * @property string $rate_method
 * @property string $rate_type
 * @property boolean $loaded_and_empty
 * @property boolean $inactive
 *
 * @property \common\models\LoadRatingDistance[] $loadRatingDistances
 * @property \common\models\LoadRatingGeograph[] $loadRatingGeographs
 * @property \common\models\LoadRatingZipzip[] $loadRatingZipzips
 * @property \common\models\LoadRatingZonezone[] $loadRatingZonezones
 * @property string $aliasModel
 */
abstract class LoadRatingMatrix extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'load_rating_matrix';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'name', 'rate_method', 'rate_type'], 'required'],
            [['loaded_and_empty', 'inactive'], 'boolean'],
            [['number'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 64],
            [['rate_method', 'rate_type'], 'string', 'max' => 10],
            [['number'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'number' => Yii::t('app', 'Number'),
            'name' => Yii::t('app', 'Name'),
            'rate_method' => Yii::t('app', 'Rate Method'),
            'rate_type' => Yii::t('app', 'Rate Type'),
            'loaded_and_empty' => Yii::t('app', 'Loaded And Empty'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'loaded_and_empty' => Yii::t('app', 'for Distance only'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadRatingDistances()
    {
        return $this->hasMany(\common\models\LoadRatingDistance::className(), ['matrix' => 'number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadRatingGeographs()
    {
        return $this->hasMany(\common\models\LoadRatingGeograph::className(), ['matrix' => 'number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadRatingZipzips()
    {
        return $this->hasMany(\common\models\LoadRatingZipZip::className(), ['matrix' => 'number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadRatingZonezones()
    {
        return $this->hasMany(\common\models\LoadRatingZoneZone::className(), ['matrix' => 'number']);
    }




}