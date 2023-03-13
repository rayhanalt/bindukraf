<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
     public function exportData()
     {
          $dataFirstTable = DB::table('kesehatan')->get()->toArray();
          $dataSecondTable = DB::table('alamat')->get()->toArray();
          $dataThirdTable = DB::table('siswa')->get()->toArray();

          return Excel::download(new ExportMultipleTables($dataFirstTable, $dataSecondTable, $dataThirdTable), 'filename.xlsx');
     }
}



class ExportMultipleTables implements FromCollection, WithHeadings
{
     protected $dataFirstTable;
     protected $dataSecondTable;
     protected $dataThirdTable;

     public function __construct(array $dataFirstTable, array $dataSecondTable, array $dataThirdTable)
     {
          $this->dataFirstTable = $dataFirstTable;
          $this->dataSecondTable = $dataSecondTable;
          $this->dataThirdTable = $dataThirdTable;
     }

     public function headings(): array
     {
          return [
               //Define your header names here as an array
               'id',
               'nis',
               'nama',
          ];
     }

     /**
      * @return \Illuminate\Support\Collection
      */
     public function collection()
     {
          //Merge all collected tables
          return collect(array_merge($this->dataFirstTable, $this->dataSecondTable, $this->dataThirdTable));
     }
}
