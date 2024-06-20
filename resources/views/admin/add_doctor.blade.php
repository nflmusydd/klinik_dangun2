

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
                <h1>Tambahkan Dokter</h1>

            @if(session()->has('message'))

              <div class="alert alert-success">
                  {{session()->get('message')}}
                <button type="button"class="close" data-dismiss="alert">
                    x
                </button>
              </div>

            @endif

            {{-- enctype untuk upload file (gambar) --}}
            <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" style="padding-top: 25px;">
                @csrf
                <div style="padding:15px;">
                    <label>Nama Dokter</label>
                    <input type="text" name="nama_dokter" style="color:white; background-color: rgb(63, 59, 76);" placeholder="dr. " required="">
                </div>

                <div style="padding:15px;">
                    <label>No Telp</label>
                    <input type="number" name="no_telp_dokter" style="color:white; background-color: rgb(63, 59, 76);" placeholder="08xxxxxxxx" required="">
                </div>

                <div style="padding:15px;">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_dokter" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                </div>
                
                <div >
                    <div style="padding-right:200px;">
                        <label>Alamat</label>
                    </div>
                        {{-- <textarea name="address" style="color:black; height:100px;" placeholder="Tulis alamat lengkap"></textarea> --}}
                        <div style="padding-left:50px;">
                            <textarea name="alamat_dokter" style="color:white; background-color: rgb(63, 59, 76); width:350px; height:100px;" placeholder="Jl. , Kelurahan/Desa, Kecamatan, Kota/Kab. " required=""></textarea>
                    </div>
                </div>
                

                <div style="padding:15px;">
                    <label>Spesialisasi</label>
                    <select name="spesialisasi" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                        <option>--- Pilih ---</option>
                        @foreach($jenis_konsultasi as $jenis_konsultasis)
                            <option value="{{ $jenis_konsultasis->nama_konsultasi }}"> {{ $jenis_konsultasis->nama_konsultasi }} </option>
                        @endforeach
                            {{-- <option value="Umum">Umum</option>
                            <option value="Anak">Anak</option>
                            <option value="Gigi">Gigi</option>
                            <option value="THT">THT</option>
                            <option value="Kulit">Kulit</option>
                            <option value="Mata">Mata</option>
                            <option value="Saraf">Saraf</option>
                            <option value="Bedah">Bedah</option> --}}
                        
                    </select>
                </div>

                
                <div style="padding:15px;">
                    <label>Foto Dokter</label>
                    <input type="file" style="color:white; background-color: rgb(63, 59, 76); width:200px" name="foto_dokter" required="">
                </div>

                <div style="padding:15px;">
                    <input type="submit" value="Tambah" class="btn btn-success">
                </div>

            </form>
        </div>
      </div>


        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    @include('admin.script')
  </body>
</html>