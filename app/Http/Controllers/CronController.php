<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CronController extends Controller
{
    public function GrLeader() {
        DB::select("call GenrateRank()");
        Log::info('Cron generate successfully');
        return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
    }
}
