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
                                <h4 class="header-title">Table Data OLT</h4>
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
                                <button type="button" class="btn btn-primtar=y mr-5" data-toggle="modal" data-target="#importExcel">
                                    IMPORT EXCEL
                                </button>
                                <form action="/cariOLT" method="get" class="navbar-search form-inline mr-sm-10" >
                                <div class="form-group mb-3">
                                <div class="input-group input-group-alternative input-group-merge" style="width: 300px; height: 50px; left: 1870px;">
                                    <input class="form-control" name="cari" placeholder="Cari Data" type="text">
                                    <button type="submit" class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                </div>   
                                    </form>
                                
                              
                                <!-- Import Excel -->
                                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			                        <div class="modal-dialog" role="document">
				                        <form method="post" action="/importOLT" enctype="multipart/form-data">
					                        <div class="modal-content">
						                        <div class="modal-header">
							                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
					                        	</div>
						                    <div class="modal-body">
 
							                    {{ csrf_field() }}
 
							                    <label>Pilih file excel</label>
							                    <div class="form-group">
								                    <input type="file" name="file" required="required">
							                    </div>
 
						                    </div>
						                    <div class="modal-footer">
							                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							                    <button type="submit" class="btn btn-primary" >Import</button>
						                    </div>
					                    </div>
				                    </form>
			                    </div>
		                    </div>

                          
                            
                               
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">POP</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">ASAL OLT</th>
                                                    <th scope="col">OLT</th>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">KAPASITAS</th>
                                                    <th scope="col">PORT OLT</th>
                                                    <th scope="col">HOSTNAME</th>
                                                    <th scope="col">NMS OLT</th>
                                                    <th scope="col">L3 SWITCH</th>
                                                    <th scope="col">INSTALATION OLT</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scope="col">HOMEPASS</th>
                                                    <th scope="col">HOME CONNECTED</th>
                                                    <th scope="col">UTILITAS</th>
                                                    <th scope="col">IDLE HP</th>
                                                    <th scope="col">AREA</th>
                                                    <th scope="col">PORT TERPAKAI</th>
                                                    <th scope="col">PORT IDLE</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">QR Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1 @endphp
                                                @foreach ($dataOLT as $a)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$a->POP}}</td>
                                                    <td>{{$a->Kecamatan}}</td>
                                                    <td>{{$a->ASAL_OLT}}</td>
                                                    <td>{{$a->OLT}}</td>
                                                    <td>{{$a->TYPE}}</td>
                                                    <td>{{$a->KAPASITAS}}</td>
                                                    <td>{{$a->PORT_OLT}}</td>
                                                    <td>{{$a->HOSTNAME}}</td>
                                                    <td>{{$a->NMS_OLT}}</td>
                                                    <td>{{$a->L3_SWITCH}}</td>
                                                    <td>{{$a->INSTALATION_OLT}}</td>
                                                    <td>{{$a->STATUS}}</td>
                                                    <td>{{$a->HOMEPASS}}</td>
                                                    <td>{{$a->HOME_CONNECTED}}</td>
                                                    <td>{{$a->UTILITAS}}</td>
                                                    <td>{{$a->IDLE_HP}}</td>
                                                    <td>{{$a->AREA}}</td>
                                                    <td>{{$a->PORT_TERPAKAI}}</td>
                                                    <td>{{$a->PORT_IDLE}}</td>
                                                    <td>
                                                    <a href="/edit/{{$a->id}}/OLT"  class="fa fa-pencil-square-o" data-toggle="modal" data-target="#editModal{{$a->id}}"></a>
                                                    &nbsp;
                                                    <a href="/hapus/{{$a->id}}/OLT" class="fa fa-trash" onclick="return confirm('Apakah Anda Yakin?')"></a>
                                                    </td>
                                                    <td>
                                                    <a href="{{ route('generateOLT',$a->id) }}" class="btn btn-primary">Generate</a>
                                                    </td>
                                                    
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>   
                                        <!-- Modal -->
                                        @foreach($dataOLT as $b)
                                        <div class="modal fade" id="editModal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                
                                            </div>
                                            <div class="modal-body">
                                            <form action="/update/{{$b->id}}/OLT" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">OLT</label>
                                                    <input type="text" value="{{$b->OLT}}" name="OLT" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Port Idle</label>
                                                    <input type="text" value="{{$b->PORT_IDLE}}" name="PORT_IDLE" class="form-control">
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
                        
                  
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
                                        
   

 
</body>
@endsection

</html>

    











