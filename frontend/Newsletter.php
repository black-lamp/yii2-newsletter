<?php
namespace bl\newsletter\frontend;

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
    public $controllerNamespace = 'bl\newsletter\frontend\controllers';

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('newsletter.' . $category, $message, $params, $language);
    }
}
