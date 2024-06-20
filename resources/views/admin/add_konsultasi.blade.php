

<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    @include('admin.css')
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding-top: 50px; padding-bottom: 70px">
          <h1>Tambahkan Konsultasi</h1>

            @if(session()->has('message'))

            <div class="alert alert-success">
            
                {{session()->get('message')}}
            <button type="button"class="close" data-dismiss="alert">
                x
            </button>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>

            @endif

            <form action="{{ url('upload_konsultasi') }}" method="POST" enctype="multipart/form-data", style="padding-top: 25px">
                @csrf
                <div style="padding:15px;">
                    <label>ID Antrian</label>
                    <input type="text" name="id_antrian" style="color:white; background-color: rgb(63, 59, 76);" placeholder="" required="">
                    @error('id_antrian')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                
                <div style="padding:15px;">
                    <label>Jenis Konsultasi</label>
                    <select name="nama_konsultasi" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                        <option>--- Pilih ---</option>
                        @foreach($jenis_konsultasi as $jenis_konsultasis)
                            <option value="{{ $jenis_konsultasis->nama_konsultasi }}"> {{ $jenis_konsultasis->nama_konsultasi }} </option>
                        @endforeach

                    </select>
                </div>

                <div style="padding:15px;">
                    <label>Dokter</label>
                    <select name="nama_dokter" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                        <option>--- Pilih ---</option>
                        @foreach($dokter as $dokters)
                            <option value="{{ $dokters->nama_dokter }}"> {{ $dokters->spesialisasi }} - {{ $dokters->nama_dokter }} </option>
                        @endforeach

                    </select>
                </div>

                <div style="padding:15px;">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" style="color:white; background-color: rgb(63, 59, 76); width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <label>Waktu</label>
                    <input type="time" name="waktu" style="color:white; background-color: rgb(63, 59, 76); width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <label>No Ruangan</label>
                    <input type="string" name="ruangan" style="color:white; background-color: rgb(63, 59, 76);" width:200px" placeholder="" required="">
                </div>

                {{-- <div style="padding:15px;">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" style="color:black; width:200px" placeholder="" required="">
                </div> --}}

                <div style="padding:15px;">
                    <input type="submit" class="btn btn-success">
                </div>

            </form>
          </div>
        </div>
      </div>
      

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    @include('admin.script')
  </body>
</html>