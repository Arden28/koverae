<?php

namespace App\Http\Middleware;

use App\Models\Company\Company;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $coreUrl = env('CORE_URL');

        $companies_domains = domains()->toArray(); // Convert the Collection to an array

        $session_domain = session('current_subdomain');
        // Get the subdomain from the URL
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0]; // Extract the first part before the first dot

        if (!in_array($subdomain, $companies_domains)) {
            return redirect($coreUrl . '/kokoma?esika='.$host.'&komboyabybd='.$subdomain);
            // return redirect('http://koverae.test/kokoma?esika='.$host.'&komboyabybd='.$subdomain);
            // kokoma = erreur; esika = domaine; komboybd = nom de la base de données
        }

        // Fetch company information from the database based on the subdomain
        $company = Company::where('domain_name', $subdomain)->first();

        // Store company information in the session or a cookie
        session(['current_company' => $company]);
        // Alternatively, you can use cookies to store this information if needed


        return $next($request);
    }
}