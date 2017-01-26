<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\frontend;

use Yii;

use bl\newsletter\common\base\NewsletterModule;
use bl\newsletter\common\components\ClientManager;

/**
 * Frontend module definition class
 *
 * @property string $type
 * @property ClientManager $clientManager
 * @property string
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Module extends NewsletterModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'bl\newsletter\frontend\controllers';
    /**
     * @var string type of subscription
     * Can take the value - 'email', 'phone' or 'mixed'
     */
    public $type = 'email';
    /**
     * @var string Key for flash message in session
     */
    public $flashMessageKey = 'newsletter';


    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->has(self::CLIENT_MANAGER_COMPONENT_ID)) {
            $this->set(self::CLIENT_MANAGER_COMPONENT_ID, [
                'class' => ClientManager::class,
                'type' => $this->type
            ]);
        }

        parent::init();
    }

    /**
     * Wrapper for default method `Yii::t()`
     *
     * @param string $category
     * @param string $message
     * @param array $params
     * @param null $language
     * @return string returns result of `Yii::t()` method
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('newsletter.frontend' . $category, $message, $params, $language);
    }
}
