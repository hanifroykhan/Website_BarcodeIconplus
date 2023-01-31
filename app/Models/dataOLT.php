<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataOLT extends Model
{
    use HasFactory;
    protected $table ="olt";
    protected $guarded=[];
    protected $fillable = [ 
                            'POP',
                            'Kecamatan',
                            'ASAL_OLT',
                            'OLT',
                            'TYPE',
                            'KAPASITAS',
                            'PORT_OLT',
                            'HOSTNAME',
                            'NMS_OLT',
                            'L3_SWITCH',
                            'INSTALATION_OLT',
                            'STATUS',
                            'HOMEPASS',
                            'HOME_CONNECTED',
                            'UTILITAS',
                            'IDLE_HP',
                            'AREA',
                            'PORT_TERPAKAI',
                            'PORT_IDLE',
    ];
}
