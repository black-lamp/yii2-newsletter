<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\frontend\widgets;

use yii\base\Widget;

use bl\newsletter\frontend\Module as Newsletter;
use bl\newsletter\common\entities\Client;

/**
 * Widget for rendering of form for subscribe
 *
 * @property string $moduleId
 * @property integer $subscribeType
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Subscribe extends Widget
{
    // constants for select type of form for subscribe
    const SUBSCRIBE_TYPE_DEFAULT = 0;
    const SUBSCRIBE_TYPE_EMAIL = 1;
    const SUBSCRIBE_TYPE_PHONE = 2;


    /**
     * @var string Id of frontend `Newsletter` module
     * @see Newsletter
     */
    public $moduleId = 'newsletter';
    /**
     * @var integer Type of form for subscribe
     */
    public $subscribeType = self::SUBSCRIBE_TYPE_EMAIL;


    /**
     * @inheritdoc
     */
    public function run()
    {
        $viewName = 'subscribe-form-email';
        $actionRoute = '/' . $this->moduleId . '/default';

        switch ($this->subscribeType) {
            case self::SUBSCRIBE_TYPE_EMAIL:
                $viewName = 'subscribe-form-email';
                break;
            case self::SUBSCRIBE_TYPE_PHONE:
                $viewName = 'subscribe-form-phone';
                break;
            default:
                $viewName = 'subscribe-form';
        }

        return $this->render($viewName, [
            'model' => new Client(),
            'actionRoute' => $actionRoute
        ]);
    }
}
