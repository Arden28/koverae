<?php

namespace App\Http\Controllers\Api\Subby;

use App\Http\Controllers\Controller;
use Bpuig\Subby\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        // Retrieve all plans along with their features
        $plans = Plan::with('features')->get();

        // Return the plans and features as a JSON response
        return response()->json(['plans' => $plans]);
    }
}
