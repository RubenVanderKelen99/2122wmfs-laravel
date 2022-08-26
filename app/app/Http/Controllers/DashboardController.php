<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    protected function isAdmin()
    {
        $user = User::query()->where('id', Auth::id());
        if (!$user->exists() || !$user->first()->role == 'admin') {
            Auth::guard('web')->logout();
            return false;
        }
        return true;
    }

    public function showRides()
    {
        if (!$this->isAdmin()) {
            return redirect('/');
        }

        $rides = Ride::query()->paginate(5);
        $users = User::query()->paginate(5);

        return view('dashboard', [
            'rides' => $rides,
            'users' => $users,
        ]);
    }

    public function showEditRide($id)
    {
        if (!$this->isAdmin()) {
            return redirect('/');
        }

        $ride = Ride::query()->where('id', $id)->first();

        return view('editRide', [
            'ride' => $ride,
        ]);
    }

    public function editRide($id, Request $request)
    {
        if (!$this->isAdmin()) {
            return redirect('/');
        }

        $this->validateRequest($request);

        $ride = Ride::query()->findOrFail($id);

        $ride->fill([
            'lat_start' => $request->lat_start,
            'lng_start' => $request->lng_start,
            'lat_destination' => $request->lat_destination,
            'lng_destination' => $request->lng_destination,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'type' => $request->type,
            'user1_id' => $request->user1_id,
            'user2_id' => $request->user2_id != null ? $request->user2_id : null,
        ]);

        $ride->save();

        return redirect()->route('dashboard');
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
            'type' => 'required|in:request,offer',
            'user1_id' => 'required|exists:App\Models\User,id',
        ]);
    }
}
