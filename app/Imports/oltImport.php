<?php

namespace App\Imports;

use App\Models\dataOLT;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;

class oltImport implements ToCollection, WithCalculatedFormulas
{
    /**
    * @param collection $collection
    *
    // * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row){
            if($key > 0){
        
        DB::table('olt')->insert([
            'POP'=>$row[0],
            'Kecamatan'=>$row[1],
            'ASAL_OLT'=>$row[2],
            'OLT'=>$row[3],
            'TYPE'=>$row[4],
            'KAPASITAS'=>$row[5],
            'PORT_OLT'=>$row[6],
            'HOSTNAME'=>$row[7],
            'NMS_OLT'=>$row[8],
            'L3_SWITCH'=>$row[9],
            'INSTALATION_OLT'=>$row[10],
            'STATUS'=>$row[11],
            'HOMEPASS'=>$row[12],
            'HOME_CONNECTED'=>$row[13],
            'UTILITAS'=>$row[14],
            'IDLE_HP'=>$row[15],
            'AREA'=>$row[16],
            'PORT_TERPAKAI'=>$row[17],
            'PORT_IDLE'=>$row[18],
        ]);
    }
}
session()->flash('Sukses',"Selamat Data Berhasil Di Import");
}
}
