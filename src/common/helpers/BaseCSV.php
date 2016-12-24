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
 * BaseCSV provides concrete implementation for CSV.
 * Do not use BaseCSV. Use CSV instead.
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

            $last_char = strlen($string) - 1;
            if($string{$last_char} == ",") {
                $string{$last_char} = "\n";
            }
            else {
                $string .= "\n";
            }
        }

        return $string;
    }

    /**
     * Method for getting string in CSV format from array
     * of ActiveRecord objects
     *
     * @param ActiveRecord[] $ar_objects
     * @param mixed [$field1, $field2 ...] Names of ActiveRecord fields
     * @return string in CSV format
     * @see ActiveRecord
     * @see BaseCSV::getStringFromArrays()
     */
    public static function getStringFromARObjects($ar_objects)
    {
        $fields = func_get_args();
        unset($fields[0]);

        $array = null;
        foreach ($ar_objects as $key => $object) {
            $row = [];
            foreach ($fields as $field) {
                $row[] = $object->{$field};
            }

            $array[$key] = $row;
        }

        return self::getStringFromArrays($array);
    }

    /**
     * Method for downloading the CSV file from CSV string
     *
     * @param string $csv_string String in CSV format
     * @param string $file_name Name of download file
     */
    public static function download($csv_string, $file_name)
    {
        Yii::$app->response->sendContentAsFile($csv_string, $file_name, [
            'momeType' => 'text/csv',
            'inline' => true
        ]);
    }
}