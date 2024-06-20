

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
          <h1>Tambahkan Jenis Konsultasi</h1>

            @if(session()->has('message'))

            <div class="alert alert-success">
                {{session()->get('message')}}
            <button type="button"class="close" data-dismiss="alert">
                x
            </button>
            </div>

            @endif

            <form action="{{ url('upload_jenis_konsultasi') }}" method="POST" enctype="multipart/form-data", style="padding-top: 30px;">
                @csrf
                <div style="padding:15px;">
                    <label>Jenis Konsultasi</label>
                    <input type="text" name="nama_konsultasi" style="color:white; background-color: rgb(63, 59, 76);" placeholder="cth: Mata" required="">
                </div>

                <div >
                    <div style="padding-right:200px;">
                        <label>Deskripsi</label>
                    </div>
                    <div style="padding-left:50px;">
                        <textarea name="deskripsi" style="color:white; background-color: rgb(63, 59, 76); width:350px; height:100px;" placeholder="" required=""></textarea>
                    </div>
                </div>

                <div style="padding:15px;">
                    <label>Gambar</label>
                    <input type="file" style="color:white; background-color: rgb(63, 59, 76); width:200px;" name="gambar" required="">
                </div>

                <div style="padding:15px;">
                    <input type="submit" class="btn btn-success">
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