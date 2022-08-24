<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array[]
     */
    public function index()
    {
        $requestedRides = Ride::query()->where('type', 'request')->get();
        $offeredRides = Ride::query()->where('type', 'offer')->get();

        //$ridesWithUser = Ride::findOrFail('1')->firstUser()->get();

        return ['data' => [
            'requested_rides' => $requestedRides,
            'offered_rides' => $offeredRides,
        ]];
    }

    public function getRidesOfUser($id)
    {
        $requestedRides = Ride::query()->where('user1_id', $id)->where('type', 'request')->get();
        $offeredRides = Ride::query()->where('user1_id', $id)->where('type', 'offer')->get();

        $matchedRides = Ride::query()->where(function($query) use ($id) {
            $query->where('user1_id', $id)
                ->orWhere('user2_id', $id);
        })->where('type', 'match')->get();

        $finishedRides = Ride::query()->where(function($query) use ($id) {
            $query->where('user1_id', $id)
                ->orWhere('user2_id', $id);
        })->where('type', 'finished')->get();

        return ['data' => [
            'requested_rides' => $requestedRides,
            'offered_rides' => $offeredRides,
            'matched_rides' => $matchedRides,
            'finished_rides' => $finishedRides,
        ]];
    }

    public function getComments($id)
    {
        $comments = Comment::query()->where('ride_id', $id)->get();

        return ['data' => $comments];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $ride = new Ride($request->all());
        $ride->save();
        return ['message' => 'New ride has been added.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        $ride = Ride::findOrFail($id);
        return ['data' => $ride];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string[]
     */
    public function update(Request $request, $id)
    {
        $ride = Ride::findOrFail($id);
        $this->validateRequest($request);

        $ride->fill($request->all());
        $ride->save();
        return ['message' => 'The ride has been updated.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string[]
     */
    public function destroy($id)
    {
        $ride = Ride::findOrFail($id);
        $ride->delete();

        return ['message' => 'The ride has been deleted.'];

    }

    /**
     * Validate the request.
     *
     * @param Request $request
     * @return void
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'lat_start' => 'required',
            'lng_start' => 'required',
            'lat_destination' => 'required',
            'lng_destination' => 'required',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'type' => 'required|in:request,offer,match',
            'user1_id' => 'required|exists:App\Models\User,id',
        ]);
    }

}
