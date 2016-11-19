<?php
namespace bl\newsletter;

use yii;
use yii\base\Module;

/**
 * Newsletter module definition class
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Newsletter extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'bl\newsletter\controllers';

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'backend';

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('newsletter.' . $category, $message, $params, $language);
    }
}
