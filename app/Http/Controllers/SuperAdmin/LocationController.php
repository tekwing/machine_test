<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function search(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $locations = DB::table('shops')
                        ->selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
                        ->orderBy('distance', 'asc')
                        ->get();
    
        foreach ($locations as $location) {
            if ($location->distance < 1) {
                $location->distance = round($location->distance * 1000) . ' meters';
            } else {
                $location->distance = round($location->distance, 2) . ' kilometers';
            }
        }
        return response()->json($locations);
    }
    


    
}
