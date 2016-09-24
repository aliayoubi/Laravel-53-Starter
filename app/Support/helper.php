<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 9/17/2016
 * Time: 8:42 PM
 *
 * This will contain any common functions needed by the app.
 *
 */


/**
 * converts array to html table
 *
 * @param $array
 * @param bool $table
 * @return string
 */
function arraytoTable($array, $table = true)
{
    $out = '';
    $tableHeader = '';

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            if (!isset($tableHeader)) {
                $tableHeader = '<th>' .
                    implode('</th><th>', array_keys($value)) .
                    '</th>';
            }
            array_keys($value);
            $out .= '<tr>';
            $out .= arraytoTable($value, false);
            $out .= '</tr>';
        } else {
            $out .= "<td>$value</td>";
        }
    }

    if ($table) {
        return '<table width="100%" align="center" border="1" cellpadding="4" cellspacing="0">' . $tableHeader . $out . '</table>';
    } else {
        return $out;
    }
}

function getRandomColor()
{
    $randomcolor = '#' . strtoupper(dechex(rand(0, 10000000)));

    if (strlen($randomcolor) != 7) {
        $randomcolor = str_pad($randomcolor, 10, '0', STR_PAD_RIGHT);
        $randomcolor = substr($randomcolor, 0, 7);
    }

    return $randomcolor;
}

/**
 * Enable or disable query log.
 *
 * @param bool $enable
 */
function queryLog($enable = true)
{
    if ($enable) {
        \DB::connection()->enableQueryLog();
    } else {
        \DB::connection()->disableQueryLog();
    }
}

/**
 * @return mixed
 * This function return last executed query in plain sql
 */
function getLastQuery()
{
    $query = \DB::getQueryLog();
    $lastQuery = end($query);

    return $lastQuery;
}

/**
 * displays message on console and also appends in log
 *
 * @param $message
 * @param bool $log
 */
function out($message, $log = true)
{
    echo $message . PHP_EOL;

    if ($log) {
        Log::info($message);
    }
}

/**
 * Shows general info message via SweetAlert
 * 
 * @param $message
 */
function showAlert($message)
{
    Alert::message($message)->persistent('Close');
}
