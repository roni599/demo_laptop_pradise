<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function index()
    {
        $vats=Extra::first();
        return response()->json($vats);
    }
}
