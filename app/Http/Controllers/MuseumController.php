<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Museum;

class MuseumController extends Controller
{
    /**
     * Display a listing of the museums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.museum');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created museum in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $museum = Museum::create($request->all());
        return response()->json(['message' => 'Museum created successfully', 'museum' => $museum]);
    }


    /**
     * Display the specified museum.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show(Museum $museum)
    {
        return response()->json(['museum' => $museum]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified museum in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum)
    {
        $museum->update($request->all());
        return response()->json(['message' => 'Museum updated successfully', 'museum' => $museum]);
    }

    /**
     * Remove the specified museum from storage.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        $museum->delete();
        return response()->json(['message' => 'Museum deleted successfully']);
    }
}
