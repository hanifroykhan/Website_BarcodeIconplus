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
            <!-- page title area end -->                
        
                    <!-- table primary start -->
                    <div class="main-content-inner">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Table Data FAT</h4>


                               
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

                                <form action="/cariODP" method="get" class="navbar-search form-inline mr-sm-10" >
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
				                        <form method="post" action="/importODP" enctype="multipart/form-data">
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

                    
                            
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">BASE</th>
                                                    <th scope="col">ZONA</th>
                                                    <th scope="col">CEK</th>
                                                    <th scope="col">Area</th>
                                                    <th scope="col">NAMA ODP</th>
                                                    <th scope="col">New LabelODP</th>
                                                    <th scope="col">Type ODP</th>
                                                    <th scope="col">TIKOR ODP</th>
                                                    <th scope="col">Nama OLT</th>
                                                    <th scope="col">Type OLT</th>
                                                    <th scope="col">Port</th>
                                                    <th scope="col">Tanggal Instal</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Month</th>
                                                    <th scope="col">Week</th>
                                                    <th scope="col">NAMA CLUSTER</th>
                                                    <th scope="col">Idle</th>
                                                    <th scope="col">Home Connected</th>
                                                    <th scope="col">Capacity</th>
                                                    <th scope="col">Utilisasi</th>
                                                    <th scope="col">UTILISASI FAT</th>
                                                    <th scope="col">STATUS FAT</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Link Form</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">QR Code</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1 @endphp
                                                @foreach ($data_maps as $a)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$a->BASE}}</td>
                                                    <td>{{$a->ZONA}}</td>
                                                    <td>{{$a->CEK}}</td>
                                                    <td>{{$a->Area}}</td>
                                                    <td>{{$a->NAMA_ODP}}</td>
                                                    <td>{{$a->New_LabelODP}}</td>
                                                    <td>{{$a->Type_ODP}}</td>
                                                    <td>{{$a->Tikor_ODP}}</td>
                                                    <td>{{$a->Nama_OLT}}</td>
                                                    <td>{{$a->Type_OLT}}</td>
                                                    <td>{{$a->Port}}</td>
                                                    <td>{{$a->Tanggal_Instal}}</td>
                                                    <td>{{$a->Year}}</td>
                                                    <td>{{$a->Month}}</td>
                                                    <td>{{$a->Week}}</td>
                                                    <td>{{$a->NAMA_CLUSTER}}</td>
                                                    <td>{{$a->Idle}}</td>
                                                    <td>{{$a->Home_Connected}}</td>
                                                    <td>{{$a->Capacity}}</td>
                                                    <td>{{$a->Utilisasi}}</td>
                                                    <td>{{$a->UTILISASI_FAT}}</td>
                                                    <td>{{$a->STATUS_FAT}}</td>
                                                    <td>{{$a->Keterangan}}</td>
                                                    <td>{{$a->LINK_FORM}}</td>
                                                    <td>
                                                        <a href="/edit/{{$a->id}}/ODP"  class="fa fa-pencil-square-o" data-toggle="modal" data-target="#editModal{{$a->id}}"></a>
                                                        &nbsp;
                                                        <a href="/hapus/{{$a->id}}/ODP" class="fa fa-trash" onclick="return confirm('Apakah Anda Yakin?')"></a>
                                                    </td>
                                                    <td>
                                                    <a href="{{ route('generateODP',$a->id) }}" class="btn btn-primary">Generate</a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        @foreach($data_maps as $b)
                                        <div class="modal fade" id="editModal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data ODP</h5>
                                                
                                            </div>
                                            <div class="modal-body">
                                            <form action="/update/{{$b->id}}/ODP" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">Titik Koordinat</label>
                                                    <input type="text" value="{{$b->Tikor_ODP}}" name="Tikor_ODP" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Nama OLT</label>
                                                    <input type="text" value="{{$b->Nama_OLT}}" name="Nama_OLT" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Home Connected</label>
                                                    <input type="text" value="{{$b->Home_Connected}}" name="Home_Connected" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Capacity</label>
                                                    <input type="text" value="{{$b->Capacity}}" name="Capacity" class="form-control">
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
                    </div>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
                
      
 
</body>
@endsection

</html>
