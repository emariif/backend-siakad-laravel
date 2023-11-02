<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;

class AbsensiMatkulController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $absensiMatkul = AbsensiMatkul::with(['subject','student'])->where('student_id', $user->id)->get();
        return $absensiMatkul;
    }

    public function store(Request $request) {
        $request->validate([
            'subject_id'   => 'required|exists:subject,id',
            'kode_absensi'  => 'required',
            'tahun_akademik'  => 'required',
            'semester'  => 'required',
            'pertemuan'  => 'required',
            'latitude'  => 'required',
            'longitude'  => 'required',
        ]);

        $absensiMatkul = AbsensiMatkul::create($request->all());
        return $absensiMatkul;
    }
}
