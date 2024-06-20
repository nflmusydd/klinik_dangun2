

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
        .btn-danger, .btn-success{
            font-size: 12px;
            cursor: pointer;
            border-radius: 3px;
            width: auto;
            height: auto;
        }
        .scrollable-container {
            overflow-x: auto;
            width: 100%;
            white-space: nowrap; /* Prevents content from wrapping */
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
        
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')
      <div class="scrollable-container">
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 100px; padding-bottom: 150px">

                @if(session()->has('message'))

                <div class="alert alert-success">
                
                    {{session()->get('message')}}
                <button type="button"class="close" data-dismiss="alert">
                    x
                </button>

                </div>

                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope = "col">ID Antrian</th>
                            <th scope = "col">Pasien</th>
                            <th scope = "col">Jenis Konsultasi</th>
                            <th scope = "col">Dokter</th>
                            <th scope = "col">Tanggal</th>
                            <th scope = "col">Waktu</th>
                            <th scope = "col">Status Booking</th>
                            <th scope = "col" style="text-align: center;">Kelola</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $riwayats)
            
                            <tr>
                                <th scope="row"> {{ $riwayats->id_antrian }}</td>
                                <td>{{ $riwayats->nama_pasien }}</td>
                                <td>{{ $riwayats->nama_konsultasi }}</td>
                                <td>{{ $riwayats->nama_dokter }}</td>
                                <td>{{ $riwayats->tanggal }}</td>
                                <td>{{ $riwayats->waktu }}</td>
                                <td>{{ $riwayats->status_booking }}</td>
                                
                                <td>
                                    @if($riwayats->status_booking == 'Diproses')
                                    {{-- 2 form  --}}
                                    <form action="{{ url('setujui_konsultasi') }}" style="display: inline-block;" method="POST">
                                        @csrf                                        
                                        <div style="padding:5px;">
                                            <input type="number" name="idriwayat" value="{{ $riwayats->id }}" style="display:none">
                                            <input type="text" name="idantripalsu" value="{{ $riwayats->id_antrian }}" style="display:none">
                                            <input type="submit" value="Setujui" class="btn btn-success">
                                        </div>
                                    </form>

                                    <form action="{{ url('tolak_konsultasi') }}" style="display: inline-block;" method="POST">
                                        @csrf
                                        <div style="padding:5px;">
                                            <input type="number" name="idriwayat" value="{{ $riwayats->id }}" style="display:none">
                                            <input type="text" name="idantripalsu" value="{{ $riwayats->id_antrian }}" style="display:none">
                                            <input type="submit" value="Tolak" class="btn btn-danger">
                                        </div>

                                    </form>
                                    @endif
                                </td>
                                
                                
            
                                {{-- @if ($konsultasi->status != 'Tersedia')
                                    <td>Kosong</td>
                                @else --}}
                                
                                
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

                
            </div>
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