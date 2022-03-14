<?php

namespace App\Imports;

use App\Models\H2h;
use App\Models\Sport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class H2HImport implements ToCollection
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
            $var = H2h::where('game_id', $row[0])->update([
                    'goals_1' => $row[1],
                    'goals_2' => $row[2],
                    'corners_1' => $row[3],
                    'corners_2' => $row[4],
                    'offsides_1' => $row[5],
                    'offsides_2' => $row[6],
                    'fouls_1' => $row[7],
                    'fouls_2' => $row[8],
                    'cards_1' => $row[9],
                    'cards_2' => $row[10],
                    'throw_1' => $row[11],
                    'throw_2' => $row[12],
                ]);
            }
        }
//        die();
    }
}
