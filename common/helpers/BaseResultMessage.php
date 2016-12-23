<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\helpers;

use bl\newsletter\frontend\Module as Newsletter;

/**
 * BaseResultMessage provides concrete implementation for ResultMessage.
 * Do not use BaseResultMessage. Use ResultMessage instead.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class BaseResultMessage
{
    /**
     * @var string
     */
    public static $successMessage = 'Success';
    /**
     * @var string
     */
    public static $errorMessage = 'Error';
    /**
     * @var string
     */
    public static $translationCategory = 'app';


    /**
     * Getting result message
     *
     * Example
     * ```php
     * $result = ResultMessage::get($model->save());
     * ```
     *
     * @param boolean $result
     * @param boolean $enableI18n
     * @param array $params
     * @return string
     */
    public static function get($result, $enableI18n = true, $params = [])
    {
        $message = static::$errorMessage;
        if($result) {
            $message = static::$successMessage;
        }

        return ($enableI18n) ?
            Newsletter::t(static::$translationCategory, $message, $params) :
            $message;
    }
}
