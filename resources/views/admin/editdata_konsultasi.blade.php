<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        @include('admin.sidebar')
        @include('admin.navbar')
        
        
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 65px;">
                <h1> Perbarui Data {{ $konsultasi->id_antrian }}</h1>
                
                <form action="{{ route('mengedit_konsultasi', ['id' => $konsultasi->id]) }}" method="POST" style="padding-top: 50px;  padding-bottom: 70px">
                    @csrf
                    {{-- <input type="hidden" name="idriwayatantri" value="{{ $konsultasi->id_antrian }}"> --}}

                    <div style="padding:15px;">
                        <label>ID antrian</label>
                        <input type="text" name="id_antrian" value="{{ $konsultasi->id_antrian }}" style="color:white; background-color: rgb(63, 59, 76);" required="">
                    </div>

                    <div style="padding:15px;">
                        <label>Jenis Konsultasi</label>
                        <select name="nama_konsultasi" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                            <option value= {{ $konsultasi->nama_konsultasi }}> {{ $konsultasi->nama_konsultasi }}</option>
                            @foreach($jenis_konsultasi as $jenis_konsultasis)
                               
                                @if ($konsultasi->nama_konsultasi != $jenis_konsultasis->nama_konsultasi)   {{-- Mencegah pilihan dobel --}}
                                    <option value="{{ $jenis_konsultasis->nama_konsultasi }}">
                                        {{ $jenis_konsultasis->nama_konsultasi }}
                                    </option>
                                @endif
                            @endforeach
    
                        </select>
                    </div>
    
                    <div style="padding:15px;">
                        <label>Dokter</label>
                        <select name="nama_dokter" style="color:white; background-color: rgb(63, 59, 76); width:200px;" required="">
                            <option value= {{ $konsultasi->nama_dokter}}> {{ $konsultasi->nama_konsultasi}} - {{ $konsultasi->nama_dokter}} </option>
                            @foreach($dokter as $dokters)
                                @if ($konsultasi->nama_dokter != $dokters->nama_dokter)
                                    <option value="{{ $dokters->nama_dokter }}"> {{ $dokters->spesialisasi }} - {{ $dokters->nama_dokter }} </option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>
    
                    <div style="padding:15px;">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" style="color:white; background-color: rgb(63, 59, 76); width:200px" value="{{ $konsultasi->tanggal  }}" required="">
                    </div>
    
                    <div style="padding:15px;">
                        <label>Waktu</label>
                        <input type="time" name="waktu" style="color:white; background-color: rgb(63, 59, 76); width:200px" value="{{ $konsultasi->waktu  }}" required="">
                    </div>
    
                    <div style="padding:15px;">
                        <label>No Ruangan</label>
                        <input type="string" name="ruangan" style="color:white; background-color: rgb(63, 59, 76); width:200px" value="{{ $konsultasi->ruangan  }}" required="">
                    </div>

                    {{-- <div class="form-group">
                        <label for="field1">Field 1</label>
                        <input type="text" name="field1" value="{{ $konsultasi->id_antrian }}" class="form-control">
                    </div> --}}
                
                    <div style="padding:15px;">
                        <input type="submit" value="Perbarui" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>


    
    @include('admin.script')
</body>
</html>


