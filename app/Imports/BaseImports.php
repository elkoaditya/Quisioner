<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BaseImports implements ToCollection {

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows) {
        return $rows;
    }

}
