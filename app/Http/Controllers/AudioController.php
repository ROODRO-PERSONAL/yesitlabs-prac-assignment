<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use getID3;

class AudioController extends Controller
{
    public function index()
    {
        return view('audio.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'audio' => 'required|file|mimes:mp3,wav,aac'
        ]);

        // store temporarily
        $path = $request->file('audio')
            ->store('audio', 'public');

        $fullPath = storage_path('app/public/' . $path);

        // read metadata
        $getID3 = new getID3;
        $fileInfo = $getID3->analyze($fullPath);

        $duration = round($fileInfo['playtime_seconds'] ?? 0, 2);

        return view('audio.index', compact('duration'));
    }
}
