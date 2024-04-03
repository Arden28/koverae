<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\App\Services\AppInstallationService;

class StartKoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $installationService = new AppInstallationService();

        // Access 'apps' and 'company' from the query parameters
        $apps = $request->query('apps');
        $companyInfoEncoded = $request->query('company');

        // Decrypt or decode the company info
        // $companyInfo = decrypt($companyInfoEncoded);

        // Assuming $apps is a comma-separated list, convert it back to an array
        $selectedApps = explode(',', $apps);
        $companyInfo = explode(',', $companyInfoEncoded);

        $company = Company::where('name', $request->query('company'))->first();


        // Install Basic Apps
        $installationService->installBasicApp($company->id);
        // Install Basic Data
        $installationService->installBasicAppData($company->id);

        foreach($selectedApps as $app){
            $installationService->installModule($app, $company->id);
        }

        $user = User::find($request->query('u_id'));
        if ($user) {
            // Log the user in
            Auth::login($user);

            // Redirect or return response
            $response = response()->json(['success' => 'User logged in and apps installed.']);
            // Redirect the user to the dashboard
            // Store company information in the session or a cookie

            session(['current_company' => $company]);

            return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
        } else {
            // User not found, handle accordingly
            return response()->json(['error' => 'User not found.'], 404);
        }

        // return view('welcome');
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
