<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "invoice_item_codes".
 *
 * @property integer $id
 * @property string $description
 * @property string $type
 * @property string $account_id
 *
 * @property \common\models\Account $account
 * @property string $aliasModel
 */
abstract class InvoiceItemCode extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice_item_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id'], 'required'],
            [['description', 'type'], 'string', 'max' => 255],
            [['account_id'], 'string', 'max' => 4],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Account::className(), 'targetAttribute' => ['account_id' => 'account']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'account_id' => Yii::t('app', 'Account ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(\common\models\Account::className(), ['account' => 'account_id']);
    }




}
