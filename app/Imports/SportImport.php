<?php

namespace App\Imports;

use App\Models\Sport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SportImport implements ToCollection
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
                        'x' => $row[7],
                        '2_c' => $row[8],
                        '1x' => $row[9],
                        '12_c' => $row[10],
                        'x2' => $row[11],
                        'less' => $row[12],
                        'total' => $row[13],
                        'more' => $row[14],
                        'yes' => $row[15],
                        'no' => $row[16],
                    ]);
            }
        }
//        die();
    }
}
