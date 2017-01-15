<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 1/15/2017
 * Time: 3:34 PM
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