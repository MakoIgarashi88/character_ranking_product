<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    
    /**
     * @param integer $position 比較する位置
     * @param array $marks 比較対象が格納された配列
     * @return integer 順位が返される
     */
    public static function getRank($position, $marks)
    {
        $rank = 1;

        $length = count($marks);
        for ( $diff_position = 0; $diff_position < $length; $diff_position++ ) {
            if ( $marks[$diff_position] > $marks[$position] && $diff_position !== $position) {
                $rank++;
            }
        }

        return $rank;
    }

    /**
     * @param integer $position 比較する位置
     * @param array $marks 比較対象が格納された配列
     * @return integer 順位が返される
     */
    public static function getColumnAvgSumQuery($columns)
    {
        $string = '';
        foreach ($columns as $index => $column) {
            $string .= $index ? "+ round(avg($column))" : "round(avg($column))";
        }

        return $string;
    }
}
