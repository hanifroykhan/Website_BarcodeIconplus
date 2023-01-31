@extends('template')
@section('content')
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrasi User</title>
 
</head>

<body>
            <div class="main-content-inner">
                
                    <!-- table primary start -->
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Form Registrasi User</h4>


                               
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
                               
<form method="POST"  action="/storeRegis">

{{csrf_field()}}
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">NO SPA</label>
        <input class="form-control" type="text" placeholder="Masukkan No. SPA" name="no_spa" id="no_spa" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Nama User</label>
        <input class="form-control" type="text" placeholder="Masukkan Nama User" name="user" id="user" required>
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">SID</label>
        <input class="form-control" type="number" placeholder="Masukkan No. SID" name="sid" id="sid" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Layanan</label>
       <select class="form-control" name="layanan" id="layanan" required>
       <option value="10 Mbps">10 Mbps</option>
       <option value="20 Mbps">20 Mbps</option>
       <option value="50 Mbps">50 Mbps</option>
       <option value="100 Mbps">100 Mbps</option>
       </select>
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">Titik Koordinat</label>
        <input class="form-control" type="number" placeholder="Masukkan Titik Koordinat" name="tikor" id="tikor" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Nama Mitra</label>
        <input class="form-control" type="text" placeholder="Masukkan Nama Mitra" name="namaMitra" id="namaMitra" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">PIC Mitra</label>
        <input class="form-control" type="text" placeholder="Masukkan PIC Mitra" name="picMitra" id="picMitra" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Kode FAT</label>
        <input class="form-control" type="text" placeholder="Masukkan Kode FAT" name="fatKode" id="fatKode" required>
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">Port FAT</label>
        <input class="form-control" type="number" placeholder="Masukkan Port FAT"  name="portFAT"  id="portFAT" required>
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">Idle</label>
        <input class="form-control" type="number" placeholder="Masukkan Idle" name="idle" id="idle" required>
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">Titik Koordinat FAT</label>
        <input class="form-control" type="number" placeholder="Masukkan Titik Koordinat FAT" name="tikorFAT" id="tikorFAT" required >
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">OLT</label>
        <input class="form-control" type="text" placeholder="Masukkan OLT" name="olt" id="olt" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1" >Panjang Kabel</label>
        <select class="form-control" name="panjangKabel" id="panjangKabel" required>
       <option value="100 M">100 M</option>
       <option value="150 M">150 M</option>
       <option value="200 M">200 M</option>
       <option value="250 M">250 M</option>
       <option value="300 M">300 M</option>
       </select>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">S/N ONT</label>
        <input class="form-control" type="text" placeholder="Masukkan S/N ONT" name="snONT" id="snONT" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Mac ONT</label>
        <input class="form-control" type="text" placeholder="Masukkan Mac ONT" name="macONT" id="macONT" required>
    </div>
    <input type="submit" value="submit" class="btn btn-primary"></input>
</form>
                              
                            
                               
                                   
                                </div>
 </div>
                        </div>
                    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
                            
   

 
</body>
@endsection

</html>

    











