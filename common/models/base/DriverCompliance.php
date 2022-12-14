<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "driver_compliance".
 *
 * @property integer $id
 * @property integer $driver_id
 * @property string $cdl_number
 * @property integer $cdl_state_id
 * @property string $cdl_expires
 * @property boolean $haz_mat
 * @property string $haz_mat_expires
 * @property string $ace_id
 * @property string $fast_id
 * @property string $twic_exp
 * @property string $last_drug_test
 * @property string $last_alcohol_test
 * @property string $work_auth_expires
 * @property string $next_ffd_evaluation
 * @property string $next_h2s_certification
 * @property string $next_vio_review
 * @property string $next_mvr_review
 * @property string $next_dot_physical
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $created_by
 * @property string $created_at
 *
 * @property \common\models\Driver $driver
 * @property \common\models\State $cdlState
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property string $aliasModel
 */
abstract class DriverCompliance extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver_compliance';
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
            [['driver_id', 'haz_mat'], 'required'],
            [['driver_id', 'cdl_state_id'], 'default', 'value' => null],
            [['driver_id', 'cdl_state_id'], 'integer'],
            [['cdl_expires', 'haz_mat_expires', 'twic_exp', 'last_drug_test', 'last_alcohol_test', 'work_auth_expires', 'next_ffd_evaluation', 'next_h2s_certification', 'next_vio_review', 'next_mvr_review', 'next_dot_physical'], 'safe'],
            [['haz_mat'], 'boolean'],
            [['cdl_number', 'ace_id', 'fast_id'], 'string', 'max' => 255],
            [['driver_id'], 'unique'],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['cdl_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\State::className(), 'targetAttribute' => ['cdl_state_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['created_by' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'driver_id' => Yii::t('app', 'Driver ID'),
            'cdl_number' => Yii::t('app', 'Cdl Number'),
            'cdl_state_id' => Yii::t('app', 'Cdl State ID'),
            'cdl_expires' => Yii::t('app', 'Cdl Expires'),
            'haz_mat' => Yii::t('app', 'Haz Mat'),
            'haz_mat_expires' => Yii::t('app', 'Haz Mat Expires'),
            'ace_id' => Yii::t('app', 'Ace ID'),
            'fast_id' => Yii::t('app', 'Fast ID'),
            'twic_exp' => Yii::t('app', 'Twic Exp'),
            'last_drug_test' => Yii::t('app', 'Last Drug Test'),
            'last_alcohol_test' => Yii::t('app', 'Last Alcohol Test'),
            'work_auth_expires' => Yii::t('app', 'Work Auth Expires'),
            'next_ffd_evaluation' => Yii::t('app', 'Next Ffd Evaluation'),
            'next_h2s_certification' => Yii::t('app', 'Next H2s Certification'),
            'next_vio_review' => Yii::t('app', 'Next Vio Review'),
            'next_mvr_review' => Yii::t('app', 'Next Mvr Review'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'next_dot_physical' => Yii::t('app', 'Next Dot Physical'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(\common\models\Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCdlState()
    {
        return $this->hasOne(\common\models\State::className(), ['id' => 'cdl_state_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }




}
