<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\entities;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

use bl\newsletter\common\helpers\CSV;

/**
 * This is the model class for table "newsletter_client".
 *
 * @property integer $id
 * @property string $email
 * @property integer $phone
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Client extends ActiveRecord
{
    const SCENARIO_EMAIL = 'email';
    const SCENARIO_PHONE = 'phone';


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newsletter_client}}';
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
            [['created_at'], 'safe'],

            [['email', 'phone'], 'required', 'on' => self::SCENARIO_DEFAULT],
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
            'id'         => Yii::t('email.templates', 'ID'),
            'email'      => Yii::t('email.templates', 'Email'),
            'phone'      => Yii::t('email.templates', 'Phone'),
            'created_at' => Yii::t('email.templates', 'Created at')
        ];
    }
}
