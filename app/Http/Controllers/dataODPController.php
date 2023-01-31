<?php

namespace App\Http\Controllers;

use App\Models\dataMaps;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use App\Imports\mapsImport;

class dataODPController extends Controller
{
    public function index ()
    {
        $data_maps = dataMaps::all();
        return view('dataMaps',['data_maps'=>$data_maps]);
    }

    public function searchODP(Request $req)
    {
        $cari = $req->cari;
        $data_maps=DB::table('data_maps')
        ->where('Nama_ODP','like',"%".$cari."%")
        ->orWhere('New_labelODP','like',"%".$cari."%")
        ->orWhere('Type_OLT','like',"%".$cari."%")
        ->paginate(10);

        return view('dataMaps',['data_maps'=> $data_maps]);
    }

    public function importMaps(Request $request)
    {
        $this->validate($request, ['file' => 'required']);
        $path = $request->file;
        Excel::import(new mapsImport, $path);
        return redirect('/indexODP');
    }

    public function generate ($id)
    {
        $dataODP = dataMaps::findOrFail($id,['Nama_ODP','Tikor_ODP','Home_Connected','Type_OLT','LINK_FORM ']);
        $qrcode = QrCode::size(400)->generate($dataODP);
        return view('qrcodeODP',compact('qrcode'));
    }

    public function edit($id)
    {
        $data =dataMaps::where('id','=',$id)->get();
        return view('dataMaps',['data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        $update = dataMaps::where('id','=',$id)->update([
            'Tikor_ODP'=> $request->Tikor_ODP,
            'Nama_OLT'=> $request->Nama_OLT,
            'Home_Connected'=> $request->Home_Connected,
            'Capacity'=> $request->Capacity,
           
        ]);
        if ($update) {
            return redirect('/indexODP')->with('sukses', 'Data User Berhasil Update');
        }
    }

    public function hapus($id){
        $hapus=dataMaps::where('id','=',$id)->delete();
        if ($hapus){
            return redirect('/indexODP')->with('sukses','Data User Berhasil Dihapus');
        }
    }
}
