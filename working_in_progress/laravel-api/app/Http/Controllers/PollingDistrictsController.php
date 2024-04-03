<?php

namespace App\Http\Controllers;

use App\Models\PollingDistricts;
use App\Http\Requests\StorePollingDistrictsRequest;
use App\Http\Requests\UpdatePollingDistrictsRequest;

class PollingDistrictsController extends Controller
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
     * @param  \App\Http\Requests\StorePollingDistrictsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePollingDistrictsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollingDistricts  $pollingDistricts
     * @return \Illuminate\Http\Response
     */
    public function show(PollingDistricts $pollingDistricts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollingDistricts  $pollingDistricts
     * @return \Illuminate\Http\Response
     */
    public function edit(PollingDistricts $pollingDistricts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePollingDistrictsRequest  $request
     * @param  \App\Models\PollingDistricts  $pollingDistricts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePollingDistrictsRequest $request, PollingDistricts $pollingDistricts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollingDistricts  $pollingDistricts
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollingDistricts $pollingDistricts)
    {
        //
    }
}
