<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\backend;

use Yii;

use bl\newsletter\common\components\ClientManager;

/**
 * Newsletter module definition class
 *
 * @property boolean $enableCsv
 * @property array $dataProvider
 * @property ClientManager $clientManager
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'bl\newsletter\backend\controllers';
    /**
     * @var boolean
     */
    public $enableCsv = true;
    /**
     * @var array configuration for data provider
     */
    public $dataProvider = [];


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->components = [
            'clientManager' => [
                'class' => ClientManager::className()
            ]
        ];
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
        return Yii::t('newsletter.' . $category, $message, $params, $language);
    }
}
