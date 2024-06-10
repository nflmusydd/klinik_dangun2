<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\Jenis_konsultasi;
use App\Models\Konsultasi;
use App\Models\Riwayat;

class AdminController extends Controller
{
    public function addview(){
        $jenis_konsultasi = Jenis_konsultasi::all();
        return view('admin.add_doctor', compact('jenis_konsultasi'));
    }

    public function upload(Request $request){
        
        // inisiasi variabel = nama Model
        $dokter = new dokter;

        $image = $request->foto_dokter;
        // membuat nama file
        $imagename = time().'.'.$image->getClientoriginalExtension();
        // membuat folder fotodokter di public
        $request->foto_dokter->move('doctorimage',$imagename);
        
        
        // nama di database = nama di add_doctor
        $dokter->foto_dokter = $imagename;
        
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->no_telp_dokter = $request->no_telp_dokter;
        $dokter->tanggal_lahir_dokter = $request->tanggal_lahir_dokter;
        $dokter->alamat_dokter = $request->alamat_dokter;
        $dokter->spesialisasi = $request->spesialisasi;
        $dokter->ruangan = $request->ruang;

        $dokter->save();

        return redirect()->back()->with('message', 'Dokter berhasil ditambahkan!');
        				
    }

    public function addjeniskonsultasi(){
        return view('admin.add_jenis_konsultasi');
    }

    public function uploadjeniskonsultasi(Request $request){
        
        $jenis_konsultasi = new Jenis_konsultasi;

        $image = $request->gambar;
        // membuat nama file
        $imagename = time().'.'.$image->getClientoriginalExtension();
        // membuat folder fotodokter di public
        $request->gambar->move('gambarkonsultasi',$imagename);
        
        $jenis_konsultasi->gambar = $imagename;
    
        $jenis_konsultasi->nama_konsultasi = $request->nama_konsultasi;
        $jenis_konsultasi->deskripsi = $request->deskripsi;
        
        $jenis_konsultasi->save();

        return redirect()->back()->with('message', 'Jenis Konsultasi Baru berhasil ditambahkan!');
        				
    }

    public function addkonsultasi(){
        $dokter = Dokter::all();
        $jenis_konsultasi = Jenis_konsultasi::all();
        return view('admin.add_konsultasi', compact('dokter','jenis_konsultasi'));
    }

    public function uploadkonsultasi(Request $request){
        $konsultasi = new Konsultasi;
        
        $konsultasi->id_antrian = $request->id_antrian;
        $konsultasi->nama_konsultasi = $request->nama_konsultasi;
        $konsultasi->nama_dokter = $request->nama_dokter;
        $konsultasi->tanggal = $request->tanggal;
        $konsultasi->waktu = $request->waktu;
        $konsultasi->harga = $request->harga;
        $konsultasi->ruangan = $request->ruangan;
        $konsultasi->status = 'Tersedia';

        $konsultasi->save();

        return redirect()->back()->with('message', 'Konsultasi Baru berhasil ditambahkan!');
    }

    public function kelolakonsultasi(){
        $riwayat = Riwayat::all();
        return view('admin.kelola_konsultasi', compact('riwayat'));
    }

    public function setujuikonsultasi(Request $request){
        // Find hanya bisa untuk PK
        $id = $request->input('idriwayat');
        $riwayat = Riwayat::find($id);

        // Where lebih fleksibel
        $id_antrian = $request->input('idantripalsu');
        $konsultasi = Konsultasi::where('id_antrian', $id_antrian)->first();
        // dd($konsultasi);
        $riwayat->status_booking = 'Disetujui'; 
        $konsultasi->status = 'Dipesan';

        $riwayat->save();
        $konsultasi->save();
        return redirect()->back()->with('message', 'Menyetujui Permohonan Konsultasi');
    }

    public function tolakkonsultasi(Request $request){
        $id = $request->input('idriwayat');
        $riwayat = Riwayat::find($id);

        // Where lebih fleksibel
        $id_antrian = $request->input('idantripalsu');
        $konsultasi = Konsultasi::where('id_antrian', $id_antrian)->first();
        // dd($konsultasi);
        $riwayat->status_booking = 'Ditolak'; 

        // Mencegah jika data konsultasi terlanjur dihapus saat di halaman Edit Konsultasi (sehingga tidak bisa edit data)
        if($konsultasi){
            $konsultasi->status = 'Tersedia';
            $konsultasi->nama_user = null;
            $konsultasi->id_user = null;
            $konsultasi->save();
        }

        $riwayat->save();
        
        
        return redirect()->back()->with('message', 'Menolak Permohonan Konsultasi');
    }

    public function editkonsultasi(){
        $konsultasi = Konsultasi::all();
        return view('admin.edit_konsultasi', compact('konsultasi'));
    }

    public function editdatakonsultasi(Request $request){
        // mengubah 2 tabel, histori dan konsultasi
    }

    public function hapuskonsultasi($id){
        $konsultasi= Konsultasi::find($id);
        $konsultasi->delete();
        return redirect()->back()->with('message', 'List Konsultasi Berhasil Dihapus!');
    }
}
