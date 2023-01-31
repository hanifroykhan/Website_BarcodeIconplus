<?php

namespace App\Http\Controllers;

use session;

use Illuminate\Http\Request;
use App\Models\dataOLT;
use App\Imports\oltImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use App\Http\Controllers\Controller;

class dataOLTController extends Controller
{
    public function index()
    {
        $dataOLT = dataOLT::all();
        return view('dataOLT',['dataOLT'=>$dataOLT]);
    }

    public function searchOLT(Request $req)
    {
        $cari = $req->cari;
        $dataOLT=DB::table('olt')
        ->where('POP','like',"%".$cari."%")
        ->orWhere('Kecamatan','like',"%".$cari."%")
        ->orWhere('HOSTNAME','like',"%".$cari."%")
        ->orWhere('INSTALATION_OLT','like',"%".$cari."%")
        ->paginate(10);

        return view('dataOLT',['dataOLT'=> $dataOLT]);
    }

    public function importOLT(Request $req)
    {
        $this->validate($req, ['file' => 'required']);
        $path = $req->file;
        Excel::import(new oltImport, $path);
        return redirect('/indexOLT');
    }
    public function generate ($id)
    {
        $dataOLT = dataOLT::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($dataOLT);
        return view('qrcodeOLT',compact('qrcode'));
    }
    public function edit($id)
    {
        $dataOLT =dataOLT::where('id','=',$id)->get();
        return view('dataOLT',['dataOLT'=> $dataOLT]);
    }

    public function update(Request $request, $id)
    {
        $updateOLT = dataOLT::where('id','=',$id)->update([
            'OLT'=> $request->OLT,
            'PORT_IDLE'=> $request->PORT_IDLE,
        ]);
        if ($updateOLT) {
            return redirect('/indexOLT')->with('sukses', 'Data OLT Berhasil diupdate');
        }
    }

    public function hapus($id){
        $hapusOLT=dataOLT::where('id','=',$id)->delete();
        if ($hapusOLT){
            return redirect('/indexOLT')->with('sukses','Data OLT Berhasil Dihapus');
        }
    }
  
  
}
