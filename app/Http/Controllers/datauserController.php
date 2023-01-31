<?php

namespace App\Http\Controllers;

use session;

use Illuminate\Http\Request;
use App\Models\dataUser;
use App\Imports\userImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DataTables;
// use App\Http\Controllers\Controller;

class datauserController extends Controller
{
    public function index()
    {
        $data = dataUser::all();
        return view('index',['data'=>$data]);
    }

    public function searchuser(Request $req)
    {
        $cari = $req->cari;
        $data=DB::table('data_user')
        ->where('CustomerName','like',"%".$cari."%")
        ->orWhere('ProjectActivationNodeID','like',"%".$cari."%")
        ->orWhere('ServiceID','like',"%".$cari."%")
        ->paginate(10);

        return view('index',['data'=> $data]);
    }
    public function importuser(Request $req)
    {
        $this->validate($req, ['file' => 'required']);
        $path = $req->file;
        Excel::import(new userImport, $path);
        return redirect('/data');
    }
    
    public function generate ($id)
    {
        $dataUser = dataUser::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($dataUser);
        return view('qrcodeUser',compact('qrcode'));
    }

    public function edit($id)
    {
        $data =dataUser::where('id','=',$id)->get();
        return view('index',['data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        $update = dataUser::where('id','=',$id)->update([
            'ProjectActivationNodeID'=> $request->ProjectActivationNodeID,
            'CustomerName'=> $request->CustomerName,
            'Status'=> $request->Status,
            'ServiceID'=> $request->ServiceID,
            'Address'=> $request->Address
        ]);
        if ($update) {
            return redirect('/data')->with('sukses', 'Data User Berhasil Update');
        }
    }

    public function hapus($id){
        $hapus=dataUser::where('id','=',$id)->delete();
        if ($hapus){
            return redirect('/data')->with('sukses','Data User Berhasil Dihapus');
        }
    }
  
}
