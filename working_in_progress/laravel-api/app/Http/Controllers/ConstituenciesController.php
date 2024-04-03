<?php

namespace App\Http\Controllers;

use App\Models\Constituencies;
use App\Http\Requests\StoreConstituenciesRequest;
use App\Http\Requests\UpdateConstituenciesRequest;

class ConstituenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConstituenciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConstituenciesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function show(Constituencies $constituencies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Constituencies $constituencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConstituenciesRequest  $request
     * @param  \App\Models\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConstituenciesRequest $request, Constituencies $constituencies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constituencies  $constituencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constituencies $constituencies)
    {
        //
    }
}
