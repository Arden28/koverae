<?php

namespace App\Http\Controllers;

use App\Models\Company\Company;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request, $subdomain)
    {
        $companies_domains = Company::select('domain_name')->get();
        // Use $subdomain to determine the context of your subdomain logic

        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();
        $modules = modules();
        return view('main', [
            'subdomain' => $subdomain,
            'team'  => $team,
            'modules'  => $modules
        ]);
    }


}
