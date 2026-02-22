<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistanceController extends Controller
{
    public function index()
    {
        return view('distance.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'lat1' => 'required|numeric',
            'lng1' => 'required|numeric',
            'lat2' => 'required|numeric',
            'lng2' => 'required|numeric',
        ]);

        $distance = $this->calculateDistance(
            $request->lat1,
            $request->lng1,
            $request->lat2,
            $request->lng2
        );

        return view('distance.index', compact('distance'));
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // KM

        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lng1);
        $latTo   = deg2rad($lat2);
        $lonTo   = deg2rad($lng2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) *
            pow(sin($lonDelta / 2), 2)
        ));

        return round($earthRadius * $angle, 2);
    }
}