<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataUser extends Model
{
    use HasFactory;
    protected $table ="data_user";
    protected $guarded=[];
    protected $fillable = [ 
                            'ProjectActivationNodeID',
                            'CustomerName',
                            'Status',
                            'ServiceID',
                            'Address',
                            'BAIDate',
                            'TYPESPA',
                            'Cluster',
                            'LOKASI',
                            'ZONA',
                            'KELURAHAN',
                            'KECAMATAN',
                            'KLASIFIKASIPA',
                            'MITRA',
                            'KETERANGAN',
                            'FAT/ODP',
                            'BASE',
                            'SNONT',
                            'olt',
    ];
}
