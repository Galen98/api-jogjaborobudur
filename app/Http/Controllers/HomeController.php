<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function logApplication() {
        $data = Logs::all();
        return response()->json([
            'STATUS' => 200,
            'MESSAGE' => 'success',
            'DATA' => $data
        ]);
    }
}
