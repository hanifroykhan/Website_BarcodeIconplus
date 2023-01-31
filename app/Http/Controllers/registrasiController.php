<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registrasi;

class registrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'no_spa' => 'required',
            'user' =>'required',
            'sid' => 'required',
            'layanan' => 'required',
            'tikor' => 'required',
            'namaMitra' => 'required',
            'picMitra' => 'required',
            'fatKode' => 'required',
            'portFAT' => 'required',
            'idle' => 'required',
            'tikorFAT' => 'required',
            'olt' => 'required',
            'panjangKabel' => 'required',
            'snONT' => 'required',
            'macONT' => 'required'
        ]);
        $registrasi = registrasi::create([
            'no_spa' => $request->no_spa,
            'user' => $request->user,
            'sid' => $request->sid,
            'layanan' => $request->layanan,
            'tikor' => $request->tikor,
            'namaMitra' => $request->namaMitra,
            'picMitra' => $request->picMitra,
            'fatKode' => $request->fatKode,
            'portFAT' => $request->portFAT,
            'idle' => $request->idle,
            'tikorFAT' => $request->tikorFAT,
            'olt' => $request->olt,
            'panjangKabel' => $request->panjangKabel,
            'snONT' => $request->snONT,
            'macONT' => $request->macONT
        ]);
        if($registrasi){
            return redirect('/tableRegis')->with('status','data telah terbuat');
        }
       
    }
}
