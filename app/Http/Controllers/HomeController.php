<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Konsultasi;
use App\Models\Jenis_konsultasi;
use App\Models\Riwayat;


class HomeController extends Controller
{
    public function index(){
        
        if(Auth::id()){
            return redirect('home');
        }
        else{
            // any variabel = nama tabel sql (tanpa s)
            $dokter = dokter::all();

            return view('user.home', compact('dokter'));
        }
       
    }

    public function redirect(){
       
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){                
                $dokter = Dokter::all();
                return view('user.home', compact('dokter'));
            } else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
            // return redirect()->route('login');
        }
    }

    public function listkonsultasi(){
        // harus login dulu sebelum pesan konsultasi
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){                
                // $dokter = dokter::all();
                // return view('user.list_konsultasi', compact('dokter'));
                $jenis_konsultasis = Jenis_konsultasi::all();
                return view('user.list_konsultasi', ['jenis_konsultasis'=>$jenis_konsultasis]);
            }
        }
        else{
            // return redirect()->back();
            return redirect()->route('login');
        }
    }

    public function pilihkonsultasi(Request $request){
        // didapat dari form post list_konsultasi
        $nama_konsultasi = $request->input('nama_konsultasi');
        $konsultasis = Konsultasi::where('nama_konsultasi', $nama_konsultasi)->get();
        
        // sama saja dengan compact
        return view('user.pilih_konsultasi',[
            'konsultasis'=>$konsultasis,
            'nama_konsultasi' => $nama_konsultasi   // Untuk bagian judul
        ]);
    }

    public function pesankonsultasi(Request $request){

        $id = $request->input('id_an');
        $antrian = Konsultasi::where('id', $id)->first();

        return view('user.pesan_konsultasi', [
            'antrian'=>$antrian,
            'id'=> $id
        ]);
    }

    public function memproseskonsultasi(Request $request){
             
        $id = $request->input('idantriasli');
        $konsultasi = Konsultasi::find($id);

        $konsultasi->status = 'Diproses';
        $konsultasi->id_user = $request->input('idpasien');
        $konsultasi->nama_user = $request->input('pasien');

        // nambah di histori
        $riwayat = new Riwayat();
        
        $riwayat->id_pasien = $request->input('idpasien');
        $riwayat->id_antrian = $request->input('antri');
        $riwayat->nama_pasien = $request->input('pasien');
        $riwayat->nama_konsultasi = $request->input('kategori');
        $riwayat->nama_dokter = $request->input('dok');
        $riwayat->tanggal = $request->input('tgl');
        $riwayat->waktu = $request->input('wkt');
        $riwayat->ruang = $request->input('room');
        $riwayat->status_booking = 'Diproses';

        $konsultasi->save();
        $riwayat->save();

        return redirect()->route('riwayat')->with('message', 'Pengajuan Konsultasi sedang diproses! Silahkan tunggu beberapa saat!');
    }

    public function riwayat(){
        if(Auth::id()){
            // request id user
            $riwayat = Riwayat::all();

            return view('user.riwayat', compact('riwayat'));
        }
        else{
            return redirect()->route('login');
        }
    }
    
}
