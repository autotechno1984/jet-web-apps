<?php

namespace App\Exports;

use App\Models\InvoiceDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class OmsetDaily implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $resultid;
    public function __construct(string $resultid)
    {
        $this->resultid = $resultid;
    }

    public function collection()
    {

        return InvoiceDetail::where('result_id', $this->resultid)->get();

    }
}
