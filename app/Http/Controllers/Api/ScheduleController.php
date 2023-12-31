<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        // Mata kuliah sesuai dengan user yang login (tokennya)
        $data = Schedule::with(['subject', 'subject.lecturer'])->where('student_id', $user->id)->get();
        // $data = Schedule::with(['subject', 'subject.lecturer'])->get();
        // return Schedule::all();
        return response()->json([
            'message' => 'data ditemukan User : ' . $user->name,
            'data'  => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
