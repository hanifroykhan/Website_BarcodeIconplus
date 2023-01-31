<?php

namespace App\Http\Controllers;

use App\Models\dataMaps;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

use function PHPSTORM_META\map;

class mapsController extends Controller
{
    public function index()
    {
        $koordinat = dataMaps::get();
    
        return view('maps',['koordinatmaps'=>$koordinat]);
    }

    public function proses(Request $request){
        $long=$request->long;
        $lat=$request->lati;
        $maps="https://maps.google.com/maps?q={$long},{$lat}&output=embed";
        return view('maps',['maps'=>$maps]);
    }

    public function getDetailKoor(Request $request)
    {
        $odp = $request->odp;
        $model = dataMaps::where('NAMA_ODP', $odp)->first();

        return response()->json($model);
    }


}
