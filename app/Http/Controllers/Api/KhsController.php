<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Khs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $khs = Khs::where('student_id', $user->id)->paginate(10);
        return $khs;
    }
}
