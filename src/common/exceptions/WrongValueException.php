<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\exceptions;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class WrongValueException extends \UnexpectedValueException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Taken a wrong value';
    }
}