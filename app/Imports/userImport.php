<?php

namespace App\Imports;

use App\Models\dataUser;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;

class userImport implements ToCollection, WithCalculatedFormulas
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
        
        DB::table('data_user')->insert([
            'ProjectActivationNodeID'=>$row[0],
            'CustomerName'=>$row[1],
            'Status'=>$row[2],
            'ServiceID'=>$row[3],
            'Address'=>$row[4],
            'BAIDate'=>$row[5],
            'TYPESPA'=>$row[6],
            'Cluster'=>$row[7],
            'LOKASI'=>$row[8],
            'ZONA'=>$row[9],
            'KELURAHAN'=>$row[10],
            'KECAMATAN'=>$row[11],
            'KLASIFIKASIPA'=>$row[12],
            'MITRA'=>$row[13],
            'KETERANGAN'=>$row[14],
            'FAT'=>$row[15],
            'BASE'=>$row[16],
            'SNONT'=>$row[17],
            'olt'=>$row[18],
        ]);
    }
}
session()->flash('Sukses',"Selamat Data Berhasil Di Import");
}
}
