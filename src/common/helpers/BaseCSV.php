<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\common\helpers;

use Yii;
use yii\db\ActiveRecord;

/**
 * [[BaseCSV]] provides concrete implementation for [[CSV]].
 * Do not use [[BaseCSV]]. Use [[CSV]] instead.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class BaseCSV
{
    /**
     * Method for getting string in CSV format from array
     * of the string arrays
     *
     * @param array $arrays Arrays of string arrays
     * Example - `[['str1', 'str2'], ['str3', 'str4']]`
     * @return string in CSV format
     */
    public static function getStringFromArrays($arrays)
    {
        $string = '';
        foreach($arrays as $array) {
            $string .= implode(",", $array);

            $lastChar = strlen($string) - 1;
            if($string[$lastChar] == ",") {
                $string[$lastChar] = "\n";
            }
            else {
                $string .= "\n";
            }
        }

        return $string;
    }

    /**
     * Method for downloading the CSV file from CSV string
     *
     * @param string $csvString String in CSV format
     * @param string $fileName Name of download file
     */
    public static function download($csvString, $fileName)
    {
        Yii::$app->get('response')
            ->sendContentAsFile($csvString, $fileName, [
            'momeType' => 'text/csv',
            'inline' => true
        ]);
    }
}