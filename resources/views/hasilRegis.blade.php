@extends('template')
@section('content')
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DATA</title>
 
</head>

<body>
            <div class="main-content-inner">
                
                    <!-- table primary start -->
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Table Data Registrasi User</h4>
                            	{{-- notifikasi form validasi --}}
		                        @if ($errors->has('file'))
		                        <span class="invalid-feedback" role="alert">
			                    <strong>{{ $errors->first('file') }}</strong>
		                        </span>
		                        @endif
 
		                        {{-- notifikasi sukses --}}
		                        @if ($sukses = Session::get('sukses'))
		                        <div class="alert alert-success alert-block">
			                    <button type="button" class="close" data-dismiss="alert">×</button> 
			                    <strong>{{ $sukses }}</strong>
		                        </div>
		                        @endif
<br>
<br>

                          
                            
                               
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">No SPA</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">SID</th>
                                                    <th scope="col">Layanan</th>
                                                    <th scope="col">Titik Koordinat</th>
                                                    <th scope="col">Nama Mitra</th>
                                                    <th scope="col">Pic Mitra</th>
                                                    <th scope="col">Kode FAT</th>
                                                    <th scope="col">Port FAT</th>
                                                    <th scope="col">Idle</th>
                                                    <th scope="col">Titik Koordinat FAT</th>
                                                    <th scope="col">OLT</th>
                                                    <th scope="col">Panjang Kabel</th>
                                                    <th scope="col">SN ONT</th>
                                                    <th scope="col">MAC ONT</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1 @endphp
                                                @foreach ($dataRegis as $a)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$a->no_spa}}</td>
                                                    <td>{{$a->user}}</td>
                                                    <td>{{$a->sid}}</td>
                                                    <td>{{$a->layanan}}</td>
                                                    <td>{{$a->tikor}}</td>
                                                    <td>{{$a->namaMitra}}</td>
                                                    <td>{{$a->picMitra}}</td>
                                                    <td>{{$a->fatKode}}</td>
                                                    <td>{{$a->portFAT}}</td>
                                                    <td>{{$a->idle}}</td>
                                                    <td>{{$a->tikorFAT}}</td>
                                                    <td>{{$a->olt}}</td>
                                                    <td>{{$a->panjangKabel}}</td>
                                                    <td>{{$a->snONT}}</td>
                                                    <td>{{$a->macONT}}</td>
                                                    <td>
                                                    <a href="/edit/{{$a->id}}/regis"  class="fa fa-pencil-square-o" data-toggle="modal" data-target="#editModalRegis{{$a->id}}"></a>
                                                    &nbsp;
                                                    <a href="/hapus/{{$a->id}}/regis" class="fa fa-trash" onclick="return confirm('Apakah Anda Yakin?')"></a>
                                                    </td>
                                                   
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        @foreach($dataRegis as $b)
                                        <div class="modal fade" id="editModalRegis{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Regis</h5>
                                                
                                            </div>
                                            <div class="modal-body">
                                            <form action="/update/{{$b->id}}/regis" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">No.SPA</label>
                                                    <input type="text" value="{{$b->no_spa}}" name="no_spa" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Nama User</label>
                                                    <input type="text" value="{{$b->user}}" name="user" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Sid</label>
                                                    <input type="text" value="{{$b->sid}}" name="sid" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Layanan</label>
                                                    <input type="text" value="{{$b->layanan}}" name="layanan" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Titik Koordinat</label>
                                                    <input type="text" value="{{$b->tikor}}" name="tikor" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">Nama Mitra</label>
                                                    <input type="text" value="{{$b->namaMitra}}" name="namaMitra" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">PIC Mitra</label>
                                                    <input type="text" value="{{$b->picMitra}}" name="picMitra" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Kode FAT</label>
                                                    <input type="text" value="{{$b->fatKode}}" name="fatKode" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Port FAT</label>
                                                    <input type="text" value="{{$b->portFAT}}" name="portFAT" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Idle</label>
                                                    <input type="text" value="{{$b->idle}}" name="idle" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">Titik Koordinat FAT</label>
                                                    <input type="text" value="{{$b->tikorFAT}}" name="tikorFAT" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">OLT</label>
                                                    <input type="text" value="{{$b->olt}}" name="olt" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Panjang Kabel</label>
                                                    <input type="text" value="{{$b->panjangKabel}}" name="panjangKabel" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">SN ONT</label>
                                                    <input type="text" value="{{$b->snONT}}" name="snONT" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">MAC ONT</label>
                                                    <input type="text" value="{{$b->macONT}}" name="macONT" class="form-control" >
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Update" class="btn btn-primary"></input>
                                            </div>
                                            </form>
                                            </div>
                                         
                                            </div>
                                        </div>
                                        </div>
                                        @endforeach
                                    
                                    </div>
                                </div>
 </div>
                        </div>
                        </body>
@endsection

</html>

                        
                  
       
       
   
   
                            
   

 


    











