<?php

namespace App\Http\Controllers\Api\Demo;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Hello';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'industry' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'primary_interest' => 'required|string|max:255',
        ]);

        $demo = Demo::create($data);

        return response()->json(['message' => 'Votre requête a bien été enregistrée !', 'demo' => $demo], 201);
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
