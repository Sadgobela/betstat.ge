<?php

namespace App\Imports;

use App\Models\Sport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Sport2Import implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key > 0) {
                $var = Sport::where('game_id', $row[0])
                    ->where('casino', strtolower($row[1]) . '.com')->update([
                        '1_c' => $row[6],
                        '2_c' => $row[7],
                        'fora_1' => $row[8],
                        'fora' => $row[9],
                        'fora_2' => $row[10],
                        'less' => $row[11],
                        'total' => $row[12],
                        'more' => $row[13],
                    ]);
            }
        }
    }
}
