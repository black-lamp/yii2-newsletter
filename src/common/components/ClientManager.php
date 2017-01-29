<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\components;

use yii\base\Exception;
use yii\base\InvalidValueException;
use yii\base\Object;

use bl\newsletter\common\helpers\CSV;
use bl\newsletter\common\entities\Client;
use bl\newsletter\common\exceptions\WrongValueException;

/**
 * Manager for Client model
 *
 * @property string $type
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ClientManager extends Object
{
    const TYPE_EMAIL = 'email';
    const TYPE_PHONE = 'phone';
    const TYPE_MIXED = 'default';


    /**
     * @var string type of scenario
     */
    public $type;


    /**
     * Build Client model with current scenario
     *
     * @return Client
     * @throws Exception
     */
    public function buildClient()
    {
        if($this->type !== self::TYPE_EMAIL &&
            $this->type !== self::TYPE_PHONE &&
            $this->type !== self::TYPE_MIXED) {
            throw new WrongValueException('$type can take the value: \'email\', \'phone\' or \'mixed\'');
        }

        $scenario = Client::SCENARIO_DEFAULT;

        switch ($this->type) {
            case self::TYPE_EMAIL:
                $scenario = Client::SCENARIO_EMAIL;
                break;
            case self::TYPE_PHONE:
                $scenario = Client::SCENARIO_PHONE;
                break;
        }

        return new Client(['scenario' => $scenario]);
    }

    /**
     * Get all clients in CSV string
     *
     * @return string
     */
    public function getCsv()
    {
        $clients = Client::find()->all();
        return CSV::getStringFromARObjects($clients, 'email', 'phone');
    }
}