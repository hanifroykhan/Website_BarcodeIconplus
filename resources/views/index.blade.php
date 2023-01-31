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
                                <h4 class="header-title">Table Data User</h4>
                            
<br>
<br>
                               

                                <button type="button" class="btn btn-primtar=y mr-5" data-toggle="modal" data-target="#importExcel">
                                    IMPORT EXCEL
                                </button>
                               
                                    <form action="/cariUser" method="get" class="navbar-search form-inline mr-sm-10" >
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
				                        <form method="post" action="/importuser" enctype="multipart/form-data">
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
                                                    <th scope="col">Project Activation Node ID</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Service ID</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">BAI Date</th>
                                                    <th scope="col">Type SPA</th>
                                                    <th scope="col">Cluster</th>
                                                    <th scope="col">Lokasi</th>
                                                    <th scope="col">Zona</th>
                                                    <th scope="col">Kelurahan</th>
                                                    <th scope="col">Kecamatan</th>
                                                    <th scope="col">Klasifikasi PA</th>
                                                    <th scope="col">Mitra</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">FAT</th>
                                                    <th scope="col">Base</th>
                                                    <th scope="col">SN ONT</th>
                                                    <th scope="col">OLT</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">QR Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1 @endphp
                                                @foreach ($data as $a)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$a->ProjectActivationNodeID}}</td>
                                                    <td>{{$a->CustomerName}}</td>
                                                    <td>{{$a->Status}}</td>
                                                    <td>{{$a->ServiceID}}</td>
                                                    <td>{{$a->Address}}</td>
                                                    <td>{{$a->BAIDate}}</td>
                                                    <td>{{$a->TYPESPA}}</td>
                                                    <td>{{$a->Cluster}}</td>
                                                    <td>{{$a->LOKASI}}</td>
                                                    <td>{{$a->ZONA}}</td>
                                                    <td>{{$a->KELURAHAN}}</td>
                                                    <td>{{$a->KECAMATAN}}</td>
                                                    <td>{{$a->KLASIFIKASIPA}}</td>
                                                    <td>{{$a->MITRA}}</td>
                                                    <td>{{$a->KETERANGAN}}</td>
                                                    <td>{{$a->FAT}}</td>
                                                    <td>{{$a->BASE}}</td>
                                                    <td>{{$a->SNONT}}</td>
                                                    <td>{{$a->olt}}</td>
                                                    <td>
                                                        <a href="/edit/{{$a->id}}/data"  class="fa fa-pencil-square-o" data-toggle="modal" data-target="#editModal{{$a->id}}"></a>
                                                        &nbsp;
                                                        <a href="/hapus/{{$a->id}}/data" class="fa fa-trash" onclick="return confirm('Apakah Anda Yakin?')"></a>
                                                    </td>
                                                    <td>
                                                    <a href="{{ route('generateUser',$a->id) }}" class="btn btn-primary">Generate</a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>   
                                        <!-- Modal -->
                                        @foreach($data as $b)
                                        <div class="modal fade" id="editModal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                
                                            </div>
                                            <div class="modal-body">
                                            <form action="/update/{{$b->id}}/data" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group mb-3">
                                                    <label class="bmd-label-floating">No.SPA</label>
                                                    <input type="text" value="{{$b->ProjectActivationNodeID}}" name="ProjectActivationNodeID" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Customer Name</label>
                                                    <input type="text" value="{{$b->CustomerName}}" name="CustomerName" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Kontak</label>
                                                    <input type="text" value="{{$b->Status}}" name="Status" class="form-control" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Service ID</label>
                                                    <input type="text" value="{{$b->ServiceID}}" name="ServiceID" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label  class="bmd-label-floating">Address</label>
                                                    <input type="text" value="{{$b->Address}}" name="Address" class="form-control" >
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

    











