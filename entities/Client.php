<?php
namespace bl\newsletter\entities;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use bl\newsletter\helpers\CSV;

/**
 * This is the model class for table "newsletter_client".
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property integer $id
 * @property string $email
 * @property integer $phone
 * @property integer $created_at
 */
class Client extends ActiveRecord
{
    const SCENARIO_EMAIL = 'email';
    const SCENARIO_PHONE = 'phone';

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter_client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'created_at'], 'integer'],
            [['email'], 'string', 'max' => 256],
            [['email'], 'email'],

            [['phone', 'created_at'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['email'], 'required', 'on' => self::SCENARIO_EMAIL],
            [['phone'], 'required', 'on' => self::SCENARIO_PHONE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created At',
        ];
    }

    public static function getCsv()
    {
        $clients = self::find()->all();
        return CSV::getStringFromARObjects($clients, 'email', 'phone');
    }
}
