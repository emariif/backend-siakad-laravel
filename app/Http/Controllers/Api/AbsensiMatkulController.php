<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;

class AbsensiMatkulController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        // $absensiMatkul = AbsensiMatkul::with(['subject','student'])->where('student_id', $user->id)->get();
        $absensiMatkul = AbsensiMatkul::where('student_id', $user->id)->orderBy('id', 'desc')->paginate(10);
        return $absensiMatkul;
    }

    public function store(Request $request) {
        $request->validate([
            'subject_id'   => 'required|exists:subjects,id',
            'kode_absensi'  => 'required',
            'tahun_akademik'  => 'required',
            'semester'  => 'required',
            'pertemuan'  => 'required',
            'latitude'  => 'required',
            'longitude'  => 'required',
            'status'    => 'required',
        ]);

        $user = $request->user();
        $request->merge([
            'student_id'    => $user->id,
            'created_by'    => $user->id,
            'updated_by'    => $user->id
        ]);

        $absensiMatkul = AbsensiMatkul::create($request->all());
        return $absensiMatkul;
    }

    public function update(Request $request, string $id) {
        $absensiMatkul = AbsensiMatkul::findOrFail($id);
        $user = $request->user();
        $request->merge([
            'updated_by'    => $user->id,
        ]);
        $absensiMatkul->update($request->all());
        return $absensiMatkul;
    }
}
