<?php

namespace App\Http\Controllers\API\V1;

use App\Models\PollingDistricts;
use App\Models\Constituencies;
use App\Http\Requests\StorePollingDistrictsRequest;
use App\Http\Requests\UpdatePollingDistrictsRequest;
use App\Http\Controllers\Controller;

class PollingDistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PollingDistricts::all();
    }

    // public function getByConstituencyId($constituencyId)
    // {
    //     // Fetch polling districts based on the provided constituency ID
    //     $pollingDistricts = PollingDistricts::where('constituencies_id', $constituencyId)->get();

    //     // Return the polling districts as JSON response
    //     return response()->json($pollingDistricts);
    // }

    public function getByConstituencyId($constituencyId)
    {
        // Eager load polling districts associated with the constituency
        $constituency = Constituencies::with('polling_districts')->findOrFail($constituencyId);

        // Retrieve polling districts from the loaded relationship
        $pollingDistricts = $constituency->polling_districts;

        // Return the polling districts as JSON response
        return response()->json($pollingDistricts);
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
