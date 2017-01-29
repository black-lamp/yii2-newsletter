<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit\helpers;

use tests\unit\DbTestCase;
use tests\fixtures\ClientFixture;

use bl\newsletter\common\helpers\CSV;
use bl\newsletter\common\entities\Client;

/**
 * Test case for [[CSV]] helper
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class CsvTest extends DbTestCase
{

    public function fixtures()
    {
        return [
            'client' => [
                'class' => ClientFixture::class
            ]
        ];
    }

    public function _before()
    {
    }

    public function testGetStringFromArrays()
    {
        $arrays = [
            [ 1, 'first record' ],
            [ 2, 'second recors' ],
            [ 3, 'third record' ]
        ];

        $expected = "1,first record\n"
                  . "2,second recors\n"
                  . "3,third record\n";
        $actual = CSV::getStringFromArrays($arrays);

        $this->assertEquals($expected, $actual, 'Method should returns a string in CSV format');
    }
}