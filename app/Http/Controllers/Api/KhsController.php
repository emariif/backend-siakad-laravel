<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KhsResource;
use App\Models\Khs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $khs = Khs::where('student_id', $user->id)->get()->load('subject');
        return KhsResource::collection($khs);
    }
}
