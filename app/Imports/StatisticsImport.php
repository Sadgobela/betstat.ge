<?php

namespace App\Imports;

use App\Models\H2h;
use App\Models\Sport;
use App\Models\Statistic;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StatisticsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row)
        {
            if($key > 0) {
//            dd(Statistic::where('game_id', $row[0])
//                ->where('court', strtolower($row[1]))
//                ->where('court', strtolower($row[2]))->get());
            Statistic::where('game_id', $row[0])
                ->where('last', strtolower($row[1]))
                ->where('court', strtolower($row[2]))->update([
                    'goal_attempts_1' => $row[3],
                    'goal_attempts_2' => $row[4],
                    'shots_goal_1' => $row[5],
                    'shots_goal_2' => $row[6],
                    'corners_1' => $row[7],
                    'corners_2' => $row[8],
                    'offsides_1' => $row[9],
                    'offsides_2' => $row[10],
                    'throw_1' => $row[11],
                    'throw_2' => $row[12],
                    'fouls_1' => $row[13],
                    'fouls_2' => $row[14],
                    'cards_1' => $row[15],
                    'cards_2' => $row[16],
                ]);
            }
        }
//        die();
    }
}
