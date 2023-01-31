<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMaps extends Model
{
    use HasFactory;
    protected $table='data_maps';
    protected $guarded=[];

    protected $fillable = [
        'Nama_ODP',
        'New_labelODP',
        'Tikor_ODP',
        'BASE',
        'ZONA',
        'CEK',
        'Area',
        'Type_ODP',
        'Nama_OLT',
        'Type_OLT',
        'Port',
        'Tanggal_Instal',
        'Year',
        'Month',
        'Week',
        'NAMA_CLUSTER',
        'Idle',
        'Home_Connected',
        'Capacity',
        'Utilisasi',
        'UTILISASI_FAT',
        'STATUS_FAT',
        'Keterangan',
        'LINK_FORM'
        
    ];
}
