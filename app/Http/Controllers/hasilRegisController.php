<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\registrasi;


class hasilRegisController extends Controller
{
    public function index()
    {
        $dataRegis = registrasi::all();
        return view('hasilRegis',['dataRegis'=>$dataRegis]);
    }

    public function edit($id)
    {
        $dataRegis =registrasi::where('id','=',$id)->get();
        return view('hasilRegis',['dataRegis'=> $dataRegis]);
    }

    public function update(Request $request, $id)
    {
        $updateRegis = registrasi::where('id','=',$id)->update([
            'no_spa'=> $request->no_spa,
            'user'=> $request->user,
            'sid'=> $request->sid,
            'layanan'=> $request->layanan,
            'tikor'=> $request->tikor,
            'namaMitra'=> $request->namaMitra,
            'picMitra'=> $request->picMitra,
            'fatKode'=> $request->fatKode,
            'portFAT'=> $request->portFAT,
            'idle'=> $request->idle,
            'tikorFAT'=> $request->tikorFAT,
            'olt'=> $request->olt,
            'panjangKabel'=> $request->panjangKabel,
            'snONT'=> $request->snONT,
            'macONT'=> $request->macONT,
            
        ]);
        if ($updateRegis) {
            return redirect('/tableRegis')->with('sukses', 'Data Regis Berhasil diupdate');
        }
    }

    public function hapus($id){
        $hapusRegis=registrasi::where('id','=',$id)->delete();
        if ($hapusRegis){
            return redirect('/tableRegis')->with('sukses','Data Regis Berhasil Dihapus');
        }
    }

   
}
