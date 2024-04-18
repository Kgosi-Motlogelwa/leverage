<?php

namespace App\Http\Controllers\API\V1;

use App\Models\PollingStations;
use App\Models\PollingDistricts;
use App\Http\Requests\StorePollingStationsRequest;
use App\Http\Requests\UpdatePollingStationsRequest;
use App\Http\Controllers\Controller;
class PollingStationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pollingStations = PollingStations::paginate(10);

        return response()->json([
            'data' => $pollingStations->items(),
            'meta' => [
                'current_page' => $pollingStations->currentPage(),
                'per_page' => $pollingStations->perPage(),
                'total' => $pollingStations->total(),
            ],
            'links' => [
                'next' => $pollingStations->nextPageUrl(),
                'prev' => $pollingStations->previousPageUrl(),
            ],
        ]);
    }

    public function getByPollingDistrictsId($pollingDistrictsId)
    {
        // Fetch polling districts based on the provided constituency ID
        $pollingStations = PollingStations::where('polling_districts_id', $pollingDistrictsId)->get();

        // Return the polling districts as JSON response
        return response()->json($pollingStations);
    }

    public function getPollingStationsByPollingDistrict($pollingDistrictId)
{
    // Fetch the polling district along with its polling stations using eager loading
    $pollingDistrict = PollingDistricts::with('polling_stations')->findOrFail($pollingDistrictId);

    // Return the polling district with its polling stations
    return response()->json($pollingDistrict);
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
