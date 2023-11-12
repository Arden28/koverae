<?php

namespace App\Http\Middleware;

use App\Models\Module\Module;
use App\Models\Team\Team;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfModuleInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $moduleName)
    {
        // $team = Team::find(Auth::user()->team->id)->first();
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();
        $module = Module::where('slug', $moduleName)->firstOrFail();

        if (!$module->isInstalledBy($team)) {
            // return response('The module'.$module->name.' is not installed for the current team.', 403);
            return response(view('errors.module.not-installed', compact('module')));
        }

        return $next($request);
    }
}
