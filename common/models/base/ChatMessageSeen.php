<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "chat_message_seen".
 *
 * @property integer $message_id
 * @property integer $user_id
 * @property string $created_at
 *
 * @property \common\models\ChatMessage $message
 * @property \common\models\User $user
 * @property string $aliasModel
 */
abstract class ChatMessageSeen extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_message_seen';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'user_id'], 'required'],
            [['message_id', 'user_id'], 'default', 'value' => null],
            [['message_id', 'user_id'], 'integer'],
            [['message_id', 'user_id'], 'unique', 'targetAttribute' => ['message_id', 'user_id']],
            [['message_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\ChatMessage::className(), 'targetAttribute' => ['message_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => Yii::t('app', 'Message ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(\common\models\ChatMessage::className(), ['id' => 'message_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }




}
