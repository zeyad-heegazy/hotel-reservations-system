<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController
{
   public function index(DashboardRequest $request): View
   {
       $hotelsCount = Hotel::count();
       $guestsCount = Guest::count();
       $roomsCount = Room::count();
       $reservationsCount = Reservation::count();

       $roomsPerType = Room::select('type', DB::raw('COUNT(*) as count'))
           ->groupBy('type')
           ->get();

       return view("dashboard", compact(
           'hotelsCount',
           'guestsCount',
           'roomsCount',
           'reservationsCount',
           'roomsPerType'
       ));
   }
}
