<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\components;

use yii\base\Exception;
use yii\base\Object;

use bl\newsletter\common\entities\Client;

/**
 * Manager for Client model
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ClientManager extends Object
{
    const TYPE_EMAIL = 'email';
    const TYPE_PHONE = 'phone';
    const TYPE_MIXED = 'mixed';


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
        if($this->type != self::TYPE_EMAIL && $this->type != self::TYPE_PHONE && $this->type != self::TYPE_MIXED) {
            throw new Exception('$type can take the value - \'email\', \'phone\' or \'mixed\'');
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
}