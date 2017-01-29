<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit\helpers;

use tests\unit\TestCase;

use bl\newsletter\common\helpers\ResultMessage;

/**
 * Test case for [[ResultMessage]] helper
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ResultMessageTest extends TestCase
{
    protected function _before()
    {
        ResultMessage::$successMessage = 'Success message test';
        ResultMessage::$errorMessage = 'Error message test';
    }

    public function testGetSuccessMessage()
    {
        $expected = 'Success message test';
        $actual = ResultMessage::get(true, false);

        $this->assertEquals($expected, $actual, 'Method should returns a success message');
    }

    public function testGetErrorMessage()
    {
        $expected = 'Error message test';
        $actual = ResultMessage::get(false, false);

        $this->assertEquals($expected, $actual, 'Method should returns a error message');
    }
}