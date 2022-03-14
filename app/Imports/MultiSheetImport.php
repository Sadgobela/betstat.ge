<?php

namespace App\Imports;

use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new SportImport(),
            new H2HImport(),
            new StatisticsImport(),
            new Sport2Import(),
            new Sport2Import()
        ];
    }
}
