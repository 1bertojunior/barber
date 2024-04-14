<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function v1()
    {
        $version = env('APP_VERSION');

        try {
            DB::connection()->getPdo();
            $databaseStatus = true;
        } catch (\Exception $e) {
            $databaseStatus = false;
        }

        return response()->json([
            'success' => true,
            'version' => $version,
            'database' => $databaseStatus
        ]);
    }
}
