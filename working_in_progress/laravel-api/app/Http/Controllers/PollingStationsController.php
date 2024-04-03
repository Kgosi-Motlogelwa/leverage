<?php

namespace App\Http\Controllers;

use App\Models\PollingStations;
use App\Http\Requests\StorePollingStationsRequest;
use App\Http\Requests\UpdatePollingStationsRequest;

class PollingStationsController extends Controller
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
     * @param  \App\Http\Requests\StorePollingStationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePollingStationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollingStations  $pollingStations
     * @return \Illuminate\Http\Response
     */
    public function show(PollingStations $pollingStations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollingStations  $pollingStations
     * @return \Illuminate\Http\Response
     */
    public function edit(PollingStations $pollingStations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePollingStationsRequest  $request
     * @param  \App\Models\PollingStations  $pollingStations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePollingStationsRequest $request, PollingStations $pollingStations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollingStations  $pollingStations
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollingStations $pollingStations)
    {
        //
    }
}
