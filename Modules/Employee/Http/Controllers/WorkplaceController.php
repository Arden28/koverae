<?php

namespace Modules\Employee\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employee\Entities\Workplace;

class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('employee::workplace.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('employee::workplace.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        // if the WId is in the url
        if($request->query('WId')){
            $id = $request->query('WId');
            $workplace = Workplace::find($id);

            // If the user exist
            if($workplace && $workplace->company_id == current_company()->id){
                return view('employee::workplace.show', compact('workplace'));
            }else{
                abort('404');
            }

        }else{
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request)
    {
        // if the WId is in the url
        if($request->query('WId')){
            $id = $request->query('WId');
            $workplace = Workplace::find($id);

            // If the user exist
            if($workplace && $workplace->company_id == current_company()->id){
                return view('employee::workplace.show', compact('workplace'));
            }else{
                abort('404');
            }

        }else{
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
